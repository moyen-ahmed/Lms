<?php
require("count.php");
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
    <title>User Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="../bootstrap-4.4.1/js/jquery_latest.js"></script>
    <script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('bgimge/loop.gif');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
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


        .dropdown-menu .dropdown-item {
            color: #5ACC97;
        }
        .dropdown-menu .dropdown-item:hover {
            color: #fff;
            background-color: #5ACC97;
        }
        marquee {
            font-weight: bold;
        }
        .main-content {
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            margin: 20px auto;
            width: 50%;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-custom {
            background-color: #5ACC97;
            border: none;
            color: #fff;
        }
        .btn-custom:hover {
            background-color: #4BA77A;
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
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #5ACC97;">
        <div class="container-fluid">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="librarians_dashboard.php">Dashboard</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-3">
        <span><marquee direction="left" bgcolor="pink">Welcome To Library</marquee></span>
        <span><marquee direction="right" bgcolor="yellow">A library is the delivery room for the birth of ideas, a place where history comes to life</marquee></span>
    </div>
    <div class="container">
        <div class="main-content">
            <center><h4>Add Branch</h4></center><br>
            <form action="" method="post">
                <div class="form-group">
                    <label for="branch_id">Branch ID:</label>
                    <input type="text" name="branch_id" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="branch_name">Branch Name:</label>
                    <input type="text" name="branch_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="contact_info">Contact Info:</label>
                    <input type="text" name="contact_info" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="address">Location:</label>
                    <input type="text" name="address" class="form-control">
                </div>
                <button type="submit" name="Add_Branch" class="btn btn-custom">Add Branch</button>
            </form>
        </div>
    </div>
</body>
</html>
<!-- / add koraor jnno php code// -->
<?php
	if(isset($_POST['Add_Branch']))
	{
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"lms");
		$query = "insert into library_branches values($_POST[branch_id],'$_POST[branch_name]','$_POST[address]',$_POST[contact_info])";
		$query_run = mysqli_query($connection,$query);
		#header("location:ibrary_branches.php");
	}
?>
