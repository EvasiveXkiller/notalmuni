<?php
include("dbconn.php");
$password = "123456";

$hashedpassword = password_hash($password, PASSWORD_DEFAULT);
echo $hashedpassword;

$sql = "UPDATE `admin` SET `admin_password` = '$hashedpassword' WHERE `admin`.`admin_id` = 1";

$results = mysqli_query($conn, $sql);

if ($results) {
    echo "success";
} else {
    mysqli_error($conn);
}
