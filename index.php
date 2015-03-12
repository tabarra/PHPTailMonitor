<?php
    include 'config.php';
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
        <a href="login.php?logout">Logout</a>
    </div>

	<div id="tailLog"></div>
	<div id="scrollLock"></div>
    <script src="res/functions.js"></script>
</body>
</html>