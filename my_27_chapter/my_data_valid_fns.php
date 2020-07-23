<?php
function filled_out($form_var){
	foreach ($form_var as $key => $value) {
		if(!(isset($key)) || ($value == "")){
			return false;
		}

		return true;
	}
}

function valid_email($address){
	if(preg_match('/^[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/i', $address)){
		return ture;
	}else{
		return false;
	}
}
?>