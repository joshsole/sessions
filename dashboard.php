<?php
require 'includes/config.php';

if (!loggedIn()) {
  // If the user is not logged in, redirect back to the login page
  addMessage('You need to login to see this page.');
  redirect('index.php');
}

$page['title'] = 'Dashboard';
require 'partials/header.php';
require 'partials/navigation.php';
?>

<div style="background-color: #2ecc71; color: white; font-size: 1.3em; width: 500px; margin: 1em 0;"><?= showMessage() ?></div>
<h2>Welcome! You are logged in as: <?= $_SESSION['username'] ?></h2>

<?php
require 'partials/footer.php';
?>
