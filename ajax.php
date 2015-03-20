<?php
include 'config.php';


function printData($data){
	$lines = explode("\n", trim($data));
	foreach ($lines as $line) {
		echo applyFilters($line);
	}
}

function applyFilters($data){
	global $json;

	//FilterOut self-caused access log
	if(strpos($data, $_SERVER['REQUEST_URI']) !== false) return '';


	//Apply filterOut
	if(!empty($json['filterOut'])){
		foreach ($json['filterOut'] as $keyword) {
			if(strpos($data, $keyword) !== false) return '';
		}
	}

	//Apply filterIn
	if(!empty($json['filterIn'])){
		foreach ($json['filterIn'] as $keyword) {
			if(strpos($data, $keyword)){
				$filterIn_OK = true;
				break;
			}
		}
		if(empty($filterIn_OK)) return '';
	}

	//Apply highlights
	if(!empty($json['highlight'])){
		foreach ($json['highlight'] as $rules) {
			$start = strpos($data, $rules[2]);
			if($start !== false){
				if($rules[1]){
					$data = "<span id=\"hll\" class=\"$rules[0]\">$data</span>";
				}else{
					$data = implode("<span class=\"$rules[0]\">$rules[2]</span>", explode($rules[2], $data));
				}
			}
		}
	}

	return '<br>'.$data;
}

$json = (file_exists($ffpath) && is_readable($ffpath))
	?json_decode(file_get_contents($ffpath), true)
	: null;



if (isset($_GET['reset'])){
   unset($_SESSION['offset']);
   exit;
}

if (isset($_GET['ajax'])) {

	if(!file_exists($fname) || !is_readable($fname)) {
		if(empty($_SESSION['error'])){
			echo '<br><span id="hll" class="hlR">['.date('r')."]  Failed to read file - $fname</span>";
			$_SESSION['error'] = 1;
		}
		exit;
	}else{
		$_SESSION['error'] = 0;
	}

	$handle = fopen($fname, "r");
	$fsize = filesize($fname);

	if(isset($_SESSION['offset'])){
		if($_SESSION['offset'] > $fsize){
            echo '<br><span id="hll" class="hlY">['.date('r')."]  File Truncated - $fname</span>";
			$_SESSION['offset'] = 0;
		}
		if($_SESSION['offset'] < $fsize) {
			$data = stream_get_contents($handle, -1, $_SESSION['offset']);
			printData($data);
			$_SESSION['offset'] = ftell($handle);
		}
	}else{
        echo '<br><span id="hll" class="hlG">['.date('r')."]  Starting tail - $fname</span>";
		fseek($handle, 0, SEEK_END);
		$_SESSION['offset'] = ftell($handle);
	}

}