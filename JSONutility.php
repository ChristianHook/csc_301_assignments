<?php

function readJSON($file, $index = null) {
	$array=json_decode(file_get_contents($file),true);
	if ($index != null) {
		$array = $array[$index];
	}
	return $array;
}


// modify the record with index i in the JSON file
function modifyJSON($file, $index, $info) {
	$data=readJSON($file);
	if($index > count($data)-1) return false;
	$data[$index]=$info;
	echo '<pre>';
	print_r($data);
	writeAllJSON($file,$data);
	return true;	
}

// delete the record with index i from the JSON file
function deleteJSON($file, $index) {
	$data=readJSON($file);
	if($index > count($data)-1) return false;
	unset($data[$index]);
	echo '<pre>';
	print_r($data);
	writeAllJSON($file, $data);
	return true;
}

function writeAllJSON($file,$data = null){
	$h=fopen($file,'w');
	fwrite($h,json_encode($data));
	fclose($h);
}

function writeJSON($file,$data){
	$array=json_decode(file_get_contents($file),true);
	$array[]=$data;
	writeAllJSON($file,$array);	
}


