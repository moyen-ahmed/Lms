<?php
	session_start();
	#fetch data from database
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$e_name = "";
    $type = "";
    $avility = "";
	$brance_id = "";
	$query = "select * from  eresources where e_id = $_GET[en]";
	$query_run = mysqli_query($connection,$query);
	while ($row = mysqli_fetch_assoc($query_run)){
		$e_name = $row['e_name'];
        $type = $row['type'];
        $avility = $row['avility'];
		$brance_id = $row['brance_id'];
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <script src="../../bootstrap-4.4.1/js/jquery_latest.js"></script>
    <script src="../../bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .navbar-brand img {
            height: 30px;
            margin-right: 10px;
        }
        .navbar-text {
            margin-right: 15px;
        }
        .dropdown-menu {
            min-width: 180px;
        }
        .form-container {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container .form-group {
            margin-bottom: 20px;
        }
        .form-container .btn {
            width: 100%;
        }
        .marquee {
            padding: 10px 0;
            background-color: #ffc107;
            color: #fff;
            font-weight: 500;
            text-align: center;
        }
        .container-fluid {
            margin-top: 20px;
        }
        .container {
            margin-top: 40px;
        }
        .header-title {
            margin-bottom: 20px;
            font-weight: 700;
        }
        .nav-link:hover {
            background-color: #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-success" href="index.php">
            <img class="logo" src="../logo.png"> Library Management System
        </a>
        <span class="navbar-text text-success">
            <strong>Welcome: <?php echo htmlspecialchars($_SESSION['name']); ?></strong>
        </span>
        <span class="navbar-text text-success">
            <strong>Email: <?php echo htmlspecialchars($_SESSION['email']); ?></strong>
        </span>
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-success" data-toggle="dropdown">My Profile</a>
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
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #5ACC97">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="librarians_dashboard.php">Dashboard</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown">Books</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="add_book.php">Add New Book</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="manage_book.php">Manage Books</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown">Category</a>
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
            <li class="nav-item"><a class="nav-link" href="issue_book.php">Issue Book</a></li>
        </ul>
    </div>
</nav>

<div class="marquee">Welcome To Library</div>
<div class="marquee">A library is the delivery room for the birth of ideas, a place where history comes to life</div>

<div class="container">
    <center><h4 class="header-title">Edit </h4></center>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form-container">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="book_isbn">Name:</label>
                        <input type="text" name="e_name" value="<?php echo htmlspecialchars($e_name); ?>" class="form-control" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="book_name">Type</label>
                        <input type="text" name="type" value="<?php echo htmlspecialchars($type); ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="author_id">Avility</label>
                        <input type="text" name="avility" value="<?php echo htmlspecialchars($avility); ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="cat_id">Branch ID:</label>
                        <input type="text" name="brance_id" value="<?php echo htmlspecialchars($brance_id); ?>" class="form-control" required>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary btn-lg">Update </button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
	if(isset($_POST['update'])){
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"lms");
		$query = "update eresources set type = '$_POST[type]',avility= $_POST[avility],brance_id= $_POST[brance_id] where e_id = $_GET[en]";
		$query_run = mysqli_query($connection,$query);
		#header("location:manage.php");
	}
?>