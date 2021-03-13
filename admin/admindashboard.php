<?php
include("../dbconn.php");
include("header.php");
include("session.php");
?>
<link rel="stylesheet" href="./css/master.css" />
<link rel="stylesheet" href="./css/userpage.css" />
<title>Dashboard | Almuni CRM</title>
</head>

<body>
	<div class="viewport">
		<div class="sidebar">
			<h2>ALMUNI CRM</h2>
			<div class="nav">
				<a href="admindashboard.php" class="navactive">Dashboard</a>
				<a href="contactpage.php">View Contacts</a>
				<a href="editcontactpage.php">Edit Contacts</a>
				<a href="annoucements.php">Announcements</a>
				<a href="aboutus.php">About Us</a>
				<a href="logout.php">Logout</a>
			</div>
		</div>
		<div class="main_content">
			<div class="header">
				<span id="username" name="uid">Currently Logged In as:
					<?= $_SESSION["uname"] ?>
				</span>
				<span id="clock" style="float: right"></span>
			</div>
			<div class="flex-container">
				<div style="text-shadow: 0px 4px 3px #000000">
					<div>
						<h2>Welcome back, <?= $_SESSION["uname"] ?>!</h2>
					</div>
				</div>
			</div>
			<div class="stats-container" style="padding-top: 0px; padding-bottom: 0px">
				<div>Total Contacts: &nbsp;<span id="contactssum"></span></div>
				<div>Total Users: &nbsp;<span id="userssum"></span></div>
				<div>Total Pending: &nbsp;<span id="pendingsum"></span></div>
				<div>Total Admins: &nbsp;<span id="adminssum"></span></div>
			</div>
			<div class="flex-container" style="padding: 0px;">
				<div style="text-shadow: 0px 4px 3px #000000">
					<div>
						Quick Actions
					</div>
				</div>
			</div>
			<div class="homeflex-container" style="padding-top: 0px; padding-bottom: 0px">
				<a href="contactpage.php" class="card">
					<div class="container">
						<h4><b>View Contacts</b></h4>
						<small>View all contacts that are submitted</small>
					</div>
				</a>
			</div>
		</div>
	</div>
	<script src="../clock.js"></script>
	<script>
		window.addEventListener("load", () => {
			updatestats();
			setInterval(() => {
				updatestats();
			}, 3000);
		});

		function updatestats() {
			let ajax = new XMLHttpRequest();

			ajax.onreadystatechange = () => {
				if (ajax.readyState === 4) {
					let returnObj = JSON.parse(ajax.responseText)
					document.getElementById("contactssum").innerHTML = returnObj.contactscount.toString();
					document.getElementById("userssum").innerHTML = returnObj.userscount.toString();
					document.getElementById("pendingsum").innerHTML = returnObj.pendingscount.toString();
					document.getElementById("adminssum").innerHTML = returnObj.admincount.toString();
				}
			};
			ajax.open("GET", "dashboardprocessor.php?origin=true", true);
			ajax.send();
		}
	</script>
</body>

</html>