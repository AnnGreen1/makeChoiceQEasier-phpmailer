<?php
// 登录拦截
session_start();
if (empty($_SESSION['username'])) {
  // 找不到session中的用户名，说明用户是没有登陆过，那么就需要弹窗提醒，并跳转到登录页面
  echo "<script>alert('请先登录！');location.href='../view/login.php'</script>";
}
?>
<?php
require_once '../server/server_userlist.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>makeChoiceQEasier-用户</title>
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
        <a href="./useradd.php" class="layui-btn">
          <i class="layui-icon layui-icon-add-circle"></i>
          添加用户
        </a>
        <table class="layui-table">
          <thead>
            <tr>
              <th>编号</th>
              <th>用户名</th>
              <th>密码</th>
              <th>姓名</th>
              <th>头像</th>
              <th>生日</th>
              <th>做题数量</th>
              <th>加入时间</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
          <?php
            foreach ($data as $user) {
              $img = $user['icon'] ? $user['icon'] : 'default.jpeg';
              echo "
                  <tr>
                    <td>{$user['id']}</td>
                    <td>{$user['username']}</td>
                    <td>{$user['password']}</td>
                    <td>{$user['nickname']}</td>
                    <td>
                    <img src=\"../server/resource/usericon/{$img}\" class=\"layui-img\" alt=\"无法加载头像\">
                    </td>
                    
                    
                    
                    
                    <td>{$user['birthday']}</td>
                    <td>{$user['num']}</td>
                    <td>{$user['ctime']}</td>
                    <td>
                      <a class='layui-btn layui-btn-sm' href=\"./useredit.php?id={$user['id']}\">编辑</a>
                      <button class=\"layui-btn layui-btn-sm layui-btn-danger\" onclick=\"deleteUser({$user['id']}, '{$user['username']}')\">删除</button>
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
    function deleteUser(id, name) {
      // 获取弹出框对象
      var layer = layui.layer;
      layer.confirm('确认删除' + name + "？", {
        btn: ["确定", "取消"] // 设置按钮
      }, function (index, ) {
        // 第一个按钮的回调函数
        location.href = "../server/server_userdelete.php?id=" + id
      }, function (index) {
        // 第二个按钮的回调函数
      })
    }
  </script>
</body>
</html>