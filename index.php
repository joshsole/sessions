<?php
require 'includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // die(var_dump($_POST));
  // Ideally the below values would come from a database
  $username = 'Danny';
  $password = 'secure!';
  // Test that the entered details match the login details
  if ($username === $_POST['username'] && $password === $_POST['password']) {
    // Add data to the session
    $_SESSION['username'] = $_POST['username'];

    addMessage('You have been logged in');
    // Redirect to the dashboard
    redirect('dashboard.php');
  }
  else {
    addMessage('Username and password do not match our records');
  }
}
?>
<!DOCTYPE html>
<html lang="en-nz">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">

  <title>Login</title>
</head>
<body>
  <h1>Login</h1>
  <form method="POST" action="index.php">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" placeholder="Jason Candle">
      <br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password">
      <br>
      <input type="submit" value="Login">
      <div style="background-color: #e74c3c; color: white; font-size: 1.3em; width: 500px; margin: 1em 0;"><?= showMessage() ?></div>
  </form>
  <a href="dashboard.php">Dashboard</a>
</body>
</html>
