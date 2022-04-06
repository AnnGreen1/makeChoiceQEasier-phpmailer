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
    <title>makeChoiceQEasier-添加用户</title>
    <link rel="stylesheet" href="../utils/layui/css/layui.css">
    <link rel="stylesheet" href="../utils/css/nav.css">
    <link rel="icon" href="../utils/headlogo_right.png">
    <style>
        #titlediv {
            margin-bottom: 15px;
        }

        #container {
            padding: 20px;
        }

        #show-img {
            display: none;
            width: 150px;
            height: 150px;
            margin-top: 15px;
        }
    </style>
    
    <style>
        .layui-layout-admin .layui-header{position:fixed;top:0;left:0;right:0;background-color:rgb(139, 176, 205)}
    </style> 
</head>

<body class="layui-layout-body">
    <div class="layui-layout layui-layout-admin">
        <?php
        require_once './commom/nav.php';
        ?>
        <div class="layui-body">
            <div id="container">
                <div id="titlediv" class="layui-fluid">
                    <h2>添加用户</h2>
                </div>
                <form class="layui-form" action="../server/server_useradd.php" method="post" enctype="multipart/form-data">
                    <div class="layui-form-item">
                        <label class="layui-form-label">用户名</label>
                        <div class="layui-input-inline">
                            <input class="layui-input" type="text" name="username" required lay-verify="required" placeholder="请输入用户名" autocomplete="off">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">密码</label>
                        <div class="layui-input-inline">
                            <input class="layui-input" type="password" name="password" required lay-verify="required" placeholder="请输入密码" autocomplete="off">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">昵称</label>
                        <div class="layui-input-inline">
                            <input class="layui-input" type="text" name="nickname" required lay-verify="required" placeholder="请输入昵称" autocomplete="off">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">头像</label>
                        <div class="layui-input-inline">
                            <input class="layui-input" type="hidden" name="icon">
                            <a class="layui-btn" id="upload-btn">
                                <i class="layui-icon">&#xe67c;</i>上传图片
                            </a>
                            <img id="show-img">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">生日</label>
                        <div class="layui-input-inline">
                            <input class="layui-input" id="birthday" type="text" name="birthday" required lay-verify="required" placeholder="请输入生日" autocomplete="off">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit>确认</button>
                            <button class="layui-btn layui-btn-primary" onclick="history.go(-1)">返回</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../utils/jquery/jquery-3.6.0.min.js"></script>
    <script src="../utils/layui/layui.js"></script>
    <script>
        // 上传头像脚本
        layui.use(['upload', 'laydate'], function() {
            // 获取上传控件实例
            var upload = layui.upload
            // 执行实例
            var uploadInst = upload.render({
                elem: '#upload-btn', // 绑定元素
                url: '../server/common/img_upload.php', // 上传接口
                field: 'icon', // 设置上传域的key，服务端通过此key来获取信息
                done: function(res, index, upload) {
                    // res服务端返回的资源 ,其中的 code 如果是 100 则表示上传成功
                    if (res.code == 100) {
                        $('#show-img').attr('src', '../server/resource/usericon/' + res.img); // 获取图片的路径，设置给 src 属性
                        $('#show-img').css('display', 'inline-block'); // 显示元素
                        $(':input[type=hidden]')[0].value = res.img; // 将图片的名字保存给隐藏域
                    }
                },
                error: function(error) {
                    // 请求异常回调
                    console.log(error);
                }
            })
            // 获取时间控件实例
            var laydate = layui.laydate
            laydate.render({
                elem: '#birthday', // 绑定元素
            })
        })
    </script>
</body>

</html>