<?php
function db_connect(){
	$result = new mysqli('localhost', 'bm_user', 'password', 'bookmarks');

	if(!$result){
		throw new Exception("不能连接到数据库");
	}else{
		return $result;
	}
}

?>