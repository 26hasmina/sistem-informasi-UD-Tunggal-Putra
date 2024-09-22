
function confirmDelete(id) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data yang dihapus tidak akan bisa dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
        customClass: {
            popup: 'swal2-smaller-popup',
            title: 'swal2-smaller-title',
            content: 'swal2-smaller-content',
            confirmButton: 'swal2-ok-button',
            cancelButton: 'swal2-cancel-button'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            let form = document.createElement('form');
            form.method = 'post';
            form.action = 'function.php';

            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'id';
            input.value = id;
            form.appendChild(input);

            let deleteInput = document.createElement('input');
            deleteInput.type = 'hidden';
            deleteInput.name = 'hapus_pengguna';  // Ubah nama sesuai dengan PHP
            form.appendChild(deleteInput);

            document.body.appendChild(form);
            form.submit();
        }
    })
}


function removeUrlParameter(param) {
    const url = new URL(window.location);
    url.searchParams.delete(param);
    window.history.replaceState({}, document.title, url);
}


document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');
    if (status === 'success') {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Data berhasil dihapus.',
            showConfirmButton: true,
            customClass: {
                popup: 'swal2-smaller-popup swal2-delete-success-popup',
                title: 'swal2-smaller-title',
                content: 'swal2-smaller-content',
                confirmButton: 'swal2-ok-button'
            }
        });
        removeUrlParameter('status');  
    } else if (status === 'error') {
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: 'Data gagal dihapus.',
            showConfirmButton: true,
            customClass: {
                popup: 'swal2-smaller-popup swal2-delete-error-popup',
                title: 'swal2-smaller-title',
                content: 'swal2-smaller-content',
                confirmButton: 'swal2-ok-button'
            }
        });
        removeUrlParameter('status');  
    }
});
