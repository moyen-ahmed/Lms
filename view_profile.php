<?php
    session_start();
    // Fetch data from the database
    $connection = mysqli_connect("localhost", "root", "", "lms");
    $std_image = "";
    $name = "";
    $email = "";
    $mobile = "";
    $address = "";
    $availability = "";
    $query = "SELECT * FROM users LEFT JOIN library_subscription ON users.id=library_subscription.id LEFT JOIN issued_books ON users.id=issued_books.student_id WHERE email = '$_SESSION[email]'";
    $query_run = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {
        $std_image = $row['std_image'];
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $address = $row['address'];
        $sname = $row['sname'];
        $availability = $row['availability'];
        $fine=$row['fine'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            background-image: url('janaeither-t-profile-gif.gif');
            background-attachment: fixed;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: rgba(255, 255, 255, 0.5);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(5px);
        }

        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-picture {
            width: 250px;
            height: 250px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .profile-info {
            text-align: left;
        }

        .profile-info p {
            margin: 12px 0;
            font-size: 18px;
            line-height: 1.8;
        }

        .profile-info p strong {
            font-weight: bold;
            color: #000;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 24px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 2px solid #ccc;
            box-sizing: border-box;
            resize: none;
            font-size: 24px;
        }

        .navbar {
            background: transparent;
            backdrop-filter: blur(10px);
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(5px);
            overflow: hidden;
            padding: 15px 0;
        }

        .navbar a {
            float: left;
            display: block;
            color: #333;
            text-align: center;
            padding: 16px 24px;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .navbar img {
            height: 70px;
            vertical-align: middle;
            margin-right: 10px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .profile-info {
                text-align: center;
            }

            .profile-picture {
                margin: 0 auto 20px auto;
            }
        }

        :root {
            --text-color: #fff;
            --bg-color: #000000;
            --main-color: #04f929;
            --h1-font: 6rem;
            --h2-font: 3rem;
            --p-font: 1rem;
            --card-color: #137db1;
        }

        header {
            position: relative;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1000;
            padding: 30px 2%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: all 0.5s ease;
        }

        .logo {
            font-size: 33px;
            font-weight: 700;
            color: var(--text-color);
        }

        span {
            color: var(--main-color);
        }

        .navbar {
            display: flex;
        }

        .navbar a {
            color: var(--text-color);
            font-size: var(--p-font);
            font-weight: bold;
            margin: 15px 22px;
            transition: all 0.5s ease;
        }

        .navbar a:hover {
            color: var(--main-color);
        }

        .search-form {
            display: flex;
            align-items: center;
        }

        .search-bar {
            margin-right: 20px;
        }

        .search-bar input[type=text] {
            padding: 8px;
            border: none;
            font-size: 17px;
            border-radius: 5px;
        }

        .submit-button button {
            background-color: var(--main-color);
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 17px;
        }

        .submit-button button:hover {
            background-color: var(--main-color);
        }
    </style>
</head>
<body>
    <header>
        <a href="index.php" class="logo">LM<span>S</span></a>
        <ul class="navbar">
            <li><a href="user_dashboard.php">Dashboard</a></li>
            <li><a href="change_password.php">Change Password</a></li>
            <li><a href="edit_profile.php">Edit Profile</a></li>
            <li><a href="home.php">Main home page</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
        <form class="search-form" action="/search" method="GET">
            <div class="search-bar">
                <input type="text" name="query" placeholder="Search...">
            </div>
            <div class="submit-button">
                <button type="submit">Search</button>
            </div>
        </form>
    </header>
    <div class="container">
        <div class="profile-header">
            <img class="profile-picture" src="<?php echo $std_image; ?>" alt="Profile Picture">
        </div>
        <div class="profile-info">
            <div class="form-group">
                <p><strong>Name:</strong> <?php echo $name; ?></p>
            </div>
            <div class="form-group">
                <p><strong>Email:</strong> <?php echo $email; ?></p>
            </div>
            <div class="form-group">
                <p><strong>Phone:</strong> <?php echo $mobile; ?></p>
            </div>
            <div class="form-group">
                <p><strong>Address:</strong> <?php echo $address; ?></p>
            </div>
            <div class="form-group">
                <p><strong>Subscription Name:</strong> <?php echo $sname; ?></p>
            </div>
            <div class="form-group">
                <p><strong>Availability:</strong> <?php echo $availability; ?></p>
            </div>
            <div class="form-group">
                <p><strong>Fine:</strong> <?php echo $fine; ?></p>
            </div>
        </div>
    </div>
</body>
</html>
