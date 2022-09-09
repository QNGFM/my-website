<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>详情页</title>
    <link rel="stylesheet" type="text/css" href="style2.css"/>
</head>
<body>
<div class="main">

    <div class="nav">
        <span class="name">西 园</span>
        <a href="主页面">上一页</a>

    </div>
    <div class="container">

        <div class="lside">
            <img class="image" src="西园.jpeg">
            <img class="image" src="西园2.jpg">
            <img class="image" src="西园3.jpg">
            <img class="image" src="西园4.jpg">
            <img class="image" src="西园5.jpg">
            <img class="image" src="西园6.jpg">
        </div>
        <div class="show">留 言 板</div>
        <br/>
<!--        评价板-->
        <div class="rside">
            <form action="save.php" method="post">
            <input type="text" name="message" value="">
            <input type="submit" name="" value="提交" >
            <ol>
                <?php
                include_once "query_message.ini.php";
                $message = getMessage();
                //var_dump($message) ;
                foreach($message as $i){
                    $i = $i['text'];
                    echo "<li>$i</li>";
                }
                ?>
            </ol>
        </div>
    </div>
</div>
</body>
</html>