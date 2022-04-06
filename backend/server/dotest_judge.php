<?php
require_once __DIR__ . './common/DB.php';

/*
这里要获取到的内容
1，题目的id
2，唯一的测试名
3、选了哪一个
4、还要获取时间添加进去
*/

$questionid = $_REQUEST['qid'];
$testname = $_REQUEST['testname'];
$answer = $_REQUEST['answer'];
$create_time = time() + 8 * 3600;

$sql = "insert into judge(id, test_name, question_id, answer,create_time) values('null','$testname','$questionid','$answer','$create_time')";

//echo $sql;
$count = DB::getInstance()->connect()->exec($sql);