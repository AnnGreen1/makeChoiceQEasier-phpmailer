<?php
require_once __DIR__.'./common/DB.php';

$sql = "select * from question";

$stmt = DB::getInstance()->connect()->query($sql);
$question = $stmt->fetchAll();
$data = [];
foreach ($question as $u) {
    $u['ctime'] = date('Y-m-d H:i', $u['create_time']);
array_push($data, $u);}