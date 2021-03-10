<?php
include("./dbconn.php");
include("./processor.php");

$errors = array('resetname' => "", 'resetpword' => "", 'confirmpword' => "");
$name = $resetpword = $confirmpword = "";      //associative array 
if (isset($_POST['reset'])) {
    if (empty($_POST['resetname'])) {                     //checks if the email text box is empty when submitted
        $errors['resetname'] = "Username is required";
    } else {
        $name = $_POST['resetname']; // * name is unique in the database
    }

    if (empty($_POST['resetpword'])) {
        $errors['resetpword'] = "Password is required";             //checks if the password text box is empty when submitted
    } else {
        $resetpword = $_POST['resetpword'];
    }

    if (empty($_POST['confirmpword'])) {
        $errors['cofirmpword'] = "Please retype your password to confirm";       //checks if the confirm password text box is empty when submitted
    } else {
        $confirmpword = $_POST['confirmpword'];
    }

    if (!empty($_POST['resetpword']) && !empty($_POST['confirmpword'])) {
        if ($resetpword !== $confirmpword) {
            $errors["confirmpword"] = "Passwords do not match";
        }
    }
    if (!array_filter($errors)) {
        echo "entered";
        $name = mysqli_real_escape_string($conn, safe_converter($_POST["resetname"]));
        $confirmpword = mysqli_real_escape_string($conn, safe_converter($_POST["confirmpword"]));
        $hashedpassword = password_hash($confirmpword, PASSWORD_DEFAULT);
        $sql = "UPDATE `users` SET `user_password` = '$hashedpassword', `status_` = 'pending' WHERE `users`.`username` = '$name'";
        $result = mysqli_query($conn, $sql);
    }
    /*
        > Things to do
        * Add error message on password not same
        * a button to go back to the login screen
    */
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Reset Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./css/loginpage.css" />
</head>

<body class="body">
    <div class="topbar">
        <p><span class="alumnicrm"><a href="./index.php"> ALUMNI CRM</a></a></span><b class="welcometoalumni">Welcome to Almuni!</b><span id="clock" class="clock"></span></p>
    </div>
    <div class="formbox">
        <form action="resetpasswordpage.php" method="POST">
            <div class="form">
                <img src="assets/spolight.jpg" class="picture"><br>
                <h3 style="text-align:center;">Reset Password</h3>

                <div class="form__group field">
                    <input type="text" id="resetemail" class="form__field" name="resetname" style="height: 25px" placeholder="John Doe"><br>
                    <label for="resetemail" class="form__label">Username</label>
                    <div><?php echo $errors['resetname'] ?></div><br>
                </div>
                <div class="form__group field">
                    <input type="password" id="resetpword" class="form__field" name="resetpword" placeholder="Reset Password" style="height:25px;"><br>
                    <label for="resetpword" class="form__label">Reset Password</label>
                    <div><?php echo $errors['resetpword'] ?></div><br>
                </div>
                <div class="form__group field">
                    <input type="password" id="confirmpword" class="form__field" name="confirmpword" placeholder="Confirm Password" style="height:25px;"><br>
                    <label for="confirmpword" class="form__label">Confirm Password:</label>
                    <div><?php echo $errors['confirmpword'] ?></div><br>
                </div>
            </div><br>
            <div class="buttons">
                <input type="submit" class="loginbutton" style="height:30px;" value="Reset" name="reset"></input><br><br>
            </div>
            <p style="font-size:10px; text-align:center;"> <i>WEDGE</i> &copy All Rights Reserved</p>
        </form>
    </div>
    <script src="clock.js"></script>
</body>

</html>