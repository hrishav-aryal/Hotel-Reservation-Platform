<?PHP
	SESSION_START();
	
	$conn = mysqli_connect('fdb26.awardspace.net', '3426136_final', 'finalproject3','3426136_final');
	#$conn = mysqli_connect("127.0.0.1", "root", "", "hotel_map");

?>

<html lang="en">
    <head>
    <link rel="stylesheet" type="text/css" href="http://csci370finalproject.atwebpages.com/style.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lotus Administrator Home </title>
        
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

       
            <style>
                table {
                border-collapse: collapse;
                width: 100%;
                color: #588c7e;
                font-family: monospace;
                font-size: 25px;
                text-align: left;
                }
                th {
                background-color: #588c7e;
                color: white;
                }
                tr:nth-child(even) {background-color: #f2f2f2}
                </style>
    </head>
    
    <body>
        
        <header class="header_area" style="background-color: white;">     
            <div class="header_bottom">
                <div class="container">
                    <div class="main_header">
                        <div class="row">
                            <div class="col-md-3 col-sm-2">
                                <div class="logo">
                                    <a href="index.html"><img src="img/logo1.png" alt="Site Logo"></a>                     
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-10 nav_area">
                                <nav class="main_menu">
                                    <div class="navbar-collapse collapse"> 
                                        <ul class="nav navbar-nav navbar-right">
                                            
											
											<li><a href="lotusadminpage.php">Home</a></li>
											<li><a href="addlotushotel.php">Add Hotel</a></li>
											<li><a href="date.php">Logout</a></li>
											
                                        </ul>
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
                            <li><a href="index.html">Home</a></li>
                            <li><a href="http://csci370finalproject.atwebpages.com/addlotushotel.php">Add Hotel</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        
         <div class="container">
         <div class="hotel_Add_Hotel">
		 
			<div id='recordscontainer'>
				 <h3> Lotus Hotel Adminstrator </h3><br>
				 
				 <p id='crdate'>Current Date(YYYY-MM-DD):<b> <?php echo $_SESSION['currentdate'];?></p><br>
				 
				 <h4><b> Reservation Records: </b></h4><br>
				 <table>
					<tr>
					<th>ID</th>
					<th>Guest</th>
					<th>Address</th>
					<th>Roomtype</th>
					<th># rooms</th>
					<th>Price</th>
					<th>Checkin Date</th>
					<th>Checkout Date</th>
					</tr>
					<?php
				   
					
					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}
					
					$sql = "SELECT * FROM reservation_master WHERE checkindate > '$_SESSION[currentdate]' and chain = 'Lotus'";
					
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
					echo "<tr><td>" . $row["reservationid"]. "</td><td>" . $row["customerid"] . "</td><td>" . $row["address"]. "</td><td>" 
					. $row["roomtype"]. "</td><td>"
					. $row["numberofrooms"]. "</td><td>" . $row["price"]. "</td><td>". $row["checkindate"]. "</td><td>" 
					. $row["checkoutdate"]. "</td></tr>";
					}
					echo "</table>";
					} else { echo "0 results"; }
					
					?>
					</table>
				
				</div>
				
				
				<br>
				
				<div id='recordscontainer'>
					<h4> <b>Currently Checked In Customers:</b> </h4><br>
				 <table>
				 <tr>
					<th>ID</th>
					<th>Guest</th>
					<th>Address</th>
					<th>Roomtype</th>
					<th># rooms</th>
					<th>Price</th>
					<th>Checkin Date</th>
					<th>Checkout Date</th>
					</tr>
					<?php
					#$conn = mysqli_connect('fdb26.awardspace.net', '3426136_final', 'finalproject3','3426136_final');
					// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}
						$sql = "SELECT *
						FROM reservation_master 
						WHERE checkindate <= '$_SESSION[currentdate]'
							and checkoutdate >= '$_SESSION[currentdate]'
							and chain = 'Lotus'";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
						echo "<tr><td>" . $row["reservationid"]. "</td><td>" . $row["customerid"] . "</td><td>" . $row["address"]. "</td><td>" 
						. $row["roomtype"]. "</td><td>"
						. $row["numberofrooms"]. "</td><td>" . $row["price"]. "</td><td>". $row["checkindate"]. "</td><td>" 
						. $row["checkoutdate"]. "</td></tr>";
						}
						echo "</table>";
						} else { echo "0 results"; }
						$conn->close();
					?>
					</table>
				
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
                            <p>© 2020 Lotus Hotel. All rights reserved</p>
                        </div>
                        <div class="col-sm-8">
                            <nav class="footer_menu">
                                <ul>
                                    
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="accommodation.html">Accommodation</a></li>
                                    <li><a href="Facilities&Services.html">Facilities</a></li>
                                    <li><a href="Location&ContactUs.html">ContactUs</a></li>
                                    <li><a href="Reservation.html">Reservation</a></li>
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

    
 
    </body>
</html>