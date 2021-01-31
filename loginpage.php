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
                <img src="EmptyProfilePicture.png" class="profilepicture">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" style="height:25px; display:flex;" required><br>

                <label for="pword">Password:</label>
                <input type="password" id="pword" name="pword" style="height:25px;" required><br>

            </div>
            <div class="buttons">
                <input type="submit" class="loginbutton" style="height:25px;" value="Login"></input><br>
            </div>
            <p style="text-align:center"> Not a user? <a href="registerpage.html">Register here!</a></p>
        </form>
    </div>
    <script src="clock.js"></script>

</body>

</html>