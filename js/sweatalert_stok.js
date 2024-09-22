
window.onload = function () {
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');
    const message = urlParams.get('message');

    if (status === 'success') {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Data Stok berhasil ditambahkan.',
            showConfirmButton: true,
            customClass: {
                popup: 'swal2-smaller-popup swal2-add-success-popup',
                title: 'swal2-smaller-title',
                content: 'swal2-smaller-content',
                confirmButton: 'swal2-ok-button'
            }
        });
        removeUrlParameter('status');
    } else if (status === 'error&message') {
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: message || 'Data Stok gagal ditambahkan.',
            showConfirmButton: true,
            customClass: {
                popup: 'swal2-smaller-popup swal2-add-error-popup',
                title: 'swal2-smaller-title',
                content: 'swal2-smaller-content',
                confirmButton: 'swal2-ok-button'
            }
        });
        removeUrlParameter('status');
        removeUrlParameter('message');
    }
};

function removeUrlParameter(param) {
    const url = new URL(window.location);
    url.searchParams.delete(param);
    window.history.replaceState({}, document.title, url);
}






function removeUrlParameter(param) {
    const url = new URL(window.location);
    url.searchParams.delete(param);
    window.history.replaceState({}, document.title, url);
}

document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');

    if (status === 'edit-success') {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Data berhasil diubah.',
            showConfirmButton: true,
            customClass: {
                popup: 'swal2-smaller-popup swal2-edit-success-popup',
                title: 'swal2-smaller-title',
                content: 'swal2-smaller-content',
                confirmButton: 'swal2-ok-button'
            }
        });
        removeUrlParameter('status');
    } else if (status === 'edit-error') {
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: 'Data gagal diubah.',
            showConfirmButton: true,
            customClass: {
                popup: 'swal2-smaller-popup swal2-edit-error-popup',
                title: 'swal2-smaller-title',
                content: 'swal2-smaller-content',
                confirmButton: 'swal2-ok-button'
            }
        });
        removeUrlParameter('status');
    }
});




document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.hapus-barang').forEach(button => {
        button.addEventListener('click', function() {
            const idb = this.dataset.id; 
            const tabel = this.dataset.tabel; 

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ini akan dihapus dan tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch('function.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: new URLSearchParams({
                            'hapusstok': true,
                            'idb': idb,
                            'tabel': tabel
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            Swal.fire(
                                'Dihapus!',
                                'Data stok berhasil dihapus.',
                                'success'
                            ).then(() => {
                                location.reload(); 
                            });
                        } else {
                            Swal.fire(
                                'Error!',
                                data.message || 'Terjadi kesalahan saat menghapus barang.',
                                'error'
                            );
                        }
                    })
                    .catch(error => {
                        Swal.fire(
                            'Error!',
                            'Terjadi kesalahan jaringan MINA.',
                            'error'
                        );
                    });
                }
            });
        });
    });
});
