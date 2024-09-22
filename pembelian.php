<?php
require 'function.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_kayu = $_POST['nama_kayu']; // Mengambil nilai dari dropdown

    foreach ($nama_kayu as $kayu) {
        $sql = "INSERT INTO tabel_kayu (nama_kayu) VALUES ('$kayu')";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>UD.Tunggal Putra/Pembelian</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- css3 -->
    <link rel="stylesheet" href="css/tabel.kayu.css">
    <link rel="stylesheet" href="css/sidebar_navbar.css">
    <link rel="stylesheet" href="css/pembelian.css">

    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Google Material Icon -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Carter+One&display=swap" rel="stylesheet">

    <!-- SweetAlert2 Notifikasi data -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.min.css" rel="stylesheet">


        <style>
            .card-kalkulator {
                background-color: white;
                padding: 20px;
                border-radius: 8px;
                border: 1px solid #e0e0e0;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            }

            .table-container {
                max-width: 100%;
                max-height: 400px;
                overflow: auto;
                border: 1px solid #ddd;
                padding: 10px;
                box-sizing: border-box;
            }

            .table-container table {
                width: 100%;
                table-layout: auto;
            }

            .page-header {
                text-align: center;
                margin: 20px 0;
            }

            .page-header h2 {
                font-size: 28px;
                font-weight: bold;
                color: #333;
                margin: 0;
            }

            footer .text-muted {
                transform: translateX(100px);
            }

            .container-select {
                display: flex;
                flex-direction: column;
            }

            .select-kayu {
                order: 2;
            }

            .element-sebelum-select {
                order: 1;
            }
            #notaTable {
                width: 100%;
                border-collapse: collapse;
            }

            #notaTable th,
            #notaTable td {
                padding: 8px;
                text-align: center;
                border: 1px solid #ddd;
            }

            #notaTable thead {
                background-color: #f4f4f4;
            }

            #notaTable tfoot {
                background-color: #eaeaea;
            }

            .inner-container {
                overflow: hidden;
            }
            .col-md-6 {
                display: none;
            }

            @media screen and (max-width: 768px) {
                #notaTable thead,
                #notaTable tfoot {
                    display: none;
                }

                #notaTable,
                #notaTable tbody,
                #notaTable tr {
                    display: block;
                    width: 100%;
                }

                #notaTable tr {
                    margin-bottom: 15px;
                    border: 1px solid #ddd;
                }

                #notaTable td {
                    display: block;
                    text-align: left;
                    padding: 10px;
                    border: none;
                    position: relative;
                }

                #notaTable td::before {
                    content: attr(data-label);
                    position: absolute;
                    left: 0;
                    width: 50%;
                    padding: 10px;
                    font-weight: bold;
                    background: #f4f4f4;
                    border-right: 1px solid #ddd;
                }

                #notaTable td:last-child {
                    border-bottom: 1px solid #ddd;
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
                <button id="toggle-navbar-menu" class="btn btn-primary d-lg-none" style="background: none; border: none; padding: 5px 15px; color: white;">
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


