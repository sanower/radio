<?php
	session_start();
	include("config.php");
	include("class/class.login.php");
	$login = new Login();	
	if(!empty($_POST['log'])&&$_POST['log']==1) {
		$login->loginProcess();
	}
?>