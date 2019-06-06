<?php
session_start();
session_unset($_SESSION['data']);
session_destroy();
setcookie("message", "LOGED OUT");
header("Location:../index.php");
?>