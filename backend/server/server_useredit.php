<?php

require_once './common/DB.php';

$id = $_REQUEST['id'];
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$nickname = $_REQUEST['nickname'];
$icon = $_REQUEST['icon'];
$create_time = time();

$sql = "UPDATE user SET username='$username', password='$password', nickname='$nickname', icon='$icon', create_time=$create_time WHERE id='$id'";
// echo $sql;
$count = DB::getInstance()->connect()->exec($sql);

if($count > 0) {
  echo "<script>alert('修改成功！');location.href='../view/userlist.php'</script>";
} else {
  echo "<script>alert('修改失败！');location.href='../view/useradd.php'</script>";
}
