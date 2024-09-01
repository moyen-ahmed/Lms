<?php
require("count.php");
session_start();
    // Fetch data from the database
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
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url(bgimge/4k.jpg);
            backdrop-filter: blur(5px);
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

        /* Secondary navbar */
        .secondary-navbar {
            background: rgba(25, 25, 255, 0.4); /* Semi-transparent white background */
            backdrop-filter: blur(5px);
            padding: 10px 0;
            color: #fff;
        }

        .secondary-navbar ul {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .secondary-navbar ul li {
            position: relative;
        }

        .secondary-navbar ul li a {
            color:white;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
            font-size: larger;
        }

        .secondary-navbar ul li a:hover {
            background: rgba(100, 10, 1005, 1); /* Semi-transparent white background */
            backdrop-filter: blur(8px);
            color: #fff;
        }

        .secondary-navbar ul li .dropdown-content {
            display: none;
            position: absolute;
            background-color: #D2BEDD;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .secondary-navbar ul li .dropdown-content a {
            color: #000;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .secondary-navbar ul li .dropdown-content a:hover {
            background-color: #ddd;
        }

        .secondary-navbar ul li:hover .dropdown-content {
            display: block;
        }

        /* Main content styling */
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin: 10px;
            width: 280px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-header {
            background-color: #6c757d;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .card-body {
            padding: 15px;
            background-color: #1D1E19DE;
            color: #fff;
            text-align: center;
        }

        .card-body .card-text {
            margin: 10px 0;
        }

        .card-body .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 0;
            border: none;
            background-color: #303973;
            color: #fff;
            cursor: pointer;
            text-decoration: none;
            border-radius: 4px;
        }

        .card-body .btn:hover {
            background-color: #e0a800;
        }

        /* Marquee styling */
        .marquee {
            background: rgba(100, 10, 1005, .5); /* Semi-transparent white background */
            backdrop-filter: blur(5px);
            padding: 10px;
            color: white;
            font-size: large;
            text-align: center;
            font-weight: bold;
        }
    </style>


<nav class="navbar navbar-expand-lg navbar-light fixed-top">
   
    <a href="../home.php" class="navbar-brand">LM<span class="s">S</span></a>
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




