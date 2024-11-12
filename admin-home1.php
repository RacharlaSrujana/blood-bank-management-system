<?php
include('connection1.php');
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Blood Donor Management1</title>
	<link rel="stylesheet" type="text/css" href="css/s11.css">
</head>
<body>
	<div id="full">
		<div id="inner_full">
			<div id="header"><h2>Blood Bank Management System</h2>
			</div>

			<div id="body">
				<br>
				<ul>
					<li><a href="donor-red1.php">Donor Registration</a></li>
					<li><a href="donor-list1.php">Donor List</a></li>
				</ul><br><br><br><br>
				<ul>
					<li><a href="patient-red1.php">Patient Registration</a></li>
					<li><a href="patient-list1.php">Patient List</a></li>
				</ul><br><br><br><br>
				<ul>
					<li><a href="campaign.php">Blood Camp Details</a></li>
				</ul>
			</div>
			<div id="footer"><h4 align="center">Copyright@myprojecthd</h4>
			</div>
		</div>
	</div>
</body>
</html>