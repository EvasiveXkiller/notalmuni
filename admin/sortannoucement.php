<?php

include("../dbconn.php");
if(!isset($_GET["sort"])) {
    echo "illegal origin";
    header("location:./admindashboard.php");
    exit();
}
$sortmethod = "";

switch($_GET["sort"]) {
    case "IDasc" :
        $sortmethod = "annouce_id asc";
        break;
    case "IDdesc" :
        $sortmethod = "annouce_id desc";
        break;
    case "Dateasc":
        $sortmethod = "timestamp_ asc";
        break;
    case "Datedesc":
        $sortmethod = "timestamp_ desc";
        break;
    case "Titleasc":
        $sortmethod = "annouce_title asc";
        break;
    case "Titledesc":
        $sortmethod = "annouce_title desc";
        break;
}       

$selectsql = "SELECT * FROM `annoucements` order by " . $sortmethod;
$output = mysqli_query($conn, $selectsql);
if (mysqli_num_rows($output) > 0) {
    while ($row = mysqli_fetch_assoc($output)) {
        echo "<div class='card' id='" . $row["annouce_id"] . "'><div class='container'>";
        echo "<div class='messagefooter'>";
        echo "ID:" . $row['annouce_id'] . "<br>";
        echo "</div>";
        echo "<div class='messagetitle'>";
        echo $row['annouce_title'];
        echo "</div>";
        echo "<div class='message'>";
        echo $row['annouce_content'];
        echo "</div>";
        echo "<div class='messagefooter'>";
        echo $row['annouce_author'] . "<br>";
        echo $row['timestamp_'] . "<br>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
}
