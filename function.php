<?php

/************* KONEKSI DATABASES ******************/
$conn = mysqli_connect("localhost", "root", "", "db_kayu");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
/************* AND KONEKSI DATABASES ******************/







/************* SUPPLIER ******************/

// Menghitung total supplier Ddi row
$query_total_supplier = mysqli_query($conn, "SELECT COUNT(*) AS total_supplier FROM supplier");
if (!$query_total_supplier) {
    die('Error calculating total supplier: ' . mysqli_error($conn));
}
$total_supplier = mysqli_fetch_assoc($query_total_supplier)['total_supplier'];




// Menambah data supplier
if (isset($_POST['addnewsuplier'])) {
    $namasupplier = mysqli_real_escape_string($conn, $_POST['nama_supplier']);
    $kontak = mysqli_real_escape_string($conn, $_POST['no_telp']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $catatan_sp = mysqli_real_escape_string($conn, $_POST['catatan_supplier']);

    // Memasukkan data ke tabel 'supplier'
    $addtotable = mysqli_query($conn, "INSERT INTO supplier (nama_supplier, no_telp, email, alamat, catatan_supplier) VALUES ('$namasupplier', '$kontak', '$email', '$alamat', '$catatan_sp')");
    if ($addtotable) {
        echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: "success",
                        title: "Sukses!",
                        text: "Data berhasil ditambahkan",
                        customClass: {
                            popup: "swal2-smaller-popup",
                            title: "swal2-smaller-title",
                            content: "swal2-smaller-content",
                            confirmButton: "swal2-ok-button"
                        }
                    }).then(function() {
                        window.location.href = "supplier.php";
                    });
                });
              </script>';
    } else {
        echo 'Gagal menambah data supplier: ' . mysqli_error($conn);
        exit();
    }
}

//Menghapus barang supplier
if (isset($_POST['hapusSupplie'])) {
    $ids = $_POST['id_supplier'];

    $hapus = mysqli_query($conn, "DELETE FROM supplier WHERE id_supplier = '$ids'");
    if ($hapus) {
        header('Location: supplier.php?status=hapus-success');
        exit();
    } else {
        header('Location: supplier.php?status=hapus-error');
        exit();
    }
}


// edit supplier
if (isset($_POST['updatsupplier'])) {
    $ids = $_POST['id_supplier'];
    $namasupplier = $_POST['nama_supplier'];
    $kontak = $_POST['no_telp'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $catatan_sp = $_POST['catatan_supplier'];

    // Menggunakan prepared statement untuk update
    $stmt = $conn->prepare("UPDATE supplier SET nama_supplier = ?, no_telp = ?, email = ?, alamat = ?, catatan_supplier = ? WHERE id_supplier = ?");
    $stmt->bind_param("sssssi", $namasupplier, $kontak, $email, $alamat, $catatan_sp, $ids);

    if ($stmt->execute()) {
        echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: "success",
                title: "Sukses!",
                text: "Data berhasil diubah",
                customClass: {
                    popup: "swal2-smaller-popup",
                    title: "swal2-smaller-title",
                    content: "swal2-smaller-content",
                    confirmButton: "swal2-ok-button"
                }
            }).then(function() {
                window.location.href = "supplier.php";
            });
        });
      </script>';
    } else {
        echo 'Gagal mengubah data supplier: ' . $stmt->error;
        exit();
    }

    $stmt->close();
}











/************* STOK BARANG ******************/

//==========php stok row===========//

    // Mendapatkan total stok dari stok_miranti
    $sql_miranti = "SELECT SUM(jumlah_kubik) AS total_kubik, SUM(jumlah_potong) AS total_potong FROM stok_miranti";
    $result_miranti = $conn->query($sql_miranti);
    $row_miranti = $result_miranti->fetch_assoc();
    $total_miranti = $row_miranti['total_kubik'] + $row_miranti['total_potong'];

    // Mendapatkan total stok dari stok_samama
    $sql_samama = "SELECT SUM(jumlah_kubik) AS total_kubik, SUM(jumlah_potong) AS total_potong FROM stok_samama";
    $result_samama = $conn->query($sql_samama);
    $row_samama = $result_samama->fetch_assoc();
    $total_samama = $row_samama['total_kubik'] + $row_samama['total_potong'];

    // Mendapatkan total stok dari stok_tawang
    $sql_tawang = "SELECT SUM(jumlah_kubik) AS total_kubik, SUM(jumlah_potong) AS total_potong FROM stok_tawang";
    $result_tawang = $conn->query($sql_tawang);
    $row_tawang = $result_tawang->fetch_assoc();
    $total_tawang = $row_tawang['total_kubik'] + $row_tawang['total_potong'];

    // Mendapatkan total stok dari stok_kenari
    $sql_kenari = "SELECT SUM(jumlah_kubik) AS total_kubik, SUM(jumlah_potong) AS total_potong FROM stok_kenari";
    $result_kenari = $conn->query($sql_kenari);
    $row_kenari = $result_kenari->fetch_assoc();
    $total_kenari = $row_kenari['total_kubik'] + $row_kenari['total_potong'];

    // Mendapatkan total stok dari stok_putih
    $sql_putih = "SELECT SUM(jumlah_kubik) AS total_kubik, SUM(jumlah_potong) AS total_potong FROM stok_putih";
    $result_putih = $conn->query($sql_putih);
    $row_putih = $result_putih->fetch_assoc();
    $total_putih = $row_putih['total_kubik'] + $row_putih['total_potong'];

    // Mendapatkan total stok dari stok_giawas
    $sql_giawas = "SELECT SUM(jumlah_kubik) AS total_kubik, SUM(jumlah_potong) AS total_potong FROM stok_giawas";
    $result_giawas = $conn->query($sql_giawas);
    $row_giawas = $result_giawas->fetch_assoc();
    $total_giawas = $row_giawas['total_kubik'] + $row_giawas['total_potong'];

    // Mendapatkan total stok dari stok_palaka
    $sql_palaka = "SELECT SUM(jumlah_kubik) AS total_kubik, SUM(jumlah_potong) AS total_potong FROM stok_palaka";
    $result_palaka = $conn->query($sql_palaka);
    $row_palaka = $result_palaka->fetch_assoc();
    $total_palaka = $row_palaka['total_kubik'] + $row_palaka['total_potong'];

    // Mendapatkan total stok dari stok_pule
    $sql_pule = "SELECT SUM(jumlah_kubik) AS total_kubik, SUM(jumlah_potong) AS total_potong FROM stok_pule";
    $result_pule = $conn->query($sql_pule);
    $row_pule = $result_pule->fetch_assoc();
    $total_pule = $row_pule['total_kubik'] + $row_pule['total_potong'];

    // Menghitung hasil akhir
    $total_stock = $total_miranti + $total_samama + $total_tawang + $total_kenari + $total_putih + $total_giawas + $total_palaka + $total_pule;

    

