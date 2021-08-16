
<?php
include_once ('connection.php');
?>

<doctype!html>
<html><title>contact us!</title>
<head>
<style>
{
  padding:0;
  margin:0;
}
body{
background-image:url("mec.jpg");
 background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
#meka{
   background-color:rgba(0,0,0,0.1);
     width:50%;
     height:70%;
     justify-content:center;
     color:brown
}
input[type="text"]{
background-color:#aec;
color:black;
width:40%;
height:10%;
border:0;
border-radius:4px;
}
input[type="text"]:hover{
background-color:#eee;
black:color;
width:40%;
height:10%;
border:0;
border-radius:4px;
}
textarea{
background-color:rgba(0,0,0,0.9)
height:30%; 
width:50%;
border:0;
border-radius:4px;
}
input[type="submit"]{
background-color:brown;
height:10%; 
width:20%;
border:0;
border-radius:4px;
}
input[type="submit"]:hover{
background-color:rgba(0,0,200,0.3)
height:10%; 
width:20%;
border:0;
border-radius:4px;
}
select{
border:0;
border-radius:4px;
}
option{
border:0;
border-radius:4px;
}
#nik,p{
color:green;
font-size:16px;
#mika{
gap:1 rem;}
</style>
</head>
<body>
<div id="meka" >
<div class="mika" align="center">
<p  text-align="center"><i>REGISTER<i></p>
<form action="CONTACT1.PHP" method="post">
<ol><label for="fname">First Name</label><br></ol>
    <ol><input type="text" id="fname" name="First_name" placeholder="Your name.." required><br></ol>
       <ol> <label for="lname">Last Name</label><br></ol>
        <ol><input type="text" id="lname" name="lastname" placeholder="Your lastname.." required><br></ol>
        <ol><label for="district">district</label><br></ol>
        <ol><select id="district" name="district"><br></ol>
        <ol><option value="muhanga">muhanga</option></ol>
        <ol><option value="ruhango">ruhango</option></ol>
        <ol><option value="kamomyi">kamomyi</option></ol>
              </select><br>
        <label for="subject">Subject</label><br>
        <ol><textarea id="subject" name="subject" placeholder="Write your problem.." required ></textarea><br></ol>
        <ol><input type="submit" value="Submit" name="submit_btn"></ol>
</li>
   </div>
   </form>
<?php
    if (isset($_POST['submit_btn'])) {
      $errors = array('First_name'=>'', 'second_name '=>'', 'district'=>'', 'subject'=>'');
  // receive all input values from the form
  $fname = mysqli_real_escape_string($db, $_POST['First_name']);
  $lname = mysqli_real_escape_string($db, $_POST['lastname']);
  $district = mysqli_real_escape_string($db, $_POST['district']);
  $subject = mysqli_real_escape_string($db, $_POST['subject']);
  
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($Firstname)) { $errors['First name'] = "First_name is required"; }
  if (empty($lastname)) { $errors['last name'] = "last_name is require"; }
  if (empty($district)) { $errors['district']= "district is required"; }
  if (empty($subject)) { $errors['subject']= "subject is required"; }
 
  // first check the database to make sure 
  // a user does not already exist with the same first name and/or second name and/or district and/or subject
  $user_check_query = "SELECT * FROM registration WHERE First name='$fname' OR last name='$lname 'OR district='$district' OR subject='$subject'   LIMIT 1";
  $result = mysqli_query($db, $user_check_query);

  /* $logindatabase=mysqli_fetch_array ( $result) ;

  /**//**/
  //if ($logindatabase){
    //if ($logindatabase['first_name'] === $fname) {
   //   $errors['first_name'] = "first name already exists";
   // }

   // if ($logindatabase['last_name'] === $lname) {
     // $errors['last_name'] = "last name already exists";
   // }
  

  //}
  

  // Finally, register user if there are no errors in the form
  if  (!array_filter($errors)) {
  	$district = md5($district);//encrypt the district before saving in the database

  	$query = "INSERT INTO contact (First name,last name, district) 
  			  VALUES('$first_name','$last_name', '$district')";
  	mysqli_query($db, $query);
  	// $_SESSION['Firstname'];['lastname'] = $First name; $last name;
  	// $_SESSION['success'] = "Your problem is received";
  
  }
}
?>
</body>
</html>