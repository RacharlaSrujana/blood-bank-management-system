<?php
include('connection1.php');
session_start();

if (isset($_POST['deleteSubmit'])) {
    // Retrieve the campaign name to be deleted
    $deleteCampaignName = $_POST['deleteCampaignName'];

    // Delete the campaign from the database
    $deleteQuery = $db->prepare("DELETE FROM campaign WHERE campaignname = :campaignname");
    $deleteQuery->bindParam(':campaignname', $deleteCampaignName);

    if ($deleteQuery->execute()) {
        echo "<script>alert('Campaign details deleted successfully')</script>";
    } else {
        echo "<script>alert('Failed to delete campaign details')</script>";
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
            padding: 5px;
        }
        

        .delete-form {
            margin-top: 20px; /* Adjust margin as needed */
        }

        .delete-form input {
            width: 80%; /* Adjust width as needed */
            padding: 5px;
        }

        .delete-form input[type="submit"] {
            background-color: #ff0000;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
    <title>Delete Campaign</title>
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
                        <td>
                            <!-- Add a form for deletion -->
                            <form class="delete-form" action="" method="post">
                                <input type="hidden" name="deleteCampaignName" value="<?= $campaign['campaignname']; ?>">
                                <input type="submit" name="deleteSubmit" value="Delete">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </main>
</body>

</html>
