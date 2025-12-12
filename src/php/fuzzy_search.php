<?php
include 'db.php';

$keyword = isset($_GET['q']) ? trim($_GET['q']) : '';
$tahun = isset($_GET['tahun']) ? trim($_GET['tahun']) : '';

if ($keyword === '*' || $keyword === '') {
    // query tampilkan semua data
}

$keyword = pg_escape_string($keyword);

// pisahkan keyword berdasarkan spasi, koma, atau tanda hubung
$keywords = preg_split('/[\s,\-]+/', $keyword, -1, PREG_SPLIT_NO_EMPTY);

$conditions = [];

// filter tahun kalau ada
if (!empty($tahun)) {
    $conditions[] = "tahun = '$tahun'";
}

$searchParts = [];
foreach ($keywords as $k) {
    $k = trim($k);
    if ($k === '') continue;
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

// jika ada kata kunci
if (count($searchParts) > 0) {
    // gunakan AND agar setiap kata wajib muncul di kombinasi data
    $conditions[] = '(' . implode(' AND ', $searchParts) . ')';
}

// query utama
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

// tambahkan kondisi
if (count($conditions) > 0) {
    $query .= " WHERE " . implode(" AND ", $conditions);
}

$query .= " ORDER BY skor DESC, nama_wp ASC LIMIT 20;";

$result = pg_query($conn, $query);

if (!$result) {
    echo json_encode(["error" => pg_last_error($conn)]);
    exit;
}

$data = [];
while ($row = pg_fetch_assoc($result)) {
    // hapus spasi panjang
    foreach ($row as $key => $val) {
        $row[$key] = preg_replace('/\s+/', ' ', trim($val));
    }
    $data[] = $row;
}

echo json_encode($data);
?>
