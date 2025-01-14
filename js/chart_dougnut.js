
    const namaBarangLabels = jenisBarangData.map(item => item.label);
    const namaBarangStock = jenisBarangData.map(item => item.total_stok);

    const ctx2 = document.getElementById('doughnut').getContext('2d');
    const doughnut = new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: namaBarangLabels,
            datasets: [{
                label: 'Total Keseluruhan Stok',
                data: namaBarangStock,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.8)',
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(255, 206, 86, 0.8)',
                    'rgba(75, 192, 192, 0.8)',
                    'rgba(153, 102, 255, 0.8)',
                    'rgba(255, 159, 64, 0.8)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'right',
                    labels: {
                        fontColor: 'black'
                    }
                }
            }
        }
    });