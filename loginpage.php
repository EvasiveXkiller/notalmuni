    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8" />
        <title>Login Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="./css/loginpage.css" />
    </head>

    <body class="body">

        <div class="topbar">
            <p><span class="alumnicrm">ALUMNI CRM</span><b class="welcometoalumni">Welcome to Almuni!</b><span id="clock" class="clock"></span></p>

        </div>

        <div class="formbox">
            <form action="loginprocessor.php" method="POST">
                <div class="form">
                    <img src="assets/spolight.jpg" class="picture"><br>
                    <div class="buttons">
                    <a href="adminloginpage.html" class="userloginbutton">ADMIN LOGIN</a><br><br>
                    </div>
                    <label for="username"></label>
                    <input type="text" id="username" name="username" style="height:25px; display:flex; border-radius:40px;" placeholder="Username"required><br>

                    <label for="pword"></label>
                    <input type="password" id="pword" name="pword" placeholder="Password"style="height:25px;border:1px; border-radius:40px;" required>

                    <p class="forgotpassword"><a href="resetpasswordpage.html" style="text-decoration: none; color:#40736E">Forgot password?</a></p>
                </div>
                <div class="buttons">
                    <input type="submit" class="loginbutton" style="height:30px;" value="Login" name="login"></input><br>
                </div>
                <p style="text-align:center"> Not a user? <a href="registerpage.php">Register here!</a></p><br>
                <p style="font-size:10px; text-align:center;"> Wedge &copy All Rights Reserved</p>
            </form>
        </div>
        <script src="clock.js"></script>
    </body>

    </html>
    <!-- <?php
        if (isset($_GET["state"])) {
            if($_GET["state"] == "err") {
        ?>
        <script>
                alert("Login Error! Check your information")
        </script>
        <?php
        } else if ($_GET["state"] == "pending"){
        ?>
            <script>
                alert("Pending for verification. Please wait for admin to approve")
            </script>
        <?php
        }
        }
        ?> -->