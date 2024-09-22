<?php
require 'function.php';

    date_default_timezone_set('Asia/Jayapura');

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['log'])) {
        header("Location: login.php");
        exit();
}

?>


 <!-- js dougnut terhubung dengan data ada function.php -->
<script>
    const jenisBarangData = <?php echo json_encode($jenisBarangData); ?>;
</script>

 <!-- js bar terhubung dengan data yang ada function.php-->
<script>
var jenisBarangData = <?php echo $nama_barang_json; ?>;
</script>


<!Doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>UD.Tunggal Putra/Dasboard</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- css3 -->

    <link rel="stylesheet" href="css/custom.css">
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    
    <!-- google material icon -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>

    <!-- Font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Carter+One&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">


        <style> 
            .custom-table {
                margin: 10px;
                height: 350px;
                position: relative;
                margin-top: 30px;
            }

            .table {
                width: 100%; 
                border-collapse: collapse; 
            }

            .table th, .table td {
                padding: 12px; 
                text-align: left; 
                border-bottom: 1px solid #ddd; 
            }

            .table th {
                position: sticky; 
                top: 0; 
                z-index: 10; 
            }

            .table tbody tr:hover {
                background-color: #f1f1f1; 
            }

            .table .bg-white {
                background-color: #ffffff; 
            }

            .table .text-Alice-Blue {
                color: #f0f8ff; 
            }

            .table-bordered {
                border: 1px solid #ddd; 
            }

            .table-bordered th, .table-bordered td {
                border: 1px solid #ddd; 
            }
            div.dataTables_wrapper div.dataTables_paginate ul.pagination {
                margin: 2px 0;
                white-space: nowrap;
                justify-content: flex-end;
                font-size: 12px;
                margin-top: 10px;
            }
            /* hilangkan (Showing 1 to 4 of 4 entries) */
            div.dataTables_wrapper div.dataTables_info {
                display: none;
            }
            /* hilangkan (Show 10 entries) */
            div.dataTables_wrapper div.dataTables_length label {
                display: none;
            }
            /* hilangkan (tanda panah pada tabel th)) */
            table.dataTable thead .sorting:before,
            table.dataTable thead .sorting_asc:before,
            table.dataTable thead .sorting_desc:before,
            table.dataTable thead .sorting_asc_disabled:before,
            table.dataTable thead .sorting_desc_disabled:before {
                display: none;
            }
            /* hilangkan (tanda panah pada tabel th)) */
            .sorting:after,
            table.dataTable thead .sorting_asc:after,
            table.dataTable thead .sorting_desc:after,
            table.dataTable thead .sorting_asc_disabled:after,
            table.dataTable thead .sorting_desc_disabled:after {
                display: none;
            }
            /* hilangkan (tanda panah pada tabel th)) */
            table.dataTable thead .sorting:after,
            table.dataTable thead .sorting_asc:after,
            table.dataTable thead .sorting_desc:after,
            table.dataTable thead .sorting_asc_disabled:after,
            table.dataTable thead .sorting_desc_disabled:after {
                display: none;
            }
            .search-left {
                display: flex;
                justify-content: flex-start;
                margin-bottom: 1rem; 
            }
            .table-data {
                display: flex;
                align-items: center;
                justify-content: space-between; 
                padding: 10px;
                background-color: white; 
                border-bottom: 2px solid #cccccc; 
                border-radius: 10px 10px 0 0;
            }

            .table-data i {
                font-size: 1.5em; 
                margin-right: 10px; 
            }

            .table-data #tableTitle {
                flex: 1; 
            }

            .table-data a.text-primary {
                color: #007bff; 
                text-decoration: none; 
                padding: 5px 10px;
            }

            .table-data a.text-primary:hover {
                text-decoration: underline;
            }
            .card .card-content {
                position: relative;
                line-height: 1.8;
            }
            thead th {
            background-color: #ffffff; 
            box-shadow: 0px 2px 3px rgba(0, 0, 0, 0.1), 
                        0px -1px 0px rgba(255, 255, 255, 0.5) inset; 
            padding: 10px;
            border-bottom: 2px solid #dee2e6; 
            text-shadow: 1px 1px 1px rgba(255, 255, 255, 0.6); 
            }

            .custom-table {
                overflow: auto; 
                max-height: 400px; 
            }

            .custom-table::-webkit-scrollbar {
                width: 5px; 
                height: 5px; 
            }

            .custom-table::-webkit-scrollbar-track {
                background: #f1f1f1; 
                border-radius: 10px;
            }

            .custom-table::-webkit-scrollbar-thumb {
                background: #d3d3d3; 
                border-radius: 10px;
            }

            .custom-table::-webkit-scrollbar-thumb:hover {
                background: #b0b0b0; 
            }

            footer .text-muted {
                transform: translateX(100px);
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
        <!-- Link Manajemen Admin hanya untuk admin yang lihat-->
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
                        <a href="#" class="nav-link" data-toggle="dropdown" id="notification-toggle">
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
                                        <li>
                                            <a href="#" id="toggle-more" style="color: blue;">Lihat Selengkapnya</a>
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
                            <li>
                                <a href="setting_profile.php"><i class="fas fa-cog" style="margin-right: 10px;"></i> Settings Password</a>
                            </li>
                            <hr> <!-- Garis pemisah -->
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
                            <a href="stock.php" class="nav-link" data-toggle="dropdown" id="notification-toggle">
                                <i class="fas fa-bell"></i>
                                <?php if ($low_stock_count > 0): ?>
                                    <span class="notification-badge"><?=$low_stock_count;?></span>
                                <?php endif; ?>
                            </a>
                            <ul class="dropdown-menu" id="notification-menu">
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
                                            <ul>
                                            <div class="flex-center">
                                                <a href="#" id="toggle-more">Lihat Selengkapnya</a>
                                            </div>
                                        </ul>
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

<!-- 4 KARTU CARD ROW INFORMASI-->
 <div class="main-content">
        <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats card-3d ">
                <div class="card-header">
                    <div class="icon icon-warning">
                        <i class="fas fa-boxes"></i>
                    </div>
                </div>
                <div class="card-content">
                    <p class="category"><strong>Stok Kayu</strong></p>
                    <h3 class="card-title"><?php echo number_format($total_stock); ?></h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="fas fa-info-circle text-info"></i> Total Stok Kayu
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats card-3d">
        <div class="card-header">
            <div class="icon icon-rose">
                <i class="fas fa-arrow-circle-down"></i>
            </div>
        </div>
        <div class="card-content">
            <p class="category"><strong>Kayu Masuk</strong></p>
            <h3 class="card-title"><?php echo $totalKeseluruhan; ?></h3>
        </div>
        <div class="card-footer">
            <div class="stats">
                <i class="fas fa-info-circle text-info"></i> Total Kayu Masuk Hari Ini
            </div>
        </div>
    </div>
</div>
    <div class="col-lg-3 col-md-6 col-sm-6">
     <div class="card card-stats card-3d">
        <div class="card-header">
            <div class="icon icon-success">
                <i class="fas fa-arrow-circle-up"></i>
            </div>
        </div>
        <div class="card-content">
            <p class="category"><strong>Kayu Keluar</strong></p>
            <h3 class="card-title"><?= $total_keseluruhan; ?></h3>
        </div>
        <div class="card-footer">
            <div class="stats">
                <i class="fas fa-info-circle text-info"></i> Total kayu Keluar Hari Ini
            </div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats card-3d">
        <div class="card-header">
            <div class="icon icon-info">
                <i class="fas fa-users"></i>
            </div>
        </div>
            <div class="card-content">
                <p class="category"><strong>Supplier</strong></p>
                <h3 class="card-title"><?php echo number_format($total_supplier); ?></h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                <i class="fas fa-info-circle text-info"></i>Total Pemasok Aktif Saat ini
                </div>
            </div>
        </div>
    </div>
</div>
<div class="welcome-calendar">
<div class="welcome-card">
    <div class="welcome align-items-center">
        <div class="col-md-4">
            <img src="img/nav.png" alt="" class="img-margin">
        </div>
        <div class="col-md-6" style="margin: 50px;">
            <h4 class="mb-10 text-capitalize">
                <?php
                if (isset($_SESSION['username'])) {
                    echo '<span class="welcome-text">Selamat Datang, </span><span class="weight-600 font-30 text-white bg-light-blue">' . $_SESSION['username'] . '</span>';
                } else {
                    echo '<span class="welcome-text">Selamat Datang!</span><span class="weight-600 font-30 text-blue bg-light-blue">!</span>';
                }
                ?>
            </h4>
            <p class="font-15 max-width-600">Selamat datang di akun Anda, Kami sangat senang Anda kembali. Periksa notifikasi terbaru dan pastikan untuk memanfaatkan semua fitur yang tersedia di akun Anda.</p>
        </div>
    </div>
</div>



   <!-- KELENDER-->
<div class="calendar-card">
        <div class="calendar">
        <div class="calendar-header">
            <button id="prev" class="fas fa-chevron-left"></button>
            <div id="month-year"></div>
            <button id="next" class="fas fa-chevron-right"></button>
        </div>
            <div class="calendar-body">
            <div class="day-names bold">
                    <div>Sun</div>
                    <div>Mon</div>
                    <div>Tue</div>
                    <div>Wed</div>
                    <div>Thu</div>
                    <div>Fri</div>
                    <div>Sat</div>
                </div>
                <div class="days"></div>
            </div>
        </div>
    </div>
</div>
  


<!-- CHART BAR & DOUGNUT-->
<div class="charts">
<div class="chart" id="bar-chart">
        <h4 class="chart-title">Total Stok Kayu dalam Kubik dan Potong</h4>
        <canvas id="barChart" width="400" height="200"></canvas>
    </div>
    <div class="chart" id="doughnut-chart">
        <h4 class="chart-title">Persentase Penjualan kayu</h4>
            <canvas id="doughnut"></canvas>
    </div>
</div>



   <!-- TABEL SUPPLIER-->                                       
<div class="supplier-activities">
    <div class="card card-3d">
        <div class="table-data">
            <i class="fas fa-table"></i>
            <span id="tableTitle">TABEL DATA SUPPLIER</span>
            <a href="supplier.php" class="text-primary">Lihat Selengkapnya</a>
        </div>
        <div class="card-content table-responsive">
            <div class="custom-table">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-white text-Alice-Blue sticky-top">
                        <tr>
                            <th>No</th>
                            <th>Nama Pemasok</th>
                            <th>Kontak</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

                        $ambilsemuadatasupplier = mysqli_query($conn, "SELECT * FROM supplier");
                        $i = 1;
                        while($data = mysqli_fetch_array($ambilsemuadatasupplier)) {
                            $ids = $data['id_supplier'];
                            $namasupplier = $data['nama_supplier'];
                            $kontak = $data['no_telp'];
                            $email = $data['email'];
                            $alamat = $data['alamat'];
                            $catatan_sp = $data['catatan_supplier'];
                         ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $namasupplier; ?></td>
                            <td><?= $kontak; ?></td>
                            <td><?= $email; ?></td>
                            <td><?= $alamat; ?></td>
                            <td><?= $catatan_sp; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


   <!-- ACTIVITIES LOGIN TIME FOR ADMIN  & USER/PENGGUNA-->

            <?php if ($_SESSION['role'] == 1) { ?>  <!-- ACTIVITIES LOGIN TIME FOR ADMIN -->
                    <div class="card card-3d">
                        <div class="card-header-activities">
                            <h4 class="card-title-activities">Timeline Aktivitas Login Admin</h4>
                        </div>
                        <div class="card-content streamline-custom">
                            <div class="streamline">
                                <?php $i = 0; ?>
                                <?php while ($row = mysqli_fetch_assoc($admin_result)) { ?>
                                    <?php
                                        $class = $classes[$i % $class_count];
                                        $i++;
                                    ?>
                                    <div class="sl-item <?php echo $class; ?>">
                                        <div class="sl-content">
                                            <small class="text-muted"><?php echo date('d M Y | H:i', strtotime($row['login_time'])); ?></small>
                                            <p><?php echo $row['username']; ?>  Berhasil Login Di Aplikasi Sebagai Admin</p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div> 
                <?php } ?>

                <?php if ($_SESSION['role'] == 0) { ?> <!-- ACTIVITIES LOGIN TIME FOR USER/PENGGUNA -->
                    <div class="card card-3d">
                        <div class="card-header-activities">
                            <h4 class="card-title-activities">Timeline Aktivitas</h4>
                        </div>
                        <div class="card-content streamline-custom">
                            <div class="streamline">
                                <?php $i = 0; ?>
                                <?php while ($row = mysqli_fetch_assoc($user_result)) { ?>
                                    <?php
                                        $class = $classes[$i % $class_count];
                                        $i++;
                                    ?>
                                    <div class="sl-item <?php echo $class; ?>">
                                        <div class="sl-content">
                                            <small class="text-muted"><?php echo date('d M Y | H:i', strtotime($row['login_time'])); ?></small>
                                            <p><?php echo $row['username']; ?>  Berhasil Login di dalam aplikasi </p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div> <!-- BATAS ACTIVITIES LOGIN TIME -->
                <?php } ?>
            </div>
        </div>
    </div>
</div> 
 



<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
  <!-- source untu chart -->   
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
<script src="js/chart_bar.js"></script>
<script src="js/chart_dougnut.js"></script>
<!-- Untuk Kelender -->
<script src="js/kelender.js"></script>
<!-- Untuk menagtur Responsive Bar -->
<script src="js/Responsiv_sidebar-navbar.js"></script>
<!-- source datatable -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-demo.js"></script>

  
        <script>
        //=========================JS UNTUK CHART BAR===================================//
            var dataAttributes = {
                kubik: {
                    miranti: <?= json_encode($total_kubik_miranti); ?>,
                    samama: <?= json_encode($total_kubik_samama); ?>,
                    tawang: <?= json_encode($total_kubik_tawang); ?>,
                    kenari: <?= json_encode($total_kubik_kenari); ?>,
                    putih: <?= json_encode($total_kubik_putih); ?>,
                    giawas: <?= json_encode($total_kubik_giawas); ?>,
                    palaka: <?= json_encode($total_kubik_palaka); ?>,
                    pule: <?= json_encode($total_kubik_pule); ?>,
                },
                potong: {
                    miranti: <?= json_encode($total_potong_miranti); ?>,
                    samama: <?= json_encode($total_potong_samama); ?>,
                    tawang: <?= json_encode($total_potong_tawang); ?>,
                    kenari: <?= json_encode($total_potong_kenari); ?>,
                    putih: <?= json_encode($total_potong_putih); ?>,
                    giawas: <?= json_encode($total_potong_giawas); ?>,
                    palaka: <?= json_encode($total_potong_palaka); ?>,
                    pule: <?= json_encode($total_potong_pule); ?>,
                }
            };



        //===============JS NAVBAR DI BAGIAN LAYAR DEKSTOP UNTUK TOMBOL BUTTON KLIK=============//
            document.addEventListener('DOMContentLoaded', function() {
            var toggleMoreDesktopButton = document.querySelector('.d-lg-block #toggle-more');
            var moreNotificationsDesktop = document.querySelector('.d-lg-block #more-notifications');
            var isDesktopExpanded = false;

            if (toggleMoreDesktopButton) {
                toggleMoreDesktopButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    isDesktopExpanded = !isDesktopExpanded;

                    if (isDesktopExpanded) {
                        moreNotificationsDesktop.style.display = 'block';
                        toggleMoreDesktopButton.textContent = 'Sembunyikan';
                    } else {
                        moreNotificationsDesktop.style.display = 'none';
                        toggleMoreDesktopButton.textContent = 'Lihat Selengkapnya';
                    }
                });
            }

            var desktopNotificationMenu = document.querySelector('.d-lg-block #notification-menu');
            if (desktopNotificationMenu) {
                desktopNotificationMenu.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            }
        });


        //===============JS NAVBAR DI BAGIAN LAYAR KECIL MEMBUKA NAVBAR BARU custom-navbar-menu=============//
                document.addEventListener('DOMContentLoaded', function() {
                    var toggleButton = document.getElementById('toggle-navbar-menu');
                    var customNavbarMenu = document.getElementById('custom-navbar-menu');

                    
                    toggleButton.addEventListener('click', function() {
                        if (customNavbarMenu.style.visibility === 'hidden' || customNavbarMenu.style.visibility === '') {
                            customNavbarMenu.style.visibility = 'visible';
                            customNavbarMenu.style.opacity = '1';
                        } else {
                            customNavbarMenu.style.visibility = 'hidden';
                            customNavbarMenu.style.opacity = '0';
                        }
                    });
                });

                // UNTUK BUTTON "Lihat Selengkapnya" & "Sembunyikan"
                document.addEventListener('DOMContentLoaded', function() {
                var toggleMoreButton = document.getElementById('toggle-more');
                var moreNotifications = document.getElementById('more-notifications');
                var notificationToggle = document.getElementById('notification-toggle');
                var notificationMenu = document.getElementById('notification-menu');
                var isExpanded = false;

                if (toggleMoreButton) {
                    toggleMoreButton.addEventListener('click', function(e) {
                        e.preventDefault();
                        isExpanded = !isExpanded;

                        if (isExpanded) {
                            moreNotifications.style.display = 'block';
                            toggleMoreButton.textContent = 'Sembunyikan';
                        } else {
                            moreNotifications.style.display = 'none';
                            toggleMoreButton.textContent = 'Lihat Selengkapnya';
                        }
                    });
                }
                notificationMenu.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            });

        </script>
    </body>
</html>