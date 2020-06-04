<?php 
	session_start();
        
        if(!isset($_SESSION['currentdate'])){
		header("location: date.php");
	}
        
	#$conn = new mysqli("127.0.0.1", "root", "", "hotel_map");
	$conn = new mysqli('fdb26.awardspace.net', '3426136_final', 'finalproject3','3426136_final');
	
	$sql = "select * from map";
	$result = mysqli_query($conn, $sql);
	
	$combine = array();
	while($rows = mysqli_fetch_assoc($result)){
		
		$key = '(' . $rows['X'] . ',' . $rows['Y'] . ')';
		
		array_push($combine, $key);
	}
	
	$conn->close();
	
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
														<li><a href="login.php?camefrom=index">Login</a></li>';
												}else{
													echo '<li><a href="myreservations.php?camefrom=index">My Reservations</a></li>
														<li><a href="search_engine.php">Find Hotels</a></li>
														<li><a href="index.php">Home</a></li></li>
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
     <div class="container" style="background-color: white;margin-top:10px;padding-top:10px;">
	 <p id='crdatemain'>Current Date(YYYY-MM-DD):<b> <?php echo $_SESSION['currentdate'];?></p>
	 

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
                            <img src="img/flowerhotel.png">
                            <h2>Flower Hotel: all of our hotels</h2>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="container intro" >
                    	<div class="vision" id='flower'>
                    		<i>"Flower Hotel is a hotel franchise of 3 different hotel, Lotus Hotel, Tulip Hotel and Orchid Hotel!!!"</i>
                    	</div>
                         
                        <p>Make a booking in one of our 3 to 5 star luxury hotels, residences and resorts. Our Flower Hotel and establishments will welcome you with open arms for weekends away, family vacations or business trips.All our hotels, residences and resorts combine pleasure with hospitality in a refined atmosphere where our visitors’ well-being is the only thing that matters. During your stay, you can take advantage of the many services and comfortable rooms offered by our hotels: restaurants, modern equipment for your meetings and events, fashionable bars, fitness rooms and even spas.</p>

                        <p>The Hotel Maison, in its quest to spruce and liven up the NY hotel scene, believes it has something unique to offer; nuggets of inspirational abodes you’ll probably thought only exist in Vegas or Paris. Lotus Hotel welcomes guests of all abilities. Our property descriptions aim to allow any visitor to make an informed decision on whether the hotel is an appropriate choice for their needs.</p>

                        <p>Step into first and one-of-its kind hotel where thematic rooms merge “rest, experiential and memories” to unique levels as you keep company with iconic names in the entertainment world, rejuvenate your senses in different realms and partake serene, restful surroundings. All in a very cosy 4-storey enclave located off Midtown Manhattan, that is also the heart of the city.</p>

                        </div>
                     
                    </div>
         <br> <h3>Please choose either of 3 hotel icon below:</h3><br>
                </div>
        </section>
         <br>
		 
        <section>
          

        	<div class="container img-btm" >
        		<div class="row">
                    <a href="index3.php"><img src="img/logo.png" width="330" height="230"></a>
                    <a href="index2.php"><img src="img/tuliplogo.png" width="330" height="230"></a>
                    <a href="index1.php"><img src="img/Orchidlogo.png" width="330" height="230"></a>


        		</div>
        	</div>
        	
        </section>
		
		<section>
			<div id='map'>
			
			<h2 id='maphead'><b>Map for all of our hotels</h2><br>
		
			<table>
			<?php 
				#$con = new mysqli("127.0.0.1", "root", "", "hotel_map");
				$con = new mysqli('fdb26.awardspace.net', '3426136_final', 'finalproject3','3426136_final');
				
				$check = 0;
				for($i=0; $i<=100; $i++){
					echo '<tr>';
					for($j=0; $j<=100; $j++){
						
						$k = '('.$i . ',' . $j.')';
						if(in_array($k, $combine)){
							$name = query($k, $con);
							echo '<td class="b"><button class="image" id='.$k."-".$name.' onclick="displayDesc(this.id)"</button><span class="tooltiptext">Hotel '.$name.'<br>Address: '.$k.'</span></td>';
						}else{
							echo '<td></td>';
						}
						
						
					}
					echo '</tr>';
				}
				
				function query(string $mapId, object $conn){
					$s = "select * from hotel_master where map='".$mapId."'";
					$r = mysqli_query($conn, $s);
					
					$ch = '';
					while($row = mysqli_fetch_assoc($r)){
						$ch = $row['chain'];
						break;
					}
					
					return $ch;
				}
				
				$con->close();
			?>
			</table>
	
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
			
			function displayDesc(id){
				
				var infos = id.split("-");
				
				var m = infos[0];
				var name = infos[1];
				
				
				if(name == 'Lotus'){
					$.post('sessionmapbutton.php',{map:m}, function(data){window.open("index3.php", "_self");});
					
				}else if(name == 'Tulip'){
					$.post('sessionmapbutton.php',{map:m}, function(data){window.open("index2.php", "_self");});
					
				}else if(name == 'Orchid'){
					$.post('sessionmapbutton.php',{map:m}, function(data){window.open("index1.php", "_self");});
					
				}
				
			}
		
		</script>
		
    </body>
</html>