<?php
	session_start();
	include 'serverConn.php';
	
	$info = $_POST['map'];
	
	$_SESSION['mapaddrbutton'] = $info;
	

?>