//==========and php stok row===========//




// Menambah data Stok barang
if(isset($_POST['addnewbarang'])) {
    // Tangani form submission
    $tabel_tujuan = $_POST['tabel_tujuan'];
    $satuan_kayu = $_POST['satuan_kayu'];
    $harga_kubik = $_POST['harga_kubik'];
    $harga_potong = $_POST['harga_potong'];
    $jumlah_kubik = $_POST['jumlah_kubik'];
    $jumlah_potong = $_POST['jumlah_potong'];

    $sql = "INSERT INTO $tabel_tujuan (satuan_kayu, harga_kubik, harga_potong, jumlah_kubik, jumlah_potong)
        VALUES ('$satuan_kayu', '$harga_kubik', '$harga_potong', '$jumlah_kubik', '$jumlah_potong')";

        if ($conn->query($sql) === TRUE) {
            header('Location: stock.php?status=success');
            exit();
        } else {
            $error_message = $conn->error; 
            header('Location: stock.php?status=error&message=' . urlencode($error_message));
            exit();
        }
}

//edit stok barang
if (isset($_POST['editbarang'])) {
    $idb = $_POST['idb'];
    $tabel_tujuan = $_POST['tabel_tujuan'];
    $satuan_kayu = $_POST['satuan_kayu'];
    $harga_kubik = $_POST['harga_kubik'];
    $harga_potong = $_POST['harga_potong'];
    $jumlah_kubik = $_POST['jumlah_kubik'];
    $jumlah_potong = $_POST['jumlah_potong'];


    // menentukan query berdasarkan tabel yang dipilih
    switch ($tabel_tujuan) {
    case 'stok_miranti':
        $query = "UPDATE stok_miranti SET satuan_kayu='$satuan_kayu', harga_kubik='$harga_kubik', harga_potong='$harga_potong', jumlah_kubik='$jumlah_kubik', jumlah_potong='$jumlah_potong' WHERE id_miranti='$idb'";
        break;
    case 'stok_samama':
        $query = "UPDATE stok_samama SET satuan_kayu='$satuan_kayu', harga_kubik='$harga_kubik', harga_potong='$harga_potong', jumlah_kubik='$jumlah_kubik', jumlah_potong='$jumlah_potong' WHERE id_samama='$idb'";
        break;
    case 'stok_tawang':
        $query = "UPDATE stok_tawang SET satuan_kayu='$satuan_kayu', harga_kubik='$harga_kubik', harga_potong='$harga_potong', jumlah_kubik='$jumlah_kubik', jumlah_potong='$jumlah_potong' WHERE id_tawang='$idb'";
        break;
    case 'stok_putih':
        $query = "UPDATE stok_putih SET satuan_kayu='$satuan_kayu', harga_kubik='$harga_kubik', harga_potong='$harga_potong', jumlah_kubik='$jumlah_kubik', jumlah_potong='$jumlah_potong' WHERE id_putih='$idb'";
        break;
    case 'stok_kenari':
        $query = "UPDATE stok_kenari SET satuan_kayu='$satuan_kayu', harga_kubik='$harga_kubik', harga_potong='$harga_potong', jumlah_kubik='$jumlah_kubik', jumlah_potong='$jumlah_potong' WHERE id_kenari='$idb'";
        break;
    case 'stok_giawas':
        $query = "UPDATE stok_giawas SET satuan_kayu='$satuan_kayu', harga_kubik='$harga_kubik', harga_potong='$harga_potong', jumlah_kubik='$jumlah_kubik', jumlah_potong='$jumlah_potong' WHERE id_giawas='$idb'";
        break;
    case 'stok_palaka':
        $query = "UPDATE stok_palaka SET satuan_kayu='$satuan_kayu', harga_kubik='$harga_kubik', harga_potong='$harga_potong', jumlah_kubik='$jumlah_kubik', jumlah_potong='$jumlah_potong' WHERE id_palaka='$idb'";
        break;
    case 'stok_pule':
        $query = "UPDATE stok_pule SET satuan_kayu='$satuan_kayu', harga_kubik='$harga_kubik', harga_potong='$harga_potong', jumlah_kubik='$jumlah_kubik', jumlah_potong='$jumlah_potong' WHERE id_pule='$idb'";
        break;
        default:
            echo 'Tabel tidak valid!';
            exit();
    }

    $update = mysqli_query($conn, $query);

        if ($update) {
            header('Location: stock.php?status=edit-success');
            exit();
        } else {
            header('Location: stock.php?status=edit-error=Gagal mengupdate data!');
            exit();
        }
}




// Menghapus barang dari stok barang
if (isset($_POST['hapusstok'])) {
    $idb = isset($_POST['idb']) ? $_POST['idb'] : '';
    $tabel = isset($_POST['tabel']) ? $_POST['tabel'] : '';

    $valid_tables = [
        'stok_miranti' => 'id_miranti',
        'stok_samama' => 'id_samama',
        'stok_tawang' => 'id_tawang',
        'stok_putih' => 'id_putih',
        'stok_kenari' => 'id_kenari',
        'stok_giawas' => 'id_giawas',
        'stok_palaka' => 'id_palaka',
        'stok_pule' => 'id_pule'
    ];

    if (!array_key_exists($tabel, $valid_tables)) {
        echo json_encode(['status' => 'error', 'message' => 'Tabel tidak ditemukan']);
        exit();
    }
    $id_column = $valid_tables[$tabel];

    $stmt = $conn->prepare("DELETE FROM $tabel WHERE $id_column = ?");
    if (!$stmt) {
        echo json_encode(['status' => 'error', 'message' => 'Query preparation failed: ' . $conn->error]);
        exit();
    }

    $stmt->bind_param('i', $idb); // 'i' untuk integer
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => $stmt->error]);
    }
    $stmt->close();
    $conn->close(); 
    exit();
}










/************* BARANG MASUK ******************/

//====php row barang masuk=======//
$sql = "SELECT jumlah_kubik, jumlah_potong FROM barang_masuk";
$result = $conn->query($sql);

$totalKeseluruhan = 0;

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $totalKeseluruhan += $row['jumlah_kubik'] + $row['jumlah_potong'];
    }
} else {
    $totalKeseluruhan = 0;
}



