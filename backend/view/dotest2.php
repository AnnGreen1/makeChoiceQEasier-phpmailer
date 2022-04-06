<!--做测试 dotest-->
<?php
//echo $_REQUEST['test_name'];

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




// $questionid = $stmtQuestionId->fetchAll();
// $data = [];
// foreach($questionid as $u)
// {
//     array_push($data,$u);
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../utils/layui/css/layui.css">
</head>

<body>
    <!--一个问题，还要不要引入导航栏，应该不引入，防止用户进行其他不必要的操作-->



    <!-- <h1>dotest页面---<?php //echo $test_name 
                        ?></h1> -->


    <div style="height:60px;border-style: solid;position: fixed;top: 0;left: 0;right: 0;background-color: rgb(139, 176, 205);">
        <span>dotest页面---<?php echo $test_name ?></span>
    </div>


    <div style="position:fixed;top:100px;left:50px;border-style:solid;border-color:rgb(139, 176, 205);width:220px;height:auto;">

        <?php
        $i = 1;
        foreach ($data as $qid) {


            echo "<div style='width:40px;height:40px;float:left; color:red;border:solid;margin:5px;'><span class='xuhao'>$i</span><input class='layui-input' type=''  id = '$i' value={$qid['question_id']} style='width:20px;height:20px;'></div>";
            $i++;
        }


        ?>



    </div>




    <!--放一个隐藏域，来存储题目的id，根据id查题目-->
    <div style="position:fixed;top:100px;left:400px;border:solid;width:800px;height:500px;">
        <div>

            <div id="questioncontent">



                <form class="layui-form" action="">
                    <div class="layui-form-item">
                        <!-- <label class="layui-form-label">单选框</label> -->

                        <div id="" style="margin:10px;">
                        <!-- <input class='layui-input' type=''  id = 'nowquestionid' value='' style='width:20px;height:20px;'> -->
                            <span id="nowquestionid"></span>
                            <span id="stem" style="font-size:large;"></span>
                        </div>
                        <div style="float:left;">
                            <div>
                                <input type="radio" name="sex" value="女" title="">
                                <!-- <div style="float:none" id="answer_a"></div> -->
                                <span id="answer_a" style="font-size:large;"></span>
                            </div>
                            <div>
                                <input type="radio" name="sex" value="女" title="">
                                <!-- <div style="float:none" id="answer_b"></div> -->
                                <span id="answer_b" style="font-size:large;"></span>
                            </div>
                            <div>
                                <input type="radio" name="sex" value="女" title="">
                                <!-- <div style="float:none" id="answer_c"></div> -->
                                <span id="answer_c" style="font-size:large;"></span>
                            </div>
                            <div>
                                <input type="radio" name="sex" value="女" title="">
                                <!-- <div style="float:none" id="answer_d"></div> -->
                                <span id="answer_d" style="font-size:large;"></span>
                            </div>
                        </div>
                    </div>
                </form>
                <button type="button" class="layui-btn" onclick="lastquestion()">上一题</button>
                <button type="button" class="layui-btn" onclick="nextquestion()">下一题</button>
            </div>
        </div>
    </div>


    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.6.0.min.js"></script>
    <script>
        //这个就是刚加载就执行的函数
        $(document).ready(
            function() {



                //第一次获取题目的方法，与接下来获取题目时不一样的
                //获取题目的路径，绝对路径之后肯定是要改的

                var spanid = document.getElementById('1');
                console.log(spanid.value); //会输出给题号的顺序1,2,3所对应的再数据库中实际的题目的id



                var urlGetquestion = "http://localhost/allPHPcode/makeChoiceQEasier/backend/server/common_ability/ajax_returnquestion_byid.php";




                $.ajax({
                    url: urlGetquestion,
                    dataType: 'JSON',
                    data: {
                        id: spanid.value
                    },
                    success: function(res) {
                        console.log(res);
                        console.log(res.stem);
                        $('#nowquestionid').attr("value",res.id);
                        //$('#nowquestionid').text(res.id);
                        $('#stem').text(res.stem);
                        $('#answer_a').text(res.answer_a);
                        $('#answer_b').text(res.answer_b);
                        $('#answer_c').text(res.answer_c);
                        $('#answer_d').text(res.answer_d);
                    },
                    error: function(res) {
                        console.log(res);
                    }
                })
            }
        );
        //$('#stem').html(data.responseText[3]);




        //最重要的部分來了，就是根据题目的id配合jQuery类湖区题目的内容
    </script>

    

    <script>
    //上一题下一题函数
    /**
     * 不管是上一题还是下一题，要首先知道自己当前是在哪一题
     * 上一题函数和下一题函数都需要这个参数
     */
    function nextquestion()
    {
        // //获取当前题目序号，之后序号加一，获取序号加一的题号
        // //当前题目的序号就放在span标签里
        // var xuhao = document.getElementById('xuhao');
        // //console.log(xuhao);
        // console.log(xuhao.innerHTML);//这个就是当前题目的序号,但是这是一个string，在下一步中string加1相当于拼接1而不是加1，在js中用parseInt()函数把string转int
        // var xuhaoint=parseInt(xuhao.innerHTML);
        // var nextxuhao=xuhaoint+1;//当前题目的序号加一，这就是下一题的序号，这个题目的序号也是这个题号所在的input隐藏域的id
        // console.log(nextxuhao);
        // var nextinput = document.getElementById('nextxuhao');//获取id为下一题目的序号的input隐藏域，隐藏域里放的也就是下一题的题号        
        // var nextqid=nextinput.val;
        // console.log(nextqid);
        // var id=document.getElementById('#nowquestionid');
        // console.log("当前题目的id".id);
        //var nextvalueElement = document.getElementById(id);
        //console.log(nextvalueElement.val());
        var nextinputvalue = $("input[id=nowquestionid]").val();
        console.log(nextinputvalue);//这个就是当前题的题目id

        for(var i=0;i>=0;i++)
        {
            if($("input[id='i']").val()==nextinputvalue)
            {
                console.log('找到了');
                break;
            }
        }
        showQuestionbyid(nextinputvalue);

    }

    function lastquestion()
    {

    }


    </script>

    <script src="../utils/layui/layui.js"></script>
    <script>


function showQuestionbyid(qid)
{
    $.ajax({
            url: 'http://localhost/allPHPcode/makeChoiceQEasier/backend/server/common_ability/ajax_returnquestion_byid.php',
            dataType: 'JSON',
            data: {
                id: qid
            },
            success: function(res) {
                console.log(res);
                console.log(res.stem);
                $("#nowquestionid").text(res.id);
                $('#stem').text(res.stem);
                $('#answer_a').text(res.answer_a);
                $('#answer_b').text(res.answer_b);
                $('#answer_c').text(res.answer_c);
                $('#answer_d').text(res.answer_d);
            },
            error: function(res) {
                console.log(res);
            }
        })
}
        
    </script>
</body>

</html>