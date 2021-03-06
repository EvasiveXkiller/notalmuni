<?php
	require("../dbconn.php");
	include("session.php");
	include("header.php");

?>
		<link rel="stylesheet" href="./css/master.css" />
        <link rel="stylesheet" href="./css/editcontactpage.css"/>
	</head>
	<body>
		<div class="viewport">
			<div class="sidebar">
				<h2>ALMUNI CRM</h2>
				<div class="nav">
					<a href="admindashboard.html">Dashboard</a>
					<a href="contactpage.php" class="navactive">View Contacts</a>
					<a href="editcontactpage.php">Edit Contacts</a>
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
				<form action="editcontactpage.php" method="POST">
				<div class="grid-container">
				
					<div><label for="id">Input the ID you want to edit:</label></div>
					<div><input type="number" id="id" name="id"></div>
				
					<label for="search">Click to search and edit:</label>
					<input type="submit" name="search" value="Search">
				</div>
				</form>
				<?php
if(isset($_POST["search"])){
		$id = $_POST["id"];
		if(empty($id)) {
			exit();
		}
		$sql = "SELECT * from users where user_ID=$id";
		$results =  (mysqli_query($conn, $sql)); //connects to database and runs the sql query
		if (mysqli_num_rows($results)>0)
		{
			while ($row = mysqli_fetch_assoc($results))
			{
				?>
				
				<table class="table">
					<form action="" method="POST">
					<tr>
						<td>Username</td>
                        <td>UserID</td>
                        <td>UserEmail</td>
                        <td>User Identity</td>
                        <td>Address</td>
                        <td>User Gender</td>
					</tr>
					<tr>
						<td><input type ="text" name="username" value="<?= $row["username"]?>"/> </td>
						<td><input type ="text" name="userid" value="<?= $row["user_ID"]?>"/></td>
						<td><input type ="text" name="useremail" value="<?= $row["user_email"]?>"/></td>
						<td><input type ="text" name="useridentity" value="<?= $row["user_identity"]?>"/></td>
						<td><input type ="text" name="useraddress" value="<?= $row["user_address"]?>"/></td>
						<td><input type ="text" name="usergender" value="<?= $row["user_gender"]?>"/></td>
					</tr>
					<tr>
						<td>User DOB</td>
						<td>Main Contact</td>
						<td>Home Contact</td>
						<td>Office Contact</td>
                        <td>Notes</td>
                        <td>Status</td>
					</tr>
					<tr>
						<td><input type ="text" name="userDOB" value="<?= $row["user_DOB"]?>"/></td>
						<td><input type ="text" name="usermaincontact" value="<?= $row["main_contact"]?>"/></td>
						<td><input type ="text" name="userhomecontact" value="<?= $row["home_contact"]?>"/></td>
						<td><input type ="text" name="userofficecontact" value="<?= $row["office_contact"]?>"/></td>
						<td><input type ="text" name="usernotes" value="<?= $row["user_notes"]?>"/></td>
						<td><input type ="text" name="userstatus" value="<?= $row["status_"]?>"/></td>
					</tr>
					<tr>
						<td><input type="submit" name="update" value="Update"></td>
						<td><input type="submit" name="delete" value="Delete"></td>
					</tr>
					</form>
				</table>

				<?php
			}
		}
		if (isset($_POST["update"])){
			$username=$_POST["username"];
			$userid=$_POST["userid"];
			$useremail=$_POST["useremail"];
			$useridentity=$_POST["useridentity"];
			$useraddress=$_POST["useraddress"];
			$usergender=$_POST["usergender"];
			$userDOB=$_POST["userDOB"];
			$usermaincontact=$_POST["usermaincontact"];
			$userhomecontact=$_POST["userhomecontact"];
			$userofficecontact=$_POST["userofficecontact"];
			$usernotes=$_POST["usernotes"];
			$userstatus=$_POST["userstatus"];

			$sql="UPDATE users SET username='$username', user_email='$useremail', user_identity='$useridentity', user_address='$useraddress', user_gender='$usergender', user_DOB='$userDOB', main_contact='$usermaincontact', home_contact='$userhomecontact', office_contact='$userofficecontact', user_notes='$usernotes', status_='$status' WHERE user_ID='$userid' ";
			$results = mysqli_query($conn,$sql); //connects to database and runs $sql query

			if($results){
				echo "Data is updated.";
			}
			else {
				echo "Data is not updated";
			}
		}
	}
?>

        </div>

		<script src="../clock.js"></script>
	</body>
</html>

