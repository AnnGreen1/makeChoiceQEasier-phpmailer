<?php
//var_dump(__DIR__);
$root_file = substr(__DIR__, 0, -55);
//var_dump($root_file);
require_once $root_file . 'makeChoiceQEasier-phpmailer\backend\server\common\DB.php';

$sqlSelectQuestionTop5 = "SELECT title,create_time from `blog`  order by create_time desc limit 5";
$stmtquestionTop5 = DB::getInstance()->connect()->query($sqlSelectQuestionTop5);
//var_dump($stmtuserTop5);

$questionTop5 = $stmtquestionTop5->fetchAll();
//var_dump($userTop5);
$dataB = [];

foreach ($questionTop5 as $q) {
    array_push($dataB, $q);
}

exit(json_encode($dataB));