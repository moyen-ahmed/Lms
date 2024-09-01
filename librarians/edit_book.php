<?php
session_start();
if (!isset($_SESSION['name']) || !isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

# Database connection
$connection = new mysqli("localhost", "root", "", "lms");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$book_isbn = $_GET['bn'] ?? '';
$book_name = $author_id = $cat_id = "";

if ($book_isbn) {
    $stmt = $connection->prepare("SELECT * FROM books WHERE book_isbn = ?");
    $stmt->bind_param("s", $book_isbn);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $book_name = $row['book_name'];
        $author_id = $row['author_id'];
        $cat_id = $row['cat_id'];
    }
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $new_book_name = $_POST['book_name'];
    $new_author_id = $_POST['author_id'];
    $new_cat_id = $_POST['cat_id'];

    $stmt = $connection->prepare("UPDATE books SET book_name = ?, author_id = ?, cat_id = ? WHERE book_isbn = ?");
    $stmt->bind_param("siis", $new_book_name, $new_author_id, $new_cat_id, $book_isbn);
    $stmt->execute();
    $stmt->close();

    header("Location: manage_book.php");
    exit();
}

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <script src="../bootstrap-4.4.1/js/jquery_latest.js"></script>
    <script src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
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
            <img class="logo" src="logo.png"> Library Management System
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
    <center><h4 class="header-title">Edit Book</h4></center>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form-container">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="book_isbn">Book Number:</label>
                        <input type="text" name="book_isbn" value="<?php echo htmlspecialchars($book_isbn); ?>" class="form-control" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="book_name">Book Name:</label>
                        <input type="text" name="book_name" value="<?php echo htmlspecialchars($book_name); ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="author_id">Author ID:</label>
                        <input type="text" name="author_id" value="<?php echo htmlspecialchars($author_id); ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="cat_id">Category ID:</label>
                        <input type="text" name="cat_id" value="<?php echo htmlspecialchars($cat_id); ?>" class="form-control" required>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary btn-lg">Update Book</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
