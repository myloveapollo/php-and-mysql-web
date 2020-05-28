<?php
// 不同名的文件上传
	header("Content-type:text/html;charset=utf-8");
	echo "<pre/>";
//需要的是上传文件的数组信息
	foreach ($_FILES as $file){
		// print_r($file);
		if(is_uploaded_file($file['tmp_name'])){
			//因为move_upload_file能返回一个bool值，所有可以用if判断
			if(move_uploaded_file($file['tmp_name'], "uploads/".$file['name'])){
				echo "文件保存成功！";
			}else{
				echo "文件保存失败！";
			}
		}else{
			echo "上传失败！";
		}
	}