// Menambah barang masuk
if (isset($_POST['addbarangmasuk'])) {
    $tanggal_masuk = $_POST['tanggal_masuk']; 
    $nama_tabel = $_POST['nama_tabel']; // Ambil nilai dari dropdown 'nama_tabel'
    $satuan_ukuran = $_POST['satuan_ukuran'];
    $jumlah_kubik = $_POST['jumlah_kubik'];
    $jumlah_potong = $_POST['jumlah_potong'];
    $suppliernya = $_POST['suppliernya'];
    $kualitas_kayu = $_POST['kualitas_kayu'];
    $lokasi = $_POST['lokasi'];
    $catatan_m = $_POST['catatan_masuk'];

    // Ambil nama_supplier berdasarkan id_supplier
    $query_supplier = mysqli_prepare($conn, "SELECT nama_supplier FROM supplier WHERE id_supplier = ?");
    mysqli_stmt_bind_param($query_supplier, "i", $suppliernya);
    mysqli_stmt_execute($query_supplier);
    $result_supplier = mysqli_stmt_get_result($query_supplier);

    if ($result_supplier && mysqli_num_rows($result_supplier) > 0) {
        $row_supplier = mysqli_fetch_assoc($result_supplier);
        $nama_supplier = $row_supplier['nama_supplier'];

        // Ambil id_barang dari tabel yang sesuai berdasarkan satuan_kayu
        $query_id_barang = null;
        $table_name = '';
        $id_column = '';

        // Pemetaan nama tabel stok
        $tabel_mapping = [
            'stok_miranti' => ['miranti', 'id_miranti'],
            'stok_samama' => ['samama', 'id_samama'],
            'stok_tawang' => ['tawang', 'id_tawang'],
            'stok_kenari' => ['kenari', 'id_kenari'],
            'stok_putih' => ['putih', 'id_putih'],
            'stok_giawas' => ['giawas', 'id_giawas'],
            'stok_palaka' => ['palaka', 'id_palaka'],
            'stok_pule' => ['pule', 'id_pule']
        ];

        if (array_key_exists($nama_tabel, $tabel_mapping)) {
            $table_name = $nama_tabel;
            $id_column = $tabel_mapping[$nama_tabel][1];
            $nama_kayu = $tabel_mapping[$nama_tabel][0];

            $query_id_barang = mysqli_prepare($conn, "SELECT $id_column FROM $table_name WHERE satuan_kayu = ?");
            mysqli_stmt_bind_param($query_id_barang, "s", $satuan_ukuran);
            mysqli_stmt_execute($query_id_barang);
            $result_id_barang = mysqli_stmt_get_result($query_id_barang);

            if ($result_id_barang && mysqli_num_rows($result_id_barang) > 0) {
                $row_id_barang = mysqli_fetch_assoc($result_id_barang);
                $id_barang = $row_id_barang[$id_column];

                $query_insert = mysqli_prepare($conn, "INSERT INTO barang_masuk (id_barang, tanggal_masuk, satuan_kayu, jumlah_kubik, jumlah_potong, id_supplier, nama_supplier, kualitas_kayu, lokasi, catatan_masuk, nama_barang) 
                                                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                mysqli_stmt_bind_param($query_insert, "isssissssss", $id_barang, $tanggal_masuk, $satuan_ukuran, $jumlah_kubik, $jumlah_potong, $suppliernya, $nama_supplier, $kualitas_kayu, $lokasi, $catatan_m, $nama_kayu);

                $insert_success = mysqli_stmt_execute($query_insert);

                if ($insert_success) {
                    // Update stok kayu di tabel yang sesuai
                    $query_update_stok = mysqli_prepare($conn, "UPDATE $table_name SET jumlah_kubik = jumlah_kubik + ?, jumlah_potong = jumlah_potong + ? WHERE $id_column = ?");
                    mysqli_stmt_bind_param($query_update_stok, "iii", $jumlah_kubik, $jumlah_potong, $id_barang);
                    $update_stok_success = mysqli_stmt_execute($query_update_stok);

                    if ($update_stok_success) {
                        header('Location: barang_masuk.php?status=tambah-success');
                        exit();
                    } else {
                        header('Location: barang_masuk.php?status=tambah-error&message=' . urlencode("Gagal memperbarui stok kayu: " . mysqli_error($conn)));
                        exit();
                    }
                } else {
                    header('Location: barang_masuk.php?status=tambah-error&message=' . urlencode("Gagal memasukkan data barang masuk: " . mysqli_error($conn)));
                    exit();
                }
            } else {
                header('Location: barang_masuk.php?status=tambah-error&message=' . urlencode("Jenis Kayu dengan satuan yang anda masukan tidak sesuai tolong di cek kembali."));
                exit();
            }
        } else {
            header('Location: barang_masuk.php?status=tambah-error&message=' . urlencode("Tabel stok tidak ditemukan."));
            exit();
        }
    } else {
        header('Location: barang_masuk.php?status=tambah-error&message=' . urlencode("Nama dengan ID tersebut tidak ditemukan."));
        exit();
    }
}





// Edit barang masuk
if (isset($_POST['updatebarangmasuk'])) {
    $idm = $_POST['idm'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $nama_tabel = $_POST['nama_tabel'];
    $satuan_ukuran = $_POST['satuan_ukuran'];
    $jumlah_kubik = $_POST['jumlah_kubik'];
    $jumlah_potong = $_POST['jumlah_potong'];
    $suppliernya = $_POST['suppliernya'];
    $kualitas_kayu = $_POST['kualitas_kayu'];
    $lokasi = $_POST['lokasi'];
    $catatan_m = $_POST['catatan_masuk'];

    // Ambil nama_supplier berdasarkan id_supplier
    $query_supplier = mysqli_prepare($conn, "SELECT nama_supplier FROM supplier WHERE id_supplier = ?");
    mysqli_stmt_bind_param($query_supplier, "i", $suppliernya);
    mysqli_stmt_execute($query_supplier);
    $result_supplier = mysqli_stmt_get_result($query_supplier);

    if ($result_supplier && mysqli_num_rows($result_supplier) > 0) {
        $row_supplier = mysqli_fetch_assoc($result_supplier);
        $nama_supplier = $row_supplier['nama_supplier'];

        // Ambil id_barang dari tabel yang sesuai berdasarkan satuan_kayu
        $query_id_barang = null;
        $table_name = '';
        $id_column = '';

        // Pemetaan nama tabel stok
        $tabel_mapping = [
            'stok_miranti' => ['miranti', 'id_miranti'],
            'stok_samama' => ['samama', 'id_samama'],
            'stok_tawang' => ['tawang', 'id_tawang'],
            'stok_kenari' => ['kenari', 'id_kenari'],
            'stok_putih' => ['putih', 'id_putih'],
            'stok_giawas' => ['giawas', 'id_giawas'],
            'stok_palaka' => ['palaka', 'id_palaka'],
            'stok_pule' => ['pule', 'id_pule']
        ];

        if (array_key_exists($nama_tabel, $tabel_mapping)) {
            $table_name = $nama_tabel;
            $id_column = $tabel_mapping[$nama_tabel][1];
            $nama_kayu = $tabel_mapping[$nama_tabel][0];

            $query_id_barang = mysqli_prepare($conn, "SELECT $id_column FROM $table_name WHERE satuan_kayu = ?");
            mysqli_stmt_bind_param($query_id_barang, "s", $satuan_ukuran);
            mysqli_stmt_execute($query_id_barang);
            $result_id_barang = mysqli_stmt_get_result($query_id_barang);

            if ($result_id_barang && mysqli_num_rows($result_id_barang) > 0) {
                $row_id_barang = mysqli_fetch_assoc($result_id_barang);
                $id_barang = $row_id_barang[$id_column];

                // Update data di tabel 'barang_masuk'
                $query_update = mysqli_prepare($conn, "UPDATE barang_masuk SET id_barang = ?, tanggal_masuk = ?, satuan_kayu = ?, jumlah_kubik = ?, jumlah_potong = ?, id_supplier = ?, nama_supplier = ?, kualitas_kayu = ?, lokasi = ?, catatan_masuk = ?, nama_barang = ? WHERE id_masuk = ?");
                mysqli_stmt_bind_param($query_update, "isssissssssi", $id_barang, $tanggal_masuk, $satuan_ukuran, $jumlah_kubik, $jumlah_potong, $suppliernya, $nama_supplier, $kualitas_kayu, $lokasi, $catatan_m, $nama_kayu, $idm);

                $update_success = mysqli_stmt_execute($query_update);

                if ($update_success) {
                    // Update stok kayu di tabel yang sesuai
                    $query_update_stok = mysqli_prepare($conn, "UPDATE $table_name SET jumlah_kubik = ?, jumlah_potong = ? WHERE $id_column = ?");
                    mysqli_stmt_bind_param($query_update_stok, "iii", $jumlah_kubik, $jumlah_potong, $id_barang);
                    $update_stok_success = mysqli_stmt_execute($query_update_stok);

                    if ($update_stok_success) {
                        header('Location: barang_masuk.php?status=edit-success');
                        exit();
                    } else {
                        header('Location: barang_masuk.php?status=edit-error&message=' . urlencode("Gagal memperbarui stok kayu: " . mysqli_error($conn)));
                        exit();
                    }
                } else {
                    header('Location: barang_masuk.php?status=edit-error&message=' . urlencode("Gagal mengupdate data barang masuk: " . mysqli_error($conn)));
                    exit();
                }
            } else {
                header('Location: barang_masuk.php?status=edit-error&message=' . urlencode("Jenis Kayu dengan satuan yang anda masukan tidak sesuai, tolong cek kembali."));
                exit();
            }
        } else {
            header('Location: barang_masuk.php?status=edit-error&message=' . urlencode("Tabel stok tidak ditemukan."));
            exit();
        }
    } else {
        header('Location: barang_masuk.php?status=edit-error&message=' . urlencode("Nama dengan ID tersebut tidak ditemukan."));
        exit();
    }
}


                        


// Menghapus barang masuk
if (isset($_POST['hapusbarangmasuk'])) {
    $idm = $_POST['idm']; 

    $query_select = mysqli_prepare($conn, "SELECT * FROM barang_masuk WHERE id_masuk = ?");
    mysqli_stmt_bind_param($query_select, "i", $idm);
    mysqli_stmt_execute($query_select);
    $result_select = mysqli_stmt_get_result($query_select);

    if ($result_select && mysqli_num_rows($result_select) > 0) {
        $row = mysqli_fetch_assoc($result_select);
        $nama_barang = $row['nama_barang']; 
        $jumlah_kubik = $row['jumlah_kubik'];
        $jumlah_potong = $row['jumlah_potong'];

        // Menentukan tabel dan kolom ID berdasarkan nama barang
        $nama_tabel = '';
        $id_column = '';
        if ($nama_barang === 'miranti') {
            $nama_tabel = 'stok_miranti';
            $id_column = 'id_miranti';
        } else if ($nama_barang === 'samama') {
            $nama_tabel = 'stok_samama';
            $id_column = 'id_samama';
        } else if ($nama_barang === 'tawang') {
            $nama_tabel = 'stok_tawang';
            $id_column = 'id_tawang';
        } else if ($nama_barang === 'kenari') {
            $nama_tabel = 'stok_kenari';
            $id_column = 'id_kenari';
        } else if ($nama_barang === 'putih') {
            $nama_tabel = 'stok_putih';
            $id_column = 'id_putih';
        } else if ($nama_barang === 'giawas') {
            $nama_tabel = 'stok_giawas';
            $id_column = 'id_giawas';
        } else if ($nama_barang === 'palaka') {
            $nama_tabel = 'stok_palaka';
            $id_column = 'id_palaka';
        } else if ($nama_barang === 'pule') {
            $nama_tabel = 'stok_pule';
            $id_column = 'id_pule';
        }

        $query_delete = mysqli_prepare($conn, "DELETE FROM barang_masuk WHERE id_masuk = ?");
        mysqli_stmt_bind_param($query_delete, "i", $idm);
        $delete_success = mysqli_stmt_execute($query_delete);

        if ($delete_success && $nama_tabel !== '') {
            // Kurangi stok kayu di tabel stok barang
            $query_update_stok = "UPDATE $nama_tabel SET jumlah_kubik = jumlah_kubik - ?, jumlah_potong = jumlah_potong - ? WHERE $id_column = ?";
            $query_update_stok_stmt = mysqli_prepare($conn, $query_update_stok);
            mysqli_stmt_bind_param($query_update_stok_stmt, "iii", $jumlah_kubik, $jumlah_potong, $idm); // Pastikan ID yang sesuai digunakan
            $update_stok_success = mysqli_stmt_execute($query_update_stok_stmt);

            if ($update_stok_success) {
                header('Location: barang_masuk.php?status=hapus-success');
                exit();
            } else {
                header('Location: barang_masuk.php?status=hapus-error');
                exit();
            }
        } else {
            header('Location: barang_masuk.php?status=hapus-error');
            exit();
        }
    }
}









/************* BARANG KELUAR ******************/

//====php row barang keluar=======//
$ambilsemuadatakeluar = mysqli_query($conn, "SELECT SUM(jumlah_kubik) AS total_kubik, SUM(jumlah_potong) AS total_potong FROM barang_keluar");
$data = mysqli_fetch_array($ambilsemuadatakeluar);
$total_kubik = $data['total_kubik'];
$total_potong = $data['total_potong'];
$total_keseluruhan = $total_kubik + $total_potong;



// Menambah barang keluar
if (isset($_POST['addbarangkeluar'])) {
    $tanggal_keluar = $_POST['tanggal_keluar'];
    $nama_tabel = $_POST['nama_tabel'];
    $satuan_ukuran = $_POST['satuan_ukuran'];
    $jumlah_kubik = $_POST['jumlah_kubik'];
    $jumlah_potong = $_POST['jumlah_potong'];
    $penerima = $_POST['penerima'];
    $lokasi_tujuan = $_POST['lokasi_tujuan'];
    $catatan_keluar = $_POST['catatan_keluar'];

    // Daftar nama tabel dan ID kolom
    $tabels = [
        'stok_miranti' => ['table' => 'miranti', 'id' => 'id_miranti'],
        'stok_samama' => ['table' => 'samama', 'id' => 'id_samama'],
        'stok_tawang' => ['table' => 'tawang', 'id' => 'id_tawang'],
        'stok_kenari' => ['table' => 'kenari', 'id' => 'id_kenari'],
        'stok_putih' => ['table' => 'putih', 'id' => 'id_putih'],
        'stok_giawas' => ['table' => 'giawas', 'id' => 'id_giawas'],
        'stok_palaka' => ['table' => 'palaka', 'id' => 'id_palaka'],
        'stok_pule' => ['table' => 'pule', 'id' => 'id_pule']
    ];

    // Menentukan nama tabel dan kolom ID
    if (isset($tabels[$nama_tabel])) {
        $table_info = $tabels[$nama_tabel];
        $table_name = $table_info['table'];
        $id_column = $table_info['id'];
        
        // Ambil id_barang dari tabel yang sesuai berdasarkan satuan_kayu
        $query_id_barang = mysqli_prepare($conn, "SELECT $id_column FROM $nama_tabel WHERE satuan_kayu = ?");
        mysqli_stmt_bind_param($query_id_barang, "s", $satuan_ukuran);
        mysqli_stmt_execute($query_id_barang);
        $result_id_barang = mysqli_stmt_get_result($query_id_barang);

        if ($result_id_barang && mysqli_num_rows($result_id_barang) > 0) {
            $row_id_barang = mysqli_fetch_assoc($result_id_barang);
            $id_barang = $row_id_barang[$id_column]; 

            $query_insert = mysqli_prepare($conn, "INSERT INTO barang_keluar (id_barang, tanggal_keluar, satuan_kayu, jumlah_kubik, jumlah_potong, penerima, lokasi_tujuan, catatan_keluar, nama_barang) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($query_insert, "isssissss", $id_barang, $tanggal_keluar, $satuan_ukuran, $jumlah_kubik, $jumlah_potong, $penerima, $lokasi_tujuan, $catatan_keluar, $table_name);

            $insert_success = mysqli_stmt_execute($query_insert);

            if ($insert_success) {
                $query_update_stok = mysqli_prepare($conn, "UPDATE $nama_tabel SET jumlah_kubik = jumlah_kubik - ?, jumlah_potong = jumlah_potong - ? WHERE $id_column = ?");
                mysqli_stmt_bind_param($query_update_stok, "iii", $jumlah_kubik, $jumlah_potong, $id_barang);
                $update_stok_success = mysqli_stmt_execute($query_update_stok);

                if ($update_stok_success) {
                    header('Location: barang_keluar.php?status=success');
                    exit();
                } else {
                    header('Location: barang_keluar.php?status=error&message=' . urlencode("Gagal memperbarui stok kayu: " . mysqli_error($conn)));
                    exit();
                }
            } else {
                header('Location: barang_keluar.php?status=error&message=' . urlencode("Gagal menambahkan data barang keluar: " . mysqli_error($conn)));
                exit();
            }
        } else {
            header('Location: barang_keluar.php?status=error&message=' . urlencode("Barang dengan satuan tersebut tidak ditemukan di tabel $table_name."));
            exit();
        }
    } else {
        header('Location: barang_keluar.php?status=error&message=' . urlencode("Tabel stok kayu tidak ditemukan."));
        exit();
    }
}





// Edit barang keluar
if (isset($_POST['updatebarangkeluar'])) {
    $idk = $_POST['id_keluar'];
    $tanggal_keluar = $_POST['tanggal_keluar'];
    $nama_tabel = $_POST['nama_tabel']; 
    $satuan_ukuran = $_POST['satuan_ukuran'];
    $jumlah_kubik = $_POST['jumlah_kubik'];
    $jumlah_potong = $_POST['jumlah_potong'];
    $penerima = $_POST['penerima'];
    $lokasi_tujuan = $_POST['lokasi_tujuan'];
    $catatan_keluar = $_POST['catatan_keluar'];

    // Ambil id_barang dari tabel yang sesuai berdasarkan satuan_kayu
    $query_id_barang = null;
    $table_name = ''; 
    $id_column = ''; 

    if ($nama_tabel === 'stok_miranti') {
        $query_id_barang = mysqli_prepare($conn, "SELECT id_miranti FROM stok_miranti WHERE satuan_kayu = ?");
        $table_name = 'stok_miranti';
        $id_column = 'id_miranti';
    } else if ($nama_tabel === 'stok_samama') {
        $query_id_barang = mysqli_prepare($conn, "SELECT id_samama FROM stok_samama WHERE satuan_kayu = ?");
        $table_name = 'stok_samama';
        $id_column = 'id_samama';
    } else if ($nama_tabel === 'stok_tawang') {
        $query_id_barang = mysqli_prepare($conn, "SELECT id_tawang FROM stok_tawang WHERE satuan_kayu = ?");
        $table_name = 'stok_tawang';
        $id_column = 'id_tawang';
    } else if ($nama_tabel === 'stok_kenari') {
        $query_id_barang = mysqli_prepare($conn, "SELECT id_kenari FROM stok_kenari WHERE satuan_kayu = ?");
        $table_name = 'stok_kenari';
        $id_column = 'id_kenari';
    } else if ($nama_tabel === 'stok_putih') {
        $query_id_barang = mysqli_prepare($conn, "SELECT id_putih FROM stok_putih WHERE satuan_kayu = ?");
        $table_name = 'stok_putih';
        $id_column = 'id_putih';
    } else if ($nama_tabel === 'stok_giawas') {
        $query_id_barang = mysqli_prepare($conn, "SELECT id_giawas FROM stok_giawas WHERE satuan_kayu = ?");
        $table_name = 'stok_giawas';
        $id_column = 'id_giawas';
    } else if ($nama_tabel === 'stok_palaka') {
        $query_id_barang = mysqli_prepare($conn, "SELECT id_palaka FROM stok_palaka WHERE satuan_kayu = ?");
        $table_name = 'stok_palaka';
        $id_column = 'id_palaka';
    } else if ($nama_tabel === 'stok_pule') {
        $query_id_barang = mysqli_prepare($conn, "SELECT id_pule FROM stok_pule WHERE satuan_kayu = ?");
        $table_name = 'stok_pule';
        $id_column = 'id_pule';
    }

    mysqli_stmt_bind_param($query_id_barang, "s", $satuan_ukuran);
    mysqli_stmt_execute($query_id_barang);
    $result_id_barang = mysqli_stmt_get_result($query_id_barang);

    if ($result_id_barang && mysqli_num_rows($result_id_barang) > 0) {
        $row_id_barang = mysqli_fetch_assoc($result_id_barang);
        $id_barang = $row_id_barang[$id_column];

        $query_update = mysqli_prepare($conn, "UPDATE barang_keluar SET id_barang = ?, tanggal_keluar = ?, satuan_kayu = ?, jumlah_kubik = ?, jumlah_potong = ?, penerima = ?, lokasi_tujuan = ?, catatan_keluar = ? WHERE id_keluar = ?");
        mysqli_stmt_bind_param($query_update, "isssisssi", $id_barang, $tanggal_keluar, $satuan_ukuran, $jumlah_kubik, $jumlah_potong, $penerima, $lokasi_tujuan, $catatan_keluar, $idk);

        $update_success = mysqli_stmt_execute($query_update);

        if ($update_success) {
            // Update stok kayu 
            $query_update_stok = mysqli_prepare($conn, "UPDATE $table_name SET jumlah_kubik = jumlah_kubik - ?, jumlah_potong = jumlah_potong - ? WHERE $id_column = ?");
            mysqli_stmt_bind_param($query_update_stok, "iii", $jumlah_kubik, $jumlah_potong, $id_barang);
            $update_stok_success = mysqli_stmt_execute($query_update_stok);

            if ($update_stok_success) {
                header('Location: barang_keluar.php?status=edit-success');
                exit();
            } else {
                header('Location: barang_keluar.php?status=edit-error');
                exit();
            }
        } else {
            header('Location: barang_keluar.php?status=edit-error');
            exit();
        }
    } else {
        header("Location: barang_keluar.php?status=edit-error&nama_tabel=$nama_tabel");
        exit();
    }
}



// Hapus barang keluar
if (isset($_POST['hapusbarangkeluar'])) {
    $idk = $_POST['idk']; 

    $query_select = mysqli_prepare($conn, "SELECT * FROM barang_keluar WHERE id_keluar = ?");
    mysqli_stmt_bind_param($query_select, "i", $idk);
    mysqli_stmt_execute($query_select);
    $result_select = mysqli_stmt_get_result($query_select);

    if ($result_select && mysqli_num_rows($result_select) > 0) {
        $row = mysqli_fetch_assoc($result_select);
        $nama_barang = $row['nama_barang']; 
        $jumlah_kubik = $row['jumlah_kubik'];
        $jumlah_potong = $row['jumlah_potong'];

        echo "Nama Barang: " . $nama_barang;


        $nama_tabel = '';
        $id_column = '';

        // Mapping nama_barang ke nama_tabel dan id_column
        switch ($nama_barang) {
            case 'miranti':
                $nama_tabel = 'stok_miranti';
                $id_column = 'id_miranti';
                break;
            case 'samama':
                $nama_tabel = 'stok_samama';
                $id_column = 'id_samama';
                break;
            case 'tawang':
                $nama_tabel = 'stok_tawang';
                $id_column = 'id_tawang';
                break;
            case 'kenari':
                $nama_tabel = 'stok_kenari';
                $id_column = 'id_kenari';
                break;
            case 'putih':
                $nama_tabel = 'stok_putih';
                $id_column = 'id_putih';
                break;
            case 'giawas':
                $nama_tabel = 'stok_giawas';
                $id_column = 'id_giawas';
                break;
            case 'palaka':
                $nama_tabel = 'stok_palaka';
                $id_column = 'id_palaka';
                break;
            case 'pule':
                $nama_tabel = 'stok_pule';
                $id_column = 'id_pule';
                break;
            default:
                echo "Nama tabel tidak valid.";
                exit();
        }

        $query_delete = mysqli_prepare($conn, "DELETE FROM barang_keluar WHERE id_keluar = ?");
        mysqli_stmt_bind_param($query_delete, "i", $idk);
        $delete_success = mysqli_stmt_execute($query_delete);

        if ($delete_success) {
            $query_update_stok = mysqli_prepare($conn, "UPDATE $nama_tabel SET jumlah_kubik = jumlah_kubik - ?, jumlah_potong = jumlah_potong - ? WHERE $id_column = ?");
            mysqli_stmt_bind_param($query_update_stok, "iii", $jumlah_kubik, $jumlah_potong, $idk);
            $update_stok_success = mysqli_stmt_execute($query_update_stok);

            if ($update_stok_success) {
                header('Location: barang_keluar.php?status=hapus-success');
                exit();
            } else {
                header('Location: barang_keluar.php?status=hapus-error');
                exit();
            }
        }
    }
}







/************* PHP PEMBELIAN.PHP ******************/

 // Menambah data ke dalam tabel
if (isset($_POST['simpandata'])) {
    if (
        isset($_POST['tanggal']) && 
        isset($_POST['nama_kayu']) && 
        isset($_POST['ukuran_kayu']) && 
        isset($_POST['satuan_k_p']) && 
        isset($_POST['jumlah']) &&
        isset($_POST['harga']) &&  
        isset($_POST['subtotal']) && 
        isset($_POST['total_keseluruhan'])
    ) {
        // Ambil nilai dari $_POST
        $tanggal = $_POST['tanggal'];
        $nama_kayu = $_POST['nama_kayu'];
        $ukuran_kayu = $_POST['ukuran_kayu'];
        $satuan_k_p = $_POST['satuan_k_p'];
        $jumlah = $_POST['jumlah'];
        $harga = $_POST['harga'];
        $subtotal = $_POST['subtotal'];
        $total_keseluruhan = $_POST['total_keseluruhan'];

        $parent_id = null;


        for ($i = 0; $i < count($tanggal); $i++) {
            if ($i == 0 || $tanggal[$i] != $tanggal[$i - 1]) {
        
                $query_parent = "INSERT INTO parent_table (tanggal, total_keseluruhan) VALUES (?, ?)";
                $stmt_parent = mysqli_prepare($conn, $query_parent);
                mysqli_stmt_bind_param($stmt_parent, "ss", $tanggal[$i], $total_keseluruhan);
                mysqli_stmt_execute($stmt_parent);
                $parent_id = mysqli_insert_id($conn); 
                mysqli_stmt_close($stmt_parent);
            }

            // Query untuk menyimpan data ke dalam tabel detail_nota
            $query_detail = "INSERT INTO detail_nota (parent_id, tanggal, nama_kayu, ukuran_kayu, satuan_k_p, jumlah_kayu, harga_per_pcs, subtotal) 
                             VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

           
            $stmt_detail = mysqli_prepare($conn, $query_detail);
            mysqli_stmt_bind_param($stmt_detail, "issssiii", $parent_id, $tanggal[$i], $nama_kayu[$i], $ukuran_kayu[$i], $satuan_k_p[$i], $jumlah[$i], $harga[$i], $subtotal[$i]);
            mysqli_stmt_execute($stmt_detail);
            mysqli_stmt_close($stmt_detail);

           
            $table_name = 'stok_' . $nama_kayu[$i]; 
            if ($satuan_k_p[$i] == 'kubik') {
                $query_update_stok = "UPDATE $table_name SET jumlah_kubik = jumlah_kubik - ? WHERE satuan_kayu = ?";
            } else if ($satuan_k_p[$i] == 'potong') {
                $query_update_stok = "UPDATE $table_name SET jumlah_potong = jumlah_potong - ? WHERE satuan_kayu = ?";
            }

           
            $stmt_update_stok = mysqli_prepare($conn, $query_update_stok);
            mysqli_stmt_bind_param($stmt_update_stok, "is", $jumlah[$i], $ukuran_kayu[$i]);
            mysqli_stmt_execute($stmt_update_stok);
            mysqli_stmt_close($stmt_update_stok);
        }
    }

    header("Location: pembelian.php?status=success");
    exit();
}




 // Hapus data di dalam tabel
ob_start();
if (isset($_POST['hapuspembeli'])) {
    $id_parent = $_POST['id_parent'];

    if (!empty($id_parent)) {
        $query = "DELETE FROM detail_nota WHERE parent_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id_parent);
        $stmt->execute();

        $query2 = "DELETE FROM parent_table WHERE id_parent = ?";
        $stmt2 = $conn->prepare($query2);
        $stmt2->bind_param("i", $id_parent);
        $stmt2->execute();

        if ($stmt2->affected_rows > 0) {
            header('Location: pembelian.php?status=hapus-success');
            exit();
        } else {
            header('Location: pembelian.php?status=hapus-error');
            exit();
        }
        } else {
            header('Location: pembelian.php?status=hapus-error');
            exit();
        }
        
    $stmt->close();
    $stmt2->close();
    $conn->close();
    }

    ob_end_flush();
        









/************* MANAJEMEN ADMIN PHP ******************/

  // tambah pengguna baru
if (isset($_POST['tambah_pengguna'])) {
    $nama_pengguna = $_POST['nama_pengguna'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];

    $addtotable = mysqli_query($conn, "INSERT INTO `user` (username, password, role, nama_pengguna) VALUES ('$username', '$password', '$role', '$nama_pengguna')");
    if ($addtotable) {
        echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: "success",
                        title: "Sukses!",
                        text: "Pengguna baru berhasil ditambahkan",
                        customClass: {
                            popup: "swal2-smaller-popup",
                            title: "swal2-smaller-title",
                            content: "swal2-smaller-content",
                            confirmButton: "swal2-ok-button"
                        }
                    }).then(function() {
                        window.location.href = "manajemen_admin.php";
                    });
                });
              </script>';
    } else {
        echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: "error",
                        title: "Gagal!",
                        text: "Gagal menambah pengguna",
                        customClass: {
                            popup: "swal2-smaller-popup",
                            title: "swal2-smaller-title",
                            content: "swal2-smaller-content",
                            confirmButton: "swal2-ok-button"
                        }
                    });
                });
              </script>';
     }
}


  // edit pengguna
