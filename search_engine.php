<?php 
	session_start();
	include 'serverConn.php';
	
?>


<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>
        
        <!-- Google/Custom font -->
        <link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
        

        <!-- Bootstrap css -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="map.css">
		<link rel="stylesheet" href="map.css">
        
        <!-- Font awesome css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">

        <!-- Favicons -->
        <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png">
        <link rel="shortcut icon" type="image/png" href="img/favi-con.png"/>  
    </head>
    
    <body style="background-color:#ffbf00;">
        
        <header class="header_area" style="background-color: white;">     
            <div class="header_bottom">
                <div class="container">
                    <div class="main_header">
                        <div class="row">
                            <div class="col-md-3 col-sm-2">
                                <div class="logo">
                                    <a href="index.php"><img src="img/flowerhotel.png" alt="Site Logo"></a>                     
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-10 nav_area">
                                <nav class="main_menu">
                                    <div class="navbar-collapse collapse"> 
                                        <ul class="nav navbar-nav navbar-right">
										
											<?php
												
												
												if(!isset($_SESSION['uname'])){
													echo '<li><a href="search_engine.php">Find Hotels</a></li>
														<li><a href="index.php">Home</a></li>
														<li><a href="login.php?camefrom=searchEngine">Login</a></li>';
												}else{
													echo '<li><a href="myreservations.php?camefrom=index">My Reservations</a></li>
														<li><a href="search_engine.php">Find Hotels</a></li>
														<li><a href="index.php">Home</a></li>
														  <li><a href="date.php">Logout</a></li>';
												}
											
											?>
                                            
                                        </ul>
                                    </div>
                                </nav>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </header>
        
        <div class="container" style="background-color: white;padding:0;">

   <section class="about_us_area section-padding">
     
	 <p id='crdatese'>Current Date(YYYY-MM-DD):<b> <?php echo $_SESSION['currentdate'];?><b></p>
			
	<div id='search_head'>
		
		<form action='' name='seform' method='post'>
		
			<div id='search_head1'>
		
				<div>
					<label for= 'hotelchain' id='schain'>Hotel Chain<label>
					<select class='custom-select' name='hotelchain' onchange='this.form.submit()'>
						<option value='any' <?php echo (isset($_POST['hotelchain']) && $_POST['hotelchain'] == 'any') ? 'selected="selected"':'' ;?>>Any</option>
						<option value='Lotus' <?php echo (isset($_POST['hotelchain']) && $_POST['hotelchain'] == 'Lotus') ? 'selected="selected"':'' ;?> >Hotel Lotus</option>
						<option value='Tulip' <?php echo (isset($_POST['hotelchain']) && $_POST['hotelchain'] == 'Tulip') ? 'selected="selected"':'' ;?>>Hotel Tulip</option>
						<option value='Orchid' <?php echo (isset($_POST['hotelchain']) && $_POST['hotelchain'] == 'Orchid') ? 'selected="selected"':'' ;?>>Hotel Orchid</option>
					</select>
				</div>
				
				<div>
					<label for='mapaddress' id='l1'>Map<label>
					<select class='custom-select' name='mapaddress'>
						
						<option value="any" <?php echo (!isset($_POST['mappair']) )? 'selected="selected"':'' ;?>>Any location </option>
							
							<?php
								$query = '';
								
								if(isset($_POST['hotelchain']) && $_POST['hotelchain'] != 'any'){
									
									 $query = "select * from hotel_master 
												where chain = '$_POST[hotelchain]' 
												and roomtype = 'Standard'";
									
								}else{
									$query = "select * from hotel_master 
												where roomtype = 'Standard'";
								}
								
										
								$result = mysqli_query($conn, $query);
								
								while($rows = mysqli_fetch_assoc($result)){
									
									if((isset($_POST['mapaddress']) && $_POST['mapaddress'] == $rows['map'])) {
										echo "<option value='$rows[map]' selected>$rows[map]</option>";
									}else{
										echo "<option value='$rows[map]'>$rows[map]</option>";
									}
								}
							
							
							?>
					
					
						
					
					</select>
				</div>
				
				<div>
					<label for='roomtype' id='l1'>Room Type<label>
					<select class='custom-select' name='roomtype'>
						<option value='any' <?php echo (isset($_POST['roomtype']) && $_POST['roomtype'] == 'any') ? 'selected="selected"':'' ;?>>Any</option>
						<option value='Suite' <?php echo (isset($_POST['roomtype']) && $_POST['roomtype'] == 'Suite') ? 'selected="selected"':'' ;?>>Suite</option>
						<option value='Deluxe' <?php echo (isset($_POST['roomtype']) && $_POST['roomtype'] == 'Deluxe') ? 'selected="selected"':'' ;?>>Deluxe</option>
						<option value='Standard' <?php echo (isset($_POST['roomtype']) && $_POST['roomtype'] == 'Standard') ? 'selected="selected"':'' ;?>>Standard</option>
					</select>
				</div>
				
				<div>
					<label for='pricerange' id='l1'>Price Range<label>
					<select class='custom-select' name='pricerange'>
						<option value='any' <?php echo (isset($_POST['pricerange']) && $_POST['pricerange'] == 'any') ? 'selected="selected"':'' ;?>>Any</option>
						<option value='<200' <?php echo (isset($_POST['pricerange']) && $_POST['pricerange'] == '<200') ? 'selected="selected"':'' ;?>>200 and less</option>
						<option value='200-500' <?php echo (isset($_POST['pricerange']) && $_POST['pricerange'] == '200-500') ? 'selected="selected"':'' ;?>>200 to 500</option>
						<option value='500-1000' <?php echo (isset($_POST['pricerange']) && $_POST['pricerange'] == '500-1000') ? 'selected="selected"':'' ;?>>500 to 1000</option>
						<option value='>1000' <?php echo (isset($_POST['pricerange']) && $_POST['pricerange'] == '>1000') ? 'selected="selected"':'' ;?>>1000 and above</option>
					</select>
				</div>
				
				
				
				<div id='checkdate'>
					<label id=''>Check-In:</label>
					<input type="date" id="start" name="checkin" value="<?php echo (isset($_POST['checkin'])) ? $_POST['checkin'] : date('Y-m-d'); ?>" />  
					
					<label id="l1">Check-Out:</label>
					<input type="date" id="numrooms" name="checkout" value="<?php echo (isset($_POST['checkout'])) ? $_POST['checkout'] : date('Y-m-d'); ?>" />
					
					<label id='l1'>Number of room/suite</label>
					 <select id='numrooms' name='roomnumber'>
						 <option value="1" <?php echo (isset($_POST['roomnumber']) && $_POST['roomnumber'] == '1') ? 'selected="selected"':'' ;?>> 1 </option>
						 <option value="2" <?php echo (isset($_POST['roomnumber']) && $_POST['roomnumber'] == '2') ? 'selected="selected"':'' ;?>> 2 </option>
						 <option value="3" <?php echo (isset($_POST['roomnumber']) && $_POST['roomnumber'] == '3') ? 'selected="selected"':'' ;?>> 3 </option>
						 <option value="4" <?php echo (isset($_POST['roomnumber']) && $_POST['roomnumber'] == '4') ? 'selected="selected"':'' ;?>> 4 </option>
						 <option value="5" <?php echo (isset($_POST['roomnumber']) && $_POST['roomnumber'] == '5') ? 'selected="selected"':'' ;?>> 5 </option>
						 <option value="6" <?php echo (isset($_POST['roomnumber']) && $_POST['roomnumber'] == '6') ? 'selected="selected"':'' ;?>> 6 </option>
						 <option value="7" <?php echo (isset($_POST['roomnumber']) && $_POST['roomnumber'] == '7') ? 'selected="selected"':'' ;?>> 7 </option>
					 </select>
				
				</div>
				
				<div><input type='submit' id="search" value='Search' name='submit'></div>
				
				
				<div id='sort'>
				<input type='submit' id="srate" value='Sort by Rates' name='sortbyprice'>
				<input type='submit' id="sname" value='Sort by Names' name='sortbyname'>
				
				<p id='errormsg'></p>
				</div>
			</div>
				
			
			<br>
			
			
		</form>
	</div>
	
	<div id='cancelreser'>
		<p>Want to cancel any of your reservations? Go to 
			
			<?php 
				if(isset($_SESSION['uname'])){
					echo "<a href='myreservations.php'>My Reservations</a>.";
				}else{
					echo "<a href='login.php?camefrom=myreservations'>My Reservations</a>. Must login to cancel reservation through this page. 
								<a href='login.php?camefrom=searchEngine'>Login Here.</a>";
				}				
			
			?>
			
		</p>
	</div>
	
	
	<div id='result'>
	
	
		<?php
			
			$cindate = null;
			$coutdate = null;
			$numrooms = null;
			
			if(isset($_POST['submit']) || isset($_POST['sortbyprice']) || isset($_POST['sortbyname'])){
				
				$cindate = $_POST['checkin'];
				$coutdate = $_POST['checkout'];
				$numrooms = $_POST['roomnumber'];
				
				
				if(isset($_POST['checkout']) && isset($_POST['checkin']) && isset($_POST['roomnumber'])){
					
					if($_POST['checkout'] > $_POST['checkin']){
						
						if(isset($_POST['submit'])){
							$sql = query('');
							display($sql, $conn, $numrooms, $cindate, $coutdate);
						}
						
						if(isset($_POST['sortbyprice'])){
							$sql = query('srate');
							display($sql, $conn, $numrooms, $cindate, $coutdate);
						}
						
						
						if(isset($_POST['sortbyname'])){
							$sql = query('sname');
							display($sql, $conn, $numrooms, $cindate, $coutdate);
						}
					
					}else{
						echo '<script type="text/javascript">'.
						'document.getElementById("errormsg").innerText = "Invalid checking and checkout date";'.
						'</script>';
						
					}
				
				}else{
					echo '<script type="text/javascript">'.
						'document.getElementById("errormsg").innerText = "Please fill out all information";'.
						'</script>';
				}
			}
			
			function query(string $choice){
				$query = '';
				
				$chain = $_POST['hotelchain']; 
				$roomtype = $_POST['roomtype'];
				$pricerange = $_POST['pricerange'];
				$map = $_POST['mapaddress'];
				
				
				$query = "select * from hotel_master ";
				
				if($pricerange == '<200'){$query .= 'where price <= 200 ';}
				else if($pricerange == '200-500'){$query .= 'where price between 201 and 500 ';}
				else if($pricerange == '500-1000'){$query .= 'where price between 500 and 1000 ';}
				else if($pricerange == '>1000'){$query .= 'where price > 1000 ';}
				else{$query .= 'where price >= 0 ';}
				
				
				if($chain != 'any'){$query .= 'and chain = "' . $chain . '"';}
				if($roomtype != 'any'){$query .= ' and roomtype = "' . $roomtype . '"';}
				if($map != 'any'){$query .= ' and map = "' . $map . '"';}
				
				if($choice=='srate'){
					$query .= " order by price asc";
				}
				if($choice=='sname'){
					$query .= " order by chain asc";
				}
				
				return $query;
			}
			
			function display(string $q, object $c, int $numrooms, string $cindate, string $coutdate){
				
				$result = mysqli_query($c, $q);
				
				while($rows = mysqli_fetch_assoc($result)){
					
					echo '<div id="resultblock">';
					echo '<div id="resultImg">';
					echo '<img src="home.jpg"/>';
					echo '</div>';
					
					
					echo '<div id="resultdesc">';
					
					echo '<h3>HOTEL '.strtoupper($rows["chain"]).'</h3>';
					echo '<p>Address: <span id="resulttext">'.$rows["map"].'</span></p>';
					echo '<p>RoomType: <span id="resulttext">'.$rows["roomtype"].'</span></p>';
					echo '<p>Price: USD <span id="resulttext">'.$rows["price"].'</span></p>';
					echo '<p>Number of rooms available:  <span id="resulttext">'.$rows["numberofrooms"].'</span></p>';
					
					$thisid = $rows["map"].'|'.$rows["roomtype"].'|'.$numrooms.'|'.$rows["price"].'|'.$cindate.'|'.$coutdate.'|'.$rows["chain"];
					
					if($rows['numberofrooms']=='0'){
						echo '<p id="'.$thisid.'" class="soldout1"><b>Room already sold out.<p>';
					}else if($numrooms > $rows['numberofrooms']){
						echo '<p id="'.$thisid.'" class="soldout1"><b>Only limited rooms available.<p>';
					
					}else{
						echo '<p id="'.$thisid.'" class="soldout2"><b>Room available! <p>';
						echo '<button class="resultbook" id="'.$rows["map"].'|'.$rows["roomtype"].'|'.$numrooms.'|'.$rows["price"].'|'.$cindate.'|'.$coutdate.'|'.$rows["chain"].'|bookingbutton'.'" onclick="loadreservation(this.id)">Book Now</button>';
					}
					
					
					
					if(isset($_SESSION['uname'])){
						
						$qu = "select * from reservation_master 
								where chain = '$rows[chain]'
								and roomtype = '$rows[roomtype]'
								and address = '$rows[map]'
								and customerid = '$_SESSION[uname]'";
						
						
						$res = mysqli_query($c, $qu);
						$count = mysqli_num_rows($res);
						
						if($count>=1){
							
							$row = mysqli_fetch_assoc($res);
							echo '<p id="roomsbooked"><b>You already have '.$row["numberofrooms"].' rooms booked.<p>';
							echo '<button class="resultcancel" id="'.$rows["map"].'|'.$rows["roomtype"].'|'.$numrooms.'|'.$rows["price"].'|'.$cindate.'|'.$coutdate.'|'.$rows["chain"].'|'.$row["reservationid"].'" onclick="cancelreservation(this.id)">Cancel Reservation</button>';
							echo '<script>document.getElementById("'.$rows["map"].'|'.$rows["roomtype"].'|'.$numrooms.'|'.$rows["price"].'|'.$cindate.'|'.$coutdate.'|'.$rows["chain"].'|bookingbutton'.'").style.display = "none";</script>';
						}
								
					}
					
					
					
					echo '</div>';
					
					echo '</div>';
				}
				
			}
			
		
		?>
	
	</div>
	 
	 
	 
	 
    </section>
        
		
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script>
		
		function loadreservation(rid){
			var x = rid.split("|");
			var y = x[0] + '|' + x[1] + '|' + x[2] + '|' + x[3] + '|' + x[4] + '|' + x[5] + '|' + x[6];
			
			$.post('searchenginebookroom.php',{id:rid}, function(data){
				
				document.getElementById(y).innerHTML = data;
				
			});
			
			
		}
		
		function cancelreservation(rid){
			//document.getElementById(rid).innerHTML = data;
			
			var x = rid.split("|");
			var y = x[0] + '|' + x[1] + '|' + x[2] + '|' + x[3] + '|' + x[4] + '|' + x[5] + '|' + x[6];
			
			$.post('cancelthroughse.php',{id:rid}, function(data){
				
				document.getElementById(y).innerHTML = data;
				
			});
		}
		
		</script>
		
		
		
		

        <footer class="footer_area">
            
            <div class="footer_bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <p>© 2020 Flower Hotel. All rights reserved</p>
                        </div>
                      
                    </div>
                </div>
            </div>
            
        </footer>
		
		
    </body>
</html>