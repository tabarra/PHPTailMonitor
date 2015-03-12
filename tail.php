<?php
$filename = 'test/access.log';


if (isset($_GET['reset'])){
   session_start();
   session_destroy();
   die;
}

if (isset($_GET['ajax'])) {
	session_start();

	if(!file_exists($filename)) {
		if(empty($_SESSION['error'])){
			echo "<span id=\"hlR\">File not found - $filename</span><br>\r\n";
			$_SESSION['error'] = 1;
		}
		die;
	}else{
		$_SESSION['error'] = 0;
	}

	$handle = fopen($filename, "r");
	$fsize = filesize($filename);

	if(isset($_SESSION['offset'])){
		if($_SESSION['offset'] > $fsize){
            echo "<span id=\"hlY\">File Truncated - $filename</span><br>\r\n";
			$_SESSION['offset'] = 0;
		}
		if($_SESSION['offset'] < $fsize) {
			$data = stream_get_contents($handle, -1, $_SESSION['offset']);
			echo nl2br($data);
			$_SESSION['offset'] = ftell($handle);
		}
	}else{
        echo "<span id=\"hlG\">Starting - $filename</span><br>\r\n";
		fseek($handle, 0, SEEK_END);
		$_SESSION['offset'] = ftell($handle);
	}

	die;
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>PHPTailMonitor</title>
    <meta charset="UTF-8">
    <link href="res/style.css" rel="stylesheet" type="text/css">
    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    <script src="res/jquery-timing.min.js"></script>
</head>
<body>
    <div class="menu">
        <h3>PHPTailMonitor</h3>
        <button id="AutoScroll">Disable AutoScroll</button>
        <button id="disable">Stop</button>
        <button id="Clear">Clear Log</button>
    </div>

	<div id="tailLog"></div>
	<div id="scrollLock"></div>
    <script src="res/functions.js"></script>
</body>
</html>