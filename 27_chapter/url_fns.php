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
		for($count = 1;$row = $result->fetch_row(); $count++){
			$url_array[$count] = $row[0];
		}

		return $url_array;
	}

	function delete_bm($user, $url){
		//delete one url form database
		$conn = db_connect();

		//delete the bookmarks
		if(!$conn->query("delete from bookmark where
						username='".$user."'and bm_url='".$url."'")){
			throw new Exception('Bookmark could not be deletede');				
		}
	
	return true;
	}

	function recommend_urls($valid_user, $popularity=1){
		//we will provide semi intelligent recommendations to people
		//If they have an URL in common with other users. they may like
		// other URLs that these people like
		$conn = db_connect();
		//find other matching users
		//with an urls the same as you
		//as a simple way of excluding people's private pages;
		//and increasing the chance of recommending appeaing URLS.we
		//specify a minimum popularity level
		//an URLS before we will recommend it
		
		$query = "select bm_URL from bookmark where username in (select distinct(b2.username)
					from bookmark b1, bookmark b2 where b1.username = '".$valid_user."' and b1.username != b2.username
					and b1.bm_URL = b2.bm_URL) and bm_URL not in (select bm_URL from bookmark where username = '".$valid_user."')
					group by bm_url having count(bm_url) >".$popularity;
		
		if(!($result = $conn->query($query))){
			throw new Exception('Could not find any bookmarks to recommend.');
		}

		if($result->num_rows==0){
			throw new Exception('Could not find any bookmarks to recommend.');
		}

		$url = array();
		//build an array of the relevant urls
		for($count = 0; $row=$result->fetch_object();$count++){
			$urls[$count] = $row->bm_URL;
		}

		return $urls;
	}
?>