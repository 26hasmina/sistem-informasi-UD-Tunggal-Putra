<?php
require 'function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>UD.Tunggal Putra/Barang Keluar</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="css/tabel.kayu.css">
    <link rel="stylesheet" href="css/sidebar_navbar.css">

    <!-- Slider Revolution 4.x CSS Settings -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Carter+One&display=swap" rel="stylesheet">

    <!-- SweetAlert2 Notifications -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.min.css" rel="stylesheet"> 

    <style>
        /* CSS UNTUK NOTIFIKASI SWEAT ALERT*/
        .swal2-cancel-button {
            background-color: #d33;
            color: white;
            border: none;
            padding: 15px 10px;
            border-radius: 5px;
            font-size: 12px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .swal2-cancel-button:hover {
            background-color: #c9302c;
        }
        /* CSS ATUR PADDING & UKURAN FONT DI DALAM COLUM (th)*/
        table.dataTable thead>tr>th.sorting_asc,
        table.dataTable thead>tr>th.sorting_desc,
        table.dataTable thead>tr>th.sorting,
        table.dataTable thead>tr>td.sorting_asc,
        table.dataTable thead>tr>td.sorting_desc,
        table.dataTable thead>tr>td.sorting {
            padding-right: 30px;
            padding: 10px;
            font-size: 15px;
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
                    <div class="card">
                        <div class="card-header">
                        <div class="table-data">
                            <i class="fas fa-table"></i>
                            <span class="hide-on-small">TABEL BARANG KELUAR</span>
                        </div>
                         <div class="button-group">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            <i class="fas fa-plus" style="color: white;"></i>Tambah
                            </button>
                             <button type="button" class="btn btn-success" id="exportExcel">
                                <i class="fas fa-file-excel" style="color: white;"></i> Excel
                            </button>
                            <button type="button" class="btn btn-secondary" id="exportPdf">
                                <i class="fas fa-print" style="color: white;"></i> Print
                            </button>
                             </div>
                         </div>
                            <!-- Modal Tambah Barang Keluar -->
                            <div class="modal fade" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Tambah Kayu Keluar</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <form method="post" action="function.php">
                                            <div class="modal-body">
                                                <input type="date" name="tanggal_keluar" class="form-control" required>
                                                <br>
                                                <select name="nama_tabel" class="form-control" required>
                                                    <option value="" disabled selected>Pilih Tabel Stok Kayu</option>
                                                    <?php
                                                    // Daftar nama_tabel stok kayu
                                                    $tabels = ['stok_miranti' => 'miranti', 'stok_samama' => 'samama', 'stok_tawang' => 'tawang', 'stok_kenari' => 'kenari', 'stok_putih' => 'putih', 'stok_giawas' => 'giawas', 'stok_palaka' => 'palaka', 'stok_pule' => 'pule'];

                                                    // Loop untuk menampilkan nama-nama tabel
                                                    foreach ($tabels as $tabel => $jenis_kayu) {
                                                        echo '<option value="' . $tabel . '">' . ucfirst($jenis_kayu) . '</option>';
                                                    }
                                                    ?>
                                                </select>

                                                <br>
                                                <select name="satuan_ukuran" class="form-control" required>
                                                    <option value="" disabled selected>Pilih Satuan Kayu</option>
                                                    <?php
                                                    // Daftar tabel stok kayu
                                                    $tabels = ['stok_miranti', 'stok_samama', 'stok_tawang', 'stok_kenari', 'stok_putih', 'stok_giawas', 'stok_palaka', 'stok_pule'];

                                                    // Loop untuk mengambil satuan kayu dari setiap tabel
                                                    foreach ($tabels as $tabel) {
                                                        $query_satuan = mysqli_query($conn, "SELECT DISTINCT satuan_kayu FROM $tabel");
                                                        while ($row = mysqli_fetch_assoc($query_satuan)) {
                                                            // Format nama opsi dengan jenis satuan kayu dan jenis kayu
                                                            $jenis_kayu = substr($tabel, 5);
                                                            echo '<option value="' . $row['satuan_kayu'] . '">' . $row['satuan_kayu'] . ' - ' . ucfirst($jenis_kayu) . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <br>
                                                <input type="number" name="jumlah_kubik" class="form-control" placeholder="Jumlah kubik" required>
                                                <br>
                                                <input type="number" name="jumlah_potong" class="form-control" placeholder="Jumlah potong" required>
                                                <br>
                                                <input type="text" name="penerima" class="form-control" placeholder="Penerima" required>
                                                <br>
                                                <input type="text" name="lokasi_tujuan" class="form-control" placeholder="Lokasi Tujuan" required>
                                                <br>
                                                <textarea name="catatan_keluar" class="form-control" placeholder="Catatan"></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="reset" class="btn btn-danger">Hapus</button>
                                                <button type="submit" class="btn btn-primary" name="addbarangkeluar">Simpan</button>
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
                                                <th>No</th>
                                                <th>Tanggal Keluar</th>
                                                <th>Nama Kayu</th>
                                                <th>Satuan Kayu</th>
                                                <th>Jumlah Kubik</th>
                                                <th>Jumlah Potong</th>
                                                <th>Nama Penerima</th>
                                                <th>Lokasi Tujuan</th>
                                                <th>Catatan</th>
                                                <th class="<?= ($_SESSION['role'] == 1) ? '' : 'd-none'; ?>">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $ambilsemuadatastock = mysqli_query($conn, "SELECT * FROM barang_keluar");
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
                                                <td><?=$satuan_kayu;?><sup> m</sup></td>
                                                <td><?= $jumlah_kubik; ?> m<sup>3</sup></td>
                                                <td><?= $jumlah_potong; ?></td>
                                                <td><?= $penerima; ?></td>
                                                <td><?= $lokasi_tujuan; ?></td>
                                                <td><?= $catatan_keluar; ?></td>
                                                <td class="<?= ($_SESSION['role'] == 1) ? 'd-flex justify-content-center align-items-center' : 'd-none'; ?>">
                                                <?php if ($_SESSION['role'] == 1) { // Cek apakah pengguna adalah admin ?>
                                                    <button type="button" class="btn btn-custom mr-2" data-toggle="modal" data-target="#edit<?= $idk; ?>">
                                                        <i class="fas fa-pencil-alt" style="color: black;"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-custom" onclick="confirmDelete(<?=$idk;?>)">
                                                        <i class="fas fa-trash-alt" style="color: black;"></i>
                                                    </button>
                                                <?php } ?>
                                            </td>
                                        </tr>

                                            <!-- Edit Modal Barang Keluar -->
                                        <div class="modal fade" id="edit<?=$idk;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Kayu Keluar</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <!-- Modal Body -->
                                                    <form method="post" action="function.php">
                                                        <div class="modal-body">
                                                            <label for="tanggal_keluar">Tanggal Keluar</label>
                                                            <input type="date" id="tanggal_keluar" name="tanggal_keluar" value="<?=$tanggal_keluar;?>" class="form-control" required>
                                                            <br>
                                                            
                                                            <label for="nama_tabel">Tabel Stok Kayu</label>
                                                            <select id="nama_tabel" name="nama_tabel" class="form-control" required>
                                                                <option value="" disabled>Pilih Tabel Stok Kayu</option>
                                                                <?php
                                                                $tabels = ['stok_miranti', 'stok_samama', 'stok_tawang', 'stok_kenari', 'stok_putih', 'stok_giawas', 'stok_palaka', 'stok_pule'];
                                                                foreach ($tabels as $tabel) {
                                                                    $jenis_kayu = substr($tabel, 5);
                                                                    $selected = ($jenis_kayu === strtolower($nama_barang)) ? 'selected' : ''; 
                                                                    echo '<option value="' . $tabel . '" ' . $selected . '>' . ucfirst($jenis_kayu) . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                            <br>
                                                            
                                                            <label for="satuan_ukuran">Satuan Kayu</label>
                                                            <select id="satuan_ukuran" name="satuan_ukuran" class="form-control" required>
                                                                <option value="" disabled>Pilih Satuan Kayu</option>
                                                                <?php
                                                                foreach ($tabels as $tabel) {
                                                                    $query_satuan = mysqli_query($conn, "SELECT DISTINCT satuan_kayu FROM $tabel");
                                                                    if (!$query_satuan) {
                                                                        die("Query failed: " . mysqli_error($conn));
                                                                    }
                                                                    while ($row = mysqli_fetch_assoc($query_satuan)) {
                                                                        $jenis_kayu = substr($tabel, 5);
                                                                        $selected = ($row['satuan_kayu'] == $satuan_kayu) ? 'selected' : '';
                                                                        echo '<option value="' . $row['satuan_kayu'] . '" ' . $selected . '>' . $row['satuan_kayu'] . ' - ' . ucfirst($jenis_kayu) . '</option>';
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                            <br>
                                                            
                                                            <label for="jumlah_kubik">Jumlah Kubik</label>
                                                            <input type="number" id="jumlah_kubik" name="jumlah_kubik" value="<?=$jumlah_kubik;?>" class="form-control" placeholder="Jumlah kubik" required>
                                                            <br>
                                                            
                                                            <label for="jumlah_potong">Jumlah Potong</label>
                                                            <input type="number" id="jumlah_potong" name="jumlah_potong" value="<?=$jumlah_potong;?>" class="form-control" placeholder="Jumlah potong" required>
                                                            <br>
                                                            
                                                            <label for="penerima">Nama Penerima</label>
                                                            <input type="text" id="penerima" name="penerima" value="<?=$penerima;?>" class="form-control" placeholder="Nama penerima" required>
                                                            <br>
                                                            
                                                            <label for="lokasi_tujuan">Lokasi</label>
                                                            <input type="text" id="lokasi_tujuan" name="lokasi_tujuan" value="<?=$lokasi_tujuan;?>" class="form-control" placeholder="Lokasi" required>
                                                            <br>
                                                            
                                                            <label for="catatan_keluar">Catatan</label>
                                                            <textarea id="catatan_keluar" name="catatan_keluar" class="form-control" placeholder="Catatan"><?=$catatan_keluar;?></textarea>
                                                            <br>
                                                            
                                                            <input type="hidden" name="id_keluar" value="<?=$idk;?>">
                                                            
                                                            <!-- Modal Footer -->
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary" name="updatebarangkeluar">Ubah Data</button>
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
                
<!-- Untuk menagtur tabel -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<!-- source datatable -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-demo.js"></script>

<!-- Untuk menagtur Responsive Bar -->
<script src="js/Responsiv_sidebar-navbar.js"></script>
<!-- Untuk Excel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
<!-- Untuk PDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.18/jspdf.plugin.autotable.min.js"></script>scripts
<!-- source js exel dan pdf -->
<script src="js/exel_pdf_barang_keluar.js"></script>
<!-- untuk sweat alert notifikasi tambah,edit,hapus -->
<script src="js/sweatalert_keluar.js"></script>


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
        // Menangkap elemen tombol dan konten tersembunyi
        const viewMoreButton = document.getElementById('view-more');
        const hiddenNotifications = document.getElementById('hidden-notifications');

        // Menambahkan event listener untuk tombol "Lihat Selengkapnya"
        viewMoreButton.addEventListener('click', function(event) {
            // Menghentikan propagasi event
            event.stopPropagation();

            // Mengubah tampilan elemen yang tersembunyi
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
