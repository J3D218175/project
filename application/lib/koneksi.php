<?php
session_start();
$host = 'localhost'; //127.0.0.1
$user = 'root';
$pass = '';
$db = 'admin_hmki';
$link = mysqli_connect($host, $user, $pass, $db) or die(mysqli_error());
?>