<?php
session_start();

if(!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require "functions.php";
$mahasiswa = query("SELECT * FROM mahasiswa");

// Tombol cariMahasiswa ditekan
if (isset($_POST['cariMahasiswa'])) {
  $mahasiswa = cari($_POST['keyword']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Mahasiswa</title>
  <style>
    a {
      text-decoration: none;
    }
  </style>
</head>

<body>
  <a href="logout.php">Logout</a>
  <h1>Data Mahasiswa</h1>
  <form action="" method="POST">
    <input type="search" name="keyword" id="keyword" autofocus autocomplete="off" placeholder="Cari...">
    <button type="submit" name="cariMahasiswa">Cari</button>
  </form>
  <br>
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
        <td><img src="img/<?= $row["gambar"]; ?>" width="50" alt="<?= $row['gambar']; ?>"></td>
        <td>
          <a href="ubahMahasiswa.php?id=<?= $row['id']; ?>">UBAH</a>
        </td>
        <td>
          <a href="hapusMahasiswa.php?id=<?= $row['id']; ?>" onclick="return confirm('Are you sure?');">HAPUS</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>