<div class="main-content">
    <div id="layoutSidenav_content">
        <div class="page-header">
            <h2>Nota Kalkulator</h2>
        </div>
            <div class="container-fluid">
                <div class="card1 mb-4">
                    <div class="card-kalkulator">
                        <div class="inner-container">
                            <div class="left-right">
                                <div class="left-section">
                                    <button type="button" class="btn btn-primary" onclick="addRow()" style="color: white;">Tambah Baris</button>
                                </div>
                                <form method="post" id="notaForm">
                                    <div class="button-group">
                                        <button type="button" class="btn btn-primary" onclick="printNota()" style="color: white;">
                                            <i class="fas fa-print"></i> Print
                                        </button>
                                        <button type="submit" class="btn btn-primary" name="simpandata" style="color: white;">Simpan data</button>
                                    </div>
                                    <div class="table-container">
                                    <table class="table table-bordered" id="notaTable" width="100%" cellspacing="0">
                                        <thead class="centered-header">
                                            <tr>
                                                <th><i class="fas fa-cog"></i></th>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Nama Kayu</th>
                                                <th>Ukuran Kayu</th>
                                                <th>Satuan k/p</th> 
                                                <th>Jumlah Kayu</th>
                                                <th>Harga Per Pcs</th>
                                                <th>Subtotal (Rp)</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th colspan="8" style="text-align: left; border-left: none; border-right: none;">Total Keseluruhan (Rp)</th>
                                                <td style="border-left: none; border-right: none; text-align: center; background: #f2f2f2">
                                                    <input type="text" name="total_keseluruhan" id="total" readonly style="text-align: center; border: none; background: none; font-weight: bold; font-size: 16px;">
                                                </td>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr id="row_1" class="centered-row">
                                                <td><button type="button" class="btn-hapus" onclick="deleteRow(1)"><i class="fas fa-times" style="color: red;"></i></button></td>
                                                <td>1</td>
                                                <td><input type="date" name="tanggal[]" required></td>
                                                <td>
                                                <select name="nama_kayu[]" class="form-control custom-select" required>
                                                    <option value="" disabled selected>Jenis Kayu</option>
                                                    <?php
                                                        $tabels = ['miranti', 'samama', 'tawang', 'kenari', 'putih', 'giawas', 'palaka', 'pule'];

                                                        foreach ($tabels as $tabel) {
                                                            $jenis_kayu = 'Kayu ' . ucfirst($tabel);
                                                            echo '<option value="' . $tabel . '">' . $jenis_kayu . '</option>';
                                                        }
                                                    ?>
                                                </select>
                                                </td>
                                                <td>
                                                    <select name="ukuran_kayu[]" class="form-control custom-select" required>
                                                        <option value="" disabled selected>Jenis ukuran</option>
                                                        <?php
                                                        $tabels = ['stok_miranti', 'stok_samama', 'stok_tawang', 'stok_kenari', 'stok_putih', 'stok_giawas', 'stok_palaka', 'stok_pule'];

                                                        foreach ($tabels as $tabel) {
                                                            $query_satuan = mysqli_query($conn, "SELECT DISTINCT satuan_kayu FROM $tabel");
                                                            if (!$query_satuan) {
                                                                die("Query failed: " . mysqli_error($conn)); 
                                                            }
                                                            while ($row = mysqli_fetch_assoc($query_satuan)) {
                                                                $jenis_kayu = substr($tabel, 5); 
                                                                echo '<option value="' . $row['satuan_kayu'] . '">' . $row['satuan_kayu'] . ' - ' . ucfirst($jenis_kayu) . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="satuan_k_p[]" class="form-control custom-select" required>
                                                        <option value="" disabled selected>Jenis satuan</option>
                                                        <option value="kubik">Kubik</option>
                                                        <option value="potong">Potong</option>
                                                    </select>
                                                </td> 
                                                <td><input type="number" name="jumlah[]" id="jumlah_1" oninput="calculateSubtotal(1)" required></td>   
                                                <td><input type="number" name="harga[]" id="harga_1" oninput="calculateSubtotal(1)" required></td>
                                                <td><input type="text" name="subtotal[]" id="subtotal_1" readonly></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                      </div>
                    <!-- HTML untuk pesan peringatan batas minimu baris-->
                    <div id="maxRowsMessage" style="display: none; color: red; margin-bottom: 10px;">
                        * Maaf Anda hanya dapat menambahkan maksimal 12 baris.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Modal Hapus Parent -->
    <div class="modal fade" id="hapusParentModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Hapus data Pembelian Kayu?</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <form id="hapusParentForm" method="post" action="function.php">
                        <input type="hidden" id="id_parent_input" name="id_parent" value="">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger" name="hapuspembeli">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <div id="layoutSidenav_content">
            <div class="container-fluid">
                <div class="card2 mb-4">
                    <div class="card-customer">
                    <div class="table-data">
                        <i class="fas fa-table"></i>
                        <span>Data Tabel Nota Pembeli</span>
                        </div>
                        </div>
                        <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Pembelian</th>
                                        <th>Total Keseluruhan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ambilsemuadata = mysqli_query($conn, "SELECT * FROM parent_table");
                                    $i = 1;
                                    while ($data = mysqli_fetch_array($ambilsemuadata)) {
                                        $id_parent = $data['id_parent'];
                                        $tanggal = $data['tanggal'];
                                        $total_keseluruhan = $data['total_keseluruhan'];
                                        
                                    ?>
                                        <tr>
                                            <td class="text-center"><?php echo $i++; ?></td>
                                            <td class="text-center"><?php echo $tanggal; ?></td>
                                            <td class="text-center">Rp. <?php echo $total_keseluruhan; ?></td>
                                            <td class="text-center">
                                                <button class="btn btn-link btn-sm" onclick="toggleDetail(<?php echo $id_parent; ?>)">
                                                    <i class="fas fa-sort-down"></i>
                                                </button>
                                                <?php if ($_SESSION['role'] == 1) { // hanya admin yang dapat melihat fitur hapus data ?>
                                                        <script>
                                                            function hapusParent(id_parent) {
                                                                document.getElementById('id_parent_input').value = id_parent;
                                                            }
                                                        </script>
                                                        <button class="btn btn-link btn-sm" onclick="confirmDelete(<?php echo $id_parent; ?>)">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                 <?php } ?>
                                            </td>
                                        </tr>
                                        <tr data-parent-id="<?php echo $id_parent; ?>" style="display: none;">
                                            <td colspan="4">
                                                <table class="sub-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Kayu</th>
                                                            <th>Ukuran Kayu</th>
                                                            <th>Satuan</th>
                                                            <th>Jumlah Kayu</th>
                                                            <th>Harga Per Pcs</th>
                                                            <th>Subtotal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $ambilDetail = mysqli_query($conn, "SELECT * FROM detail_nota WHERE parent_id = $id_parent");
                                                        while ($detail = mysqli_fetch_array($ambilDetail)) {
                                                        ?>
                                                            <tr>
                                                                <td class="text-center"><?php echo $detail['nama_kayu']; ?></td>
                                                                <td class="text-center"><?php echo $detail['ukuran_kayu']; ?><sup>m</sup></td>
                                                                <td class="text-center"><?php echo $detail['satuan_k_p']; ?></td>
                                                                <td class="text-center"><?php echo $detail['jumlah_kayu']; ?></td>
                                                                <td class="text-center"><?php echo $detail['harga_per_pcs']; ?></td>
                                                                <td class="text-center"><?php echo $detail['subtotal']; ?></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



  <!-- source untu navbar -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<!-- source datatable -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-demo.js"></script>

<!-- Untuk menagtur Responsive Bar -->
<script src="js/Responsiv_sidebar-navbar.js"></script>
<!-- Untu mengatur tabel kakulator & sub tabel pada button detail -->
<script src="js/pembeli.js"></script>
<!-- untuk sweat alert notifikasi tambah,edit,hapus -->
<script src="js/sweatalert_pembeli.js"></script>



<script>
        $(document).ready(function() {
            $('#dataTable1').DataTable();
        });

        // FUNGSI PRINT
        function printNota() {
            var form = document.getElementById('notaForm');
            form.action = 'print_nota.php';
            form.method = 'post';
            form.target = '_blank'; 
            form.submit();
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

//=================JS UNTUK FITUR TAMBAH BARIS PADA NOTA KAKULATOR=================//
        function addRow() {
        if (rowCount >= 12) {
            showMaxRowsMessage();
            return;
        }
        rowCount++;
        const table = document.getElementById('notaTable').getElementsByTagName('tbody')[0];
        const row = table.insertRow();
        row.id = `row_${rowCount}`;
        row.classList.add('centered-row'); 
        row.innerHTML = `
            <td class="centered-cell">
                <button type="button" class="btn-hapus" onclick="deleteRow(${rowCount})">
                    <i class="fas fa-times" style="color: red;"></i>
                </button>
            </td>
            <td class="centered-cell">${rowCount}</td>
            <td class="centered-cell">
                <input type="date" name="tanggal[]" required>
            </td>
            <td class="centered-cell">
                <select name="nama_kayu[]" class="form-control custom-select" required>
                    <option value="" disabled selected>Jenis Kayu</option>
                    <?php
                    $tabels = ['miranti', 'samama', 'tawang', 'kenari', 'putih', 'giawas', 'palaka', 'pule'];

                    foreach ($tabels as $tabel) {
                        $jenis_kayu = 'Kayu ' . ucfirst($tabel);
                        echo '<option value="' . $tabel . '">' . $jenis_kayu . '</option>';
                    }
                    ?>
                </select>
            </td>
            <td class="centered-cell">
                <select name="ukuran_kayu[]" class="form-control custom-select" required>
                    <option value="" disabled selected>Jenis ukuran</option>
                    <?php
                    $tabels = ['stok_miranti', 'stok_samama', 'stok_tawang', 'stok_kenari', 'stok_putih', 'stok_giawas', 'stok_palaka', 'stok_pule'];

                    foreach ($tabels as $tabel) {
                        $query_satuan = mysqli_query($conn, "SELECT DISTINCT satuan_kayu FROM $tabel");
                        if (!$query_satuan) {
                            die("Query failed: " . mysqli_error($conn)); 
                        }
                        while ($row = mysqli_fetch_assoc($query_satuan)) {
                            $jenis_kayu = substr($tabel, 5); 
                            echo '<option value="' . $row['satuan_kayu'] . '">' . $row['satuan_kayu'] . ' - ' . ucfirst($jenis_kayu) . '</option>';
                        }
                    }
                    ?>
                </select>
            </td>
            <td class="centered-cell">
                <select name="satuan_k_p[]" class="form-control custom-select" required>
                    <option value="" disabled selected>Jenis satuan</option>
                    <option value="kubik">Kubik</option>
                    <option value="potong">Potong</option>
                </select>
            </td>
            <td class="centered-cell">
                <input type="number" name="jumlah[]" id="jumlah_${rowCount}" oninput="calculateSubtotal(${rowCount})" required>
            </td>
            <td class="centered-cell">
                <input type="number" name="harga[]" id="harga_${rowCount}" oninput="calculateSubtotal(${rowCount})" required>
            </td>
            <td class="centered-cell">
                <input type="text" name="subtotal[]" id="subtotal_${rowCount}" readonly>
            </td>
        `;
        updateRowNumbers(); }
</script>
 </div>
     <footer>
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small" style="background: none;">
                <div class="text-muted">Copyright © UD.Tunggal Putra 2024</div>
            </div>
        </div>
    </footer>
  </body>
</html>
