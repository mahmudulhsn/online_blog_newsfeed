<?php 
	require_once('functions.php');
	session_start();
	session_unset($_SESSION['usernme']);
	session_destroy();
	setcookie('username',NULL,time()-3600);
	redirect('login.php');
 ?>