<?php
    include("dbconn.php");
    include("processor.php");

    session_start();

    if(!isset($_POST["login"])) {
        header("location:./adminloginpage.php");
    }
    print_r($_POST);
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = safe_converter($_POST["adminusername"]);
        $password = safe_converter($_POST["adminpword"]);

        $sqlstmt = "SELECT * FROM `admin` WHERE admin_name='" . $username. "'";

        $result = mysqli_query($conn, $sqlstmt);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck != 1) {
           echo "Error";
        }
        $output = mysqli_fetch_assoc($result);
        if($output["admin_password"] == 123456) {
            $_SESSION["ID"] = $output["admin_id"];
            header("location:./admin/admindashboard.php");
        } else {
            header("location:./adminloginpage.php?state=err");
        }
    }

