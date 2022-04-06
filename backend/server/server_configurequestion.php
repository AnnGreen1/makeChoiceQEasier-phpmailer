<?php
require_once './common/DB.php';


// var_dump($_SERVER);

//var_dump($_SESSION);
session_start();
// print_r($_SESSION);
// print_r($_SESSION['username']);
$username = $_SESSION['username'];

$test_Name =  $_REQUEST['test_name'];
// echo $test_Name;
// echo "<br>";

$question_Number = $_REQUEST['question_number'];
// echo $question_Number;
// echo "<br>";

$question_Type = $_REQUEST['question_type'];
// echo $question_Type;
// echo "<br>";

$diffculty = $_REQUEST['difficulty'];
// echo $diffculty;
// echo "<br>";

$question_source = $_REQUEST['question_source'];
// echo $question_source;

// echo "<br>";
// echo $_REQUEST['switch'];


//1、根据难度、类型、可见度从question表中选择id，选择出的id是二维数组，
$sqlSelect = "select id from question where type='$question_Type' and difficulty='$diffculty' and open='$question_source' and id in (select id from question)";
$stm = DB::getInstance()->connect()->query($sqlSelect);
// var_dump($stm);

$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
$response = [];
foreach ($rows as $row) {
  $contact = array(
    "id" => $row["id"]
  );
  array_push($response, $contact);
}
// echo "<pre>";
// print_r($response);//二维关联数组

// var_dump($response);
// var_dump($response[0]['id']); //string(1) "1"
// echo $response[0]['id']; //1
// echo '</br>';

//之后再把二维数组转化为一维数组，定义一个数组来存储题目的id
$ids = array();//索引数组
for ($i = 0; $i < count($response, 0); $i++) {
  $ids[$i] = $response[$i]['id'];
  // echo $ids[$i].'</br>';
}




//再随机从id数组中取
$rand_ids = array();

$rand_ids = array_rand($ids, $question_Number);

for ($i = 0; $i < $question_Number; $i++) {
  // echo $rand_ids[$i].'</br>';
}

$time= time();
//之后再把这些信息插入到test表中，前端直接跳转到进行测试页面
for($i=0;$i<$question_Number; $i++)
{
  $sqlInsert = "insert into test values (null,'$test_Name','$username','$rand_ids[$i]','$time')";
  // echo $sqlInsert.'</br>';
  $stm = DB::getInstance()->connect()->query($sqlInsert);
}
//至此去哪不完成，前端直接返回
echo "<script>location.href='../view/configurequestion.php';</script>";





// if(mysqli_num_rows($result) > 0) 
// {
//     $response = [];
//     // 通过 while 循环来遍历结果集，去除其中的数据
//     while($row = mysqli_fetch_array($result)) 
//     {
//       $contact = array
//       (
//         "id" => $row["id"],
//       );
//       array_push($response, $contact);
//     }
//     // echo "<pre>";
//     // print_r($response);
//     var_dump($response);
// }



    // echo "<pre>";
    // print_r($contact);



//3、把题目的id连同其他信息插入test表

//4、根据条件查询test表，用ajax
