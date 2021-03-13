<?php
include("dbconn.php");
include("processor.php");
session_start();

$errors = array("name" => "", "password" => "");
$loginerror = array("name" => "", "password" => "");
$username = $password = "";
if (isset($_POST["login"])) {
    if (empty($_POST['adminusername'])) {
        $errors['name'] = "Username is required";
    } else {
        $username = mysqli_real_escape_string($conn, safe_converter($_POST["adminusername"]));
    }
    if (empty($_POST['adminpword'])) {
        $errors['password'] = "Password is required";
    } else {
        $password = $_POST["adminpword"];
    }
    if (!array_filter($errors)) {
        $sqlstmt = "SELECT * FROM `admin` WHERE admin_name='" . $username . "'";
        $result = mysqli_query($conn, $sqlstmt);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck != 1) {
            $loginerror["name"] = "Wrong Username";
        } else {
            $output = mysqli_fetch_assoc($result);
            if (password_verify($password, $output["admin_password"])) {
                $_SESSION["ID"] = $output["admin_id"];
                header("location:./admin/admindashboard.php");
            } else {
                $loginerror['password'] = "Wrong Password";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Admin Login | Almuni CRM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./css/loginpage.css" />
</head>
<style>
    .errors {
        padding: unset;
    }
</style>

<body class="body">
    <div class="topbar">
        <p><span class="alumnicrm"><a href="index.php">ALUMNI CRM</a></span><b class="welcometoalumni">Welcome to Almuni!</b><span id="clock" class="clock"></span></p>
    </div>
    <div class="formbox">
        <form action="adminloginpage.php" method="POST">
            <div class="form">
                <img src="assets/spolight.jpg" class="picture"><br>
                <label class="switch">
                    <input type="checkbox" id="togBtn">
                    <div class="slider round"></div>
                </label>
                <div class="form__group field">
                <?php
                $classadminnameerror = "";
                    if(!empty($errors["name"]) || !empty($loginerror["name"])) {
                        $classadminnameerror = "error";
                    }
                ?>
                    <input type="input" class="form__field <?= $classadminnameerror ?>" placeholder="Name" name="adminusername" id='name' />
                    <label for="name" class="form__label">Admin Username</label>
                    <div class="errors"><?= $errors['name'] ?><?= $loginerror['name'] ?></div>
                </div>
                <div class="form__group field">
                <?php
                $classadminpworderror = "";
                    if(!empty($errors["password"]) || !empty($loginerror["password"])) {
                        $classadminpworderror = "error";
                    }
                ?>
                    <input type="password" class="form__field <?= $classadminpworderror ?>" placeholder="Password" name="adminpword" id='pword' />
                    <label for="pword" class="form__label">Admin Password</label>
                    <div class="errors"><?= $errors['password'] ?><?= $loginerror['password'] ?></div>
                </div>
                <br>
            </div>
            <div class="buttons">
                <input type="submit" class="loginbutton" style="height:30px;" value="Login" name="login"></input><br><br>
            </div>
            <p style="font-size:10px; text-align:center;"> <i>WEDGE</i> &copy All Rights Reserved</p>

        </form>
    </div>
    <script src="clock.js"></script>
    <script>
        document.getElementById("togBtn").addEventListener("click", () => {
            window.location.href = "loginpage.php";
        })
        window.addEventListener("load", () => {
            document.getElementById("togBtn").checked = true;
        })
    </script>
</body>

</html>