<?php
header("charset=utf-8"); 
$servername = "localhost";
$username = "root";
$password = "zcl";
$dbname = "sysumap";
$port = "3308";
try {
    $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
    $conn->exec("SET CHARACTER SET utf8");
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>