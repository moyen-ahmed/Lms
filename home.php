<?php
session_start();

function get_book_count(){
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$book_count = 0;
	$query = "select count(*) as book_count from books";
	$query_run = mysqli_query($connection,$query);
	while ($row = mysqli_fetch_assoc($query_run)){
		$book_count = $row['book_count'];
	}
	return($book_count);
}
function get_user_count(){
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"lms");
    $user_count = 0;
    $query = "select count(*) as user_count from users";
    $query_run = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($query_run)){
        $user_count = $row['user_count'];
    }
    return($user_count);
}
function get_branches_count(){
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"lms");
    $author_count = 0;
    $query = "select count(*) as branches_count from authors";
    $query_run = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($query_run)){
        $branches_count = $row['branches_count'];
    }
    return($branches_count);
}
function get_er_count(){
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"lms");
    $er_count = 0;
    $query = "select count(*) as er_count from eresources";
    $query_run = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($query_run)){
        $er_count = $row['er_count'];
    }
    return($er_count);
}

?>
<!DOCTYPE html>
<!--Code by Divinector (www.divinectorweb.com)-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.6.2/animate.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        /* Existing styles */
        body {
            font-family: 'Poppins', sans-serif;
        }
        header .carousel-inner .item {
            height: 100vh;
        }
        .navbar-inverse {
            background-color: transparent;
            border-color: transparent;
        }
        .navbar-inverse .navbar-brand {
            color: #fff;
            font-size: 40px;
            padding: 40px 15px;
            font-weight: 900;
        }
        .nav.navbar-nav.navbar-right {
            margin: 25px 0;
        }
        .navbar-inverse .navbar-nav>li>a {
            color: #fff;
            text-transform: uppercase;
            font-size: large;
        }
        .banner {
            -webkit-background-size: cover;
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            height: 100vh;
        }
        .carousel-caption {
            padding-bottom: 250px;
            font-family: poppins;
        }
        .carousel-caption h2 {
            font-size: 70px;
            text-transform: uppercase;
            font-weight: bold;
        }
        .carousel-caption h2 span {
            color: #18ED00;
        }
        .carousel-caption a {
            background: #EDBB00;
            padding: 15px 35px;
            display: inline-block;
            margin-top: 15px;
            color: #fff;
            text-transform: uppercase;
            border-radius: 25px;
        }
        .carousel-control.right {
            background-image: none;
        }
        .carousel-control.left {
            background-image: none;
        }
        .carousel-indicators .active {
            background-color: #EDBB00;
            border-color: #EDBB00;
        }
        .s{
            color: greenyellow;
        }
        /* Responsive CSS */
        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .carousel-caption {
                padding-bottom: 350px;
            }
            .carousel-caption h2 {
                font-size: 50px;
            }
        }
        @media only screen and (max-width: 767px) {
            .navbar-inverse .navbar-brand {
                font-size: 30px;
                padding: 20px 15px;
            }
            .navbar-collapse {
                background: rgba(0, 0, 0, 0.5);
            }
            .carousel-caption {
                padding-bottom: 120px;
            }
            .carousel-caption h2 {
                font-size: 25px;
            }
            .carousel-caption h3 {
                font-size: 18px;
            }
            .carousel-caption a {
                padding: 10px 25px;
            }
        }
        /* Additional styles for calendar */
        #calendar {
            margin: 0px auto;
            background-image: url(imgforranodm/ps.gif);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        /* Counter styles */
        .counter-section {
            display: flex;
            justify-content: space-around;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .counter {
            display: inline-block;
            width: 200px;
            padding: 20px;
            margin: 20px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
            transition: background-color 0.3s;
        }
        .counter:hover {
            background-color: #e0e0e0;
        }
        /* Footer styles */
        footer .footer-bottom {
            text-align: center;
            padding: 20px;
            background-color: #333;
            color: #fff;
            font-size: 14px;
        }
        footer .footer-bottom a {
            color: #EDBB00;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">LM<span class="s">S</span></a>
                
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="ask_M_or_U.php">Login</a></li>
                        <li><a href="team.php">About</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="banner" style="background-image: url(https://i.postimg.cc/sxYc1H5C/575984.jpg);"></div>
                    <div class="carousel-caption">
                        <h2 class="animated bounceInRight" style="animation-delay: 1s">Welcome To <span>Library</span></h2>
                        <h3 class="animated bounceInLeft" style="animation-delay: 2s">স্বাগতম আমাদের বইঘরে</h3>
                        <p class="animated bounceInRight" style="animation-delay: 3s"><a href="https://openlibrary.org" target="_blank" >Online book</a></p>
                    </div>
                </div>
                <div class="item">
                    <div class="banner" style="background-image: url(https://i.postimg.cc/KvYk1sP7/istockphoto-1984345363-2048x2048-transformed.jpg);"></div>
                    <div class="carousel-caption">
                        <h2 class="animated slideInDown" style="animation-delay: 1s">My Library <span>Our Library</span></h2>
                        <h3 class="animated fadeInUp" style="animation-delay: 2s">Everyone's Library</h3>
                        <p class="animated zoomIn" style="animation-delay: 3s"><a href="https://openlibrary.org">Online book</a></p>
                    </div>
                </div>
                <div class="item">
                    <div class="banner" style="background-image: url(https://i.postimg.cc/3xHsLztm/thumb-1920-1339726.png);"></div>
                    <div class="carousel-caption">
                        <h2 class="animated zoomIn" style="animation-delay: 1s">Library ! <span>Book !</span></h2>
                        <h3 class="animated fadeInLeft" style="animation-delay: 2s">Books are my escape from reality</h3>
                        <p class="animated zoomIn" style="animation-delay: 3s"><a href="libraryphoto.php">Our Library Gallary</a></p>
                    </div>
                </div>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </header>
    <div id="calendar" class="animated fadeInUp"></div>

    <footer>
        <div class="counter-section">
            <div class="counter" data-aos="fade-up" data-aos-delay="1">
                <h2>Books</h2>
                <p id="bookCount"><?php echo get_book_count(); ?></p>
            </div>
            <div class="counter" data-aos="fade-up" data-aos-delay="1">
                <h2>Users</h2>
                <p id="userCount"> <?php echo get_user_count();?> </p>
            </div>
            <div class="counter" data-aos="fade-up" data-aos-delay="300">
                <h2>Library Branch</h2>
                <p id="thesisCount"><?php echo get_branches_count();?></p>
            </div>
            <div class="counter" data-aos="fade-up" data-aos-delay="400">
                <h2>eRosources</h2>
                <p id="branchCount"><?php echo get_er_count();?></p>
            </div>
        </div>
        <div class="footer-bottom">
            © em@sSoft™. All Rights Reserved | <a href="#">Privacy Policy</a>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultDate: moment().format('YYYY-MM-DD'),
                editable: true,
                eventLimit: true,
                events: [
                    {
                        title: 'Seminr-1',
                        start: '2024-05-19'
                    },
                    {
                        title: 'Proceeding 1',
                        start: '2024-05-20'
                    },
                    {
                        title: 'Seminr-2',
                        start: '2024-05-31'
                    },
                    {
                        title: 'Oreantion',
                        start: '2024-06-02'
                    }
                ]
            });

            AOS.init();
        });
    </script>
</body>
</html>