<div class="marquee">
        <marquee direction="left">Welcome To Library</marquee>
        <marquee direction="right">A library is the delivery room for the birth of ideas, a place where history comes to life</marquee>
    </div>




    <nav class="secondary-navbar">
        <ul>
            <li>
                <a href="#">Books</a>
                <div class="dropdown-content">
                    <a href="add_book.php">Add New Book</a>
                    <a href="manage_book.php">Manage Books</a>
                </div>
            </li>
            <li>
                <a href="#">eResources</a>
                <div class="dropdown-content">
                    <a href="eResources/eResources.php">Add eResources</a>
                    <a href="eResources/manage.php">Manage eResources</a>
                </div>
            </li>
            <li>
                <a href="#">Category</a>
                <div class="dropdown-content">
                    <a href="add_cat.php">Add New Category</a>
                    <a href="manage_cat.php">Manage Category</a>
                </div>
            </li>
            <li>
                <a href="#">Library Branch</a>
                <div class="dropdown-content">
                    <a href="ibrary_branches.php">Add New Branch</a>
                    <a href="manage_branches.php">Manage Branch</a>
                </div>
            </li>
            <li>
                <a href="#">Award</a>
                <div class="dropdown-content">
                    <a href="Award/award.php">Give Award</a>
                    <a href="manage_award.php">Manage Award</a>
                </div>
            </li>
            <li>
                <a href="#">Seminar</a>
                <div class="dropdown-content">
                    <a href="seminar.php">Add New Seminar</a>
                    <a href="manage_semi.php">Manage Seminar</a>
                </div>
            </li>
            <li>
                <a href="#">Library Events</a>
                <div class="dropdown-content">
                    <a href="event/addev.php">Add New Event</a>
                    <a href="event/manage_ev.php">Manage Event</a>
                </div>
            </li>
            <li>
                <a href="#">Proceeding</a>
                <div class="dropdown-content">
                    <a href="Proceedings/add_Proceeding.php">Add New Conference</a>
                    <a href="Proceedings/manage_Proceedings.php">Manage Conference</a>
                </div>
            </li>
            <li>
                <a href="#">Authors</a>
                <div class="dropdown-content">
                    <a href="add_author.php">Add New Author</a>
                    <a href="manage_author.php">Manage Author</a>
                </div>
            </li>
            <li>
                <a href="#">Speaker</a>
                <div class="dropdown-content">
                    <a href="add_speaker.php">Add New Speaker</a>
                    <a href="manage_speaker.php">Manage Speaker</a>
                </div>
            </li>
            <li>
                <a href="#">Subscription</a>
                <div class="dropdown-content">
                    <a href="subscription/give_subscription.php">Give Subscription</a>
                    <a href="manage_subscription.php">Manage Subscription</a>
                </div>
            </li>
            <li><a href="issue_book.php">Issue Book</a></li>
        </ul>
    </nav>


    <div class="container">
        <div class="card">
            <img src="crd.jpg" alt="Registered User">
            <div class="card-header">Registered User</div>
            <div class="card-body">
                <p class="card-text">No. total Users: <?php echo get_user_count(); ?></p>
                <a class="btn" href="Regusers.php">View Registered Users</a>
            </div>
        </div>
        <div class="card">
            <img src="cd.png" alt="Total Book">
            <div class="card-header">Total Book</div>
            <div class="card-body">
                <p class="card-text">No of books available: <?php echo get_book_count(); ?></p>
                <a class="btn" href="Regbooks.php">View All Books</a>
            </div>
        </div>
        <div class="card">
            <img src="md.jpg" alt="Book Categories">
            <div class="card-header">Book Categories</div>
            <div class="card-body">
                <p class="card-text">No of Book's Categories: <?php echo get_category_count(); ?></p>
                <a class="btn" href="Regcat.php">View Categories</a>
            </div>
        </div>
        <div class="card">
            <img src="xd.jpg" alt="Authors">
            <div class="card-header">Authors</div>
            <div class="card-body">
                <p class="card-text">No of Authors: <?php echo get_author_count(); ?></p>
                <a class="btn" href="Regauthor.php">View Authors</a>
            </div>
        </div>
        <div class="card">
            <img src="ll.jpg" alt="Library Branches">
            <div class="card-header">Library Branches</div>
            <div class="card-body">
                <p class="card-text">No. total Branches: <?php echo get_branches_count(); ?></p>
                <a class="btn" href="viewbranch.php">View Library Branch Location</a>
            </div>
        </div>
        <div class="card">
            <img src="mm.jpg" alt="eResources">
            <div class="card-header">eResources :</div>
            <div class="card-body">
                <p class="card-text">No of eResources : <?php echo get_er_count(); ?></p>
                <a class="btn" href="eResources/vieweresources.php">View eresources </a>
            </div>
        </div>
        <div class="card">
            <img src="dd.jpg" alt="Book Issued">
            <div class="card-header">Book Issued</div>
            <div class="card-body">
                <p class="card-text">No of books issued: <?php echo get_issue_book_count(); ?></p>
                <a class="btn" href="view_issued_book.php">View Issued Books</a>
            </div>
        </div>
        <div class="card">
            <img src="gggm.jpg" alt="Seminar">
            <div class="card-header">Seminar</div>
            <div class="card-body">
                <p class="card-text">Seminar next: <?php echo get_seminar_count(); ?></p>
                <a class="btn" href="view_seiminr_date.php">View Seminar Date</a>
            </div>
        </div>
        <div class="card">
            <img src="bgimge/cd.png" alt="New Card 1">
            <div class="card-header">Subscription</div>
            <div class="card-body">
                <p class="card-text">Given subscribtion  <?php echo get_sb_count(); ?></p>
                <a class="btn" href="subscription/see_subscribtion.php">See Subscribed Member</a>
            </div>
        </div>
        <div class="card">
            <img src="99.jpg" alt="New Card 2">
            <div class="card-header">Proceedings</div>
            <div class="card-body">
               <div> Event</div>
                <a class="btn" href="Proceedings/viewprociding.php">View More</a>
            </div>
        </div>
        <div class="card">
            <img src="bgimge/image.png" alt="Library Events">
            <div class="card-header">Library Events</div>
            <div class="card-body">
                <p class="card-text">Library Events Total </p>
                <a class="btn" href="event/viewevent.php">View More</a>
            </div>
        </div>
       
        </div>
    </div>

</body>
</html>
