<?php
	include "connectDatabase.php";
	date_default_timezone_set('Etc/GMT-8');
    //get the input
    $name = $_POST["m_username"];
    $pwd = $_POST["m_password"];

    //login

	$sql = "SELECT * FROM manager";
	foreach ($conn->query($sql) as $row) {
	    if ($row['name'] == $name) {
	    	if ($row['pwd'] == $pwd) {
				$last_time = date("Y-m-d H:i:s");
				$conn->query("UPDATE manager set last_time='$last_time' WHERE name='$name'");
                $conn = null;
	    	    SESSION_start();
        		$_SESSION['manager_name']=$name;
				$_SESSION['manager_permission']=$row['permission'];
                //header("location:management.html");   
                echo "<script>location.href='management.php'</script>"; 
	    		return;
	    	}
	    	else {
                $conn = null;
                echo "<script>alert('密码错误！');history.go(-1);</script>"; 
	    		return;
	    	}
	    }
	}
	
	echo "<script>alert('不存在该管理员！');history.go(-1);</script>";

    $conn = null;
?> 