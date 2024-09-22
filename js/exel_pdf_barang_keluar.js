
//====================JS UNTUK FITUR EXEL===========================//

document.getElementById('exportExcel').addEventListener('click', function() {
    var table = document.getElementById('dataTable');
    var ws = XLSX.utils.table_to_sheet(table);
    var firstCol = 'A';
 
 
    for (var cellAddress in ws) {
        if (ws.hasOwnProperty(cellAddress) && cellAddress[0] !== '!') {
            var cell = ws[cellAddress];
 
        
            if (!cell.s) cell.s = {};
            cell.s.alignment = { horizontal: "left" };
 
            // Hapus data NaN/waktu pada kolom pertama
            if (cellAddress.startsWith(firstCol)) {
                if (cell.v === 'NaN') {
                    delete ws[cellAddress]; 
                } else if (cell.v instanceof Date) {
                    cell.t = 'd'; 
                    cell.z = XLSX.SSF.get_table()['14']; // Format tanggal mm/dd/yyyy
                    cell.v = new Date(cell.v.toDateString()); 
                }
            }
        }
    }
 
    
    var wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');
 
    // Lebarkan kolom tanggal
    ws['!cols'] = [];
    table.querySelectorAll('th').forEach(function(header, index) {
        ws['!cols'].push({ wch: header.innerText.length + 5 }); 
    });
 
    // Nama format Ekspor ke Excel
    XLSX.writeFile(wb, 'Barang Kekuar.xlsx');
 });
 
 
    
 
 //====================JS UNTUK FITUR PDF===========================//
 
 document.getElementById('exportPdf').addEventListener('click', function() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF('l', 'mm', 'a4');
 
    const pageWidth = doc.internal.pageSize.getWidth();
    const title = 'UD. TUNGGAL PUTRA';
    const subtitle = 'TABEL BARANG KELUAR';
    
    doc.setFontSize(16);
    doc.setFont('helvetica', 'bold');
    const titleWidth = doc.getTextWidth(title);
    doc.text(title, (pageWidth - titleWidth) / 2, 10); // Menempatkan judul di tengah horizontal
    doc.setFontSize(14);
    doc.setFont('helvetica', 'normal');
    const subtitleWidth = doc.getTextWidth(subtitle);
    doc.text(subtitle, (pageWidth - subtitleWidth) / 2, 16); // Menempatkan subjudul di tengah horizontal
    
    
    const startY = 30; // Posisi vertikal untuk tabel
    const table = $('#dataTable').DataTable(); 
    const rows = [];
    
    
    const header = [];
    const headerCells = table.columns().header(); 
    for (let j = 0; j < headerCells.length; j++) {
        if ($(headerCells[j]).text() !== "Aksi") {
            header.push($(headerCells[j]).text());
        }
    }
    rows.push(header);
 
    // menghapus kolom "Aksi"
    table.rows({ search: 'applied' }).every(function() {
        const data = this.data();
        const row = [];
        for (let j = 0; j < data.length; j++) {
            if ($(headerCells[j]).text() !== "Aksi") {
                let cellData = data[j];
                //Untuk menghilangkan <sup> dan </sup>
                cellData = cellData.replace(/<sup>/g, '').replace(/<\/sup>/g, '');
                row.push(cellData);
            }
        }
        rows.push(row);
    });
 
    console.log("Rows Data:", rows);
            doc.autoTable({
                head: [rows[0]],
                body: rows.slice(1),
                startY: startY, 
                theme: 'grid',
                styles: {
                fillColor: [211, 211, 211],
                textColor: [0, 0, 0],
                fontStyle: 'normal',
                halign: 'center',
                valign: 'middle',
                cellWidth: 'wrap',
                fontSize: 7.5 // Ukuran font 
            },
            headStyles: {
                fillColor: [0, 57, 107],
                textColor: [255, 255, 255],
                fontStyle: 'bold',
                cellWidth: 'wrap',
                fontSize: 7.5 // Ukuran font untuk judul tabel
            },
            alternateRowStyles: {
                fillColor: [245, 245, 245]
            },
            columnStyles: {
                0: { cellWidth: 'wrap' },
                1: { cellWidth: 'wrap' },
                2: { cellWidth: 'wrap' }
            },
            didDrawCell: function (data) {
                var doc = data.doc;
                var cell = data.cell;
                doc.rect(cell.x, cell.y, cell.width, cell.height, 'S');
            }
        });
 
        doc.save('Cetak Barang Keluar.pdf');
    });
 