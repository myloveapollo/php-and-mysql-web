<?php
require_once('bookmark_fns.php');
session_start();

$username = $_POST['username'];
$passwd = $_POST['password'];

if($username && $passwd){
	try{
		login($username, $passwd);
		$_SESSION['valid_user'] = $username;
	}
	catch(Exception $e){
		do_html_header('Problem');
		echo "你无法登陆！";
		do_html_url('login.php', 'Login');
		do_html_footer();
		exit;
	}
}

do_html_header('Home');
check_valid_user();

if($url_array = get_user_urls($_SESSION['valid_user'])){
	display_user_urls($url_array);
}

display_user_menu();
do_html_footer();

?>
