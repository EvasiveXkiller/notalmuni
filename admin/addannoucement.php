<?php
include("../dbconn.php");
include("session.php");
include("header.php");
?>
<link rel="stylesheet" href="./css/master.css" />
<link rel="stylesheet" href="./css/addannoucements.css" />
<title>Add Annoucement | Almuni CRM</title>
</head>

<body>
	<div class="viewport">
		<div class="sidebar">
			<h2>ALMUNI CRM</h2>
			<div class="nav">
				<a href="admindashboard.php">Dashboard</a>
				<a href="viewprofile.php">View Contacts</a>
				<a href="annoucements.php" class="navactive">Annoucements</a>
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
									<input type="text" placeholder="This is awesome" required name="title" />
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