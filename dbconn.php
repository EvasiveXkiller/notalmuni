<?php

$servaddress = "localhost:3306";
$username = "root";
$password = "123456";
$remotedbname  = "almuni";

$conn = mysqli_connect($servaddress,$username,$password,$remotedbname);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

?>