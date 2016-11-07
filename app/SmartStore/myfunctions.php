<?php

function stripUnicode($str){
  	if(!$str) return false;
	$unicode = array(
	     'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
	     'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
	     'd'=>'đ',
	     'D'=>'Đ',
		  'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
		  'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
		  'i'=>'í|ì|ỉ|ĩ|ị',	  
		  'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
	     'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
		  'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
	     'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
		  'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
	     'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
	     'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
	);
	foreach($unicode as $khongdau=>$codau) {
		$arr=explode("|",$codau);
		$str = str_replace($arr,$khongdau,$str);
	}
	return $str;
}
function changeTitle($str){
	$str=trim($str);
	if ($str=="") return "";
	$str =str_replace('"','',$str);
	$str =str_replace("'",'',$str);
	$str = stripUnicode($str);
	$str = mb_convert_case($str,MB_CASE_TITLE,'utf-8');
	
	// MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
	$str = str_replace(' ','-',$str);
	return $str;
}

function setSelect($name, $data, $select=""){
	
	echo "<select class='form-control' name='$name'>";
	foreach ($data as $key => $value) {
		if ($value == $select ) {
			echo "<option value='$value' selected='selected' >$value</option>";
		} else {
			echo "<option value='$value'>$value</option>";
		}	
	}
	echo "</select>";
}

function setCheckBox($name, $data, $str="", $dau=", "){
    $array = explode($dau ,$str);     
	foreach ($data as $key => $value) {
		
			if (in_array($value, $array)) {
				echo "<div class='checkbox'>" .
	                    "<label><input type='checkbox' name='$name' value='$value' checked='true'>$value</label>" .
	                "</div>";
			} else {
				echo "<div class='checkbox'>" .
	                    "<label><input type='checkbox' name='$name' value='$value'>$value</label>" .
	                "</div>";
			}
	    
	}
}

function setRadioButton($name, $data, $check=""){
	foreach ($data as $key => $value) {
		if ($check == $value) {
			echo "<div class='radio'>".
					"<label class='radio-inline'>" .
	                	"<input name='$name' value='$value' checked='' type='radio'>$value".
	              	"</label>".
	              "</div>";
		} else {
			echo "<div class='radio'>".
					"<label class='radio-inline'>" .
	                	"<input name='$name' value='$value' type='radio'>$value".
	              	"</label>".
	              "</div>";
		}
		
		
	}
}



	function getParent($data, $select = 0){
		foreach ($data as $data) {
			$id = $data->id;
			$name = $data->ten;
			if ($select != 0 && $id == $select) {
				echo "<option value='$id' selected='selected'>$name</option>";
			} else {
				echo "<option value='$id'>$name</option>";
			}	
		}
	}

	function getMobileSelect($data, $select = 0){
		foreach ($data as $data) {
			$id = $data->id;
			$name = $data->ten_dt;
			if ($select != 0 && $id == $select) {
				echo "<option value='$id' selected='selected'>$name</option>";
			} else {
				echo "<option value='$id'>$name</option>";
			}	
		}
	}

	function getMobileParent($data, $select = 0){
		foreach ($data as $data) {
			$id = $data->id;
			$name = $data->ten_dt;
			if ($select != 0 && $id == $select) {
				echo "<option value='$id' selected='selected'>$name</option>";
			} else {
				echo "<option value='$id'>$name</option>";
			}	
		}
	}


	function uploadImages($destinationPath, $fileRequest){
		$filename = $fileRequest->getClientOriginalName();
		$path = $fileRequest->move($destinationPath,$filename);
		return $path;
	}

	function getStringFromCheckBox($data,$str,$dau){
		foreach ($data as $item) {
    		$str = $str.$item.$dau;
    	}
    	$str = rtrim($str,$dau);
		return $str;
	}

?>