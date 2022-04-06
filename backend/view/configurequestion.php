<?php
// 登录拦截
session_start();
if (empty($_SESSION['username'])) {
  // 找不到session中的用户名，说明用户是没有登陆过，那么就需要弹窗提醒，并跳转到登录页面
  echo "<script>alert('请先登录！');location.href='../view/login.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>makeChoiceQEasier-刷题</title>
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

        #container {
            padding: 20px;
            width: 500px;
        }
    </style>
</head>

<body>

    <?php
    require_once './commom/nav.php';
    ?>
    <?php
    require_once '../server/server_testlist.php';
    ?>
    <?php
    require_once '../server/common/DB.php';
    $sqlSelectQuestionType = "select distinct type from question";
    $stmtQuestionType = DB::getInstance()->connect()->query($sqlSelectQuestionType);
    //var_dump($stmtQuestionType);
    $rows = $stmtQuestionType->fetchAll(PDO::FETCH_ASSOC);
    $Type = [];
    foreach ($rows as $row) {
        $contact = array(
            "type" => $row["type"]
        );
        array_push($Type, $contact);
    }
    //echo "<pre>";
    //print_r($Type);//二维关联数组
    //print_r($Type[0]['type']);
    ?>


    <div style="margin-top:70px;">
        <div style="margin:0px 200px 0px 200px;">
            <div class="layui-tab">
                <ul class="layui-tab-title">
                    <li class="layui-this">配置题目</li>
                    <li>已配测试</li>
                </ul>
                <div class="layui-tab-content" style="height: 100px;">
                    <div class="layui-tab-item layui-show">


                        <div style="margin-top:70px;">
                            <div style="margin-left:250px;">
                                <h1>配置题目页面</h1>
                            </div>


                            <div class="layui-body">
                                <div id="container">
                                    <form class="layui-form" action="../server/server_configurequestion.php">
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">名称</label>
                                            <div class="layui-input-block">
                                                <input type="text" name="test_name" required lay-verify="required" placeholder="测试名不能和已有测试名重复！" autocomplete="off" class="layui-input">
                                                
                                            </div>
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">数量</label>
                                            <div class="layui-input-block">
                                                <input class="layui-input" type="number" name="question_number" required lay-verify="required" placeholder="请输入数量" autocomplete="off">
                                                
                                            </div>
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">类型</label>

                                            <?php
                                            for ($i = 0; $i < count($Type, 0); $i++) {
                                                //echo "<option value='{$Type[$i]['type']}'>{$Type[$i]['type']}</option>";

                                                echo "<input type='radio' name='question_type' title='{$Type[$i]['type']}' value='{$Type[$i]['type']}'>";
                                            }
                                            ?>
                                            <!-- <input type="radio" name="question_type" title="php" value="php">
                                            <input type="radio" name="question_type" title="ch" value="ch">
                                            <input type="radio" name="question_type" title="时政" value="时政"> -->
                                            <input type="radio" name="question_type" title="更多" disabled>
                                        </div>
                                        <div class="layui-form-item" style="width:1000px">
                                            <label class="layui-form-label">难度</label>
                                            <input type="radio" name="difficulty" value="1" title="1">
                                            <input type="radio" name="difficulty" value="2" title="2">
                                            <input type="radio" name="difficulty" value="3" title="3">
                                            <input type="radio" name="difficulty" value="4" title="4">
                                            <input type="radio" name="difficulty" value="5" title="5">
                                            <input type="radio" name="difficulty" value="" title="6" disabled>
                                            <label>tips:1-5依次难度增加</label>
                                        </div>
                                        <!-- <div class="layui-form-item">tips:1-5依次难度增加</div> -->
                                        <div class="layui-form-item" style="width:1000px">
                                            <label class="layui-form-label">来源</label>
                                            <input type="radio" name="question_source" value="0" title="0私有" value="自己的">
                                            <input type="radio" name="question_source" value="1" title="1公开" value="公共的">
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">乱序</label>
                                            <div class="layui-input-block">
                                                <input type="checkbox" name="switch" lay-skin="switch" value="1">
                                            </div>
                                        </div>
                                        <div class="layui-form-item">
                                            <div style="float:left;margin-left:100px;margin-right:100px">
                                                <button class="layui-btn layui-btn-primary layui-btn-sm">取消</button>
                                            </div>
                                            <div style="float:left;margin-left:100px ">
                                                <button class="layui-btn layui-btn-sm">提交</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>


                        </div>


                    </div>
                    <div class="layui-tab-item">
                        <?php
                        require_once './testlist.php';
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>


    



    <script src="../utils/layui/layui.js"></script>
</body>

</html>