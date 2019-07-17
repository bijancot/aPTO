<?php
include_once("databasepdo.php");

$ds="ssa";
$yoo = $pdo->prepare("SELECT iduser from apto_user where iduser!=:id_user");
$yoo->bindParam(":id_user",$ds);
$yoo->execute();

$hasil=$yoo->fetchAll();

foreach($hasil as $ko){
    echo $ko[iduser];
}
?>