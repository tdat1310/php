<?php
session_start();
$_SESSION['user'] = '';
$_SESSION['login_name'] = '';
$_SESSION['password'] = '';
$_SESSION['id'] = '';
header('Location: login.php');
?>