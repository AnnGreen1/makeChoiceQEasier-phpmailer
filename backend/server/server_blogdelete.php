<?php
require_once __DIR__ . './common/DB.php';

$id = $_REQUEST['id'];

$sqldeleteblog = "delete from blog where id = '$id'";

$count = DB::getInstance()->connect()->exec($sqldeleteblog);
if ($count > 0) {
  echo "<script>alert('删除成功！');location.href='../view/community.php'</script>";
} else {
  echo "<script>alert('删除失败！');location.href='../view/community.php'</script>";
}