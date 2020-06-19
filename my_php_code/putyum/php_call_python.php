<?php
header("Content-type: text/html; charset=utf-8");
system('python F:\xuhaofeng\togithub\projects_python_excel\forshanghai\code\done2.py',$retval);
if(!$retval){
	echo "制作成功！";
	echo "<input type='button' onclick=\"window.location.href='download.php'\" value='点击下载！'>";
}
?>