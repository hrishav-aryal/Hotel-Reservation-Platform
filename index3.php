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
     <div class="container" style="background-color: white;margin-top:10px;padding-top:10px;">
			
		
		 <p id='addr'>Address: </p> 	
		 <label>Preferred Location</label>
		 <select id="map_id" name='mappair' onChange="addresschange()">
			<option value="0" <?php echo (!isset($_POST['mappair']) )? 'selected="selected"':'' ;?>>Choose location </option>
			<?php
			
				$check = true;
				if(isset($_SESSION['mapaddrbutton'])){
					echo "<script>document.getElementById('addr').innerHTML = 'Address: $_SESSION[mapaddrbutton]'</script>";
					$_SESSION["mapaddr"] = $_SESSION["mapaddrbutton"];
					$_SESSION['mapaddrbut'] = $_SESSION['mapaddrbutton'];
					$check = false;
				}
				
				$query = "select * from hotel_master 
						where chain = 'Lotus' and roomtype='Standard' ";
						
				$result = mysqli_query($conn, $query);
				
				while($rows = mysqli_fetch_assoc($result)){
					
					if((isset($_POST['mappair']) && $_POST['mappair'] == $rows['map'])) {
						echo "<option value='$rows[map]' selected>$rows[map]</option>";
					}else{
						echo "<option value='$rows[map]'>$rows[map]</option>";
					}
					
					if($check){
						echo "<script>document.getElementById('addr').innerHTML = 'Address: $rows[map]'</script>";
						$_SESSION['mapaddr'] = $rows['map'];
						$_SESSION['mapaddrbut'] = $_SESSION['mapaddr'];
					}
					
				}
			
			
			?>
		
			 
		 </select>
		 <br><a id='inslink' href='instruction.php'>Instruction to view room details/rates and book/cancel reservations.</a>

    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width:100%;height:50%;">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
		
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
	

      <div class="item active">
        <img src="img/banner.jpg" alt="Los Angeles" style="width:100%;height:400px;">
      </div>

      <div class="item">
        <img src="img/grandRoom.jpg" alt="Chicago" style="width:100%;height:400px;">
      </div>
    
      <div class="item">
        <img src="img/familyRoom.jpg" alt="New York" style="width:100%;height:400px;">
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
       
                <div class="row">
                    <div class="col-md-12">
                        <div class="section_heading" style="text-align: center;">
                            <img src="img/logo.png">
                            <h2>WHO WE ARE?</h2>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="container intro" >
                    	<div class="vision">
                    		<i>"Lotus Hotel, your friendly and hospitable hotel brand is now available at Midtown Manhattan, New York."</i>
                    	</div>
                         <p>Inspiring Touches For Rooms Uniquely Refreshing!<br>
                         <b>Creating something new…</b></p>

                        <p>The bustle of the street disappears as you step inside Lotus Hotel. Our Times Square, New York hotel’s chic, two-story lobby, with its reflective fireplace, dramatic lighting, and rich textures, sets the stage for a hip, indulgent experience. Whether you are traveling for business or pleasure, Lotus Hotel makes a stylish, comfortable, and centrally located home base for all of your adventures in New York City. Recently updated but retaining its historical charm, Lotus Hotel is the only hotel near Broadway NYC with genuine personality.</p>

                        <p>The Hotel Maison, in its quest to spruce and liven up the NY hotel scene, believes it has something unique to offer; nuggets of inspirational abodes you’ll probably thought only exist in Vegas or Paris. Lotus Hotel welcomes guests of all abilities. Our property descriptions aim to allow any visitor to make an informed decision on whether the hotel is an appropriate choice for their needs.</p>

                        <p>Step into first and one-of-its kind hotel where thematic rooms merge “rest, experiential and memories” to unique levels as you keep company with iconic names in the entertainment world, rejuvenate your senses in different realms and partake serene, restful surroundings. All in a very cosy 4-storey enclave located off Midtown Manhattan, that is also the heart of the city.</p>

                        </div>
                    </div>
                </div>
        </section>
         <br>
        <section>
        	<div class="container img-btm" >
        		<div class="row">
        			<img src="img/banner.jpg" width="330" height="230">
        			<img src="img/banner.jpg" width="330" height="230">
        			<img src="img/banner.jpg" width="330" height="230">


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