<?php
	include 'serverConn.php';
	
	
	function runquery(string $chain, string $rt, string $map, object $conn){
		$query = "select * from hotel_master 
			where chain = '$chain'
			and roomtype = '$rt'
			and map = '$map'";


		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		
		if($row['numberofrooms'] == 0){
			$_SESSION['displaybutton'] = false;
			return '<p id="accroomsoldout">Rooms already sold out.</p>';
		}else {
			$_SESSION['displaybutton'] = true;
			return '<p id="accroomavail">Rooms Available.</p>';
		}
	}
	
	function pullroomprice(string $chain, string $rt, string $map, object $conn){
		
		$query = "select * from hotel_master 
			where chain = '$chain'
			and roomtype = '$rt'
			and map = '$map'";


		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		
		echo $row['price']; 
	
	}
	
?>