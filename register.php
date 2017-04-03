<?php
require 'includes/config.php';

// $hash = password_hash('changeme', PASSWORD_BCRYPT);
// $matches = password_verify('changeme', $hash);
// dd($matches);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // die(var_dump($_POST));
  if (!empty($_POST['username']) && !empty($_POST['password'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    // Add data to the session
    $success = addUser($dbh, $username, $email, $password);

    if ($success) {
      addMessage('You have been registered');

      // Redirect to the index
      redirect('index.php');
    }
    else {
      addMessage('Could not register your account!');

      // Refresh the page
      redirect('register.php');
    }

  }
  else {
    addMessage('Please enter both fields');
  }
}

$page['title'] = 'Register';
require 'partials/header.php';
require 'partials/navigation.php';
?>

<h1>Register</h1>
<form method="POST" action="register.php">
  <label for="username">Username:</label>
  <input type="text" id="username" name="username" placeholder="Jason Candle">
  <br>
  <label for="email">Email:</label>
  <input type="text" id="email" name="email" placeholder="jason@example.com">
  <br>
  <label for="password">Password:</label>
  <input type="password" id="password" name="password">
  <br>
  <input type="submit" value="Register">
  <div style="background-color: #e74c3c; color: white; font-size: 1.3em; width: 500px; margin: 1em 0;"><?= showMessage() ?></div>
</form>

<?php
require 'partials/footer.php';
?>
