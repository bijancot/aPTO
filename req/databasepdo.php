<?php
$servername = "172.18.20.3";
$username = "budosen";
$password = "bijan2089";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=apto_db", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connection Successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
