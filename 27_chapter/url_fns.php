<?php
	require_once('bookmark_fns.php');
	session_start();

	//create short variable name
	$new_url = $_POST['new_url'];
	do_html_header("Adding bookmarks");

	try{
		check_valid_user();
		if(!filled_out($_POST)){
			throw new Exception("Form not completely filled out.");
		}

		//check URL format
		if (strstr($new_url, 'http://') == false){
			$new_url = 'http://'.$new_url;
		}

		//check URL is valid
		if(!(@fopen($new_url, 'r'))){
			throw new Exception('Not a valid url.');
		}

		//try to add bm
		add_bm($new_url);
		echo "Bookmark added.";

		//get the bookmarks this user has saved
		if($url_array =  get_user_urls($_SESSION['valid_user'])){
			display_user_urls($url_array);
		}

	}
	catch(Exception $e){
		echo $e->getMessage();
	}

	display_user_menu();
	do_html_footer();


	function get_user_urls($username){
		//extract from the database all the URLS this user has stored
		$conn = db_connect();
		$result = $conn->query("select bm_URL
								from bookmark
								where username = '".$username."'");
		
		if(!$result){
			return false;
		}

		//create an array of the URLS
		$url_array = array();
		for($count = 1, $row = $resutl->fetch_row(); ++count()){
			$url_array[$count] = $row[0];
		}

		return $url_array;
	}
?>