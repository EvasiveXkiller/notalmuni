<?php
	include("header.php")
?>
		<link rel="stylesheet" href="./css/master.css" />
		<link rel="stylesheet" href="./css/editprofile.css" />
	</head>
	<body>
		<div class="viewport">
			<div class="sidebar">
				<h2>ALMUNI CRM</h2>
				<div class="nav">
					<a href="dashboard.php">Dashboard</a>
					<a href="viewprofile.php">View Profile</a>
					<a href="" class="navactive">Edit Profile</a>
					<a href="#">About Us</a>
					<a href="#">Licenses</a>
					<a href="#">Logout</a>
				</div>
			</div>
			<div class="main_content">
				<div class="header">
					<span id="username" name="uid"
						>Currently Logged In as: [placeholder]
					</span>
					<span id="clock" style="float: right"></span>
				</div>
				<form>
					<div class="flex-container">
						<div id="pageheader">
							Edit Info<br /><small
								>Your Information that you use on Almuni</small
							>
						</div>
						<div>
							<div class="card">
								<legend>Your basic info</legend>
								<table
									style="
										border-collapse: collapse;
										width: 100%;
									"
								>
									<tr>
										<td class="key">
											<label>Name</label>
										</td>
										<td class="data">
											<input
												type="text"
												placeholder="Your Name"
												required
											/>
										</td>
									</tr>
									<tr>
										<td class="key">
											<label>Email</label>
										</td>
										<td class="data">
											<input
												type="email"
												placeholder="someone@email.com"
											/>
										</td>
									</tr>
									<tr>
										<td class="key">
											<label>Identity Number</label>
										</td>
										<td class="data">
											<input
												type="text"
												placeholder="XXXXXX-XX-XXXX"
											/>
										</td>
									</tr>
									<tr>
										<td class="key">
											<label>Gender</label>
										</td>
										<td class="data">
											<select name="gender" id="gender">
												<option value="male">
													Male
												</option>
												<option value="female">
													Female
												</option>
												<option value="other">
													Prefer not to say
												</option>
											</select>
										</td>
									</tr>
									<tr>
										<td class="key">
											<label>Date of Birth</label>
										</td>
										<td class="data">
											<input
												type="date"
												name="dob"
												id="dateofbirth"
											/>
										</td>
									</tr>
								</table>
							</div>
						</div>
						<div>
							<div class="card">
								<legend>Contact Info</legend>
								<table
									style="
										border-collapse: collapse;
										width: 100%;
									"
								>
									<tr>
										<td class="key">
											<label>Main Contact</label>
										</td>
										<td class="data">
											<input
												type="tel"
												id="phone"
												name="phone"
												pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
												placeholder="012-345-6789"
												required
											/>
										</td>
									</tr>
									<tr>
										<td class="key">
											<label>Home</label>
										</td>
										<td class="data">
											<input
												type="tel"
												id="phone"
												name="phone"
												pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
												placeholder="012-345-6789"
												required
											/>
										</td>
									</tr>
									<tr>
										<td class="key">
											<label>Office</label>
										</td>
										<td class="data">
											<input
												type="tel"
												id="phone"
												name="phone"
												pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
												placeholder="012-345-6789"
												required
											/>
										</td>
									</tr>
									<tr>
										<td class="key">
											<label>Address</label>
										</td>
										<td class="data">
											<textarea
												id="location"
												name="location"
												cols="60"
												rows="10"
												placeholder="Name, street number, street name, region, postal code and town/city, state."
											></textarea
											><br />
										</td>
									</tr>
								</table>
							</div>
						</div>
						<div>
							<div class="card">
								<legend>Extra Information</legend>
								<table
									style="
										border-collapse: collapse;
										width: 100%;
									"
								>
									<tr>
										<td class="key">
											<label>Notes</label>
										</td>
										<td class="data">
											<textarea
												cols="60"
												rows="10"
											></textarea>
										</td>
									</tr>
								</table>
							</div>
						</div>
						<div>
							<div class="card">
								<input type="submit" value="Save">
							</div>

						</div>
					</div>
				</form>
			</div>
		</div>
		<script src="clock.js"></script>
	</body>
</html>
