<?php
// 登录拦截
session_start();
if (empty($_SESSION['username'])) {
  // 找不到session中的用户名，说明用户是没有登陆过，那么就需要弹窗提醒，并跳转到登录页面
  echo "<script>alert('请先登录！');location.href='../view/login.php'</script>";
}
?>
<!--showresult,展示测试结果，只有这一次机会-->
<!--
要的结果，准确判断出每一题的正误
思路，
所选的选项都已经在表中了
1,根据测试名从judege表中按question_id由小到大的顺序查找出最新的（create_time最大的）question_id与answer
2，根据question_id的数组从question表中查找right_key(要按照question_id由小到大的顺序显示)
3，依次比对正确答案与所选答案，并用数组记录每一题的正误
4，展示结果


1，按question_id的顺序


-->

<?php
/*按照题目顺序，逐题比对，一次值比对一题
    用一个数组记录每一题的正误
    算出正确率（要记录正确的题目数量）
    1，找出最新的结果
    */
require_once '../server/common/DB.php';
$testname = $_REQUEST['testname'];

//查询在当前测试里的所有题目的id    
$sqlSelectAllQuestionid = "select question_id from test where test_name = '$testname'";
//echo $sqlSelectAllQuestionid;
$stmtSlectAllQuestionid = DB::getInstance()->connect()->query($sqlSelectAllQuestionid);
$qids = $stmtSlectAllQuestionid->fetchAll();
$dataqids = [];
foreach ($qids as $qid) {
    array_push($dataqids, $qid);
}
// for($i=0;$i<count($dataqids);$i++)
// {
//     echo $dataqids[$i];
// }
//echo "<pre>";
//var_dump($dataqids);
$result = []; //记录结果,1代表正确，0代表错误

for ($i = 0; $i < count($dataqids); $i++) {
    //查询某个确定id的题目选了什么
    $sqlselectformjudge = "select question_id,answer from judge where test_name = '$testname' and question_id = '" . $dataqids[$i]['question_id'] . "' order by create_time desc limit 1";
    //echo $sqlselectformjudge;
    $stmtselectfromjudges = DB::getInstance()->connect()->query($sqlselectformjudge);
    $qidsAndanswerfromjudges = $stmtselectfromjudges->fetch();
    $dataqidsAndanswerfromjudges = [];
    foreach ($qidsAndanswerfromjudges as $qidsAndanswerfromjudge) {
        array_push($dataqidsAndanswerfromjudges, $qidsAndanswerfromjudge);
    }
    //var_dump($dataqidsAndanswerfromjudges);
    //var_dump($dataqidsAndanswerfromjudges[1]);




    //查询某个确定id题目的正确答案
    $sqlselectformquestion = "select id,right_key,answer_" . $dataqidsAndanswerfromjudges[1] . " from question where id = '" . $dataqids[$i]['question_id'] . "'";
    //echo  $sqlselectformquestion;
    $stmtselectfromquestions = DB::getInstance()->connect()->query($sqlselectformquestion);
    $qidsAndanswerfromquestions = $stmtselectfromquestions->fetch();
    $dataqidsAndanswerfromquestions = [];
    foreach ($qidsAndanswerfromquestions as $qidsAndanswerfromquestion) {
        array_push($dataqidsAndanswerfromquestions, $qidsAndanswerfromquestion);
    }
    //var_dump($dataqidsAndanswerfromquestions);
    if ($dataqidsAndanswerfromquestions[1] == $dataqidsAndanswerfromquestions[2]) {
        //echo "该题正确";
        $result[$i] = 1;
    } else {
        //echo "该题错误";
        $result[$i] = 0;
    }
}



//查询某个确定id题目的正确答案
// $sqlselectformquestion = "select id,right_key,answer_" . $dataqidsAndanswerfromjudges[$i] . " from question where id = '" . $dataqids[$i]['question_id'] . "'";
// echo  $sqlselectformquestion;
// $stmtselectfromquestions = DB::getInstance()->connect()->query($sqlselectformquestion);
// $qidsAndanswerfromquestions = $stmtselectfromquestions->fetch();
// $dataqidsAndanswerfromquestions = [];
// foreach ($qidsAndanswerfromquestions as $qidsAndanswerfromquestion) {
//     array_push($dataqidsAndanswerfromquestions, $qidsAndanswerfromquestion);
// }
// var_dump($dataqidsAndanswerfromquestions);
// if ($dataqidsAndanswerfromquestions[1] == $dataqidsAndanswerfromquestions[2]) {
//     echo "该题正确";
// } else {
//     echo "该题错误";
//}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>makeChoiceQEasier-测试结果</title>
    <link rel="stylesheet" href="../utils/layui/css/layui.css">
    <link rel="stylesheet" href="../utils/css/nav.css">
    <link rel="icon" href="../utils/headlogo_right.png">

    <style>
        .layui-layout-admin .layui-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background-color: rgb(139, 176, 205)
        }
    </style>
</head>

<body>




    <?php
    require_once './commom/nav.php';
    ?>
    <div style="margin-top:70px;">
        <div style="margin:auto;width:50%;">
        <div>
        <table class="layui-table">
          <thead>
            <tr>
              <th>题号</th>
              <th>正误</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $t=0;
            for($i=1;$i<count($result)+1;$i++) 
            {
                if($result[$i-1]==1)
                {
                    $t++;
                    echo "
                    <tr>
                      <td>{$i}</td>
                      <td>正确</td>
                    </tr>
                ";
                }
                else
                {
                    echo "
                    <tr>
                      <td>{$i}</td>
                      <td>错误</td>
                    </tr>
                ";
                }
              
            }
            echo "
                   
                      正确率".
                      round($t/count($result),4)*100 . "%"
                   
                ;
            ?>
          </tbody>
        </table>
        </div>
        <label class="layui-label">tips:结果仅展示这一次！</label>
        </div>
    </div>
</body>

</html>