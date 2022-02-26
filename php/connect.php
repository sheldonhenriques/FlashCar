<?php

$conn = mysqli_connect("localhost","root","root");
mysqli_select_db($conn,"login1") or die("couldn't find database");
if(!$conn)
	 echo "Error";
 //else 
	 //echo "Connected"



?>