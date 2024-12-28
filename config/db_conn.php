<?php
$serverName = "localhost";
$userName = "root";
$passWord = "";
$dataBase = "bank";

try {
    $dns = "mysql:host=".$serverName. ";dbname=".$dataBase;
    $pdo = new PDO($dns,$userName, $passWord);

    define('pdo', $pdo);

} catch(PDOException) {
    echo "Connection failed";
}

?>