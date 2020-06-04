<?php 
	session_start();
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

           <section>
            <div class="container">

                <div class="back_nav">
                    <div class="col-sm-5">
                        <h2>Contact Us</h2>
                    </div>
                    <div class="col-sm-7">
                        <ul class="text_a_r" style="text-align: right;">
                            <li><a href="index.php">Home</a></li>
                            <li>Location and ContactUs</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
         
          <section >
            <div class="container">
                <div class="row">
                   
                    <!--====| Contact Form Start |====-->
                    <div class="col-md-9 col-sm-8">
                        <div class="contact_form1">
                            <h1>Send Us A Message</h1>
                            <p>Whether you’re looking for answers, would like to solve a problem, or just want to let us know how we did, you’ll find many ways to contact us right here.</p>
                            <form action="index.php">
                                <div class="row contact_form">
                                    <div class="col-sm-6">
                                        <label>Your Name <span>*</span></label>
                                        <input type="text">
                                        <label>Your E - Mail <span>*</span></label>
                                        <input type="text">
                                        <label>Your Phone <span>*</span></label>
                                        <input type="text">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Your Phone <span>*</span></label>
                                        <textarea cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div style="    text-align: right;">
                                    <input type="submit" value="Send Message" class="rm_btn">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <div class="contact_details">
                            <h1>Contact Details</h1>
                            <ul>
                                <li>
                                    <div class="col-xs-2  fix_p" style="padding-left:0;padding-right:10px;padding-top:5px;">
                                        <img src="img/icn-call.png">
                                    </div>
                                    <div class="col-md-8 col-xs-10" style="padding-left:0;">
                                        <a href="tel:(123)-456-789">(123)-456-789</a>
                                        <a href="tel:(123)-456-788">(123)-456-788</a>
                                    </div>
                                </li>
                               <li>
                                    <div class="col-xs-2 fix_p" style="padding-left:0;">
                                     <img src="img/icn-loc.png">
                                    </div>
                                    <div class="col-md-8 col-xs-10">
                                       235 W 46th St, New York, NY 10036
                                    </div>
                                </li>
                                <li>
                                    <div class="col-xs-2 fix_p" style="padding-left:0;">
                                      <img src="img/icn-maps.png">
                                    </div>
                                    <div class="col-md-8 col-xs-10">
                                        <a href="Direction.php" style="color:#3C598E;"><strong>Check Our Location</strong></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="col-xs-2 fix_p" style="padding-left:0;">
                                      <img src="img/icn-mail.png">
                                    </div>
                                    <div class="col-md-8 col-xs-10">
                                        <a href="mailto:info.supenprajwal@gmail.com">Info@LotusHotel.Com</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--====| Contact Form End |====-->
                    
                </div>
            </div>
        </section>

        </div>
        <br>

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

        <script src="js/bootstrap.min.js"></script>
        ​<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript">
      
      var map, infoWindow;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 40.759235, lng:73.981732},
          zoom: 15
        });
        infoWindow = new google.maps.InfoWindow;  
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
          var marker = new google.maps.Marker({
          position: pos,
          map: map,
          title: 'Our Location'
        });

        var infowindow = new google.maps.InfoWindow({
          content: marker
        });

            
            infoWindow.open(map,marker);
            infoWindow.setContent('Our Current Location');
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }


      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }

    </script>
    </body>
</html>