<?php
//create a short name for variables
header("Content-type:text/html;charset=utf-8");
@$name = $_POST['name'];
@$password = $_POST['password'];

if((!isset($name)) || (!isset($password))){
	//Vistor needs to enter a name and password
?>	
	<h3>请登录！</h3>
	<form method="post" action="secretdb.php">
		<table border="0">
			<tr>
				<td>用户名:</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>密码:</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" value="登录"></td>
				<td><a href="register.html">注册</a></td>
				<td><a href="register.html">忘记密码？</a></td>
			</tr>	
		</table>
	</form>
<?php
}else{
	//connect to mysql
	$mysql = mysqli_connect('localhost','webauth', 'webauth');
	if(!$mysql){
		echo "连接数据库失败！";
		exit;
	}

	//select the appropriate database
	$selected = mysqli_select_db($mysql,"auth");
	if(!$selected){
		echo "选择数据库失败！";
		exit;
	}

	//query the database to see if there is a  record which matches
	$query = "select count(*) from authorized_users where name ='".$name. "' and 
				password = '".sha1($password)."'";
	$result = mysqli_query($mysql, $query);
	if(!$result){
		echo "不能运行query语句！";
		exit;
	}

	$row = mysqli_fetch_row($result);

	$count = $row[0];

	if($count >  0){
		// visitor's name and password combination are correct
		header("location:file_upload.html");

	}else{
		//visitor's name and password combination are not correct
		echo "<h1>登录失败，密码错误或者未注册！</h1>";
		header("refresh:3;url='secretdb.php'");
	}
} 
?>