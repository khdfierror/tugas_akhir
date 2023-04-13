<?php

require_once "core/init.php";

$error = '';

// redirect kalau user sudah register
// if(isset($_SESSION['user'])) header('Location: index.php');

//validasi register
if (isset($_POST['submit'])) {
    $nama = $_POST['username'];
    $pass = $_POST['password'];
    $nm_lengkap = $_POST['nm_lengkap'];

    if (!empty(trim($nama)) && !empty(trim($pass)) && !empty(trim($nm_lengkap))) {
        if (cek_nama($nama) == 0) {
            //masukkan ke database
            if (register_user($nama, $pass, $nm_lengkap));
            else $error =  'gagal';
        } else $error =  'nama sudah ada, tidak bisa daftar';
    } else $error =  'Tidak Boleh Kosong';
}

require_once "view/header.php";

?>

<!DOCTYPE html>
<html>

<head>
    <style>
        * {
            box-sizing: border-box;
        }

        input[type=text],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        input[type=submit] {
            background-color: #04AA6D;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .col-25 {
            float: left;
            width: 25%;
            margin-top: 6px;
        }

        .col-75 {
            float: left;
            width: 75%;
            margin-top: 6px;
        }

        /* Clear floats after the columns */
        .row::after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {

            .col-25,
            .col-75,
            input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
        }
    </style>
</head>

<body>

    <h2>Register Form</h2>
    <div class="container">
        <form action="tambahuser.php" method="post">
            <div class="row">
                <div class="col-25">
                    <label for="fname">Nama Lengkap</label>
                </div>
                <div class="col-75">
                    <input class="input" type="text" name="nm_lengkap" placeholder="Nama Lengkap" id="">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="lname">Username</label>
                </div>
                <div class="col-75">
                    <input class="input" type="text" name="username" placeholder="Username" id="">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="lname">Password</label>
                </div>
                <div class="col-75">
                    <input class="input" type="text" name="password" placeholder="Password" id="">
                </div>
            </div>
            <br>
            <div class="row">
                <input type="submit" value="Register">
            </div>

            <?php if ($error != '') {  ?>
                <div id="error">
                    <?= $error; ?>
                </div>
            <?php } ?>

        </form>
    </div>

</body>

</html>