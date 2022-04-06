<?php
session_start();
unset($_SESSION['username']);
echo "<script>alert('退出成功！');location.href='../view/login.php';</script>";
