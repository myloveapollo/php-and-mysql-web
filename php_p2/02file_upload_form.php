<?php
	header("Content-type:text/html;charset=utf-8");
	$file  =  $_FILES['image'];
	if(is_uploaded_file($file['tmp_name'])){
		if(move_uploaded_file($file['tmp_name'], 'uploads/'.$file['name'])){
			echo "文件保存成功";
		}else{
			echo "文件保存失败";
		}
	}else{
		echo "上传失败";
	}