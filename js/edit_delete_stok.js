function showEditModal(id, tabel) {
    document.getElementById('idb').value = id;
    document.getElementById('tabel_tujuan').value = tabel;


    fetch(`function.php?id=${id}&tabel=${tabel}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                alert(data.error);
            } else {
                document.getElementById('satuan_kayu').value = data.satuan_kayu;
                document.getElementById('harga_kubik').value = data.harga_kubik;
                document.getElementById('edit_harga_kubik').value = data.harga_kubik;
                document.getElementById('edit_harga_potong').value = data.harga_potong;
                document.getElementById('jumlah_potong').value = data.jumlah_potong;
            }
        });
}


document.querySelectorAll('.btn-edit').forEach(button => {
    button.addEventListener('click', () => {
        const id = button.getAttribute('data-id');
        const tabel = button.getAttribute('data-tabel');
        showEditModal(id, tabel);
    });
});




document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.btn-edit');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const idb = this.getAttribute('data-id');
            const tabel_tujuan = this.getAttribute('data-tabel');
            const satuan_kayu = this.getAttribute('data-satuan');
            const harga_kubik = this.getAttribute('data-harga-kubik');
            const harga_potong = this.getAttribute('data-harga-potong');
            const jumlah_kubik = this.getAttribute('data-jumlah-kubik');
            const jumlah_potong = this.getAttribute('data-jumlah-potong');

            // mengambil id edit_tebal dari form modal edit stok//
            document.getElementById('edit_id').value = idb;
            document.getElementById('edit_tabel_tujuan').value = tabel_tujuan;
            document.getElementById('edit_satuan_kayu').value = satuan_kayu;
            document.getElementById('edit_harga_kubik').value = harga_kubik;
            document.getElementById('edit_harga_potong').value = harga_potong;
            document.getElementById('edit_jumlah_kubik').value = jumlah_kubik;
            document.getElementById('edit_jumlah_potong').value = jumlah_potong;
        });
    });
});


// Script untuk membuka modal delete
document.querySelectorAll('.btn-delete').forEach(button => {
  button.addEventListener('click', function() {
    const id = this.getAttribute('data-id');
    const tabel = this.getAttribute('data-tabel');
    document.getElementById('deleteId').value = id;
    document.getElementById('deleteTable').value = tabel;
  });
});