
<?php
include_once ('connection.php');

?>

<html>
<head>
<style>
 
  resize: none;
  

</style>
</head>
<body style="color:brown;">

<label for="comment">comment:</label>

<textarea id="comment" name="comment" rows="4" cols="20">your comment
</textarea>

<button type="button" align="left">send</button>
<style>
body {
  background-image: url('mec.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}

<?php
    if (isset($_POST['send_btn'])) {
      $errors = array('comment'=>'');
  // receive all input values from the form
  $comment = mysqli_real_escape_string($db, $_POST['comment']);
  
  $user_check_query = "SELECT * FROM registration WHERE First name='$comment'   LIMIT 1";
  $result = mysqli_query($db, $user_check_query);

   $logindatabase=mysqli_fetch_array ( $result) ;

  
  

</body>
</html>