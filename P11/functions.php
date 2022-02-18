<?php
// Koneksi database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");
// Cek koneksi
if (!$conn) {
  die("Gagal koneksi. " . mysqli_connect_error());
}

function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows   = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[]   = $row;
  }
  return $rows;
}

function tambah($data)
{
  global $conn;
  // Ambil data dari tiap elemen form

  $nrp     = htmlspecialchars($data["nrp"]);
  $nama    = htmlspecialchars($data["nama"]);
  $email   = htmlspecialchars($data["email"]);
  $jurusan = htmlspecialchars($data["jurusan"]);
  $gambar  = htmlspecialchars($data["gambar"]);

  // Query insert data
  $query = "INSERT INTO mahasiswa
            VALUES ('','$nrp','$nama','$email','$jurusan','$gambar')
           ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  global $conn;
  // Ambil data dari tiap elemen form

  $id      = $data['id'];
  $nrp     = htmlspecialchars($data["nrp"]);
  $nama    = htmlspecialchars($data["nama"]);
  $email   = htmlspecialchars($data["email"]);
  $jurusan = htmlspecialchars($data["jurusan"]);
  $gambar  = htmlspecialchars($data["gambar"]);

  // Query update data
  $query = "UPDATE mahasiswa SET
              nrp     = '$nrp',
              nama    = '$nama',
              email   = '$email',
              jurusan = '$jurusan',
              gambar  = '$gambar'
            WHERE id  = $id
           ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

