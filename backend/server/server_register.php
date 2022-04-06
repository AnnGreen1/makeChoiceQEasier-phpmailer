<?php
require_once './common/DB.php';
/**
 * 
 * 这个真的很垃圾，哪有注册向管理员表注册的，不过好像也有。。。。。
 */

//  获取前端提交的用户名和密码
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$verificationcode = $_REQUEST['verificationcode'];
// echo $username . "   " . $password;


$sqlselectverificationcode = "select * from emailverificationCode where username = '$email' and verificationcode = '$verificationcode'";
//echo $sqlselectverificationcode;
$stmt = DB::getInstance()->connect()->query($sqlselectverificationcode);
if(!is_null($stmt)) 
{
  $sqlinsertAdmin = "insert into admin(id,username,password,icon) values (null,'$email','$password','default.png')";

  $count = DB::getInstance()->connect()->exec($sqlinsertAdmin);
  if($count > 0) {
    echo "<script>alert('注册成功！');location.href='../view/login.php'</script>";
    //echo "<script>alert('添加成功！');</script>";
  } else {
    echo "<script>alert('注册失败！');location.href='../view/register.php'</script>";
  }
}else{
    echo "<script>alert('注册失败！');</script>";
}





