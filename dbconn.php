<?php

$servaddress = "127.0.0.1:10365"; // ! Changing this to "localhost" slows down the access aloat, probably due to slow dns resolving speed
$username = "root";
$password = "";
$remotedbname  = "almuni";

$conn = mysqli_connect($servaddress,$username,$password,$remotedbname);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

?>