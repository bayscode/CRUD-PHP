<?php
require "functions.php";
$mahasiswa = query("SELECT * FROM mahasiswa");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Mahasiswa</title>
</head>

<body>
  <h1>Data Mahasiswa</h1>
  <a href="tambahMahasiswa.php">+Tambah Mahasiswa</a>
  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>#</th>
      <th>NRP</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Jurusan</th>
      <th>Gambar</th>
      <th colspan="2">Aksi</th>
    </tr>
    <?php
    $nomor = 1;
    foreach ($mahasiswa as $row) :
    ?>
      <tr align="center">
        <td><?= $nomor++; ?></td>
        <td><?= $row["nrp"]; ?></td>
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["email"]; ?></td>
        <td><?= $row["jurusan"]; ?></td>
        <td><img src="img/<?= $row["gambar"]; ?>" width="50" alt=""></td>
        <td>
          <a href="">UBAH</a>
        </td>
        <td>
          <a href="">HAPUS</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>