if (isset($_POST['edit_pengguna'])) {
    $id_pengguna = $_POST['id_pengguna'];
    $nama_pengguna = $_POST['nama_pengguna'];
    $username = $_POST['username'];
    $role = $_POST['role'];


    if (!empty($_POST['password'])) {
        $password = md5($_POST['password']);
        $update = mysqli_query($conn, "UPDATE `user` SET username = '$username', password = '$password', role = '$role', nama_pengguna = '$nama_pengguna' WHERE id = '$id_pengguna'");
    } else {
        $update = mysqli_query($conn, "UPDATE `user` SET username = '$username', role = '$role', nama_pengguna = '$nama_pengguna' WHERE id = '$id_pengguna'");
    }

    if ($update) {
        echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: "success",
                        title: "Sukses!",
                        text: "berhasil diperbarui",
                        customClass: {
                            popup: "swal2-smaller-popup",
                            title: "swal2-smaller-title",
                            content: "swal2-smaller-content",
                            confirmButton: "swal2-ok-button"
                        }
                    }).then(function() {
                        window.location.href = "manajemen_admin.php";
                    });
                });
              </script>';
    } else {
        echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: "error",
                        title: "Gagal!",
                        text: "Gagal mengupdate pengguna",
                        customClass: {
                            popup: "swal2-smaller-popup",
                            title: "swal2-smaller-title",
                            content: "swal2-smaller-content",
                            confirmButton: "swal2-ok-button"
                        }
                    });
                });
              </script>';
    }
}


