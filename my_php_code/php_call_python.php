<?php
header("Content-type: text/html; charset=utf-8");
$output = shell_exec('python F:\xuhaofeng\togithub\projects_python_excel\forshanghai\code\done7.py');
var_dump($output);
// $array = explode(',', $output);

// foreach ($array as $value) {
#echo "\n";
// echo $value;
echo "我是中国人<br>";

?>