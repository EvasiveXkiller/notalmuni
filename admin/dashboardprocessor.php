<?php

include("../dbconn.php");

if (!isset($_GET["origin"])) {
    echo "illegal origin";
    header("location:./admindashboard.php");
}
$send = array();

$selectsql = "SELECT * FROM `users`";

$output = mysqli_query($conn, $selectsql);
$send["contactscount"] = mysqli_num_rows($output);

$selectsql = "SELECT * FROM `users`";

$output = mysqli_query($conn, $selectsql);
$send["userscount"] = mysqli_num_rows($output);

$selectsql = "SELECT * FROM `users` where status_='pending'";

$output = mysqli_query($conn, $selectsql);
$send["pendingscount"] = mysqli_num_rows($output);

$selectsql = "SELECT * FROM `admin`";

$output = mysqli_query($conn, $selectsql);
$send["admincount"] = mysqli_num_rows($output);

echo json_encode($send);