<?php
require 'function.php';
?>

<!Doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>UD.Tunggal Putra/Supplier</title>

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

    <!-- google material icon -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Carter+One&display=swap" rel="stylesheet">
    
    <!-- Sweat Alert2 Notifikasi data -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.min.css" rel="stylesheet">

        <style>
        /* CSS UNTUK MENYEBUNYIKAN COLUM AKSI PADA (th)*/
        .d-none {
            display: none;
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
                        <div class="card mb-4">
                            <div class="card-header">
                            <div class="table-data">
                                <i class="fas fa-table"></i>
                                <span class="hide-on-small">TABEL DATA SUPPLIER</span>
                            </div>
                                <div class="button-group">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                        <i class="fas fa-plus" style="color: white;"></i> Tambah
                                    </button>
                                    <button type="button" class="btn btn-success" id="exportExcel">
                                        <i class="fas fa-file-excel" style="color: white;"></i> Excel
                                    </button>
                                    <button type="button" class="btn btn-secondary" id="exportPdf">
                                        <i class="fas fa-print" style="color: white;"></i> Print
                                    </button>
                                </div>
                            </div>
                            <!-- The Modal -->
                            <div class="modal fade" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Tambah Supplier</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal Body -->
                                        <form method="post">
                                            <div class="modal-body">
                                                <input type="text" name="nama_supplier" placeholder="Nama Supplier" class="form-control" required>
                                                <br>
                                                <input type="text" name="no_telp" placeholder="Kontak" class="form-control" required>
                                                <br>
                                                <input type="text" name="email" placeholder="Email" class="form-control" required>
                                                <br>
                                                <input type="text" name="alamat" placeholder="Alamat" class="form-control" required>
                                                <br>
                                                <textarea name="catatan_supplier" id="catatan_supplier" placeholder="Catatan" class="form-control"></textarea>
                                            </div>

                                            <!-- Modal Footer -->
                                            <div class="modal-footer">
                                                <button type="reset" class="btn btn-danger">Hapus</button>
                                                <button type="submit" class="btn btn-primary" name="addnewsuplier">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive"> 
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID Supplier</th>
                                                <th>Nama Supplier</th>
                                                <th>Kontak</th>
                                                <th>Email</th>
                                                <th>Alamat</th>
                                                <th>Catatan</th>
                                                <th class="<?= ($_SESSION['role'] == 1) ? '' : 'd-none'; ?>">Aksi</th>
                                            </tr>
                                        </thead> 
                                        <tbody>

                                            <?php
                                                $ambilsemuadatasupplier = mysqli_query($conn, "SELECT * FROM supplier");
                                                $i = 1;
                                                while($data=mysqli_fetch_array ($ambilsemuadatasupplier)){
                                                    $ids = $data['id_supplier'];
                                                    $namasupplier = $data['nama_supplier'];
                                                    $kontak = $data['no_telp'];
                                                    $email = $data['email'];
                                                    $alamat = $data['alamat'];
                                                    $catatan_sp = $data['catatan_supplier'];
                                                

                                           ?>

                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$namasupplier;?></td>
                                                <td><?=$kontak;?></td>
                                                <td><?=$email;?></td>
                                                <td><?=$alamat;?></td>
                                                <td><?=$catatan_sp;?></td>
                                                <td class="<?= ($_SESSION['role'] == 1) ? 'd-flex justify-content-center align-items-center' : 'd-none'; ?>">
                                                <?php if ($_SESSION['role'] == 1) { // Cek apakah pengguna adalah admin ?>
                                                <button type="button" class="btn btn-custom mr-2" data-toggle="modal" data-target="#edit<?=$ids;?>">
                                                    <i class="fas fa-pencil-alt" style="color: black;"></i>
                                                </button>
                                                <button type="button" class="btn btn-custom" onclick="confirmDelete(<?=$ids;?>)">
                                                    <i class="fas fa-trash-alt" style="color: black;"></i>
                                                </button>
                                                <?php } ?>
                                            </td>
                                        </tr>
                  
                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="edit<?=$ids;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Data Supplier</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal Body -->
                                                    <form method="post">
                                                        <div class="modal-body">
                                                            <label for="nama_supplier">Nama Supplier</label>
                                                            <input type="text" id="nama_supplier" name="nama_supplier" value="<?=$namasupplier;?>" class="form-control" required>
                                                            <br>
                                                            
                                                            <label for="no_telp">Nomor Telepon</label>
                                                            <input type="text" id="no_telp" name="no_telp" value="<?=$kontak;?>" class="form-control" required>
                                                            <br>
                                                            
                                                            <label for="email">Email</label>
                                                            <input type="text" id="email" name="email" value="<?=$email;?>" class="form-control" required>
                                                            <br>
                                                            
                                                            <label for="alamat">Alamat</label>
                                                            <input type="text" id="alamat" name="alamat" value="<?=$alamat;?>" class="form-control" required>
                                                            <br>
                                                            
                                                            <label for="catatan_supplier">Catatan</label>
                                                            <textarea id="catatan_supplier" name="catatan_supplier" class="form-control" required><?=$catatan_sp;?></textarea>
                                                            <br>
                                                            
                                                            <input type="hidden" name="id_supplier" value="<?=$ids;?>">

                                                            <!-- Modal Footer -->
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary" name="updatsupplier">Ubah Data</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                        };
                                        ?>

                                    </tbody>
                                </table>
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
<!-- Untuk Excel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
<!-- Untuk PDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.18/jspdf.plugin.autotable.min.js"></script>
<!-- source js exel dan pdf -->
<script src="js/exel_pdf_supplier.js"></script>
<!-- Untuk menagtur Responsive Bar -->
<script src="js/Responsiv_sidebar-navbar.js"></script>
<!-- untuk sweat alert notifikasi tambah,edit,hapus -->
<script src="js/sweatalert_supplier.js"></script>

        
        
 <script>
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
        <footer>
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small" style="background: none;">
                    <div class="text-muted">Copyright © UD.Tunggal Putra 2024</div>
                </div>
            </div>
        </footer>
    </body>
</html>
