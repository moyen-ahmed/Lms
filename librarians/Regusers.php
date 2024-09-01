<?php
require("count.php");
session_start();
#fetch data from database
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"lms");

$search_query = "";
if (isset($_POST['search'])) {
    $search_query = $_POST['search_query'];
}

$query = "SELECT * FROM users LEFT JOIN issued_books ON users.id=issued_books.student_id ";
if ($search_query) {
    $query .= " WHERE name LIKE '%$search_query%'";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>All Reg Users</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="../bootstrap-4.4.1/js/jquery_latest.js"></script>
    <script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
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
            padding: 20px; /* Increase cell padding for better spacing */
        }
        .table img {
            max-width: 200px; /* Increase image size */
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
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-success" href="librarians_dashboard.php"><img class="logo" src="logo.png" alt="Library Logo">Library Management System</a>
        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item dropdown navbar-dark bg-company-red">
                <a class="nav-link dropdown-toggle text-success" data-toggle="dropdown">My Profile</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item text-success" href="#">View Profile</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link text-success" href="../logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav><br>

<span><marquee direction="left" bgcolor="pink" class="text-success">Welcome To Library </marquee></span><br>

<span><marquee direction="right" bgcolor="yellow" class="text-success">A library is the delivery room for the birth of ideas, a place where history comes to life</marquee></span><br><br>
<center><h4 class="text-success">Registered Users Detail</h4><br></center>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <form method="post" action="">
            <div class="input-group mb-3">
                <input type="text" name="search_query" class="form-control" placeholder="Search by Name" value="<?php echo $search_query; ?>">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit" name="search">Search</button>
                </div>
            </div>
        </form>
        <table class="table table-bordered table-danger table-hover">
            <tr>
                <th>Name</th>
                <th>Student Image</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Fine</th>
            </tr>
            <?php
            $query_run = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($query_run)) {
                $name = $row['name'];
                $std_image = $row['std_image'];
                $email = $row['email'];
                $mobile = $row['mobile'];
                $address = $row['address'];
                $fine=$row['fine'];
            ?>
            <tr class="animate-slidein">
                <td><?php echo $name; ?></td>
                <td><img src="<?php echo '../' . $std_image; ?>" alt="Student Image"></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $mobile; ?></td>
                <td><?php echo $address; ?></td>
                <td><?php echo $fine; ?></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <div class="col-md-2"></div>
</div>
</body>
</html>
