<?php
  // We can include this file in all our files
  // this way, every file will contain all our functions and exceptions
//   header("Content-type:text/html; charset=GBK");
  require_once('data_valid_fns.php'); //加载函数验证数据的有效性
  require_once('db_fns.php');//加载连接数据库函数
  require_once('user_auth_fns.php'); //加载用户的  注册，登录，数据有效验证，忘记密码等等函数
  require_once('output_fns.php'); //加载显示网页的各个部分的函数
  require_once('url_fns.php'); //加载url相关所有函数
?>
