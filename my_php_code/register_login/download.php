<?php
header('Content-type:text/html;charset=gbk');

//找出文件夹里所有的文件
function get_allfiles($path, &$files)
{
	if(is_dir($path))
	{	
		$dp = dir($path);
		while ($file=$dp->read()) 
		{
			if($file !=="." && $file !== "..")
			{
				get_allfiles($path."/".$file, $files);
			}
		}
		$dp->close();
	}

	if(is_file($path))
	{	
		$files[] = $path;
	}
}

function get_filenamebydir($dir)
{
	$files = array();
	get_allfiles($dir, $files);
	return $files;
}

$filenames = get_filenamebydir("download/");
// var_dump($filenames);
// var_dump($filenames[0]);

$newfilename = substr(strrchr($filenames[0],'/'),1);
// var_dump($newfilename); 	
// var_dump(file_exists($newfilename));

if(!file_exists($filenames[0]))
{	
	echo "没有表！请先制作";
	sleep(3);
	// header("HTTP/1.1 404 NOT FOUND");
	header("location:make_excel.html");
	exit();
}else{
	$file = fopen($filenames[0], "rb");
	Header("Content-type:application/octet-stream");
	Header("Accept-Ranges:bytes");
	Header("Accept-Length".filesize($filenames[0]));
	Header("Content-Disposition:attachment;filename=".$newfilename);
	echo fread($file, filesize($filenames[0]));
	fclose($file);
	exit();
}

unlink($filenames[0]);





// var_dump(file_exists($filenames[0]));
// foreach ($filenames as $value) {
// 	echo $value, PHP_EOL;
// }


// echo "daozheli";
// // $file_name = 'qiantai.xlsx';
// $file_dir = "./download/";
// $handle = opendir($file_dir);
// var_dump($handle);
// $filename = readdir($handle);
// var_dump($filename);
// while($filename !== false)
// {
// 	if($filename !=="." && $filename !=="..")
// 	{
// 		$files[] = $filename;
// 	}
// }
// closedir($handle);
// foreach ($files as $value) {
// 	echo $value, PHP_EOL;
// }
// $exitornot = file_exists($file_dir.$file_name);
// var_dump($exitornot);
// if(!file_exists($file_dir.$file_name)){
// 	echo "da1";
// 	header('HTTP/1.1 404 NOT FOUND');

// }else{
// 	echo "daozhe";
// 	$file = fopen($file_dir.$file_name,"rb");
// 	Header("Content-type:application/octet-stream");
// 	Header("Accept-Ranges:bytes");
// 	Header("Accept-Length".filesize($file_dir.$file_name));
// 	Header("Content-Disposition:attachment;filename=".$file_name);
// 	echo fread($file, filesize($file_dir,$file_name));
// 	fclose($file);
// 	exit();
// }