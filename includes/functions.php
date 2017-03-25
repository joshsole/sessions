<?php

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










function showMessage() {
    $message = '';
    if (!empty($_SESSION['message'])) {
        $message = $_SESSION['message'];
        unset($_SESSION['message']);
    }
    return $message;
}
