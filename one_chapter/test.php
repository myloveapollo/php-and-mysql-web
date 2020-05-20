<!DOCTYPE html>
<html>
<body>

<?php
	$num = 1999.9;
	$formattedNum = number_format($num)."<br>";

	echo $formattedNum;
	$formattedNum = number_format($num, 2, '-','~');
	echo $formattedNum;
?>

</body>
</html>