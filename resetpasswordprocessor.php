<?php
    include("./dbconn.php");
    include("./processor.php");


    if(!isset($_POST["reset"])) {
        echo "illegal origin";
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = mysqli_real_escape_string($conn, safe_converter($_POST["resetemail"]) );
        $password = mysqli_real_escape_string($conn, safe_converter($_POST["resetpword"]));
        $repassword = mysqli_real_escape_string($conn, safe_converter($_POST["comfirmpword"]));

        // * check if password is the same
        if($password !== $repassword) {
            echo "Password do not match";
            // * header("location:./resetpassword.php?pword=0");
        }
        // email check

        // if email check success, insert into database and wait for comfirmation
    }
