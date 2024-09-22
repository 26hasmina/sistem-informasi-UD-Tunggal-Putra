<?php
require 'function.php';

if (isset($_SESSION['last_visited_page'])) {
    header('Location: ' . $_SESSION['last_visited_page']);
    exit;
}

//========== Menghitung total stok di dalam format PDF stok barang ================//
echo "<div id='totalStock' style='display: none;'>$total_stock</div>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>UD.Tunggal Putra/Stok</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">

  <!-- css3 -->
  <link rel="stylesheet" href="css/tabel.kayu.css">
  <link rel="stylesheet" href="css/sidebar_navbar.css">

  <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Google material icon -->
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- CSS jQuery UI -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <!-- JS jQuery UI -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <!-- Font google -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Carter+One&display=swap" rel="stylesheet">

  <!-- Sweat Alert2 Notifikasi data -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.all.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.min.css" rel="stylesheet">

            <style>
                /* CSS UNTUK NOTIFIKASI SWEAT ALERT*/
                .swal2-confirm {
                    padding: 18px 19px;
                }
                div:where(.swal2-container) .swal2-html-container {
                    font-size: 14px;
                }
                div:where(.swal2-container) button:where(.swal2-styled):where(.swal2-cancel) {
                    border: 0;
                    border-radius: 5px;
                    background: initial;
                    background-color: #2196F3;
                    color: #fff;
                    font-size: 13px;
                }
                div:where(.swal2-container) button:where(.swal2-styled) {
                    margin: .3125em;
                    padding: 17px 1.1em;
                    transition: box-shadow .1s;
                    box-shadow: 0 0 0 3px rgba(0, 0, 0, 0);
                    font-weight: 500;
                }
                div:where(.swal2-container) div:where(.swal2-popup) {
                    font-size: 10px;
                }
                div:where(.swal2-container) button:where(.swal2-styled):where(.swal2-confirm) {
                    border: 0;
                    border-radius: 5px;
                    background: initial;
                    background-color: #2196F3;
                    color: #fff;
                    font-size: 13px;
                }
                /* CSS UNTUK FOOTER*/
                footer .text-muted {
                    transform: translateX(100px);
                }
                /* CSS UNTUK MENYEBUNYIKAN COLUM AKSI PADA (th)*/
                .d-none {
                    display: none;
                }
                .stock-card {
                    position: relative;
                    display: flex;
                    flex-direction: column;
                    word-wrap: break-word;
                    background-color: #fff;
                    background-clip: border-box;
                    border-radius: 10px;
                    border-top: 5px solid #1d7ade;
                    border-bottom: 1px solid #e0e0e0;
                    border-left: 1px solid #e0e0e0; 
                    border-right: 1px solid #e0e0e0;
                    margin-top: 20px;
                    margin-left: 0;
                    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
                }
                td {
                    text-transform: none; 
                    font-size: inherit;   
                }
            </style>
        </head>
  <body>



<!-- SIDEBAR -->
<nav id="sidebar">
    <div class="sidebar-header">
        <h3>
            <img src="img/img.jpg" class="img-fluid" />
            <span class="sidebar-text">UD.Tunggal Putra</span>
        </h3>
    </div>
    <ul class="list-unstyled components">
        <li class="active">
            <a href="index.php" class="dashboard">
                <i class="fas fa-chart-pie"></i>
                <span class="sidebar-item-text">Dashboard</span>
            </a>
        </li>
        <li class="list-divider"></li>
        <h2 class="heading">Data Master</h2>
        <li>
            <a href="pembelian.php" class="dashboard">
                <i class="fas fa-file-invoice-dollar"></i>
                <span class="sidebar-item-text">Data Pembelian</span>
            </a>
        </li>
        <li>
            <a href="supplier.php" class="dashboard">
                <i class="fas fa-shipping-fast"></i>
                <span class="sidebar-item-text">Supplier</span>
            </a>
        </li>
        <li>
            <a href="stock.php" class="dashboard">
                <i class="fas fa-cube"></i>
                <span class="sidebar-item-text">Stok Barang</span>
            </a>
        </li>
        <li>
            <a href="barang_masuk.php" class="dashboard">
                <i class="fas fa-sign-in-alt"></i>
                <span class="sidebar-item-text">Barang Masuk</span>
            </a>
        </li>
        <li>
            <a href="barang_keluar.php" class="dashboard">
                <i class="fas fa-sign-out-alt"></i>
                <span class="sidebar-item-text">Barang Keluar</span>
            </a>
        </li>
        <h2 class="heading">Laporan</h2>
        <li class="nav-item dropdown">
            <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fas fa-print"></i>
                <span class="sidebar-item-text">Cetak Laporan</span>
            </a>
            <ul class="collapse list-unstyled menu" id="homeSubmenu1">
                <li>
                    <a href="cetak_masuk.php" style="font-size: 13px; color: white;">Laporan Barang Masuk</a>
                </li>
                <li>
                    <a href="cetak_keluar.php" style="font-size: 13px; color: white;">Laporan Barang Keluar</a>
                </li>
            </ul>
        </li>
        <!-- Link Manajemen Admin hanya untuk admin -->
        <?php if ($_SESSION['role'] == 1) { ?>
        <h2 class="heading">Data Akses</h2>
        <li>
            <a href="manajemen_admin.php" class="dashboard">
                <i class="fas fa-user-cog"></i>
                <span class="sidebar-item-text">Manajemen Admin</span>
            </a>
        </li>
        <?php } ?>
    </ul>
</nav>
		
		

 <!-- NAVBAR  -->

