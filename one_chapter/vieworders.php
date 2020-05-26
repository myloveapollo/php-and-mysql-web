<?php
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT']
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bob's Auto Parts</title>
</head>
<body>
	<h1>Bob's Auto Parts</h1>
	<h2>customer orders</h2>
	<?php
		// readfile("$DOCUMENT_ROOT/php_exercise/one_chapter/orders/orders.txt");


		@$fp = fopen("$DOCUMENT_ROOT/php_exercise/one_chapter/orders/orders.txt", 'rb');
		//如果没有订单，就显示如下文字
		if(!$fp){
			echo "<p><strong>No orders pending. Please try again later.</strong></p>";
			exit;
		}
		//如果有订单需要将orders.txt文件里面的文字提出来显示在HTML页面中
		while(!feof($fp)){
			$order = fgets($fp, 999);//获取文件内容
			echo $order."<br/>";
		}
		fclose($fp);//关闭文件
		unlink("$DOCUMENT_ROOT/php_exercise/one_chapter/orders/orders.txt");
	?>
</body>
</html>