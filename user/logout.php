<?php 
session_start();
session_destroy();
session_start();
$_SESSION['logout_success'] = 1;
header('location:../index.php');
?>