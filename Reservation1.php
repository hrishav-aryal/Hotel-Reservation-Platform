<?php
	session_start();
	include 'serverConn.php';
	
	if(!isset($_SESSION['uname'])){
		header("location: login.php?camefrom=reservation1");
	}
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
    
    <body style="background-color:#9D00D4;">
        
        <header class="header_area" style="background-color: white;">     
            <div class="header_bottom">
                <div class="container">
                    <div class="main_header">
                        <div class="row">
                            <div class="col-md-3 col-sm-2">
                                <div class="logo">
                                     <a href="index2.php"><img src="img/Orchidlogo.png" alt="Site Logo" style="width:100px;height:72px;"></a>                     
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-10 nav_area">
                                <nav class="main_menu">
                                    <div class="navbar-collapse collapse"> 
                                        <ul class="nav navbar-nav navbar-right">
											<li><a href="index.php">Main Page</a></li>
                                            <li><a href="index1.php">Home</a></li>
                                            <li><a href="Accommodation1.php">Accommodation</a></li>
                                            <li><a href="Location&ContactUs1.php">ContactUs</a></li>
											
											<?php
												if(!isset($_SESSION['uname'])){
													echo '<li><a href="login.php?camefrom=index1">Login</a></li>';
												}else{
													echo '<li><a href="myreservations.php?camefrom=orchid">My Reservations</a></li>';
													echo '<li><a href="date.php">Logout</a></li>';
												}
													
											?>
											
											
                                            <li><a href="Reservation1.php" style="background-color:#9D00D4;">Reservation</a></li>
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
        
         <div class="container">
             <div class="hotel_reserve_box card">
         <h3> Hotel Reservation Form </h3><br>
		 <p id='crdate'>Current Date(YYYY-MM-DD):<b> <?php echo $_SESSION['currentdate'];?></p>
        
		<form action='' method='post'>
			
			<div class="form-group">
				<label for="start">Check-In date:</label>
				<input type="date" id="start" name="checkin" value="<?php echo (isset($_POST['checkin'])) ? $_POST['checkin'] : date('Y-m-d'); ?>" />        
			</div>
            

			<div class="form-group">
				<label for="start">Check-Out date:</label>
				<input type="date" id="start" name="checkout" value="<?php echo (isset($_POST['checkout'])) ? $_POST['checkout'] : date('Y-m-d'); ?>" />
			</div>
        

			<div class="form-group">
                 <label>Room/Suite Type</label>
                 <select class="form-control" id="room_type" name='roomtype' onChange="finalCost()">
                     <option value="0" <?php echo (!isset($_POST['roomtype']) )? 'selected="selected"':'' ;?>>Select Room/Suite </option>
                     <option value='Cheap' <?php 
					 
						if((isset($_SESSION['rt']) && $_SESSION['rt'] == 'Cheap')){
							echo 'selected="selected"';
							unset($_SESSION['rt']);
						}else if((isset($_POST['roomtype']) && $_POST['roomtype'] == 'Cheap')){
							echo 'selected="selected"';
						}
						?>> Cheap </option>
                     
					 
					 <option value="Standard" <?php 
					 
					 if((isset($_SESSION['rt']) && $_SESSION['rt'] == 'Standard')){
							echo 'selected="selected"';
							unset($_SESSION['rt']);
						}else if((isset($_POST['roomtype']) && $_POST['roomtype'] == 'Standard')){
							echo 'selected="selected"';
						}
						?>> Standard </option>
						
                     <option value="Deluxe" <?php 
					 
					  if((isset($_SESSION['rt']) && $_SESSION['rt'] == 'Deluxe')){
							echo 'selected="selected"';
							unset($_SESSION['rt']);
						}else if((isset($_POST['roomtype']) && $_POST['roomtype'] == 'Deluxe')){
							echo 'selected="selected"';
						}
					 
					 ?>> Deluxe </option>
				 </select>
             </div>
             <div class="form-group">
                 <label>Number of room/suite</label>
                 <select class="form-control" id="room_number" name='roomnumber' onChange="finalCost()">
                     <option value="1" <?php echo (isset($_POST['roomnumber']) && $_POST['roomnumber'] == '1') ? 'selected="selected"':'' ;?>> 1 </option>
                     <option value="2" <?php echo (isset($_POST['roomnumber']) && $_POST['roomnumber'] == '2') ? 'selected="selected"':'' ;?>> 2 </option>
                     <option value="3" <?php echo (isset($_POST['roomnumber']) && $_POST['roomnumber'] == '3') ? 'selected="selected"':'' ;?>> 3 </option>
                     <option value="4" <?php echo (isset($_POST['roomnumber']) && $_POST['roomnumber'] == '4') ? 'selected="selected"':'' ;?>> 4 </option>
                     <option value="5" <?php echo (isset($_POST['roomnumber']) && $_POST['roomnumber'] == '5') ? 'selected="selected"':'' ;?>> 5 </option>
                     <option value="6" <?php echo (isset($_POST['roomnumber']) && $_POST['roomnumber'] == '6') ? 'selected="selected"':'' ;?>> 6 </option>
                     <option value="7" <?php echo (isset($_POST['roomnumber']) && $_POST['roomnumber'] == '7') ? 'selected="selected"':'' ;?>> 7 </option>
                 </select>
             </div>
			 
			  <div class="form-group">
                 <label>Preferred Location</label>
                 <select class="form-control" id="map_id" name='mappair' onChange="finalCost()">
					<option value="0" <?php echo (!isset($_POST['mappair']) )? 'selected="selected"':'' ;?>>Choose location </option>
					<?php
						$query = "select * from hotel_master 
								where chain = 'Orchid' and roomtype = 'Standard'";
								
						$result = mysqli_query($conn, $query);
						
						while($rows = mysqli_fetch_assoc($result)){
						
							
							if((isset($_POST['mappair']) && $_POST['mappair'] == $rows['map'])) {
								echo "<option value='$rows[map]' selected>$rows[map]</option>";
							}else if((isset($_SESSION['mapaddrbut']) && $_SESSION['mapaddrbut'] == $rows['map'] )){
								echo "<option value='$rows[map]' selected>$rows[map]</option>";
								unset($_SESSION['mapaddrbut']);
							}else{
								echo "<option value='$rows[map]'>$rows[map]</option>";
							}
							
						}
					
					
					?>
				
                     
                 </select>
             </div>
           
		  
		   
             <div class="form-group">
				<input type='submit' id="getrate" value='Get Rate' name='getrate'>
				<input type='submit' id="booknow" value='Book Now' name='book_now'>
             </div>
			 
         </form>
		 
		 <p id="errormsg"></p>
		 
		 <label>Total Cost ($) : </label>
		 <span id="result" style="background-color: grey;color: #fff;padding: 6px 70px;font-weight: 600;font-size: 18px; margin-left: 10px;border-radius: 5px;">
		   
		   <?php
				if(isset($_POST['getrate'])){
					
					
					if($_POST['checkout'] > $_POST['checkin']){
						
						$rt = $_POST['roomtype'];
						$m = $_POST['mappair'];
						$rn = $_POST['roomnumber'];
						
						$query = "select * from hotel_master 
							where chain = 'Orchid' 
							and roomtype = '$rt'
							and map = '$m'";
									
						$result = mysqli_query($conn, $query);
						
						$row = mysqli_fetch_assoc($result);
						$price = $row['price'];
						
						if($row['numberofrooms'] == '0'){
							echo '<script type="text/javascript">'.
							 'document.getElementById("errormsg").innerText = "Rooms already sold out.";'.
							 '</script>';
						} else if($price == null){
							echo '<script type="text/javascript">'.
							 'document.getElementById("errormsg").innerText = "Invalid Information please fill out the form.";'.
							 '</script>';
						}
						
						echo $price*$rn.' /night';
					}else{
						echo '<script type="text/javascript">'.
							 'document.getElementById("errormsg").innerText = "invalid checking and checkout date";'.
							 '</script>';
					}
				}
				
			?>
		 
         </span>
		 
		
		<div class="form-group">
			
			<?php
				if(isset($_POST['book_now'])){
					
					$numofrms = 0;
					if($_POST['checkout'] > $_POST['checkin']){
						
						if( $_POST['checkin'] < $_SESSION['currentdate']){
							
							echo '<script type="text/javascript">'.
								 'document.getElementById("errormsg").innerText = "Checking date must be on or after the current date.";'.
								 '</script>';
							
							
						}else{
						
				
						
						$rt = $_POST['roomtype'];
						$m = $_POST['mappair'];
						$rn = $_POST['roomnumber'];
						$ci = $_POST['checkin'];
						$co = $_POST['checkout'];
						
						$query = "select * from hotel_master 
							where chain = 'Orchid' 
							and roomtype = '$rt'
							and map = '$m'";
									
						$result = mysqli_query($conn, $query);
						
						$row = mysqli_fetch_assoc($result);
						$price = $row['price']*$rn;
						$numofrms = $row['numberofrooms'];
						
						if($row['numberofrooms'] == '0'){
							echo '<script type="text/javascript">'.
							 'document.getElementById("errormsg").innerText = "Rooms already sold out.";'.
							 '</script>';
						}else if($numofrms < $rn){
							echo '<script type="text/javascript">'.
							 'document.getElementById("errormsg").innerText = "We only have '.$numofrms .' '. $rt .' room/s left.";'.
							 '</script>';
						
						}else if($price == null){
							echo '<script type="text/javascript">'.
							 'document.getElementById("errormsg").innerText = "Invalid Information please fill out the form.";'.
							 '</script>';
						}else{
							$sql = "insert into reservation_master (customerid,address, roomtype, numberofrooms, price, checkindate, checkoutdate, chain)
								values ('$_SESSION[uname]','$m','$rt','$rn','$price', '$ci', '$co', 'Orchid')";
						
									
							if(mysqli_query($conn, $sql)){
								echo '<script type="text/javascript">'.
								 'document.getElementById("errormsg").innerText = "Booking Successfull";'.
								 '</script>';
								 
								 $q = "update hotel_master 
									set numberofrooms = '$numofrms' - '$_POST[roomnumber]'
									where chain = 'Orchid' 
									and roomtype = '$rt'
									and map = '$m'";
								mysqli_query($conn, $q);
								 
							}else{
								echo '<script type="text/javascript">'.
							 'document.getElementById("errormsg").innerText = "Something went wrong";'.
							 '</script>';
							}
							
						}
						}
						
					}else{
						echo '<script type="text/javascript">'.
							 'document.getElementById("errormsg").innerText = "invalid checking and checkout date";'.
							 '</script>';
					}
				}
				
		?>
			
		</div>
		
		
		
     </div>
         </div>
        </div>
        <br>

        <footer class="footer_area">
            
            <div class="footer_bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <p>© 2020 Orchid Hotel. All rights reserved</p>
                        </div>
                        <div class="col-sm-8">
                            <nav class="footer_menu">
                                <ul>
                                    <li><a href="index.php">Main Page</a></li>
                                   <li><a href="index1.php">Home</a></li>
                                            <li><a href="Accommodation1.php">Accommodation</a></li>
                                            <li><a href="Facilities&Services1.php">Facilities</a></li>
                                            <li><a href="Location&ContactUs1.php">ContactUs</a></li>
                                            <li><a href="Reservation1.php">Reservation</a></li>
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
         <script>
        function finalCost(){
            
        }
    </script>
 
    </body>
</html>