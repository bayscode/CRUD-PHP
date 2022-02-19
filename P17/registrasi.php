<?php
require 'functions.php';

if (isset($_POST['register'])) {

  if (registrasi($_POST) > 0) {
  ?>
    <script>
      alert('User berhasil ditambahkan!');
    </script>
  <?php
  } else {
    echo mysqli_error($conn);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrasi</title>
</head>

<body>
  <h3>Halaman Registrasi</h3>
  <form action="" method="POST">
    <table>
      <tr>
        <td><label for="username">Username</label></td>
        <td><input type="text" name="username" id="username"></td>
      </tr>
      <tr>
        <td><label for="password">Password</label></td>
        <td><input type="password" name="password" id="password"></td>
      </tr>
      <tr>
        <td><label for="password2">Konfirmasi Password</label></td>
        <td><input type="password" name="password2" id="password2"></td>
      </tr>
      <tr>
        <td></td>
        <td><button type="submit" name="register">Register</button></td>
      </tr>
    </table>
  </form>
</body>

</html>