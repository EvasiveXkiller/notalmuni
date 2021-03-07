<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Admin Login | Almuni CRM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./css/loginpage.css" />
</head>
<body class="body">
    <div class="topbar">
        <p><span class="alumnicrm"><a href="index.php">ALUMNI CRM</a></span><b class="welcometoalumni">Welcome to Almuni!</b><span id="clock" class="clock"></span></p>
    </div>
    <div class="formbox">
        <form action="adminloginprocessor.php" method="POST">
            <div class="form">
                <img src="assets/spolight.jpg" class="picture"><br>
                <label class="switch">
                    <input type="checkbox" id="togBtn">
                    <div class="slider round"></div>
                </label>
                <div class="form__group field">
                    <input type="input" class="form__field" placeholder="Name" name="adminusername" id='name' required />
                    <label for="name" class="form__label">Admin Username</label>
                </div>
                <div class="form__group field">
                    <input type="password" class="form__field" placeholder="Password" name="adminpword" id='pword' required />
                    <label for="pword" class="form__label">Admin Password</label>
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