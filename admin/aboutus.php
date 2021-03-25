<?php
include("session.php");
include("header.php");
include("../dbconn.php");
?>
<link rel="stylesheet" href="./css/about.css" />
<title>About Us | Almuni CRM</title>
</head>

<body>
	<div class="viewport">
		<div class="sidebar">
			<h2>ALMUNI CRM</h2>
			<div class="nav">
			<a href="admindashboard.php">Dashboard</a>
				<a href="contactpage.php">View Contacts</a>
				<a href="editcontactpage.php">Edit Contacts</a>
				<a href="pendingcontactpage.php">Pending Contacts</a>
				<a href="annoucements.php">Announcements</a>
				<a href="aboutus.php" class="navactive">About Us</a>
				<a href="logout.php">Logout</a>
			</div>
		</div>
		<div class="main_content">
			<div class="header">
				<span id="username" name="uid">Currently Logged In as: <?= $_SESSION["uname"] ?>
					<span id="clock" style="float: right"></span>
			</div>
			<div class="heading">
				<div>
					<div>
						<h2>KNOW MORE ABOUT US</h2>
					</div>
					<div>
						<p>MEET THE TEAM</p>
					</div>
				</div>
			</div>
			<div class="bodyparent">
				<div class="bodymain">
					<div class="imagewrapper">
						<div class="image">
							<img src="./img/Jack.JPG" alt="CEO" width="300" height="200" />
							<div class="container">
								<h1>JACK CEO</h1>
								EDITOR | BIG BOSS
							</div>
						</div>
						<div class="image">
							<img src="./img/Carlson.jpg" alt="CEO" width="300" height="200" />
							<div class="container">
								<h1>CARLSON CEO</h1>
								EDITOR | GENIUS
							</div>
						</div>
						<div class="image">
							<img src="./img/Sheila.jpg" alt="COO" width="300" height="200" />
							<div class="container">
								<h1>SHEIA COO</h1>
								EDITOR | OPERATING
							</div>
						</div>
					</div>
					<hr style="width: 85%; margin: auto" />
					<div class="content">
						<div>
							<h1>Vision &amp; Mission</h1>
						</div>
						<div>
							<p><b>Our Vision</b></p>
						</div>
						<hr style="width: 150px; margin: auto" />
						<div>
							<p>To be a World Top Application</p>
						</div>
						<div>
							<p><b>Our Mission</b></p>
						</div>
						<hr style="width: 150px; margin: auto" />
						<div>
							<p class="mission">
								Our vision is to develop in a constant
								manner and grow as a major web &amp; mobile
								apps developer to become a leading
								performer, in providing quality web and
								mobile apps services.
							</p>
						</div>
						<br />
						<hr style="width: 85%; margin: auto" />
						<br />
						<div class="bottom">
							<h1>Get in touch with us.</h1>
							<div class="contactwrapper">
								<div>
									<img src="../assets/phone.png" width="50px" height="50px"></img>
								</div>
								<div class="icon_text">
									<a href="tel:03-9770 1155">03-9770 1155</a>
								</div>
								<div>
									<img src="../assets/map.png" width="50px" height="50px"></img>
								</div>
								<div class="icon_text">
									<a href="http://maps.google.com/?q=V01-06-01,Lingkaran SV Sunway Velocity, 55100 Kuala Lumpur" target="_blank">
										V01-06-01,Lingkaran SV Sunway
										Velocity, 55100 Kuala Lumpur</a>
								</div>
								<div>
									<img src="../assets/envelope.png" width="50px" height="50px"></img>
								</div>
								<div class="icon_text">
									<a href="mailto:info@sunway.edu.my">info@sunway.edu.my</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>