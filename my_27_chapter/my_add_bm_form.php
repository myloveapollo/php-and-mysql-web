<?php
require_once('my_bookmark_fns.php');
session_start();
do_html_header('添加标签');
check_valid_user();
display_add_form();
display_user_menu();
do_html_footer();
?>
