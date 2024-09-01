<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>L_M_S</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-4.4.1/js/jquery_latest.js"></script>
    <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css">
<style>
    
/* Reset some default styles */
body, h5, ul, li, a, button, input, form, marquee {
    margin: 0;
    padding: 0;
    border: 0;
    font-size: 100%;
    vertical-align: baseline;
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
/* Body styling */
body {
    font-family: Arial, sans-serif;
    background-image: url(imgforranodm/lash.jpg); /* Add your background image here */
    background-size: cover;
    background-attachment:scroll; /* Ensure the background stays fixed during scroll */
}



/* Logo styling */
.logo {
    transform: translateY(2px);
    padding: 0;
}

h3 {
    color: #e8e8e8;
    text-align: center;
    margin-bottom: 20px;
}

/* Main content and form styling */
#main_content {
    padding: 20px;
    height: 100vh; /* Full height */
  /* Semi-transparent background */
    margin: 0 auto; /* Center the main content */
    max-width: 600px; /* Restrict the width */
    border-radius: 8px;
    margin-top: 100px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    position: relative;
    z-index: 1;
   
}

.form-group {
    width: 100%;
    margin-bottom: 15px;
}

/* Form styling */
form {
    width: 100%; /* Full width of the main content */
    padding: 20px;
    background: rgba(255, 255, 255, 0.3); /* Semi-transparent white background */
    backdrop-filter: blur(10px); 
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Semi-transparent white background */
    border-radius: 8px;
}

label {
    color: white; /* Dark color for labels */
}

input, textarea {
    margin-bottom: 10px;
    padding: 10px;
    border-radius: 4px;
    border: 1px solid #ccc;
    width: 100%;
}

textarea {
    resize: vertical; /* Allow vertical resizing */
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


/* Additional styling */
a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
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
            <a class="navbar-brand" href="ask_M_or_U.php">LMS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="team.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="main_content">
        <h3 class="animated-heading">Member Registration Form</h3>
        <form action="register.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email ID:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile:</label>
                <input type="text" name="mobile" class="form-control" id="mobile" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea name="address" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" name="uploadfile" class="form-control">
            </div>
            <button class="button" name="login">Submit!</button>
            <div class="mt-3">
                <a href="index.php" class="a">Already have an account?</a>
            </div>
        </form>
    </div>

    <script>
    function validateForm() {
        const mobile = document.getElementById('mobile').value;
        const password = document.getElementById('password').value;

        if (mobile.length !== 11) {
            alert('Mobile number must be exactly 11 digits long.');
            return false;
        }

        if (password.length <= 4) {
            alert('Password must be greater than 4 characters.');
            return false;
        }

        return true;
    }
    </script>
</body>
</html>
