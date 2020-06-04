<?php 
	session_start();
	$_SESSION = array();
	session_destroy();
	
	session_start();
	include 'serverConn.php';
	$conn->close();
        
        if(isset($_POST['submit1'])){
				if($_POST['date_1'] != null){
					$_SESSION['currentdate'] = $_POST['date_1'];
					header("location: index.php");
				}else{
					echo "<script>confirm('Must enter a date first!');</script>";
				}
			}
?>

<html>

<head>
    <title> Final Project</title>
    <link rel="stylesheet" type="text/css" href="http://csci370finalproject.atwebpages.com/style.csssss">
	<link rel="stylesheet" href="map.css">
</head>

<body>

	<div id='datebody'>

	<div id='currentdatecontainer'>
	
		<div class="header">
			<h2 id='cd'>Enter Current Date:</h2>
		</div>
		
		<form method="post" action="">
			
			<div class="date">
				<input type="Date" name="date_1" id='datet'>
			</div>    
			
			<div class="input-group">
				<button type="submit" name="submit1" class="btn" id='datesubmit'>Submit</button>
			</div>
		
		</form>

	</div>
	
	</div>
</body>
</html>