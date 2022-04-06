<?php
//服务nav的用户头像
require_once "../server/common/connect.php";
$admimusername = $_SESSION['username'];
$sqlSelectAdminicon = "select icon from admin where username = '$admimusername'";
$stmt = $pdo->query($sqlSelectAdminicon);
$icon = $stmt->fetch();
?>

<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
      
        <div class="layui-logo"><a id="makeChoiceQEasier" href="">makeChoiceQEasier</a></div>

        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item"><a href="../view/homepage.php">首页</a></li>
            <li class="layui-nav-item"><a href="../view/userlist.php">用户</a></li>
            <li class="layui-nav-item"><a href="../view/questionlist.php">题库</a></li>
            <li class="layui-nav-item"><a href="../view/configurequestion.php">刷题</a></li>
            <li class="layui-nav-item"><a href="../view/community.php">社区</a></li>

        </ul>




        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="">
                     <!-- <img class="layui-nav-img" src="http://t.cn/RCzsdCq">管理员 -->
                     <img class="layui-nav-img" src="../server/resource/usericon/<?php if($icon['icon']) { echo $icon['icon']; } else {echo 'default.png';} ?>"><?php echo $admimusername ?>

                     <!-- <img class="layui-nav-img" src=".">管理员 -->
                </a>
                <dl class="layui-nav-child">
                    <!-- <dd><a href="">修改信息</a></dd> -->
                    <dd><button onclick="notice()" class="layui-btn" style="width:130px;height:40px;margin:0px 0px 0px 0px;">修改信息</button></dd>
                    <!-- <dd><a href="">安全设置</a></dd> -->
                </dl>
            </li>
            <li class="layui-nav-item"><a href="../server/server_logout.php">退了</a></li>
        </ul>



    

    </div>

</div>

