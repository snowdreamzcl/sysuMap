<!DOCTYPE html>
<html lang="en" id="administrativeBuilding">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>managerInformation</title>
    <link rel="stylesheet" href="css/introduction.css" type="text/css" />
</head>

<body>
    <div class="wrapper">
        <div id="header" name="header">
            <img src="img/logo.jpg" alt="logo" />
        </div>

        <div id="main" name="main">
            <div name="navigation" id="navigation">
                <div name="topDecoration" id="topDecoration"></div>
                <div name="navContent" id="navContent">
                    <h2>导航</h2>
                    <hr/>
                    <ul>
                        <li>
                            <a href="management.php">个人信息</a>
                        </li>
                        <li>
                            <a href="comment_manage.php">评论管理</a>
                        </li>
                        <li>
                            <a href="user_manage.php">用户管理</a>
                        </li>
                        <li>
                            <a href="manager_manage.php">管理员管理</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="content" name="content">
                <h2>个人信息</h2>

                <div name="information" id="information">
                    <div>
                        <h3>个人资料</h3>
                        <hr />
                        <div class="detail">
                            <p>
                            用户名：<?php SESSION_start(); echo $_SESSION['manager_name'];?><br/>
                            权限：
                            <?php 
                                $permission = $_SESSION['manager_permission'];
                                if ($permission == 3)
                                    $descrption = "（评论管理，用户管理，绝对存在）";
                                else if ($permission == 2)
                                    $descrption = "（评论管理，用户管理）";
                                else 
                                    $descrption = "（评论管理）";
                                echo $permission . $descrption;
                            ?>
                            <br/>
                            上一次登陆：
                            <?php 
                                $m_name = $_SESSION['manager_name'];
                                include "connectDatabase.php";
                                $sql = "SELECT * FROM manager";
                                foreach ($conn->query($sql) as $row) {
                                    if ($row['name'] == $m_name) {
                                        $conn = null;
                                        $last_time = $row['last_time'];
                                        break;
                                    }
                                }                 
                                echo $last_time;
                            ?>
                            </p>
                        </div>
                    </div>

                    <div>
                        <h3>修改密码</h3>
                        <hr />
                        <div class="detail">
                            <form name="update_pwd" id="update_pwd" method = "post" action="update_pwd.php">
                                旧密码：<input type="password" name="old_pwd" maxlength="20" />	<br/><br/>
                                新密码：<input type="password" name="new_pwd" maxlength="20" />	<br/><br/>
                                确认密码：<input type="password" name="new_pwd_repeat" maxlength="20" />	<br/><br/>
                                <button type="submit" name="submit">确认修改</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div name="footer" id="footer">
        <p>Copyright © zcl. All rights reserved.</p>
    </div>
</body>

</html>