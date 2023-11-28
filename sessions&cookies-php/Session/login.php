<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $_SESSION['username'] = $username;
    header('Location: index.php');
    exit();
}
?>