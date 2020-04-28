<?php
Class Json {
	public static function filterInput($data,$allowed_fields){
		for($i=0;$i<count(array_keys($data));$i++)
			if(!in_array(array_keys($data)[$i],$allowed_fields)) unset($data[array_keys($data)[$i]]);
		return $data;
	}
	
	public static function writeJSON($file,$data){
		$h=fopen($file,'w+');
		fwrite($h,is_array($data) ? json_encode($data) : $data);
		fclose($h);
	}
	
	public static function readJSON($file,$index=null){
		$h=fopen($file,'r');
		$output='';
		while(!feof($h)) $output.=fgets($h);
		fclose($h);
		$output=json_decode($output,true);
		return !isset($index) ? $output : (isset($output[$index]) ? $output[$index] : null);
	}
	
	public static function modifyJSON($file,$data,$index){
		$input=readJSON($file);
		$input[$index]=array_merge($input[$index],$data);
		writeJSON($file,$input);
	}
	
	public static function deleteJSON($file,$index){
		$input=readJSON($file);
		unset($input[$index]);
		writeJSON($file,$input);
	}
}