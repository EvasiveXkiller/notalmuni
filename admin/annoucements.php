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
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./css/master.css" />
		<link rel="stylesheet" href="./css/annoucements.css" />
	</head>
	
    <body>
        <div class="viewport">
			<div class="sidebar">
				<h2>ALMUNI CRM</h2>
				<div class="nav">
					<a href="admindashboard.html" >Dashboard</a>
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
						>Currently Logged In as: <?= $_SESSION["uname"] ?>
					</span>
					<span id="clock" style="float: right"></span>
				</div>
				<div class="flex-container">
					<div style="text-shadow: 0px 4px 3px #000000;;">
						<div><h2>Annoucements</h2></div>
					</div>
				</div>
				<div
					class="annoucement-container"
					id="annoucement-parent"
				>
				<?php
					$selectsql = "SELECT * FROM `annoucements` LIMIT 2";
					$output = mysqli_query($conn, $selectsql);
					if(mysqli_num_rows($output) > 0) {
						while($row = mysqli_fetch_assoc($output)) {
							echo "<div class='card' id='" . $row["annouce_id"] ."'><div class='container'>";
							echo "<div class='messagetitle'>";
							echo $row['annouce_title'];
							echo "</div>";
							echo "<div class='message'>";
							echo $row['annouce_content'];
							echo "</div>";
							echo "<div class='messagefooter'>";
							echo $row['annouce_author'];
							echo "</div>";
							echo "</div>";
							echo "</div>";
						}
					}
				?>
					<div class="card" id="This is the first one">
						<div class="container">
							<div class="messagetitle">This is a word</div>
							<div class="message">Lorem ipsum dolor sit amet. Constector</div>
							<div class="messagefooter">Lorem ipsum dolor sit amet. Constector</div>
						</div>
					</div>
					<div class="card" id="This is the second one">
						<div class="container">
							<h4>Pressing this will cause the page to explode in 10 seconds</h4>
						</div>
					</div>
				</div>
			</div>c
		</div>
		<script src="../clock.js"></script>
		<script src="annouce_delete.js"></script>
    </body>
</html>