<?php
session_start();

$username = "";
$errors = array();

//$servername = "fdb22.awardspace.net";
//$server_username = "3386656_userinfo";
//$server_password = "is23596324";
//$dbName = "3386656_userinfo";

$db = mysqli_connect('fdb26.awardspace.net', '3426136_final', 'finalproject3','3426136_final');
#$db = new mysqli("127.0.0.1", "root", "", "hotel_map");



if(isset($_POST['login1'])){
    $username = mysqli_real_escape_string($db,$_POST['username']);
    $password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
    

    if (empty($username)){
        array_push($errors,"Username required");
    }
    if (empty($password_1)){
        array_push($errors,"Password required");
    }

    if(count($errors) == 0){
        $query = " SELECT username, password FROM lotusadminlogin 
        WHERE username = '$username' AND password = '$password_1' ";
        $result = mysqli_query($db, $query);
        if(mysqli_num_rows($result) == 1){
            $_SESSION['adminname'] = $username;
            header('location: lotusadminpage.php');
        }else{
            array_push($errors,"Wrong Username/Password combination. Please try again.");

        }
    }
}
if(isset($_POST['login2'])){
    $username = mysqli_real_escape_string($db,$_POST['username']);
    $password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
    

    if (empty($username)){
        array_push($errors,"Username required");
    }
    if (empty($password_1)){
        array_push($errors,"Password required");
    }

    if(count($errors) == 0){
        $query = " SELECT username, password FROM orchidadminlogin 
        WHERE username = '$username' AND password = '$password_1' ";
        $result = mysqli_query($db, $query);
        if(mysqli_num_rows($result) == 1){
                  
            header('location: orchidadminpage.php');
        }else{
            array_push($errors,"Wrong Username/Password combination. Please try again.");

        }
    }
}

if(isset($_POST['login3'])){
    $username = mysqli_real_escape_string($db,$_POST['username']);
    $password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
    

    if (empty($username)){
        array_push($errors,"Username required");
    }
    if (empty($password_1)){
        array_push($errors,"Password required");
    }

    if(count($errors) == 0){
        $query = " SELECT username, password FROM tulipadminlogin 
        WHERE username = '$username' AND password = '$password_1' ";
        $result = mysqli_query($db, $query);
        if(mysqli_num_rows($result) == 1){
                  
            header('location: tulipadminpage.php');
        }else{
            array_push($errors,"Wrong Username/Password combination. Please try again.");

        }
    }
}
//if(isset($_GET['logout'])){
   // session_destroy();
    //unset($_SESSION['username']);
    //header('location: login.php');
//}

//if(isset($_GET['instructions'])){
    
    //header('location: instruction.php');
//}
?>