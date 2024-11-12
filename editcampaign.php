<?php
include('connection1.php');
session_start();

if (isset($_POST['editSubmit'])) {
    // Retrieve form data
    $editCampaignName = $_POST['editCampaignName'];
    $editOrganizer = $_POST['editOrganizer'];
    $editDate = $_POST['editDate'];
    $editLocation = $_POST['editLocation'];
    $editDescription = $_POST['editDescription'];

    // Update the database with the new details
    $updateQuery = $db->prepare("UPDATE campaign SET organizer = :organizer, date = :date, location = :location, description = :description WHERE campaignname = :campaignname");
    $updateQuery->bindParam(':campaignname', $editCampaignName);
    $updateQuery->bindParam(':organizer', $editOrganizer);
    $updateQuery->bindParam(':date', $editDate);
    $updateQuery->bindParam(':location', $editLocation);
    $updateQuery->bindParam(':description', $editDescription);

    if ($updateQuery->execute()) {
        echo "<script>alert('Campaign details updated successfully')</script>";
    } else {
        echo "<script>alert('Failed to update campaign details')</script>";
    }
}

// Fetch all campaign details for display
$campaignQuery = $db->query("SELECT * FROM campaign");
$campaigns = $campaignQuery->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Your existing styles remain unchanged */
        body {
            margin: 0;
            padding: 0;
            display: flex;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: red;
            color: #fff;
            padding: 10px;
            z-index: 1;
        }

        h1 {
            color: #fff;
        }

        nav {
            background-color: lightgray;
            color: #fff;
            width: 200px;
            padding: 20px;
            box-sizing: border-box;
            height: 100vh;
            position: fixed;
            top: 100px; /* Adjust the value based on the height of your header */
            left: 0;
            display: flex;
            flex-direction: column;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
        }

        nav ul li {
            margin-bottom: 10px;
        }

        main {
            margin-left: 220px; /* Adjust margin as needed */
            padding: 20px;
            box-sizing: border-box;
            width: 80%; /* Adjust width as needed */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 90px; /* Adjust margin as needed */
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 10px;
        }

        th {
            background-color: #f2f2f2;
        }

        .edit-form {
            display: none;
            margin-top: 20px; /* Adjust margin as needed */
        }

        .edit-form input,
        .edit-form textarea {
            width: 80%; /* Adjust width as needed */
            padding: 5px;
        }

        .edit-form input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
    <title>Update Campaign Details</title>
</head>

<body>
    <!-- Your existing HTML remains unchanged -->
    <header>
        <h1><a href="admin-home1.php" style="text-decoration: none;color: white;">Blood Bank Management System</a></h1>
        <nav>
            <ul>
                <li><a href="campaign.php">Create Campaign</a></li>
                <li><a href="editcampaign.php">Edit Campaign details</a></li>
                <li><a href="viewcampaign.php">View Campaign</a></li>
                <li><a href="removecampaign.php">Delete Campaign</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div id="form">
            <table>
                <tr>
                    <th>Name of Campaign</th>
                    <th>Name of Organizer</th>
                    <th>Campaign date</th>
                    <th>Location</th>
                    <th>Short Description</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($campaigns as $campaign) : ?>
                    <tr>
                        <td><?= $campaign['campaignname']; ?></td>
                        <td><?= $campaign['organizer']; ?></td>
                        <td><?= $campaign['date']; ?></td>
                        <td><?= $campaign['location']; ?></td>
                        <td><?= $campaign['description']; ?></td>
                        <td><button onclick="showEditForm('<?= $campaign['campaignname']; ?>', '<?= $campaign['organizer']; ?>', '<?= $campaign['date']; ?>', '<?= $campaign['location']; ?>', '<?= $campaign['description']; ?>')">Edit</button></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <!-- Edit Form -->
            <div id="editForm" class="edit-form">
                <h2>Edit Campaign Details</h2>
                <form action="" method="post">
                    <!-- Include input fields for editing campaign details -->
                    <!-- Use JavaScript to pre-fill values based on the selected campaign -->
                    <input type="text" id="editCampaignName" name="editCampaignName" placeholder="Campaign Name" required>
                    <input type="text" id="editOrganizer" name="editOrganizer" placeholder="Organizer" required>
                    <input type="date" id="editDate" name="editDate" required>
                    <input type="text" id="editLocation" name="editLocation" placeholder="Location" required>
                    <textarea id="editDescription" name="editDescription" placeholder="Short Description" required></textarea>
                    <input type="submit" name="editSubmit" value="Save Changes">
                </form>
            </div>
        </div>
    </main>

    <script>
        function showEditForm(campaignName, organizer, date, location, description) {
            // Use JavaScript to show/hide the edit form and pre-fill values
            document.getElementById('editCampaignName').value = campaignName;
            document.getElementById('editOrganizer').value = organizer;
            document.getElementById('editDate').value = date;
            document.getElementById('editLocation').value = location;
            document.getElementById('editDescription').value = description;

            document.getElementById('editForm').style.display = 'block';
        }
    </script>
</body>

</html>
