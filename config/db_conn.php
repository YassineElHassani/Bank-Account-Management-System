<?php
$serverName = "localhost";
$userName = "root";
$passWord = "";
$dataBase = "bank";


try {
    $dns = "mysql:host=".$serverName. ";dbname=".$dataBase;
    $pdo = new PDO($dns,$userName, $passWord);
    // session_start();
    // defined("pdo","$pdo");
} catch(PDOException) {
    echo "Connection failed";
}

?>