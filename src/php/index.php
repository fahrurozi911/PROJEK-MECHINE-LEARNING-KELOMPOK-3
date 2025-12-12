<?php include('db.php'); ?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>desapp</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/LOGO UNPAM.ico" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <style>
    <style>
.suggestions-box {
  position: absolute;
  background: white;
  border: 1px solid #ddd;
  border-radius: 5px;
  max-height: 200px;
  overflow-y: auto;
  width: 250px;
  z-index: 1000;
}

.suggest-item {
  padding: 6px 10px;
  cursor: pointer;
}

.suggest-item:hover {
  background-color: #f2f2f2;
}
</style>

  </style>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="../assets/images/logos/LOGO (2).png" width="160" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <span class="hide-menu fs-5">PEMBAYARAN</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="#" aria-expanded="false">
                <span class="hide-menu">Halaman Bayar</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="#" aria-expanded="false">
                <span class="hide-menu">Riwayat Pembayaran</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <span class="hide-menu fs-5">SPPT</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="#" aria-expanded="false">
                <span class="hide-menu">Data SPPT</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="#" aria-expanded="false">
                <span class="hide-menu">Mutasi SPPT</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <span class="hide-menu fs-5">PETUGAS</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="#" aria-expanded="false">
                <span class="hide-menu">Data Petugas</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <span class="hide-menu fs-5">PETUGAS</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="#" aria-expanded="false">
                <span class="hide-menu">Rekap Pembayaran</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="#" aria-expanded="false">
                <span class="hide-menu">Laporan Berjangka</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../assets/images/profile/intan.png" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a>
                    <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
          <div class="col-lg-4">
            <div class="row">
              <div class="col-lg-12">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-13 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-6 shadow-lg">
                <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    <h5 class="card-title fw-semibold mb-4">DATA SPPT</h5>
                    
                    <div class="fungsicaridata d-flex">
                    <select id="limitSelect" class="form-select me-2" style="width: 100px;">
                      <option value="5">5</option>
                      <option value="10" selected>10</option>
                      <option value="20">20</option>
                      <option value="50">50</option>
                    </select>
                    <form class="d-flex" onsubmit="event.preventDefault(); cariData();">
                    <select id="tahunSelect" class="form-select me-2" style="width: 150px;">
                        <option value="">Semua Tahun</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                    </select>
                    <input id="searchInput" class="form-control me-2" type="search" placeholder="Masukan Kata Kunci">
                    <button class="btn btn-info" type="submit">Cari</button>
                    </form>
                    </div>
                </div>
                </nav>
                <div class="table-responsive">
                  <table class="table mb-0 align-middle border-bottom table-sm small table-bordered table-striped align-middle" style="table-layout: fixed; width: 100%; word-wrap: break-word; white-space: normal;">
                    <thead class="text-dark fs-4 vertical-align: middle text-align-middle">
                      <tr>
                        <th class="border-bottom-0 " style="vertical-align: middle">
                          <h6 class="fw-bold mb-0 justify-content-center text-center ">NOP</h6>
                        </th>
                        <th class="border-bottom-0" style="vertical-align: middle">
                          <h6 class="fw-semibold mb-0">NAMA WAJIB PAJAK</h6>
                        </th>
                        <th class="border-bottom-0" style="vertical-align: middle">
                          <h6 class="fw-semibold mb-0">ALAMAT</h6>
                        </th>
                        <th class="border-bottom-0" style="vertical-align: middle">
                          <h6 class="fw-semibold mb-0">LETAK BLOK </h6>
                        </th>
                        <th class="border-bottom-0" style="vertical-align: middle;">
                            <h6 class="fw-semibold mb-0 text-center ">LUAS TANAH</h6>
                        </th>
                        <th class="border-bottom-0" style="vertical-align: middle"">
                            <h7 class="fw-semibold mb-0 text-center ">TAHUN</h7>
                        </th>
                        <th class="border-bottom-0" style="vertical-align: middle">
                          <h6 class="fw-semibold mb-0 text-center ">AKSI</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody id="tabelData">
                      <?php
                      $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10; // default 10
                      $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // default halaman 1
                      $offset = ($page - 1) * $limit;

                        $query = "SELECT nop, nama_wp, jalan_wp AS alamat, jalan_op AS letak_blok, luas_bumi AS luas_tanah, tahun AS tahun FROM sppt";

                        if (!empty($_GET['tahun'])) {
                            $tahunFilter = (int)$_GET['tahun'];
                            $query .= " WHERE tahun = $tahunFilter";
                        }

                          // Tambahkan limit dan offset
                          $query .= " ORDER BY nop LIMIT $limit OFFSET $offset";

                          $result = pg_query($conn, $query);


                        // Jika ada filter tahun (opsional)
                        if (!empty($_GET['tahun'])) {
                        $tahunFilter = (int)$_GET['tahun'];
                        $query .= " WHERE tahun = $tahunFilter";
                        }

                        $result = pg_query($conn, $query);

                        // Loop untuk menampilkan baris data
                        while ($row = pg_fetch_assoc($result)) {
                        echo "<tr>
                            <td class='border-bottom-0 text-center align-middle'>
                                <p class='mb-0 fw-normal fs-1'>{$row['nop']}</p>
                            </td>
                            <td class='border-bottom-0 align-middle'>
                                <p class='mb-0 fw-normal'>{$row['nama_wp']}</p>
                            </td>
                            <td class='border-bottom-0 align-middle'>
                                <p class='mb-0 fw-normal'>{$row['alamat']}</p>
                            </td>
                            <td class='border-bottom-0 align-middle'>
                                <p class='mb-0 fw-normal'>{$row['letak_blok']}</p>
                            </td>
                            <td class='border-bottom-0 text-center align-middle'>
                                <p class='mb-0 fw-normal'>{$row['luas_tanah']}</p>
                            </td>
                            <td class='border-bottom-0 text-center align-middle'>
                                <p class='mb-0 fw-normal'>{$row['tahun']}</p>
                            </td>
                            <td class='border-bottom-0 text-center align-middle'>
                                <button class='btn btn-sm btn-primary btn-detail' data-nop='{$row['nop']}'>Lihat Data</button>
                            </td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                  </table>
                  <?php
                  $totalQuery = "SELECT COUNT(*) FROM sppt";
                  if (!empty($_GET['tahun'])) {
                      $totalQuery .= " WHERE tahun = $tahunFilter";
                  }
                  $totalResult = pg_query($conn, $totalQuery);
                  $totalData = pg_fetch_result($totalResult, 0, 0);
                  $totalPages = ceil($totalData / $limit);
                  ?>

                  <div class="mt-3">
                      <?php if ($page > 1): ?>
                          <a href="?page=<?php echo $page-1; ?>&limit=<?php echo $limit; ?>" class="btn btn-sm btn-secondary">Previous</a>
                      <?php endif; ?>

                      <?php if ($page < $totalPages): ?>
                          <a href="?page=<?php echo $page+1; ?>&limit=<?php echo $limit; ?>" class="btn btn-sm btn-secondary">Next</a>
                      <?php endif; ?>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
         
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Developed by Kelompok 3<a href="#" target="_blank" class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a></p>
        </div>
      </div>
    </div>
  </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function(){
    $('body').append('<div id="suggestionBox"></div>');

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

    // ✅ perbaikan disini
    $('#suggestionBox').on('click', '.suggestion-item', function() {
        let selected = $(this).text().trim();
        $('#searchInput').val(selected);
        $('#suggestionBox').hide();
        cariData(selected);
    });

    $(document).click(function(e){
        if(!$(e.target).closest('#suggestionBox, #searchInput').length){
            $('#suggestionBox').hide();
        }
    });
});


function cariData(){
    let keyword = $('#searchInput').val();
    let tahun = $('#tahunSelect').val();

    if (keyword === '') {
    keyword = '*';}


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
</script>

<style>
#suggestionBox {
    position: absolute;
    background: white;
    border: 1px solid #ccc;
    border-radius: 6px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    z-index: 1000;
    display: none;
    max-height: 250px;
    overflow-y: auto;
}
.suggestion-item {
    padding: 8px 12px;
    cursor: pointer;
}
.suggestion-item:hover {
    background-color: #e9f5ff;
}
</style>


  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/dashboard.js"></script>
  

</body>

</html>