// hapus pengguna
if (isset($_POST['hapus_pengguna'])) {
    $id_pengguna = $_POST['id'];

    $hapus = mysqli_query($conn, "DELETE FROM `user` WHERE id = '$id_pengguna'");
    if($hapus){
        header('Location: manajemen_admin.php?status=success');
        exit();
    } else {
        header('Location: manajemen_admin.php?status=error');
        exit();
    }
}





/*=============JUMLAH KUBIK DAN POTONG UNTUK JENIS KAYU CHART BAR=================*/

// Total Stok Kayu Miranti
$total_kubik_miranti = 0;
$total_potong_miranti = 0;
$ambilsemuadatastock = mysqli_query($conn, "SELECT * FROM stok_miranti");
while($data = mysqli_fetch_array($ambilsemuadatastock)){
    $total_kubik_miranti += $data['jumlah_kubik'];
    $total_potong_miranti += $data['jumlah_potong'];
}

// Total Stok Kayu Samama
$total_kubik_samama = 0;
$total_potong_samama = 0;
$ambilsemuadatastock = mysqli_query($conn, "SELECT * FROM stok_samama");
while($data = mysqli_fetch_array($ambilsemuadatastock)){
    $total_kubik_samama += $data['jumlah_kubik'];
    $total_potong_samama += $data['jumlah_potong'];
}

