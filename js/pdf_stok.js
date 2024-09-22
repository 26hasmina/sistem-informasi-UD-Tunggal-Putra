async function exportAllTables() {
    console.log("Fungsi exportAllTables dipanggil");

    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    const pageWidth = doc.internal.pageSize.getWidth();
    const title = 'UD. TUNGGAL PUTRA';
    const subtitle = 'TABEL STOK KAYU';

    doc.setFontSize(16);
    doc.setFont('helvetica', 'bold');
    const titleWidth = doc.getTextWidth(title);
    doc.text(title, pageWidth / 2, 10, { align: 'center' });

    doc.setFontSize(14);
    doc.setFont('helvetica', 'normal');
    const subtitleWidth = doc.getTextWidth(subtitle);
    doc.text(subtitle, pageWidth / 2, 16, { align: 'center' });

    const totalStock = document.getElementById('totalStock').innerText;
    const totalStockText = 'Total Stok Kayu = ';
    const totalStockValue = `${totalStock}`;

    doc.setFont('helvetica', 'bold'); 
    doc.setTextColor(0, 0, 0); 
    const totalStockY = 32;
    doc.text(totalStockText, 10, totalStockY);

    doc.setTextColor(255, 0, 0);
    doc.text(totalStockValue, doc.getTextWidth(totalStockText) + 12, totalStockY);

    let currentY = totalStockY + 10;

    function addTableToPDF(tableId, tableTitle) {
        const table = document.getElementById(tableId);
        if (!table) {
            console.log(`Table with ID ${tableId} not found`);
            return;
        }

        const rows = table.querySelectorAll('tr');
        const data = [];

        rows.forEach(row => {
            const rowData = [];
            row.querySelectorAll('th, td').forEach((cell, index) => {
                if (index < row.querySelectorAll('th, td').length - 1) {
                    rowData.push(cell.innerText);
                }
            });
            data.push(rowData);
        });

        if (data.length === 0) {
            console.log(`No data in table ${tableId}`);
            return;
        }

        const tableTitleWidth = doc.getTextWidth(tableTitle);
        const tableTitleX = pageWidth / 2;

        doc.setTextColor(0, 0, 0);
        doc.text(tableTitle, tableTitleX, currentY + 10, { align: 'center' });
        currentY += 20;

        doc.autoTable({
            head: [data[0]],
            body: data.slice(1),
            startY: currentY,
            margin: { top: 10, bottom: 5, left: 10, right: 10 },
            styles: {
                fillColor: [255, 255, 255]
            },
            headStyles: {
                fillColor: [0, 57, 107]
            }
        });

        currentY = doc.autoTable.previous.finalY + 10;
    }

    addTableToPDF('dataTable1', 'Data Tabel Stok Kayu Miranti');
    addTableToPDF('dataTable2', 'Data Tabel Stok Kayu Samama');
    addTableToPDF('dataTable3', 'Data Tabel Stok Kayu Tawang');
    addTableToPDF('dataTable4', 'Data Tabel Stok Kayu Kenari');
    addTableToPDF('dataTable5', 'Data Tabel Stok Kayu Putih');
    addTableToPDF('dataTable6', 'Data Tabel Stok Kayu Giawas');
    addTableToPDF('dataTable7', 'Data Tabel Stok Kayu Palaka');
    addTableToPDF('dataTable8', 'Data Tabel Stok Kayu Pule');

    doc.save('Data Stok Kayu.pdf');
}
