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
    
    <body>
        
        <header class="header_area" style="background-color: white;">     
            <div class="header_bottom">
                <div class="container">
                    <div class="main_header">
                        <div class="row">
                            <div class="col-md-3 col-sm-2">
                                <div class="logo">
                                    <a href="index.php"><img src="img/logo1.png" alt="Site Logo"></a>                     
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-10 nav_area">
                                <nav class="main_menu">
                                    <div class="navbar-collapse collapse"> 
                                        <ul class="nav navbar-nav navbar-right">
											<li><a href="index.php">Main Page</a></li>
                                            <li><a href="index3.php">Home</a></li>
                                            <li><a href="Accommodation.php">Accommodation</a></li>
                                            <li><a href="Location&ContactUs.php">ContactUs</a></li>
											
											<?php
												if(!isset($_SESSION['uname'])){
													echo '<li><a href="login.php?camefrom=index3">Login</a></li>';
												}else{
													echo '<li><a href="myreservations.php?camefrom=lotus">My Reservations</a></li>';
													echo '<li><a href="date.php">Logout</a></li>';
												}
													
											?>
											
											<?php
												if(!isset($_SESSION['uname'])){
													echo '<li><a href="Reservation.php">Reservation</a></li>';
													echo '<li><a href="lotusadminlogin.php">Administrator</a></li>';
												}else {
													echo '<li><a href="Reservation.php">Reservation</a></li>';
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
				<div id='insdis' class="container" style="background-color: white;margin-top:10px;padding-top:10px;">
					
					
					<h2><b>Instructions to view Room Details and Ways to Book/Cancel Reservations.</b></h2>
					<p><i>** One can view room types and their rates anytime but to book or cancel the reservations, one must sign up or login. </i></p>
					
					<h3><b>Instruction to view Room Details:</b></h3>
					<h4><i><b> 1.	Through hotel webpage:</h4></i></b>
					<span style="margin-left:2em">•	On the top navigation bar, click <b>(Accommodation)</b> tab.
					<br>
					<span style="margin-left:4em">o	The website will display different types of room with their Availability, Types and Rates.
					<br>
					<span style="margin-left:4em">o	If the rooms are available, there is a green button <b>(Book Now)</b>.
					<br>
					<span style="margin-left:4em">o	If it is sold out, it will appear “Rooms already sold out.”
					<br>
					<h4><i><b>2.	Through Search Engine:</h4></i></b>
					<span style="margin-left:2em">•	In the main page on the top navigation bar, click on the button <b>(Find Hotels)</b>.
					<br>
					<span style="margin-left:4em">o	According to your choices, select Hotel Chain, Room Type, # Rooms, Check-in and out Date and click <b>(Search)</b>.
					<br>
					<span style="margin-left:4em">o	The relevant results will be displayed.

					<h3><b>Instruction to Book Rooms: </h3></b>
					<h4><i><b>1.	Through hotel webpage:</h4></i></b>
					<h4>First Way to Book:</h4>
	
					<span style="margin-left:2em">•	On the top navigation bar, click <b>(Accommodation)</b> tab.
					<br>
					<span style="margin-left:4em">o	The website will display different types of room with their Availability, Types and Rates.
					<br>
					<span style="margin-left:4em">o	If it is sold out, there is no way to book that room and will appear <i>“Rooms already sold out.”</i>
					<br>
					<span style="margin-left:4em">o	If the rooms are available, you can book clicking a <b>(Book Now)</b> button listed below that room details.
					<br>
					<span style="margin-left:2em">•	 It will direct you to the reservation page. Again, if one is logged in to the hotel page, one can easily book a desired room, 
					<br><span style="margin-left:2em">
					based on the choices of the check-in and check-out date, room type, no. of rooms. 
					<br>
					<span style="margin-left:4em">o	If not, one will be directed to <b>Login/SignUp</b> page in order to make the reservation.
					<br>
					<span style="margin-left:4em">o	The check-in date should be on or after the current date.
					<br>

					<h4>Second Way to Book:</h4>
		
					<span style="margin-left:2em">•	Click on the <b>(Reservation)</b> tab on the top navigation bar to book room of your choice.
					<br>
					<span style="margin-left:2em">•	Fill in the box and click on <b>(Book Now)</b> see the availability of desire rooms.
					<br>
					<span style="margin-left:2em">** Note: <b>Check-in</b> and <b>Check-out</b> date should not be same. 

					<h4><i><b>2.	Through Search Engine:</h4></i></b>
					<div id='tab'>
					•	Get the relevant room choices through the search engine options
					<br>
					•	If the desired rooms are available, you can book simply by clicking a green button <b>(Book Now)</b>.
					<br>
					•	If it is sold out it will appear <i>“Rooms already sold out.”</i>
					</div>

					<h3><b>Instruction to cancel reservation:</h3></b>
					<h4><i><b>1.	Through hotel webpage:</h4></i></b>
					
					<div id='tab'>
					•	One can simply go to <b>(My Reservation)</b> tab on the top navigation bar and see all the booked rooms.
					<br>
					•	Click on <b>(Cancel Booking)</b> button, if you wish to cancel any of your bookings.
					</div>


					<h4><i><b>2.	Through Search Engine:</h4></i></b>
					
					<div id='tab'>
					•	You can get the relevant room choices through the search engine options
					<br>
					•	If you have already booked any of the rooms in the list, you can cancel your booking by clicking on <b>(Cancel Booking)</b> button.
					</div>





					
			
	
				</div>
			</section>
         
        </div>

        <footer class="footer_area">
            
            <div class="footer_bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <p>© 2020 Lotus Hotel. All rights reserved</p>
                        </div>
                        <div class="col-sm-8">
                            <nav class="footer_menu">
                                <ul>
                                    <li><a href="index.php">Main Page</a></li>
                                    <li><a href="index3.php">Home</a></li>
                                    <li><a href="accommodation.php">Accommodation</a></li>
                                    <li><a href="Facilities&Services.php">Facilities</a></li>
                                    <li><a href="Location&ContactUs.php">ContactUs</a></li>
                                    <li><a href="Reservation.php">Reservation</a></li>
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
			function addresschange(){
				var m = document.getElementById('map_id').value;
				
				document.getElementById('addr').innerHTML = 'Address: ' + m;
			
				$.post('sessionmap.php',{map:m}, function(data){});
			}
		
		</script>
		
		
    </body>
</html>