<?php
require("count.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>user_dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
      <style type="text/css">
li::marker {
color: red;
}
.root{
    color: white;
}
body {
            font-family: Arial, sans-serif;
            background-image:url(a.jpg);
			background-size: cover;
        }
.form-group {
width: 400px;
.card-image{
	height:300px;
	width: 300px;
}

}
	#main_content{
		padding: 170px;
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
			
			<a class="navbar-brand text-success" href="librarians_dashboard.php"><img class="logo"src="logo.png">Library Management System  </a>
            </div>
            <font style="color:green"><span><strong>Welcome: <?php echo $_SESSION['name'];?></strong></span></font>
			<font style="color:green"><span><strong>Email: <?php echo $_SESSION['email'];?></strong></font>

            <ul class="nav navbar-nav navbar-right">
            <ul class="nav navbar-nav navbar-right">
		      <li class="nav-item dropdown">
	        	<a class="nav-link text-success" data-toggle="dropdown">My Profile </a>
	        
		      </li>
		      <li class="nav-item">
		        <a class="nav-link text-success" href="logout.php">Logout</a>
		      </li>
		    </ul>
            </ul>
        </div>
    </nav><br>
    <br>
	<!-- <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #5ACC97">
		<div class="container-fluid">
			
		    <ul class="nav navbar-nav navbar-center">
		      <li class="nav-item">
		        <a class="nav-link" href="librarians_dashboard.php">Dashboard</a>
		      </li>
		      <li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle" data-toggle="dropdown">Books </a>
	        	<div class="dropdown-menu">
	        		<a class="dropdown-item" href="add_book.php">Add New Book</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="manage_book.php">Manage Books</a>
	        	</div>
		      </li>
		      <li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle" data-toggle="dropdown">Category </a>
	        	<div class="dropdown-menu">
	        		<a class="dropdown-item" href="add_cat.php">Add New Category</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="manage_cat.php">Manage Category</a>
	        	</div>
		      </li>
		      <li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle" data-toggle="dropdown">Authors</a>
	        	<div class="dropdown-menu">
	        		<a class="dropdown-item" href="add_author.php">Add New Author</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="manage_author.php">Manage Author</a>
	        	</div>
		      </li>
	          <li class="nav-item">
		        <a class="nav-link" href="issue_book.php">Issue Book</a>
		      </li>
		    </ul>
		</div>
	</nav>
	 -->
	<span><marquee direction="left" bgcolor="pink" text-success>Welcome To Library </marquee></span><br>

	<span><marquee direction="right" bgcolor="yellow" text-success>A library is the delivery room for the birth of ideas, a place where history comes to life</marquee></span><br><br>
   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issue Book</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <center><h4>Issue Book</h4><br></center>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="" method="post">
                <div class="form-group">
                    <label for="book_no">Book ISBN:</label>
                    <input type="text" name="book_no" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Book Name:</label>
                    <select class="form-control" name="book_name" required>
                        <option>-Select Book-</option>
                        <?php  
                            $connection = mysqli_connect("localhost", "root", "");
                            $db = mysqli_select_db($connection, "lms");
                            $query = "SELECT book_name FROM books";
                            $query_run = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($query_run)){
                                echo '<option>' . $row['book_name'] . '</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Author Name:</label>
                    <select class="form-control" name="book_author" required>
                        <option>-Select Author-</option>
                        <?php  
                            $query = "SELECT author_full_name FROM authors";
                            $query_run = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($query_run)){
                                echo '<option>' . $row['author_full_name'] . '</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="student_id">Student ID:</label>
                    <input type="text" name="student_id" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="issue_date">Issue Date:</label>
                    <input type="date" name="issue_date" class="form-control" id="issue_date" required>
                </div>
                
                <div class="form-group">
                    <label for="issue_date">Due Date:</label>
                    <input type="date" name="due_date" class="form-control" id="issue_date" required>
                </div>
                
                <button type="submit" name="issu_book" class="btn btn-danger">Issue Book</button>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>

    <script>
        // document.getElementById('issue_date').setAttribute('min', new Date().toISOString().split('T')[0]);
        // document.getElementById('return_date').setAttribute('min', new Date().toISOString().split('T')[0]);
    </script>

</body>
</html>

<?php
    if(isset($_POST['issu_book']))
    {
        $connection = mysqli_connect("localhost", "root", "");
        $db = mysqli_select_db($connection, "lms");
        $query = "INSERT INTO issued_books VALUES (null, '$_POST[book_no]', '$_POST[book_name]', '$_POST[book_author]', '$_POST[student_id]', 1, '$_POST[issue_date]','$_POST[due_date]',null)";
        $query_run = mysqli_query($connection, $query);
    }
?>

