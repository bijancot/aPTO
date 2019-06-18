<?php
if($_SESSION['data']['level']==2){
    setcookie("message", "bukan admin",time()+30,"/");
    header("Location:../apto-user/");
}
?>