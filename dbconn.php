<?php

$servaddress = "127.0.0.1:3306"; // ! Changing this to localhost slows down the access aloat
$username = "root";
$password = "12345";
$remotedbname  = "almuni";

$conn = mysqli_connect($servaddress,$username,$password,$remotedbname);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

?>