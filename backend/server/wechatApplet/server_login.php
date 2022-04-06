<?php
require_once '../common/DB.php';

//  获取前端提交的用户名和密码
$username = $_REQUEST['email'];
$password = $_REQUEST['password'];
//echo $username . "   " . $password;

$sqlUserStr = "select * from user where username = '$username'";

$stmtUser = DB::getInstance()->connect()->query($sqlUserStr);

$user = $stmtUser->fetch();

if (empty($user)) {
    //用户不存在


} else {
    //echo "进入了else";
    //echo $admin['password'];
    //是管理员用户，之后判断密码是否正确
    if ($user['password'] == $password) {
        //密码正确
        $user = array
        (
            "code"=>000,
            "id"=>$user['id'],
            "username"=>$user['username'],
            "password"=>$user['password'],
            "nickname"=>$user['nickname'],
            "icon"=>$user['icon'],
            "birthday"=>$user['birthday'],
            "num"=>$user['num'],
            "create_time"=>$user['create_time']
        );
        exit(json_encode($user));
    } else {
        //密码错误
    }
}
