<?php
// 登录拦截
session_start();
if (empty($_SESSION['username'])) {
  // 找不到session中的用户名，说明用户是没有登陆过，那么就需要弹窗提醒，并跳转到登录页面
  echo "<script>alert('请先登录！');location.href='../view/login.php'</script>";
}
?>
<?php
require_once '../server/server_questionlist.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>makeChoiceQEasier-题库</title>
    <link rel="stylesheet" href="../utils/layui/css/layui.css">
    <link rel="stylesheet" href="../utils/css/nav.css"> 
    <link rel="icon" href="../utils/headlogo_right.png">
    <style>
        .layui-layout-admin .layui-header{position:fixed;top:0;left:0;right:0;background-color:rgb(139, 176, 205)}
    </style> 
</head>
<body>

<?php
require_once './commom/nav.php';
?>
<div style="margin-top:70px;">
      <div>
        <a href="./questionadd.php" class="layui-btn">
          <i class="layui-icon layui-icon-add-circle"></i>
          添加题目
        </a>
        <table class="layui-table" lay-size="sm">
          <thead>
            <tr>
              <th>编号</th>
              <th>类型</th>
              <th>用户</th>
              <th>题干</th>
              <th>选项1</th>
              <th>选项2</th>
              <th>选项3</th>
              <th>选项4</th>
              <th>正确答案</th>
              <th>创建时间</th>
              <th>难度</th>
              <th>是否公开</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
          <?php
            foreach ($data as $question) {
              echo "
                  <tr>
                    <td>{$question['id']}</td>
                    <td>{$question['type']}</td>
                    <td>{$question['username']}</td>
                    <td>{$question['stem']}</td>
                    <td>{$question['answer_a']}</td>
                    <td>{$question['answer_b']}</td>
                    <td>{$question['answer_c']}</td>
                    <td>{$question['answer_d']}</td>
                    <td>{$question['right_key']}</td>
                    <td>{$question['ctime']}</td>
                    <td>{$question['difficulty']}</td>
                    <td>{$question['open']}</td>
                    <td>
                    
                    <a class='layui-btn layui-btn-xs' href=\"./questionedit.php?id={$question['id']}\" style='float:right;'>编辑</a>
                    
                    
                    <button class=\"layui-btn layui-btn-xs layui-btn-danger\" style='float:right;' onclick=\"deletequestion({$question['id']}, '{$question['stem']}')\">删除</button>
                    
                    </td>
                  </tr>
              ";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <script src="../utils/layui/layui.js"></script>
    <script>
    function deletequestion(id, stem) {
      // 获取弹出框对象
      var layer = layui.layer;
      layer.confirm('确认删除' + stem + "？", {
        btn: ["确定", "取消"] // 设置按钮
      }, function (index, ) {
        // 第一个按钮的回调函数
        location.href = "../server/server_questiondelete.php?id=" + id
      }, function (index) {
        // 第二个按钮的回调函数
      })
    }
  </script>
</body>
</html>