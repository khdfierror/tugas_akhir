<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'db_stok_barang';

$link = mysqli_connect($host, $user, $pass, $db) or die (mysqli_error($link));
?>