<?php
//create a short name for variables
header("Content-type:text/html;charset=utf-8");
@$name = $_POST['name'];
@$password = $_POST['password'];

if((!isset($name)) || (!isset($password))){
	//Vistor needs to enter a name and password
?>	
	<h1>Please Log In</h1>
	<p>This page is secret.</p>
	<form method="post" action="secretdb.php">
		<p>Username: <input type="text" name="name"></p>
		<p>Password: <input type="password" name="password"></p>
		<p><input type="submit" name="submit" value="Log In"></p>
		<p><a href="register.html">注册</a></p>
	</form>
<?php
}else{
	//connect to mysql
	$mysql = mysql_connect("localhost","yuanheng", "hao123com");
	if(!$mysql){
		echo "Cannot connect to database.";
		exit;
	}

	//select the appropriate database
	$selected = mysql_select_db($mysql,"auth");
	if(!$selected){
		echo "Cannot select database.";
		exit;
	}

	//query the database to see if there is a  record which matches
	$query = "select count(*) from authorized_users where name ='".$name. "' and 
				password = '".$password."'";
	$result = mysql_query($query);
	if(!result){
		echo "Cannot run query";
		exit;
	}

	$row = mysql_fetch_row($result);

	$count = $row[0];

	if($count >  0){
		// visitor's name and password combination are correct
		echo "<h1>Here it is</h1>";
	}else{
		//visitor's name and password combination are not correct
		echo "<h1>go away</h1>";
	}
} 
?>