<div id="content">
    <div class="top-navbar">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
            <div class="navbar-header sidebar-header d-lg-none d-xl-none">
                    <h3><img src="img/img.jpg" class="img-fluid"/>
                    <span class="sidebar-text">UD.Tunggal Putra</span>
                    </h3>
                </div>

                <!-- NAVBAR DI BAGIAN LAYAR KECIL -->
                <div id="custom-navbar-menu" class="d-lg-none">
                    <!-- Notifikasi -->
                    <div class="dropdown nav-item">
                        <a href="stock.php" class="nav-link" data-toggle="dropdown" id="notification-toggle">
                        <i class="fas fa-bell" style="color: black;"></i>
                            <?php if ($low_stock_count > 0): ?>
                                <span class="notification-badge"><?=$low_stock_count;?></span>
                            <?php endif; ?>
                        </a>
                        <ul class="dropdown-menu" id="notification-menu" style="transform: translateX(100px);">
                            <?php if ($low_stock_count > 0): ?>
                                <li>
                                    <h5 class="dropdown-header" id="notif-header">Notifikasi</h5>
                                </li>
                                <?php
                                $visible_items = array_slice($low_stock_items, 0, 3);
                                $hidden_items = array_slice($low_stock_items, 3);
                                ?>
                                <div class="notification-content">
                                    <?php foreach ($visible_items as $item): ?>
                                        <li class="notification-item">
                                            <a href="stock.php">
                                                Stok kayu <?= $item['tabel']; ?> <?= $item['satuan_kayu']; ?> menipis. 
                                                <?php if ($item['jumlah_kubik'] <= 10 && $item['jumlah_potong'] <= 50): ?>
                                                    Di stok kubik tersisa <?= $item['jumlah_kubik']; ?> buah dan di stok potong tersisa <?= $item['jumlah_potong']; ?> potong.
                                                <?php elseif ($item['jumlah_kubik'] <= 10): ?>
                                                    Di stok kubik tersisa <?= $item['jumlah_kubik']; ?> buah.
                                                <?php elseif ($item['jumlah_potong'] <= 50): ?>
                                                    Di stok potong tersisa <?= $item['jumlah_potong']; ?> potong.
                                                <?php else: ?>
                                                    Jumlah stok tidak mencukupi.
                                                <?php endif; ?>
                                                Segera isi ulang.
                                            </a>
                                            <hr>
                                        </li>
                                    <?php endforeach; ?>
                                    <?php if (count($hidden_items) > 0): ?>
                                        <li id="more-notifications" style="display: none;">
                                            <?php foreach ($hidden_items as $item): ?>
                                                <a href="#">
                                                    Stok kayu <?= $item['tabel']; ?> <?= $item['satuan_kayu']; ?> menipis. 
                                                    <?php if ($item['jumlah_kubik'] <= 10 && $item['jumlah_potong'] <= 50): ?>
                                                        Di stok kubik tersisa <?= $item['jumlah_kubik']; ?> buah dan di stok potong tersisa <?= $item['jumlah_potong']; ?> potong.
                                                    <?php elseif ($item['jumlah_kubik'] <= 10): ?>
                                                        Di stok kubik tersisa <?= $item['jumlah_kubik']; ?> buah.
                                                    <?php elseif ($item['jumlah_potong'] <= 50): ?>
                                                        Di stok potong tersisa <?= $item['jumlah_potong']; ?> potong.
                                                    <?php else: ?>
                                                        Jumlah stok tidak mencukupi.
                                                    <?php endif; ?>
                                                    Segera isi ulang.
                                                </a>
                                                <hr>
                                            <?php endforeach; ?>
                                        </li>
                                        <li style="text-align: center;">
                                            <button id="toggle-more" style="background: none; border: none; color: blue; cursor: pointer; font-size: 12px; margin-bottom: 10px;">
                                                Lihat Selengkapnya
                                            </button>
                                        </li>
                                    <?php endif; ?>
                                </div>
                                 <?php else: ?>
                                <li>
                                    <h5 class="dropdown-header" id="no-notif-header">Tidak Ada Notifikasi</h5>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <!-- Pengaturan -->
                    <div class="dropdown nav-item">
                        <a href="#" class="nav-link" data-toggle="dropdown">
                         <i class="fas fa-user" style="color: black;"></i>
                        </a>
                        <ul class="dropdown-menu" style="transform: translateX(100px);">
                            <li>
                                <h5 class="dropdown-header" id="notif-header">Pengaturan</h5>
                            </li>
                             <!-- Link Settings Password hanya untuk user (role 0) -->
                             <?php if ($_SESSION['role'] == 0) { ?>
                                <li>
                                    <a href="setting_profile.php"><i class="fas fa-cog" style="margin-right: 10px;"></i> Settings Password</a>
                                </li>
                                <hr> <!-- Garis pemisah -->
                                <?php } ?>
                            <li>
                                <a href="logout.php"><i class="fas fa-sign-out-alt" style="margin-right: 10px;"></i> Logout</a>
                            </li>

                        </ul>
                    </div>
                </div>  <!-- FINIS NAVBAR DI BAGIAN LAYAR KECIL -->
               

                <!-- Butoon Navbar -->
                <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-one d-none">
                    <i class="fas fa-bars"></i>
                </button>
                
                <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fas fa-bars"></span>
                </button>
                <button id="toggle-navbar-menu" class="btn btn-primary d-lg-none">
                    <i class="fas fa-caret-down"></i>
                </button>
                <!-- and Butoon Navbar -->


                <!-- NAVBAR DI BAGIAN LAYAR BESAR/DEKSTOP -->
                <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">

                        <!-- Notifikasi -->
                        <li class="dropdown nav-item">
                            <a href="#" class="nav-link" data-toggle="dropdown" id="notification-toggle">
                                <i class="fas fa-bell"></i>
                                <?php if ($low_stock_count > 0): ?>
                                    <span class="notification-badge"><?=$low_stock_count;?></span>
                                <?php endif; ?>
                            </a>
                            <ul class="dropdown-menu" id="alerts-menu">
                                <?php if ($low_stock_count > 0): ?>
                                    <li>
                                        <h5 class="dropdown-header" id="notif-header">Notifikasi</h5>
                                    </li>
                                    <?php
                                    $visible_items = array_slice($low_stock_items, 0, 3);
                                    $hidden_items = array_slice($low_stock_items, 3);
                                    ?>
                                    <div class="notification-content">
                                        <?php foreach ($visible_items as $item): ?>
                                            <li class="notification-item">
                                                <a href="stock.php">
                                                    Stok kayu <?= $item['tabel']; ?> <?= $item['satuan_kayu']; ?> menipis. 
                                                    <?php if ($item['jumlah_kubik'] <= 10 && $item['jumlah_potong'] <= 50): ?>
                                                        Di stok kubik tersisa <?= $item['jumlah_kubik']; ?> buah dan di stok potong tersisa <?= $item['jumlah_potong']; ?> potong.
                                                    <?php elseif ($item['jumlah_kubik'] <= 10): ?>
                                                        Di stok kubik tersisa <?= $item['jumlah_kubik']; ?> buah.
                                                    <?php elseif ($item['jumlah_potong'] <= 50): ?>
                                                        Di stok potong tersisa <?= $item['jumlah_potong']; ?> potong.
                                                    <?php else: ?>
                                                        Jumlah stok tidak mencukupi.
                                                    <?php endif; ?>
                                                    Segera isi ulang.
                                                </a>
                                                <hr>
                                            </li>
                                        <?php endforeach; ?>
                                        <?php if (count($hidden_items) > 0): ?>
                                            <li id="hidden-notifications" style="display: none;">
                                                <?php foreach ($hidden_items as $item): ?>
                                                    <a href="stock.php">
                                                        
                                                        Stok kayu <?= $item['tabel']; ?> <?= $item['satuan_kayu']; ?> menipis. 
                                                        <?php if ($item['jumlah_kubik'] <= 10 && $item['jumlah_potong'] <= 50): ?>
                                                            Di stok kubik tersisa <?= $item['jumlah_kubik']; ?> buah dan di stok potong tersisa <?= $item['jumlah_potong']; ?> potong.
                                                        <?php elseif ($item['jumlah_kubik'] <= 10): ?>
                                                            Di stok kubik tersisa <?= $item['jumlah_kubik']; ?> buah.
                                                        <?php elseif ($item['jumlah_potong'] <= 50): ?>
                                                            Di stok potong tersisa <?= $item['jumlah_potong']; ?> potong.
                                                        <?php else: ?>
                                                            Jumlah stok tidak mencukupi.
                                                        <?php endif; ?>
                                                        Segera isi ulang.
                                                    </a>
                                                    <hr>
                                                <?php endforeach; ?>
                                            </li>
                                            <div class="button-container">
                                                <button id="view-more" style="background: none; border: none; color: blue; cursor: pointer; font-size: 12px; margin-bottom: 10px;">
                                                    Lihat Selengkapnya
                                                </button>
                                             </div>

                                        <?php endif; ?>
                                    </div>
                                <?php else: ?>
                                    <li>
                                        <h5 class="dropdown-header" id="no-notif-header">Tidak Ada Notifikasi</h5>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>

                        <!-- Pengaturan -->
                        <li class="dropdown nav-item">
                            <a href="#" class="nav-link" data-toggle="dropdown">
                                <i class="fas fa-user"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <h5 class="dropdown-header" id="notif-header">Pengaturan</h5>
                                </li>
                                <!-- Link Settings Password hanya untuk user (role 0) -->
                                <?php if ($_SESSION['role'] == 0) { ?>
                                <li>
                                    <a href="setting_profile.php"><i class="fas fa-cog" style="margin-right: 10px;"></i> Settings Password</a>
                                </li>
                                <hr> <!-- Garis pemisah -->
                                <?php } ?>
                                <li>
                                    <a href="logout.php"><i class="fas fa-sign-out-alt" style="margin-right: 10px;"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div> <!-- FINIS NAVBAR DI BAGIAN LAYAR BESAR/DEKSTOP -->
            </div>
        </nav>
    </div>



