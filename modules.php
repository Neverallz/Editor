<?php
session_start();
	if(isset($_GET['st'])){
		if($_GET['st']=="detail") include('modules/detail.php');
		else if($_GET['st']=="settings") include('modules/settings.php');
		else if($_GET['st']=="home") include('modules/home.php');
		else include('modules/404.php');
	} else include('modules/home.php');
?>
