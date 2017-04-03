<?php

function dd($data)
{
    die(var_dump($data));
}

function loggedIn() {
    return !empty($_SESSION['username']);
}

function addMessage($message) {
  $_SESSION['message'] = $message;
}

function redirect($url)
{
    header('Location: ' . $url);
    die();
}

// -----------------------------------------------------------------------------
//Connect to the database function.
// -----------------------------------------------------------------------------

function connectDatabase($host, $database, $user, $pass){
  try {
    $dbh = new PDO('mysql:host=' . $host . ';dbname=' . $database, $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $dbh;
  } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
  }
}

// -----------------------------------------------------------------------------
// Insert into "users" table
// -----------------------------------------------------------------------------
function addUser($dbh, $username, $email, $password){

  $sth = $dbh->prepare('INSERT INTO `users` VALUES (NULL, :username, :email, :password)');

  $sth->bindValue(':username', $username, PDO::PARAM_STR);
  $sth->bindValue(':email', $email, PDO::PARAM_STR);
  $sth->bindValue(':password', $password);

  // Execute the statement.
  $sth->execute();

  return true;
}

function showMessage() {
    $message = '';
    if (!empty($_SESSION['message'])) {
        $message = $_SESSION['message'];
        unset($_SESSION['message']);
    }
    return $message;
}


function getUser($dbh, $username) {
    $sth = $dbh->prepare('SELECT * FROM `users` WHERE username = :username OR email = :email');

    $sth->bindValue(':username', $username, PDO::PARAM_STR);
    $sth->bindValue(':email', $username, PDO::PARAM_STR);

    // Execute the statement.
    $sth->execute();

    $row = $sth->fetch();

    if (!empty($row)) {
      return $row;
    }
    return false;
}
