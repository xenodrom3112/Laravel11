// Ini merupakan object
let mhs = {
    nama: "Rizky",
    umur: 23,
    ips: [3.0, 2.5, 3.2],
    alamat: {
        jalan: "Jl. ABC No. 123",
        kota: "Jakarta",
        provinsi: "DKI Jakarta",
    },
    sapa: function sapa(nama) {
        console.log("Halo nama saya", this.nama);
    },
};
mhs.sapa();

let login = {
    nama: "Rizky simanjuntak",
    email: "Keluarga@gmail.com",
};
