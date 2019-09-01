<?php
    include "connectDatabase.php";
    $comment_id = $_GET["comment_id"];
    $sql = "DELETE FROM comment WHERE comment_id='$comment_id'";
    try {
        $conn->query($sql);
        $conn = null; 
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
?>
