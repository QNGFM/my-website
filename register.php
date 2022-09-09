<?php
header('content-type:text/html;charset=utf-8');
$host = "localhost";
$user = "root";
$password = "123456";
$db = "yiban";

$mysqli=new mysqli($host,$user,$password,$db);
if($mysqli->connect_errno){
    die($mysqli->connect_error);
}
$mysqli->set_charset('utf8');
//echo '连接成功';
register($mysqli);
//$name=$_GET['username'];
//$pass=$_GET['passwd'];
//echo $name;
//echo $pass;
$mysqli->close();

function register($mysqli)
{
    $sql="insert into logon(username,password) value(?,?)";
    $mysqli_stmt=$mysqli->prepare($sql);
    
    $name=$_GET["username"];
    $pass=$_GET["password1"];

    $mysqli_stmt->bind_param('ss',$name,$pass);

    if($mysqli_stmt->execute()){
        //echo $mysqli_stmt->insert_id;
        //echo PHP_EOL;
        echo '新注册的用户名:'.$name.'<br/>';
        echo '新注册的密码:'.$pass.'<br/>';
        echo "<script>alert('恭喜你，注册成功！');window.location.href='登录.html'</script>";
    }else{
        echo $mysqli_stmt->error;
    }
    $mysqli_stmt->free_result();
    $mysqli_stmt->close();
}