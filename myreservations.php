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
									
									<?php
									
									if($_GET['camefrom'] =='lotus'){
										echo '<a href="index.php"><img src="img/logo1.png" alt="Site Logo"></a>    ';
									}else if($_GET['camefrom'] =='tulip'){
										echo '<a href="index2.php"><img src="img/tuliplogo.png" alt="Site Logo" style="width:104px;height:72px;"></a> ';
									}else if($_GET['camefrom'] =='orchid'){
										echo ' <a href="index2.php"><img src="img/Orchidlogo.png" alt="Site Logo" style="width:104px;height:72px;"></a>   ';
									}else{
										echo '<a href="index.php"><img src="img/flowerhotel.png" alt="Site Logo"></a>';
									}
									
									?>
								
                                                   
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-10 nav_area">
                                <nav class="main_menu">
                                    <div class="navbar-collapse collapse"> 
                                        <ul class="nav navbar-nav navbar-right">
										
											<?php
											
												if($_GET['camefrom'] =='lotus'){
													
													echo '<li><a href="index.php">Main Page</a></li>
														<li><a href="index3.php">Home</a></li>
														<li><a href="Accommodation.php">Accommodation</a></li>
														<li><a href="Location&ContactUs.php">ContactUs</a></li>';
											
											
														if(!isset($_SESSION['uname'])){
															echo '<li><a href="login.php?camefrom=index3">Login</a></li>';
														}else{
															echo '<li><a href="myreservations.php?camefrom=lotus">My Reservations</a></li>';
															echo '<li><a href="date.php">Logout</a></li>';
														}
													
											
											
														echo  '<li><a href="Reservation.php" style="background-color:#9D00D4;">Reservation</a></li>';
													
												}else if($_GET['camefrom'] =='tulip'){
													
													echo '<li><a href="index.php">Main Page</a></li>
														<li><a href="index2.php">Home</a></li>
														<li><a href="Accommodation2.php">Accommodation</a></li>
														<li><a href="Location&ContactUs2.php">ContactUs</a></li>';
											
											
														if(!isset($_SESSION['uname'])){
															echo '<li><a href="login.php?camefrom=index2">Login</a></li>';
														}else{
															echo '<li><a href="myreservations.php?camefrom=tulip">My Reservations</a></li>';
															echo '<li><a href="date.php">Logout</a></li>';
														}
													
											
											
														echo  '<li><a href="Reservation2.php" style="background-color:#9D00D4;">Reservation</a></li>';
													
													
												}else if($_GET['camefrom'] =='orchid'){
													
													echo '<li><a href="index.php">Main Page</a></li>
														<li><a href="index1.php">Home</a></li>
														<li><a href="Accommodation1.php">Accommodation</a></li>
														<li><a href="Location&ContactUs1.php">ContactUs</a></li>';
											
											
														if(!isset($_SESSION['uname'])){
															echo '<li><a href="login.php?camefrom=index1">Login</a></li>';
														}else{
															echo '<li><a href="myreservations.php?camefrom=orchid">My Reservations</a></li>';
															echo '<li><a href="date.php">Logout</a></li>';
														}
													
											
											
														echo  '<li><a href="Reservation1.php" style="background-color:#9D00D4;">Reservation</a></li>';
													
												}else{
													
													if(!isset($_SESSION['uname'])){
														echo '<li><a href="search_engine.php">Find Hotels</a></li>
															<li><a href="index.php">Home</a></li>
															<li><a href="login.php">Login</a></li>
															 <li><a href="Admin.php">Administrator</a></li>';
													}else{
														echo '<li><a href="myreservations.php?camefrom=index">My Reservations</a></li>
															<li><a href="search_engine.php">Find Hotels</a></li>
															<li><a href="index.php">Home</a></li>
															  <li><a href="date.php">Logout</a></li>';
													}
													
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
     
	 
	 <div class="container" id='' style="background-color: white;margin:10px;padding:20px;">
	 
		<div id='reservationlists'>
			<p id='crdate'>Current Date(YYYY-MM-DD):<b> <?php echo $_SESSION['currentdate'];?></p>
				
				<?php
					
					$query = "select * from reservation_master 
								where customerid = '$_SESSION[uname]' 
								and checkoutdate >= '$_SESSION[currentdate]'";
								
					$result = mysqli_query($conn, $query);
					
					while($rows = mysqli_fetch_assoc($result)){
						
						echo '<div id="reservationblock">';
						
						echo '<div id="reserdesc">';
						
						echo "<h4>Reservation ID: $rows[reservationid]</h4>";
						echo "<p>Chain: <span id='resertext'> Hotel $rows[chain]</span></p>";
						echo "<p>Address: <span id='resertext'>$rows[address]</span></p>";
						echo "<p>RoomType: <span id='resertext'>$rows[roomtype]</span></p>";
						echo "<p>Number of rooms: <span id='resertext'>$rows[numberofrooms]</span></p>";
						echo "<p>Price: USD <span id='resertext'>$rows[price]</span> /night</p>";
						echo "<p>Checkin Date: <span id='resertext'>$rows[checkindate]</span></p>";
						echo "<p>Checkout Date: <span id='resertext'>$rows[checkoutdate]</span></p>";
						echo '</div>';
						echo '<div><button class="resercancel" id='.$rows['reservationid'].'-'.$rows['chain'].'-'.$rows['numberofrooms'] .'-'.$rows['roomtype'] .'-'.$rows['address'] .' onclick="cancelbooking(this.id)">Cancel Booking</button>
								<br></div>';
						echo '<p class="cancelmessage" id="bc'.$rows['reservationid'].'-'.$rows['chain'].'-'.$rows['numberofrooms'] .'-'.$rows['roomtype'] .'-'.$rows['address'] .'"></p>';
						
						echo '</div>';
					}
				
				?>
			</div>
	 
	 
	 </div>
	 
    </section>
        
        <section>
          
			<h3>Please choose either of 3 hotel icon below:</h3><br>
        	<div class="container img-btm" >
        		<div class="row">
                    <a href="index3.php"><img src="img/logo.png" width="330" height="230"></a>
                    <a href="index2.php"><img src="img/tuliplogo.png" width="330" height="230"></a>
                    <a href="index1.php"><img src="img/Orchidlogo.png" width="330" height="230"></a>


        		</div>
        	</div>
        	
        </section>
		
		
		</div>
		
		
		
		

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

        ​​  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script src="https://maps.googleapis.com/maps/api/js"></script>   
        <script src="js/bootstrap.min.js"></script>
		
		<script>
			
			function cancelbooking(rid){
				document.getElementById("bc"+rid).innerHTML = 'Booking Cancelled. Refresh the page to view updated information';
				$.post('cancelbooking.php',{id:rid}, function(data){
					//document.getElementById('rid').innerHTML = 'Booking Cancelled. Refresh the page to view updated information';
				});
			}
		
		</script>
		
		
    </body>
</html>