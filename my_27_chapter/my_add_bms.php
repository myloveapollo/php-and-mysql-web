<?php
require_once('bookmarks_fns.php');
session_start();

do_html_header('adding bookmark');
$new_url = $_POST['new_url'];

try{
	check_valid_user();
	if(!filled_out($_POST)){
		throw new Exception("Form not filled");
	}

	if(strstr($new_url, 'r') === false){
		$new_url = 'http://'.$new_url;
		
	}

	if(!(@fopen($new_url, 'r'))){
		throw new Exception("Not a valid URL", 1);
	}

	add_bm($new_url);
	echo "adding URL";

	if($url_array = get_user_urls($_SESSION['valid_user'])){
		display_user_urls($url_array)；
	}
}
catch(Exception $e){
	echo $e->getMessage();
}

display_user_menu();
do_html_footer();

?>

