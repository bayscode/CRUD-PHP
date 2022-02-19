<?php
session_start();

if(!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

// Cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST['tambahData'])) {

  // Cek apakah data berhasil di tambahkan atau tidak
  if (tambah($_POST) > 0) {
  ?>
    <script>
      alert("Data berhasil ditambahkan!");
      document.location = 'index.php';
    </script>
  <?php
  } else {
  ?>
    <script>
      alert("Data gagal ditambahkan!");
      document.location = 'tambahMahasiswa.php';
    </script>
  <?php
  }
}
?>

<h3>Tambah Data Mahasiswa</h3>
<form action="" method="POST" enctype="multipart/form-data">
  <table>
    <tr>
      <td>NRP</td>
      <td><input type="text" name="nrp" id="nrp" required></td>
    </tr>
    <tr>
      <td>Nama</td>
      <td><input type="text" name="nama" id="nama" required></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" name="email" id="email" required></td>
    </tr>
    <tr>
      <td>Jurusan</td>
      <td><input type="text" name="jurusan" id="jurusan" required></td>
    </tr>
    <tr>
      <td>Gambar</td>
      <td><input type="file" name="gambar" id="gambar"></td>
    </tr>
    <tr>
      <td></td>
      <td><button type="submit" name="tambahData">Tambah Data</button></td>
    </tr>
  </table>
</form>