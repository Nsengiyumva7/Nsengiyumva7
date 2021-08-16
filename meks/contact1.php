
<?php
include_once ('connection.php');
$fname=$_POST['First_name'];
$lname=$_POST['lastname'];
$district=$_POST['district'];
$subject=$_POST['subject'];


$sql = "INSERT INTO contact (Firstname,Lastname,District,subject)
VALUES ('$fname', '$lname', '$district','$subject')";

if ($db->query($sql) === TRUE) {
  echo "  ";
} else {
  echo "Error: " . $sql . "<br>" . $db->error;
}

$db->close();
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
color:white;
width:40%;
height:10%;
border:0;
border-radius:4px;
}
input[type="text"]:hover{
background-color:#eee;
white:color;
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
background-color:rgba(0,0,200,0.3);
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
	<script>
	alert("Recorded  Succesfully");
	
	</script><div id="meka" >
<div class="mika" align="center">
<p  text-align="center"><i>REGISTER<i></p>
<form action="CONTACT1.PHP" method="post">
<ol><label for="fname">First Name</label><br></ol>
    <ol><input type="text" id="fname" name="First_name" placeholder="Your name.."><br></ol>
       <ol> <label for="lname">Last Name</label><br></ol>
        <ol><input type="text" id="lname" name="lastname" placeholder="Your lastname.."><br></ol>
        <ol><label for="district">district</label><br></ol>
        <ol><select id="district" name="district"><br></ol>
        <ol><option value="muhanga">muhanga</option></ol>
        <ol><option value="ruhango">ruhango</option></ol>
        <ol><option value="kamomyi">kamomyi</option></ol>
              </select><br>
        <label for="subject">Subject</label><br>
        <ol><textarea id="subject" name="subject" placeholder="Write your problem.." ></textarea><br></ol>
        <ol><input type="submit" value="Submit" name="submit_btn"></ol>
</li>
   </div>
   </form>

</body>
</html>