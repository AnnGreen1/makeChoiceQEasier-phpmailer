<?php

require_once './common/DB.php';

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$nickname = $_REQUEST['nickname'];
$icon = $_REQUEST['icon'];
$birthday = $_REQUEST['birthday'];
$create_time = time() + 8 * 3600;

$sql = "INSERT INTO user(id,username, password, nickname, icon, birthday, create_time) VALUES('null','$username', '$password', '$nickname', '$icon','$birthday', $create_time)";

$count = DB::getInstance()->connect()->exec($sql);
if($count > 0) {
  echo "<script>alert('添加成功！');location.href='../view/userlist.php'</script>";
  //echo "<script>alert('添加成功！');</script>";
} else {
  echo "<script>alert('添加失败！');location.href='../view/useradd.php'</script>";
}
