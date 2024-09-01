<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>L_M_S</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style>
        /* Reset some default styles */
        body, h5, ul, li, a, button, input, form, marquee {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            vertical-align: baseline;
        }
h3{
    margin-top: 70px;
}
        /* Body styling */
        body {
            font-family: Arial, sans-serif;
            background-image: url('../imgforranodm/lash.jpg'); /* Add your background image here */
            background-size: cover;
            background-attachment: fixed;
            color: #FFFFFF;
        }

        .navbar {
            background-color: transparent !important;
        }
       
        .navbar-brand {
            color: #fff !important;
            font-size: 1.5rem;
            font-weight: 900;
        }
        .navbar-nav .nav-item .nav-link {
            color: #fff !important;
            font-size: 1rem;
            text-transform: uppercase;
        }
        .navbar-nav .nav-item .nav-link:hover {
            color: #ccc !important;
        }
        /* Main content and sidebar styling */
        #main_content {
            padding: 20px;
            min-height: 100vh; /* Full height */
            display: flex;
            flex-direction: column;
            align-items: center; /* Center horizontally */
            justify-content: flex-start; /* Align content to the top */
            position: relative;
            z-index: 1;
            overflow: auto; /* Allow scrolling if content overflows */
            animation: fadeIn 1s ease-in-out; /* Fade-in animation */
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Form group styling */
        .form-group {
            width: 100%;
            max-width: 600px;
            margin-bottom: 15px;
        }

        /* Form styling */
        form {
            width: 50%; /* Adjust width as needed */
            min-width: 300px; /* Ensure form is not too small on narrow screens */
            height: auto; /* Auto height */
            padding: 40px; /* Increased padding */
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.1); /* Semi-transparent background */
            backdrop-filter: blur(5px);
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.8);
            display: flex;
            margin-top: 100px;
            flex-direction: column;
            justify-content: space-around; 
            animation: slideIn 1s ease-in-out; /* Slide-in animation */
        }

        @keyframes slideIn {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        /* Label styling */
        label {
            color: #fff;
            font-weight: bold;
        }

        /* Input styling */
        input {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            transition: border-color 0.3s;
        }

        input:focus {
            border-color: #007bff;
            outline: none;
        }

        /* Button styling */
        .button {
            position: relative;
            width: 120px;
            height: 40px;
            background-color: #000;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
            overflow: hidden;
        }

        .button::before {
            content: '';
            position: absolute;
            inset: 0;
            margin: auto;
            width: 128px;
            height: 48px;
            border-radius: 10px;
            background: linear-gradient(-45deg, #e81cff 0%, #40c9ff 100%);
            z-index: -1;
            pointer-events: none;
            transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .button::after {
            content: "";
            z-index: -1;
            position: absolute;
            inset: 0;
            background: linear-gradient(-45deg, #fc00ff 0%, #00dbde 100%);
            transform: scale(0.95);
            filter: blur(20px);
        }

        .button:hover::after {
            filter: blur(30px);
        }

        .button:hover::before {
            transform: rotate(-180deg);
        }

        .button:active::before {
            transform: scale(0.7);
        }

        /* Error message styling */
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: 10px;
            margin-top: 20px;
            border-radius: 4px;
        }
        .b{
            color: white;
        }
        
        button {
            width: 120px;
            height: 50px;
  position: relative;
  padding: 12px 35px;
  background: #fec195;
  font-size: 17px;
  font-weight: 500;
  color: #181818;
  border: 3px solid #fec195;
  border-radius: 8px;
  box-shadow: 0 0 0 #fec1958c;
  transition: all 0.3s ease-in-out;
  cursor: pointer;
}

.star-1 {
  position: absolute;
  top: 20%;
  left: 20%;
  width: 25px;
  height: auto;
  filter: drop-shadow(0 0 0 #fffdef);
  z-index: -5;
  transition: all 1s cubic-bezier(0.05, 0.83, 0.43, 0.96);
}

.star-2 {
  position: absolute;
  top: 45%;
  left: 45%;
  width: 15px;
  height: auto;
  filter: drop-shadow(0 0 0 #fffdef);
  z-index: -5;
  transition: all 1s cubic-bezier(0, 0.4, 0, 1.01);
}

.star-3 {
  position: absolute;
  top: 40%;
  left: 40%;
  width: 5px;
  height: auto;
  filter: drop-shadow(0 0 0 #fffdef);
  z-index: -5;
  transition: all 1s cubic-bezier(0, 0.4, 0, 1.01);
}

.star-4 {
  position: absolute;
  top: 20%;
  left: 40%;
  width: 8px;
  height: auto;
  filter: drop-shadow(0 0 0 #fffdef);
  z-index: -5;
  transition: all 0.8s cubic-bezier(0, 0.4, 0, 1.01);
}

.star-5 {
  position: absolute;
  top: 25%;
  left: 45%;
  width: 15px;
  height: auto;
  filter: drop-shadow(0 0 0 #fffdef);
  z-index: -5;
  transition: all 0.6s cubic-bezier(0, 0.4, 0, 1.01);
}

.star-6 {
  position: absolute;
  top: 5%;
  left: 50%;
  width: 5px;
  height: auto;
  filter: drop-shadow(0 0 0 #fffdef);
  z-index: -5;
  transition: all 0.8s ease;
}

button:hover {
  background: transparent;
  color: #fec195;
  box-shadow: 0 0 25px #fec1958c;
}

button:hover .star-1 {
  position: absolute;
  top: -80%;
  left: -30%;
  width: 25px;
  height: auto;
  filter: drop-shadow(0 0 10px #fffdef);
  z-index: 2;
}

button:hover .star-2 {
  position: absolute;
  top: -25%;
  left: 10%;
  width: 15px;
  height: auto;
  filter: drop-shadow(0 0 10px #fffdef);
  z-index: 2;
}

button:hover .star-3 {
  position: absolute;
  top: 55%;
  left: 25%;
  width: 5px;
  height: auto;
  filter: drop-shadow(0 0 10px #fffdef);
  z-index: 2;
}

button:hover .star-4 {
  position: absolute;
  top: 30%;
  left: 80%;
  width: 8px;
  height: auto;
  filter: drop-shadow(0 0 10px #fffdef);
  z-index: 2;
}

button:hover .star-5 {
  position: absolute;
  top: 25%;
  left: 115%;
  width: 15px;
  height: auto;
  filter: drop-shadow(0 0 10px #fffdef);
  z-index: 2;
}

button:hover .star-6 {
  position: absolute;
  top: 5%;
  left: 60%;
  width: 5px;
  height: auto;
  filter: drop-shadow(0 0 10px #fffdef);
  z-index: 2;
}

.fil0 {
  fill: #fffdef;
}
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="../ask_M_or_U.php">LMS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../team.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container" id="main_content">
    <center><h3>Librarians Registration Form</h3></center>
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
            <label for="branch_id">Branch Id:</label>
            <input type="text" name="branch_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="job_role">Job Role:</label>
            <input type="text" name="job_role" class="form-control" required>
        </div>
        <div class="form-group" style="border: 1px solid #ccc; padding: 10px;">
            <label for="image">Image:</label>
            <input type="file" name="uploadfile" class="form-control" style="width: 100%;">
        </div>
        <button>
    Submit!
<div class="star-1">
<svg
xmlns="http://www.w3.org/2000/svg"
xml:space="preserve"
version="1.1"
style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
viewBox="0 0 784.11 815.53"
xmlns:xlink="http://www.w3.org/1999/xlink"
>
<defs></defs>
<g id="Layer_x0020_1">
  <metadata id="CorelCorpID_0Corel-Layer"></metadata>
  <path
    class="fil0"
    d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z"
  ></path>
</g>
</svg>
</div>
<div class="star-2">
<svg
xmlns="http://www.w3.org/2000/svg"
xml:space="preserve"
version="1.1"
style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
viewBox="0 0 784.11 815.53"
xmlns:xlink="http://www.w3.org/1999/xlink"
>
<defs></defs>
<g id="Layer_x0020_1">
  <metadata id="CorelCorpID_0Corel-Layer"></metadata>
  <path
    class="fil0"
    d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z"
  ></path>
</g>
</svg>
</div>
<div class="star-3">
<svg
xmlns="http://www.w3.org/2000/svg"
xml:space="preserve"
version="1.1"
style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
viewBox="0 0 784.11 815.53"
xmlns:xlink="http://www.w3.org/1999/xlink"
>
<defs></defs>
<g id="Layer_x0020_1">
  <metadata id="CorelCorpID_0Corel-Layer"></metadata>
  <path
    class="fil0"
    d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z"
  ></path>
</g>
</svg>
</div>
<div class="star-4">
<svg
xmlns="http://www.w3.org/2000/svg"
xml:space="preserve"
version="1.1"
style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
viewBox="0 0 784.11 815.53"
xmlns:xlink="http://www.w3.org/1999/xlink"
>
<defs></defs>
<g id="Layer_x0020_1">
  <metadata id="CorelCorpID_0Corel-Layer"></metadata>
  <path
    class="fil0"
    d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z"
  ></path>
</g>
</svg>
</div>
<div class="star-5">
<svg
xmlns="http://www.w3.org/2000/svg"
xml:space="preserve"
version="1.1"
style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
viewBox="0 0 784.11 815.53"
xmlns:xlink="http://www.w3.org/1999/xlink"
>
<defs></defs>
<g id="Layer_x0020_1">
  <metadata id="CorelCorpID_0Corel-Layer"></metadata>
  <path
    class="fil0"
    d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z"
  ></path>
</g>
</svg>
</div>
<div class="star-6">
<svg
xmlns="http://www.w3.org/2000/svg"
xml:space="preserve"
version="1.1"
style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
viewBox="0 0 784.11 815.53"
xmlns:xlink="http://www.w3.org/1999/xlink"
>
<defs></defs>
<g id="Layer_x0020_1">
  <metadata id="CorelCorpID_0Corel-Layer"></metadata>
  <path
    class="fil0"
    d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z"
  ></path>
</g>
</svg>
</div>
</button>
        <div><a href="index.php" class="b"> Already have an account?</a></div>
    </form>
    <?php 
    if (isset($error_message)) {
        echo '<br><br><center><span class="alert-danger">' . $error_message . '</span></center>';
    }
    ?>
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
