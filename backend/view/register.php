

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>makeChoiceQEasier-注册</title>
    <link rel="stylesheet" type="text/css" href="../utils/Resource_of_Login/css/register.css" />
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




            <div class="box">
                <form action="../server/server_register.php" method="post">
                    <h1>join makeChoiceQEasier</h1>
                    <input type="email" placeholder="邮箱" name="email" id="email"/>
                    <input type="password" placeholder="密码" name="password" />
                    <input style="width:150px;float:left;margin-left:35px;margin-top:1px;" type="text" placeholder="验证码" name="verificationcode" />
                    <input style="width:120px;float:right;margin-right:35px;margin-top:1px;" type="button" value="获取验证码" onclick="getVerificationCode()">
                    <button>Register</button>
                    <p>已有账户？<span><a href='./login.php'>返回登录</a></span></p>
                </form>

            </div>
        </div>
    </div>

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.6.0.min.js"></script>
    <script>
        function getVerificationCode() {
            console.log("adf");
            Email = $('#email').val();
            console.log(Email);
            $.ajax({
                url: "../server/common_ability/create_send_verificationCode.php",
                type: 'get',
                data: { email:Email},
                success: function() {
                    alert("获取验证码成功！");
                }
            })
        }
    </script>
</body>

</html>