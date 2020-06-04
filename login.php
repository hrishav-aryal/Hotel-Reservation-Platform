<?php
			session_start();
			include 'serverConn.php';
                        if(isset($_POST['login'])){
				$username = $_POST['email'];
				$password = $_POST['psw'];
				
				if($username != "" && $password != ""){
					 
					 $sql = "select * from customerlogin 
							where username='$username'
							and password='$password'";
					$result = mysqli_query($conn, $sql);
					
					$count = mysqli_num_rows($result);
					if($count>=1){
						
						$row = mysqli_fetch_assoc($result);
						$_SESSION['name'] = $row['name'];
						$_SESSION['uname'] = $row['username'];
						
						if(isset($_GET['camefrom'])){
							
							if($_GET['camefrom'] =='reservation'){
								header("location: Reservation.php");
								
							}else if($_GET['camefrom'] =='reservation1'){
								header("location: Reservation1.php");
								
							}else if($_GET['camefrom'] =='reservation2'){
								header("location: Reservation2.php");
								
							}else if($_GET['camefrom'] =='searchEngine'){
								header("location: search_engine.php");
								
							}else if($_GET['camefrom'] =='myreservations'){
								header("location: myreservations.php");
								
							}else if($_GET['camefrom'] =='index'){
								header("location: index.php");
								
							}else if($_GET['camefrom'] =='index1'){
								header("location: index1.php");
								
							}else if($_GET['camefrom'] =='index2'){
								header("location: index2.php");
								
							}else if($_GET['camefrom'] =='index3'){
								header("location: index3.php");
								
							}
						}else{
							header("location: index.php");
						}
						
					}else{
						echo "<script>document.getElementById('loginerror').innerHTML = 'Invalid Username or Password.'</script>";
					}
					
				}else{
					echo "<script>document.getElementById('loginerror').innerHTML = 'Fields cannot be empty.'</script>";
				}
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
        <link rel="stylesheet" href="css/login.css">

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
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="login.php">Login</a></li>
                                            
                                            
                                        </ul>
                                    </div>
                                </nav>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </header>
  
      <form action='' method='post'>
         <div class="container">
            <h1>Costumer Login</h1>
            <p>Please fill in following information about your account to register a room.</p>
            <hr>
            <label for="email"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="email" required>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
            <p id='loginerror'></p>
			<hr>
           
            <button type="submit" class="registerbtn" name='login'>Login</button>
         </div>
          <div class="container signin">
            <p>Don't have an account? <a href="signin.php?<?php echo 'camefrom='.$_GET['camefrom'];?>">Sign Up</a>.</p>
         </div>
         
      </form>
   </body>
   
   

</html>