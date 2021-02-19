<?php
    include("dbconn.php");
    include("processor.php");

    session_start();

    if(!isset($_POST["login"])) {
        //header("location:./loginpage.php");
        echo "illegal origin";
    }
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = safe_converter($_POST["username"]);
        $password = safe_converter($_POST["pword"]);

        $sqlstmt = "SELECT * FROM `users` WHERE username='" . $username. "'";

        $result = mysqli_query($conn, $sqlstmt);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck != 1) {
           echo "Error";
        }
        $output = mysqli_fetch_assoc($result);
        if($output["status_"] === "pending") {
            header("location:./loginpage.php?state=pending");
            exit(0);
        }
        if(password_verify($password, $output["user_password"])) {
            $_SESSION["ID"] = $output["user_ID"];
            header("location:./user/dashboard.php");
        } else {
            header("location:./loginpage.php?state=err");
        }
    }
