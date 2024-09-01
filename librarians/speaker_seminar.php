<?php
session_start();
// Fetch data from the database
$connection = mysqli_connect("localhost", "root", "", "lms");
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


$query = "SELECT * FROM speaker INNER JOIN seminar ON speaker.s_id=seminar.s_id INNER JOIN library_branches ON speaker.branch_id=library_branches.branch_id";


$query_run = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Reg Users</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="../bootstrap-4.4.1/js/jquery_latest.js"></script>
    <script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand text-success" href="librarians_dashboard.php"><img class="logo" src="logo.png">Library Management System </a>
            </div>
            <font style="color: green"><span><strong>Welcome: <?php echo $_SESSION['name']; ?></strong></span></font>
            <font style="color: green"><span><strong>Email: <?php echo $_SESSION['email']; ?></strong></span></font>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown navbar-dark bg-company-red ">
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
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #5ACC97">
        <div class="container-fluid">
            <ul class="nav navbar-nav navbar-center">
                <li class="nav-item">
                    <a class="nav-link" href="librarians_dashboard.php">Dashboard</a>
                </li>
            </ul>
        </div>
    </nav>
    
    <span>
        <marquee direction="left" bgcolor="pink" text-success>Welcome To Library </marquee>
    </span><br>

    <span>
        <marquee direction="right" bgcolor="yellow" text-success>A library is the delivery room for the birth of ideas, a place where history comes to life</marquee>
    </span><br><br>
    <center>
        <h4>Seminar Details</h4><br>
    </center>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form>
                <table class="table table-bordered table-danger table-hover">
                    <tr>
                        <th>Branch Name</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Speaker Name</th>
                        <th>Speech Title</th>
                        <th>Specialization</th>
                        <th>Speaker Image</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                        <tr>
                            <td><?php echo $row['branch_name']; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['seminar_date']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['speech_title']; ?></td>
                            <td><?php echo $row['specialization']; ?></td>
                            <td><img src="<?php echo $row['sp_image']; ?>" alt="Speaker Image" width="150"></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>
</html>

<?php
mysqli_close($connection);
?>
