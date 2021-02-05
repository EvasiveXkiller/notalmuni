<?php
	session_start();
	include('../dbconn.php');
	
	if (!isset($_SESSION['ID']) ||(trim ($_SESSION['ID']) == '')) {
	    //header('location:../adminloginpage.php');
        exit();
	}
    $sqlstmt = "SELECT * FROM `admin` WHERE admin_ID='" . $_SESSION['ID'] . "'";
    
	$result = mysqli_query($conn, $sqlstmt);
    $output = mysqli_fetch_assoc($result);
    $check = mysqli_num_rows($result);

    $_SESSION['uname'] = $output['admin_name'];
