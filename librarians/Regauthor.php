<?php
require("count.php");
session_start();

// Fetch data from database
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}
$db = mysqli_select_db($connection, "lms");
if (!$db) {
    die("Database selection failed: " . mysqli_error($connection));
}

$author_full_name = "";
$au_image = "";
$nationality = "";
$biography = "";

$search = "";
if (isset($_POST['submit_search']) && !empty($_POST['search'])) {
    $search = mysqli_real_escape_string($connection, $_POST['search']);
    $query = "SELECT * FROM Authors WHERE author_full_name LIKE '%$search%'";
} else {
    $query = "SELECT * FROM Authors";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>All Reg Users</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .navbar-brand img {
            height: 30px;
        }
        .logo {
            margin-right: 10px;
        }
        .navbar-brand {
            display: flex;
            align-items: center;
            color: #28a745 !important; /* Green color */
        }
        .nav-link {
            color: #28a745 !important; /* Green color */
        }
        .nav-link:hover {
            color: #218838 !important; /* Dark green color on hover */
        }
        .table th, .table td {
            font-size: 18px;
            vertical-align: middle;
            text-align: center;
        }
        .table img {
            max-width: 150px;
            height: auto;
        }
        @keyframes slidein {
            from {
                transform: translateY(-100%);
            }
            to {
                transform: translateY(0);
            }
        }
        .animate-slidein {
            animation: slidein 1s ease-in-out;
        }
        .search-bar {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        .search-bar input {
            width: 60%;
            padding: 10px;
            font-size: 18px;
            border: 2px solid #28a745;
            border-radius: 50px;
            transition: all 0.3s ease-in-out;
        }
        .search-bar input:focus {
            width: 70%;
            outline: none;
            border-color: #218838;
        }
        .search-bar button {
            margin-left: -50px;
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 50px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }
        .search-bar button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="librarians_dashboard.php">
                <img class="logo" src="logo.png" alt="Logo"> Library Management System
            </a>
        </div>
        <div class="ml-auto text-success">
            <strong>Welcome: <?php echo $_SESSION['name']; ?></strong>
            <strong>Email: <?php echo $_SESSION['email']; ?></strong>
        </div>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">View Profile</a>
                    <!-- Add more links for profile actions -->
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-3">
    <marquee direction="left" bgcolor="pink" class="text-success">Welcome To Library</marquee>
    <marquee direction="right" bgcolor="yellow" class="text-success">A library is the delivery room for the birth of ideas, a place where history comes to life</marquee>
</div>

<div class="container mt-3">
    <div class="search-bar">
        <form method="post" class="d-flex">
            <input class="form-control" type="search" placeholder="Search Author" name="search" value="<?php echo $search; ?>">
            <button class="btn btn-outline-danger" name="submit_search" type="submit">Search</button>
        </form>
    </div>
    <h4 class="text-center mb-4">Registered Authors</h4>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <table class="table table-bordered table-hover">
                <thead class="bg-danger text-white">
                    <tr>
                        <th>Full Name</th>
                        <th>Author Image</th>
                        <th>Nationality</th>
                        <th>Biography</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query_run = mysqli_query($connection, $query);
                    if ($query_run) {
                        while ($row = mysqli_fetch_assoc($query_run)) {
                            $author_full_name = $row['author_full_name'];
                            $au_image = $row['au_image'];
                            $nationality = $row['nationality'];
                            $biography = $row['biography'];
                    ?>
                    <tr class="animate-slidein">
                        <td><?php echo $author_full_name; ?></td>
                        <td><img src="<?php echo $au_image; ?>" alt="Author Image"></td>
                        <td><?php echo $nationality; ?></td>
                        <td><?php echo $biography; ?></td>
                    </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='4'>No records found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="../bootstrap-4.4.1/js/jquery_latest.js"></script>
<script src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
