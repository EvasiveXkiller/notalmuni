<?php
include("header.php");
include("session.php");
include("../dbconn.php");

$success = "";
$errors = array("name" => "", "email" => "", "identity" => "", "maincontact" => "", "officecontact" => "", "homecontact" => "", "profilepic" => "");

$sqlstmt = "SELECT * FROM `users` WHERE user_ID='" . $_SESSION['ID'] . "'";
$result = mysqli_query($conn, $sqlstmt);
$data = mysqli_fetch_assoc($result);

$targetDir = "userimages/";
if (isset($_POST["save"])) {
	// * gets all the data
	$uid = $_SESSION["ID"];
	$name = mysqli_real_escape_string($conn, $_POST["username"]);
	$email = mysqli_real_escape_string($conn, $_POST["email"]);
	$identity = mysqli_real_escape_string($conn, $_POST["identity"]) ?? null;
	$gender = mysqli_real_escape_string($conn, $_POST["gender"]);
	$dob = mysqli_real_escape_string($conn, $_POST["dob"]) ?? null;
	$maincontact = mysqli_real_escape_string($conn, $_POST["maincontact"]);
	$officecontact = mysqli_real_escape_string($conn, $_POST["officecontact"]);
	$homecontact = mysqli_real_escape_string($conn, $_POST["homecontact"]);
	$location = mysqli_real_escape_string($conn, $_POST["location"]) ?? null;
	$notes = mysqli_real_escape_string($conn, $_POST["notes"]) ?? null;

	$data["username"] = $name;
	$data["user_email"] = $email;
	$data["main_contact"] = $maincontact;
	$data["home_contact"] = $homecontact;
	$data["office_contact"] = $officecontact;

	if (empty($name)) {
		$errors["name"] = "Username is required!";
	} else {
		if ($name != $_SESSION["uname"]) {
			// * check if username is taken
			$sql = "SELECT * FROM `users` WHERE username='$name'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) { // * username has been taken
				$errors["name"] = "Username has been taken by another user!";
			}
		}
	}
	if (empty($email)) {
		$errors["email"] = "Email cannot be empty!";
	} else {
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errors["email"] = "Email format is invalid. Example: johndoe@mail.com";
		}
	}
	if(empty($maincontact)) {
		$errors["maincontact"] = "Main Contact cannot be empty!";
	} else {
		if (!preg_match("/\+60\d{9,10}$/i", $maincontact)) { // * +60123456789
			$errors["maincontact"] = "mainContact is wrong. Format is +60123456789";
		}
	}
	if(empty($homecontact)) {
		$errors["homecontact"] = "Home contact cannot be empty!";
	} else {
		if (!preg_match("/\d{2}(\-)\d{8}$/i", $homecontact)) { // * 03-12345678(8 numbers only)
			$errors["homecontact"] = "homeContact is wrong. Format is 03-12345678";
		}
	}
	if(empty($officecontact)) {
		$errors["officecontact"] = "Office contact cannot be empty!";
	} else {
		if (!preg_match("/\d{2}(\-)\d{8}(\,)\d{2,4}$/", $officecontact)) { // * 03-12345678,1029(up to 4 numbers)
			$errors["officecontact"] = "officeContact is wrong. Format is 03-12345678,1029";
		}
	}
	if (!empty($_FILES['profilepic']['tmp_name']) || is_uploaded_file($_FILES['profilepic']['tmp_name'])) {
		$genFileName = $targetDir . basename($_FILES['profilepic']['name']);
		$imageExt = strtolower(pathinfo($genFileName, PATHINFO_EXTENSION));
		$check = getimagesize($_FILES["profilepic"]["tmp_name"]);
		if ($check == false) {
			$errors['profilepic'] = "Uploaded file is not an image";
		} else if ($_FILES["profilepic"]["size"] > 5000000) {
			$errors['profilepic'] = "Image is too large";
		} else if (
			$imageExt != "jpg" && $imageExt != "png" && $imageExt != "jpeg"
			&& $imageExt != "gif"
		) {
			$errors['proflepic'] = "Only JPG, PNG, JPEG and GIFs are allowed";
		}
	}

	if (!array_filter($errors)) {
		if (!empty($_FILES['profilepic']['tmp_name']) || is_uploaded_file($_FILES['profilepic']['tmp_name'])) {
			$newname = $_SESSION['ID'] . "." . strtolower(pathinfo($genFileName, PATHINFO_EXTENSION));
			$genFileName = $targetDir . basename($newname);
			move_uploaded_file($_FILES['profilepic']['tmp_name'], $genFileName);
			$sql = "UPDATE `users` SET `username` = '$name', `user_email` = '$email', `user_identity` = '$identity', `user_address` = '$location', `user_gender` = '$gender', `user_DOB` = '$dob', `main_contact` = '$maincontact', `home_contact` = '$homecontact', `office_contact` = '$officecontact', `user_notes` = '$notes' , `imagepath` = '$genFileName' WHERE `users`.`user_ID` = '$uid'";
		} else {
			$sql = "UPDATE `users` SET `username` = '$name', `user_email` = '$email', `user_identity` = '$identity', `user_address` = '$location', `user_gender` = '$gender', `user_DOB` = '$dob', `main_contact` = '$maincontact', `home_contact` = '$homecontact', `office_contact` = '$officecontact', `user_notes` = '$notes' WHERE `users`.`user_ID` = '$uid'";
		}
		$result = mysqli_query($conn, $sql);
		if ($result) {
			$sqlstmt = "SELECT * FROM `users` WHERE user_ID='" . $_SESSION['ID'] . "'";
			$result = mysqli_query($conn, $sqlstmt);
			$data = mysqli_fetch_assoc($result);
			$success = "success";
		} else {
			$success = "failed";
		}
	} else {
		$success = "failed";
	}
}
?>
<link rel="stylesheet" href="./css/master.css" />
<link rel="stylesheet" href="./css/editprofile.css" />
<title>Edit Profile | Almuni CRM</title>
</head>

