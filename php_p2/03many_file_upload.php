<?php
	header("Content-type:text/html;charset=utf-8");
	echo "<pre/>";
	// $file = $_FILES['image'];
	print_r($_FILES['image']);
	// print_r($_FILES);
	if(isset($_FILES['image']['name']) && is_array($_FILES['image']['name'])){
		foreach ($_FILES['image']['name'] as $k => $file ){
			$images[] = array(
				"name" => $file,
				"tmp_name" => $_FILES['image']['tmp_name'][$k],
				"type" => $_FILES['image']['type'][$k],
				"error" => $_FILES['image']['error'][$k],
				"size" => $_FILES['image']['size'][$k],
			);

			//一定要注意用$images[$k]
			if(is_uploaded_file($images[$k]['tmp_name'])){
				if(move_uploaded_file($images[$k]['tmp_name'],"uploads/".$images[$k]['name'])){
					echo "保存成功！";
				}else{
					echo "保存失败！";
				}
			}else{
				echo "上传失败！";
			}
			
		}

	}			
	
	