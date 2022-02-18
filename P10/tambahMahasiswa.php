<?php
require 'functions.php';

if (isset($_POST['tambahData'])) {

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
<form action="" method="POST">
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
      <td><input type="text" name="gambar" id="gambar" required></td>
    </tr>
    <tr>
      <td></td>
      <td><button type="submit" name="tambahData">Tambah Data</button></td>
    </tr>
  </table>
</form>