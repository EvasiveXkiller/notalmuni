<?php
include("session.php");
include("header.php");
include("../dbconn.php");
?>
<link rel="stylesheet" href="./css/master.css" />
<link rel="stylesheet" href="./css/userpage.css" />
</head>
<script src="dashboard.js"></script>
<body>
	<div class="viewport">
		<div class="sidebar">
			<h2>ALMUNI CRM</h2>
			<div class="nav">
				<a href="#" class="navactive">Dashboard</a>
				<a href="viewprofile.php">View Profile</a>
				<a href="editprofile.php">Edit Profile</a>
				<a href="#">About Us</a>
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
			<div class="flex-container">
				<div style="text-shadow: 0px 4px 3px #000000;;">
					<div>
						<h2>Welcome <?= $_SESSION["uname"] ?>!</h2>
					</div>
					<br />
					<div>What would you like to do today</div>
				</div>
			</div>
			<div class="homeflex-container">
				<a href="viewprofile.html" class="card">
					<div class="container">
						<h4><b>View Information</b></h4>
						<small>View Your Information Here</small>
					</div>
				</a>
				<a href="editprofile.html" class="card">
					<div class="container">
						<h4><b>Update Information</b></h4>
						<small>Update Your Information Here</small>
					</div>
				</a>
			</div>
			<hr style="width: 50%; margin: auto;">
			<div class="flex-container" style="padding-top: 0px; padding-bottom: 0px">
				<div style="text-shadow: 0px 4px 3px #000000;">
					<div>
						<h4>Annoucements</h4>
					</div>
				</div>
			</div>
			<div class="information-flexbox" id="annoucements">
				<?php
					$selectsql = "SELECT * FROM `annoucements` LIMIT 2";
					$output = mysqli_query($conn, $selectsql);
					if(mysqli_num_rows($output) > 0) {
						while($row = mysqli_fetch_assoc($output)) {
							echo "<div class='messagebox'><div class='messagetitle'>";
							echo $row['annouce_title'];
							echo "</div>";
							echo "<div class='message'>";
							echo $row['annouce_content'];
							echo "</div>";
							echo "<div class='messagefooter'>";
							echo $row['annouce_author'] . "<br>";
							echo $row['timestamp_'] . "<br>";
							echo "</div>";
							echo "</div>";
						}
					}
				?>
				<button onclick="loadmoreannoucements()">More</button>
			</div>
			<div class="flex-container" style="padding-top: 0px; padding-bottom: 0px">
				<div>Information</div>
			</div>
			<div class="homeflex-container" style="padding-top: 0px; padding-bottom: 0px">
				<a href="viewprofile.html" class="card">
					<div class="container">
						<h4><b>About Us</b></h4>
						<small>Learn how we process your data and use
							it</small>
					</div>
				</a>
				<a href="editprofile.html" class="card">
					<div class="container">
						<h4><b>Licenses</b></h4>
						<small>Open Souce Libraries that we use</small>
					</div>
				</a>
			</div>
		</div>
	</div>
	<script src="../clock.js"></script>
</body>

</html>