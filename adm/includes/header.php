<?php
	include("config.php");
	include("class/class.login.php");
	$login = new Login();
	$login->loginTest();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Radio</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/jquery.ui.datepicker.css" />
<link rel="stylesheet" type="text/css" href="css/jquery.ui.theme.css" />
<link rel="stylesheet" type="text/css" href="css/jquery.ui.core.css" />

</head>

<body>
<div id="page">
	<div id="header">
            
    	<a href="index.php">Radio</a>
    </div>
    <div id="headerMenu">
    	<div id="congratualtion">
            <ul>
                <li><a href="index.php">Schedule</a></li>
                <li><a href="archive.php">Archive</a></li>
            </ul>
        </div>
    	<ul>
        	<li><a href="password.php">Password</a></li>
            <li><a href="email.php">Email</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div id="contentSidebar">
