<?php
require_once('bookmark_fns.php');
session_start();
do_html_header('deleting bookmarks');

$del_me = $_POST['del_me'];
$valid_user = $_SESSION['valid_user'];

check_valid_user();

if(!filled_out($_POST)){
	echo "没有选择标签";
	display_user_menu();
	do_html_footer();
	exit();
}else{
	if(count($del_me)>0){
		foreach ($del_me as $url) {
			if(delete_bm($valid_user, $url)){
				echo "deleted".htmlspecialchars($url).'<br/>';
			}else{
				echo "Could not delete".htmlspecialchars($url).'<br/>';
			}
		}
	}else{
		echo "没有书签可以删除";
	}
}

if($url_array = get_user_url($valid_user)){
	display_user_url($url_array);
}

display_user_menu();
do_html_footer();
?>