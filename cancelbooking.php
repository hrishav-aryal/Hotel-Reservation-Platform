<?php
	
	include 'serverConn.php';
	
	
	$info = $_POST['id'];
	
	$infos = explode("-", $info);
	
	$id = $infos[0];
	$chain = $infos[1];
	$nr = $infos[2];
	$rt = $infos[3];
	$map = $infos[4];
	
	$q = "delete from reservation_master
			where reservationid = '$id'";
			
	mysqli_query($conn, $q);
	
	
	$query = "select * from hotel_master 
				where chain = '$chain'
				and roomtype = '$rt'
				and map = '$map'";
	
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	
	
	$s = "update hotel_master 
			set numberofrooms = '$row[numberofrooms]' + '$nr' 
			where chain = '$chain'
				and roomtype = '$rt' 
				and map = '$map'";
	
	mysqli_query($conn, $s);
	
	

?>