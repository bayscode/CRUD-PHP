<?php
require 'functions.php';

$id = $_GET['id'];

if (hapus($id) > 0) {
?>
  <script>
    alert("Data berhasil dihapus!");
    document.location = 'index.php';
  </script>
<?php
} else {
?>
  <script>
    alert("Data gagal dihapus!");
    document.location = 'index.php';
  </script>
<?php
}
?>