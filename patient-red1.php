<?php
include('connection1.php');
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Patient Registration</title>
	<link rel="stylesheet" type="text/css" href="css/s11.css">
</head>
<body>
	<div id="full">
		<div id="inner_full">
			<div id="header"><h2><a href="admin-home1.php" style="text-decoration: none;color: white;">Blood Bank Management System</a></h2></div>
			<div id="body">
				<h1>Patient registration</h1>
				<center><div id="form">
					<form action="" method="post">
					<table>
						<tr>
							<td width="200px" height="50px">Enter Name</td>
							<td width="200px" height="50px"><input type="text" name="name" placeholder="Enter Name" required></td>
							<td width="200px" height="50px">Select Blood Group</td>
							<td width="200px" height="50px">
								<select name="bgroup" required>
									<option>O+</option>
									<option>O-</option>
									<option>AB+</option>
									<option>AB-</option>
									<option>A+</option>
									<option>A-</option>
									<option>B+</option>
									<option>B-</option>
								</select>
							</td>
						</tr>
						<tr>
							<td width="200px" height="50px">Enter Address</td>
							<td width="200px" height="50px"><textarea name="address" required></textarea></td>
							<td width="200px" height="50px">Enter City</td>
							<td width="200px" height="50px"><input type="text" name="city" placeholder="Enter City" required></td>
						</tr>
						<tr>
							<td width="200px" height="50px">Enter Age</td>
							<td width="200px" height="50px"><input type="text" name="age" placeholder="Enter Age" required></td>
							<td width="200px" height="50px">Enter Mobile No</td>
							<td width="200px" height="50px"><input type="text" name="mno" id="mno" placeholder="Enter Mobile No" required></td>
						</tr>
						<tr>
							<td width="200px" height="50px">Select Gender</td>
							<td width="200px" height="50px">
								<select name="gender" required>
									<option>Male</option>
									<option>Female</option>
									<option>Others</option>
								</select>
							</td>
							<td width="200px" height="50px">Enter Problem</td>
							<td width="200px" height="50px"><textarea name="problem" required></textarea></td>
						</tr>
						<tr>
							<td width="200px" height="50px">Enter Weight</td>
							<td width="200px" height="50px"><input type="text" name="weight" placeholder="Weight" required></td>
							<td width="200px" height="50px">Enter E-Mail</td>
							<td width="200px" height="50px"><input type="text" name="email" placeholder="Enter E-Mail" required></td>
						</tr>
						<tr>
							<td width="200px" height="50px">Enter Blood-required-date</td>
							<td width="200px" height="50px"><input type="date" name="brd" placeholder="Enter Blood-required-date" required></td>
						</tr>
						<tr>
							<td><input type="submit" name="sub" value="Save"></td>
						</tr>
					</table>
					</form>
					<?php
					if(isset($_POST['sub']))
					{
						$name=$_POST['name'];
						$bgroup=$_POST['bgroup'];
						$address=$_POST['address'];
						$city=$_POST['city'];
						$age=$_POST['age'];
						$mno=$_POST['mno'];
						$gender=$_POST['gender'];
						$problem=$_POST['problem'];
						$weight=$_POST['weight'];
						$email=$_POST['email'];
						$brd=$_POST['brd'];
						$q=$db->prepare("INSERT INTO patient_registration1 (name,bgroup,address,city,age,mno,gender,problem,weight,email,brd) VALUES(:name,:bgroup,:address,:city,:age,:mno,:gender,:problem,:weight,:email,:brd)");
						$q->bindValue('name',$name);
						$q->bindValue('bgroup',$bgroup);
						$q->bindValue('address',$address);
						$q->bindValue('city',$city);
						$q->bindValue('age',$age);
						$q->bindValue('mno',$mno);
						$q->bindValue('gender',$gender);
						$q->bindValue('problem',$problem);
						$q->bindValue('weight',$weight);
						$q->bindValue('email',$email);
						$q->bindValue('brd',$brd);
						if($q->execute())
						{
							echo "<script>alert('Patient Registration Successful')</script>";
						}
						else
						{
							echo "<script>alert('Patient Registration Fail')</script>";
						}
					}
					?>
				</div></center>
			</div>
			<div id="footer"><h4 align="center">Copyright@myprojecthd</h4>
				
			</div>
		</div>
	</div>
</body>
</html>