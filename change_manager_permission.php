<?php
    include "connectDatabase.php";
    $name = $_GET["name"];
    $permission = $_GET["permission"];
    if ($permission==1)
        $sql = "UPDATE manager set permission=2 WHERE name='$name'";
    else
        $sql = "UPDATE manager set permission=1 WHERE name='$name'";
    try {
        $conn->query($sql);
        $conn = null; 
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
?>
