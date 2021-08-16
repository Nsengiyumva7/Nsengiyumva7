<?php
 $server ="127.0.0.1";
 $db = mysqli_connect($server, "root","", "logindatabase");
 
 if(!$db){
	 die("Connection failed!");
 }
 
?>