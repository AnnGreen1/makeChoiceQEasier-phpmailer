<?php
require_once './common/DB.php';
/*
server_dotest要实现的功能，
根据传过来的test_name，
按顺序从test表中取出题目的id，再根据题目的id从question表中取出题干和选项
将题干和选项返回前端，要用到Ajax
*/

// echo $_REQUEST['test_name'];

// $testname =  $_REQUEST['test_name'];

// $sqlSelectid = "select id from test where test_name = '$testname'";

// echo $sqlSelectid;

// $stmtSelectid =DB::getInstance()->connect()->query($sqlSelectid );


/*
要实现的功能
根据传过来的id查找题目返回即可
*/
