// ajak untuk jalan ketika sudah siap untuk update
// ketika sudah siap jalan fungsi didalamnya
$(function () {
  // Tombol tambah
  // jquery tolong cari kan saya sebuah element yang nama class nya tampilModalUbah, lalu ketika di klik jalan fungsi berikut ini
  $(".tombolTambahData").on("click", function () {
    $("#formModalLabel").html("Tambah Data Mahasiswa");
    $(".modal-footer button[type=submit]").html("Tambah Data");
    $("#nama").val("");
    $("#nim").val("");
    $("#email").val("");
    $("#jurusan").val("");
  });
  // Tombol ubah
  $(".tampilModalUbah").on("click", function () {
    // jquery tolong carikan saya yang id nya #formModalLebel
    // ubah isinya
    $("#formModalLabel").html("Ubah Data Mahasiswa");
    // tombol button yang tipe submit
    $(".modal-footer button[type=submit]").html("Ubah Data");
    // element yg ada di modal body lalu cari form di dalamanya ubah arttributnya
    $(".modal-body form").attr("action", "http://localhost/ujikom/phpmvc/public/mahasiswa/ubah");

    // ngambil data sesuai id dan tampilkan di form ubah
    // tombol yang kita klik lalu ambil datanya .
    const id = $(this).data("id");
    // jalankan ajak nya
    $.ajax({
      // ambil data ke url mana, buat method baru getubah berfungsi untuk mengembalikan data mahasiswa sesusai id yang dikirim
      url: "http://localhost/ujikom/phpmvc/public/mahasiswa/getubah",
      // kirim data apa
      data: { id: id },
      // dikirim menggunkan method apa ada get ada post
      method: "post",
      // type datanya mau apa ada text biasa atau json
      dataType: "json",
      //   ketika sukses apa yang ingin dilakukan jlankan sebuah fungsi
      success: function (data) {
        // ambil tiap-tiap datanya
        // jquery cari kan saya id lalu ubah valuenya dengan data json
        $("#nama").val(data.nama);
        $("#nim").val(data.nim);
        $("#email").val(data.email);
        $("#jurusan").val(data.jurusan);
        $("#id").val(data.id);
      },
    });
  });
});
