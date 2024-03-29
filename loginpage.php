<?php
include("dbconn.php");
include("processor.php");
session_start();

$name = $password = $wrongpassword = ""; //this is needed to avoid undefined error
$loginerror = array('password' => "", 'username' => "");
$errors = array('name' => "", 'password' => ""); //associative array

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["state"])) {
        $loginerror["username"] = $_GET["state"] == "pending" ? "Pending for comfirmation" : "";
    }
}

if (isset($_POST['login'])) {
    if (empty($_POST['username'])) {
        $errors['name'] = "Username is required";
    } else {
        $name = $_POST['username'];
    }
    if (empty($_POST['pword'])) {
        $errors['password'] = "Password is required";
    } else {
        $password = $_POST['pword'];
    }
    if (!array_filter($errors)) {
        $username = safe_converter($_POST["username"]);
        $password = safe_converter($_POST["pword"]);

        $sqlstmt = "SELECT * FROM `users` WHERE username='" . $username . "'";

        $result = mysqli_query($conn, $sqlstmt);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck != 1) {
            $loginerror['username'] = "Username typed does not exist!";
        } else {
            $output = mysqli_fetch_assoc($result);
            if ($output["status_"] === "pending") {
                header("location:./loginpage.php?state=pending");
                // * add a pending message here
            } else {
                if (password_verify($password, $output["user_password"])) {
                    $_SESSION["ID"] = $output["user_ID"];
                    header("location:./user/dashboard.php");
                } else {
                    $loginerror['password'] = "Wrong password!";
                    //header("location:./loginpage.php?state=err");
                    //* header throwing user to another page
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Login Page | Almuni CRM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./css/loginpage.css" />
</head>

<body>
    <div class="topbar">
        <p><span class="alumnicrm"><a href="index.php">ALUMNI CRM</a></span><b class="welcometoalumni">Welcome to Almuni!</b><span id="clock" class="clock"></span></p>

    </div>
    <div class="formbox">
        <form action="loginpage.php" method="POST">
            <div class="form">
                <img src="assets/collegestudent4.jpg" class="picture"><br>
                <label class="switch">
                    <input type="checkbox" id="togBtn">
                    <div class="slider round"></div>
                </label>

                <div class="form__group field">
                    <?php
                    $classusererror = "";
                    if (!empty($errors["name"]) || !empty($loginerror["username"])) {
                        $classusererror = "error";
                    }
                    ?>
                    <input type="input" class="form__field <?= $classusererror ?>" placeholder="Name" name="username" id='name' value="<?= $name ?>" />
                    <label for="name" class="form__label">Username</label>
                    <div style="color:red;"><?php echo $errors['name'] ?></div>
                    <div style="color:red;"><?php echo $loginerror['username'] ?></div>
                </div>

                <div class="form__group field">
                    <?php
                    $classpassworderror = "";
                    if (!empty($errors["password"]) || !empty($loginerror["password"])) {
                        $classpassworderror = "error";
                    }
                    ?>
                    <input type="password" class="form__field <?= $classpassworderror ?>" placeholder="Password" name="pword" id='pword' />
                    <label for="pword" class="form__label">Password</label>
                    <div style="color:red;"><?php echo $errors['password'] ?></div>
                    <div style="color:red;"><?php echo $loginerror['password'] ?></div>
                </div>

                <p class="forgotpassword"><a href="resetpasswordpage.php" style="text-decoration: none; color:#40736E">Forgot password?</a></p>
            </div>

            <div class="buttons">
                <input type="submit" class="loginbutton" style="height:30px;" value="Login" name="login"></input><br>
            </div>

            <br>
            <p style="text-align:center"> Not a user? <a href="registerpage.php" style="color: unset; text-decoration: underline;">Register here!</a></p><br>
            <p style="font-size:10px; text-align:center;"> <i>WEDGE</i> &copy All Rights Reserved</p>
        </form>
    </div>

    <script src="clock.js"></script>
    <script>
        document.getElementById("togBtn").addEventListener("click", () => {
            window.location.href = "adminloginpage.php";
        })
        window.addEventListener("load", () => {

        })
    </script>
</body>

</html>