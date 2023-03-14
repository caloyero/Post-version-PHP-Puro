<?php
session_start();
$_SESSION['id_usuario'] = 1;
header("location:../Views/home.php")
?>