<?php
include("../dbconn.php");
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title></title>
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="./css/master.css" />
		<link rel="stylesheet" href="./css/addannoucements.css" />
	</head>

	<body>
		<div class="viewport">
			<div class="sidebar">
				<h2>ALMUNI CRM</h2>
				<div class="nav">
					<a href="admindashboard.html">Dashboard</a>
					<a href="viewprofile.php">View Contacts</a>
					<a href="#" class="navactive">Annoucements</a>
					<a href="#">About Us</a>
					<a href="#">Licenses</a>
					<a href="#">Logout</a>
				</div>
			</div>
			<div class="main_content">
				<div class="header">
					<span id="username" name="uid"
						>Currently Logged In as:
					</span>
					<span id="clock" style="float: right"></span>
				</div>
				<div class="flex-container">
					<div id="pageheader">
						<small>Add a new Announcement</small>
					</div>
					<div class="card" style="padding: initial">
						<legend>New Annoucement</legend>
						<form method="POST" action="addannoucementsprocessor.php">
						<table style="border-collapse: collapse; width: 100%">
							<tr>
								<td class="key">
									<label>Title</label>
								</td>
								<td class="data">
									<input
										type="text"
										placeholder="This is awesome"
										required
										name="title"
									/>
								</td>
							</tr>
							<tr>
								<td class="key">
									<label>Content</label>
								</td>
								<td class="data">
									<textarea rows="10" name="content"></textarea>
								</td>
							</tr>
							<tr>
								<td></td>
								<td><button name="Submit">Submit</button></td>
							</tr>
						</table>
					</form>
					</div>
				</div>
				<div></div>
			</div>
		</div>
		<script src="../clock.js"></script>
	</body>
</html>
