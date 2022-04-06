<?php

require_once './common/DB.php';

// session_start();
// print_r($_SESSION);
// print_r($_SESSION['username']);
// $username = $_SESSION['username'];

$id = $_REQUEST['id'];
// echo $id;

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

$sqlUpdateQuestion = "update question set type='$type', stem='$stem', answer_a='$answer_a', answer_b='$answer_b', answer_c='$answer_c', answer_d='$answer_d', right_key='$right_key', create_time=$create_time, difficulty='$difficulty', open='$open' where id='$id'";
// echo $sqlUpdateQuestion;


// $bar = <<<EOT
// update question set type="$type", stem="$stem", answer_a="$answer_a", answer_b="$answer_b", answer_c="$answer_c", answer_d="$answer_d", right_key="$right_key", create_time=$create_time, difficulty="$difficulty", open="$open" where id="$id"
// EOT;
// echo $bar;



$count = DB::getInstance()->connect()->exec($sqlUpdateQuestion);

if($count > 0) {
  echo "<script>alert('修改成功！');location.href='../view/questionlist.php'</script>";
} else {
  echo "<script>alert('修改失败！');location.href='../view/questionadd.php'</script>";
}