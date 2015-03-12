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

<span style="color: red"><?=$errorMsg?></span>
<form action="login.php" method="post">
	<input type="password" name="password" /><br />
	<input type="submit" />
</form>