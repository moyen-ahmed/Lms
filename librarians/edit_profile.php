<?php
	session_start();
	#fetch data from database
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$name = "";
	$email = "";
	$mobile = "";
	$lib_image="";
	$query = "select * from librarians where email = '$_SESSION[email]'";
	$query_run = mysqli_query($connection,$query);
	while ($row = mysqli_fetch_assoc($query_run)){
		$name = $row['name'];
		$email = $row['email'];
		$mobile = $row['mobile'];
		$lib_image= $row['lib_image'];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
	<link rel="stylesheet" href="../bootstrap-4.4.1/css/bootstrap.min.css">
	<script src="../bootstrap-4.4.1/js/jquery_latest.js"></script>
	<script src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<style>
		body {
			background-color: #266FB9;
			color: #343a40;
			font-family: Arial, sans-serif;
		}
		/* Navbar styling */
        .navbar {
            background: rgba(255, 255, 255, 0.3); /* Semi-transparent white background */
            backdrop-filter: blur(8px);
            height: 85px;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .navbar-brand {
            color: #fff !important;
            font-size: 40px;
            font-weight: 900;
        }
        .s {
    color: greenyellow;
}

        .navbar .user-info {
            color: #f9f9f9;
            font-size: x-large;
            text-align: center;
            flex-grow: 1;
        }
        .navbar-nav {
            display: flex;
            align-items: center;
        }
        .navbar-nav .nav-item {
            list-style: none;
        }
        .profile-picture {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            object-fit: cover;
        }

		.container {
			margin-top: 100px;
		}
		.custom-container {
			padding: 20px;
			background-color: #ffffff;
			border-radius: 10px;
			box-shadow: 0 4px 8px rgba(0,0,0,0.1);
		}
		.marquee {
			padding: 10px;
			color: #343a40;
			font-weight: bold;
			font-size: 1.1em;
			border-radius: 5px;
			margin-bottom: 10px;
		}
		.marquee-1 {
			background-color: #ffc0cb;
		}
		.marquee-2 {
			background-color: #ffffe0;
		}
		h4 {
			color: #343a40;
			margin-bottom: 20px;
		}
		.form-group label {
			font-weight: bold;
		}
		.btn-primary {
			background-color: #82CCC3;
			border: none;
		}
		.btn-primary:hover {
			background-color: #6da9a1;
		}
		.profile-form {
			margin-top: 20px;
		}
	</style>
</head>
<body>
	


<nav class="navbar navbar-expand-lg navbar-light fixed-top">
   
   <a href="librarians_dashboard.php" class="navbar-brand">LM<span class="s">S</span></a>
   <div class="user-info">
	   <span><?php echo $_SESSION['name']; ?></span><br>
	   <span>Email: <?php echo $_SESSION['email']; ?></span>
   </div>
   <ul class="navbar-nav">
	   <li class="nav-item">
		   <a href="view_profile.php">
			   <img class="profile-picture" src="<?php echo $lib_image; ?>" alt="Profile Picture">
		   </a>
	   </li>
   </ul>
</nav>
	<div class="container">
		
		<div class="profile-form">
			<h4 class="text-center">Edit Profile</h4>
			<div class="row justify-content-center">
				<div class="col-md-6">
					<div class="custom-container">
						<form action="update.php" method="post">
							<div class="form-group">
								<label for="name">Name:</label>
								<input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
							</div>
							<div class="form-group">
								<label for="email">Email:</label>
								<input type="email" name="email" class="form-control" value="<?php echo $email; ?>" disabled required>
							</div>
							<div class="form-group">
								<label for="mobile">Mobile:</label>
								<input type="text" name="mobile" class="form-control" value="<?php echo $mobile; ?>">
							</div>
							<button type="submit" name="update" class="btn btn-primary btn-block">Update</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
