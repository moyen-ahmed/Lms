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
    margin-top: 100px;
    color: #f9f9f9;
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
    
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <center><h4>Add a new Book</h4></center>
            <div class="form-container">
                
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="book_name">Book Name:</label>
                        <input type="text" name="book_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="author_id">Author ID:</label>
                        <input type="text" name="author_id" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="author_name">Author Name:</label>
                        <input type="text" name="author_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="cat_id">Category ID:</label>
                        <input type="text" name="cat_id" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="cat_name">Category Name:</label>
                        <input type="text" name="cat_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="book_isbn">Book Number:</label>
                        <input type="text" name="book_isbn" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="aviavlity">Availability:</label>
                        <input type="text" name="aviavlity" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="uploadfile">Image:</label>
                        <input type="file" name="uploadfile" class="form-control-file">
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

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "image/" . $filename;

    move_uploaded_file($tempname, $folder);
    $book_name = $_POST['book_name'];
    $author_id = $_POST['author_id'];
    $author_name = $_POST['author_name'];
    $cat_id = $_POST['cat_id'];
    $cat_name = $_POST['cat_name'];
    $book_isbn = $_POST['book_isbn'];
    $aviavlity = $_POST['aviavlity'];

    $query = "INSERT INTO `books`(`book_image`, `book_name`, `author_id`, `author_name`, `cat_id`, `cat_name`, `book_isbn`, `aviavlity`)
              VALUES ('$folder','$book_name','$author_id','$author_name','$cat_id','$cat_name','$book_isbn','$aviavlity')";
    $query_run = mysqli_query($connection, $query);
}
?>
