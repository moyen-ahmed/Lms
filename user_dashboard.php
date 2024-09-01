<?php
session_start();
function get_user_issue_book_count() {
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "lms");
    $user_issue_book_count = 0;
    $query = "select count(*) as user_issue_book_count from issued_books where student_id = $_SESSION[id]";
    $query_run = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {
        $user_issue_book_count = $row['user_issue_book_count'];
    }
    return ($user_issue_book_count);
}
function get_book_count() {
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "lms");
    $book_count = 0;
    $query = "select count(*) as book_count from books";
    $query_run = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {
        $book_count = $row['book_count'];
    }
    return ($book_count);
}
function get_lib_count() {
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "lms");
    $lib_count = 0;
    $query = "select count(*) as lib_count from library_branches";
    $query_run = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {
        $lib_count = $row['lib_count'];
    }
    return ($lib_count);
}
$connection = mysqli_connect("localhost", "root", "", "lms");
$lib_image = "";
$query = "SELECT * FROM users WHERE email = '$_SESSION[email]'";
$query_run = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($query_run)) {
    $std_image = $row['std_image'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url(librarians/bgimge/4k.jpg);
            backdrop-filter: blur(5px);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #fff;
            padding-top: 100px; /* Adjust padding to prevent content from being hidden under navbar */
        }

        .navbar {
            background: rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(8px);
            height: 95px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
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
            width: 85px;
            height: 85px;
            border-radius: 50%;
            object-fit: cover;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            background-color: #343a40;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card img {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            height: 200px;
            object-fit: cover;
        }

        .card-header {
            background-color: #627B91;
            color: #fff;
        }

        .card-body {
            background-color: #343a40;
            color: #ffc107;
        }

        .btn-outline-warning {
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-outline-warning:hover {
            background-color: #ffc107;
            color: #343a40;
        }

        .marquee {
            margin: 20px 0;
            color: #fff;
            font-size: 1.2em;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <a href="../home.php" class="navbar-brand">LM<span class="s">S</span></a>
        <div class="user-info">
            <span><?php echo $_SESSION['name']; ?></span><br>
            <span>Email: <?php echo $_SESSION['email']; ?></span>
        </div>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="view_profile.php">
                    <img class="profile-picture" src="<?php echo $std_image; ?>" alt="Profile Picture">
                </a>
            </li>
        </ul>
    </nav>

    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <img src="author280x180.png" alt="Author Image" class="card-img-top">
                    <div class="card-header">Number Book Issued: <?php echo get_user_issue_book_count(); ?></div>
                    <div class="card-body">
                        <a href="view_iss.php"  class="btn btn-outline-warning btn-block">View Issued Books</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="bbb.png" alt="Book Image" class="card-img-top">
                    <div class="card-header">Number of Books in Library: <?php echo get_book_count(); ?></div>
                    <div class="card-body">
                        <a href="view_book.php"  class="btn btn-outline-info btn-block">View Books</a>
                        <a href="review.php"  class="btn btn-outline-danger btn-block">Review Books</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="11.jpg" alt="Library Image" class="card-img-top">
                    <div class="card-header">Number of Libraries: <?php echo get_lib_count(); ?></div>
                    <div class="card-body">
                        <a href="view_library.php"  class="btn btn-outline-warning btn-block">View Library</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="image.png" alt="Event Image" class="card-img-top">
                    <div class="card-header">Event</div>
                    <div class="card-body">
                        <a href="view_event.php"  class="btn btn-outline-warning btn-block">View Event</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="gggm.jpg" alt="Seminar Image" class="card-img-top">
                    <div class="card-header">Seminar</div>
                    <div class="card-body">
                        <a href="view_seminar.php"  class="btn btn-outline-warning btn-block">View Seminar Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $(".card").hover(
                function () {
                    $(this).addClass("shadow-lg").css("cursor", "pointer");
                },
                function () {
                    $(this).removeClass("shadow-lg");
                }
            );
        });
    </script>
</body>

</html>
