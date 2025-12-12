IMPLEMENTASI

4.1	Form Pencarian dan Filter Tahun
<select id="tahunSelect" class="form-select me-2" style="width: 150px;">
    <option value="">Semua Tahun</option>
    <option value="2023">2023</option>
    <option value="2024">2024</option>
    <option value="2025">2025</option>
</select>
<input id="searchInput" class="form-control me-2" type="search" placeholder="Masukan Kata Kunci">
<button class="btn btn-info" type="submit">Cari</button>
Bagian ini merupakan form input pada halaman frontend yang digunakan pengguna untuk melakukan pencarian data SPPT. #searchInput adalah tempat pengguna memasukkan kata kunci, seperti nama wajib pajak, NOP, alamat, atau letak blok. Dropdown #tahunSelect memungkinkan pengguna memfilter data berdasarkan tahun tertentu. Tombol “Cari” akan memicu fungsi cariData() pada JavaScript, yang akan mengirimkan permintaan ke server untuk mengambil data sesuai kata kunci dan filter yang dipilih.
4.2	Suggestion Box / Autocomplete
$('#searchInput').on('input', function(){
    let keyword = $(this).val().trim();
    let tahun = $('#tahunSelect').val();

    if (keyword.length >= 2) {
        $.ajax({
            url: 'fuzzy_search.php',
            method: 'GET',
            data: { q: keyword, tahun: tahun },
            dataType: 'json',
            success: function(data){
                let suggestionBox = $('#suggestionBox');
                suggestionBox.empty();
                if (data.length > 0) {
                    data.forEach(function(item){
                        suggestionBox.append(`
                            <div class="suggestion-item" data-nop="${item.nop}">
                                <strong>${item.nama_wp}</strong> - ${item.letak_blok}
                            </div>
                        `);
                    });
                    let inputOffset = $('#searchInput').offset();
                    suggestionBox.css({
                        top: inputOffset.top + $('#searchInput').outerHeight(),
                        left: inputOffset.left,
                        width: $('#searchInput').outerWidth()
                    }).show();
                } else {
                    suggestionBox.hide();
                }
            }
        });
    } else {
        $('#suggestionBox').hide();
    }
});
Bagian ini menangani pencarian realtime saat pengguna mengetik di input kata kunci. AJAX request dikirim ke fuzzy_search.php jika panjang kata kunci minimal dua karakter. Backend akan mengembalikan data hasil pencarian, yang kemudian ditampilkan sebagai daftar suggestion di bawah input. Pengguna dapat langsung memilih suggestion untuk mengisi input dan memperbarui tabel data.
4.3	Memilih Suggestion
$('#suggestionBox').on('click', '.suggestion-item', function() {
    let selected = $(this).text().trim();
    $('#searchInput').val(selected);
    $('#suggestionBox').hide();
    cariData(selected);
});
Ketika pengguna mengklik salah satu suggestion, input otomatis terisi dengan data yang dipilih, suggestion box hilang, dan fungsi cariData() dipanggil untuk menampilkan data yang relevan di tabel. Hal ini membuat pencarian menjadi lebih cepat dan interaktif.

4.4	Fungsi cariData()
function cariData(){
    let keyword = $('#searchInput').val();
    let tahun = $('#tahunSelect').val();

    if (keyword === '') {
        keyword = '*';
    }
    $.ajax({
        url: 'fuzzy_search.php',
        method: 'GET',
        data: { q: keyword, tahun: tahun },
        dataType: 'json',
        success: function(data){
            let tabel = $('#tabelData');
            tabel.empty();
            if (data.length === 0) {
                tabel.append('<tr><td colspan="7" class="text-center">Data tidak ditemukan</td></tr>');
                return;
            }
            data.forEach(function(item){
                tabel.append(`
                    <tr>
                        <td class='text-center'>${item.nop}</td>
                        <td>${item.nama_wp}</td>
                        <td>${item.alamat}</td>
                        <td>${item.letak_blok}</td>
                        <td class='text-center'>${item.luas_tanah}</td>
                        <td class='text-center'>${item.tahun}</td>
                        <td class='text-center'>
                            <button class='btn btn-sm btn-primary btn-detail' data-nop='${item.nop}'>Lihat Data</button>
                        </td>
                    </tr>
                `);
            });
        }
    });
}
Fungsi ini bertugas untuk mengambil data dari backend berdasarkan keyword dan tahun yang dipilih. Jika input kosong, sistem mengirimkan keyword * untuk menampilkan seluruh data. Setelah menerima response JSON, data lama di tabel dihapus, kemudian baris baru ditambahkan sesuai hasil pencarian. Jika tidak ada data yang ditemukan, akan muncul pesan “Data tidak ditemukan”.

4.5	Backend – Fuzzy Search (fuzzy_search.php)
$keyword = isset($_GET['q']) ? trim($_GET['q']) : '';
$tahun = isset($_GET['tahun']) ? trim($_GET['tahun']) : '';
$keyword = pg_escape_string($keyword);
$keywords = preg_split('/[\s,\-]+/', $keyword, -1, PREG_SPLIT_NO_EMPTY);
$conditions = [];
if (!empty($tahun)) {
    $conditions[] = "tahun = '$tahun'";
}
$searchParts = [];
foreach ($keywords as $k) {
    $searchParts[] = "
        (
            unaccent(lower(nama_wp)) ILIKE unaccent(lower('%$k%'))
         OR unaccent(lower(jalan_wp)) ILIKE unaccent(lower('%$k%'))
         OR unaccent(lower(jalan_op)) ILIKE unaccent(lower('%$k%'))
         OR unaccent(lower(nop)) ILIKE unaccent(lower('%$k%'))
         OR similarity(unaccent(lower(nama_wp)), unaccent(lower('$k'))) > 0.3
         OR similarity(unaccent(lower(jalan_wp)), unaccent(lower('$k'))) > 0.3
         OR similarity(unaccent(lower(jalan_op)), unaccent(lower('$k'))) > 0.3
        )
    ";
}
if (count($searchParts) > 0) {
    $conditions[] = '(' . implode(' AND ', $searchParts) . ')';
}
$query = "
SELECT 
    nop, 
    nama_wp, 
    jalan_wp AS alamat, 
    jalan_op AS letak_blok, 
    luas_bumi AS luas_tanah, 
    tahun AS tahun,
    GREATEST(
        similarity(unaccent(lower(nama_wp)), unaccent(lower('$keyword'))),
        similarity(unaccent(lower(jalan_wp)), unaccent(lower('$keyword'))),
        similarity(unaccent(lower(jalan_op)), unaccent(lower('$keyword')))
    ) AS skor
FROM sppt
";

if (count($conditions) > 0) {
    $query .= " WHERE " . implode(" AND ", $conditions);
}
$query .= " ORDER BY skor DESC, nama_wp ASC LIMIT 20;";
Backend bertugas memproses keyword dan filter tahun untuk melakukan pencarian di database PostgreSQL. Keyword dipisahkan menjadi beberapa kata agar pencarian lebih fleksibel. Sistem menggunakan kombinasi ILIKE dan unaccent() untuk pencarian case-insensitive dan mengabaikan aksen, serta fungsi similarity() untuk pencarian fuzzy sehingga hasil mirip tetap muncul. Hasil query diurutkan berdasarkan skor relevansi, kemudian dibatasi hingga 20 baris dan dikembalikan ke frontend dalam format JSON.
