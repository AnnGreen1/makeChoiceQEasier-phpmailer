<?php
require_once __DIR__.'./common/DB.php';

$sql = "select * from user";

$stmt = DB::getInstance()->connect()->query($sql);
$users = $stmt->fetchAll();
// echo "<pre>";
// var_dump($users);
$data = [];
foreach ($users as $u) {
    $u['ctime'] = date('Y-m-d H:i', $u['create_time']);
array_push($data, $u);}