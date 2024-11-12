</!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	 <header>
	    <h1><a href="admin-home1.php" style="text-decoration: none;color: white;">Blood Bank Management System</a></h1>
	    <nav>
	      <ul>
	        <li><a href="campaign.php">Create Campaign</a></li>
	        <li><a href="editcampaign.php">Edit Campaign details</a></li>
	        <li><a href="viewcampaign.php">View Campaign</a></li>
	        <li><a href="#">Delete Campaign</a></li>
	      </ul>
	    </nav>
	  </header>
	<section class="content">
        <div class="container-fluid">
            <div class="block-header">
               
            </div>

            <!-- Widgets -->
            
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
            <!--  -->
            <!-- #END# CPU Usage -->
            <div class="row clearfix">
            <?php
			include 'connection1.php';
			$id=$_GET['id'];
			$qry= "select * from campaign where id='$id'";
			$result=mysqli_query($conn,$qry);
			while($row=mysqli_fetch_array($result)){
			    
			?>                                 
        <form role="form" action = "editedcampaign.php" method = "post">
          <div class="box-body">
            <div class="form-group">
            <label for="exampleInputEmail1">Campaign Name</label>
              <input type="text" class="form-control" name="campaignname"  value='<?php echo $row['campaignname']; ?>' placeholder="Enter Campaign Name" required>
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Organizer Name</label>
              <input type="text" class="form-control" name="organizer"  value='<?php echo $row['organizer']; ?>' placeholder="Enter Organizer's Name" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Date</label>
                <input type="date" class="form-control" name="date"  value='<?php echo $row['date']; ?>' placeholder="Enter Date" required>
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Location</label>
                <input type="text" class="form-control" name="location"  value='<?php echo $row['location']; ?>' placeholder="Enter Campaign Location Details" required>
              </div> 

              <div class="form-group">
                <label for="exampleInputPassword1">Short Description</label>
                <input type="text" class="form-control" name="description"  value='<?php echo $row['description']; ?>' placeholder="Enter Description" required>
              </div>
            
          </div>
          <!-- /.box-body -->
                            <!-- id hidden grna input type ma "hidden" -->
    <input type="hidden" name="id" value="<?php echo $row['id'];?>" 

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>

            <?php
			}
			?>
          </div>
          </form>
        </form>
                <!-- Visitors -->
               
                <!-- #END# Visitors -->
                <!-- Latest Social Trends -->
               
                <!-- #END# Latest Social Trends -->
                <!-- Answered Tickets -->
               
                  
                <!-- #END# Answered Tickets -->
            </div>

           
                <!-- #END# Task Info -->
                <!-- Browser Usage -->
              
                <!-- #END# Browser Usage -->
            </div>
        </div>
    </section>
</body>
</html>