// Total Stok Kayu Tawang
$total_kubik_tawang = 0;
$total_potong_tawang = 0;
$ambilsemuadatastock = mysqli_query($conn, "SELECT * FROM stok_tawang");
while($data = mysqli_fetch_array($ambilsemuadatastock)){
    $total_kubik_tawang += $data['jumlah_kubik'];
    $total_potong_tawang += $data['jumlah_potong'];
}

// Total Stok Kayu Kenari
$total_kubik_kenari = 0;
$total_potong_kenari = 0;
$ambilsemuadatastock = mysqli_query($conn, "SELECT * FROM stok_kenari");
while($data = mysqli_fetch_array($ambilsemuadatastock)){
    $total_kubik_kenari += $data['jumlah_kubik'];
    $total_potong_kenari += $data['jumlah_potong'];
}

// Total Stok Kayu Putih
$total_kubik_putih = 0;
$total_potong_putih = 0;
$ambilsemuadatastock = mysqli_query($conn, "SELECT * FROM stok_putih");
while($data = mysqli_fetch_array($ambilsemuadatastock)){
    $total_kubik_putih += $data['jumlah_kubik'];
    $total_potong_putih += $data['jumlah_potong'];
}

// Total Stok Kayu Giawas
$total_kubik_giawas = 0;
$total_potong_giawas = 0;
$ambilsemuadatastock = mysqli_query($conn, "SELECT * FROM stok_giawas");
while($data = mysqli_fetch_array($ambilsemuadatastock)){
    $total_kubik_giawas += $data['jumlah_kubik'];
    $total_potong_giawas += $data['jumlah_potong'];
}

