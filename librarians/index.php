<?php
session_start();

if (isset($_POST['login'])) {
    $connection = mysqli_connect("localhost", "root", "");
    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    
    $db = mysqli_select_db($connection, "lms");
    if (!$db) {
        die("Database selection failed: " . mysqli_error($connection));
    }

    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $query = "SELECT * FROM librarians WHERE email = '$email'";
    $query_run = mysqli_query($connection, $query);
    $found = false;

    if ($query_run) {
        while ($row = mysqli_fetch_assoc($query_run)) {
            if ($row['email'] == $email) {
                if ($row['password'] == $password) {
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['id'] = $row['id'];
                    header("Location: view_profile.php");
                    exit();
                } else {
                    $error_message = "Wrong Password !!";
                    $found = true;
                    break;
                }
            }
        }
    }

    if (!$found) {
        $error_message = "Email not found!";
    }

    mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>L_M_S</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style>
       label{
        color: #fff;
       }
        body {
            font-family: Arial, sans-serif;
            background-image: url('../imgforranodm/lash.jpg');
            background-size: cover;
            background-attachment: scroll;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: transparent;
        }
        .navbar-brand {
            color: #fff !important;
            font-size: 40px;
            font-weight: 900;
        }
        .navbar-nav .nav-item .nav-link {
            color: #fff !important;
            font-size: 16px;
            text-transform: uppercase;
        }
        .navbar-nav .nav-item .nav-link:hover {
            color: #ccc !important;
        }

        #main_content {
            padding: 20px;
            height: 100vh;
            background-color: transparent;
            margin-left: 210px;
            margin-top: 100px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            position: relative;
            z-index: 2;
            overflow: auto;
        }

        form {
            background: rgba(255, 255, 255, 0.3); /* Semi-transparent white background */
    backdrop-filter: blur(10px); 
            width: 50%;
            min-width: 300px;
            height: 60%;
            min-height: 400px;
            padding: 40px;
            border-radius: 8px;
           
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            
        }

        .button {
            position: relative;
            width: 120px;
            height: 40px;
            background-color: #000;
            display: flex;
            align-items: center;
            color: white;
            flex-direction: column;
            justify-content: center;
            border: none;
            padding: 12px;
            gap: 12px;
            border-radius: 8px;
            cursor: pointer;
        }

        .button::before {
            content: '';
            position: absolute;
            inset: 0;
            left: -4px;
            top: -1px;
            margin: auto;
            width: 128px;
            height: 48px;
            border-radius: 10px;
            background: linear-gradient(-45deg, #e81cff 0%, #40c9ff 100%);
            z-index: -10;
            pointer-events: none;
            transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .button::after {
            content: "";
            z-index: -1;
            position: absolute;
            inset: 0;
            background: linear-gradient(-45deg, #fc00ff 0%, #00dbde 100%);
            transform: translate3d(0, 0, 0) scale(0.95);
            filter: blur(20px);
        }

        .button:hover::after {
            filter: blur(30px);
        }

        .button:hover::before {
            transform: rotate(-180deg);
        }

        .button:active::before {
            scale: 0.7;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: 10px;
            margin-top: 20px;
            border-radius: 4px;
        }
/* //lafalafii */
.animated-heading {
    font-family: 'Arial', sans-serif;
    font-size: 2rem;
    color: white;
    position: relative;
    animation: fadeIn 2s ease-in-out, bounce 1s ease-in-out 2s infinite;
}

/* Fade-in effect */
@keyframes fadeIn {
    0% {
        opacity: 0;
        transform: translateY(-20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Bounce effect */
@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-10px);
    }
    60% {
        transform: translateY(-5px);
    }
}
a{
    color: #fff;
}
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="../ask_M_or_U.php">LMS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
           
        </div>
    </nav>

    <div class="col-md-8" id="main_content">
        <center><h3 class="animated-heading">Librarians Login Form</h3></center>
        <form action="" method="post">
            <div class="form-group">
                <label for="email">Email ID:</label>
                <input type="text" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button class="button" name="login">Login!</button>
            <a href="signup.php" class="a"> Not registered yet?</a>
        </form>
        <?php 
        if (isset($error_message)) {
            echo '<br><br><center><span class="alert-danger">' . $error_message . '</span></center>';
        }
        ?>
    </div>
</body>
</html>
