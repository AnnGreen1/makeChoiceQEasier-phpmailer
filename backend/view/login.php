<!--
/*
 *  登录页面
 */
 -->

<!--

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>makeChoiceQEasier</title>
    <link rel="icon" href="https://pcsdata.baidu.com/thumbnail/d16e29443s7b019573b0b483df0084ff?fid=3819928092-16051585-368668620515488&rt=pr&sign=FDTAER-yUdy3dSFZ0SVxtzShv1zcMqd-d%2FYde2429Vd7pQW0z9RjZuCIZQA%3D&expires=2h&chkv=0&chkbd=0&chkpc=&dp-logid=9093825174572863598&dp-callid=0&time=1639011600&bus_no=26&size=c1600_u1600&quality=100&vuk=-&ft=video">
    <link rel="stylesheet" href="../utils/layui/css/layui.css">
    <style>
        #titlediv {
            margin-bottom: 20px;
        }

        #title {
            text-align: center;
        }

        #login {
            position: absolute;
            width: 300px;
            height: 240px;
            padding: 40px 60px;
            color: black;
            background-color: white;
            margin: auto;
            top: 0;
            right: 0;
            bottom: 0;
            left: 750px;
        }

        .caret::after {
            content: "";
            display: inline-block;
            width: 2px;
            height: 1em;
            margin-bottom: -2px;
            margin-left: -2px;
            background-color: #333;
            animation: blink-caret .5s step-end infinite;
        }

        @keyframes blink-caret {
            50% {
                opacity: 0;
            }
        }
    </style>
</head>

<body class="layui-bg-cyan">

    <div>
        <div style="float:left ;margin-left: 200px">
            <div style="margin-top: 300px;">
                <h1 id="txt"><img src="../server/resource/slogan.gif" alt=""></h1>
            </div>
        </div>

        <div id="login" style="float:right">
            <div id="titlediv" class="layui-fluid">
                <h1 id="title">makeChoiceQEasier</h1>
            </div>
            <form class="layui-form" action="../server/server_login.php" method="post">
                <div class="layui-form-item">
                    <input class="layui-input" type="text" name="username" required lay-verify="required" autocomplete="off" placeholder="请输入用户名">
                </div>
                <div class="layui-form-item">
                    <input class="layui-input" type="password" name="password" required lay-verify="required" autocomplete="off" placeholder="请输入密码">
                </div>
                <div class="layui-form-item layui-row">
                    <div class="layui-col-xs5 layui-col-sm5 layui-col-md5">
                        <button class="layui-btn layui-btn-primary layui-btn-fluid">注册</button>
                    </div>
                    <div class="layui-col-xs-offset2 layui-col-xs5 layui-col-sm-offset2 layui-col-sm5 layui-col-md-offset2 layui-col-md5">
                        <button class="layui-btn layui-btn-fluid">登录</button>
                    </div>
                </div>
            </form>
        </div>

    </div>




    <script src="../utils/layui/layui.js"></script>

    
    <script>
        // var str = '';
        // time = 0;
        // //var source='这是一个传说中的打字动画';
        // var source = ["","m","a","k","e","C","h","o","i","c","e","Q","E","a","s","i","e","r"," ","让","选","择","题","更","容","易",""];

        // function sleep(numberMillis)
        // {
        //     var now = new Date();
        //     var exitTime = now.getTime() + numberMillis;
        //     while (true) 
        //     {
        //         now = new Date();
        //         if (now.getTime() > exitTime)
        //             return;
        //     }
        // }

        // var ele = document.getElementById('txt');

        // window.setInterval
        //     (
        //         function () {
        //             str += source[time % source.length];
        //             time++;
        //             ele.innerHTML = str+'_';
        //             //sleep(500);

        //             // if ((time % source.length) == 0) {
        //             //     sleep(5000);
        //             //     str = '';
        //             // }
        //             if ((time % source.length) == 0) 
        //             {
        //                 for(d=1;d<=5;d++)
        //                 {
        //                     sleep(1000);
        //                     if(d%2==0)
        //                     {
        //                         ele.innerHTML=" makeChoiceQEasier 让选择题更容易_";
        //                     }
        //                     else
        //                     {
        //                         ele.innerHTML=" makeChoiceQEasier 让选择题更容易 ";
        //                     }
        //                 }
        //                 //sleep(5000);
        //                 str = '';
        //             }
        //         },
        //         100
        //     );
    </script>
</body>

</html>
-->

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>makeChoiceQEasier</title>
    <link rel="stylesheet" type="text/css" href="../utils/Resource_of_Login/css/style.css" />
    <link rel="icon" href="../utils/headlogo_right.png">
</head>

<body>
    <div class="vid-container">
        <video class="bgvid" autoplay="autoplay" muted="muted" preload="auto" loop>
            <source src="../utils/Resource_of_Login/video/loginBackgroundVideo.webm" type="video/webm">
        </video>
        <div class="inner-container">
            <video class="bgvid inner" autoplay="autoplay" muted="muted" preload="auto" loop>
                <source src="../utils/Resource_of_Login/video/loginBackgroundVideo.webm">
            </video>


            <!-- 
    <form action="../server/server_login.php" method="post">
                <div>
                    <input type="text" name="username" placeholder="请输入用户名">
                </div>
                <div class="layui-form-item">
                    <input type="password" name="password" placeholder="请输入密码">
                </div>
                <div class="layui-form-item layui-row">
                    <div class="layui-col-xs5 layui-col-sm5 layui-col-md5">
                        <button class="layui-btn layui-btn-primary layui-btn-fluid">注册</button>
                    </div>
                    <div class="layui-col-xs-offset2 layui-col-xs5 layui-col-sm-offset2 layui-col-sm5 layui-col-md-offset2 layui-col-md5">
                        <button class="layui-btn layui-btn-fluid">登录</button>
                    </div>
                </div>
            </form> -->



            <div class="box">
                <form action="../server/server_login.php" method="post">
                    <h1>makeChoiceQEasier</h1>
                    <input type="text" placeholder="用户名" name="username" />
                    <input type="password" placeholder="密码" name="password" />
                    <button>Login</button>
                    <p>没有账户？<span><a href='./register.php'>立刻注册</a></span></p>
                </form>

            </div>
        </div>
        
    </div>
</body>

</html>