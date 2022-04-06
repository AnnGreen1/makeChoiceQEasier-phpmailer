<?php
// 登录拦截
session_start();
if (empty($_SESSION['username'])) {
  // 找不到session中的用户名，说明用户是没有登陆过，那么就需要弹窗提醒，并跳转到登录页面
  echo "<script>alert('请先登录！');location.href='../view/login.php'</script>";
}
require_once '../server/server_bloglist.php';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>makeChoiceQEasier-社区</title>
    <link rel="stylesheet" href="../utils/layui/css/layui.css">
    <link rel="stylesheet" href="../utils/css/nav.css">
    <link rel="stylesheet" href="../utils/css/blog.css">
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


    <!--写博客的区域-->
    <div style="position:fixed;top:80px;right:0px;width:400px;height:400px;border-radius:20px;">
        <div style="margin:auto;">
            <div>
                <input type="text" id="title" required lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
            </div>
            <div id='editor'></div>
            <div>
                <!-- <input type="button" value="" class="layui-btn" style="width:400px;"> -->
                <button class="layui-btn" lay-submit lay-filter="formDemo" style="width:400px;" onclick="send()">就这样</button>
            </div>
        </div>
    </div>



    <!--主体内容-->
    <div style="margin-top:70px;">

        <!-- <div style="float:left;width:30%;border-style:solid;"></div> -->
        <div style="margin:auto;width:50%;">


            <!-- 
            <div style="margin:5px 0px 5px 0px;">
                <div style="margin:auto;width:700px;height: auto;border-style:solid;border-color:pink;">
                    <div style="margin:10px;height:50px;border-style:solid;border-color:blueviolet;">
                        <div style="margin: 5px;float:left;">
                            <img src="../server/resource/usericon/anngreen.jpeg" alt="" style="height: 40px;width:40px;border-radius:20px;">
                        </div>
                        <div style="margin: 5px;float:left;">
                            <div style="margin: 2px;">nickname</div>
                            <div style="margin: 2px;">time</div>
                        </div>
                    </div>

                    <div style="margin:10px;padding:5px;height:auto;border-style:solid;border-color:blueviolet;">
                        主体
                        本网讯 为进一步加强思想政治理论课建设质量，认真贯彻落实教育部《高等学校思想政治理论
                        课建设标准（2021年本）》要求，12月22日，学校召开思想政治理论课建设专题研讨会。党委书记
                        汪奇燕，副校长陈跃东，校长助理孙辉、宋小秋，教务处、学生处、人事处、财务处、科技处及马克
                        思主义学院等部门负责人及相关人员出席会议，会议由陈跃东主持。
                        教务处就思想政治理论课建设情况进行汇报，从思政课程开设情况，课堂教学情况，师资结构情况，
                        教学研究与改革情况，校领导及教学督导听课、授课及督教督学情况进行了全面汇报。马克思主义学
                        院就思想政治理论课建设现状和效果进行了全面总结，并提出建设和改进意见。其他参会部门分别就
                        教师的发展、经费的保障、社会实践的融合等补充建设意见。
                    </div>

                    <div style="margin:10px;height:auto;border-style:solid;border-color:blueviolet;">

                        评论
                    </div>

                </div>
            </div> -->

            <!-- 
            <div style="margin:5px 0px 5px 0px;">
                <div style="margin:auto;width:700px;height: auto;border-style:solid;border-color:pink;">
                    <div style="margin:10px;height:50px;border-style:solid;border-color:blueviolet;">
                        <div style="margin: 5px;float:left;">
                            <img src="../server/resource/usericon/anngreen.jpeg" alt="" style="height: 40px;width:40px;border-radius:20px;">
                        </div>
                        <div style="margin: 5px;float:left;">
                            <div style="margin: 2px;">nickname</div>
                            <div style="margin: 2px;">time</div>
                        </div>
                    </div>

                    <div style="margin:10px;padding:5px;height:auto;border-style:solid;border-color:blueviolet;">
                        主体
                        本网讯 为进一步加强思想政治理论课建设质量，认真贯彻落实教育部《高等学校思想政治理论
                        课建设标准（2021年本）》要求，12月22日，学校召开思想政治理论课建设专题研讨会。党委书记
                        汪奇燕，副校长陈跃东，校长助理孙辉、宋小秋，教务处、学生处、人事处、财务处、科技处及马克
                        思主义学院等部门负责人及相关人员出席会议，会议由陈跃东主持。
                        教务处就思想政治理论课建设情况进行汇报，从思政课程开设情况，课堂教学情况，师资结构情况，
                        教学研究与改革情况，校领导及教学督导听课、授课及督教督学情况进行了全面汇报。马克思主义学
                        院就思想政治理论课建设现状和效果进行了全面总结，并提出建设和改进意见。其他参会部门分别就
                        教师的发展、经费的保障、社会实践的融合等补充建设意见。
                    </div>

                    <div style="margin:10px;height:auto;border-style:solid;border-color:blueviolet;">

                        评论
                    </div>

                </div>
            </div> -->


            <!--            
                <div class=\"blogExternal\">
                <div class=\"blogInside\">
                    
                    <div class=\"bloghead\">
                        <div class='blogheadicon'>
                            <img src=\"../MCQEhomepage/photo/anngreen.jpeg" alt="" style='height: 40px;width:40px;border-radius:20px;'>
                        </div>
                        <div class='blogheadinfo'>
                            <div style=\"margin: 2px;\">{$user['nickname']}</div>
                            <div style=\"margin: 2px;\">{$user['time']}</div>
                        </div>
                    </div>
                    
                    <div class=\"blogbody\">
                       
                    </div>
                    
                    <div class=\"blogfootExteral\">
                        <div class=\"layui-collapse\" lay-accordion>
                            <div class=\"layui-colla-item\">
                                <h2 class=\"layui-colla-title\">杜甫</h2>
                                <div class=\"layui-colla-content layui-show\">内容区域</div>
                            </div>
                        </div>
                    </div>
            
                </div>
            </div>
    -->


            <!--第一次写的代码，头像没搞好-->



            <!--第二次写的代码，头像昵称全部可用-->



            <?php
            foreach ($AllBloglist as $user) {
            ?>
                <div class="blogExternal">
                    <div class="blogInside">
                        <!--头部-->
                        <div class="bloghead">
                            <div class="blogheadicon">
                                <img src="../server/resource/usericon/<?php echo $user['icon'] ?>" alt="" style="height: 40px;width:40px;border-radius:20px;">
                            </div>
                            <div class="blogheadinfo">
                                <div style="margin: 2px;"><?php echo $user['username'] ?></div>
                                <div style="margin: 2px;"><?php echo $user['ctime'] ?></div>
                            </div>
                            <div style="float:right">
                                <input class="layui-input" type="hidden" name="id" id="blogid" value="<?php echo $user['id']  ?>">
                                <button type="button" class="layui-btn layui-btn-sm layui-btn-radius layui-btn-danger" onclick="deleteBlog(<?php echo $user['id']  ?>)">删除</button>
                            </div>
                        </div>
                        <!--主体-->
                        <div class="blogbody">
                            <?php echo $user['title'] ?>
                            <?php echo $user['content'] ?>
                        </div>
                        <!--评论-->
                        <div class="blogfootExteral">
                            <div class="layui-collapse" lay-accordion>
                                <div class="layui-colla-item">
                                    <h2 class="layui-colla-title">评论</h2>
                                    <div class="layui-colla-content layui-show">内容区域</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            <?php
            }
            ?>

            <?php
            //require_once './bloglist.php';
            ?>




        </div>
        <!-- <div style="float:left;width:30%;border-style:solid;"></div> -->
    </div>

    <script src="../utils/layui/layui.js" charset="utf-8"></script>
    <!--引入wangeditor的cnd-->
    <script src="https://cdn.jsdelivr.net/npm/wangeditor@latest/dist/wangEditor.min.js"></script>
    <!--引入jquery的cdn-->
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.6.0.min.js"></script>
    <script>
        // //写博客的脚本
        // //var contents="";
        // layui.use(
        //     'layer',
        //     function() {
        //         var $ = layui.jquery,
        //             layer = layui.layer;
        //         //layer.msg('hello');


        //         //触发事件，例如button的onclick()等
        //         var active = {
        //             notice: function() {
        //                 layer.open({
        //                     type: 1 //设置基本层的类型，1代表页面层
        //                         ,
        //                     title: "分享新鲜事..." //true显示标题栏，false不显示标题栏
        //                         ,
        //                     closeBtn: false,
        //                     area: '800px;' //宽高
        //                         ,
        //                     shade: 0.8 //遮罩
        //                         ,
        //                     id: 'LAY_layuipro' //设定一个id，防止重复弹出
        //                         ,
        //                     btn: ['就这样', '我再想想'],
        //                     btnAlign: 'c' //按钮对齐方式
        //                         ,
        //                     moveType: 1 //拖拽模式
        //                         ,
        //                     content: "<?php  ?>",
        //                     success: function(layero) {
        //                         var btn = layero.find('.layui-layer-btn');
        //                         btn.find('.layui-layer-btn0').attr({
        //                             href: 'http://www.layui.com/',
        //                             target: '_blank'
        //                         });
        //                     }
        //                 });

        //             }
        //         };
        //         $('#layerDemo .layui-btn').on('click', function() {
        //             var othis = $(this),
        //                 method = othis.data('method');
        //             active[method] ? active[method].call(this, othis) : '';
        //         });
        //     }
        // );
    </script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/wangeditor@latest/dist/wangEditor.min.js"></script>
    <script type="text/javascript">
        const E = window.wangEditor
        const editor = new E("#editor");
        editor.config.uploadImgServer = '../server/upload_wang.php'
        editor.config.uploadFileName = 'pic'
        // 或者 const editor = new E(document.getElementById('div1'))
        editor.create()



        function send() {
            //先获取input框的内容
            var content = document.getElementById("title");
            console.log(content.value);

            //获取富文本框内容
            var contentEditer = document.getElementById('#editor');
            //console.log(contentEditer.innerHTML);

            var contentE = editor.txt.html()

            console.log(contentE); //这个就是富文本框的内容了，就是把这个标签插入数据库即可

            $.ajax({
                type: 'get',
                url: '../server/writeblog.php',
                data: {
                    'title': content.value,
                    'content': contentE
                },
                dataType: 'json',
                success: function() {
                    alert("插入成功");
                    location.href = '../view/community.php'
                },
                error: function() {
                    alert('发博成功！');
                    location.href = './community.php';
                }
            })
        }


        function deleteBlog(id) {
            //var blog = document.getElementById("blogid");
            console.log(id);
            // 获取弹出框对象
            var layer = layui.layer;
            layer.confirm('确认删除这条博客' +  "？", {
                btn: ["确定", "取消"] // 设置按钮
            }, function(index, ) {
                // 第一个按钮的回调函数
                location.href = "../server/server_blogdelete.php?id=" + id
            }, function(index) {
                // 第二个按钮的回调函数
            })
        }
    </script>
</body>



</body>

</html>