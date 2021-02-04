<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>Register Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="./css/loginpage.css" />
</head>

<body class="body">
	<div class="topbar">
		<p>
			<span class="alumnicrm">ALUMNI CRM</span><b class="welcometoalumni">Welcome to Almuni!</b><span id="clock"
				class="clock"></span>
		</p>
	</div>

	<div class="registerformboxtable">
		<table style="border-spacing:15px; border-collapse: separate;">
		<form action="registerprocessor.php" method="POST">
				<tr>
				<td colspan="4">
				<div class="form">
				<img src="EmptyProfilePicture.png" class="picture" style="max-width:30%;" />
				</td>
				</tr>
				<tr>
				<td><label for="name">Name: *</label></td>
				<td><input type="text" id="name" name="name" style="height: 25px" required /><br /></td>
				<td><label for="pword">Password: *</label></td>
				<td><input type="password" id="pword" name="pword" style="height: 25px" required /><br /></td>
				</tr>
				<tr>
				<td><label for="email">Email: *</label></td>
				<td><input type="email" id="email" name="email" style="height: 25px" placeholder="abc@gmail.com"
					required /><br /></td>
				<td><label for ="pword2">Confirm Password: *</label></td>
				<td><input type="password" id="pword2" name="pword2" style="height:25px" required></td>
				</tr>
				<tr>
				<td><label for="phone">Phone Number: *</label></td>
				<td><input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
					placeholder="012-345-6789" required /><br /></td>
				<td><label for="IC">Identification Number: *</label></td>
				<td><input type="number" id="IC" name="IC" maxlength="12" placeholder="12 digit IC" required /><br /></td>
				</tr>
				<tr>
				<td><label for="location">Address: </label></td>
				<td><textarea id="location" name="location" rows="2" style="height: 50px"
					placeholder="Name, street number, street name, region, postal code and town/city, state."></textarea><br /></td>
				<td><div class="radio">
					Gender: *
					</td>
					<td><label for="male">Male</label>
					<input type="radio" id="male" name="gender" value="male" required /><br />
					<label for="female">Female</label>
					<input type="radio" id="female" name="gender" value="female" /><br />
					<label for="other">Other</label>
					<input type="radio" id="other" name="gender" value="other" /><br /><br />
					</td>
				</div>
			</div>
			<tr>
				<td colspan="4">
			<div class="buttons">
				<input type="submit" style="height: 25px" value="Register" name="Register" />
				<p style="
							font-size: 12px;
							color: rgba(255, 0, 0, 0.726);
							font-weight: bold;
						">
					* -Required information
				</p>
				</td>
			</div>
			</tr>
		</form>
	</div>
	<script src="clock.js"></script>
</body>

</html>