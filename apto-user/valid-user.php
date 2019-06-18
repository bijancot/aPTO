<?php
if($_SESSION['data']['level']!=2){
    setcookie("message", "bukan user",time()+30,"/");
    header("Location:../apto-admin/");
}
?>