<?php
require("count.php");
session_start();
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
            background-image: url('bgimge/book.gif');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #343a40;
        }
        .navbar-brand img {
            height: 30px;
            margin-right: 10px;
        }
        .navbar-brand {
            display: flex;
            align-items: center;
        }
        .navbar-nav .nav-item .nav-link {
            color: #5ACC97;
        }
        .navbar-nav .nav-item .nav-link:hover {
            color: #fff;
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
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            margin: 20px auto;
            max-width: 600px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
        .header-text {
            color: #5ACC97;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="librarians_dashboard.php">
                <img src="logo.png" alt="Logo"> Library Management System
            </a>
            <div class="ml-auto text-success">
                <strong>Welcome: <?php echo $_SESSION['name']; ?></strong>
                <strong>Email: <?php echo $_SESSION['email']; ?></strong>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="view_profile.php">View Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="edit_profile.php">Edit Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="change_password.php">Change Password</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
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
            <center><h4 class="header-text">Add a New Author</h4></center>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="author_id">Author ID:</label>
                    <input type="text" name="author_id" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="author_full_name">Author Full Name:</label>
                    <input type="text" name="author_full_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nationality">Nationality:</label>
                    <input type="text" name="nationality" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="biography">Biography:</label>
                    <input type="text" name="biography" class="form-control" required>
                </div>
				<div class="form-group">
                        <label for="uploadfile">Image:</label>
                        <input type="file" name="uploadfile" class="form-control-file">
                    </div>
                <button type="submit" name="add_author" class="btn btn-custom">Add Author</button>
            </form>
        </div>
    </div>
</body>
</html>
<?php
    if(isset($_POST['add_author'])) {
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"lms");
		
		$filename = $_FILES["uploadfile"]["name"];
		$tempname = $_FILES["uploadfile"]["tmp_name"];
		$folder = "image/" . $filename;
	
		move_uploaded_file($tempname, $folder);
		$author_id = $_POST['author_id'];
		$author_full_name = $_POST['author_full_name'];
		
		$nationality= $_POST['nationality'];
		$biography = $_POST['biography'];
        $query = "INSERT INTO `authors`(`author_id`, `author_full_name`, `au_image`, `nationality`, `biography`) VALUES ('$author_id','$author_full_name','$folder','$nationality','$biography')";
        $query_run = mysqli_query($connection,$query);
    }
?>
