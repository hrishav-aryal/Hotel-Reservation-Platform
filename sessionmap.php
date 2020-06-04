<?php
	session_start();
	include 'serverConn.php';
	
	$info = $_POST['map'];
	
	$_SESSION['mapaddr'] = $info;
	$_SESSION['mapaddrbut'] = $_SESSION['mapaddr'];
	unset($_SESSION["mapaddrbutton"]);
	

?>