<?php

require_once './connection.php';
$obj = new conect();

if (isset($_GET['manager'])) {
    unset($_SESSION['manager']);
    header('location:index.php');
}
if (isset($_GET['admin'])) {
    unset($_SESSION['admin']);
    header('location:index.php');
}
if (isset($_GET['artist'])) {
    unset($_SESSION['artist']);
    header('location:index.php');
}
?>