<?php
$db = "apto_db";
$user = "budosen";
$pass = "bijan2089";
$host = "172.17.0.3";


$mysqli = new mysqli($host,$user,$pass,$db);


if($mysqli->connect_errno){
	echo "gagal connect DB"."$mysqli->connect_errno";
}
#echo $mysqli->connect_errno.$mysqli->connect_error;
// $id = "xc";
// $q = $mysqli->prepare("select idtagihan from apto_tagihan where idtagihan !=?");
// $q->bind_param('s',$id);
// $q->execute();
// $q->bind_result($idtagihan);


// while($q->fetch()){
//     echo $idtagihan;
// }
?>
