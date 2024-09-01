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
		      <li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle" data-toggle="dropdown">Books </a>
	        	<div class="dropdown-menu">
	        		<a class="dropdown-item" href="add_book.php">Add New Book</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="manage_book.php">Manage Books</a>
	        	</div>
		      </li>
		      <li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle" data-toggle="dropdown">Category </a>
	        	<div class="dropdown-menu">
	        		<a class="dropdown-item" href="add_cat.php">Add New Category</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="manage_cat.php">Manage Category</a>
	        	</div>
		      </li>
		      <li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle" data-toggle="dropdown">Authors</a>
	        	<div class="dropdown-menu">
	        		<a class="dropdown-item" href="add_author.php">Add New Author</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="manage_author.php">Manage Author</a>
	        	</div>
		      </li>
	          <li class="nav-item">
		        <a class="nav-link" href="issue_book.php">Issue Book</a>
		      </li>
		    </ul>
		</div>
	</nav>
	
	<span><marquee direction="left" bgcolor="pink" text-success>Welcome To Library </marquee></span><br>

	<span><marquee direction="right" bgcolor="yellow" text-success>A library is the delivery room for the birth of ideas, a place where history comes to life</marquee></span><br><br>
    <center><h4>Add a new Category</h4><br></center>
		<div class="row">
			<div class="col-md-4 bg-dark"></div>
			<div class="col-md-8 bg-dark">
				<form action="" method="post">
					<div class="form-group text-white">
						<label for="Category">Category Name:</label>
						<input type="text" name="cat_name" class="form-control" required>
					</div>
					<!-- <div class="form-group text-white">
						<label for="Biography">Nationality:</label>
						<input type="text" name="book_author" class="form-control" required>
					</div>
					<div class="form-group text-white">
						<label for="Biography">Biography</label>
						<input type="text" name="book_category" class="form-control" required>
					</div>
					 -->
					
					<button type="submit" name="add_cat" class="btn btn-danger">Add Book</button>
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
</body>
</html>
<?php
	if(isset($_POST['add_cat']))
	{
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"lms");
		$query = "insert into category values(null,'$_POST[cat_name]')";
		$query_run = mysqli_query($connection,$query);
		#header("location:add_cat.php");
	}
?>
