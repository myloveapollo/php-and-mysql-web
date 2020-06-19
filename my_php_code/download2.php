<?php

echo "<button>
    <a href = \"http://localhost?f='php_exercise'\">
    下载文件
	</button>";
?>


<?php

$down = $_GET['f'];   //获取文件参数
print_r($down);
// $filename = $down.'.zip'; //获取文件名称
// $dir ="down/";  //相对于网站根目录的下载目录路径
// $down_host = $_SERVER['HTTP_HOST'].'/'; //当前域名
// print_r($down_host);


//判断如果文件存在,则跳转到下载路径
// if(file_exists(__DIR__.'/'.$dir.$filename)){
//     header('location:http://'.$down_host.$dir.$filename);
// }else{
//     header('HTTP/1.1 404 Not Found');
// }

?>
