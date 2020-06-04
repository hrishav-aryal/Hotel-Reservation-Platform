<?php
	session_start();
	if(!isset($_SESSION['uname'])){
		echo 'Must login first!! Go to <a href="login.php?camefrom=searchEngine">Login Page</a>';
	}else{
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
		
		
		if($cin < $_SESSION['currentdate']){
			echo 'Checking date must be on or after the current date.';
		}else{
			$sql = "insert into reservation_master (customerid,address, roomtype, numberofrooms, price, checkindate, checkoutdate, chain)
			values ('$_SESSION[uname]','$map','$rt','$nr','$pr', '$cin', '$cout', '$chain')";
		
			if(mysqli_query($conn, $sql)){
				
				$query = "select * from hotel_master 
						where chain = '$chain'
						and roomtype = '$rt'
						and map = '$map'";
			
				$result = mysqli_query($conn, $query);
				$row = mysqli_fetch_assoc($result);
				
				
				$q = "update hotel_master 
						set numberofrooms = '$row[numberofrooms]' - '$nr'
						where chain = '$chain'
						and roomtype = '$rt'
						and map = '$map'";
				
				mysqli_query($conn, $q);
			}
			
			
			echo 'Booking Successful!!';
			}
	}
	

?>