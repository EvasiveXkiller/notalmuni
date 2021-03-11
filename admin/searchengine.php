<?php

include("../dbconn.php");

$sql = "SELECT * from `users`";
$results = mysqli_query($conn, $sql);

if (mysqli_num_rows($results) > 0) {
    while ($row = mysqli_fetch_assoc($results)) {
        echo "<option value='" . $row['username'] ."'></option>";
    }
} else {
    echo "<option value='No users'></option>";
}
