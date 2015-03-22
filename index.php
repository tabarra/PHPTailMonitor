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
	<div id="navbar-container">
            <nav id="navbar-section">
                <ul id="navbar-left-list" class="navbar-list">
                    <li class="navbar-item navbar-title">
                        <h3>PHPTailMonitor</h3>
                    </li>
                    <li class="navbar-item">
                        <a id="AutoScroll" class="nav-button nav-button-blue" href="#">Disable AutoScroll</a>
                    </li>
                    <li class="navbar-item">
                        <a id="disable" class="nav-button nav-button-blue" href="#">Stop</a>
                    </li>
                    <li class="navbar-item">
                        <a id="Clear" class="nav-button nav-button-blue" href="#">Clear Log</a>
                    </li>
                </ul>
                <ul id="navbar-right-list" class="navbar-list">
                    <li class="navbar-item">
                        <a class="nav-button nav-button-red" href="login.php?logout">Logout</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div id="container-content"></div>
	<div id="scrollLock"></div>
    </body>
</html>
