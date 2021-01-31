<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Register Page</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link
			href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap"
			rel="stylesheet"
		/>
		<link rel="stylesheet" href="./css/loginpage.css" />
	</head>
	<body class="body">
		<div class="topbar">
			<p>
				<span class="alumnicrm">ALUMNI CRM</span
				><b class="welcometoalumni">Welcome to Almuni!</b
				><span id="clock" class="clock"></span>
			</p>
		</div>

		<div class="registerformbox">
			<form action="registerprocessor.php" method="POST">
				<div class="form">
					<img src="EmptyProfilePicture.png" class="profilepicture" />
					<label for="name">Name: *</label>
					<input
						type="text"
						id="name"
						name="name"
						style="height: 25px"
						required
					/><br />

					<label for="pword">Password: *</label>
					<input
						type="password"
						id="pword"
						name="pword"
						style="height: 25px"
						required
					/><br />

					<label for="email">Email: *</label>
					<input
						type="email"
						id="email"
						name="email"
						style="height: 25px"
						placeholder="abc@gmail.com"
						required
					/><br />

					<label for="phone">Phone Number: *</label>
					<input
						type="tel"
						id="phone"
						name="phone"
						pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
						placeholder="012-345-6789"
						required
					/><br />

					<label for="IC">Identification Number: *</label>
					<input
						type="number"
						id="IC"
						name="IC"
						maxlength="12"
						placeholder="12 digit IC"
						required
					/><br />

					<label for="location">Address: </label>
					<textarea
						id="location"
						name="location"
						rows="2"
						style="height: 50px"
						placeholder="Name, street number, street name, region, postal code and town/city, state."
					></textarea
					><br />
					<div class="radio">
						<p>Gender: *</p>
						<label for="male">Male</label>
						<input
							type="radio"
							id="male"
							name="gender"
							value="male"
							required
						/><br />
						<label for="female">Female</label>
						<input
							type="radio"
							id="female"
							name="gender"
							value="female"
						/><br />
						<label for="other">Other</label>
						<input
							type="radio"
							id="other"
							name="gender"
							value="other"
						/><br /><br />
					</div>
				</div>
				<div class="buttons">
					<input
						type="submit"
						style="height: 25px"
						value="Register"
						name="Register"
					/>
					<p
						style="
							font-size: 12px;
							color: rgba(255, 0, 0, 0.726);
							font-weight: bold;
						"
					>
						* -Required information
					</p>
				</div>
			</form>
		</div>
		<script src="clock.js"></script>
	</body>
</html>
