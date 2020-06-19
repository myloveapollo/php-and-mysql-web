<!DOCTYPE html>
<html lang="en">
 <head>
	<meta charset="UTF-8">
	<title>上传中</title>
 </head>
 <body>
  <h1>上传中....</h1>
 <?php
 	header("Content-type:text/html;charset=utf-8");
 	if($_FILES['userfile']['error'] > 0){
		echo '出错';
		switch($_FILES['userfile']['error']){
			case 1:echo "1";
					break;
			case 2: echo "2";
					break;
			case 3: echo "3";
					break;
			case 4: echo "4";
					break;
			case 6:
			case 7:
				echo "sss";
				break;
		}
		exit;
	}

	if($_FILES['userfile']['type'] != 'text/plain'){
		echo '出错！';
		exit;
	}

	$upfile = 'D:\xampp\htdocs\php_exercise\nineteen_chapter\uploads'.$_FILES['userfile']['name'];
	if(is_uploaded_file($_FILES['userfile']['tmp_name']))
	{
		if(!move_uploaded_file($_FILES['userfile']['tmp_name'], $upfile)){
			echo "出错！不能移动文件！";

		}
	}
	else
	{
		echo '出错！';
		echo $_FILES['userfile']['name'];
		exit;
	}

	echo 'file upload successfully';
	$contents = file_get_contents($upfile);

	$contents = strip_tags($contents);
	
	file_put_contents($_FILES['userfile']['name'], $contents);
	//show what was upload
	echo "<p>Preview of uploaded file contents: <br/><hr/>";
	echo nl2br($contents);
	echo '<br/><hr/>';
 ?>
 </body>
</html>
