<?php
	//create short variable names
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password_t = $_POST['password_t'];

	if(!$username || !$password || !$password_t){
		echo "你没有填信息！";
		echo "<a href='register.html'>返回</a>";
		exit;
	}elseif($password != $password_t){
		echo "两次输入的密码不一致！";
		echo "<a href='register.html'>返回</a>";
		exit;
	}
	
	// $test = "ni s w sd't ! ";
	// $test = addslashes($test);
	// echo $test;
	if(!get_magic_quotes_gpc()){
		$username = addslashes($username);
		$password = addslashes($password);
		$password_t = addslashes($password_t);
	}

	@ $db = new mysqli('localhost', 'webauth', 'webauth','auth');
	if(mysqli_connect_errno()){
		echo "错误:不能连接上数据库！";
		exit;
	}

	$query = "insert into authorized_users values 
				('".$username."', '".sha1($password)."')";

	$result = $db->query($query);

	if($result){
		echo $db->affected_rows."信息注册成功！";
	}else{
		echo "注册失败！";
	}

	$db->close();

	echo "<a href='secretdb.php'>返回</a>";
	// header("refresh:3;url='secretdb.php'");

?>
