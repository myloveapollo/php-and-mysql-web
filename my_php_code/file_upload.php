<?php
	
	//PHP文件上传功能封装函数
	header('Content-type:text/html;charset=utf-8');
	/*
	 *实现文件上传（单个）
	 *@param1 array $file,需要上传的文件信息：一维5元素数组（name/tmp_name/error/size/type）
	 *@param2 array $allow_type,允许上传的MIME类型
	 *@param3 string $path，存储路径
	 *@param4 string &$error，如果出现错误的原因
	 *@param5 array $allow_format = array(),允许上传的文件格式
	 *@param6 int $max_size = 20000，允许上传的最大文件大小
	*/

	function upload_single($file, $allow_type, $path, &$error, $allow_format=array(), $max_size=2000000){
		//判断文件是否有效

		if(!is_array($file) || !isset($file['error'])){
			$error = '不是一个有效上传文件';
			return false;
		}

		//判断文件存储路径是否有效
		if(!is_dir($path)){
			$error = '文件存储路径不存在';
			return false;
		}

		//判断文件的上传过程是否出错
		switch ($file['error']) {
			case 1:
			case 2:
				$error = '文件超出服务器大小';
				return false;
			case 3:
				$error = '文件上传过程中出现问题，只上传了部分';
				return false;
			case 4:
				$error = '用户没有选中要上传的文件！';
				return false;
			case 6:
			case 7:
				$error = '文件保存失败！';
				return false;
		}

		//判断MIME类型
		if(!in_array($file['type'],$allow_type)){
			//该文件类型不允许上传
			$error = '当前文件类型不允许上传';
			return false;
		}
		//strrchr截取指定字符最后出现，直到字符该字符末尾。ltrim删除字符开头空白，或指定其他字符
		$ext = ltrim(strrchr($file['name'],'.'),'.');
		// $ext = strrchr($file['name'],'.');

		if(!empty($allow_format) && !in_array($ext, $allow_format)){
			//不允许上传
			$error = '当前文件格式不允许上传';
			return false;
		}

		//判断当前文件大小是否满足当前需求
		if($file['size'] > $max_size){
			$error = '当前上传文件超出大小，最大允许'.$max_size.'字节';
			return false;
		}

		//构造文件名字：类型_
		$fullname = strstr($file['name'], '.',TRUE).'_'.strstr($file['type'],'/',TRUE).'_'.date('Ymd');
		//产生随机字符串
		for($i = 0;$i < 4;$i++){
			$fullname .= chr(mt_rand(65,90));

		}
		$fullname .= '.'.$ext;

		//移动到指定目录,同名文件与站稳
		//构造一个文件名字
		if(!is_uploaded_file($file['tmp_name'])){
			$error = '错误：不是上传文件！';
			return false;
		}

		if(move_uploaded_file($file['tmp_name'], $path.'/'.$fullname)){
			//成功
			return $fullname;
		}else{
			$error = '文件上传失败';
			return false;
		}

	}

	//提供数据
	$file = $_FILES['image'];
	$path = 'uploads';
	$allow_type =  array('image/jpg','image/jpeg','image/gif','image/pjpeg','image/png','application/octet-stream');
	$allow_format = array('jpg','gif','jpeg','png','xlsx');
	$max_size = 8000000;

	if($filename = upload_single($file, $allow_type, $path, $error, $allow_format, $max_size)){
		echo "
				<p1>{$file['name']}上传成功！<p1/><br/>
				<form action='php_call_python.php'>
					<input type='submit' name='btn' value='课表制作'/>
  				</form>
				
			";
	}else{
		echo $error;
	}