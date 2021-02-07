<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Register Page</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="./css/registerpage.css" />
	</head>

	<body>
		<div class="topbar">
			<p>
				<span class="alumnicrm">ALUMNI CRM</span
				><b class="welcometoalumni">Welcome to Almuni!</b
				><span id="clock" class="clock"></span>
			</p>
		</div>
		<form action="registerprocessor.php" method="POST">
			<div class="centerbox">
				<div class="boxtitle">Create your Almuni Account</div>
				<div class="registerformboxtable">
					<div class="col">
						<div class="form__group field">
							<input
								type="input"
								class="form__field"
								placeholder="Name"
								name="name"
								id="name"
								required
							/>
							<label for="name" class="form__label">Name</label>
						</div>
						<div class="form__group field">
							<input
								type="email"
								class="form__field"
								placeholder="Email"
								name="email"
								id="email"
								required
							/>
							<label for="email" class="form__label">Email</label>
						</div>
						<div class="form__group field">
							<input
								type="tel"
								class="form__field"
								placeholder="Phone Number"
								name="phone"
								id="phone"
								pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
								required
							/>
							<label for="phone" class="form__label"
								>Phone Number</label
							>
						</div>
						<div class="form__group field">
							<input
								type="text"
								class="form__field"
								placeholder="Address"
								name="location"
								id="address"
							/>
							<label for="address" class="form__label"
								>Address</label
							>
						</div>
					</div>
					<div class="col">
						<div class="form__group field">
							<input
								type="password"
								class="form__field"
								placeholder="Password"
								name="pword"
								id="pword"
								required
							/>
							<label for="pword" class="form__label"
								>Password</label
							>
						</div>
						<div class="form__group field">
							<input
								type="password"
								class="form__field"
								placeholder="Password"
								name="pword2"
								id="pword2"
								required
							/>
							<label for="pword2" class="form__label"
								>Comfirm Password</label
							>
						</div>
						<div class="form__group field">
							<input
								type="number"
								class="form__field"
								placeholder="Identity Number"
								name="IC"
								maxlength="12"
								id="IC"
							/>
							<label for="IC" class="form__label"
								>Identity Number</label
							>
						</div>

						<div
							class="form__group field"
							style="padding-bottom: 15px"
						>
							Gender:
							<div class="radiowrapper">
								<input
									type="radio"
									id="male"
									name="gender"
									value="male"
									checked
									required
								/>
								<label for="male">Male</label>
							</div>
							<div class="radiowrapper">
								<input
									type="radio"
									id="female"
									name="gender"
									value="female"
								/>
								<label for="female">Female</label>
							</div>
							<div class="radiowrapper">
								<input
									type="radio"
									id="other"
									name="gender"
									value="other"
								/>
								<label for="other">Other</label>
							</div>
						</div>
					</div>
				</div>
				<div class="footerboxsubmit">
					<button type="submit" value="Register" name="Register">Register</button><br />
				</div>
				<div class="footerboxsignin">
					<button onclick="redirect()">Sign In Instead</button><br />
				</div>
			</div>
		</form>
		<script src="clock.js"></script>
		<script>
			function redirect() {
				event.preventDefault()
				window.location.href = "./loginpage.php"
			}
		</script>
	</body>
</html>
