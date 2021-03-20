<?php
include("./dbconn.php");
include("processor.php");
$errors = array('username' => "", 'email' => "", 'phone' => "", 'password' => "", "password2" => "");
$username = $password = $password2 = $email = $phone = $identity = $location = $gender = "";
if (isset($_POST["Register"])) {
	$password = mysqli_real_escape_string($conn, safe_converter($_POST["pword"]));
	$password2 = mysqli_real_escape_string($conn, safe_converter($_POST["pword2"]));
	$identity = mysqli_real_escape_string($conn, safe_converter($_POST["IC"]) ?? null);
	$location = mysqli_real_escape_string($conn, safe_converter($_POST["location"]) ?? null);
	$gender = mysqli_real_escape_string($conn, safe_converter($_POST["gender"]));
	$hashedpassword = password_hash($password, PASSWORD_DEFAULT);
	$status = "pending";

	if (empty($_POST["name"])) {
		$errors["username"] = "Username is required!";
	} else {
		$username = mysqli_real_escape_string($conn, safe_converter($_POST["name"]));
		$sqlstmt = "SELECT * FROM `users` WHERE username='" . $username . "'";
		$result = mysqli_query($conn, $sqlstmt);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck > 0) {
			$errors["username"] = "Username is taken by another user!";
		}
	}
	if (empty($_POST['email'])) {
		$errors['email'] = "Email is required";
	} else {
		$email = mysqli_real_escape_string($conn, safe_converter($_POST["email"]));
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errors['email'] = "Please enter a valid email. Example: abc@hotmail.com";
		}
	}
	if (empty($_POST["phone"])) {
		$errors["phone"] = "Phone is required! Format is +60123456789";
	} else {
		$phone = mysqli_real_escape_string($conn, safe_converter($_POST["phone"]));
		if (!preg_match("/\+60\d{9,10}$/i", $phone)) { // * +60123456789
			$errors["phone"] = "Phone Number is wrong. Format is +60123456789";
		}
	}
	if (empty($_POST["pword"])) {
		$errors["password"] = "Password is required";
	}
	if (empty($_POST["pword2"])) {
		$errors["password2"] = "Retype your password!";
	}
	if (!empty($_POST["pword"]) && !empty($_POST["pword2"])) {
		if ($_POST["pword"] !== $_POST["pword2"]) {
			$errors["password2"] = "Passwords do not match";
		}
	}
	if (!array_filter($errors)) {
		$insertsql = "INSERT INTO users (username, user_email, user_identity, user_gender, user_password, user_address, status_, main_contact) VALUES (?,?,?,?,?,?,?,?)";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $insertsql)) {
			echo mysqli_stmt_error($stmt);
		} else {
			mysqli_stmt_bind_param($stmt, "ssssssss", $username, $email, $identity, $gender, $hashedpassword, $location, $status, $phone);
			mysqli_stmt_execute($stmt);
			header("location:./registerpage.php?status=success");
		}
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>Register now! | Almuni CRM</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="./css/registerpage.css" />
</head>

<body>
	<div class="topbar">
		<p>
			<span class="alumnicrm"><a href="index.php">ALUMNI CRM</a></span><b class="welcometoalumni">Welcome to Almuni!</b><span id="clock" class="clock"></span>
		</p>
	</div>
	<form action="registerpage.php" method="POST">
		<div class="centerbox">
			<div class="boxtitle">Create your Almuni Account</div>
			<div class="registerformboxtable">
				<div class="col">
					<div class="form__group field">
						<input type="input" class="form__field <?php echo empty($errors["username"]) ? '' : "error" ?>" placeholder="Name" name="name" id="name" value="<?= $username ?>" />
						<label for="name" class="form__label">Name</label>
						<div class="errors"><?= $errors["username"] ?></div>
					</div>
					<div class="form__group field">
						<input type="text" class="form__field <?php echo empty($errors["email"]) ? '' : "error" ?>" placeholder="Email" name="email" id="email" value="<?= $email ?>">
						<label for="email" class="form__label">Email</label>
						<div class="errors"><?= $errors["email"] ?></div>
					</div>
					<div class="form__group field">
						<input type="tel" class="form__field <?php echo empty($errors["phone"]) ? '' : "error" ?>" placeholder="Phone Number" name="phone" id="phone" value="<?= $phone ?>" />
						<label for="phone" class="form__label">Phone Number</label>
						<div class="errors"><?= $errors["phone"] ?></div>
					</div>
					<div class="form__group field">
						<input type="text" class="form__field" placeholder="Address" name="location" id="address" value="<?= $location ?>" />
						<label for="address" class="form__label">Address</label>
					</div>
				</div>
				<div class="col">
					<div class="form__group field">
						<input type="password" class="form__field <?php echo empty($errors["password"]) ? '' : "error" ?>"" placeholder=" Password" name="pword" id="pword" />
						<label for="pword" class="form__label">Password</label>
						<div class="errors"><?= $errors["password"] ?></div>
					</div>
					<div class="form__group field">
						<input type="password" class="form__field <?php echo empty($errors["password2"]) ? '' : "error" ?>"" placeholder=" Password" name="pword2" id="pword2" />
						<label for="pword2" class="form__label">Comfirm Password</label>
						<div class="errors"><?= $errors["password2"] ?></div>
					</div>
					<div class="form__group field">
						<input type="number" class="form__field" placeholder="Identity Number" name="IC" maxlength="12" id="IC" value="<?= $identity ?>" />
						<label for="IC" class="form__label">Identity Number</label>
					</div>

					<div class="form__group field" style="padding-bottom: 15px">
						Gender:
						<?php
						$male = $female = $other = "";
						if (isset($_POST["Register"])) {
							switch ($gender) {
								case "male":
									$male = "checked";
									break;
								case "female":
									$female = "checked";
									break;
								case "other":
									$other = "checked";
									break;
							}
						} else {
							$male = "checked";
						}
						?>
						<div class="radiowrapper">
							<input type="radio" id="male" name="gender" value="male" <?= $male ?> />
							<label for="male">Male</label>
						</div>
						<div class="radiowrapper">
							<input type="radio" id="female" name="gender" value="female" <?= $female ?> />
							<label for="female">Female</label>
						</div>
						<div class="radiowrapper">
							<input type="radio" id="other" name="gender" value="other" <?= $other ?> />
							<label for="other">Other</label>
						</div>
					</div>
				</div>
			</div>
			<div class="footerboxsubmit">
				<button type="submit" value="Register" name="Register">Register</button><br />
			</div>
			<div class="footerboxsignin">
				<button onclick="redirect()">Sign In Instead</button><br />
			</div>
			<?php
			if (isset($_GET["status"])) {
				if ($_GET["status"] == "success") {
					echo "<div class='footerboxsignin' style='padding: 20px; color: lightgreen; text-align: center;'>
							<p>Successfully Signed Up! Please wait for admin comfirmation.</p>
							<span id='timeredirect'></span>
						</div>";

			?>
					<script>
						window.addEventListener("load", () => {
							mainwait();
						})

						function sleep(time) {
							return new Promise((func) => setTimeout(func, time));
						}
						async function mainwait() {
							for (let index = 10; index > 0; index--) {
								document.getElementById("timeredirect").innerHTML = "Redirecting in " + index
								await sleep(1000)
							}
							window.location.href = "./loginpage.php"
						}
					</script>
			<?php
				}
			}
			?>
		</div>
	</form>
	<script src="clock.js"></script>
	<script>
		function redirect() {
			event.preventDefault()
			window.location.href = "./loginpage.php"
		}
	</script>
</body>

</html>