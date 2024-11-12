<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'bbms1';

$con = mysqli_connect($host, $user, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $donor_id = $_GET['id'];

    // Fetch donor details from the database based on the ID
    $query = "SELECT * FROM donor_registration1 WHERE id = $donor_id";
    $result = mysqli_query($con, $query);

    if ($result) {
        $donor_details = mysqli_fetch_assoc($result);
    } else {
        echo "Error in query: " . mysqli_error($con);
        exit;
    }
} else {
    echo "Donor ID not provided.";
    exit;
}

// Check if the form is submitted for updating
if (isset($_POST['update'])) {
    // Retrieve updated details from the form
    $name = $_POST['name'];
    $ldd = $_POST['ldd'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $age = $_POST['age'];
    $bgroup = $_POST['bgroup'];
    $email = $_POST['email'];
    $mno = $_POST['mno'];
    $weight = $_POST['weight'];

    // Update donor details in the database
    $update_query = "UPDATE donor_registration1 SET
                     name = '$name',
                     ldd = '$ldd',
                     address = '$address',
                     city = '$city',
                     age = '$age',
                     bgroup = '$bgroup',
                     email = '$email',
                     mno = '$mno',
                     weight = '$weight'
                     WHERE id = $donor_id";

    $update_result = mysqli_query($con, $update_query);

    if ($update_result) {
        echo "<script>alert('Donor details updated successfully.')</script>";
    } else {
        echo "Error updating donor details: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/s11.css">
    <title>Update Donor Details</title>
</head>
<body>
    <div id="header">
        <h2><a href="admin-home1.php" style="text-decoration: none;color: white;">Blood Bank Management System</a></h2>
    </div>
    <div class="col-md-12">
        <div class="card mt-4">
            <div class="card-body">
                <h3>Update Donor Details</h3>
                <center><table>
                <form method="post" action="">
                    <!-- Display the current donor details in an editable form -->
                <tr>
                    <td width="200px" height="50px"><label>Name:</label></td>
                    <td width="200px" height="50px"><input type="text" name="name" value="<?= $donor_details['name']; ?>" required></td>
                
                    <td width="200px" height="50px"><label>Last Donation Date:</label></td>
                    <td width="200px" height="50px"><input type="date" name="ldd" value="<?= $donor_details['ldd']; ?>" required></td>
                </tr>
                <tr>

                    <td width="200px" height="50px"><label>Address:</label></td>
                    <td width="200px" height="50px"><textarea name="address" required><?= $donor_details['address']; ?></textarea></td>
                

                    <td width="200px" height="50px"><label>City:</label></td>
                    <td width="200px" height="50px"><input type="text" name="city" value="<?= $donor_details['city']; ?>" required></td>
                </tr>
                <tr>

                    <td width="200px" height="50px"><label>Age:</label></td>
                    <td width="200px" height="50px"><input type="text" name="age" value="<?= $donor_details['age']; ?>" required></td>
                

                    <td width="200px" height="50px"><label>Blood Group:</label></td>
                    <td width="200px" height="50px"><select name="bgroup" required>
                        <option value="O+" <?= ($donor_details['bgroup'] == 'O+') ? 'selected' : ''; ?>>O+</option>
                        <!-- Add other blood group options -->

                    </select></td>
                </tr>
                <tr>

                    <td width="200px" height="50px"><label>Email:</label></td>
                    <td width="200px" height="50px"><input type="text" name="email" value="<?= $donor_details['email']; ?>" required></td>
                

                    <td width="200px" height="50px"><label>Mobile No:</label></td>
                    <td width="200px" height="50px"><input type="text" name="mno" value="<?= $donor_details['mno']; ?>" required></td>
                </tr>
                <tr>

                    <td width="200px" height="50px"><label>Weight:</label></td>
                    <td width="200px" height="50px"><input type="text" name="weight" value="<?= $donor_details['weight']; ?>" required></td>
                </tr>
                <tr>

                    <td><input type="submit" name="update" value="Update"></td>
                </tr>
                </form>
            </table></center>
            </div>
        </div>
    </div>
</body>
</html>
