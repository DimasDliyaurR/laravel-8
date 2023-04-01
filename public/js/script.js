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

// myModal.addEventListener('shown.bs.modal', () => {
//     myInput.focus()
// })

// fetch("https://localhost:8000/api/").then((response)=>
// response.json()).then((response)=>console.log(response))
