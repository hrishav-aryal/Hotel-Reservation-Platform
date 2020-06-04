<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="stylesheet" type="text/css" href="http://csci370finalproject.atwebpages.com/style.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Add Tulip Hotel Form</title>
        
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
            .button{
                background:rgb(233, 120, 139);
                text-align: center;
                padding: 10px 20px;
                font-size: 15px;
                color: rgb(43, 2, 8);
                border-radius: 5px;
            }
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
                                <a href="index2.html"><img src="img/tuliplogo.png" alt="Site Logo" style="width:100px;height:72px;"></a>                   
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
                            <li>Location and ContactUs</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        
         <div class="container">
             <div class="hotel_Add_Hotel">
         <h3> Add Hotel Form </h3><br>
         <form method="post" action="addtuliphotel.php">
         <div class="form-group">
                 <label> Input Location Of The New Hotel</label><br>
                 <label>x-coordinate(btw 0 and 99): </label>
                    <input type="number" name="x_cod" min = "0" max = "99" > 
                    <label>y-coordinate(btw 0 and 99): </label>
                    <input type="number" name="y_cod" min = "0" max = "99" >
             </div><br>
             <div class="form-group">
                <label>Add Cheap Rooms (Leave empty if you do not want to add any Cheap Rooms)</label><br>
                <label>Number Of Cheap Rooms : </label>
                    <input type="number" name="NumberCheapRooms"> 
                    <label>Rate for Cheap rooms: $</label>
                    <input type="number" name="cheap_rate" >
            </div><br>
           
             <div class="form-group">
                 <label>Add Standard Rooms (Leave empty if you do not want to add any Standard Rooms)</label><br>
                 <label>Number Of Standard Rooms : </label>
                    <input type="number" name="NumberStandardRooms"> 
                    <label>Rate for Standard rooms: $</label>
                    <input type="number" name="standard_rate" >               
             </div><br>
             
             <div class="form-group">
                 <label>Add Deluxe Rooms (Leave empty if you do not want to add any Deluxe Rooms)</label><br>
                 <label>Number Of Deluxe Rooms : </label>
                    <input type="number" name="NumberDeluxeRooms"> 
                    <label>Rate for Deluxe rooms: $</label>
                    <input type="number" name="deluxe_rate" >               
             </div><br>
             
			 <p id='addhotelsuccess'></p>
             <?php
$xCod = "";
$yCod = "";
$errors = array();
$db = mysqli_connect('fdb26.awardspace.net', '3426136_final', 'finalproject3','3426136_final');

if(isset($_POST['addtulip'])){
    $NumberCheap = $_POST['NumberCheapRooms'];
    $NumberStandard = $_POST['NumberStandardRooms'];
    $NumberDeluxe = $_POST['NumberDeluxeRooms'];
    $BadRate = $_POST['cheap_rate'];
    $MediumRate = $_POST['standard_rate'];
    $GoodRate = $_POST['deluxe_rate'];
    $xCod = $_POST['x_cod'];
    $yCod = $_POST['y_cod'];
    
    
    $query = " SELECT X, Y FROM hotel_master 
    WHERE X = '$xCod' and Y = '$yCod' ";

$result = mysqli_query($db, $query);

if(mysqli_num_rows($result) > 0){
     array_push($errors,"<p id='locnotavail'>Loctaion not available. Please try another location.</p>");
}

if(count($errors)==0){
    
    $sql = "INSERT INTO hotel_master(X, Y, map, chain, roomtype, price, numberofrooms)
    VALUES ('$xCod','$yCod',CONCAT('(',$xCod,',', $yCod, ')'),'Tulip','Cheap','$BadRate','$NumberCheap'),
    ('$xCod','$yCod',CONCAT('(',$xCod,',', $yCod, ')'),'Tulip','Standard','$MediumRate','$NumberStandard'),
    ('$xCod','$yCod',CONCAT('(',$xCod,',', $yCod, ')'),'Tulip','Deluxe','$GoodRate','$NumberDeluxe')";
    
    mysqli_query($db,$sql);
	echo "<script>document.getElementById('addhotelsuccess').innerHTML = 'Hotel successfully added.'</script>";
   
}
}

if(isset($_POST['addtulip'])){
    $xCod = $_POST['x_cod'];
    $yCod = $_POST['y_cod'];
    

    $query = " INSERT INTO map( X, Y ) VALUES ('$xCod','$yCod')";
    $result = mysqli_query($db, $query);
    
}
?>
<?php include('adminerrors.php');?>
             <div class="button">
                <button type="submit" name="addtulip" class="btn">Add Tulip Hotel</button>
             </div>
         </form>
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