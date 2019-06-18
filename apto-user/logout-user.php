<?php
session_start();
include_once("../req/session_check.php");
include_once("valid-user.php");
session_unset($_SESSION['data']);
session_destroy();
setcookie("message", "LOGED OUT",time()+30,"/");
header("Location:../index.php");
?>