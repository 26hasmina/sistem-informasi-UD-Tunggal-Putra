<?php
session_start();

include 'function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
    <title>UD.Tunggal Putra/Setting Profile</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">

    <!-- css3 -->
    <link rel="stylesheet" href="css/settings_profil.css">
    <link rel="stylesheet" href="css/sidebar_navbar.css">
    
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Carter+One&display=swap" rel="stylesheet">

        <style>
            .alert {
                opacity: 1;
                transition: opacity 0.5s ease-in-out;
            }

            .alert.hide {
                opacity: 0;
                transition: opacity 0.5s ease-in-out;
            }

            .password-container {
                position: relative;
            }

            .password-container .toggle-password {
                position: absolute;
                top: 50%;
                right: 10px;
                transform: translateY(-50%);
                cursor: pointer;
            }

            .outer-container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 90%;
            }

            .custom {
                width: 100%;
                max-width: 800px;
                background-color: #ffffff;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
                border-radius: 8px;
                line-height: 1.8;
            }

            .form-title {
                background-color: #3F51B5;
                padding: 10px;
                color: white;
                text-align: center;
            }

            .custom-box {
                padding: 20px;
                background-color: #ffffff;
                border-radius: 8px;
            }

            .icon-key {
                border-radius: 8px;
                background-color: #3F51B5;
                text-align: center;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .key-icon {
                margin-top: 10px;
                font-size: 34px;
                color: white;
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
                                <li>
                                    <a href="setting_profile.php"><i class="fas fa-cog" style="margin-right: 10px;"></i> Settings Password</a>
                                </li>
                                <hr> <!-- Garis pemisah -->
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

    
 <!-- FORM UNTUK MENGUBAH USERNAME DAN PASSWORD -->
<div class="outer-container">
    <div class="custom">
        <div class="icon-key">
            <i class="fas fa-lock fa-2x key-icon"></i>
                 <h2 class="form-title">Setting Password</h2>
            </div>
            <div class="custom-box">
                <form method="POST" action="">
                    <div class="form-group password-container">
                        <label for="old_password">Password Lama</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Tuliskan Password lama anda">
                            <div class="input-group-append">
                                <span class="input-group-text password-toggle">
                                    <i class="fas fa-eye-slash toggle-password" id="toggleOldPassword"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group password-container">
                        <label for="new_password">Password Baru</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Tuliskan password baru anda">
                            <div class="input-group-append">
                                <span class="input-group-text password-toggle">
                                    <i class="fas fa-eye-slash toggle-password" id="toggleNewPassword"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group password-container">
                        <label for="confirm_password">Konfirmasi Password Baru</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Konfirmasi password baru anda">
                            <div class="input-group-append">
                                <span class="input-group-text password-toggle">
                                    <i class="fas fa-eye-slash toggle-password" id="toggleConfirmPassword"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Ubah Password</button>
                </form>
            </div>
        </div>
    </div>



<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<!-- Untuk menagtur Responsive Bar -->             
<script src="js/Responsiv_sidebar-navbar.js"></script>

        

<script>
    // Notifikasi akan menghilang setelah 3 detik
    setTimeout(function() {
        $('#errorAlert').addClass('hide');
        $('#successAlert').addClass('hide');
    }, 3000);

    // Toggle untuk menampilkan password menjadi text atau password
    $(document).ready(function() {
        $('#toggleOldPassword').click(function() {
            $(this).toggleClass('fa-eye fa-eye-slash');
            var type = $(this).hasClass('fa-eye-slash') ? 'password' : 'text';
            $('#old_password').attr('type', type);
        });

        $('#toggleNewPassword').click(function() {
            $(this).toggleClass('fa-eye fa-eye-slash');
            var type = $(this).hasClass('fa-eye-slash') ? 'password' : 'text';
            $('#new_password').attr('type', type);
        });
        
        $('#toggleConfirmPassword').click(function() {
            $(this).toggleClass('fa-eye fa-eye-slash');
            var type = $(this).hasClass('fa-eye-slash') ? 'password' : 'text';
            $('#confirm_password').attr('type', type);
        });
    });



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

    // BUTTON UNTUK MENAMPILKAN NAVBAR custom-navbar-menu//
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
<footer>
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between small" style="background: none;">
            <div class="text-muted">Copyright © UD.Tunggal Putra 2024</div>
        </div>
    </div>
</footer>
</body>
</html>