// Total Stok Kayu Palaka
$total_kubik_palaka = 0;
$total_potong_palaka = 0;
$ambilsemuadatastock = mysqli_query($conn, "SELECT * FROM stok_palaka");
while($data = mysqli_fetch_array($ambilsemuadatastock)){
    $total_kubik_palaka += $data['jumlah_kubik'];
    $total_potong_palaka += $data['jumlah_potong'];
}

// Total Stok Kayu Pule
$total_kubik_pule = 0;
$total_potong_pule = 0;
$ambilsemuadatastock = mysqli_query($conn, "SELECT * FROM stok_pule");
while($data = mysqli_fetch_array($ambilsemuadatastock)){
    $total_kubik_pule += $data['jumlah_kubik'];
    $total_potong_pule += $data['jumlah_potong'];
}










/*=============JUMLAH  UNTUK JENIS KAYU CHART BDOUGNUT=================*/

// Mengambil data dari detail_nota
$query1 = "SELECT nama_kayu, SUM(jumlah_kayu) as total_kayu FROM detail_nota GROUP BY nama_kayu";
$result1 = mysqli_query($conn, $query1);

// Mengambil data dari barang_keluar
$query2 = "SELECT nama_barang as nama_kayu, SUM(jumlah_kubik + jumlah_potong) as total_kayu FROM barang_keluar GROUP BY nama_barang";
$result2 = mysqli_query($conn, $query2);

