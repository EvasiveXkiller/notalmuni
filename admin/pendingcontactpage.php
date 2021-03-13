<?php
require("../dbconn.php");
include("session.php");
include("header.php");

$sqluser = "SELECT * FROM `users` WHERE status_ = 'pending'  ";
$usertableresult = mysqli_query($conn, $sqluser);          //connects to database and runs query
$usertablecheck = mysqli_num_rows($usertableresult);
?>
<!DOCTYPE html>

<head>
	<link rel="stylesheet" href="./css/master.css" />
	<link rel="stylesheet" href="./css/pendingcontactpage.css" />
</head>

<body>
	<div class="viewport">
		<div class="sidebar">
			<h2>ALMUNI CRM</h2>
			<div class="nav">
				<a href="admindashboard.php">Dashboard</a>
				<a href="contactpage.php">View Contacts</a>
				<a href="editcontactpage.php">Edit Contacts</a>
				<a href="pendingcontactpage.php" class="navactive">Pending Contacts</a>
				<a href="annoucements.php">Announcements</a>
				<a href="aboutus.php">About Us</a>
				<a href="logout.php">Logout</a>
			</div>
		</div>
		<div class="main_content">
			<div class="header">
				<span id="username" name="uid">Currently Logged In as: <?= $_SESSION["uname"] ?>
				</span>
				<span id="clock" style="float: right"></span>
			</div>
			<form>
				<table class="table">
					<tr class="hover">
						<td>Checkbox</td>
						<td>Username</td>
						<td>UserID</td>
						<td>UserEmail</td>
						<td>User Identity</td>
						<td>Address</td>
						<td>User Gender</td>
						<td>User DOB</td>
						<td>Main Contact</td>
						<td>Home Contact</td>
						<td>Office Contact</td>
						<td>Notes</td>
						<td>Status</td>
					</tr>
					<?php
					if ($usertablecheck > 0)   //no. of output results
					{
						while ($row = mysqli_fetch_assoc($usertableresult)) {   // runs through the results    //fetches array of data from database
					?>
							<tr class="hover">
								<td><label for="boxcheck"><input type="checkbox" id="boxcheck" name="boxcheck"></td>
								<td><?= $row["username"] ?></td>
								<!--?= only used for printing variables from PHP -->
								<td><?= $row["user_ID"] ?></td>
								<td><?= $row["user_email"] ?></td>
								<td><?= $row["user_identity"] ?></td>
								<td><?= $row["user_address"] ?></td>
								<td><?= $row["user_gender"] ?></td>
								<td><?= $row["user_DOB"] ?></td>
								<td><?= $row["main_contact"] ?></td>
								<td><?= $row["home_contact"] ?></td>
								<td><?= $row["office_contact"] ?></td>
								<td><?= $row["user_notes"] ?></td>
								<td><?= $row["status_"] ?></td>
							</tr>
					<?php
						}
					}
					?>

				</table>
			</form>
			<script src="../clock.js"></script>
</body>

</html>