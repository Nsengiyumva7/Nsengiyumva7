<?php
include ('connection.php');


if (isset($_POST['sign out_btn'])) {
  $errors = array('username'=>'', 'password'=>'');
// receive all input values from the form
$username = mysqli_real_escape_string($db, $_POST['username']);
$password = mysqli_real_escape_string($db, $_POST['password']);

// form validation: ensure that the form is correctly filled ...
// by adding (array_push()) corresponding error unto $errors array
if (empty($username)) { $errors['username'] = "username is required"; }
if (empty($password)) { $errors['password']= "password is required"; }


// first check the database to make sure 
// a user does not already exist with the same username and/or email
$user_check_query = "SELECT * FROM adimin WHERE username='$username'  LIMIT 1";
$result = mysqli_query($db, $user_check_query);

$logindatabase=mysqli_fetch_array ( $result) ;

/**//**/
if ($logindatabase){
if ($logindatabase['username'] === $username) {
  $errors['username'] = "username already exists";
}

} 

// Finally, register user if there are no errors in the form
if  (!array_filter($errors)) {
 $password = md5($password);//encrypt the password before saving in the database

 $query = "INSERT INTO registration (username,email, password) 
         VALUES('$username', '$password')";
 mysqli_query($db, $query);
 $_SESSION['username'] = $username;
 $_SESSION['success'] = "You are now logged in";

}
}
?>


<html>
   
   <head>
      <h1>Welcome </h1> 
      <title>Admin </title>
      
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
        style=text align="center">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Admin</b></div>
				
            <div style = "margin:30px">
               
               <form action = "admin.php" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>
					
            </div>
				
         </div>
			
      </div>
 

      <h2><button type="button"><a href = "index.php">Sign Out</a></button></h2>

<style>
body {
  background-image: url('mec.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
   
   
</body>
</html>