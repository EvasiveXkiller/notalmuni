<?php
include("../dbconn.php");
include("header.php");
include("session.php")
?>
<link rel="stylesheet" href="./css/master.css" />
<link rel="stylesheet" href="./css/annoucements.css" />
<title>Annoucement Manager | Almuni CRM</title>
</head>

<body>
	<div class="viewport">
		<div class="sidebar">
			<h2>ALMUNI CRM</h2>
			<div class="nav">
				<a href="admindashboard.php">Dashboard</a>
				<a href="contactpage.php">View Contacts</a>
				<a href="editcontactpage.php">Edit Contacts</a>
				<a href="annoucements.php" class="navactive">Annoucements</a>
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
			<div class="flex-container">
				<div style="text-shadow: 0px 4px 3px #000000;;">
					<div>
						<h2>Annoucements</h2>
						<button id="addmore" onclick="redirectToAdd()">+</button>
					</div>
				</div>
				<div style="margin-left:auto; order:2">
					<div>
						<span id="sort">Sort By:</span>
						<select id="sortmethod" name="sortmethod">
							<option value="IDasc">ID Asc</option>
							<option value="IDdesc">ID Desc</option>
							<option value="Dateasc">Date Asc</option>
							<option value="Datedesc">Date Desc</option>
							<option value="Titleasc">Title Asc</option>
							<option value="Titledesc">Title Desc</option>
						</select>
					</div>
				</div>
			</div>
			<div class="annoucement-container" id="annoucement-parent">
				<?php
				$selectsql = "SELECT * FROM `annoucements`";
				$output = mysqli_query($conn, $selectsql);
				if (mysqli_num_rows($output) > 0) {
					while ($row = mysqli_fetch_assoc($output)) {
						echo "<div class='card' id='" . $row["annouce_id"] . "'><div class='container'>";
						echo "<div class='messagefooter'>";
						echo "ID:" . $row['annouce_id'] . "<br>";
						echo "</div>";
						echo "<div class='messagetitle'>";
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
						echo "</div>";
					}
				}
				?>
			</div>
		</div>
	</div>
	<script src="../clock.js"></script>
	<script src="annouce.js"></script>
</body>

</html>