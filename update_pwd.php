<?php
    SESSION_start();
    $m_name = $_SESSION['manager_name'];
    include "connectDatabase.php";
    
    if ($_POST['new_pwd'] != $_POST['new_pwd_repeat']) {
        $conn = null;
        echo "<script>alert('两次密码输入不一致！');history.go(-1);</script>";
        return;
    }
    $pwd_len = strlen($_POST['new_pwd']);
    for ($i = 0; $i < $pwd_len; $i++) {
		if ($_POST['new_pwd'][$i] == ' ') {
			echo "<script>alert('新密码不能含空格！');history.go(-1);</script>";
			return;
		}
	}
    $sql = "SELECT * FROM manager";
	foreach ($conn->query($sql) as $row) {
        if ($row['name'] == $m_name) {
            if ($row['pwd'] != $_POST['old_pwd']) {
                $conn = null; 
                echo "<script>alert('原密码错误');history.go(-1);</script>";
                return;
            }
            $pwd = $_POST['new_pwd'];
            $conn->query("UPDATE manager set pwd='$pwd' WHERE name='$m_name'");
            $conn = null; 
            echo "<script>alert('修改成功');history.go(-1);</script>";
            return;
        }
    }
?>