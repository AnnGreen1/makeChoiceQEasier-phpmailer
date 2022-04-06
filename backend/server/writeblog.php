<?php

//这里就是向blog表中插入数据的操作了
/*
向blog表中插入数据需要用户名，标题，内容，时间
*/

require_once './common/DB.php';

session_start();
print_r($_SESSION);
print_r($_SESSION['username']);
$username = $_SESSION['username'];


$title = $_REQUEST['title'];
$content = $_REQUEST['content'];

$create_time = time() + 8 * 3600;

$sqlInsertBlog = "insert into blog(id,username,title,content,create_time)VALUES('null','$username', '$title', '$content', '$create_time')";
echo $sqlInsertBlog;

$count = DB::getInstance()->connect()->exec($sqlInsertBlog);
if($count > 0) {
  echo "<script>location.reload();location.href='../view/community.php'</script>";
  //echo "<script>alert('添加成功！');</script>";
} else {
  echo "<script>alert('添加失败！');location.href='../view/community.php'</script>";
}