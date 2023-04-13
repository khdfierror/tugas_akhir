<?php

require_once "core/init.php";
$super_user = $login = false;
if (isset($_SESSION['user'])) {
    $login = true;
    if (cek_admin($_SESSION['user']) == 1) {
        $super_user = true;
        // echo 'admin';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Aplikasi Stok Barang</title>
</head>
<style>
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
    }

    li {
        float: left;
        border-right: 1px solid #bbb;
    }

    li:last-child {
        border-right: none;
    }

    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    li a:hover:not(.active) {
        background-color: #111;
    }

    .active {
        background-color: #04AA6D;
    }
</style>

<body>

    <!-- <div>
        <nav>
            <ul>
                <h2>Aplikasi Stok Barang</h2>
            </ul>
            <ul>
                <li>
                    <a href="index.php">Barang</a>
                </li>
                <li>
                    <a href="kategori.php">Kategori</a>
                </li>
                <li>
                    <a href="brgmasuk.php">Barang Masuk</a>
                </li>
                <li>
                    <a href="brgkeluar.php">Barang Keluar</a>
                </li>
                <?php if ($super_user == true) { ?>
                    <li>
                        <a href="tambahuser.php">Tambah User</a>
                    </li>
                <?php } ?>
                <li>
                    <a href="logout.php">Logout</a>
                </li>
            </ul>
        </nav>
    </div> -->
    <ul>
        
        <li>
            <a class="active" href="index.php">Barang</a>
        </li>

        <li>
            <a href="kategori.php">Kategori</a>
        </li>

        <li>
            <a href="brgmasuk.php">Barang Masuk</a>
        </li>

        <li>
            <a href="brgkeluar.php">Barang Keluar</a>
        </li>
        <?php if ($super_user == true) { ?>
            <li>
                <a href="tambahuser.php">Tambah User</a>
            </li>
        <?php } ?>
        <li>
            <a href="logout.php">Logout</a>
        </li>
    </ul>