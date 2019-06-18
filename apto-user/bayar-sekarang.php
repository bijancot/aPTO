<?php
session_start();
include_once("../req/session_check.php");
include_once("valid-user.php");
include_once("../req/database.php");

$param = $_POST['submit'];

if($param=="Bayar Sekarang"){
    $type	= array('png','jpg');
    $real = $_FILES['buktibayar']['name'];
    $x = explode('.', $real);
    $ekst = strtolower(end($x));
    $size = $_FILES['buktibayar']['size'];
    $file_tmp = $_FILES['buktibayar']['tmp_name'];	

    if(in_array($ekst,$type)==true){
        if($size < 10440700){
            move_uploaded_file($file_tmp, 'bayar/'.$real);
            include_once("../req/database.php");
            $q = $mysqli->prepare("INSERT INTO apto_pembayaran(idpembayaran,idtagihan,tglbayar,bankasal,banktujuan,nominalbayar,buktibayar,status) VALUES(?,?,?,?,?,?,?,?)");
            $q->bind_param('ssssssss',$idpembayaran,$idtagihan,$tglbayar,$bankasal,$banktujuan,$nominalbayar,$buktibayar,$status);
            $idpembayaran = $_POST['idpembayaran'];
            $idtagihan = $_POST['idtagihan'];
            $tglbayar = $_POST['tglbayar'];
            $bankasal = $_POST['bankasal'];
            $banktujuan = $_POST['banktujuan'];
            $nominalbayar = $_POST['nominalbayar'];
            $buktibayar = 'bayar/'.$real;
            $status = '0';
            
            
            $q->execute();
        
            header("Location:kelola-tagihan.php");
        }else if($size > 10440700){
            echo "file terlalu besar";
            header("refresh:10; url=kelola-tagihan.php");
        }
    }

}

?>