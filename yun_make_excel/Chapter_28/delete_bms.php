<?php
  require_once('bookmark_fns.php');
  session_start();

  //create short variable names
  $del_me = $_POST['del_me'];
  $valid_user = $_SESSION['valid_user'];

  do_html_header('删除标签');
  check_valid_user();

  if (!filled_out($_POST)) {
    echo '<p>你没有选中需要删除的标签.<br/>
          请重试！</p>';
    display_user_menu();
    do_html_footer();
    exit;
  } else {
    if (count($del_me) > 0) {
      foreach($del_me as $url) {
        if (delete_bm($valid_user, $url)) {
          echo '已经删除 '.htmlspecialchars($url).'.<br />';
        } else {
          echo '不能删除 '.htmlspecialchars($url).'.<br />';
        }
      }
    } else {
      echo '没有标签可以删除';
    }
  }

  // get the bookmarks this user has saved
  if ($url_array = get_user_urls($valid_user)) {
    display_user_urls($url_array);
  }

  display_user_menu();
  do_html_footer();
?>