<?php
include('connection1.php');
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Donor Registration</title>
	<link rel="stylesheet" type="text/css" href="css/s11.css">
</head>
<body>
	<div id="full">
		<div id="inner_full">
			<div id="header"><h2><a href="admin-home1.php" style="text-decoration: none;color: white;">Blood Bank Management System</a></h2></div>
			<div id="body">
				<h1>Donor registration</h1>
				<center><div id="form">
					<form action="" method="post">
					<table>
						<tr>
							<td width="200px" height="50px">Enter Name</td>
							<td width="200px" height="50px"><input type="text" name="name" placeholder="Enter Name" required></td>
							<td width="200px" height="50px">Enter Last-donation-date</td>
							<td width="200px" height="50px"><input type="date" name="ldd" placeholder="Enter Last-donation-date" required></td>
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
							<td width="200px" height="50px">Enter E-Mail</td>
							<td width="200px" height="50px"><input type="text" name="email" placeholder="Enter E-Mail" required></td>
							<td width="200px" height="50px">Enter Mobile No</td>
							<td width="200px" height="50px"><input type="text" name="mno" id="mno" placeholder="Enter Mobile No" maxlength="10" pattern="[9-0]{10}" required></td>
						</tr>
						<tr>
							<td width="200px" height="50px">Enter Weight</td>
							<td width="200px" height="50px"><input type="text" name="weight" placeholder="Weight" required></td>
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
                        $ldd=$_POST['ldd'];
                        $address=$_POST['address'];
                        $city=$_POST['city'];
                        $age=$_POST['age'];
                        $bgroup=$_POST['bgroup'];
                        $email=$_POST['email'];
                        $mno=$_POST['mno'];
                        $weight=$_POST['weight'];

                        // Validate $ldd to ensure it's a valid date before proceeding

                        // Calculate the number of days difference
                        $currentDate = new DateTime();
                        $lastDonationDateTime = new DateTime($ldd);
                        $interval = $currentDate->diff($lastDonationDateTime);
                        $daysDifference = $interval->days;
                        
                        if ($daysDifference > 90 && $age > 18 && $age < 60) {
                            $q=$db->prepare("INSERT INTO donor_registration1 (name,ldd,address,city,age,bgroup,email,mno,weight) VALUES(:name,:ldd,:address,:city,:age,:bgroup,:email,:mno,:weight)");
                            $q->bindParam(':name',$name);
                            $q->bindParam(':ldd',$ldd);
                            $q->bindParam(':address',$address);
                            $q->bindParam(':city',$city);
                            $q->bindParam(':age',$age);
                            $q->bindParam(':bgroup',$bgroup);
                            $q->bindParam(':email',$email);
                            $q->bindParam(':mno',$mno);
                            $q->bindParam(':weight',$weight);
                            if($q->execute())
                            {
                                echo "<script>alert('Donor Registration Successful')</script>";
                            } else {
                                echo "<script>alert('Donor Registration Failed.')</script>";
                                // Additional error logging or debugging information can be added here
                            }
                        }
                        elseif ($age > 60) {
                            echo "<script>alert('Cannot submit details. Age must be less than 60.')</script>";
                        } elseif ($age < 18) {
                            echo "<script>alert('Cannot submit details. Age must be 18 or older.')</script>";
                        } else {
                            echo "<script>alert('Cannot submit details. Last donation is within the last 90 days.')</script>";
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