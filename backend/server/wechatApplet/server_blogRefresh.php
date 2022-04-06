<?php
//var_dump(__DIR__);
$root_file = substr(__DIR__, 0, -55);
//var_dump($root_file);
require_once $root_file . 'makeChoiceQEasier-phpmailer\backend\server\common\DB.php';

$id = $_REQUEST['id'];
$sqlblogRefresh = "select * from blog where id<='$id' order by create_time desc limit 5";
$stmtblogRefresh = DB::getInstance()->connect()->query($sqlblogRefresh);
$blogRefresh = $stmtblogRefresh->fetchAll();

$datablogRefresh = [];
foreach($blogRefresh as $b)
{
    array_push($datablogRefresh, $b);
}

exit(json_encode($datablogRefresh));