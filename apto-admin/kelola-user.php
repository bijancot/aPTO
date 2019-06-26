<?php

session_start();
include_once("../req/session_check.php");
include_once("valid-admin.php");
include_once("../req/database.php");

$id ="2";
$qu = $mysqli->prepare("SELECT iduser,nama,email,alamat,notelp,jk FROM apto_user where level=?");
$qu->bind_param('s',$id);
$qu->execute();
$qu->bind_result($iduser,$nama,$email,$alamat,$notelp,$jk);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../req/bulma/css/bulma.min.css">
    <title>Document</title>
</head>
<body> 
    <div class="hero">
        <div class="container">
            <div class="hero-body">
            <div class="level">
                <div class="level-left">
                    <div class="level-items">
                    <a href="buat-user.php" class="button is-normal is-info">Buat User Baru</a><br/><br/>
                    </div>
                </div>
                <div class="level-right">
                <div class="level-items">
                    <a href="logout-admin.php" class="button is-normal is-danger">Log Out</a><br/><br/>
                    </div>
                </div>
            </div>
    <table border=1 class="table is-bordered is-striped is-hoverable">
            <thead>
                <tr>
                    <td>ID User</td>
                    <td>Nama</td>
                    <td>Email</td>
                    <td>Alamat</td>
                    <td>No. Telp</td>
                    <td>Opsi</td>
                </tr>
            </thead>
            <tbody>
            <?php
                while($qu->fetch()){
                    echo "<tr>
                    <td>$iduser</td>
                    <td>$nama</td>
                    <td>$email</td>
                    <td>$alamat</td>
                    <td>$notelp</td>
                    <td><a href=\"bubut.php?iduser=$iduser\">Buat Tagihan</a> | <a href=\"edit-user.php?iduser=$iduser\">Edit User</a> | <a href=\"proses.php?iduser=$iduser&submit=hapus user\">Hapus User</a></td>
                </tr>";
                }
            ?>
            </tbody>
    </table>      
    <a href="index.php" class="button is-normal is-info">Kembali ke halaman awal admin</a>
            </div>
        </div>
    </div>
</body>
</html>