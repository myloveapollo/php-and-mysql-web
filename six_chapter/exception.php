<?php
	// try {
	// 	throw new Exception("A terrible error has occurred!!!", 55);
		
	// } catch (Exception $e) {
	// 	echo "Exception ".$e->getCode().":".$e->getMessage()."<br />".
	// 	" in ".$e -> getFile()." on line ".$e -> getLine()."<br />" ;
	// 	echo "<br/>";
	// 	echo $e;
		
	// }

	// function sss(){
	// 	echo "<br/>";
	// 	echo func_num_args();
	// }


	class myException extends Exception
	{
		//重载了__toString
		function __toString()
		{
			return "<table border=\"1\">
			<tr>
			<td><strong>Exception ".$this->getCode()."
			</strong>:".$this->getMessage()."<br />"."
			in ".$this->getFile()." on line ".$this->getLine()."
			</td>
			</tr>
			</table><br/>";
			
		}
	}

	try
	{
		throw new myException(" A terrible error has occured",100);
	}
	catch (myException $m)
	{
		echo $m;
	}

?>