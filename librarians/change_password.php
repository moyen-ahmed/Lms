<?php
	session_start();
	$connection = mysqli_connect("localhost", "root", "", "lms");
    $lib_image = "";
    $query = "SELECT * FROM librarians WHERE email = '$_SESSION[email]'";
    $query_run = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {
        $lib_image= $row['lib_image'];
   
       
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style>
		body {
			background-color: #2B71B7;
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
			margin-top: 20px;
		}
		.custom-container {
			padding: 20px;
			background-color: #ffffff;
			border-radius: 10px;
			box-shadow: 0 4px 8px rgba(0,0,0,0.1);
		}
		.marquee {
			margin-top: 100px;
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
	<br>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="marquee marquee-1">
					<marquee>Welcome To Library</marquee>
				</div>
				<div class="marquee marquee-2">
					<marquee>A library is the delivery room for the birth of ideas, a place where history comes to life</marquee>
				</div>
			</div>
		</div>
		<br>
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="custom-container">
					<h4 class="text-center">Change Password</h4>
					<form action="update_password.php" method="post">
						<div class="form-group">
							<label for="old_password">Enter Password:</label>
							<input type="password" class="form-control" name="old_password" id="old_password" required>
						</div>
						<div class="form-group">
							<label for="new_password">Enter New Password:</label>
							<input type="password" class="form-control" name="new_password" id="new_password" required>
						</div>
						<button type="submit" name="update" class="btn btn-primary btn-block">Update Password</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
