<?php
include("./dbconn.php");
include("processor.php");

if (!isset($_POST["Register"])) {
    echo "illegal origin";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    print_r($_POST);

    $username = mysqli_real_escape_string($conn, safe_converter($_POST["name"]));
    $password = mysqli_real_escape_string($conn, safe_converter($_POST["pword"]));
    $email = mysqli_real_escape_string($conn, safe_converter($_POST["email"]));
    $phone = mysqli_real_escape_string($conn, safe_converter($_POST["phone"]));
    $identity = mysqli_real_escape_string($conn, safe_converter($_POST["IC"]));
    $location = mysqli_real_escape_string($conn, safe_converter($_POST["location"]) ?? null);
    $gender = mysqli_real_escape_string($conn, safe_converter($_POST["gender"]));

    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

    $status = "pending";
    $sqlstmt = "SELECT * FROM `users` WHERE username='" . $username . "'";

    $result = mysqli_query($conn, $sqlstmt);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
        echo "Error username taken";
        exit();
    } else {
        $insertsql = "INSERT INTO users (username, user_email, user_identity, user_gender, user_password, user_address, status_) VALUES (?,?,?,?,?,?,?)";

        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $insertsql)) {
            echo "Execution Failed";
            echo mysqli_stmt_error($stmt);
        } else {
            mysqli_stmt_bind_param($stmt, "sssssss", $username, $email, $identity, $gender, $hashedpassword, $location, $status);
            mysqli_stmt_execute($stmt);
            echo mysqli_stmt_error($stmt);
            echo "success";
            header("location:./registerpage.php?status=success");
        }
    }
}
