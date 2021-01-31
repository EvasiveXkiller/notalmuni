<?php
    include("./dbconn.php");
    include("processor.php");

    if(!isset($_POST["submit"])) {
        echo "illegal origin";
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        print_r($_POST);

        $username = safe_converter($_POST["name"]);
        $password = safe_converter($_POST["pword"]);
        $email = safe_converter($_POST["email"]);
        $phone = safe_converter($_POST["phone"]);
        $identity = safe_converter($_POST["IC"]);
        $location = safe_converter($_POST["location"]);
        $gender = safe_converter($_POST["gender"]);
    }