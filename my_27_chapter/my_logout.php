<?php
require_once('bookmark_fns.php');
session_start();

$old_user = $_SESSION['valid_user'];

do_html_header('Logging out');

usset($_SESSION['valid_user']);
$result_dest = session_destroy();

if(!empty($old_user)){
	if($result_dest){
		echo "Logged out.<br/>";
		do_html_url('login.php','Login');
	}else{
		echo "你无法退出登录、";
	}

}else{
	echo "你没有登录，所以无法退出";
	do_html_url('login.php', 'Login');
}
do_html_footer();

?>