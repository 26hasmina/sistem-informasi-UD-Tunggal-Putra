document.addEventListener('DOMContentLoaded', function() {
    var totalKubik = dataAttributes.kubik;
    var totalPotong = dataAttributes.potong;

    var ctxBar = document.getElementById('barChart').getContext('2d');
    var barChart = new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: ['Miranti', 'Samama', 'Tawang', 'Kenari', 'Putih', 'Giawas', 'Palaka', 'Pule'],
            datasets: [
                {
                    label: 'Total Kubik',
                    data: [
                        Math.abs(totalKubik.miranti),
                        Math.abs(totalKubik.samama),
                        Math.abs(totalKubik.tawang),
                        Math.abs(totalKubik.kenari),
                        Math.abs(totalKubik.putih),
                        Math.abs(totalKubik.giawas),
                        Math.abs(totalKubik.palaka),
                        Math.abs(totalKubik.pule)
                    ],
                    backgroundColor: 'rgb(6, 56, 95)',
                    borderColor: 'rgb(6, 56, 95)',
                    borderWidth: 1
                },
                {
                    label: 'Total Potong',
                    data: [
                        Math.abs(totalPotong.miranti),
                        Math.abs(totalPotong.samama),
                        Math.abs(totalPotong.tawang),
                        Math.abs(totalPotong.kenari),
                        Math.abs(totalPotong.putih),
                        Math.abs(totalPotong.giawas),
                        Math.abs(totalPotong.palaka),
                        Math.abs(totalPotong.pule)
                    ],
                    backgroundColor: 'rgb(62, 161, 205)',
                    borderColor: 'rgb(62, 161, 205)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
