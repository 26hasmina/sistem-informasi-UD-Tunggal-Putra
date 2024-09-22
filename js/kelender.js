document.addEventListener('DOMContentLoaded', function() {
    const calendar = document.querySelector('.calendar');
    const monthYearDisplay = document.getElementById('month-year');
    const daysContainer = document.querySelector('.days');
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');

    let currentDate = new Date();
    let today = new Date();

    const holidays = [
        { date: new Date(2024, 0, 1), name: 'Tahun Baru 2024' },
        { date: new Date(2024, 0, 25), name: 'Tahun Baru Imlek 2575' },
        { date: new Date(2024, 2, 7), name: 'Hari Raya Nyepi Tahun Baru Saka 1946' },
        { date: new Date(2024, 3, 19), name: 'Jumat Agung' },
        { date: new Date(2024, 3, 21), name: 'Hari Raya Waisak' },
        { date: new Date(2024, 4, 1), name: 'Hari Buruh Internasional' },
        { date: new Date(2024, 4, 19), name: 'Kenaikan Isa Almasih' },
        { date: new Date(2024, 5, 17), name: 'Hari Raya Idul Adha 1445 H' },
        { date: new Date(2024, 6, 4), name: 'Hari Pancasila' },
        { date: new Date(2024, 6, 6), name: 'Hari Raya Waisak' },
        { date: new Date(2024, 7, 17), name: 'Hari Kemerdekaan RI' },
        { date: new Date(2024, 8, 1), name: 'Hari Raya Idul Fitri 1445 H' },
        { date: new Date(2024, 10, 9), name: 'Tahun Baru Islam 1446 H' },
        { date: new Date(2024, 11, 25), name: 'Hari Raya Natal' }
    ];

    function renderCalendar(date) {
        const month = date.getMonth();
        const year = date.getFullYear();

        // Perbarui tampilan bulan dan tahun
        monthYearDisplay.textContent = `${date.toLocaleString('default', { month: 'long' })} ${year}`;

        daysContainer.innerHTML = '';

        const firstDay = new Date(year, month, 1);
        const lastDay = new Date(year, month + 1, 0);

        const firstDayIndex = firstDay.getDay();

        for (let i = 0; i < firstDayIndex; i++) {
            const emptyDiv = document.createElement('div');
            emptyDiv.classList.add('empty');
            daysContainer.appendChild(emptyDiv);
        }

        for (let day = 1; day <= lastDay.getDate(); day++) {
            const dayDiv = document.createElement('div');
            dayDiv.textContent = day;

            if (year === today.getFullYear() && month === today.getMonth() && day === today.getDate()) {
                dayDiv.classList.add('today');
            }

            // Periksa apakah hari ini adalah hari libur
            const holiday = holidays.find(holiday => holiday.date.getFullYear() === year && holiday.date.getMonth() === month && holiday.date.getDate() === day);
            if (holiday) {
                dayDiv.classList.add('holiday');
                dayDiv.setAttribute('data-tooltip', holiday.name);
            }

            daysContainer.appendChild(dayDiv);
        }
    }

    prevButton.addEventListener('click', function() {
        // tombol Pindah ke bulan sebelumnya
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar(currentDate);
    });

    nextButton.addEventListener('click', function() {
        // tombol Pindah ke bulan berikutnya
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar(currentDate);
    });

    renderCalendar(currentDate);
});
