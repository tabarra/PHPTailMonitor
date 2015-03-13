<?php
include 'config.php';

$logData = <<<EOT
aaa111uuu
bbb222vvv
ccc333www
ddd444xxx
eee555yyy
fff666zzz
EOT;

function procData($data){
	/*
	explode \n
	foreach line
		line = procLine(trim(line));
	return implode
	*/
}

function parseLine($data){
	#
}

$json = (file_exists($ffpath) && is_readable($ffpath))
	?json_decode(file_get_contents($ffpath), true)
	: null;

var_dump($json);




echo procData($logData);
die;











if (isset($_GET['reset'])){
   unset($_SESSION['offset']);
   exit;
}

if (isset($_GET['ajax'])) {

	if(!file_exists($fname) || !is_readable($fname)) {
		if(empty($_SESSION['error'])){
			echo '<span id="hlR">['.date('r')."]  Failed to read file - $fname</span><br>\r\n";
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
            echo '<span id="hlY">['.date('r')."]  File Truncated - $fname</span><br>\r\n";
			$_SESSION['offset'] = 0;
		}
		if($_SESSION['offset'] < $fsize) {
			$data = stream_get_contents($handle, -1, $_SESSION['offset']);
			echo nl2br($data);
			$_SESSION['offset'] = ftell($handle);
		}
	}else{
        echo '<span id="hlG">['.date('r')."]  Starting tail - $fname</span><br>\r\n";
		fseek($handle, 0, SEEK_END);
		$_SESSION['offset'] = ftell($handle);
	}

}