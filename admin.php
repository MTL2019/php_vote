<?php
include_once 'checkAdmin.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>我最爱的汽车投票</title>
    <style>
        .img{
            width:100%;max-width: 150px;
        }
        h1,h2{
            text-align: center;
        }
        h2{
            font-size: 20px;
        }
        h2 a{text-decoration: none;color: #4476A7;}
        h2 a:hover{text-decoration: underline;color: brown;}
        .current{color: blueviolet;}
    </style>
</head>
<body>
<h1>车辆管理</h1>
<h2>
    <a href="index.php">返回首页</a>
    <a href="admin.php" class="current">车辆管理</a>
    <a href="showData.php">数据查看</a>
    <a href="logout.php">注销</a>
</h2>
<?php
include_once 'conn.php';
include_once 'page.php';//分页
$sql = "select count(id) as total from carinfo";//使用聚合函数count统计记录总数
$result = mysqli_query($conn, $sql);
$info = mysqli_fetch_array($result);
$total = $info['total'];  //得到记录总数
$perPage = 4; //设置每一页显示多少条数据
$page = $_GET['page'] ?? 1; //读取当前页码
paging($total, $perPage);//引用分页函数
$sql = "select * from carinfo order by id desc limit $firstCount,$perPage";
$result = mysqli_query($conn, $sql);

?>
<table border="0" width="100%" align="center">
    <tr>
        <td>
            <table align="center" width="100%" border="1" bordercolor="black" cellspacing="0" cellpadding="10" style="border-collapse: collapse">
                <tr>
                    <td align="center" width="8%">序号</td>
                    <td align="center" width="20%">车辆名称</td>
                    <td align="center" width="39%">车辆描述</td>
                    <td align="center" width="10%">车辆图片</td>
                    <td align="center" width="8%">当前票数</td>
                    <td align="center" width="15%">操作</td>
                </tr>
                <?php
                    $i = ($page - 1) * $perPage + 1;//当前页码
                    while($info = mysqli_fetch_array($result)){
                ?>
                        <tr>
                            <td align="center"><?php echo $i; ?></td>
                            <td align="center"><?php echo $info['carName']; ?></td>
                            <td align="center"><?php echo $info['carDesc']; ?></td>
                            <td align="center"><img class="img" src="img/<?php echo $info['carPic']; ?>"></td>
                            <td align="center"><?php echo $info['carNum']; ?></td>
                            <td align="center">修改资料 删除资料</td>
                        </tr>
                <?php
                        $i++;
                    }
                ?>

            </table>
        </td>
    </tr>

    <tr>
        <td align="right">
            <?php
                echo $pageNav;
            ?>
        </td>
    </tr>
    <tr>
        <td>
            添加车辆的表单
        </td>
    </tr>

</table>
</body>
</html>
