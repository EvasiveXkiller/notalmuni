<?php
    include("dbconn.php");
    include("processor.php");

    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = safe_converter($_POST["username"]);
        $password = safe_converter($_POST["pword"]);
        $hashedpass = password_hash($password, PASSWORD_DEFAULT);

        $sqlstmt = "SELECT * FROM `users` WHERE username='" . $username. "'";

        $result = mysqli_query($conn, $sqlstmt);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck != 1) {
           echo "Error";
        }
        $output = mysqli_fetch_assoc($result);
        print_r($output);
        if($output["user_password"] === $password) {
            echo "password correct";
            $_SESSION["ID"] = $output["user_ID"];
            header("location:./user/dashboard.php");
        } else {
            ?>
            <script>
            window.alert("Something went wrong, Please check your information")
            window.location.href = "./loginpage.php"
            </script>
        <?php
        }
    }

