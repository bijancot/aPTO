<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<?php
include_once("../req/database.php");

$id =$_GET['idtagihan'];


?>
<body>
<form action="proses.php" method="POST">
        <input type="text" value="" name="idtagihan" readonly><br/><br/>
        <input type="text" placeholder="subject tagihan" name="subject" required><br/><br/>
        <textarea name="deskripsi" placeholder="deskripsi ada di sini" cols="20" rows="4" required></textarea><br/><br/>
        <p>User Tertagih</p><br/>
        <select name="iduser" required>
        <p>Tanggal Jatuh tempo:</p><br/>
        <input type="date" name="jatuhtempo" required><br/><br/>
        <input type="number" name="nominal" placeholder="nominal tagihan" pattern="[0-9]" required><br/><br/>
        <br/><br/>
        <input type="submit" value="Masukkan Data" name="submit">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="cancel">
    </form>
</body>
</html>