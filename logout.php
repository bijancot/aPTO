<?php
session_start();

session_unset($_SESSION['data']);
session_destroy();
header("Location:index.php");
?>