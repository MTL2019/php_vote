<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>我最爱的汽车投票</title>

    <style>
        .login{text-align: right;margin-bottom: 20px;}
        .img{position: relative;}
        .row img{width:100%;}
        .img .row{position: absolute;bottom: 0;left: 15px;background-color: rgba(0,0,0,0.5);width: 100%;color: white;}
        p{margin: 10px 0 !important;}
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center">我最爱的汽车投票</h1>
    <p class="login">登录  注册</p>
    <div class="row">
        <?php
        include_once 'conn.php';
        $sql = "select * from carinfo order by id desc";
        $result = mysqli_query($conn,$sql);
        $i = 1;//计数器，用户计数，以清理浮动
        while($info = mysqli_fetch_array($result)){
            ?>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <div class="img">
                <a href="vote.php?id=<?php echo $info['id'];?>"><img src="img/<?php echo $info['carPic'];?>"></a>
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-6">
                        <p class="text-center"><?php echo $info['carName'];?></p>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-6">
                        <p class="text-center">当前票数：<?php echo $info['carNum'];?></p>
                    </div>
                </div>
            </div>
            <p><?php echo $info['carDesc'];?></p>
        </div>
        <?php
            if ($i % 2 == 0){
                echo '<div class="clearfix visible-sm-block"></div>';
            }
//            if ($i % 3 == 0){
//                echo '<div class="clearfix visible-md-block"></div>';
//            }
//            if ($i % 4 == 0){
//                echo '<div class="clearfix visible-lg-block"></div>';
//            }
            $i++;
        }
        ?>
    </div>
</div>
</body>
</html>