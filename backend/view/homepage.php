<?php
// 登录拦截
session_start();
if (empty($_SESSION['username'])) {
  // 找不到session中的用户名，说明用户是没有登陆过，那么就需要弹窗提醒，并跳转到登录页面
  echo "<script>alert('请先登录！');location.href='../view/login.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>makeChoiceQEasier-首页</title>
  <link rel="stylesheet" href="../utils/layui/css/layui.css">
  <link rel="stylesheet" href="../utils/css/nav.css">
  <link rel="icon" href="../utils/headlogo_right.png">


  <style>
    .layui-layout-admin .layui-header {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      background-color: rgb(139, 176, 205)
    }
  </style>
</head>

<body>

  <?php
  require_once './commom/nav.php';
  require_once '../server/common_ability/server_userRanklist.php';
  require_once '../server/common_ability/server_questionRanklist.php';
  require_once '../server/common_ability/server_blogRanklist.php';
  ?>
  <div style="margin-top:60px;">
    <div class="layui-carousel" id="test1">
      <div carousel-item>
        <div><div style="font-size:130px;margin:auto;"><img src="../server/resource/banner/banner1.jpg"></div></div>
        <div><div style="font-size:130px;margin:auto;"><img src="../server/resource/banner/banner3.jpeg"></div></div>
        <div><div style="font-size:130px;margin:auto;"><img src="../server/resource/banner/banner2.jpg"></div></div>
        <div><div style="font-size:130px;margin:auto;">:P</div></div>
        <div><div style="font-size:130px;margin:auto;">这就是没有广告的广告位</div></div>
      </div>
    </div>
  </div>



  <div style="margin: 20px 20px 20px 20px;">
    <div style="float:left;width:50%;">

      <div style="float:left;width:50%;">
        <div style="border-style:solid;margin-right:10px;height:350px;border-radius: 5px;border-color:rgb(139, 176, 205);">
          <!-- <h1>用户排行榜</h1> -->
          <span style="font-size: 32px;">用户排行榜</span>
          <span style="font: size 10px;">(刷题数量top5)</span>
          <?php
          require_once './commom/userRanklist.php';
          ?>
        </div>
      </div>




      <div style="float:left;width:50%;">
        <div style="border-style:solid;margin-left:10px; margin-right:10px;height:350px;border-radius: 5px;border-color:rgb(139, 176, 205);">
          <!-- <h1>题目排行榜</h1> -->
          <span style="font-size: 32px;">社区排行榜</span>
        <span style="font: size 10px;">(最新发帖top5)</span>
        <?php
          require_once './commom/blogRanklist.php';
          ?>
        </div>
      </div>

    </div>


    <div style="float:right;width:50%;">
      <div style="border-style:solid;margin-left:10px;height:350px;border-radius: 5px;border-color:rgb(139, 176, 205);">
        <!-- <h1>社区排行榜</h1> -->

        <span style="font-size: 32px;">题目排行榜</span>
          <span style="font: size 10px;">(最新题目top5)</span>
          <?php
          require_once './commom/questionRanklist.php';
          ?>
        
      </div>
    </div>

  </div>



  <!-- 条目中可以是任意内容，如：<img src=""> -->

  <script src="../utils/layui/layui.js"></script>

  <script>
    layui.use('carousel', function() {
      var carousel = layui.carousel;
      //建造实例
      carousel.render({
        elem: '#test1',
        width: '100%' //设置容器宽度
          ,
        arrow: 'always' //始终显示箭头
        //,anim: 'updown' //切换动画方式
      });
    });
  </script>
  <!--换头像没实现，没有用-->
  <script src="../utils/js/updateicon.js"></script>
</body>

</html>