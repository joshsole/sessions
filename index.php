<?php
require 'includes/config.php';

if (loggedIn()) {
  redirect('dashboard.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // First validation
  if (empty($_POST['username']) || empty($_POST['password'])) {
    addMessage('Please enter both fields!');
    redirect('index.php');
  }

  // Next try to get the user from the database
  $username = strtolower($_POST['username']);
  $password = strtolower($_POST['password']);
  $user = getUser($dbh, $username);

  $passwordMatches = password_verify($password, $user['password']);

  // Test that the entered details match the login details
  if (!empty($user) && ($username === strtolower($user['username']) || $username === strtolower($user['email'])) && $passwordMatches) {
    // Add data to the session
    $_SESSION['username'] = $user['username'];

    addMessage('You have been logged in');
    // Redirect to the dashboard
    redirect('dashboard.php');
  }
  else {
    addMessage('Username and password do not match our records');
  }
}

$page['title'] = 'Login';
require 'partials/header.php';
require 'partials/navigation.php';
?>

<h1>Login</h1>
<form method="POST" action="index.php">
  <label for="username">Username/Email:</label>
  <input type="text" id="username" name="username" placeholder="user@example.com">
  <br>
  <label for="password">Password:</label>
  <input type="password" id="password" name="password">
  <br>
  <input type="submit" value="Login">
  <div style="background-color: #e74c3c; color: white; font-size: 1.3em; width: 500px; margin: 1em 0;"><?= showMessage() ?></div>
</form>

<?php
require 'partials/footer.php';
?>
