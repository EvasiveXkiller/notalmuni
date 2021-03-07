<?php
require("../dbconn.php");
include("session.php");
include("header.php");

$success = "";
if (isset($_POST["update"])) {
	$username = $_POST["username"];
	$userid = $_POST["uid"];
	$useremail = $_POST["useremail"];
	$useridentity = $_POST["useridentity"];
	$useraddress = $_POST["useraddress"];
	$usergender = $_POST["usergender"];
	$userDOB = $_POST["userDOB"];
	$usermaincontact = $_POST["usermaincontact"];
	$userhomecontact = $_POST["userhomecontact"];
	$userofficecontact = $_POST["userofficecontact"];
	$usernotes = $_POST["usernotes"];
	$userstatus = $_POST["userstatus"];

	$sql = "UPDATE `users` SET username='$username', user_email='$useremail', user_identity='$useridentity', user_address='$useraddress', user_gender='$usergender', user_DOB='$userDOB', main_contact='$usermaincontact', home_contact='$userhomecontact', office_contact='$userofficecontact', user_notes='$usernotes', status_='$userstatus' WHERE user_ID='$userid' ";
	$results = mysqli_query($conn, $sql); //connects to database and runs $sql query

	if ($results) {
		$success = "Data updated!";
	} else {
		$success = "Data update failed!";
	}
}

if (isset($_POST["delete"])) {
	$userid = $_POST["uid"];	
	$sql = "DELETE from users WHERE user_ID = '$userid'";
	$results = mysqli_query($conn, $sql);
	if ($results) {
		$success = " User ID $userid has been deleted.";
	} else {
		$success = " Failed to delete User ID $userid.";
	}
}

if (isset($_POST["search"])) {  //just to output error messages if it's empty or no ID found
	$id = $_POST["id"];
	if (!empty($id)) {
		$sql = "SELECT * from users where user_ID = $id";
		$results =  (mysqli_query($conn, $sql)); //connects to database and runs the sql query
		if (mysqli_num_rows($results) == 0) {
			$success = "ID $id is nonexistent.";
		}
	} else {
		$success = "You can't search any users if no User ID is provided to search.";
	}
}

?>
<link rel="stylesheet" href="./css/master.css" />
<link rel="stylesheet" href="./css/editcontactpage.css" />
</head>

<body>
	<div class="viewport">
		<div class="sidebar">
			<h2>ALMUNI CRM</h2>
			<div class="nav">
				<a href="admindashboard.php">Dashboard</a>
				<a href="contactpage.php">View Contacts</a>
				<a href="editcontactpage.php" class="navactive">Edit Contacts</a>
				<a href="annoucements.php">Announcements</a>
				<a href="../aboutus.php">About Us</a>
				<a href="#">Licenses</a>
				<a href="logout.php">Logout</a>
			</div>
		</div>
		<div class="main_content">
			<div class="header">
				<span id="username" name="uid">Currently Logged In as: <?= $_SESSION["uname"] ?>
				</span>
				<span id="clock" style="float: right"></span>
			</div>
			<form action="editcontactpage.php" method="POST">
				<div class="grid-container">
					<div><label for="id">Input the ID you want to edit:</label></div>
					<div><input type="number" id="id" name="id"></div>

					<label for="search">Click to search and edit:</label>
					<input type="submit" name="search" value="Search">
					<div><?= $success ?></div>
				</div>
			</form>
			<?php
			if (isset($_POST["search"])) {  // draws the actual table if the id exists.
				$id = $_POST["id"];
				if (!empty($id)) {  //if the textbox is not empty then it prints the table
					$sql = "SELECT * from users where user_ID = $id";
					$results =  (mysqli_query($conn, $sql)); //connects to database and runs the sql query
					if (mysqli_num_rows($results) > 0) {
						while ($row = mysqli_fetch_assoc($results)) {
			?>
							<div class="placecenter">
								<form action="editcontactpage.php" method="POST" class="grid-container2">

									<div>UserID</div>
									<div><input type="text" name="uid" value="<?= $row["user_ID"] ?>" readonly /></div>

									<div>Username</div>
									<div><input type="text" name="username" value="<?= $row["username"] ?>" /> </div>

									<div>UserEmail</div>
									<div><input type="text" name="useremail" value="<?= $row["user_email"] ?>" /></div>

									<div>User Identity</div>
									<div><input type="text" name="useridentity" value="<?= $row["user_identity"] ?>" /></div>

									<div>Address</div>
									<div><input type="text" name="useraddress" value="<?= $row["user_address"] ?>" /></div>

									<div>User Gender</div>
									<div>
										<select name="usergender" id="gender">
											<?php
											$male = $female = $other = "";
											if ($row["user_gender"] === "male") {
												$male = "selected";
											} else if ($row["user_gender"] === "other") {
												$other = "selected";
											} else if ($row["user_gender"] === "female") {
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
									</div>

									<div>User DOB</div>
									<div><input type="text" name="userDOB" value="<?= $row["user_DOB"] ?>" /></div>

									<div>Main Contact</div>
									<div><input type="text" name="usermaincontact" value="<?= $row["main_contact"] ?>" /></div>

									<div>Home Contact</div>
									<div><input type="text" name="userhomecontact" value="<?= $row["home_contact"] ?>" /></div>

									<div>Office Contact</div>
									<div><input type="text" name="userofficecontact" value="<?= $row["office_contact"] ?>" /></div>

									<div>Notes</div>
									<div><input type="text" name="usernotes" value="<?= $row["user_notes"] ?>" /></div>

									<div>Status</div>
									<div>
										<select name="userstatus" id="userstatus">
											<?php
											$ok = $pending = "";
											if ($row["status_"] === "pending") {
												$ok = "selected";
											}
											if ($row["status_"] === "ok") {
												$pending = "selected";
											}
											?>
											<option value="ok" <?= $ok ?>>Ok</option>
											<option value="pending" <?= $pending ?>>Pending</option>
										</select>
									</div>
									<div></div>
									<div><input type="submit" name="update" value="Update" class="hover"><input type="submit" name="delete" value="Delete" class="hover"></div>

								</form>
							</div>
			<?php
						}
					}
				}
			}
			?>

		</div>

		<script src="../clock.js"></script>
</body>

</html>