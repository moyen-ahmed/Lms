<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>L_M_S</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
      <style type="text/css">
li::marker {
color: red;
}
	#main_content{
		padding: 50px;
		
		height: 800px;
        width: 200px;
		background-color:navajowhite;
	}
	#side_bar{
		background-color:antiquewhite;
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

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
			
			<a class="navbar-brand text-success" href="index.php"><img class="logo"src="logo.png">Library Management System  </a>
            </div>
			<font style="color: green"><span><strong>“““““““লাইব্রেরি হল শিক্ষার মন্দির””””””””””””””</strong></span></font>
			<!-- <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Library Management System (LMS)
            Light color background
        </a>
    </nav> -->




            <ul class="nav navbar-nav navbar-right">
		      <li class="nav-item">
		        <a class="nav-link text-success" href="admin/index.php"></a>
		      </li>
              <ul class="nav navbar-nav navbar-right">
		      <li class="nav-item">
		        <a class="nav-link text-success" href="admin/index.php"></a>
		      </li>
              <ul class="nav navbar-nav navbar-right">
		      <li class="nav-item">
		        <a class="nav-link text-success" href="admin/index.php"></a>
		      </li>
        </div>
    </nav>
	<br>
	<span><marquee direction="left" bgcolor="pink" text-success>Welcome To Library </marquee></span><br>

	<span><marquee direction="right" bgcolor="yellow" text-success>A library is the delivery room for the birth of ideas, a place where history comes to life</marquee></span><br><br>
    <div class="row">
		<div class="col-md-3" id="side_bar">
			<h5>Library Timing</h5>
			<ul>
				<li>
Sunday to Thursday : 08.00 AM - 09.30 PM</li>
				<li>Friday: 10.00 AM - 06.00 PM</li>
				<li>Saturday : 10.00 AM - 09.00 PM</li>
				<li>Now NSU Library main sections (3rd, 4th floor & study hall) </li>
				<li>Now the Periodical Section and the Cyber & Audio Visual Section are closed.</li>
			</ul>
			<h5>Here You Get !</h5>
			<ul>
		        <li>51000+  Printed Books</li>
				<li>2400+ Theses</li>
				<li>87652+ E-Books</li>
				<li>News Papers</li>
				<li>Discussion Room</li>
				<li>Research guides & experts</li>
				<li>Peacefull Environment</li>
			</ul>
		</div>
		<div class="col-md-8" id="main_content">
			<center><h3><u>Libraryan Registration Form</u></h3></center>
			<form action="libr_register.php" method="post">
				<div class="form-group">
					<label for="name">Full Name:</label>
					<input type="text" name="name" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="email">Email ID:</label>
					<input type="text" name="email" class="form-control" required>
				</div>
                <div class="form-group">
					<label for="email">Job Role:</label>
					<input type="text" name="job_role" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" name="password" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="mobile">Contact:</label>
					<input type="text" name="mobile" class="form-control" required>
				</div>
				
				<button type="submit" class="btn btn-primary">Register</button>	 |
				<a href="librarians/index.php"> Already ave an account?</a>	
			</form>
		</div>
</body>
</html>