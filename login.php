<?php
	$isLoginPage = true;
	$errorMsg = '';
	include 'config.php';
	

	//Logout
	if(isset($_GET['logout'])){
		
			//Securely destroy session
			$_SESSION = array();
			if (isset($_COOKIE[session_name()])) {
				setcookie(session_name(), '', time()-42000, '/');
			}
			session_destroy();
			header('Location: login.php');
			exit;
	}

	
	//Login
	if(isset($_POST['password'])){
		if($_POST['password'] == $login_pwd) {
			$_SESSION['logged'] = 'yeap'; // I mean... true
			header('Location: index.php');
			exit;
		} else {
			$errorMsg = 'Whoops, wrong password!';
		}
	}
?>

<!doctype html>
    <html lang="en">
    <head>
        <title>PHPTailMonitor</title>
        <meta charset="UTF-8">
        <link href="res/login.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    	<div id="content-container">
    		<div id="authentication-container">
    			<form class="login">
				    <h1 class="login-title">PHP Tail Monitor</h1>
				    <input type="password" class="login-input" placeholder="Password">
				    <input type="submit" value="Enter" class="login-button">
			</form>
    		</div>
    	</div>
    </body>
    </html>
