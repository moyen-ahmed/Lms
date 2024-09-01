<?php

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
    <title>user_dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../../bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="../../bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="../../bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        li::marker {
            color: red;
        }

        .form-group {
            width: 400px;
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





        #main_content {
            padding: 170px;
            height: 800px;
            width: 200px;
            background-color: navajowhite;
        }

        #side_bar {
            background-color: antiquewhite;
            padding: 40px;
            height: 800px;
            width: 200px;
            font-family: "Poetsen One", sans-serif;
            font-weight: 400;
            font-style: normal;
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
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #5ACC97">
        <div class="container-fluid">
            <ul class="nav navbar-nav navbar-center">
                <li class="nav-item">
                    <a class="nav-link" href="Proceedings/librarians_dashboard.php">Dashboard</a>
                </li>
            </ul>
        </div>
    </nav>

    <span>
        <marquee direction="left" bgcolor="pink" class="text-success">Welcome To Library </marquee>
    </span><br>

    <span>
        <marquee direction="right" bgcolor="yellow" class="text-success">A library is the delivery room for the birth of ideas, a place where history comes to life</marquee>
    </span><br><br>
    <center>
        <h4>Award</h4><br>
    </center>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8 ">
            <form action="" method="post">
                <div class="form-group text-dark">
                    <label for="award_name">Member ID</label>
                    <input type="int" name="member_id" class="form-control" required>
                </div>

                <div class="form-group text-dark">
                    <label for="member_id">Event ID</label>
                    <input type="int" name="event_id" class="form-control" required>
                </div>

                <div class="form-group text-dark">
                    <label for="event_id">Award Name</label>
                    <input type="text" name="award_name" class="form-control" required>
                </div>

                <button type="submit" name="issu_book" class="btn btn-danger">Fix Seminar</button>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</body>

</html>

<?php
if (isset($_POST['issu_book'])) {
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "lms");
    $member_id = $_POST['member_id'];
    $event_id = $_POST['event_id'];
    $award_name = $_POST['award_name'];
     $query ="INSERT INTO `award`(`a_id`, `member_id`, `event_id`, `award_name`) VALUES ('','$member_id','$event_id','$award_name')";
    $query_run = mysqli_query($connection, $query);
    
    if ($query_run) {
        echo "<script>alert('Award added successfully');</script>";
        #header("location:award.php"); // Uncomment if you want to redirect
    } else {
        echo "<script>alert('Error adding award');</script>";
    }
}
?>
