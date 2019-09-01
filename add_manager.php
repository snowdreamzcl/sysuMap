<?php
    include "connectDatabase.php";
    date_default_timezone_set('Etc/GMT-8');
    
    $name = $_POST['name'];
    $pwd = $_POST['pwd'];
    $pwd_repeat = $_POST['pwd_repeat'];
    $permission = $_POST['permission'];

    //输入为空
    $name = rtrim(ltrim($name));
    $name_len = strlen($name);
    $pwd_len = strlen($pwd);
    if ($name_len==0 || $pwd_len==0) {
	    echo "<script>alert('用户名或密码为空！');history.go(-1);</script>";
	    return;
    }

    //两次密码不相等
    if ($pwd != $pwd_repeat) {
        $conn = null;
        echo "<script>alert('两次密码输入不一致！');history.go(-1);</script>";
        return;
    }

    //用户名不能含空格
    for ($i = 0; $i < $name_len; $i++) {
		if ($name[$i] == ' ') {
			echo "<script>alert('用户名不能含空格！');history.go(-1);</script>";
			return;
		}
    }
    //密码不能含空格
	for ($i = 0; $i < $pwd_len; $i++) {
		if ($pwd[$i] == ' ') {
			echo "<script>alert('密码不能含空格！');history.go(-1);</script>";
			return;
		}
	}

	include "connectDatabase.php";
	$sql = "INSERT INTO manager (name, pwd, permission) VALUES ('$name', '$pwd', '$permission')";
	if ($conn->query($sql)) {
		$conn = null;
		echo "<script>alert('添加成功！');history.go(-1);</script>";
		return;
	}
	else
	{
		$conn = null;
	    echo "<script>alert('该名字已被注册，请重新选择名字！');history.go(-1);</script>";
	    return;
	}
    

?>