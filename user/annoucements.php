<?php

include("../dbconn.php");

if (!isset($_GET["announceCount"])) {
    echo "illegal origin";
}

$selectsql = "SELECT * FROM `annoucements` ORDER BY timestamp_ desc LIMIT " . $_GET["announceCount"];

$output = mysqli_query($conn, $selectsql);
if (mysqli_num_rows($output) > 0) {
    while ($row = mysqli_fetch_assoc($output)) {
        echo "<div class='messagebox'><div class='messagetitle'>";
        echo $row['annouce_title'];
        echo "</div>";
        echo "<div class='message'>";
        echo $row['annouce_content'];
        echo "</div>";
        echo "<div class='messagefooter'>";
        echo $row['annouce_author'];
        echo "</div>";
        echo "</div>";
    }
    echo "<button onclick='loadmoreannoucements()'>More</button>";
}
