<?php
// Koneksi database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");
// Cek koneksi
if (!$conn) {
  die("Gagal koneksi. " . mysqli_connect_error());
}

// Fungsi QUERY
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

// Fungsi INSERT
function tambah($data)
{
  global $conn;
  // Ambil data dari tiap elemen form

  $nrp     = htmlspecialchars($data["nrp"]);
  $nama    = htmlspecialchars($data["nama"]);
  $email   = htmlspecialchars($data["email"]);
  $jurusan = htmlspecialchars($data["jurusan"]);
  // $gambar  = htmlspecialchars($data["gambar"]);

  // Upload gambar
  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  // Query insert data
  $query = "INSERT INTO mahasiswa
            VALUES ('','$nrp','$nama','$email','$jurusan','$gambar')
           ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

// Fungsi UPLOAD
function upload()
{

  $namaFile   = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error      = $_FILES['gambar']['error'];
  $tmpName    = $_FILES['gambar']['tmp_name'];

  // Cek apakah tidak ada gambar yang diupload
  if ($error === 4) {
?>
    <script>
      alert('Pilih gambar terlebih dahulu');
    </script>
  <?php
    return false;
  }

  // Cek apakah yang diupload adalah gambar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));

  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
  ?>
    <script>
      alert('Maaf bukan termasuk kategori gambar!');
    </script>
  <?php
    return false;
  }

  // Cek jika ukuran nya terlalu besar
  if ($ukuranFile > 1000000) {
  ?>
    <script>
      alert('Maaf, ukuran gambar terlalu besar!');
    </script>
  <?php
    return false;
  }

  // Lolos pengecekan gambar siap diupload
  // Generate nama gambar baru
  $namaFileBaru  = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;
  move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

  return $namaFileBaru;
}

// Fungsi DELETE
function hapus($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

  return mysqli_affected_rows($conn);
}

// Fungsi UPDATE
function ubah($data)
{
  global $conn;
  // Ambil data dari tiap elemen form

  $id         = $data['id'];
  $nrp        = htmlspecialchars($data["nrp"]);
  $nama       = htmlspecialchars($data["nama"]);
  $email      = htmlspecialchars($data["email"]);
  $jurusan    = htmlspecialchars($data["jurusan"]);
  $gambarLama = htmlspecialchars($data["gambarLama"]);

  // Cek apakah user pilih gambar baru atau tidak
  if ($_FILES['gambar']['error'] === 4) {
    $gambar = $gambarLama;
  } else {
    $gambar = upload();
  }

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

// Fungsi SEARCH
function cari($keyword)
{
  $query = "SELECT * FROM mahasiswa WHERE 
              nama    LIKE '%$keyword%' OR
              nrp     LIKE '%$keyword%' OR
              email   LIKE '%$keyword%' OR
              jurusan LIKE '%$keyword%'
            ";

  return query($query);
}

// Function Registrasi
function registrasi($data)
{
  global $conn;

  $username = strtolower(stripslashes($data['username']));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);

  // Cek username sudah ada atau belum
  $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

  if (mysqli_fetch_assoc($result)) {
  ?>
    <script>
      alert('Username telah terdaftar!');
    </script>
  <?php
    return false;
  }

  // Cek konfirmasi password
  if ($password !== $password2) {
  ?>
    <script>
      alert('Konfirmasi password tidak sesuai');
    </script>
<?php
    return false;
  }

  // Enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // Tambahkan userbaru ke database
  mysqli_query($conn, "INSERT INTO user VALUES ('','$username','$password')");

  return mysqli_affected_rows($conn);
}
