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
        margin-top: 200px;
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
  </style>
  <title>Shaded Left Portion</title>
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
      <form action="" method="post">
        <div>
          <label for="campaignname">Campaign Name:</label>
          <input id="campaignname" name="campaignname" placeholder="Enter Campaign name" type="text" autofocus />
        </div>
        <div>
          <label for="organizer">Organizer Name:</label>
          <input id="organizer" name="organizer" placeholder="Enter Organizer name" type="text" />
        </div>
        <div>
          <label for="date">Date:</label>
          <input type="date" id="date" name="date" required>
        </div>
        <div>
          <label for="location">location:</label>
          <textarea id="location" name="location"></textarea>
        </div>
        <div>
          <label for="description">Short Description:</label>
          <textarea id="description" name="description"></textarea>
        </div>
        <input type="submit" name="sub" value="Submit" />
      </form>
      <?php 

              if(isset($_POST['sub'])){
              $campaignname = $_POST["campaignname"];    
              $organizer = $_POST["organizer"];
              $date = $_POST["date"];
              $location = $_POST["location"];
              $description = $_POST["description"];
              //code after connection is successfull
              $q = $db->prepare("INSERT INTO campaign(campaignname,organizer,date,location,description) VALUES (:campaignname,:organizer,:date,:location,:description)");
              $q->bindValue('campaignname',$campaignname);
              $q->bindValue('organizer',$organizer);
              $q->bindValue('date',$date);
              $q->bindValue('location',$location);
              $q->bindValue('description',$description);
              if($q->execute())
              {
                echo "<script>alert('Details submitted successfully')</script>";
              }
              else
              {
                echo "<script>alert('Details not submitted')</script>";
              }
}

?>
    </center>
  </main>
</body>
</html>