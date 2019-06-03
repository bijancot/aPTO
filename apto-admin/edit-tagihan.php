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
$yo = $mysqli->prepare("SELECT a.idtagihan,a.subject,a.deskripsi,a.nominal,a.jatuhtempo,b.iduser,b.nama from apto_tagihan a join apto_user b on a.iduser=b.iduser where a.idtagihan=?");
$yo->bind_param('s',$id);
$yo->execute();
$yo->bind_result($idtagihan,$subject,$deskripsi,$nominal,$jatuhtempo,$iduser,$nama);

while($yo->fetch()){
    $hasil = array('idtagihan'=>$idtagihan,
    'subject'=>$subject,
    'deskripsi'=>$deskripsi,
    'nominal'=>$nominal,
    'jatuhtempo'=>$jatuhtempo,
    'iduser'=>$iduser,
    'nama'=>$nama);
}
?>
<body>
<form action="proses.php" method="POST">
        <p>Nomor Tagihan : </p>
        <input type="text" value="<?php echo $hasil['idtagihan']?>" name="idtagihan" readonly><br/>
        <p>Perihal Tagihan : </p>
        <input type="text" placeholder="subject tagihan" name="subject" value="<?php echo $hasil['subject']?>" required><br/>
        <p>Deskripsi Tagihan : </p>
        <textarea name="deskripsi" placeholder="deskripsi ada di sini" cols="20" rows="4" <?php echo $hasil['deskripsi']?> required><?php echo $hasil['deskripsi']?> </textarea><br/>
        <p>User Tertagih</p>
        <select name="iduser" required>
            
            <?php
            require_once("../req/database.php");

            $lev=2;
            $iduse="dadasd";
            $tu = $mysqli->prepare("SELECT iduser,nama FROM apto_user where level=? and iduser!=?");
            $tu->bind_param('ss',$lev,$iduse);
            $tu->execute();
            $tu->bind_result($iduser,$nama);

                while($tu->fetch()){
                    if($iduser==$hasil['iduser']){
                        echo "<option value=\"$iduser\" selected>$nama</option>";
                    }
                    else{
                        echo "<option value=\"$iduser\">$nama</option>";
                    }
                }
            ?>
        </select>
        <p>Tanggal Jatuh tempo:</p>
        <input type="date" name="jatuhtempo" value="<?php echo $hasil['jatuhtempo']?>" required><br/>
        <p>Nominal Tagihan : </p>
        <input type="number" name="nominal" placeholder="nominal tagihan" pattern="[0-9]" value="<?php echo $hasil['nominal']?>" required><br/>
        <br/><br/>
        
        <input type="submit" value="Edit Data" name="submit">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="cancel">
    </form>
</body>
</html>