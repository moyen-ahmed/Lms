<?php
// require("count.php");
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
    <link rel="stylesheet" type="text/css" href="../../bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="../../bootstrap-4.4.1/js/jquery_latest.js"></script>
    <script type="text/javascript" src="../../bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
           background:  #266FB9;
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

h4{
    color: #f9f9f9;
    margin-top: 100px;
}


        .marquee-container {
            background-color: pink;
            color: #000;
        }
        .marquee-container:nth-child(2) {
            background-color: yellow;
        }
        #main_content {
            padding: 20px;
            background-color: #fff3cd;
            margin-bottom: 20px;
        }
        #side_bar {
            background-color: #ffebcd;
            padding: 20px;
            font-family: "Poetsen One", sans-serif;
        }
        .form-group label {
            color: #fff;
        }
        .form-container {
			background: rgba(0, 0, 100, 0.3); /* Semi-transparent white background */
    backdrop-filter: blur(5px); 
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 5px;
            color: white;
            margin-top: 100px;
        }
        .form-container .form-group {
            margin-bottom: 15px;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        table {
            width: 100%;
            background-color: #dc3545;
            color: #fff;
        }
        table th, table td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light fixed-top">
   
   <a href="../librarians_dashboard.php" class="navbar-brand">LM<span class="s">S</span></a>
   <div class="user-info">
	   <span><?php echo $_SESSION['name']; ?></span><br>
	   <span>Email: <?php echo $_SESSION['email']; ?></span>
   </div>
   <ul class="navbar-nav">
	   <li class="nav-item">
		   <a href="../view_profile.php">
			   <img class="profile-picture" src="<?php echo $lib_image; ?>" alt="Profile Picture">
		   </a>
	   </li>
   </ul>
</nav>

<div class="container">
    <center><h4>Add a eResourcesk</h4></center>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="form-container">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="book_name">eResources Name</label>
                        <input type="text" name="e_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="author_id">eResources Type</label>
                        <input type="text" name="type" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="author_name">Availability</label>
                        <input type="text" name="avility" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="cat_id">Branch ID</label>
                        <input type="text" name="brance_id" class="form-control" required>
                    </div>
                    
                    <button type="submit" name="add_book" class="btn btn-danger">Add Book</button>
                </form>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

</body>
</html>
<!-- PHP code to handle book addition -->
<?php
if (isset($_POST['add_book'])) {
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "lms");
    $e_name = $_POST['e_name'];
    $type = $_POST['type'];
    $avility = $_POST['avility'];
    $brance_id = $_POST['brance_id'];
   $query = "INSERT INTO `eresources`(`e_id`, `e_name`, `type`, `avility`, `brance_id`) VALUES ('','$e_name','$type','$avility','$brance_id')";
    $query_run = mysqli_query($connection, $query);
}
?>