$stok = [];


while ($row = mysqli_fetch_assoc($result1)) {
    $stok[$row['nama_kayu']] = $row['total_kayu'];
}

// Menambahkan hasil query kedua ke dalam array
while ($row = mysqli_fetch_assoc($result2)) {
    if (isset($stok[$row['nama_kayu']])) {
        $stok[$row['nama_kayu']] += $row['total_kayu'];
    } else {
        $stok[$row['nama_kayu']] = $row['total_kayu'];
    }
}

$jenisBarangData = [];
foreach ($stok as $nama_kayu => $total_kayu) {
    $jenisBarangData[] = [
        'label' => $nama_kayu,
        'total_stok' => $total_kayu
    ];
}





/*============= NOTIFIKASI STOK DI NAVBAR MENIPIS (KUBIK=10 & POTONG=50)=================*/
// Ambil data stok menipis untuk setiap tabel => untuk notufikasi
$low_stock_queries = [
    "SELECT 'miranti' AS tabel, satuan_kayu, jumlah_kubik, jumlah_potong FROM stok_miranti WHERE jumlah_kubik <= 10 OR jumlah_potong <= 50",
    "SELECT 'samama' AS tabel, satuan_kayu, jumlah_kubik, jumlah_potong FROM stok_samama WHERE jumlah_kubik <= 10 OR jumlah_potong <= 50",
    "SELECT 'tawang' AS tabel, satuan_kayu, jumlah_kubik, jumlah_potong FROM stok_tawang WHERE jumlah_kubik <= 10 OR jumlah_potong <= 50",
    "SELECT 'kenari' AS tabel, satuan_kayu, jumlah_kubik, jumlah_potong FROM stok_kenari WHERE jumlah_kubik <= 10 OR jumlah_potong <= 50",
    "SELECT 'putih' AS tabel, satuan_kayu, jumlah_kubik, jumlah_potong FROM stok_putih WHERE jumlah_kubik <= 10 OR jumlah_potong <= 50",
    "SELECT 'giawas' AS tabel, satuan_kayu, jumlah_kubik, jumlah_potong FROM stok_giawas WHERE jumlah_kubik <= 10 OR jumlah_potong <= 50",
    "SELECT 'palaka' AS tabel, satuan_kayu, jumlah_kubik, jumlah_potong FROM stok_palaka WHERE jumlah_kubik <= 10 OR jumlah_potong <= 50",
    "SELECT 'pule' AS tabel, satuan_kayu, jumlah_kubik, jumlah_potong FROM stok_pule WHERE jumlah_kubik <= 10 OR jumlah_potong <= 50"
];

$low_stock_items = [];
$low_stock_count = 0;

foreach ($low_stock_queries as $query) {
    $result = mysqli_query($conn, $query);
    while ($item = mysqli_fetch_array($result)) {
        $low_stock_items[] = $item;
        $low_stock_count++;
    }
}






/*============= PHP SETTING PASSWORD USER =================*/

if (isset($_POST['submit'])) {
    $username = $_SESSION['username'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    $query = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row['password'];

        if (md5($old_password) == $stored_password) {
            if ($new_password == $confirm_password) {
                $hashed_password = md5($new_password);
                $update_query = "UPDATE user SET password='$hashed_password' WHERE username='$username'";
                mysqli_query($conn, $update_query);

                echo "<script>
                        alert('Password Anda berhasil diubah silakan klik OK untuk login ulang');
                        window.location.href = 'login.php';
                      </script>";
            } else {
                echo "<script>alert('Konfirmasi password baru tidak sesuai');</script>";
            }
        } else {
            echo "<script>alert('Password lama salah');</script>";
        }
    } else {
        echo "<script>alert('User tidak ditemukan');</script>";
    }
}






/*============= Activity Admin & user =================*/

$query = "SELECT username, login_time FROM login_activities ORDER BY login_time DESC LIMIT 10";
$result = mysqli_query($conn, $query);

$classes = ['sl-primary', 'sl-secondary', 'sl-success', 'sl-danger', 'sl-warning', 'sl-info'];
$class_count = count($classes);


// Query untuk mendapatkan aktivitas login admin
$admin_query = "
    SELECT la.username, la.login_time
    FROM login_activities la
    JOIN user u ON la.username = u.username
    WHERE u.role = 1
    ORDER BY la.login_time DESC
    LIMIT 10
";

// Query untuk mendapatkan aktivitas login user
$user_query = "
    SELECT la.username, la.login_time
    FROM login_activities la
    JOIN user u ON la.username = u.username
    WHERE u.role = 0
    ORDER BY la.login_time DESC
    LIMIT 10
";

// Eksekusi query untuk admin dan user
$admin_result = mysqli_query($conn, $admin_query);
$user_result = mysqli_query($conn, $user_query);

?>