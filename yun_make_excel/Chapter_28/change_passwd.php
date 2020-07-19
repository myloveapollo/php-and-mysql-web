<?php
  require_once('bookmark_fns.php');
  session_start();
  do_html_header('Changing password');

  // create short variable names
  $old_passwd = $_POST['old_passwd'];
  $new_passwd = $_POST['new_passwd'];
  $new_passwd2 = $_POST['new_passwd2'];

  try {
    check_valid_user();
    if (!filled_out($_POST)) {
      throw new Exception('你的表单没有填写完整！');
    }

    if ($new_passwd != $new_passwd2) {
       throw new Exception('两次输入的密码不一致. 没有该变！');
    }

    if ((strlen($new_passwd) > 16) || (strlen($new_passwd) < 6)) {
       throw new Exception('新密码必须是6-16个字符之间，请重试！.');
    }

    // attempt update
    change_password($_SESSION['valid_user'], $old_passwd, $new_passwd);
    echo 'Password changed.';
  }
  catch (Exception $e) {
    echo $e->getMessage();
  }
  display_user_menu();
  do_html_footer();
?>
