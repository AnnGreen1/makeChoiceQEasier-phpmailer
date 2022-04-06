<?php
// 登录拦截
session_start();
if (empty($_SESSION['username'])) {
  // 找不到session中的用户名，说明用户是没有登陆过，那么就需要弹窗提醒，并跳转到登录页面
  echo "<script>alert('请先登录！');location.href='../view/login.php'</script>";
}
?>

<?php
require_once "../server/common/DB.php";
$test_name = $_REQUEST['test_name'];
$sqlselctquestionid = "select question_id from test where test_name='$test_name'";
//echo $sqlselctquestionid;
$stmtQuestionId = DB::getInstance()->connect()->query($sqlselctquestionid);


$rows = $stmtQuestionId->fetchAll();
$data = [];
foreach ($rows as $row) {

    array_push($data, $row);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>makeChoiceQEasier-测试</title>
    <link rel="stylesheet" href="../utils/layui/css/layui.css">
    <link rel="icon" href="../utils/headlogo_right.png">
</head>

<body>


    <div style="height:60px;position: fixed;top: 0;left: 0;right: 0;background-color: rgb(139, 176, 205);">
        <span style="font-size:30px;font-family:Microsoft YaHei;color:white;"><?php echo $test_name ?></span>
        <button class="layui-btn  layui-btn-lg" style="float:right;margin:8px 5px 8px 0px;"><a href="./showtestresult.php?testname=<?php echo $test_name ?>">提交</a></button>
    </div>

    <div style="position:fixed;top:100px;left:50px;border-style:solid;border-color:rgb(139, 176, 205);width:220px;height:auto;">
        <!--这次的思路
    把题目的id直接就放在页面上，编上号
    用span标签
    上来就取第一个span标签的值
    用ready函数，通过第一个id配合ajax展示题目
    -->

    <!--这个是放题目的序号的，要隐藏起来-->
        <div style="height:30px;width:auto;display:none" id="fdiv">
            <?php
            $i = 1;
            foreach ($data as $qid) {


                echo "<div id='$i' style='width:10px;height:10px;border-style:solid;'>{$qid['question_id']}</div>";
                $i++;
            }
            ?>
        </div>



        <div style="position:fixed;top:100px;left:400px;width:800px;height:500px;">
            <div>

                <div id="questioncontent">



                    <form class="layui-form" action="../server/dotest_judge.php?testname=<?php echo $test_name ?>" target="frameName">
                        <div class="layui-form-item">
                            <!-- <label class="layui-form-label">单选框</label> -->
                            <!--这个是放测试名的，要隐藏起来-->
                                <input type="hidden" name="testname" value=<?php echo $test_name ?>>
                            <div id="" style="margin:10px;">
                            <!--这个是放题目的id的，要隐藏起来-->
                                <input class='layui-input' type='hidden' id='nowquestionidinput' value='' name='qid' style='width:20px;height:20px;'>
                                <!-- <span id="nowquestionid"></span> -->
                                <span id="stem" style="font-size:large;"></span>
                            </div>
                            <div style="float:left;">
                                <div>
                                    <input type="radio" name="answer" value="a" title="">
                                    <!-- <div style="float:none" id="answer_a"></div> -->
                                    <span id="answer_a" style="font-size:large;"></span>
                                </div>
                                <div>
                                    <input type="radio" name="answer" value="b" title="">
                                    <!-- <div style="float:none" id="answer_b"></div> -->
                                    <span id="answer_b" style="font-size:large;"></span>
                                </div>
                                <div>
                                    <input type="radio" name="answer" value="c" title="">
                                    <!-- <div style="float:none" id="answer_c"></div> -->
                                    <span id="answer_c" style="font-size:large;"></span>
                                </div>
                                <div>
                                    <input type="radio" name="answer" value="d" title="">
                                    <!-- <div style="float:none" id="answer_d"></div> -->
                                    <span id="answer_d" style="font-size:large;"></span>
                                </div>
                            </div>
                        </div>
                        <button  class="layui-btn" onclick="lastquestion()">上一题</button>
                        <button  class="layui-btn" onclick="nextquestion()">下一题</button>
                    </form>
                    <iframe scr="" frameborder="0" name="frameName"></iframe>
                </div>
            </div>
        </div>


        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.6.0.min.js"></script>

        <script>
            var fdiv = document.getElementById("fdiv");
            var div_s=fdiv.getElementsByTagName("div");

            var qid=[];
            //var urlGetquestion = "http://localhost/allPHPcode/makeChoiceQEasier/backend/server/common_ability/ajax_returnquestion_byid.php";
            var urlGetquestion = "../server/common_ability/ajax_returnquestion_byid.php";



            $(document).ready(
                function() {



                    /**
                     * 现在要做的事情
                     * 1，把span标签里的值取出来装进数组，留着ajax请求时用
                     * 2，点击下一题就取当前题目序号（值）的下一个值，反之亦然
                     */
                    for (var i = 1; i <=div_s.length; i++) {
                        //var span = document.getElementById("i");
                        //var spant=span.innerHTML;
                        //alert(spant);
                        var j = i.toString();
                        console.log(j);
                       
                        console.log($("#"+j).text());
                        qid[i-1]=$("#"+j).text();
                    }


                    for(var j=0;j<qid.length;j++)
                    {
                        console.log(qid[j]);
                    }


                    //第一次获取题目的方法，与接下来获取题目时不一样的
                    //获取题目的路径，绝对路径之后肯定是要改的

                    var spanid = document.getElementById("1");
                    console.log(spanid.value); //会输出给题号的顺序1,2,3所对应的再数据库中实际的题目的id



                    




                    $.ajax({
                        url: urlGetquestion,
                        dataType: 'JSON',
                        data: {
                            id: qid[0]
                        },
                        success: function(res) {
                            console.log(res);
                            console.log(res.stem);
                            //$('#nowquestionid').attr("value",res.id);
                             $('#nowquestionidinput').val(res.id);
                            $('#stem').text(res.stem);
                            $('#answer_a').text(res.answer_a);
                            $('#answer_a').val(res.answer_a);
                            $('#answer_b').text(res.answer_b);
                            $('#answer_b').val(res.answer_b);
                            $('#answer_c').text(res.answer_c);
                            $('#answer_c').val(res.answer_c);
                            $('#answer_d').text(res.answer_d);
                            $('#answer_d').val(res.answer_d);
                        },
                        error: function(res) {
                            console.log(res);
                        }
                    })
                }
            );

            var nowqid=$("#"+1).text();


            function setnowqid(now)
            {
                nowqid = now;
            }

            function nextquestion()
            {



                if(nowqid==qid[qid.length-1])
                    {
                        alert("没有更多了");
                        console.log("nowqid  "+qid[qid.length-1]);
                        //setnowqid(qid[qid.length-1]);
                        return;
                    }


                //下一题函数
                //通过nowqid在数组中的位置，找nowid下一个
                console.log('执行了');
                var nextid;
                for(var i=0;i<qid.length;i++)
                {
                    if(nowqid==qid[i])
                    {
                        nextid = qid[i+1];
                        $.ajax({
                        url: urlGetquestion,
                        dataType: 'JSON',
                        data: {
                            id: qid[i+1]
                        },
                        success: function(res) {
                            console.log(res);
                            console.log(res.stem);
                            //$('#nowquestionid').attr("value",res.id);
                            //$('#nowquestionid').text(res.id);
                            $('#nowquestionidinput').val(res.id);
                            $('#stem').text(res.stem);
                            $('#answer_a').text(res.answer_a);
                            $('#answer_a').val(res.answer_a);
                            $('#answer_b').text(res.answer_b);
                            $('answer_b').val(res.answer_b);
                            $('#answer_c').text(res.answer_c);
                            $('#answer_c').val(res.answer_c);
                            $('#answer_d').text(res.answer_d);
                            $('#answer_d').val(res.answer_d);
                        },
                        error: function(res) {
                            console.log(res);
                        }
                    })
                    }
                }
                setnowqid(nextid);
            }
            function lastquestion()
            {
                if(nowqid==qid[0])
                    {
                        alert("没有更多了");
                        console.log("nowqid  "+qid[0]);
                        return;
                    }
                console.log('执行了');
                var lastid;
                for(var i=0;i<qid.length;i++)
                {
                    if(nowqid==qid[i])
                    {
                        lastid = qid[i-1];
                        $.ajax({
                        url: urlGetquestion,
                        dataType: 'JSON',
                        data: {
                            id: qid[i-1]
                        },
                        success: function(res) {
                            console.log(res);
                            console.log(res.stem);
                            //$('#nowquestionid').attr("value",res.id);
                            //$('#nowquestionid').text(res.id);
                            $('#nowquestionidinput').val(res.id);
                            $('#stem').text(res.stem);
                            $('#answer_a').text(res.answer_a);
                            $('#answer_a').val(res.answer_a);
                            $('#answer_b').text(res.answer_b);
                            $('answer_b').val(res.answer_b);
                            $('#answer_c').text(res.answer_c);
                            $('#answer_c').val(res.answer_c);
                            $('#answer_d').text(res.answer_d);
                            $('#answer_d').val(res.answer_d);
                        },
                        error: function(res) {
                            console.log(res);
                        }
                    })
                   
                    }
                    // if(nowqid==qid[0])
                    // {
                    //     alert("没有更多了");
                    // }
                }
                setnowqid(lastid);
            }
        </script>


        <script>
            //var spanid = document.getElementById('1');
        </script>





        <script src="../utils/layui/layui.js"></script>
</body>

</html>