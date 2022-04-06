<?php
require_once __DIR__ . './common/DB.php';

$sql = "SELECT id,test_name,username,count(test_name),create_time FROM `test` group by test_name order by id";

$stmt = DB::getInstance()->connect()->query($sql);
$tests = $stmt->fetchAll();
$data = [];
foreach ($tests as $u) {
    $u['ctime'] = date('Y-m-d H:i', $u['create_time']);
    array_push($data, $u);
}

//获取题目数量
//$sqlgetNum = "select test_name,count(question_id) from test group by test_name";


//获取测试类型
$sqlgetType = "select test.test_name,question.type from test,question where test.question_id = question.id";

$stmtType = DB::getInstance()->connect()->query($sqlgetType);

$Types = $stmtType->fetchAll();

$dataTypes = [];

foreach ($Types as $u) {
    
    array_push($dataTypes, $u);
}

//var_dump($dataTypes);