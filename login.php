<?php
header('content-type:text/html;charset=utf-8');
$host = "localhost";
$user = "root";
$password = "123456";
$db = "yiban";

$mysqli = new mysqli($host, $user, $password, $db); //实例化mysqli对象，连接mysql数据库
if ($mysqli->connect_errno) {
    die($mysqli->connect_error);
}
$mysqli->set_charset('utf8'); //设置字符集

//执行读取用户
getUser($mysqli);

//$name = $_GET['username'];
//$pass = $_GET['passwd'];
//echo '登录的用户名:'.$name.'<br/>';
//echo '登录的密码:'.$pass.'<br/>';



//读取用户并显示
function getUser($mysqli)
{
    $sql = "SELECT username,password FROM logon WHERE username = ? and password = ? ";
    $mysqli_stmt = $mysqli->prepare($sql);

    //定于要存值的变量
    $name = $_GET['username'];
    $pass = $_GET['password'];
    //echo '登录的用户名:'.$name.'<br/>';
    //echo '登录的密码:'.$pass.'<br/>';

    $mysqli_stmt->bind_param('ss', $name, $pass);

    if ($mysqli_stmt->execute()) {
        $name = null;
        //bind_result() 绑定结果集中的值到变量
        $mysqli_stmt->bind_result($name,$pass);
        //遍历结果集
        if ($mysqli_stmt->fetch()) {
            echo '欢迎我们尊贵的: ' . $name;
            echo "<script>alert('恭喜你，登录成功！');window.location.href='主页面.html'</script>";
        } else {
            echo '无此用户或密码错误';
        }
    }
    //释放结果集
    $mysqli_stmt->free_result();
    $mysqli_stmt->close();
}
$mysqli->close();
