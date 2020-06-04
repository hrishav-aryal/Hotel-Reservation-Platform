<?php
	session_start();
	include 'serverConn.php';
	
	
	
	$info = $_POST['roomtype'];
	
	$_SESSION['rt'] = $info;
	
	
	

?>