<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include_once("../req/session_check.php");
include_once("valid-admin.php");
$nama = $_SESSION['data']['nama'];

echo $_COOKIE['message'];
unset($_COOKIE['message']);
setcookie('message', null, -1, '/');

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../req/bulma/css/bulma.min.css">
    <title>Document</title>
</head>
<body>
    <div class="hero">
        <div class="hero-body">
            <div class="container">
            <div class="columns">
                <div class="column is-one-fifth"></div> 
                <div class="column box is-three-fifths" style="padding:100px;">
                    <div class="columns">
                        <div class="column is-half">
                            <h1 class="title is-2">ADMIN AREA</h1>
                            <h3 class="subtitle is-5">Hello admin <?php echo $nama?></h3>
                        </div>
                        <div class="column is-half box">
                            <h3 class="subtitle is-5">Menu yang tersedia : </h3>
                            <a class="button is-info is-medium" href="kelola.php">Kelola Tagihan</a><br/><br/>
                            <a class="button is-warning is-medium" href="kelola-user.php">Manaje User</a><br/><br/>
                            <a class="button is-danger is-medium" href="logout-admin.php">Logout</a><br/>
                        </div>
                    </div>
                </div> 
                <div class="column is-one-fifth"></div> 
            </div>
            </div>
        </div>
    </div>
</body>
</html>