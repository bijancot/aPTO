# Compare PDO and MySQLi with PDO style

## Connecting to database1a

### PDO
```
	<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=projectweb", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connection Successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
```

### MySQLi with PDO style
```
<?php
$db = "apto_db";
$user = "budosen";
$pass = "bijan2089";
$host = "172.17.0.3";


$mysqli = new mysqli($host,$user,$pass,$db);


if($mysqli->connect_errno){
	echo "gagal connect DB"."$mysqli->connect_errno";
}
?>
```
## Selecting data from database

### PDO
```
<?php
include_once('connect.php');
if (isset($_POST["id_jadwal"])) {
	$stmtm = $conn->prepare("SELECT mahasiswa.NRP, mahasiswa.NAME, mahasiswa.STUDY_PROGRAM, mahasiswa.GENDER, mahasiswa.PHONE_NUMBER, jadwal.PERIODE, detail_jadwal.ID_DETAIL FROM mahasiswa, detail_jadwal, jadwal where mahasiswa.NRP = detail_jadwal.NRP and detail_jadwal.ID_JADWAL = :id_jadwal and detail_jadwal.ID_JADWAL = jadwal.ID_JADWAL ORDER BY jadwal.ID_JADWAL");
	$stmtm->bindParam(":id_jadwal",$_POST['id_jadwal']);
}
...
$stmtm->execute();
	$hasilm = $stmtm->fetchAll();
?> 
```

### MySQLi with PDO style
```
<?php
include_once('database.php');
$id = $_GET['idtagihan'];

$yu = $mysqli->prepare("SELECT a.idtagihan,a.subject,a.deskripsi,a.nominal,a.jatuhtempo,b.iduser,b.nama from apto_tagihan a join apto_user b on a.iduser=b.iduser where a.idtagihan=?");
$yu->bind_param('s',$id);
$yu->execute();
$yu->bind_result($idtagihan,$subject,$deskripsi,$nominal,$jatuhtempo,$iduser,$nama);
?>
```

## editing data from database

### PDO
```
<?php
	require_once('connect.php');
  $stmt = $conn->prepare("UPDATE `mahasiswa` SET `NAME`=:name,`STUDY_PROGRAM`=:sprogram,`GENDER`=:gender,`PHONE_NUMBER`=:pnumber WHERE `NRP`=:nrp");
    $stmt->bindParam(":nrp",$_POST['nrp']);
    $stmt->bindParam(":name",$_POST['name']);
    $stmt->bindParam(":sprogram",$_POST['sprogram']);
    $stmt->bindParam(":gender",$_POST['gender']);
    $stmt->bindParam(":pnumber",$_POST['pnumber']);
    $stmt->execute();
?>
```
### MySQLi with PDO style
```
    require_once("../req/database.php");

    $mo = $mysqli->prepare("UPDATE apto_tagihan set iduser=?, subject=?, deskripsi=?, jatuhtempo=?, nominal=? where idtagihan=?");
    $mo->bind_param('ssssss',$iduser,$subject,$deskripsi,$jatuhtempo,$nominal,$idtagihan);
    
    $iduser = $_POST['iduser'];
    $subject = $_POST['subject'];
    $deskripsi = $_POST['deskripsi'];
    $jatuhtempo = $_POST['jatuhtempo'];
    $nominal = $_POST['nominal'];
    $idtagihan = $_POST['idtagihan'];
    $mo->execute();
```
## Deleting data from database
### PDO
```
<?php

include 'connect.php';

try {

    $stmtm = $conn->prepare("DELETE FROM `detail_jadwal` WHERE ID_DETAIL=:id_detail");
    $stmtm->bindParam(":id_detail",$_GET['ID_DETAIL']);
    $stmtm->execute();
  
    // $stmt = $conn->prepare("DELETE FROM `mahasiswa` WHERE NRP=:nrp");
    // $stmt->bindParam(":nrp",$_GET['NRP']);
    // $stmt->execute();

    echo "Deleted Successfully<br><br>"; 	
}

catch(PDOException $e) {
	echo "Update failed: " . $e->getMessage();
}

?>
```
### MySQLi with PDO style
```
<?php
    require_once("../req/database.php");
    echo "hapus";

    $my = $mysqli->prepare("DELETE FROM apto_user where iduser=?");
    $iduser = $_GET['iduser'];
    $my->bind_param('s',$iduser);
    $my->execute();
?>
```

## Insert data to database
### PDO
```
<?php  
include 'connect.php';

try {

	$stmtm = $conn->prepare("INSERT INTO `mahasiswa`(`NRP`, `NAME`, `STUDY_PROGRAM`, `GENDER`, `PHONE_NUMBER`) VALUES (:nrp,:name,:sprogram,:gender,:pnumber)");
	$stmtm->bindParam(":nrp",$_POST['nrp']);
	$stmtm->bindParam(":name",$_POST['name']);
	$stmtm->bindParam(":sprogram",$_POST['sprogram']);
	$stmtm->bindParam(":gender",$_POST['gender']);
	$stmtm->bindParam(":pnumber",$_POST['pnumber']);
	$stmtm->execute();

	$stmtj = $conn->prepare("INSERT INTO `detail_jadwal`(`NRP`, `ID_JADWAL`) VALUES (:nrp,:id_jadwal)");
	$stmtj->bindParam(":nrp",$_POST['nrp']);
	$stmtj->bindParam(":id_jadwal",$_POST['id_jadwal']);
	$stmtj->execute();

    echo "Data inserted <br><br>";  	
}
catch(PDOException $e) {
	
	$stmtj = $conn->prepare("INSERT INTO `detail_jadwal`(`NRP`, `ID_JADWAL`) VALUES (:nrp,:id_jadwal)");
	$stmtj->bindParam(":nrp",$_POST['nrp']);
	$stmtj->bindParam(":id_jadwal",$_POST['id_jadwal']);
	$stmtj->execute();

	echo "Data inserted <br><br>";
}

?>
```
### MySQLi with PDO style
```
<?php
 require_once("../req/database.php");

    $tky = $mysqli->prepare("INSERT INTO apto_user(iduser,nama,email,alamat,notelp,jk,username,password,level,status) VALUES (?,?,?,?,?,?,?,?,?,?)");
    $tky->bind_param('ssssssssss',$iduser,$nama,$email,$alamat,$notelp,$jk,$username,$password,$level,$status);
    $iduser = $_POST['iduser'];
    $nama = $_POST['namauser'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $notelp = $_POST['notelp'];
    $jk = $_POST['jk'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $status = $_POST['status'];
    $tky->execute();
?>
```
