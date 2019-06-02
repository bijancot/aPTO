<?php
$db = "apto_db";
$user = "budosen";
$pass = "bijan2089";
$host = "172.17.0.4";


$mysqli = new mysqli($host,$user,$pass,$db);

$id = "xc";
$q = $mysqli->prepare("select idtagihan from apto_tagihan where idtagihan !=?");
$q->bind_param('s',$id);
$q->execute();
$q->bind_result($idtagihan);


while($q->fetch()){
    echo $idtagihan;
}
?>