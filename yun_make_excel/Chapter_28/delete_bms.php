<?php
  require_once('bookmark_fns.php');
  session_start();

  //create short variable names
  $del_me = $_POST['del_me'];
  $valid_user = $_SESSION['valid_user'];

  do_html_header('ɾ����ǩ');
  check_valid_user();

  if (!filled_out($_POST)) {
    echo '<p>��û��ѡ����Ҫɾ���ı�ǩ.<br/>
          �����ԣ�</p>';
    display_user_menu();
    do_html_footer();
    exit;
  } else {
    if (count($del_me) > 0) {
      foreach($del_me as $url) {
        if (delete_bm($valid_user, $url)) {
          echo '�Ѿ�ɾ�� '.htmlspecialchars($url).'.<br />';
        } else {
          echo '����ɾ�� '.htmlspecialchars($url).'.<br />';
        }
      }
    } else {
      echo 'û�б�ǩ����ɾ��';
    }
  }

  // get the bookmarks this user has saved
  if ($url_array = get_user_urls($valid_user)) {
    display_user_urls($url_array);
  }

  display_user_menu();
  do_html_footer();
?>