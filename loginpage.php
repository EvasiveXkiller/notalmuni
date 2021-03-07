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
        <form action="loginprocessor.php" method="POST">
            <div class="form">
                <img src="assets/collegestudent4.jpg" class="picture"><br>
                <label class="switch">
                    <input type="checkbox" id="togBtn">
                    <div class="slider round"></div>
                </label>
                <div class="form__group field">
                    <input type="input" class="form__field" placeholder="Name" name="username" id='name' required />
                    <label for="name" class="form__label">Name</label>
                </div>
                <div class="form__group field">
                    <input type="password" class="form__field" placeholder="Password" name="pword" id='pword' required />
                    <label for="pword" class="form__label">Password</label>
                </div>
                <p class="forgotpassword"><a href="resetpasswordpage.php" style="text-decoration: none; color:#40736E">Forgot password?</a></p>
            </div>
            <div class="buttons">
                <input type="submit" class="loginbutton" style="height:30px;" value="Login" name="login"></input><br>
            </div>
            <br>
            <p style="text-align:center"> Not a user? <a href="registerpage.php">Register here!</a></p><br>
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
<!-- <?php
if (isset($_GET["state"])) {
    if ($_GET["state"] == "err") {
?>
        <script>
            alert("Login Error! Check your information")
        </script>
    <?php
    } else if ($_GET["state"] == "pending") {
    ?>
        <script>
            alert("Pending for verification. Please wait for admin to approve")
        </script>
<?php
    }
}
?> -->