<!-- MAIN CONTENT DALAM DASBOARD  -->
<div class="main-content">
     <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                    <div class="d-flex justify-content-start align-items-center mb-4">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addItemModal">
                            <i class="fas fa-plus" style="color: white;"></i> Tambah Stok
                        </button>
                        <button class="btn btn-primary ml-2" onclick="exportAllTables()">
                            <i class="fas fa-print" style="color: white;"></i> Print
                        </button>
                    </div>

                    <!-- Modal Tambah Barang -->
                        <div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addItemModalLabel">Tambah Stok Kayu</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <select class="form-control" id="tabelTujuan" name="tabel_tujuan" required>
                                                    <option value="" disabled selected>Pilih jenis kayu</option>
                                                    <option value="stok_miranti">Kayu Miranti</option>
                                                    <option value="stok_samama">Kayu Samama</option>
                                                    <option value="stok_tawang">Kayu Tawang</option>
                                                    <option value="stok_kenari">Kayu Kenari</option>
                                                    <option value="stok_putih">Kayu Putih</option>
                                                    <option value="stok_giawas">Kayu Giawas</option>
                                                    <option value="stok_palaka">Kayu Palaka</option>
                                                    <option value="stok_pule">Kayu Pule</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="satuan_kayu" name="satuan_kayu" placeholder="Satuan kayu" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="number" class="form-control" id="harga_kubik" name="harga_kubik" placeholder="Harga kayu/Kubik" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="number" class="form-control" id="harga_potong" name="harga_potong" placeholder="Harga kayu/potong" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="number" class="form-control" id="jumlah_kubik" name="jumlah_kubik" placeholder="Stok/ kayu/kubik " required>
                                            </div>
                                            <div class="form-group">
                                                <input type="number" class="form-control" id="jumlah_potong" name="jumlah_potong" placeholder="Stok kayu/potong" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-danger">Hapus</button>
                                            <button type="submit" class="btn btn-primary" name="addnewbarang">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <!-- Modal Edit -->
                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Edit Data Stok Kayu</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="function.php" method="POST">
                                        <div class="modal-body">
                                            <input type="hidden" id="edit_id" name="idb">
                                            <input type="hidden" id="edit_tabel_tujuan" name="tabel_tujuan">
                                            <div class="form-group">
                                                <label for="edit_satuan_kayu">Satuan Kayu</label>
                                                <input type="text" class="form-control" id="edit_satuan_kayu" name="satuan_kayu" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_harga_kubik">Harga /KBK</label>
                                                <input type="text" class="form-control" id="edit_harga_kubik" name="harga_kubik" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_harga_potong">Harga /PTG</label>
                                                <input type="text" class="form-control" id="edit_harga_potong" name="harga_potong" required >
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_jumlah_kubik">Stok / KBK</label>
                                                <input type="number" class="form-control" id="edit_jumlah_kubik" name="jumlah_kubik" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_jumlah_potong">Stok / PTG</label>
                                                <input type="number" class="form-control" id="edit_jumlah_potong" name="jumlah_potong" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="editbarang">Ubah Data</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Tabel Stok Miranti -->
                        <div class="stock-card mb-4">
                            <div class="card-header">
                                <div class="table-stock-data"> 
                                    <span>Data Tabel Stok Kayu Miranti</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>Satuan</th>
                                                        <th>Harga /KBK</th>
                                                        <th>Harga /PTG</th>
                                                        <th>Stok / KBK</th>
                                                        <th>Stok / PTG</th>
                                                        <th class="<?= ($_SESSION['role'] == 1) ? '' : 'd-none'; ?>">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php

                                                $total_kubik = 0;
                                                $total_potong = 0;
                                                
                                                $ambilsemuadatastock = mysqli_query($conn, "SELECT * FROM stok_miranti");
                                                $i = 1;
                                                while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                                    $idb = $data['id_miranti'];
                                                    $satuan_kayu = $data['satuan_kayu'];
                                                    $harga_kubik = $data['harga_kubik'];
                                                    $harga_potong = $data['harga_potong'];
                                                    $jumlah_kubik = abs($data['jumlah_kubik']); 
                                                    $jumlah_potong = abs($data['jumlah_potong']); 
                                                    

                                                    $harga_kubik_formatted = 'Rp ' . number_format($harga_kubik, 0, ',', '.');
                                                    $harga_potong_formatted = 'Rp ' . number_format($harga_potong, 0, ',', '.');
                                
                                                    $total_kubik += $jumlah_kubik;
                                                    $total_potong += $jumlah_potong;
                                                ?>
                                                <tr>
                                                    <td><?=$i++;?></td>
                                                    <td><?=$satuan_kayu;?><sup> m</sup></td>
                                                    <td><?=$harga_kubik_formatted;?></td>
                                                    <td><?=$harga_potong_formatted;?></td>
                                                    <td><?= $jumlah_kubik; ?> m<sup>3</sup></td>
                                                    <td><?=$jumlah_potong;?></td>
                                                    <td class="<?= ($_SESSION['role'] == 1) ? 'd-flex justify-content-center align-items-center' : 'd-none'; ?>">
                                                    <?php if ($_SESSION['role'] == 1) { // Cek apakah pengguna adalah admin ?>
                                                            <button type="button" class="btn btn-custom btn-edit" 
                                                                data-id="<?=$idb;?>"
                                                                data-tabel="stok_miranti"
                                                                data-satuan="<?=$satuan_kayu;?>"
                                                                data-harga-kubik="<?=$harga_kubik;?>"
                                                                data-harga-potong="<?=$harga_potong;?>"
                                                                data-jumlah-kubik="<?=$jumlah_kubik;?>"
                                                                data-jumlah-potong="<?=$jumlah_potong;?>"
                                                                data-toggle="modal" data-target="#editModal">
                                                                <i class="fas fa-pencil-alt" style="color: black;"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-custom hapus-barang" data-id="<?=$idb;?>" data-tabel="stok_miranti">
                                                                <i class="fas fa-trash-alt" style="color: black;"></i>
                                                            </button>
                                                        <?php } ?>
                                                    </td>
                                                </tr>  
                                            <?php } ?>
                                            </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="4" style="font-size: 16px; padding-left: 10px;">Total</th>
                                                        <th class="text-center" style="color: red; font-size: 16px;"><?=abs($total_kubik);?></th> 
                                                        <th class="text-center" style="color: red; font-size: 16px;"><?=abs($total_potong);?></th> 
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="4" style="font-size: 16px; padding-left: 10px;">Total Keseluruhan</th>
                                                        <th colspan="2" class="text-center" style="color: red; font-size: 16px;"><?=abs($total_kubik + $total_potong);?></th> 
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Tabel Stok Samama -->
                                <div class="stock-card mb-4">
                                    <div class="card-header">
                                        <div class="table-stock-data">
                                            <span>Data Tabel Stok Kayu Samama</span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>NO</th>
                                                            <th>Satuan</th>
                                                            <th>Harga /KBK</th>
                                                            <th>Harga /PTG</th>
                                                            <th>Stok / KBK</th>
                                                            <th>Stok / PTG</th>
                                                            <th class="<?= ($_SESSION['role'] == 1) ? '' : 'd-none'; ?>">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php

                                                            $total_kubik = 0;
                                                            $total_potong = 0;

                                                            $ambilsemuadatastock = mysqli_query($conn, "SELECT * FROM stok_samama");
                                                            $i = 1;
                                                            $total_kubik = 0;
                                                            $total_potong = 0;
                                                            while($data = mysqli_fetch_array($ambilsemuadatastock)){
                                                                $idb = $data['id_samama'];
                                                                $satuan_kayu = $data['satuan_kayu'];
                                                                $harga_kubik = $data['harga_kubik'];
                                                                $harga_potong = $data['harga_potong'];
                                                                $jumlah_kubik = abs($data['jumlah_kubik']); 
                                                                $jumlah_potong = abs($data['jumlah_potong']); 

                                                                $harga_kubik_formatted = 'Rp ' . number_format($harga_kubik, 0, ',', '.');
                                                                $harga_potong_formatted = 'Rp ' . number_format($harga_potong, 0, ',', '.');
                                            
                                                                $total_kubik += $jumlah_kubik;
                                                                $total_potong += $jumlah_potong;
                                                            ?>
                                                            <tr>
                                                                <td><?=$i++;?></td>
                                                                <td><?=$satuan_kayu;?><sup> m</sup></td>
                                                                <td><?=$harga_kubik_formatted;?></td>
                                                                <td><?=$harga_potong_formatted;?></td>
                                                                <td><?= $jumlah_kubik; ?> m<sup>3</sup></td>
                                                                <td><?=$jumlah_potong;?></td>
                                                                <td class="<?= ($_SESSION['role'] == 1) ? 'd-flex justify-content-center align-items-center' : 'd-none'; ?>">
                                                                <?php if ($_SESSION['role'] == 1) { // di Cek apakah pengguna adalah admin ?>
                                                                        <button type="button" class="btn btn-custom btn-edit" 
                                                                            data-id="<?=$idb;?>"
                                                                            data-tabel="stok_samama"
                                                                            data-satuan="<?=$satuan_kayu;?>"
                                                                            data-harga-kubik="<?=$harga_kubik;?>"
                                                                            data-harga-potong="<?=$harga_potong;?>"
                                                                            data-jumlah-kubik="<?=$jumlah_kubik;?>"
                                                                            data-jumlah-potong="<?=$jumlah_potong;?>"
                                                                            data-toggle="modal" data-target="#editModal">
                                                                            <i class="fas fa-pencil-alt" style="color: black;"></i>
                                                                        </button>
                                                                        <button type="button" class="btn btn-custom hapus-barang" data-id="<?=$idb;?>" data-tabel="stok_samama">
                                                                            <i class="fas fa-trash-alt" style="color: black;"></i>
                                                                        </button>
                                                                    <?php } ?>
                                                                 </td>
                                                             </tr>
                                                         <?php } ?>
                                                        </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th colspan="4" style="font-size: 16px; padding-left: 10px;">Total</th>
                                                                    <th class="text-center" style="color: red; font-size: 16px;"><?=abs($total_kubik);?></th> 
                                                                    <th class="text-center" style="color: red; font-size: 16px;"><?=abs($total_potong);?></th> 
                                                                    <th></th>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan="4" style="font-size: 16px; padding-left: 10px;">Total Keseluruhan</th>
                                                                    <th colspan="2" class="text-center" style="color: red; font-size: 16px;"><?=abs($total_kubik + $total_potong);?></th> 
                                                                    <th></th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Tabel Stok Tawang -->
                                            <div class="stock-card mb-4">
                                                    <div class="card-header">
                                                        <div class="table-stock-data">
                                                            <span>Data Tabel Stok Kayu Tawang</span>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                        <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                                                            <thead>
                                                                    <tr>
                                                                        <th>NO</th>
                                                                        <th>Satuan</th>
                                                                        <th>Harga /KBK</th>
                                                                        <th>Harga /PTG</th>
                                                                        <th>Stok / KBK</th>
                                                                        <th>Stok / PTG</th>
                                                                        <th class="<?= ($_SESSION['role'] == 1) ? '' : 'd-none'; ?>">Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                        $total_kubik = 0;
                                                                        $total_potong = 0;

                                                                        $ambilsemuadatastock = mysqli_query($conn, "SELECT * FROM stok_tawang");
                                                                        $i = 1;
                                                                        while($data=mysqli_fetch_array ($ambilsemuadatastock)){
                                                                            $idb = $data['id_tawang'];
                                                                            $satuan_kayu = $data['satuan_kayu'];
                                                                            $harga_kubik = $data['harga_kubik'];
                                                                            $harga_potong = $data['harga_potong'];
                                                                            $jumlah_kubik = abs($data['jumlah_kubik']); 
                                                                            $jumlah_potong = abs($data['jumlah_potong']);  

                                                                            $harga_kubik_formatted = 'Rp ' . number_format($harga_kubik, 0, ',', '.');
                                                                            $harga_potong_formatted = 'Rp ' . number_format($harga_potong, 0, ',', '.');
                                                        
                                                                            $total_kubik += $jumlah_kubik;
                                                                            $total_potong += $jumlah_potong;
                                                                        ?>
                                                                        <tr>
                                                                            <td><?=$i++;?></td>
                                                                            <td><?=$satuan_kayu;?><sup> m</sup></td>
                                                                            <td><?=$harga_kubik_formatted;?></td>
                                                                            <td><?=$harga_potong_formatted;?></td>
                                                                            <td><?= $jumlah_kubik; ?> m<sup>3</sup></td>
                                                                            <td><?=$jumlah_potong;?></td>
                                                                            <td class="<?= ($_SESSION['role'] == 1) ? 'd-flex justify-content-center align-items-center' : 'd-none'; ?>">
                                                                            <?php if ($_SESSION['role'] == 1) { // Cek apakah pengguna adalah admin ?>
                                                                                    <button type="button" class="btn btn-custom btn-edit" 
                                                                                        data-id="<?=$idb;?>"
                                                                                        data-tabel="stok_tawang"
                                                                                        data-satuan="<?=$satuan_kayu;?>"
                                                                                        data-harga-kubik="<?=$harga_kubik;?>"
                                                                                        data-harga-potong="<?=$harga_potong;?>"
                                                                                        data-jumlah-kubik="<?=$jumlah_kubik;?>"
                                                                                        data-jumlah-potong="<?=$jumlah_potong;?>"
                                                                                        data-toggle="modal" data-target="#editModal">
                                                                                        <i class="fas fa-pencil-alt" style="color: black;"></i>
                                                                                    </button>
                                                                                    <button type="button" class="btn btn-custom hapus-barang" data-id="<?=$idb;?>" data-tabel="stok_tawang">
                                                                                        <i class="fas fa-trash-alt" style="color: black;"></i>
                                                                                    </button>
                                                                                <?php } ?>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                    </tbody>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <th colspan="4" style="font-size: 16px; padding-left: 10px;">Total</th>
                                                                                <th class="text-center" style="color: red; font-size: 16px;"><?=abs($total_kubik);?></th> 
                                                                                <th class="text-center" style="color: red; font-size: 16px;"><?=abs($total_potong);?></th> 
                                                                                <th></th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th colspan="4" style="font-size: 16px; padding-left: 10px;">Total Keseluruhan</th>
                                                                                <th colspan="2" class="text-center" style="color: red; font-size: 16px;"><?=abs($total_kubik + $total_potong);?></th> 
                                                                                <th></th>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Tabel Stok Kenari -->
                                                        <div class="stock-card mb-4">
                                                            <div class="card-header">
                                                                <div class="table-stock-data">
                                                                    <span>Data Tabel Stok Kayu Kenari</span>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                <table class="table table-bordered" id="dataTable4" width="100%" cellspacing="0">
                                                                    <thead>
                                                                            <tr>
                                                                                <th>NO</th>
                                                                                <th>Satuan</th>
                                                                                <th>Harga /KBK</th>
                                                                                <th>Harga /PTG</th>
                                                                                <th>Stok / KBK</th>
                                                                                <th>Stok / PTG</th>
                                                                                <th class="<?= ($_SESSION['role'] == 1) ? '' : 'd-none'; ?>">Aksi</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                                $total_kubik = 0;
                                                                                $total_potong = 0;

                                                                                $ambilsemuadatastock = mysqli_query($conn, "SELECT * FROM stok_kenari");
                                                                                $i = 1;
                                                                                while($data=mysqli_fetch_array ($ambilsemuadatastock)){
                                                                                    $idb = $data['id_kenari'];
                                                                                    $satuan_kayu = $data['satuan_kayu'];
                                                                                    $harga_kubik = $data['harga_kubik'];
                                                                                    $harga_potong = $data['harga_potong'];
                                                                                    $jumlah_kubik = abs($data['jumlah_kubik']); 
                                                                                    $jumlah_potong = abs($data['jumlah_potong']); 

                                                                                    $harga_kubik_formatted = 'Rp ' . number_format($harga_kubik, 0, ',', '.');
                                                                                    $harga_potong_formatted = 'Rp ' . number_format($harga_potong, 0, ',', '.');
                                                                
                                                                                    $total_kubik += $jumlah_kubik;
                                                                                    $total_potong += $jumlah_potong;
                                                                                ?>
                                                                                <tr>
                                                                                    <td><?=$i++;?></td>
                                                                                    <td><?=$satuan_kayu;?><sup> m</sup></td>
                                                                                    <td><?=$harga_kubik_formatted;?></td>
                                                                                    <td><?=$harga_potong_formatted;?></td>
                                                                                    <td><?= $jumlah_kubik; ?> m<sup>3</sup></td>
                                                                                    <td><?=$jumlah_potong;?></td>
                                                                                    <td class="<?= ($_SESSION['role'] == 1) ? 'd-flex justify-content-center align-items-center' : 'd-none'; ?>">
                                                                                    <?php if ($_SESSION['role'] == 1) { // Cek apakah pengguna adalah admin ?>
                                                                                            <button type="button" class="btn btn-custom btn-edit" 
                                                                                                data-id="<?=$idb;?>"
                                                                                                data-tabel="stok_kenari"
                                                                                                data-satuan="<?=$satuan_kayu;?>"
                                                                                                data-harga-kubik="<?=$harga_kubik;?>"
                                                                                                data-harga-potong="<?=$harga_potong;?>"
                                                                                                data-jumlah-kubik="<?=$jumlah_kubik;?>"
                                                                                                data-jumlah-potong="<?=$jumlah_potong;?>"
                                                                                                data-toggle="modal" data-target="#editModal">
                                                                                                <i class="fas fa-pencil-alt" style="color: black;"></i>
                                                                                            </button>
                                                                                            <button type="button" class="btn btn-custom hapus-barang" data-id="<?=$idb;?>" data-tabel="stok_kenari">
                                                                                                <i class="fas fa-trash-alt" style="color: black;"></i>
                                                                                            </button>
                                                                                        <?php } ?>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php } ?>
                                                                            </tbody>
                                                                                <tfoot>
                                                                                    <tr>
                                                                                        <th colspan="4" style="font-size: 16px; padding-left: 10px;">Total</th>
                                                                                        <th class="text-center" style="color: red; font-size: 16px;"><?=abs($total_kubik);?></th> 
                                                                                        <th class="text-center" style="color: red; font-size: 16px;"><?=abs($total_potong);?></th> 
                                                                                        <th></th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th colspan="4" style="font-size: 16px; padding-left: 10px;">Total Keseluruhan</th>
                                                                                        <th colspan="2" class="text-center" style="color: red; font-size: 16px;"><?=abs($total_kubik + $total_potong);?></th> 
                                                                                        <th></th>
                                                                                    </tr>
                                                                                </tfoot>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Tabel Stok putih -->
                                                                <div class="stock-card mb-4">
                                                                    <div class="card-header">
                                                                        <div class="table-stock-data">
                                                                            <span>Data Tabel Stok Kayu Putih</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="table-responsive">
                                                                        <table class="table table-bordered" id="dataTable5" width="100%" cellspacing="0">
                                                                            <thead>
                                                                                    <tr>
                                                                                        <th>NO</th>
                                                                                        <th>Satuan</th>
                                                                                        <th>Harga /KBK</th>
                                                                                        <th>Harga /PTG</th>
                                                                                        <th>Stok / KBK</th>
                                                                                        <th>Stok / PTG</th>
                                                                                        <th class="<?= ($_SESSION['role'] == 1) ? '' : 'd-none'; ?>">Aksi</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php
                                                                                        $total_kubik = 0;
                                                                                        $total_potong = 0;

                                                                                        $ambilsemuadatastock = mysqli_query($conn, "SELECT * FROM stok_putih");
                                                                                        $i = 1;
                                                                                        while($data=mysqli_fetch_array ($ambilsemuadatastock)){
                                                                                            $idb = $data['id_putih'];
                                                                                            $satuan_kayu = $data['satuan_kayu'];
                                                                                            $harga_kubik = $data['harga_kubik'];
                                                                                            $harga_potong = $data['harga_potong'];
                                                                                            $jumlah_kubik = abs($data['jumlah_kubik']); 
                                                                                            $jumlah_potong = abs($data['jumlah_potong']); 

                                                                                            $harga_kubik_formatted = 'Rp ' . number_format($harga_kubik, 0, ',', '.');
                                                                                            $harga_potong_formatted = 'Rp ' . number_format($harga_potong, 0, ',', '.');
                                                                        
                                                                                            $total_kubik += $jumlah_kubik;
                                                                                                $total_potong += $jumlah_potong;
                                                                                        ?>
                                                                                        <tr>
                                                                                            <td><?=$i++;?></td>
                                                                                            <td><?=$satuan_kayu;?><sup> m</sup></td>
                                                                                            <td><?=$harga_kubik_formatted;?></td>
                                                                                            <td><?=$harga_potong_formatted;?></td>
                                                                                            <td><?= $jumlah_kubik; ?> m<sup>3</sup></td>
                                                                                            <td><?=$jumlah_potong;?></td>
                                                                                            <td class="<?= ($_SESSION['role'] == 1) ? 'd-flex justify-content-center align-items-center' : 'd-none'; ?>">
                                                                                            <?php if ($_SESSION['role'] == 1) { // Cek apakah pengguna adalah admin ?>
                                                                                                    <button type="button" class="btn btn-custom btn-edit" 
                                                                                                        data-id="<?=$idb;?>"
                                                                                                        data-tabel="stok_putih"
                                                                                                        data-satuan="<?=$satuan_kayu;?>"
                                                                                                        data-harga-kubik="<?=$harga_kubik;?>"
                                                                                                        data-harga-potong="<?=$harga_potong;?>"
                                                                                                        data-jumlah-kubik="<?=$jumlah_kubik;?>"
                                                                                                        data-jumlah-potong="<?=$jumlah_potong;?>"
                                                                                                        data-toggle="modal" data-target="#editModal">
                                                                                                        <i class="fas fa-pencil-alt" style="color: black;"></i>
                                                                                                    </button>
                                                                                                    <button type="button" class="btn btn-custom hapus-barang" data-id="<?=$idb;?>" data-tabel="stok_putih">
                                                                                                        <i class="fas fa-trash-alt" style="color: black;"></i>
                                                                                                    </button>
                                                                                            <?php } ?>
                                                                                        </td>
                                                                                    </tr>
                                                                                <?php } ?>
                                                                                </tbody>
                                                                                    <tfoot>
                                                                                        <tr>
                                                                                            <th colspan="4" style="font-size: 16px; padding-left: 10px;">Total</th>
                                                                                            <th class="text-center" style="color: red; font-size: 16px;"><?=abs($total_kubik);?></th> 
                                                                                            <th class="text-center" style="color: red; font-size: 16px;"><?=abs($total_potong);?></th> 
                                                                                            <th></th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th colspan="4" style="font-size: 16px; padding-left: 10px;">Total Keseluruhan</th>
                                                                                            <th colspan="2" class="text-center" style="color: red; font-size: 16px;"><?=abs($total_kubik + $total_potong);?></th> 
                                                                                            <th></th>
                                                                                        </tr>
                                                                                    </tfoot>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Tabel Stok giawas -->
                                                                    <div class="stock-card mb-4">
                                                                    <div class="card-header">
                                                                        <div class="table-stock-data">
                                                                            <span>Data Tabel Stok Kayu Giawas</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="table-responsive">
                                                                        <table class="table table-bordered" id="dataTable6" width="100%" cellspacing="0">
                                                                            <thead>
                                                                                    <tr>
                                                                                        <th>NO</th>
                                                                                        <th>Satuan</th>
                                                                                        <th>Harga /KBK</th>
                                                                                        <th>Harga /PTG</th>
                                                                                        <th>Stok / KBK</th>
                                                                                        <th>Stok / PTG</th>
                                                                                        <th class="<?= ($_SESSION['role'] == 1) ? '' : 'd-none'; ?>">Aksi</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php
                                                                                        $total_kubik = 0;
                                                                                        $total_potong = 0;

                                                                                        $ambilsemuadatastock = mysqli_query($conn, "SELECT * FROM stok_giawas");
                                                                                        $i = 1;
                                                                                        while($data=mysqli_fetch_array ($ambilsemuadatastock)){
                                                                                            $idb = $data['id_giawas'];
                                                                                            $satuan_kayu = $data['satuan_kayu'];
                                                                                            $harga_kubik = $data['harga_kubik'];
                                                                                            $harga_potong = $data['harga_potong'];
                                                                                            $jumlah_kubik = abs($data['jumlah_kubik']); 
                                                                                            $jumlah_potong = abs($data['jumlah_potong']); 

                                                                                            $harga_kubik_formatted = 'Rp ' . number_format($harga_kubik, 0, ',', '.');
                                                                                            $harga_potong_formatted = 'Rp ' . number_format($harga_potong, 0, ',', '.');
                                                                        
                                                                                            $total_kubik += $jumlah_kubik;
                                                                                            $total_potong += $jumlah_potong;
                                                                                        ?>
                                                                                        <tr>
                                                                                            <td><?=$i++;?></td>
                                                                                            <td><?=$satuan_kayu;?><sup> m</sup></td>
                                                                                            <td><?=$harga_kubik_formatted;?></td>
                                                                                            <td><?=$harga_potong_formatted;?></td>
                                                                                            <td><?= $jumlah_kubik; ?> m<sup>3</sup></td>
                                                                                            <td><?=$jumlah_potong;?></td>
                                                                                        <td class="<?= ($_SESSION['role'] == 1) ? 'd-flex justify-content-center align-items-center' : 'd-none'; ?>">
                                                                                            <?php if ($_SESSION['role'] == 1) { // Cek apakah pengguna adalah admin ?>
                                                                                                    <button type="button" class="btn btn-custom btn-edit" 
                                                                                                        data-id="<?=$idb;?>"
                                                                                                        data-tabel="stok_giawas"
                                                                                                        data-satuan="<?=$satuan_kayu;?>"
                                                                                                        data-harga-kubik="<?=$harga_kubik;?>"
                                                                                                        data-harga-potong="<?=$harga_potong;?>"
                                                                                                        data-jumlah-kubik="<?=$jumlah_kubik;?>"
                                                                                                        data-jumlah-potong="<?=$jumlah_potong;?>"
                                                                                                        data-toggle="modal" data-target="#editModal">
                                                                                                        <i class="fas fa-pencil-alt" style="color: black;"></i>
                                                                                                    </button>
                                                                                                    <button type="button" class="btn btn-custom hapus-barang" data-id="<?=$idb;?>" data-tabel="stok_giawas">
                                                                                                        <i class="fas fa-trash-alt" style="color: black;"></i>
                                                                                                    </button>
                                                                                            <?php } ?>
                                                                                        </td>
                                                                                    </tr>
                                                                                <?php } ?>
                                                                            </tbody>
                                                                                <tfoot>
                                                                                    <tr>
                                                                                        <th colspan="4" style="font-size: 16px; padding-left: 10px;">Total</th>
                                                                                        <th class="text-center" style="color: red; font-size: 16px;"><?=abs($total_kubik);?></th> 
                                                                                        <th class="text-center" style="color: red; font-size: 16px;"><?=abs($total_potong);?></th> 
                                                                                        <th></th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th colspan="4" style="font-size: 16px; padding-left: 10px;">Total Keseluruhan</th>
                                                                                        <th colspan="2" class="text-center" style="color: red; font-size: 16px;"><?=abs($total_kubik + $total_potong);?></th> 
                                                                                        <th></th>
                                                                                    </tr>
                                                                                </tfoot>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Tabel Stok palaka -->
                                                                <div class="stock-card mb-4">
                                                                    <div class="card-header">
                                                                        <div class="table-stock-data">
                                                                            <span>Data Tabel Stok Kayu Palaka</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="table-responsive">
                                                                        <table class="table table-bordered" id="dataTable7" width="100%" cellspacing="0">
                                                                            <thead>
                                                                                    <tr>
                                                                                        <th>NO</th>
                                                                                        <th>Satuan</th>
                                                                                        <th>Harga /KBK</th>
                                                                                        <th>Harga /PTG</th>
                                                                                        <th>Stok / KBK</th>
                                                                                        <th>Stok / PTG</th>
                                                                                        <th class="<?= ($_SESSION['role'] == 1) ? '' : 'd-none'; ?>">Aksi</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php
                                                                                        $total_kubik = 0;
                                                                                        $total_potong = 0;

                                                                                        $ambilsemuadatastock = mysqli_query($conn, "SELECT * FROM stok_palaka");
                                                                                        $i = 1;
                                                                                        while($data=mysqli_fetch_array ($ambilsemuadatastock)){
                                                                                            $idb = $data['id_palaka'];
                                                                                            $satuan_kayu = $data['satuan_kayu'];
                                                                                            $harga_kubik = $data['harga_kubik'];
                                                                                            $harga_potong = $data['harga_potong'];
                                                                                            $jumlah_kubik = abs($data['jumlah_kubik']); 
                                                                                            $jumlah_potong = abs($data['jumlah_potong']); 
                                                                                            
                                                                                            $harga_kubik_formatted = 'Rp ' . number_format($harga_kubik, 0, ',', '.');
                                                                                            $harga_potong_formatted = 'Rp ' . number_format($harga_potong, 0, ',', '.');
                                                                        
                                                                                            $total_kubik += $jumlah_kubik;
                                                                                            $total_potong += $jumlah_potong;
                                                                                        ?>
                                                                                        <tr>
                                                                                            <td><?=$i++;?></td>
                                                                                            <td><?=$satuan_kayu;?><sup> m</sup></td>
                                                                                            <td><?=$harga_kubik_formatted;?></td>
                                                                                            <td><?=$harga_potong_formatted;?></td>
                                                                                            <td><?= $jumlah_kubik; ?> m<sup>3</sup></td>
                                                                                            <td><?=$jumlah_potong;?></td>>
                                                                                            <td class="<?= ($_SESSION['role'] == 1) ? 'd-flex justify-content-center align-items-center' : 'd-none'; ?>">
                                                                                            <?php if ($_SESSION['role'] == 1) { // Cek apakah pengguna adalah admin ?>
                                                                                                    <button type="button" class="btn btn-custom btn-edit" 
                                                                                                        data-id="<?=$idb;?>"
                                                                                                        data-tabel="stok_palaka"
                                                                                                        data-satuan="<?=$satuan_kayu;?>"
                                                                                                        data-harga-kubik="<?=$harga_kubik;?>"
                                                                                                        data-harga-potong="<?=$harga_potong;?>"
                                                                                                        data-jumlah-kubik="<?=$jumlah_kubik;?>"
                                                                                                        data-jumlah-potong="<?=$jumlah_potong;?>"
                                                                                                        data-toggle="modal" data-target="#editModal">
                                                                                                        <i class="fas fa-pencil-alt" style="color: black;"></i>
                                                                                                    </button>
                                                                                                    <button type="button" class="btn btn-custom hapus-barang" data-id="<?=$idb;?>" data-tabel="stok_palaka">
                                                                                                        <i class="fas fa-trash-alt" style="color: black;"></i>
                                                                                                    </button>
                                                                                                <?php } ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                <?php } ?>
                                                                                </tbody>
                                                                                    <tfoot>
                                                                                        <tr>
                                                                                            <th colspan="4" style="font-size: 16px; padding-left: 10px;">Total</th>
                                                                                            <th class="text-center" style="color: red; font-size: 16px;"><?=abs($total_kubik);?></th> 
                                                                                            <th class="text-center" style="color: red; font-size: 16px;"><?=abs($total_potong);?></th> 
                                                                                            <th></th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th colspan="4" style="font-size: 16px; padding-left: 10px;">Total Keseluruhan</th>
                                                                                            <th colspan="2" class="text-center" style="color: red; font-size: 16px;"><?=abs($total_kubik + $total_potong);?></th> 
                                                                                            <th></th>
                                                                                        </tr>
                                                                                    </tfoot>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Tabel Stok pule -->
                                                                    <div class="stock-card mb-4">
                                                                        <div class="card-header">
                                                                            <div class="table-stock-data">
                                                                                <span>Data Tabel Stok Kayu Pule</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="table-responsive">
                                                                            <table class="table table-bordered" id="dataTable8" width="100%" cellspacing="0">
                                                                                <thead>
                                                                                        <tr>
                                                                                            <th>NO</th>
                                                                                            <th>Satuan</th>
                                                                                            <th>Harga /KBK</th>
                                                                                            <th>Harga /PTG</th>
                                                                                            <th>Stok / KBK</th>
                                                                                            <th>Stok / PTG</th>
                                                                                            <th class="<?= ($_SESSION['role'] == 1) ? '' : 'd-none'; ?>">Aksi</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <?php
                                                                                            $total_kubik = 0;
                                                                                            $total_potong = 0;

                                                                                            $ambilsemuadatastock = mysqli_query($conn, "SELECT * FROM stok_pule");
                                                                                            $i = 1;
                                                                                            while($data=mysqli_fetch_array ($ambilsemuadatastock)){
                                                                                                $idb = $data['id_pule'];
                                                                                                $satuan_kayu = $data['satuan_kayu'];
                                                                                                $harga_kubik = $data['harga_kubik'];
                                                                                                $harga_potong = $data['harga_potong'];
                                                                                                $jumlah_kubik = abs($data['jumlah_kubik']); 
                                                                                                $jumlah_potong = abs($data['jumlah_potong']); 

                                                                                                $harga_kubik_formatted = 'Rp ' . number_format($harga_kubik, 0, ',', '.');
                                                                                                $harga_potong_formatted = 'Rp ' . number_format($harga_potong, 0, ',', '.');
                                                                            
                                                                                                $total_kubik += $jumlah_kubik;
                                                                                                $total_potong += $jumlah_potong;
                                                                                            ?>
                                                                                            <tr>
                                                                                                <td><?=$i++;?></td>
                                                                                                <td><?=$satuan_kayu;?><sup> m</sup></td>
                                                                                                <td><?=$harga_kubik_formatted;?></td>
                                                                                                <td><?=$harga_potong_formatted;?></td>
                                                                                                <td><?= $jumlah_kubik; ?> m<sup>3</sup></td>
                                                                                                <td><?=$jumlah_potong;?></td>
                                                                                                    <td class="<?= ($_SESSION['role'] == 1) ? 'd-flex justify-content-center align-items-center' : 'd-none'; ?>">  
                                                                                                    <?php if ($_SESSION['role'] == 1) { // Cek apakah pengguna adalah admin ?>
                                                                                                    <button type="button" class="btn btn-custom btn-edit" 
                                                                                                        data-id="<?=$idb;?>"
                                                                                                        data-tabel="stok_pule"
                                                                                                        data-satuan="<?=$satuan_kayu;?>"
                                                                                                        data-harga-kubik="<?=$harga_kubik;?>"
                                                                                                        data-harga-potong="<?=$harga_potong;?>"
                                                                                                        data-jumlah-kubik="<?=$jumlah_kubik;?>"
                                                                                                        data-jumlah-potong="<?=$jumlah_potong;?>"
                                                                                                        data-toggle="modal" data-target="#editModal">
                                                                                                        <i class="fas fa-pencil-alt" style="color: black;"></i>
                                                                                                    </button>
                                                                                                    <button type="button" class="btn btn-custom hapus-barang" data-id="<?=$idb;?>" data-tabel="stok_pule">
                                                                                                        <i class="fas fa-trash-alt" style="color: black;"></i>
                                                                                                    </button>
                                                                                            <?php } ?>
                                                                                        </td>
                                                                                </tr>
                                                                            <?php } ?>
                                                                                </tbody>
                                                                                    <tfoot>
                                                                                        <tr>
                                                                                            <th colspan="4" style="font-size: 16px; padding-left: 10px;">Total</th>
                                                                                            <th class="text-center" style="color: red; font-size: 16px;"><?=abs($total_kubik);?></th> 
                                                                                            <th class="text-center" style="color: red; font-size: 16px;"><?=abs($total_potong);?></th> 
                                                                                            <th></th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th colspan="4" style="font-size: 16px; padding-left: 10px;">Total Keseluruhan</th>
                                                                                            <th colspan="2" class="text-center" style="color: red; font-size: 16px;"><?=abs($total_kubik + $total_potong);?></th> 
                                                                                            <th></th>
                                                                                        </tr>
                                                                                    </tfoot>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>                
                                                                </main>                     
                                                            </div>
                                                        </div>
                                                    </div>

                    
  <!-- source untuk navbar -->      
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <!-- source untu chart -->   
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<!-- source datatable -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

<!-- Untuk menagtur Responsive Bar -->
<script src="js/Responsiv_sidebar-navbar.js"></script>
<!-- Untuk PDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.18/jspdf.plugin.autotable.min.js"></script>
<!-- untuk sweat alert notifikasi tambah,edit,hapus -->
<script src="js/sweatalert_stok.js"></script>
<!-- untuk fitur print(format PDF) -->
<script src="js/pdf_stok.js"></script>
<script src="js/edit_delete_stok.js"></script>
        

<script type="text/javascript">
// =============UNTUK FUNGSI NOTIFIKASI NAVBAR================
    document.addEventListener('DOMContentLoaded', function() {
        var lowStockCount = <?php echo $low_stock_count; ?>;
        var notificationElement = document.querySelector('.notification');
        if (lowStockCount > 0) {
            notificationElement.textContent = lowStockCount;
        } else {
            notificationElement.style.display = 'none';
        }
    });

// =============UNTUK MENAMPILKAN DATATABLE DI 8 TABEL DENGAN BEDA ID================
        $(document).ready(function() {
            $('#dataTable1').DataTable();
            $('#dataTable2').DataTable();
            $('#dataTable3').DataTable();
            $('#dataTable4').DataTable();
            $('#dataTable5').DataTable();
            $('#dataTable6').DataTable();
            $('#dataTable7').DataTable();
            $('#dataTable8').DataTable();
        
        });

        window.onload = function() {
        var currentUrl = window.location.href;
        document.addEventListener("keydown", function(event) {
            if (event.keyCode === 116) {
                window.location.href = currentUrl;
            }
        });
    };


// =============SWEAT ALERT TAMBAH DATA=========================
window.onload = function () {
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');
    const message = urlParams.get('message');

    if (status === 'success') {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Data Stok berhasil ditambahkan.',
            showConfirmButton: true,
            customClass: {
                popup: 'swal2-smaller-popup swal2-add-success-popup',
                title: 'swal2-smaller-title',
                content: 'swal2-smaller-content',
                confirmButton: 'swal2-ok-button'
            }
        });
        removeUrlParameter('status');
    } else if (status === 'error&message') {
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: message || 'Data Stok gagal ditambahkan.',
            showConfirmButton: true,
            customClass: {
                popup: 'swal2-smaller-popup swal2-add-error-popup',
                title: 'swal2-smaller-title',
                content: 'swal2-smaller-content',
                confirmButton: 'swal2-ok-button'
            }
        });
        removeUrlParameter('status');
        removeUrlParameter('message');
    }
};

