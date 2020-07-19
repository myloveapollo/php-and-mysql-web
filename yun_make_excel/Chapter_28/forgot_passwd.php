<?php
  require_once("bookmark_fns.php");
  do_html_header("重置密码");

  // creating short variable name
  $username = $_POST['username'];

  try {
    $password = reset_password($username);
    notify_password($username, $password);
    echo '你的新密码已经发送到你邮箱.<br />';
  }
  catch (Exception $e) {
    echo $e->getMessage();
    echo '你的密码没有被成功设置，请返回再试！.';
  }
  do_html_url('../index.php', '登录');
  do_html_footer();
?>
