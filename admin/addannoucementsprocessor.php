<?php

include("../dbconn.php");
include("../processor.php");
include("session.php");

if (!isset($_POST["Submit"])) {
    echo "illegal origin";
    header("location:./admindashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //print_r($_POST);
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $content = mysqli_real_escape_string($conn, $_POST["content"]);
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $timestamp = date("Y-m-d H:i:s");
    $author = $_SESSION["uname"];
    $insertsql = "INSERT INTO annoucements (annouce_title, annouce_content, annouce_author, timestamp_) VALUES (?,?,?,?)";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $insertsql)) {
        echo "Execution Failed";
        echo mysqli_stmt_error($stmt);
    } else {
        mysqli_stmt_bind_param($stmt, "ssss", $title, $content, $author, $timestamp);
        mysqli_stmt_execute($stmt);
        echo mysqli_stmt_error($stmt);
        echo "success";
        header("location:./annoucements.php");
    }
}
