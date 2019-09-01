<?php

//get the input
$name = $_POST["username"];
$pwd = $_POST["password"];

//get the submit type: register or login
$q = $_POST["submit"];
$name = rtrim(ltrim($name));
$name_len = strlen($name);
$pwd_len = strlen($pwd);
if ($name_len==0 || $pwd_len==0) {
	echo "<script>alert('用户名或密码为空！');history.go(-1);</script>";
	return;
}

//register
if ($q == "register") {
	for ($i = 0; $i < $name_len; $i++) {
		if ($name[$i] == ' ') {
			echo "<script>alert('用户名不能含空格！');history.go(-1);</script>";
			return;
		}
	}
	for ($i = 0; $i < $pwd_len; $i++) {
		if ($pwd[$i] == ' ') {
			echo "<script>alert('密码不能含空格！');history.go(-1);</script>";
			return;
		}
	}

	include "connectDatabase.php";
	$sql = "INSERT INTO users (name, pwd) VALUES ('$name', '$pwd')";
	if ($conn->query($sql)) {
		$conn = null;
		echo "<script>alert('注册成功，请登录！');history.go(-1);</script>";
		return;
	}
	else
	{
		$conn = null;
	    echo "<script>alert('该用户名已经注册，请直接登录！');history.go(-1);</script>";
	    return;
	}
}
//login
else {
	include "connectDatabase.php";
	$sql = "SELECT * FROM users";
	foreach ($conn->query($sql) as $row) {
	    if ($row['name'] == $name) {
	    	if ($row['pwd'] == $pwd) {
				$conn = null;
	    	    SESSION_start();
				$_SESSION['user']=$name;
				$_SESSION['user_permission'] = $row['permission'];
	    		header("location:eastCampus.html");   
	    		return;
	    	}
	    	else {
				$conn = null;
	    		echo "<script>alert('密码错误！');history.go(-1);</script>";
	    		return;
	    	}
	    }
	}
	
	echo "<script>alert('该用户名未注册！');history.go(-1);</script>";
}
$conn = null;
?> 