<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>user_dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" type="text/css" href="../../bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="../../bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="../../bootstrap-4.4.1/js/bootstrap.min.js"></script>
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
			
			<a class="navbar-brand text-success" href="index.php"><img class="logo"src="../logo.png">Library Management System  </a>
            </div>
            <font style="color:green"><span><strong>Welcome: <?php echo $_SESSION['name'];?></strong></span></font>
			<font style="color:green"><span><strong>Email: <?php echo $_SESSION['email'];?></strong></font>

            <ul class="nav navbar-nav navbar-right">
            <ul class="nav navbar-nav navbar-right">
		      <li class="nav-item dropdown">
	        	<a class="nav-link text-success" data-toggle="dropdown">My Profile </a>
	        	
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
		        <a class="nav-link" href="../librarians_dashboard.php">Dashboard</a>
		      </li>
		     
		    </ul>
		</div>
	</nav>
	
	<span><marquee direction="left" bgcolor="pink" text-success>Welcome To Library </marquee></span><br>

	<span><marquee direction="right" bgcolor="yellow" text-success>A library is the delivery room for the birth of ideas, a place where history comes to life</marquee></span><br><br>
    <center><h4>Manage Books</h4><br></center>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<table class="table table-bordered table-danger table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Type</th>
							<th>Avility</th>
							<th>Branch</th>
                            <th>Action</th>
						</tr>
					</thead>
                    <?php
						$connection = mysqli_connect("localhost","root","");
						$db = mysqli_select_db($connection,"lms");
						$query = "select * from eresources";
						$query_run = mysqli_query($connection,$query);
						while ($row = mysqli_fetch_assoc($query_run)){
							?>
							<tr>
								<td><?php echo $row['e_id'];?></td>
								<td><?php echo $row['e_name'];?></td>
								<td><?php echo $row['type'];?></td>
								<td><?php echo $row['avility'];?></td>
                                <td><?php echo $row['brance_id'];?></td>
                                <td><button class="btn btn-outline-success" name=""><a href="edit_r.php?en=<?php echo $row['e_id'];?>">Edit</a></button>
								<button class="btn btn-outline-warning" name=""><a href="delete_r.php?en=<?php echo $row['e_id'];?>">Delete</a></button></td>
								
							</tr>

							<?php
						}
					?>
				</table>
			</div>
		
		</div>
</body>
</html>