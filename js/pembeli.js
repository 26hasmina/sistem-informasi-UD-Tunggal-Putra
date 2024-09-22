let rowCount = 1;

function calculateSubtotal(row) {
    const harga = document.getElementById(`harga_${row}`).value;
    const jumlah = document.getElementById(`jumlah_${row}`).value;
    let subtotal = 0;

    if (harga !== '' && jumlah !== '') {
        // harga & jumlah di kali(x)
        subtotal = harga * jumlah;
    }

    document.getElementById(`subtotal_${row}`).value = subtotal.toFixed(2); // Menyimpan subtotal dengan 2 desimal

    calculateTotal();
}

function calculateTotal() {
    let total = 0;
    for (let i = 1; i <= rowCount; i++) {
        const subtotal = document.getElementById(`subtotal_${i}`);
        if (subtotal) {
            total += parseFloat(subtotal.value) || 0;
        }
    }
    document.getElementById('total').value = total.toFixed(2); // Menyimpan total keseluruhan dengan 2 desimal
}

function addRow() {
    if (rowCount >= 12) {
        showMaxRowsMessage();
        return;
    }

    // Source untul fitur button (tambah baris) pada nota kakulator
    rowCount++;
    const table = document.getElementById('notaTable').getElementsByTagName('tbody')[0];
    const row = table.insertRow();
    row.id = `row_${rowCount}`;
    row.classList.add('centered-row'); 
    row.innerHTML = `
        <td class="centered-cell"><button type="button" class="btn-hapus" onclick="deleteRow(${rowCount})"><i class="fas fa-times" style="color: red;"></i></button></td>
        <td class="centered-cell">${rowCount}</td>
        <td class="centered-cell"><input type="date" name="tanggal[]" required></td>
        <td class="centered-cell">
            <select name="nama_kayu[]" class="form-control custom-select" required>
                <option value="" disabled selected>Jenis Kayu</option>
                <?php
                // Daftar nama tabel stok kayu
                $tabels = ['miranti', 'samama', 'tawang', 'kenari', 'putih', 'giawas', 'palaka', 'pule'];

                // Loop untuk menampilkan nama-nama tabel
                foreach ($tabels as $tabel) {
                    // Format nama opsi dengan menambahkan "Kayu " di depannya
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
                // Daftar tabel stok kayu
                $tabels = ['stok_miranti', 'stok_samama', 'stok_tawang', 'stok_kenari', 'stok_putih', 'stok_giawas', 'stok_palaka', 'stok_pule'];

                // Loop untuk mengambil satuan kayu dari setiap tabel
                foreach ($tabels as $tabel) {
                    $query_satuan = mysqli_query($conn, "SELECT DISTINCT satuan_kayu FROM $tabel");
                    // Memeriksa apakah query berhasil dieksekusi
                    if (!$query_satuan) {
                        die("Query failed: " . mysqli_error($conn)); // Menampilkan pesan kesalahan jika query gagal
                    }
                    while ($row = mysqli_fetch_assoc($query_satuan)) {
                        // Format nama opsi dengan jenis satuan kayu dan jenis kayu
                        $jenis_kayu = substr($tabel, 5); // Mengambil bagian setelah "stok_"
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
        <td class="centered-cell"><input type="number" name="jumlah[]" id="jumlah_${rowCount}" oninput="calculateSubtotal(${rowCount})" required></td>
        <td class="centered-cell"><input type="number" name="harga[]" id="harga_${rowCount}" oninput="calculateSubtotal(${rowCount})" required></td>
        <td class="centered-cell"><input type="text" name="subtotal[]" id="subtotal_${rowCount}" readonly></td>
    `;
    updateRowNumbers();
} // And Source untul fitur button (tambah baris) pada nota kakulator


// untuk fitur button delete pada nota kakulator
function deleteRow(row) {
    const rowElement = document.getElementById(`row_${row}`);
    rowElement.parentNode.removeChild(rowElement);
    updateRowNumbers();
    calculateTotal();
}

function updateRowNumbers() {
    const rows = document.getElementById('notaTable').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    for (let i = 0; i < rows.length; i++) {
        rows[i].getElementsByTagName('td')[1].textContent = i + 1; // Update nomor urut di kolom kedua
    }
    rowCount = rows.length;
}

function showMaxRowsMessage() {
    const maxRowsMessage = document.getElementById('maxRowsMessage');
    maxRowsMessage.style.display = 'block';

    setTimeout(function() {
        maxRowsMessage.style.display = 'none';
    }, 7000); // Sembunyikan pesan setelah 7 detik
}

$(document).ready(function() {
    $('#example').DataTable({
        "scrollX": true
    });
});

function toggleDetail(id_parent) {
    var childRows = document.querySelectorAll(`tr[data-parent-id='${id_parent}']`);
    childRows.forEach(row => {
        row.style.display = row.style.display === 'none' ? 'table-row' : 'none';
    });
}
