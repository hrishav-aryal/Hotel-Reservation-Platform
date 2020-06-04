<?php

 if(isset($_POST['submit_btn']))
 {
  $username = $_POST['name'];
  $password = $_POST['pwd'];
  $text = $username . "," . $password . "\n";
  $fp = fopen('accounts.txt', 'a+');

    if(fwrite($fp, $text))  {
        echo 'saved';

    }
fclose ($fp);    
}

 <form action = "" method="POST">
      <h1> Please enter your information to create a new login account</h1>
        <p>  
          <label>Login Name:</label><input type = "text"  name = "name" />
          <label>Password:</label><input type = "password" name = "pwd" />
          <br/>
          <br/>
        </p>
      <input type = "submit" name="submit_btn" id = "submit" value = "submit"/>
      <input type = "reset"  id = "reset" value = "reset"/>
    </form>
?>