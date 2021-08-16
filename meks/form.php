<?php
   include("connection.php");
   //require_once("connection.php");
   //require("connection.php");
?>
<form action="" method="get">
  <input type="text" username ="name" placeholder="Type your fname"/>
  <br/>
  <input type="text" name ="lname" placeholder="Type your lname"/>
  <br/>
  <input type="submit" name ="sub" value="Save"/>
  <input type="submit" name ="ret" value="Retrieve"/>
</form>

<?php
   if(isset($_GET['sub'])){
	   echo "Save is clicked!";
	   echo "<br/>";
	   $fname = $_REQUEST["fname"];
	   $lname = $_REQUEST["lname"];
	   
	   $query = "INSERT INTO users(id, fname, lname) 
	   VALUES ('','$fname','$lname')";
	   
	   $result = mysqli_query($con, $query);
	   if(!$result){
		   echo "Not processed! ".mysqli_error($con);
	   }else{
		   echo "Registration is done!";
	   }
   }
   if(isset($_GET['ret'])){
	   
	   $retieve = "SELECT * FROM users";
	   $result = mysqli_query($con, $retieve);
	   if(!$result){
		   echo "Something is wrong".mysqli_error($con);
	   }else{
		    while($row = mysqli_fetch_array($result)){
				echo $row["id"]."  ".$row["fname"]." ".$row["lname"]."<br/>";
			}
	   }
	   
	   
	   //echo "Revieve is clicked!";
   }
   //
?>

