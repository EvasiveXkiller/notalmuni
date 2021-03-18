<?php

include("header.php");
include("session.php");
include("../dbconn.php");

$sqlstmt = "SELECT * FROM `users` WHERE user_ID='" . $_SESSION['ID'] . "'";
$result = mysqli_query($conn, $sqlstmt);

$data = mysqli_fetch_assoc($result);
if (isset($_POST["save"])) {
	// * gets all the data
	$uid = $_SESSION["ID"];
	$name = mysqli_real_escape_string($conn, $_POST["username"]);
	$email = mysqli_real_escape_string($conn, $_POST["email"]);
	$identity = mysqli_real_escape_string($conn, $_POST["identity"]) ?? null;
	$gender = mysqli_real_escape_string($conn, $_POST["gender"]);
	$dob = mysqli_real_escape_string($conn, $_POST["dob"]) ?? null;
	$password = mysqli_real_escape_string($conn, $_POST["password"]);
	$maincontact = mysqli_real_escape_string($conn, $_POST["maincontact"]);
	$officecontact = mysqli_real_escape_string($conn, $_POST["officecontact"]);
	$homecontact = mysqli_real_escape_string($conn, $_POST["homecontact"]);
	$location = mysqli_real_escape_string($conn, $_POST["location"]) ?? null;
	$notes = mysqli_real_escape_string($conn, $_POST["notes"]) ?? null;

	$data["username"] = $name;
	$data["user_email"] = $email;
	$data["user_identity"] = $identity;
	$data["user_gender"] = $gender;
	$data["user_DOB"] = $dob;
	$data["user_password"] = $password;
	$data["main_contact"] = $maincontact;
	$data["home_contact"] = $homecontact;
	$data["office_contact"] = $officecontact;
	$data["user_address"] = $location;
	$data["user_notes"] = $notes;
}
?>
<link rel="stylesheet" href="./css/master.css" />
<link rel="stylesheet" href="./css/viewprofile.css" />
<title>View Profile | Almuni CRM</title>
</head>

<body>
	<div class="viewport">
		<div class="sidebar">
			<h2>ALMUNI CRM</h2>
			<div class="nav">
				<a href="dashboard.php">Dashboard</a>
				<a href="#" class="navactive">View Profile</a>
				<a href="editprofile.php">Edit Profile</a>
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

			<div class="flex-container">
				<div id="pageheader">
					Personal Info<br /><small>Your Information that you use on Almuni</small>
				</div>
				<div>
					<div class="card">
						<legend>Your basic info</legend>
						<table style="border-collapse: collapse; width: 100%">
							<tr>
								<td class="key">
									<label>Profile Picture</label>
								</td>
								<td class="data">
									<label>
										<?php
										if ($data["imagepath"] !== null) {
										?>
											<img src="<?= $data['imagepath'] ?>" width="auto" height="100">
										<?php
										} else {
										?>
											No Profile Picture Uploaded
										<?php
										}
										?>
									</label>

								</td>
							</tr>
							<tr>
								<td class="key">
									<label>Name</label>
								</td>
								<td class="data">
									<label><?= $data["username"] ?></label>

								</td>
							</tr>
							<tr>
								<td class="key">
									<label>Email</label>
								</td>
								<td class="data">
									<label><?= $data["user_email"] ?></label>
								</td>
							</tr>
							<tr>
								<td class="key">
									<label>Identity Number</label>
								</td>
								<td class="data">
									<label><?= $data["user_identity"] ?></label>
								</td>
							</tr>
							<tr>
								<td class="key">
									<label>Gender</label>
								</td>
								<td class="data">
									<label><?= $data["user_gender"] ?></label>
								</td>
							</tr>
							<tr>
								<td class="key">
									<label>Date of Birth</label>
								</td>
								<td class="data">
									<label><?= $data["user_DOB"] ?></label>
								</td>
							</tr>
							<tr>
								<td class="key">
									<label>Password</label>
								</td>
								<td class="data">
									<label>************</label>
								</td>
							</tr>
						</table>
					</div>
				</div>
				<div>
					<div class="card">
						<legend>Contact Info</legend>
						<table style="border-collapse: collapse; width: 100%">
							<tr>
								<td class="key">
									<label>Main Contact</label>
								</td>
								<td class="data">
									<label><?= $data["main_contact"] ?></label>
								</td>
							</tr>
							<tr>
								<td class="key">
									<label>Home</label>
								</td>
								<td class="data">
									<label><?= $data["home_contact"] ?></label>
								</td>
							</tr>
							<tr>
								<td class="key">
									<label>Office</label>
								</td>
								<td class="data">
									<label><?= $data["office_contact"] ?></label>
								</td>
							</tr>
							<tr>
								<td class="key">
									<label>Address</label>
								</td>
								<td class="data">
									<label><?= $data["user_address"] ?></label>
								</td>
							</tr>
						</table>
					</div>
				</div>
				<div>
					<div class="card">
						<legend>Extra Information</legend>
						<table style="border-collapse: collapse; width: 100%">
							<tr>
								<td class="key">
									<label>Notes</label>
								</td>
								<td class="data">
									<label><?= $data["user_notes"] ?></label>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="clock.js"></script>
</body>

</html>