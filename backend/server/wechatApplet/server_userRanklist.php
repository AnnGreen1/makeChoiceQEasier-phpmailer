<?php
//var_dump(__DIR__);
$root_file = substr(__DIR__, 0, -55);
//var_dump($root_file);
require_once $root_file . 'makeChoiceQEasier-phpmailer\backend\server\common\DB.php';



$sqlSelectUserTop5 = "SELECT nickname,num,birthday FROM `user`  order by num desc limit 5";
$stmtuserTop5 = DB::getInstance()->connect()->query($sqlSelectUserTop5);
//var_dump($stmtuserTop5);

$userTop5 = $stmtuserTop5->fetchAll();
//var_dump($userTop5);
$data = [];

foreach ($userTop5 as $u) {
    array_push($data, $u);
}

// var_dump($data);
exit(json_encode($data));
