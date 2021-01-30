<?php
	session_start();
	include('../dbconn.php');
	
	if (!isset($_SESSION['ID']) ||(trim ($_SESSION['ID']) == '')) {
	    header('location:../loginpage.php');
        exit();
	}
    $sqlstmt = "SELECT * FROM `users` WHERE user_ID='" . $_SESSION['ID'] . "'";
    
	$result = mysqli_query($conn, $sqlstmt);
    $output = mysqli_fetch_assoc($result);
    $check = mysqli_num_rows($result);

    $_SESSION['uname'] = $output['username'];
