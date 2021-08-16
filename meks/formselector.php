<?php
  	$errors = array('login' => '', 'username' => '', 'password' => '', 'incorrect' => '');
if(isset($_POST['submit'])){
	
	if(empty($_POST['username'])){
		$errors['username'] = 'username is required';}
	if(empty($_POST['psw'])){
		$errors['password'] = 'An password is required';}
  $person = $_POST['login'];
  
  $password = $_POST['psw'];
  if($person == 'user'){

	echo  'you are going to log in';
	  }else{
		$errors['incorrect'] ='Username Or Password is incorrect!';
	  }

  } else if($person == 'patient'){
	include('connection.php');
	// write query 
	$sql = "SELECT id FROM registration WHERE username = '$username' and passwords = '$password'";

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$account = mysqli_fetch_all($result, MYSQLI_ASSOC);


	// check how many results
	$count = mysqli_num_rows($result);

 // If result matched $my username and $mypassword, table row must be 1 row
	if($count == 1) {	
		header("location:contact.php");
		}else {
		$error = "Your Username or Password is invalid";
		 }
	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
	mysqli_close($conn);

  }
}

?>


<html>
   
   <head>
      <h1>Welcome </h1> 
      <title>Login </title>
      
      <title>  Welcome </title>
   
      <style type = "text/css">
         body {
            
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF";
        style=text-align:center>
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; text-align =left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "contact.php" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit " name="egide"/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>
					
            </div>
				
         </div>
			
      </div>
 

      <h2><button type="button"><a href = "home.html">Sign Out</a></button></h2>

<style>
body {
  background-image: url('mec.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>
</body>

</html>

