<!DOCTYPE html>
<html lang="en" id="administrativeBuilding">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>userManage</title>
    <link rel="stylesheet" href="css/comment_manage.css" type="text/css" />
    <script src="js/user_manage.js"></script>
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
                <h2>用户管理</h2>
                <div name="information" id="information">
                        <div class="detail">
                            <table> 
                                <tr>
                                    <th>用户名</th>
                                    <th>密码</th>
                                    <th>设置禁言</th>
                                    <th>删除用户</th>
                                </tr>
                                <?php
                                SESSION_start();
                                if ($_SESSION['manager_permission']==1)
                                    $a = "disabled=\"disabled\"";
                                else 
                                    $a = "";
                                include "connectDatabase.php";
                                $sql = "SELECT * FROM users";
                                foreach ($conn->query($sql) as $row) {
                                    $name = $row['name'];
                                    $pwd = $row['pwd'];
                                    $permission = $row['permission'];
                                    if ($permission == 1) 
                                        if ($_SESSION['manager_permission']==1)
                                            echo 
                                            "<tr>
                                                <td>$name</td>
                                                <td>$pwd</td>
                                                <td><input type=\"button\" value=\"禁言\" disabled=\"disabled\" onclick=\"change_user_permission(this, '$name')\"></td>
                                                <td><input type=\"button\" value=\"删除\" disabled=\"disabled\" onclick=\"delete_user(this, '$name')\"></td>
                                            </tr>";
                                        else 
                                                echo 
                                                "<tr>
                                                    <td>$name</td>
                                                    <td>$pwd</td>
                                                    <td><input type=\"button\" value=\"禁言\" onclick=\"change_user_permission(this, '$name')\"></td>
                                                    <td><input type=\"button\" value=\"删除\" onclick=\"delete_user(this, '$name')\"></td>
                                                </tr>";

                                    else 
                                        if ($_SESSION['manager_permission']==1)
                                    
                                                echo 
                                                "<tr>
                                                <td>$name</td>
                                                <td>$pwd</td>
                                                <td><input type=\"button\" value=\"取消\" disabled=\"disabled\" onclick=\"change_user_permission(this, '$name')\"></td>
                                                <td><input type=\"button\" value=\"删除\" disabled=\"disabled\" onclick=\"delete_user(this, '$name')\"></td>
                                                </tr>";
                                        else 
                                                echo 
                                                "<tr>
                                                <td>$name</td>
                                                <td>$pwd</td>
                                                <td><input type=\"button\" value=\"取消\"  onclick=\"change_user_permission(this, '$name')\"></td>
                                                <td><input type=\"button\" value=\"删除\"  onclick=\"delete_user(this, '$name')\"></td>
                                                </tr>";
                                }
                                $conn = null;
                                ?>
                            </table>
                           
                            
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