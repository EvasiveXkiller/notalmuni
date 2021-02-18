<?php
$errors = array('resetemail'=>"", 'resetpword'=>"", 'confirmpword'=>"");      //associative array 
if (isset($_POST['submit'])){
    if (empty($_POST['resetemail'])){                     //checks if the email text box is empty when submitted
        $errors['resetemail'] = "Email is required";         
    } else {
        $email = $_POST['resetemail'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){        //uses filter to validate email
            $errors['resetemail'] = "Please enter a valid email. Example: abc@hotmail.com";     
        }
    }

    if (empty($_POST['resetpword'])){
        $errors['resetpword'] = "Password is required";             //checks if the password text box is empty when submitted
    } else {
        $errors = $_POST['resetpword'];
    }

    if (empty($_POST['confirmpword'])){
        $errors['confirmpword'] = "Please retype your password to confirm";       //checks if the confirm password text box is empty when submitted
    } else {
        $errors ['confirmpword'] = $_POST['confirmpword'];
    }
}
?>

<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8" />
        <title>Reset Password</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="./css/loginpage.css" />
    </head>

    <body class="body">
        <div class="topbar">
            <p><span class="alumnicrm">ALUMNI CRM</span><b class="welcometoalumni">Welcome to Almuni!</b><span id="clock" class="clock"></span></p>
        </div>
        <div class="formbox">
            <form action="resetpasswordpage.php" method="POST">
                <div class="form">
                    <img src="assets/spolight.jpg" class="picture"><br>
                    <h3 style="text-align:center;">Reset Password</h3>

                    <div class="form__group field">
                        <input type="text" id="resetemail" class="form__field" name="resetemail" style="height: 25px" placeholder="abc@gmail.com" ><br>
                        <label for="resetemail" class="form__label">Email</label>
                        <div><?php echo $errors['resetemail'] ?></div><br>
                    </div>
                    <div class="form__group field">
                        <input type="text" id="resetpword" class="form__field" name="resetpword" placeholder="Reset Password" style="height:25px;"><br>
                        <label for="resetpword" class="form__label">Reset Password</label>
                        <div><?php echo $errors['resetpword'] ?></div><br>
                    </div>
                    <div class="form__group field">
                        <input type="text" id="confirmpword" class="form__field" name="confirmpword" placeholder="Confirm Password" style="height:25px;" ><br>
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