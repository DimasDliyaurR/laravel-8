const btnModalEdit = document.querySelectorAll(".btn-modal-edit");
const search = document.querySelectorAll(".search");
const kodeBarang = document.getElementById("kode_barang");
const namaBarang = document.getElementById("nama_barang");
const satuan = document.getElementById("satuan");
const hargaPokok = document.getElementById("harga_pokok");
const hargaSatuan = document.getElementById("harga_satuan");

search.value = "oke";

btnModalEdit.forEach((btn) => {
    btn.addEventListener("click", function (e) {
        console.log(this.dataset.id);
        fetch(`http://localhost:8000/api/${this.dataset.id}`)
            .then((response) => response.json())
            .then((response) => {
                const data = response.data[0];
                kodeBarang.value = data.kode_barang;
                namaBarang.value = data.nama_barang;
                satuan.value = data.satuan;
                hargaPokok.value = data.harga_pokok;
                hargaSatuan.value = data.harga_satuan;
            });
    });
});

console.log("test");
const myModal = document.getElementById("myModal");
const myInput = document.getElementById("myInput");

// Excel Export
function ExportToExcel(type, fn, dl) {
    var elt = document.getElementById("table");
    var wb = XLSX.utils.table_to_book(elt, {
        sheet: "sheet1",
    });
    return dl
        ? XLSX.write(wb, {
              bookType: type,
              bookSST: true,
              type: "base64",
          })
        : XLSX.writeFile(wb, fn || "Anggota_kelompok1." + (type || "xlsx"));
}

// Make export word
function Export2Word(element, filename = "") {
    var preHtml =
        "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Export HTML To Doc</title></head><body>";
    var postHtml = "</body></html>";
    var html = preHtml + document.getElementById(element).innerHTML + postHtml;

    var blob = new Blob(["\ufeff", html], {
        type: "application/msword",
    });

    // Specify link url
    var url =
        "data:application/vnd.ms-word;charset=utf-8," +
        encodeURIComponent(html);

    // Specify file name
    filename = filename ? filename + ".doc" : "document.doc";

    // Create download link element
    var downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);

    if (navigator.msSaveOrOpenBlob) {
        navigator.msSaveOrOpenBlob(blob, filename);
    } else {
        // Create a link to the file
        downloadLink.href = url;

        // Setting the file name
        downloadLink.download = filename;

        //triggering the function
        downloadLink.click();
    }

    document.body.removeChild(downloadLink);
}
