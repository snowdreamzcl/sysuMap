<?php
    include "connectDatabase.php";
    $comment_id = $_GET["comment_id"];
    $lever = $_GET["lever"];
    //$lever = 0;
    if ($lever==1)
        $sql = "UPDATE comment set lever=0 WHERE comment_id='$comment_id'";
    else
        $sql = "UPDATE comment set lever=1 WHERE comment_id='$comment_id'";
    try {
        $conn->query($sql);
        $conn = null; 
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
?>
