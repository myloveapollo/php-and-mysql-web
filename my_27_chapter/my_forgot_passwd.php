<?php
require_once('bookmark_fns.php');
do_html_header('Resetting password');

$username = $_POST['username'];

try{
	$password = reset_password($username);
	notify_password($username, $password);
	echo "Your new password has been emailed to you email";
}
catch(Exception $e)
{
	echo $e->getMessage();
	echo "Your";
}

do_html_url('login.php', '登录');
do_html_footer();
?>