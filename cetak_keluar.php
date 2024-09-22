<?php
require 'function.php';

$ambilsemuadatastock = null;
if (isset($_POST['filter'])) {
    $tanggal_awal = $_POST['tanggal_awal'];
    $tanggal_akhir = $_POST['tanggal_akhir'];
    $ambilsemuadatastock = mysqli_query($conn, "SELECT * FROM barang_keluar WHERE tanggal_keluar BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
}
?>

<!Doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>UD.Tunggal Putra/Laporan Barang KELUAR</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">

    <!-- css3 -->
    <link rel="stylesheet" href="css/tabel.kayu.css">
    <link rel="stylesheet" href="css/sidebar_navbar.css">

    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- google material icon -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Carter+One&display=swap" rel="stylesheet">

        <style>
            .form-inline .form-control, .form-inline .btn {
                margin-right: 10px;
            }

            .form-inline .form-control:last-child, .form-inline .btn:last-child {
                margin-right: 0;
            }

            .form-inline label {
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 0;
                color: black;
                padding-right: 10px;
            }

            .header-container {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .print-icon {
                font-size: 15px;
                color: white;
                background-color: #1d7ade;
                border-radius: 5px;
                padding: 10px;
                cursor: pointer;
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }

            .card-tanggal {
                padding: 0.75rem 1.25rem;
                margin-bottom: 0;
                border-bottom: 1px solid rgba(0, 0, 0, 0.125);
                justify-content: space-between;
                align-items: center;
            }

            .header-container h4 {
                margin: 0;
                color: #5d5d5d;
                font-size: 20px;
            }

            .header-container .btn {
                margin-top: 0;
            }

            .card-body {
                flex: 1 1 auto;
                min-height: 1px;
                padding: 1.25rem;
                overflow: hidden;
            }

            div.dataTables_wrapper div.dataTables_info {
                display: none;
            }

            footer .text-muted {
                transform: translateX(100px);
            }

            @media print {
                body * {
                    visibility: hidden;
                }

                .col-sm-12, .col-sm-12 * {
                    visibility: visible;
                }

                .col-sm-12 {
                    position: absolute;
                    left: 0;
                    top: 0;
                    width: 100%;
                }
                td {
                    text-transform: none; 
                    font-size: inherit;   
                }

                .print-icon {
                    display: none;
                }
            }

            @media print {
                .print-header {
                    display: block !important;
                    text-align: center !important;
                    margin-bottom: 20px !important;
                }

                .print-header h1, .print-header h2 {
                    margin: 0 !important;
                    font-size: 20px !important;
                }

                body * {
                    visibility: hidden;
                }

                .print-section, .print-section * {
                    visibility: visible !important;
                }

                .print-section {
                    position: absolute;
                    left: 0;
                    top: 0;
                    width: 100%;
                }
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
                            <a href="stock.php" class="nav-link" data-toggle="dropdown" id="notification-toggle">
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



 <!-- MAIN CONTENT DALAM DASBOARD -->
 <div class="main-content">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-tanggal">
                            <form method="post" class="form-inline">
                                <label for="tanggal_awal" class="mr-2">Tanggal Awal</label>
                                <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control" style="margin-right: 40px;">
                                <label for="tanggal_akhir" class="mr-2">Tanggal Akhir</label>
                                <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control mr-2">
                                <button type="submit" name="filter" class="btn btn-primary" style="margin-left: 10px;">Filter</button>
                            </form>
                        </div>
                        <div class="card-header">
                            <div class="card-judul">
                                <div class="header-container">
                                    <h4 class="hide-on-small">LAPORAN BARANG KELUAR</h4>
                                    <i class="fas fa-print print-icon" onclick="window.print()"></i>
                                </div>
                            </div>
                        </div>
                         <div class="card-body">
                              <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Keluar</th>
                                            <th>Nama Kayu</th>
                                            <th>Satuan Kayu</th>
                                            <th>Jumlah Kubik</th>
                                            <th>Jumlah Potong</th>
                                            <th>Nama Penerima</th>
                                            <th>Lokasi Tujuan</th>
                                            <th>Catatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if ($ambilsemuadatastock) {
                                        $i = 1;
                                        while ($data = mysqli_fetch_array($ambilsemuadatastock)) {
                                            $idk = $data['id_keluar'];
                                            $tanggal_keluar = $data['tanggal_keluar'];
                                            $nama_barang = $data['nama_barang'];
                                            $satuan_kayu = $data['satuan_kayu'];
                                            $jumlah_kubik = $data['jumlah_kubik'];
                                            $jumlah_potong = $data['jumlah_potong'];
                                            $penerima = $data['penerima'];
                                            $lokasi_tujuan = $data['lokasi_tujuan'];
                                            $catatan_keluar = $data['catatan_keluar'];


                                    ?>
                                            <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $tanggal_keluar; ?></td>
                                            <td><?= $nama_barang; ?></td>
                                            <td><?=$satuan_kayu; ?><sup> m</sup></td>
                                            <td><?= $jumlah_kubik; ?> m<sup>3</sup></td>
                                            <td><?= $jumlah_potong; ?></td>
                                            <td><?= $penerima; ?></td>
                                            <td><?= $lokasi_tujuan; ?></td>
                                            <td><?= $catatan_keluar; ?></td>
                                        </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>


<!-- source untuk navbar --> 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <!-- source datatable -->  
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-demo.js"></script>
<!-- Untuk menagtur Responsive Bar -->
<script src="js/Responsiv_sidebar-navbar.js"></script>



<script type="text/javascript">
//=================JS UNTUK PRINT=================// 
    f (!$.fn.DataTable.isDataTable('#dataTable')) {
    $('#dataTable').DataTable({
        "paging": true,
        "searching": true,
        "ordering": true,
        "info": true
    });
    }
    if (performance.navigation.type === 1) {
            window.location.href = "cetak_keluar.php";
        }

        // Fungsi cetak
        $('.print-icon').on('click', function () {
            window.print();
     });
</script>





 <!-- JS NAVBAR DI BAGIAN LAYAR KECIL UNTUK TOMBOL BUTTON KLIK -->
 <script>
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

    // BUTTON UNTUK MENAMPILKAN NAVBAR custom-navbar-menu//
    document.getElementById('toggle-navbar-menu').addEventListener('click', function() {
        var menu = document.getElementById('custom-navbar-menu');
        if (menu.classList.contains('show-menu')) {
            menu.classList.remove('show-menu');
        } else {
            menu.classList.add('show-menu');
        }
    });
</script>



 <!-- JS NAVBAR DI BAGIAN LAYAR DEKSTOP UNTUK TOMBOL BUTTON KLIK -->
<script>   
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