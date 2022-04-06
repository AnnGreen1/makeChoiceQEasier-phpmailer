<?php

require_once './common/DB.php';

session_start();
// print_r($_SESSION);
// print_r($_SESSION['username']);
$username = $_SESSION['username'];

$type = $_REQUEST['type'];
// var_dump($type);

$stem = $_REQUEST['stem'];
// echo $stem;

$right_key = $_REQUEST['right_key'];
// echo $right_key;

$answer_a = $_REQUEST['answer_a'];
// echo $answer_a;

$answer_b = $_REQUEST['answer_b'];
// echo $answer_b;

$answer_c = $_REQUEST['answer_c'];
// echo $answer_c;

$answer_d = $_REQUEST['answer_d'];
// echo $answer_d;

$difficulty = $_REQUEST['difficulty'];
// echo $difficulty;

$open = $_REQUEST['open'];
// echo $open;

$create_time = time() + 8 * 3600;

$sql = "INSERT INTO question(id, type, username, stem, answer_a, answer_b, answer_c, answer_d, right_key, create_time, difficulty, open) VALUES('null','$type', '$username', '$stem', '$answer_a', '$answer_b', '$answer_c', '$answer_d', '$right_key', '$create_time', '$difficulty', '$open')";
// echo "<br>";
// echo $sql;

$count = DB::getInstance()->connect()->exec($sql);
if($count > 0) {
  echo "<script>alert('添加成功！');location.href='../view/questionlist.php'</script>";
  //echo "<script>alert('添加成功！');</script>";
} else {
  echo "<script>alert('添加失败！');location.href='../view/questionadd.php'</script>";
}