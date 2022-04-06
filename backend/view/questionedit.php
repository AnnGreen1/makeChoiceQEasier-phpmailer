<?php
// 登录拦截
session_start();
if (empty($_SESSION['username'])) {
  // 找不到session中的用户名，说明用户是没有登陆过，那么就需要弹窗提醒，并跳转到登录页面
  echo "<script>alert('请先登录！');location.href='../view/login.php'</script>";
}
?>
<?php
require_once "../server/common/connect.php";

//获取题目信息
$id = $_REQUEST["id"];
$sql = "select * from question where id='$id'";
$stmt = $pdo->query($sql);
$question = $stmt->fetch();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>makeChoiceQEasier-编辑题目</title>
    <link rel="stylesheet" href="../utils/layui/css/layui.css">
    <link rel="icon" href="../utils/headlogo_right.png">
    <style>
        #titlediv {
            margin-bottom: 15px;
        }

        #container {
            padding: 20px;
        }

        #show-img {
            width: 150px;
            height: 150px;
            margin-top: 15px;
        }
    </style>

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

<body class="layui-layout-body">
    <div class="layui-layout layui-layout-admin">
        <?php
        require_once './commom/nav.php';
        ?>
        <?php
            require_once '../server/common/DB.php';
            $sqlSelectQuestionType = "select distinct type from question";
            $stmtQuestionType = DB::getInstance()->connect()->query($sqlSelectQuestionType);
            //var_dump($stmtQuestionType);
            $rows = $stmtQuestionType->fetchAll(PDO::FETCH_ASSOC);
            $Type = [];
            foreach($rows as $row)
            {
                $contact = array(
                    "type" => $row["type"]
                );
                array_push($Type,$contact);
            }
            //echo "<pre>";
            //print_r($Type);//二维关联数组
            //print_r($Type[0]['type']);
        ?>
        <div class="layui-body">
            <div id="container">
                <div id="titlediv" class="layui-fluid">
                    <h2>编辑题目</h2>
                </div>
                <form class="layui-form" action="../server/server_questionedit.php" method="post" enctype="multipart/form-data">
                    <!-- 隐藏域，用来存储题目id的 -->
                    <input class="layui-input" type="hidden" name="id" value="<?php echo $id; ?>">


                    <div class="layui-form-item" style="width:500px;">
                        <label class="layui-form-label">类型</label>
                        <div class="layui-input-block">
                            <select name="type" lay-verify="required">
                                <?php
                                for ($i = 0; $i < count($Type, 0); $i++) 
                                {
                                    if($question['type']==$Type[$i]['type'])
                                    {
                                        echo "<option value='{$Type[$i]['type']}' selected='selected'>{$Type[$i]['type']}</option>";
                                    }
                                    else
                                    {
                                        echo "<option value='{$Type[$i]['type']}'>{$Type[$i]['type']}</option>";
                                    }
                                }
                                ?>
                                <!-- <option value="1">上海</option>
                                <option value="2">广州</option>
                                <option value="3">深圳</option>
                                <option value="4">杭州</option> -->
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">题干</label>
                        <div class="layui-input-inline">
                            <textarea name="stem" placeholder="请输入内容" class="layui-textarea" style="width:500px"><?php echo $question['stem'] ?></textarea>
                        </div>
                        <label class="layui-form-label">正确选项</label>
                        <div class="layui-input-inline">
                            <textarea name="right_key" placeholder="请输入内容" class="layui-textarea" style="width:500px"><?php echo $question['right_key'] ?></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">选项1</label>
                        <div class="layui-input-inline">
                            <textarea name="answer_a" placeholder="请输入内容" class="layui-textarea" style="width:500px"><?php echo $question['answer_a'] ?></textarea>
                        </div>

                        <label class="layui-form-label">选项2</label>
                        <div class="layui-input-inline">
                            <textarea name="answer_b" placeholder="请输入内容" class="layui-textarea" style="width:500px"><?php echo $question['answer_b'] ?></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">选项3</label>
                        <div class="layui-input-inline">
                            <textarea name="answer_c" placeholder="请输入内容" class="layui-textarea" style="width:500px"><?php echo $question['answer_c'] ?></textarea>
                        </div>
                        <label class="layui-form-label">选项4</label>
                        <div class="layui-input-inline">
                            <textarea name="answer_d" placeholder="请输入内容" class="layui-textarea" style="width:500px"><?php echo $question['answer_d'] ?></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">难度</label>
                        <div class="layui-input-block">
                            <input type="radio" name="difficulty" value="1" title="1" <?php if($question['difficulty']==1) echo "checked='checked'" ?>>
                            <input type="radio" name="difficulty" value="2" title="2" <?php if($question['difficulty']==2) echo "checked='checked'" ?>>
                            <input type="radio" name="difficulty" value="3" title="3" <?php if($question['difficulty']==3) echo "checked='checked'" ?>>
                            <input type="radio" name="difficulty" value="4" title="4" <?php if($question['difficulty']==4) echo "checked='checked'" ?>>
                            <input type="radio" name="difficulty" value="5" title="5" <?php if($question['difficulty']==5) echo "checked='checked'" ?>>
                            <input type="radio" name="difficulty" value="" title="6" disabled>
                            <label>tips:1-5依次难度增加</label>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">可见</label>
                        <div class="layui-input-block">
                            <input type="radio" name="open" value="0" title="私有" value="自己的" <?php if($question['open']==0) echo "checked='checked'" ?>>
                            <input type="radio" name="open" value="1" title="公有" value="公共的" <?php if($question['open']==1) echo "checked='checked'" ?>>
                        </div>
                    </div>




                    <div class="layui-form-item" style="margin-top:50px;">
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

    <script src="../utils/jquery/jquery-3.6.0.min.js"></script>
    <script src="../utils/layui/layui.js"></script>
</body>

</html>