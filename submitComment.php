<?php
SESSION_start();
if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    //connect the database
    include "connectDatabase.php";
    
    if ($_SESSION['user_permission'] == 0) {
        echo "您已被禁言！";
        return;
    }
    //get the input
    $name = $_SESSION['user'];
    $submit_time = date("Y-m-d H:i:s");
    $content = $_GET['content'];
    $type= $_GET['type'];
    $sql = "INSERT INTO comment (name, content, submit_time, type) 
            VALUES ('$name', '$content', '$submit_time', '$type')";
    if ($conn->query($sql)) {
        echo "评论成功";
    }
    else
    {
        echo "评论失败";
    }
    
    $conn = null;
}
else{
    echo "请先登录";
}

?>
