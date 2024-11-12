<?php
include('connection1.php');
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Donor Registration</title>
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
			<div id="header"><h2><a href="admin-home1.php" style="text-decoration: none;color: white;">Blood Bank Management System</a></h2>
				<p align="center"><a href="donor-search1.php"><font color="white"><b>Search</b></font></a></p>
			</div>
			<div id="body">
				<br>
				<h1>Donor Details</h1>
				<center><div id="form">
					<table>
						<tr>
							<td><center><b><font color="blue">Name</font></b></center></td>
							<td><center><b><font color="blue">Last Donation Date</font></b></center></td>
							<td><center><b><font color="blue">Address</font></b></center></td>
							<td><center><b><font color="blue">City</font></b></center></td>
							<td><center><b><font color="blue">Age</font></b></center></td>
							<td><center><b><font color="blue">Blood Group</font></b></center></td>
							<td><center><b><font color="blue">Email</font></b></center></td>
							<td><center><b><font color="blue">Mobile No</font></b></center></td>
							<td><center><b><font color="blue">Weight</font></b></center></td>
						</tr>
						<?php
						$q=$db->query("SELECT * FROM donor_registration1");
						while ($r1=$q->fetch(PDO::FETCH_OBJ)) {
							?>
						<tr>
							<td><center><?=$r1->name; ?></center></td>
							<td><center><?=$r1->ldd; ?></center></td>
							<td><center><?=$r1->address; ?></center></td>
							<td><center><?=$r1->city; ?></center></td>
							<td><center><?=$r1->age; ?></center></td>
							<td><center><?=$r1->bgroup; ?></center></td>
							<td><center><?=$r1->email; ?></center></td>
							<td><center><?=$r1->mno; ?></center></td>
							<td><center><?=$r1->weight; ?></center></td>
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