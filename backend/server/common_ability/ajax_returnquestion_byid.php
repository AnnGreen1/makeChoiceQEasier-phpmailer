<?php
//var_dump(__DIR__);
$root_file = substr(__DIR__, 0, -57);
//var_dump($root_file);
require_once $root_file . 'makeChoiceQEasier-phpmailer\backend\server\common\DB.php';

$id = $_GET['id'];
$sqlReturnOnequestionbyid = "select id,stem,answer_a,answer_b,answer_c,answer_d from question where id = '$id'";

$stmtReturnOnequestionbyid = DB::getInstance()->connect()->query($sqlReturnOnequestionbyid);
$onequestion = $stmtReturnOnequestionbyid->fetch();

$question = [];
foreach ($onequestion as $q) {
    array_push($question, $q);
}


/**
 * json encode需要用关联数组，但是这个是索引数组，要把索引数组转为关联数组
 */
$questionS = array(
    "id" => "",
    "stem" => "",
    "answer_a" => "",
    "answer_b" => "",
    "answer_c" => "",
    "answer_d" => ""
);

$questionS['id'] = $question[0];
$questionS['stem'] = $question[1];
$questionS['answer_a'] = $question[2];
$questionS['answer_b'] = $question[3];
$questionS['answer_c'] = $question[4];
$questionS['answer_d'] = $question[5];

exit(json_encode($questionS));



// //var_dump(__DIR__);
// $root_file = substr(__DIR__, 0, -47);
// //var_dump($root_file);
// require_once $root_file . 'makeChoiceQEasier\backend\server\common\DB.php';


// $id = $_GET['id'];

// $sqlReturnOnequestionbyid = "select * from question where id = '$id'";

// //echo $sqlReturnOnequestionbyid;

// $stmtReturnOnequestionbyid = DB::getInstance()->connect()->query($sqlReturnOnequestionbyid);

// $onequestion = $stmtReturnOnequestionbyid->fetch();

// $question=[];
// foreach($onequestion as $q)
// {
//     array_push($question,$q);
// }
// echo "<pre>";
// var_dump($question);
// var_dump($question[3]);

// $stem = $question[3];


// //return $question;

// return $stem;










// echo "<pre>";
// var_dump($question);
// var_dump($question[3]);


    //var_dump($questionS);





// $stem = $question[3];
// echo $stem;


//return $question;


/*

$question是一个数组，但是如果要想让前端用这个数据，必需返回json
php数组转json的方法也就是   json_encode()
json_encode(参数是数组)
*/

// $questionJson =  json_encode($questionS);
//return $questionJson;

// var_dump($questionJson);