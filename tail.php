<?php
$filename = 'access.log';
//session_start();session_destroy();die;

if (isset($_GET['ajax'])) {
	session_start();

	if(!file_exists($filename)) {
		if(empty($_SESSION['error'])){
			echo "erro\r\n";
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
			echo "truncado\r\n";
			$_SESSION['offset'] = 0;
		}
		if($_SESSION['offset'] < $fsize) {
			$data = stream_get_contents($handle, -1, $_SESSION['offset']);
			echo nl2br($data);
			$_SESSION['offset'] = ftell($handle);
		}
	}else{
        echo "Starting - $filename<br>";
		fseek($handle, 0, SEEK_END);
		$_SESSION['offset'] = ftell($handle);
	}

	die;
}
?>
<!doctype html>
<html lang="en">
<head>
	<title>Log</title>
	<style>
		@import url(http://fonts.googleapis.com/css?family=Ubuntu);
		body{
			background-color: black;
			color: white;
			font-family: 'Ubuntu', sans-serif;
			font-size: 16px;
			line-height: 20px;
            width: 100%;
		}
		#tailLog {
			position: relative;
			padding-top: 34px;
		}
		#scrollLock{
			width:2px;
			height: 2px;
			overflow:visible;
		}
        .header {
            width: 100%;
            position: fixed;
            top: 0;
            bottom: auto;
            background-color: #ccc;
        }
        #hl {
            background: rgba(255,230,0,0.5);
            border-radius: 3px;
        }
	</style>
  <meta charset="UTF-8">
  <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
  <script src="http://creativecouple.github.com/jquery-timing/jquery-timing.min.js"></script>
  <script>
  $(function() {
    $.repeat(1000, function() {
      $.get('tail.php?ajax', function(data) {
        $('#tailLog').append(data);
        $(window).scrollTop($('#scrollLock').offset().top);
        stickIt();
      });
    });
  });



  </script>
</head>
<body>
    <div class="header">Header2</div>

	<div id="tailLog"><span id="hl">text here</span></div>
	<div id="scrollLock"></div>
</body>
</html>