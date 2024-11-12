<?php
include('connection1.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
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
        margin-top: 100px;
      margin-left: 200px;
      padding: 20px;
      flex-grow: 1;
      box-sizing: border-box;
    }

    #home-content {
      margin-left: 20px;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
    }

    .hidden {
      display: none;
    }

    div {
      margin-bottom: 10px;
    }

    label {
      display: inline-block;
      width: 150px; /* Adjust the width as needed */
      color: #777777;
    }

    input,
    textarea,
    select {
      padding: 5px 10px;
      width: 50%; /* Make the input fields take up the full width */
    }

    input[type="submit"] {
      background-color: #4caf50;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    
    td{
      width: 200px;
      height: 40px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px; /* Adjust margin as needed */
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
  
  </style>
  <title>Blood camp details</title>
</head>
<body>
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
    <center>
      <div id="form">
        <table>
          <tr>
            <th>Name of Campaign</th>
            <th>Name of Organizer</th>
            <th>Campaign date</th>
            <th>Location</th>
            <th>Short Description</th>
          </tr>
          <?php
          $q = $db->query("SELECT * FROM campaign");
          while ($r1 = $q->fetch(PDO::FETCH_OBJ)) {
          ?>
            <tr>
              <td><?= $r1->campaignname; ?></td>
              <td><?= $r1->organizer; ?></td>
              <td><?= $r1->date; ?></td>
              <td><?= $r1->location; ?></td>
              <td><?= $r1->description; ?></td>
            </tr>
          <?php
          }
          ?>
        </table>
      </div>
    </center>
  </main>
</body>
</html>