<?php
require_once __DIR__ . './common/DB.php';

/**
 * 第一次写的代码，头像没搞好，但是还没注释，在前端也在用，注释即可
 */
$sqlSelctAllblog = "select * from blog";

$stmt = DB::getInstance()->connect()->query($sqlSelctAllblog);
$blogs = $stmt->fetchAll();
// echo "<pre>";
// var_dump($blogs);
$data = [];

foreach ($blogs as $blog) {
    $blog['ctime'] = date('Y-m-d H:i', $blog['create_time']);
    array_push($data, $blog);
}

// var_dump($data);


//根据用户名获取头像和昵称
$sqlgetusernameANDicon = "select user.nickname,user.icon from user,blog where user.username = blog.username";

//$sqlgetusernameANDicon = "select user.nickname,user.icon,blog.* from user,blog,admin where user.username = blog.username or blog.username=admin.username";

$stmtgetusernameANDicon = DB::getInstance()->connect()->query($sqlgetusernameANDicon);
$usernamesANDicons = $stmtgetusernameANDicon->fetchAll();
$usernameANDicon = [];

foreach ($usernamesANDicons as $usernamesANDicon) {
    array_push($usernameANDicon, $usernamesANDicon);
}





/**
 * 第二次写的查询，头像昵称全部可用，是一次把两个表连接查询，一次搞定
 */
//$sqlSelectAllBloglist = "select user.nickname,user.icon,blog.* from user,blog where user.username = blog.username";
$sqlSelectAllBloglist = "(select user.nickname,user.icon,blog.* from user,blog where user.username = blog.username)
union
(select admin.username,admin.icon,blog.* from admin,blog where admin.username = blog.username)
order by create_time desc";



$stmtgetAllBloglist = DB::getInstance()->connect()->query($sqlSelectAllBloglist);
$AllBloglists =  $stmtgetAllBloglist->fetchAll();
$AllBloglist = [];

foreach ($AllBloglists as $Bloglist) {
    $Bloglist['ctime'] = date('Y-m-d H:i', $Bloglist['create_time']);
    array_push($AllBloglist, $Bloglist);
}
