<?php
	
	include 'serverConn.php';
	
	
	$info = $_POST['id'];
	
	$infos = explode("|", $info);
		
	$map = $infos[0];
	$rt = $infos[1];
	$nr = $infos[2];
	$pr = $infos[3];
	$cin = $infos[4];
	$cout = $infos[5];
	$chain = $infos[6];
	$idd = $infos[7];
	
	$q = "delete from reservation_master
			where reservationid = '$idd'";
			
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
	
	echo 'Reservation Cancelled Succefully.'
	
	

?>