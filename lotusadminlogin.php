<?php include('adminserver.php');?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="stylesheet" type="text/css" href="http://csci370finalproject.atwebpages.com/style.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lotus Admin Login</title>
        
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
        <style>
        .header{
    width: 30%;
    margin: 50px auto 0px;
    color: white;
    background: #5F9EA0;
    text-align: center;
    border: 1px solid #B0C4DE;
    border-bottom: none;
    border-radius: 10px 10px 0px 0px;
    padding: 20px;
}

form, .content{
    width: 30%;
    margin: 0px auto;
    padding: 20px;
    border: 1px solid #B0C4DE;
    background: white;
    border-radius: 0px 0px 10px 10px;
}

.input-group{
    margin: 10px 0px 10px 0px;
}

.input-group label{
    display: block;
    text-align: left;
    margin: 3px;
}

.input-group input{
    height: 30px;
    width: 93%;
    padding: 5px 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid gray;

}

.btn{
    padding: 10px;
    font-size: 15px;
    color: white;
    background: #5F9EA0;
    border: none;
    border-radius: 5px;
}

.error {
    width: 92%;
    margin: 0px auto;
    padding: 10ox;
    border: 1px solid #A94442;
    color: #A94442;
    background: #F2DEDE;
    border-radius: 5px;
    text-align: left;

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
                                    <a href="index.html"><img src="img/logo1.png" alt="Site Logo"></a>                     
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
        
         <div class="header">
        <h2>Lotus Admin Login</h2>
    </div>

    <form method="post" action="lotusadminlogin.php">
    <?php include('adminerrors.php');?>
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="Password" name="password_1">
        </div>
        <div class="input-group">
            <button type="submit" name="login1" class="btn">Login</button>
        </div>
        <p>
            Please Login using your Adminstrator username and password.
        </p>
    </form>
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