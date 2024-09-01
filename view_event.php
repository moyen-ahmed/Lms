<?php
// require("eResources/count.php");
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
$id="";
$ename = "";
$branch_id="";
$branch_name = "";
$date= "";
$location="";


$search = "";
if (isset($_POST['submit2']) && !empty($_POST['search'])) {
    $search = mysqli_real_escape_string($connection, $_POST['search']);
    $query = "SELECT * FROM library_events LEFT JOIN library_branches on library_events.branch_id=library_branches.branch_id
              WHERE ename LIKE '%$search%' 
              OR type LIKE '%$search%' ";
} else {
    $query = "SELECT * FROM library_events LEFT JOIN library_branches on library_events.branch_id=library_branches.branch_id;";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>All Reg Users</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-4.4.1/js/jquery_latest.js"></script>
    <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
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
            position: relative;
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        .search-bar input {
            /* width: 250%; */
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
            position: absolute;
            right: calc(15% - 50px);
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
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-success" href="../librarians_dashboard.php"><img class="logo" src="../logo.png" alt="Library Logo">Library Management System</a>
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

<div class="search-bar">
    <form method="post" name="form1" class="d-flex">
        <input class="form-control" type="search" placeholder="Search" name="search">
        <button class="btn btn-outline-danger" name="submit2" type="submit">Search</button>
    </form>
</div>

<center>
    <h4>eResources</h4><br>
</center>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <form>
            <table class="table table-bordered table-danger table-hover">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Branch Name</th>
                </tr>

                <?php
                $query_run = mysqli_query($connection, $query);
                if ($query_run) {
                    while ($row = mysqli_fetch_assoc($query_run)) {
                         $event_id=$row['event_id'];
                        $ename= $row['ename'];
                        $date = $row['date'];
                        $branch_name = $row['branch_name'];
                        
                ?>
                        <tr class="animate-slidein">
                            <td><?php echo $event_id; ?></td>
                            <td><?php echo $ename; ?></td>
                            <td><?php echo $date; ?></td>
                            <td><?php echo $branch_name; ?></td>
                            
                       
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='4'>No records found</td></tr>";
                }
                ?>
            </table>
        </form>
    </div>
    <div class="col-md-2"></div>
</div>
</body>
</html>
