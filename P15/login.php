<?php
require 'functions.php';

if (isset($_POST['login'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

  // Cek username
  if (mysqli_num_rows($result) === 1) {

    // Cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
      header("Location: index.php");
      exit;
    }
  }
  $error = true;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Login</title>
</head>

<body>
  <h3>Halaman Login</h3>
  <?php if (isset($error)) : ?>
    <p style="color: red; font-weight: bold;">Username dan Password Salah!</p>
  <?php endif; ?>
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
        <td>
        <td><button type="submit" name="login">Login</button></td>
        </td>
      </tr>
    </table>
  </form>
</body>

</html>