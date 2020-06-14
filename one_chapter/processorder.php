<?php
	require_once("file_exception.php");
	//create short variable names;创建变量名称
	$tireqty = $_POST['tireqty'];//获取name为tireqty的值，保存在变量里面
	$oilqty = $_POST['oilqty'];
	$sparkqty = $_POST['sparkqty'];
	$address = $_POST['address'];
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];//服务器根目录 H:/xampp/htdocs
	$date = date("Y-m-d H:i:s");//时间函数格式是20:30 31st March 2018
	$filename = "orders";
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Bob's Auto Parts - Order Results </title>
</head>
<body>
	<h1>Bob's Auto Parts</h1>
	<h2>Order Results</h2>
	<?php
		echo "<p> Order processed at ".date('H:i jS F Y'). "</p>";//print time
		$totalqty = 0;
		$totalqty = $tireqty + $oilqty + $sparkqty;
		echo "Item ordered: ".$totalqty."</br>";


		if($totalqty == 0){
			echo "You did not order anything on the previous page!</br>";
		}else{
			if($tireqty > 0){
				echo $tireqty." tires<br/>";
			}
			if($oilqty > 0){
				echo $oilqty." bottles of oil<br/>";
			}
			if($sparkqty > 0){
				echo $sparkqty." spark plugs<br/>";
			}
		}

		$totalamount = 0.00;
		define('TIREPRICE', 100);//定义常量
		define('OILPRICE',10);
		define('SPARKQTY', 4);
		$totalamount = $tireqty * TIREPRICE
						+ $oilqty * OILPRICE
						+$sparkqty * SPARKQTY;


		$totalamount = number_format($totalamount, 2, '.', ' ');//数字格式，保留2位小数，小数点用点，千分位用空格
		echo "<p>Total of order is $".$totalamount."</p>";
		echo "<p>Address to ship to is: ".$address."</p>";


		$outputstring = $date."\t".$tireqty." tires \t".$oilqty." oil\t".$sparkqty." spark plugs\t\$".$totalamount."\t".$address."\r\n";
		// echo $outputstring."<br/>";
		// echo "$DOCUMENT_ROOT";
		// open file for appending
		// if(file_exists($filename) == false){
		// 	mkdir("$DOCUMENT_ROOT/php_exercise/one_chapter/orders");  //创建文件夹
		// }

		try
		{
			if(!($fp = @fopen("$DOCUMENT_ROOT/php_exercise/one_chapter/orders/orders.txt", 'ab')))
				throw new fileOpenException();

			if(!flock($fp, LOCK_EX))
				throw new fileLockException();
			
			if(!fwrite($fp, $outputstring, strlen($outputstring)))
				throw new fileWriteException();

			flock($fp,LOCK_UN);//LOCK_UN 释放锁定（无论共享或独占) 与上面的flock($fp,LOCK_EX)成对出现的
			fclose($fp);
			echo "<p>Order written</p>";			
				
		}
		// catch(fileOpenException $foe)
		// {	
		// 	echo $foe;
		// 	echo "<p><strong>Orders file could not be opened.
		// 			please contact our webmaster for help.</strong></p>";
		// }
		catch(Exception $e)
		{	
			echo $e;
			echo "<p><strong>Your order could not be processed at this time.
					Please try again later.</strong></p>
					";
		}


		
		// @$fp = fopen("$DOCUMENT_ROOT/php_exercise/one_chapter/orders/orders.txt", 'ab');//打开一个文件或者UPL，‘ab’a参数表示文件指针指向文件末尾，如果文件不存在尝试创建,但是文件夹一定要有的。b绝对是要的，为了移植考虑

		// flock($fp, LOCK_EX);  //LOCK_EX 取得独占锁定（写入的程序)。 防止其他客户同时写入

		// if(!$fp){
		// 	echo "<p><strong> Your order could not be processed at this time. Please try again later .</strong></p></body></html>"; 
		// 	exit;//这里结束了
		// }

		// fwrite($fp, $outputstring, strlen($outputstring));//写入文件（可安全用于二进制文件
		// ;//关闭文件

		// echo "<p> Order written.</p>";
		
	?>

</body>
</html>
<!-- </html> -->