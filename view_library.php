
<?php
	session_start();
	#fetch data from database
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$branch_id= "";
	$branch_name= "";
	$address= "";
	$contact_info= "";
	$query ="select * from library_branches";
?>
<!DOCTYPE html>
<html>

<head>
	<title>All Reg Users</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand text-success" href="user_dashboard.php"><img class="logo" src="logo.png">Library Management System </a>
			</div>
			<font style="color: green"><span><strong>Welcome: <?php echo $_SESSION['name']; ?></strong></span></font>
			<font style="color: green"><span><strong>Email: <?php echo $_SESSION['email']; ?></strong></font>
			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item dropdown navbar-dark bg-company-red ">
					<a class="nav-link text-success" data-toggle="dropdown">My Profile </a>
					
				</li>
				<li class="nav-item">
					<a class="nav-link text-success" href="../logout.php">Logout</a>
				</li>
			</ul>
		</div>
	</nav><br>
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #5ACC97">
		<div class="container-fluid">
			
		    <ul class="nav navbar-nav navbar-center">
		      <li class="nav-item">
		        <a class="nav-link" href="user_dashboard.php">Dashboard</a>
		      </li>
		    
		    </ul>
		</div>
	</nav>
	
	<span>
		<marquee direction="left" bgcolor="pink" text-success>Welcome To Library </marquee>
	</span><br>

	<span>
		<marquee direction="right" bgcolor="yellow" text-success>A library is the delivery room for the birth of ideas, a place where history comes to life</marquee>
	</span><br><br>
	<center>
		<h4>Library Branch</h4><br>
	</center>

	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<form>
			<table class="table table-bordered table-danger table-hover">
                <tr>
							<th>Branch ID </th>
							<th>Branch Name</th>
							<th>Address</th>
							<th>Contact Info</th>
                            
						</tr>

					<?php

					// shtotre korlam ekhane//
					$query_run = mysqli_query($connection, $query);
					while ($row = mysqli_fetch_assoc($query_run)) {

                        $branch_id  = $row['branch_id'];
                        $branch_name	 = $row['branch_name'];
						$address = $row['address'];
                        $contact_info = $row['contact_info'];
					?>
						<!-- //show korml ekne// -->
						<tr>
							<td><?php echo $branch_id; ?></td>
							<td><?php echo $branch_name; ?></td>
                            <td><?php echo $address; ?></td>
                            <td><?php echo $contact_info; ?></td>
						</tr>
					<?php
					}
					?>
				</table>
			</form>
		</div>
		<div class="col-md-2"></div>
	</div>
</body>

</html>