<!DOCTYPE html>
<html>
<head>
	<title>Book-O-Rama Search Results</title>
</head>
<body>
	<h1>Book-O-Rama Search Results</h1>
<?php
	//create short variable names
	$searchtype = $_POST['searchtype'];
	$searchterm = trim($_POST['searchterm']);

	if(!$searchtype || !$searchterm){
		echo "You have not entered search details.Please go back and try again.";
		exit;
	}

	if(!get_magic_quotes_gpc()){
		$searchtype = addslashes($searchtype);
		$searchterm = addslashes($searchterm);	
	}
	// var_dump($searchtype);
	// var_dump($searchterm);
	@$db = new mysqli('localhost', 'yuanheng', 'hao123com','books');

	if(mysqli_connect_errno()){
		echo "Error: Could not connect to database. Please try again later.";
		exit;
	}

	$query = "select * from books where ".$searchtype." like '%".$searchterm."%'";

	$result = $db -> query($query);
	var_dump($result);
	echo "<br/>";

	// var_dump($result->field_count());

	$num_result = $result -> num_rows;

	echo "<p>Number of books found:".$num_result."</p>";

	for($i=0; $i<$num_result; $i++){
		$row = $result-> fetch_assoc(); //从结果集中取一行作为关联数组
		var_dump($row);
		echo "<p><strong>".($i+1).". Title: ";
		echo htmlspecialchars(stripslashes($row('title')));//htmlspecialchars(string)把预定义的<>转换成html实体
		echo "</strong><br/>Author:";
		echo stripcslashes($row['author']);
		echo "<br />ISBN:";
		echo stripcslashes($row['isbn']);
		echo "<br />Price:";
		echo stripcslashes($row['price']);
		echo "</p>";
	}

	$result->free();
	$db->close();
?>
</body>
</html>