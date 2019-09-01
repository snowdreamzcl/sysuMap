<?php
include "connectDatabase.php";

$type = $_GET["type"];
$sql1 = "SELECT * FROM comment WHERE type='$type' AND lever=1 ORDER BY submit_time DESC";
$sql2 = "SELECT * FROM comment WHERE type='$type' AND lever=0 ORDER BY submit_time DESC";
foreach ($conn->query($sql1) as $row) {
    $name = $row['name'];
    $content = $row['content'];
    $submit_time = $row['submit_time'];
    echo "<hr/>";
    echo "<div>
            <span>$name</span>
            <span>精选 $submit_time</span>
            <p> $content</p>
            </div>";
}
foreach ($conn->query($sql2) as $row) {
    $name = $row['name'];
    $content = $row['content'];
    $submit_time = $row['submit_time'];
    echo "<hr/>";
    echo "<div>
            <span>$name</span>
            <span>$submit_time</span>
            <p>$content</p>
            </div>";
}
$conn = null;
?> 