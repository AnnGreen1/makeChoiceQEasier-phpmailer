<?php
require_once './common/DB.php';

//  获取前端提交的用户名和密码
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
//echo $username . "   " . $password;

$sqlAdminStr = "select * from admin where username = '$username'";

$stmtAdmin = DB::getInstance()->connect()->query($sqlAdminStr);

$admin = $stmtAdmin->fetch();

if (empty($admin)) {
    //不是管理员用户，之后判断是不是普通用户
    $sqlUserStr = "select * from user where username = '$username'";

    $stmtUser = DB::getInstance()->connect()->query($sqlUserStr);

    $user = $stmtUser->fetch();

    if (empty($user)) {
        echo "<script>alert('用户不存在！');history.go(-1);</script>";
    } else {
        //是普通用户
        if ($user['password'] == $password) {
            // 启用session
            session_start();
            // 将用户名保存到session中
            $_SESSION['username'] = $username;
            echo "欢迎普通用户" . $username;
            echo "<script>location.href='../view/homepage.php';</script>";
        } else {
            echo "<script>alert('密码错误！');history.go(-1);</script>";
        }
    }
} else {
    //echo "进入了else";
    //echo $admin['password'];
    //是管理员用户，之后判断密码是否正确
    if ($admin['password'] == $password) {
        // 启用session
        session_start();
        // 将用户名保存到session中
        $_SESSION['username'] = $username;
        //echo "欢迎管理员用户" . $username;
        echo "<script>location.href='../view/homepage.php';</script>";
    } else {
        echo "<script>alert('密码错误！');history.go(-1);</script>";
    }
}

exit("sf");