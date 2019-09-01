<!DOCTYPE html>
<html lang="en" id="administrativeBuilding">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>managerManage</title>
    <link rel="stylesheet" href="css/comment_manage.css" type="text/css" />
    <script src="js/manager_manage.js"></script>
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
                <h2>管理员管理</h2>

                <div name="information" id="information">
                <?php
                    SESSION_start();
                    if ($_SESSION['manager_permission'] == 3)
                        echo <<<EOF
                        <div>
                        <h3>添加管理员</h3>
                        <hr />
                        <div class="detail">
                            <form method = "post" action="add_manager.php">
                                管理员名：<input type="text" name="name" />	<br/><br/>
                                新密码： <input type="password" name="pwd" />	<br/><br/>
                                确认密码：<input type="password" name="pwd_repeat" />	<br/><br/>
                                权限：<input type="radio" name="permission" value="1" checked="checked"/>评论管理
                                <input type="radio" name="permission" value="2" />评论和用户管理
                                	<br/><br/>
                                
                                <button type="submit" name="submit">添加</button>
                            </form>
                        </div>
                    </div>
EOF;
                    else if ($_SESSION['manager_permission'] == 2)
                    echo <<<EOF
                    <div>
                    <h3>添加管理员</h3>
                    <hr />
                    <div class="detail">
                        <form method = "post" action="add_manager.php">
                            管理员名：<input type="text" name="name" />	<br/><br/>
                            新密码： <input type="password" name="pwd" />	<br/><br/>
                            确认密码：<input type="password" name="pwd_repeat" />	<br/><br/>
                            权限：<input type="radio" name="permission" value="1" checked="checked"/>评论管理	<br/><br/>
                            
                            <button type="submit" name="submit">添加</button>
                        </form>
                    </div>
                </div>
EOF;
                ?>                    
                    
                    <div>
                        <h3>管理员列表</h3>
                        <hr />
            
                        <div class="detail">
                            <p> 权限说明：1表示评论管理权，2表示评论管理和用户管理权，3表示评论管理、用户管理和绝对存在权。</p>
                            <br />
                            <table> 
                            <tr>
                                <th>管理员名</th>
                                <th>上次登陆时间</th>
                                <th>设置权限</th>
                                <th>删除管理员</th>
                            </tr>
                                <?php
                                include "connectDatabase.php";
                                $sql = "SELECT * FROM manager";
                                foreach ($conn->query($sql) as $row) {
                                    $name = $row['name'];
                                    $last_time = $row['last_time'];
                                    $permission = $row['permission'];
                                    if ($name == $_SESSION['manager_name'])
                                        continue;
                                    echo "<tr><td>$name</td>
                                        <td>$last_time</td>";
                                    if ($permission >= $_SESSION['manager_permission']) 
                                        echo <<<EOF
                                        <td><input type="button" value="$permission" disabled="true"></td>
                                        <td><input type="button" value="删除" disabled="true" /></td>                                   
EOF;
                                    else if($_SESSION['manager_permission'] == 2)
                                        echo <<<EOF
                                        <td><input type="button" value="1" disabled="true"></td>
                                        <td><input type="button" value="删除" onclick="delete_manager(this, '$name')" /></td>

EOF;
                                    else 
                                        echo <<<EOF
                                        <td><input type="button" value="$permission" onclick="change_manager_permission(this, '$name')"></td>
                                        <td><input type="button" value="删除" onclick="delete_manager(this, '$name')" /></td>

EOF;

                                }
                                $conn = null;
                                ?>
                            </table>
                           
                            
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