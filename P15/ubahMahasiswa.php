<?php
require 'functions.php';

// Ambil data di URL
$id = $_GET['id'];

// Query data berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

if (isset($_POST['ubahData'])) {

  if (ubah($_POST) > 0) {
?>
    <script>
      alert("Data berhasil diubah!");
      document.location = 'index.php';
    </script>
  <?php
  } else {
  ?>
    <script>
      alert("Data gagal diubah!");
      document.location = 'ubahMahasiswa.php';
    </script>
<?php
  }
}
?>

<h3>Ubah Data Mahasiswa</h3>
<form action="" method="POST" enctype="multipart/form-data">
  <td>
    <input type="hidden" name="id" id="id" value="<?= $mhs['id']; ?>">
  </td>
  <td>
    <input type="hidden" name="gambarLama" id="gambarLama" value="<?= $mhs['gambar']; ?>">
  </td>
  <table>
    <tr>
      <td>NRP</td>
      <td>
        <input type="text" name="nrp" id="nrp" required value="<?= $mhs['nrp']; ?>">
      </td>
    </tr>
    <tr>
      <td>Nama</td>
      <td>
        <input type="text" name="nama" id="nama" required value="<?= $mhs['nama']; ?>">
      </td>
    </tr>
    <tr>
      <td>Email</td>
      <td>
        <input type="text" name="email" id="email" required value="<?= $mhs['email']; ?>">
      </td>
    </tr>
    <tr>
      <td>Jurusan</td>
      <td>
        <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs['jurusan']; ?>">
      </td>
    </tr>
    <tr>
      <td>Gambar</td>
      <img src="img/<?= $mhs['gambar']; ?>" alt="">
      <td>
        <input type="file" name="gambar" id="gambar">
      </td>
    </tr>
    <tr>
      <td></td>
      <td>
        <button type="submit" name="ubahData">
          Ubah Data
        </button>
      </td>
    </tr>
  </table>
</form>