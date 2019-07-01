# Compare PDO and MySQLi with PDO style

## Connecting to database

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
```
### MySQLi with PDO style

## Insert data to database
### PDO
### MySQLi with PDO style
