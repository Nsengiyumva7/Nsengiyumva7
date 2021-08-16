
<?php
include_once ('connection.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Register </title>

<link rel="stylesheet" href="style.css";>
<style>
body {
  background-image: url('mec.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>
</head>
<body style= text-align:center>
<div class="header">
	<h2>Register of client</h2>
</div>
<form method="post" action="login.php">
	<div class="input-group">
		<label>Username</label>
		<input type="text" name="username" required >
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="email" name="email" required >
	</div>
	<div class="input-group">
		<label>Password</label>
		<input type="password"  name="password" required>
	</div>
	
	<div class="input-group">
		<button type="submit" class="btn" name="register_btn">Register</button>
	</div>
	
</form>
<?php
    if (isset($_POST['register_btn'])) {
      $errors = array('username'=>'', 'email'=>'', 'password'=>'');
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  
  
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { $errors['username'] = "username is required"; }
  if (empty($email)) { $errors['email'] = "email is require"; }
  if (empty($password)) { $errors['password']= "password is required"; }
  
 
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM registration WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);

   $logindatabase=mysqli_fetch_array ( $result) ;

  /**//**/
  if ($logindatabase){
    if ($logindatabase['username'] === $username) {
      $errors['username'] = "username already exists";
    }

    if ($logindatabase['email'] === $email) {
      $errors['email'] = "email already exists";
    }
  

  }
   

  // Finally, register user if there are no errors in the form
  if  (!array_filter($errors)) {
  	$password = md5($password);//encrypt the password before saving in the database

  	$query = "INSERT INTO registration (username,email, password) 
  			  VALUES('$username','$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  
  }
}
?>

</body>

</html>