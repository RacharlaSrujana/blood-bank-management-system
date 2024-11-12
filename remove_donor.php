<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'bbms1';

$con = mysqli_connect($host, $user, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['id'])) {
    $donor_id = $_POST['id'];

    // Delete donor details from the database based on the ID
    $delete_query = "DELETE FROM donor_registration1 WHERE id = $donor_id";
    $delete_result = mysqli_query($con, $delete_query);

    if ($delete_result) {
        echo "<script>alert('Donor details removed successfully.')</script>";
        // Redirect to the donor search page or any other page after removal
        header("Location: donor-search1.php");
        exit;
    } else {
        echo "Error deleting donor details: " . mysqli_error($con);
        exit;
    }
} else {
    echo "Donor ID not provided.";
    exit;
}
?>
