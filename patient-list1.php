<?php
include('connection1.php');
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Patient Registration</title>
	<link rel="stylesheet" type="text/css" href="css/s11.css">
	<style type="text/css">
		td{
			width: 200px;
			height: 40px;
		}
	</style>
</head>
<body>
	<div id="full">
		<div id="inner_full">
			<div id="header"><h2><a href="admin-home1.php" style="text-decoration: none;color: white;">Blood Bank Management System</a></h2></div>
			<div id="body">
				<h1>Patient Details</h1>
				<center><div id="form">
					<table>
						<tr>
							<td><center><b><font color="blue">Name</font></b></center></td>
							<td><center><b><font color="blue">Blood Group</font></b></center></td>
							<td><center><b><font color="blue">Address</font></b></center></td>
							<td><center><b><font color="blue">City</font></b></center></td>
							<td><center><b><font color="blue">Age</font></b></center></td>
							<td><center><b><font color="blue">Mobile No</font></b></center></td>
							<td><center><b><font color="blue">Gender</font></b></center></td>
							<td><center><b><font color="blue">Problem</font></b></center></td>
							<td><center><b><font color="blue">Weight</font></b></center></td>
							<td><center><b><font color="blue">E-mail</font></b></center></td>
							<td><center><b><font color="blue">Blood-required-date</font></b></center></td>
						</tr>
						<?php
						$q=$db->query("SELECT * FROM patient_registration1");
						while ($r1=$q->fetch(PDO::FETCH_OBJ)) {
							?>
						<tr>
							<td><center><?=$r1->name; ?></center></td>
							<td><center><?=$r1->bgroup; ?></center></td>
							<td><center><?=$r1->address; ?></center></td>
							<td><center><?=$r1->city; ?></center></td>
							<td><center><?=$r1->age; ?></center></td>
							<td><center><?=$r1->mno; ?></center></td>
							<td><center><?=$r1->gender; ?></center></td>
							<td><center><?=$r1->problem; ?></center></td>
							<td><center><?=$r1->weight; ?></center></td>
							<td><center><?=$r1->email; ?></center></td>
							<td><center><?=$r1->brd; ?></center></td>
						</tr>
							<?php
						}
						?>
					</table>
				</div></center>
			</div>
			<div id="footer"><h4 align="center">Copyright@myprojecthd</h4>
				
			</div>
		</div>
	</div>
</body>
</html>