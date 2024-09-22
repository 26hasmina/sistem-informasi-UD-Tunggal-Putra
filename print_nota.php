<?php

include('function.php');

// Ambil data dari form
$tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : [];
$nama_kayu = isset($_POST['nama_kayu']) ? $_POST['nama_kayu'] : [];
$ukuran_kayu = isset($_POST['ukuran_kayu']) ? $_POST['ukuran_kayu'] : [];
$satuan_k_p = isset($_POST['satuan_k_p']) ? $_POST['satuan_k_p'] : [];
$jumlah = isset($_POST['jumlah']) ? $_POST['jumlah'] : [];
$harga = isset($_POST['harga']) ? $_POST['harga'] : [];
$subtotal = isset($_POST['subtotal']) ? $_POST['subtotal'] : [];
$total_keseluruhan = isset($_POST['total_keseluruhan']) ? $_POST['total_keseluruhan'] : 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Print Nota</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .center {
            text-align: center;
        }

        @media screen {
            body * {
                display: none;
            }
        }

        @media print {
            body * {
                visibility: hidden;
            }

            .printable-area, .printable-area * {
                visibility: visible;
            }

            .printable-area {
                position: absolute;
                left: 0;
                top: 0;
            }
        }
    </style>
</head>
<body onload="window.print(); detectPrintClose();">



                <div class="printable-area">
                    <h1 class="center">Nota Kalkulator</h1>
                    <table>
                        <thead>
                            <tr>
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
                        <tbody>
                            <?php
                            $count = count($tanggal);
                            for ($i = 0; $i < $count; $i++) {
                                echo '<tr>';
                                echo '<td>' . ($i + 1) . '</td>';
                                echo '<td>' . htmlspecialchars(isset($tanggal[$i]) ? $tanggal[$i] : '') . '</td>';
                                echo '<td>' . htmlspecialchars(isset($nama_kayu[$i]) ? $nama_kayu[$i] : '') . '</td>';
                                echo '<td>' . htmlspecialchars(isset($ukuran_kayu[$i]) ? $ukuran_kayu[$i] : '') . '</td>';
                                echo '<td>' . htmlspecialchars(isset($satuan_k_p[$i]) ? $satuan_k_p[$i] : '') . '</td>';
                                echo '<td>' . htmlspecialchars(isset($jumlah[$i]) ? $jumlah[$i] : '') . '</td>';
                                echo '<td>' . htmlspecialchars(isset($harga[$i]) ? $harga[$i] : '') . '</td>';
                                echo '<td>' . htmlspecialchars(isset($subtotal[$i]) ? $subtotal[$i] : '') . '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7" class="center"><strong>Total Keseluruhan (Rp)</strong></td>
                                <td class="center"><?php echo htmlspecialchars($total_keseluruhan); ?></td>
                            </tr>
                        </tfoot>
                    </table>
                    </div>
                    <script>
                    window.onload = function() {
                        window.print();
                        window.onafterprint = function() {
                            window.location.href = 'pembelian.php';
                        };
                    };
                </script>
        </body>
</html>
