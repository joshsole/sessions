<?php
// Start the session on every page
session_start();
// Include smaller common functions
require 'includes/functions.php';

// More config code would be below....

$host = 'localhost';
$user = 'root';
$pass = 'root';
$database = 'sessions2';

$dbh = connectDatabase($host, $database, $user, $pass);
