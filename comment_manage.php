<!DOCTYPE html>
<html lang="en" id="administrativeBuilding">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>commentManage</title>
    <link rel="stylesheet" href="css/comment_manage.css" type="text/css" />
    <script src="js/comment_manage.js"></script>
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
                <h2>评论管理</h2>

                <div name="information" id="information">
                        <div class="detail">
                            <table> 
                                <tr>
                                    <th>用户名</th>
                                    <th>地点</th>
                                    <th>评论</th>
                                    <th>设置精选</th>
                                    <th>删除评论</th>
                                </tr>
                                <?php
                                include "connectDatabase.php";
                                $sql = "SELECT * FROM comment";
                                foreach ($conn->query($sql) as $row) {
                                $name = $row['name'];
                                $palce = $row['type'];
                                $content = $row['content'];
                                $comment_id = $row['comment_id'];
                                $lever_id = $comment_id . "lever";
                                if ($row['lever'] == 1) 
                                            echo 
                                            "<tr>
                                                <td>$name</td>
                                                <td>$palce</td>
                                                <td>$content</td>
                                                <td><input type=\"button\" value=\"取消\" onclick=\"change_comment_lever(this, $comment_id)\"></td>
                                                <td><input type=\"button\" value=\"删除\" onclick=\"delete_comment(this, $comment_id)\"></td>
                                            </tr>";

                                else 
                                            echo 
                                            "<tr>
                                            <td>$name</td>
                                            <td>$palce</td>
                                            <td>$content</td>
                                            <td><input type=\"button\" value=\"精选\" onclick=\"change_comment_lever(this, $comment_id)\"></td>
                                            <td><input type=\"button\" value=\"删除\" onclick=\"delete_comment(this, $comment_id)\"></td>
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