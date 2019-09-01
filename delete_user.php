<?php
    include "connectDatabase.php";
    $name = $_GET["name"];
    $sql = "DELETE FROM users WHERE name='$name'";
    try {
        $conn->query($sql);
        $conn = null; 
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
?>
