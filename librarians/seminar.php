<?php
require("count.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>user_dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
      <style type="text/css">
li::marker {
color: red;
}
.form-group {
width: 400px;
.card-image{
	height:300px;
	width: 300px;
}

}
	#main_content{
		padding: 170px;
		height: 800px;
        width: 200px;
		background-color:navajowhite;
	}
	#side_bar{
		background-color:antiquewhite;
		padding: 40px;
		
		height: 800px;
        width: 200px;
        font-family: "Poetsen One", sans-serif;
  font-weight: 400;
  font-style: normal;
	}
	

</style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
			
			<a class="navbar-brand text-success" href="index.php"><img class="logo"src="logo.png">Library Management System  </a>
            </div>
            <font style="color:green"><span><strong>Welcome: <?php echo $_SESSION['name'];?></strong></span></font>
			<font style="color:green"><span><strong>Email: <?php echo $_SESSION['email'];?></strong></font>

            <ul class="nav navbar-nav navbar-right">
            <ul class="nav navbar-nav navbar-right">
		      <li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle text-success" data-toggle="dropdown">My Profile </a>
	        	<div class="dropdown-menu">
	        		<a class="dropdown-item text-success" href="view_profile.php">View Profile</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item text-success" href="edit_profile.php">Edit Profile</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item text-success" href="change_password.php">Change Password</a>
	        	</div>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link text-success" href="logout.php">Logout</a>
		      </li>
		    </ul>
            </ul>
        </div>
    </nav>
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #5ACC97">
		<div class="container-fluid">
			
		    <ul class="nav navbar-nav navbar-center">
		      <li class="nav-item">
		        <a class="nav-link" href="librarians_dashboard.php">Dashboard</a>
		      </li>
		    
		    </ul>
		</div>
	</nav>
	
	<span><marquee direction="left" bgcolor="pink" text-success>Welcome To Library </marquee></span><br>

	<span><marquee direction="right" bgcolor="yellow" text-success>A library is the delivery room for the birth of ideas, a place where history comes to life</marquee></span><br><br>
    <center><h4>Seminar</h4><br></center>
    <div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-8 ">
				<form action="" method="post">
				<div class="form-group text-dark">
						<label for="email">Seminar Id</label>
						<input type="text" name="s_id" class="form-control" required>
					</div>
					
					<div class="form-group text-dark">
						<label for="email">Topic:</label>
						<input type="text" name="title" class="form-control" required>
					</div>
					
					<div class="form-group text-dark">
						<label for="mobile">Seminar Date:</label>
						<input type="date" name="seminar_date" class="form-control" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" required>

					</div>
					<div class="form-group text-dark">
						<label for="mobile">Start Time:</label>
						<input type="time"  name="start_time" class="form-control" required>
					</div>
					<div class="form-group text-dark">
						<label for="mobile">End Time:</label>
						<input type="time" name="end_time" class="form-control" required>
					</div>


					<div class="form-group">
						
					     <label for="mobile">Branch Id:</label>
						<input type="text" name="branch_id" class="form-control" required>


                    <button type="submit" name="issu_book" class="btn btn-danger">Fix Seminar</button>
                    </div>
                    </div>

					
					
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
</body>
</html>
<?php
	if(isset($_POST['issu_book']))
	{
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"lms");
		$query = "insert into seminar values('$_POST[s_id]','$_POST[title]','$_POST[seminar_date]','$_POST[start_time]','$_POST[end_time]','$_POST[branch_id]')";
		$query_run = mysqli_query($connection,$query);
		#header("location:seminar.php");
	}
?>
<!-- //forigen key nea problem -->


















































