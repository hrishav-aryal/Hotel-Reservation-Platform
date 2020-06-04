<?php 
	session_start();
	include 'serverConn.php';
	include 'accroomavail.php';
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
    
    <body style="background-color:#EC0763;">
        
        <header class="header_area" style="background-color: white;">     
            <div class="header_bottom">
                <div class="container">
                    <div class="main_header">
                        <div class="row">
                            <div class="col-md-3 col-sm-2">
                                <div class="logo">
                                   <a href="index2.php"><img src="img/tuliplogo.png" alt="Site Logo" style="width:100px;height:72px;"></a>                       
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-10 nav_area">
                                <nav class="main_menu">
                                    <div class="navbar-collapse collapse"> 
                                        <ul class="nav navbar-nav navbar-right">
                                            <li><a href="index.php">Main Page</a></li>
                                            <li><a href="index2.php">Home</a></li>
                                            <li><a href="Accommodation2.php">Accomodation</a></li>
                                            <li><a href="Location&ContactUs2.php">ContactUs</a></li>
											
											<?php
												if(!isset($_SESSION['uname'])){
													echo '<li><a href="login.php?camefrom=index2">Login</a></li>';
													echo '<li><a href="Reservation2.php">Reservation</a></li>';
													echo '<li><a href="tulipadminlogin.php">Administrator</a></li>';
												}else{
													echo '<li><a href="myreservations.php?camefrom=tulip">My Reservations</a></li>';
													echo '<li><a href="Reservation2.php">Reservation</a></li>';
													echo '<li><a href="date.php">Logout</a></li>';
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

           <section class="breadcrumb_area">
            <div class="container">

                <div class="back_nav">
                    <div class="col-sm-5">
                        <h2>accommodation</h2>
                    </div>
                    <div class="col-sm-7">
                        <ul class="text_a_r" style="text-align: right;">
                            <li><a href="index.php">Home</a></li>
                            <li>Accommodation</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="roomArea">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="shead">
                            <h1>Our Favourite Rooms</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                   
                    <div class="all_rooms">
                       
                        <div class="col-md-4 col-sm-6">
                            <div class="single_room_item">
                                <div class="room_photo" >
                                    <img src="img/banner.jpg" alt="" width="350" height="250">
                                    <div class="room-title">
                                        <h3>Cheap Room</h3>
                                    </div>
                                    
                                </div>
                                <div class="room_title">
                                    <h2>Start From $<?php pullroomprice('Tulip', 'Cheap', $_SESSION['mapaddr'], $conn) ?> / Night</h2>
									
									
									<?php 
										$ch = runquery('Tulip', 'Cheap', $_SESSION['mapaddr'], $conn);
										
										echo $ch;
										if($_SESSION['displaybutton']){
											echo "<button class='accbook' id='Cheap' onclick='fromaccomtoreser(this.id)'>Book now</button>";
										}										
									?>
									
                                </div>
                               
                            </div>
                        </div>
                        <!-- Single Room Item End -->
                        
                        <!-- Single Room Item Start -->
                        <div class="col-md-4 col-sm-6">
                            <div class="single_room_item">
                                <div class="room_photo">
                                    <img src="img/familyRoom.jpg" alt=""  width="350" height="250">
                                    <div class="room-title">
                                        <h3>Standard Room</h3>
                                    </div>
                                    
                                </div>
                                <div class="room_title">
                                    <h2>Start From $<?php pullroomprice('Tulip', 'Standard', $_SESSION['mapaddr'], $conn) ?> / Night</h2>
									
									<?php 
										$ch = runquery('Tulip', 'Standard', $_SESSION['mapaddr'], $conn);
										
										echo $ch;
										if($_SESSION['displaybutton']){
											echo "<button class='accbook' id='Standard' onclick='fromaccomtoreser(this.id)'>Book now</button>";
										}										
									?>
                                </div>
                               
                            </div>
                        </div>
                        <!-- Single Room Item End -->
                        
                        <!-- Single Room Item Start -->
                        <div class="col-md-4 col-sm-6 col-md-offset-0 col-sm-offset-3">
                            <div class="single_room_item">
                                <div class="room_photo">
                                    <img src="img/facilities.jpg" alt=""  width="350" height="250">
                                    <div class="room-title">
                                        <h3>Deluxe Room</h3>
                                    </div>
                                    
                                </div>
                                <div class="room_title">
                                    <h2>Start From $<?php pullroomprice('Tulip', 'Deluxe', $_SESSION['mapaddr'], $conn) ?> / Night</h2>
									
									<?php 
										$ch = runquery('Tulip', 'Deluxe', $_SESSION['mapaddr'], $conn);
										
										echo $ch;
										if($_SESSION['displaybutton']){
											echo "<button class='accbook' id='Deluxe' onclick='fromaccomtoreser(this.id)'>Book now</button>";
										}										
									?>
									
                                </div>
                                
                            </div>
                        </div>
                        <!-- Single Room Item End -->
                        
                    </div>
                    <!--====| All Rooms End |====-->
                    
                </div>
                  <div id='hawaspan'>
				
				</div>
            </div>
        </section>
        	
        </div>

        <footer class="footer_area">
            
            <div class="footer_bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <p>© 2020 Tulip Hotel. All rights reserved</p>
                        </div>
                        <div class="col-sm-8">
                            <nav class="footer_menu">
                                <ul>
                                   <li><a href="index.php">Main Page</a></li>
                                            <li><a href="index2.php">Home</a></li>
                                            <li><a href="Accommodation2.php">Accomodation</a></li>
                                            <li><a href="Location&ContactUs2.php">ContactUs</a></li>
											
											<?php
												if(!isset($_SESSION['uname'])){
													echo '<li><a href="login.php?camefrom=index2">Login</a></li>';
													echo '<li><a href="Reservation2.php">Reservation</a></li>';
													echo '<li><a href="tulipadminlogin.php">Administrator</a></li>';
												}else{
													echo '<li><a href="myreservations.php?camefrom=tulip">My Reservations</a></li>';
													echo '<li><a href="Reservation2.php">Reservation</a></li>';
													echo '<li><a href="date.php">Logout</a></li>';
												}
													
											?>
											
											
                                </ul>
                            </nav>
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
		
		 function fromaccomtoreser(rt){
			 
			 $.post('setsessionfrobooking.php',{roomtype:rt}, function(data){
				 window.open("Reservation2.php", "_self");
			 });
			
			 
		 }
		
		</script>
		
    </body>
</html>