<body>
	<div class="viewport">
		<div class="sidebar">
			<h2>ALMUNI CRM</h2>
			<div class="nav">
				<a href="dashboard.php">Dashboard</a>
				<a href="viewprofile.php">View Profile</a>
				<a href="" class="navactive">Edit Profile</a>
				<a href="aboutus.php">About Us</a>
				<a href="./logout.php">Logout</a>
			</div>
		</div>
		<div class="main_content">
			<div class="header">
				<span id="username" name="uid">Currently Logged In as: <?= $data["username"] ?>
				</span>
				<span id="clock" style="float: right"></span>
			</div>
			<form action="editprofile.php" method="POST" enctype="multipart/form-data">
				<div class="flex-container">
					<div id="pageheader">
						Edit Info<br /><small>Your Information that you use on Almuni</small><br />
						<?php
						if ($success === "success") {
						?>
							<small style="color: lightgreen;">Saved Successfully!</small>
						<?php
						}
						if ($success === "failed") {
						?>
							<small style="color: red;">Something went wrong! Please see below for error</small>
						<?php
						}
						?>
					</div>
					<div>
						<div class="card">
							<legend>Your basic info</legend>
							<table style="
										border-collapse: collapse;
										width: 100%;
									">
								<tr>
									<td class="key">
										<label>Profile Pic</label>
									</td>
									<td class="data">

										<div>
											<?php
											if ($data["imagepath"] !== null) {
											?>
												<img src="<?= $data['imagepath'] ?>" width="auto" height="100">
											<?php
											}
											?>
										</div>
										<input type="file" name="profilepic" id="profilepic">
										<div class="error"><?= $errors["profilepic"] ?></div>
									</td>
								</tr>
								<tr>
									<td class="key">
										<label>Name</label>
									</td>
									<td class="data">
										<input type="text" value="<?= $data["username"] ?>" placeholder="John Doe" name="username" required />
										<div class="error"><?= $errors["name"] ?></div>
									</td>
								</tr>
								<tr>
									<td class="key">
										<label>Email</label>
									</td>
									<td class="data">
										<input type="email" value="<?= $data["user_email"] ?>" placeholder="someone@gmail.com" name="email" />
										<div class="error"><?= $errors["email"] ?></div>
									</td>
								</tr>
								<tr>
									<td class="key">
										<label>Identity Number</label>
									</td>
									<td class="data">
										<input type="text" value="<?= $data["user_identity"] ?>" placeholder="XXXXXX-XX-XXXX" name="identity" />
									</td>
								</tr>
								<tr>
									<td class="key">
										<label>Gender</label>
									</td>
									<td class="data">
										<select name="gender" id="gender">
											<?php
											$male = $female = $other = "";
											if ($data["user_gender"] === "male") {
												$male = "selected";
											} else if ($data["user_gender"] === "other") {
												$other = "selected";
											} else if ($data["user_gender"] === "female") {
												$female = "selected";
											}
											?>
											<option value="male" <?= $male ?>>
												Male
											</option>
											<option value="female" <?= $female ?>>
												Female
											</option>
											<option value="other" <?= $other ?>>
												Prefer not to say
											</option>
										</select>
									</td>
								</tr>
								<tr>
									<td class="key">
										<label>Date of Birth</label>
									</td>
									<td class="data">
										<input type="date" name="dob" id="dateofbirth" value="<?= $data["user_DOB"] ?>" />
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div>
						<div class="card">
							<legend>Contact Info</legend>
							<table style="
										border-collapse: collapse;
										width: 100%;
									">
								<tr>
									<td class="key">
										<label>Main Contact</label>
									</td>
									<td class="data">
										<input type="text" id="phone" name="maincontact" placeholder="+60123456789" value="<?= $data["main_contact"] ?>" />
										<div class="error"><?= $errors["maincontact"] ?></div>
									</td>
								</tr>
								<tr>
									<td class="key">
										<label>Home</label>
									</td>
									<td class="data">
										<input type="text" id="phone" name="homecontact" placeholder="03-12345678" value="<?= $data["home_contact"] ?>" />
										<div class="error"><?= $errors["homecontact"] ?></div>
									</td>
								</tr>
								<tr>
									<td class="key">
										<label>Office</label>
									</td>
									<td class="data">
										<input type="text" id="phone" name="officecontact" placeholder="012-345-6789" value="<?= $data["office_contact"] ?>" />
										<div class="error"><?= $errors["officecontact"] ?></div>
									</td>
								</tr>
								<tr>
									<td class="key">
										<label>Address</label>
									</td>
									<td class="data">
										<textarea id="location" name="location" cols="60" rows="10" placeholder="Name, street number, street name, region, postal code and town/city, state."><?= $data["user_address"] ?></textarea><br />
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div>
						<div class="card">
							<legend>Extra Information</legend>
							<table style="
										border-collapse: collapse;
										width: 100%;
									">
								<tr>
									<td class="key">
										<label>Notes</label>
									</td>
									<td class="data">
										<textarea cols="60" rows="10" name="notes"><?= $data["user_notes"] ?> </textarea>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div>
						<div class="card">
							<input type="submit" value="Save" name="save">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<script src="clock.js"></script>
</body>

</html>