// Function to remove URL parameter
function removeUrlParameter(param) {
    const url = new URL(window.location);
    url.searchParams.delete(param);
    window.history.replaceState({}, document.title, url);
}


// =============JS NAVBAR DI BAGIAN LAYAR KECIL UNTUK TOMBOL BUTTON KLIK==============//
    document.addEventListener("DOMContentLoaded", function() {
        var toggleButton = document.getElementById('toggle-more');
        var moreNotifications = document.getElementById('more-notifications');
        var notificationMenu = document.getElementById('notification-menu');

        toggleButton.addEventListener('click', function(event) {
            event.preventDefault();
            event.stopPropagation(); 
            if (moreNotifications.style.display === "none" || moreNotifications.style.display === "") {
                moreNotifications.style.display = "block";
                toggleButton.textContent = "Sembunyikan";
            } else {
                moreNotifications.style.display = "none";
                toggleButton.textContent = "Lihat Selengkapnya";
            }
        });
        notificationMenu.addEventListener('click', function(event) {
            event.stopPropagation(); 
        });
    });

    // Button untuk menampilkan navbar custom-navbar-menu//
    document.getElementById('toggle-navbar-menu').addEventListener('click', function() {
        var menu = document.getElementById('custom-navbar-menu');
        if (menu.classList.contains('show-menu')) {
            menu.classList.remove('show-menu');
        } else {
            menu.classList.add('show-menu');
        }
    });

//=================JS NAVBAR DI BAGIAN LAYAR DEKSTOP UNTUK TOMBOL BUTTON KLIK=================// 
    document.addEventListener('DOMContentLoaded', function() {
        const viewMoreButton = document.getElementById('view-more');
        const hiddenNotifications = document.getElementById('hidden-notifications');
        viewMoreButton.addEventListener('click', function(event) {
            event.stopPropagation();

            if (hiddenNotifications.style.display === 'none') {
                hiddenNotifications.style.display = 'block';
                viewMoreButton.textContent = 'Sembunyikan';
            } else {
                hiddenNotifications.style.display = 'none';
                viewMoreButton.textContent = 'Lihat Selengkapnya';
            }
        });
    });
</script>
        <footer >
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small" style="background: none;">
                    <div class="text-muted">Copyright © UD.Tunggal Putra 2024</div>
                </div>
            </div>
        </footer>
    </body>
</html>