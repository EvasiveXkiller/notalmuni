<?php

include("../dbconn.php");

if (!isset($_GET["deleteAnnoucement"])) {
    echo "illegal origin";
    header("location:./admindashboard.php");
    exit();
}

$deletesql = "DELETE FROM `annoucements` WHERE (`annouce_id` = " . $_GET['deleteAnnoucement'] . ")";

$output = mysqli_query($conn, $deletesql);

echo json_encode("Success");
