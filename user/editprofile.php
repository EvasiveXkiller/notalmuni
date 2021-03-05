<?php
include("header.php");
include("session.php");
include("../dbconn.php");

$success = "";
if (isset($_POST["save"])) {
	$uid = $_SESSION["ID"];
	$name = mysqli_real_escape_string($conn, $_POST["username"]);
	$email = mysqli_real_escape_string($conn, $_POST["email"]);
	$identity = mysqli_real_escape_string($conn, $_POST["identity"]);
	$gender = mysqli_real_escape_string($conn, $_POST["gender"]);
	$dob = mysqli_real_escape_string($conn, $_POST["dob"]);
	$maincontact = mysqli_real_escape_string($conn, $_POST["maincontact"]);
	$officecontact = mysqli_real_escape_string($conn, $_POST["officecontact"]);
	$homecontact = mysqli_real_escape_string($conn, $_POST["homecontact"]);
	$location = mysqli_real_escape_string($conn, $_POST["location"]);
	$notes = mysqli_real_escape_string($conn, $_POST["notes"]);

	$sql = "UPDATE `users` SET `username` = '$name', `user_email` = '$email', `user_identity` = '$identity', `user_address` = '$location', `user_gender` = '$gender', `user_DOB` = '$dob', `main_contact` = '$maincontact', `home_contact` = '$homecontact', `office_contact` = '$officecontact', `user_notes` = '$notes' WHERE `users`.`user_ID` = '$uid'";

	$result = mysqli_query($conn, $sql);
	if ($result) {
		$success = "success";
	} else {
		$success = "failed";
	}
}

$sqlstmt = "SELECT * FROM `users` WHERE user_ID='" . $_SESSION['ID'] . "'";
$result = mysqli_query($conn, $sqlstmt);

$data = mysqli_fetch_assoc($result);
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
				<a href="#">About Us</a>
				<a href="#">Licenses</a>
				<a href="#">Logout</a>
			</div>
		</div>
		<div class="main_content">
			<div class="header">
				<span id="username" name="uid">Currently Logged In as: <?= $data["username"] ?>
				</span>
				<span id="clock" style="float: right"></span>
			</div>
			<form action="editprofile.php" method="POST">
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
							<small style="color: red;">Something went wrong!</small>
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
										<label>Name</label>
									</td>
									<td class="data">
										<input type="text" value="<?= $data["username"] ?>" placeholder="John Doe" name="username" required />
									</td>
								</tr>
								<tr>
									<td class="key">
										<label>Email</label>
									</td>
									<td class="data">
										<input type="email" value="<?= $data["user_email"] ?>" placeholder="someone@gmail.com" name="email" />
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
										<input type="tel" id="phone" name="maincontact" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="012-345-6789" value="<?= $data["main_contact"] ?>" required />
									</td>
								</tr>
								<tr>
									<td class="key">
										<label>Home</label>
									</td>
									<td class="data">
										<input type="tel" id="phone" name="homecontact" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="012-345-6789" value="<?= $data["home_contact"] ?>" required />
									</td>
								</tr>
								<tr>
									<td class="key">
										<label>Office</label>
									</td>
									<td class="data">
										<input type="tel" id="phone" name="officecontact" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="012-345-6789" value="<?= $data["office_contact"] ?>" required />
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