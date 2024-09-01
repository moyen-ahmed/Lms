<?php
session_start();
#fetch data from database
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"lms");

# Function to handle book issuance and update availability
function issueBook($book_no) {
    global $connection;

    // Decrement the book availability
    $update_query = "UPDATE books SET aviavlity = aviavlity - 1 WHERE book_isbn = '$book_no' AND aviavlity > 0";
    $update_result = mysqli_query($connection, $update_query);

    if ($update_result) {
        echo "Book issued successfully and availability updated.";
    } else {
        echo "Error updating book availability: " . mysqli_error($connection);
    }
}

$book_name = "";
$book_image = "";
$author = "";
$book_no = "";
$student_name = "";
$std_image = "";
$fine="";
$query = "SELECT *
          FROM issued_books 
          LEFT JOIN users ON issued_books.student_id = users.id  
          LEFT JOIN books ON issued_books.book_no = books.book_isbn 
          WHERE issued_books.status = 1";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_no'])) {
    issueBook($_POST['book_no']);
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>All Reg Users</title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand text-success" href="librarians_dashboard.php"><img class="logo" src="logo.png">Library Management System </a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown navbar-dark bg-company-red ">
                    <a class="nav-link dropdown-toggle text-success" data-toggle="dropdown">My Profile </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item text-success" href="#">View Profile</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-success" href="../logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav><br>

    <span>
        <marquee direction="left" bgcolor="pink" text-success>Welcome To Library </marquee>
    </span><br>

    <span>
        <marquee direction="right" bgcolor="yellow" text-success>A library is the delivery room for the birth of ideas, a place where history comes to life</marquee>
    </span><br><br>
    <center>
        <h4>Issued Books</h4><br>
    </center>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form method="post" action="">
                <table class="table table-bordered table-danger table-hover">
                    <tr>
                        <th>Name</th>
                        <th>Books Image</th>
                        <th>Author Name</th>
                        <th>Books ISBN</th>
                        <th>Member Name</th>
                        <th>Member Image</th>
                        <th>Fine</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    $query_run = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($query_run)) {
                        $book_name = $row['book_name'];
                        $book_image = $row['book_image'];
                        $book_author = $row['book_author'];
                        $book_no = $row['book_no'];
                        $student_name = $row['name'];
                        $std_image = $row['std_image'];
                        $fine=$row['fine']
                    ?>
                        <tr>
                            <td><?php echo $book_name; ?></td>
                            <td><img src="<?php echo $book_image; ?>" alt="Book Image" width="100"></td>
                            <td><?php echo $book_author; ?></td>
                            <td><?php echo $book_no; ?></td>
                            <td><?php echo $student_name; ?></td>
                            <td><img src="<?php echo '../' . $std_image; ?>" alt="Student Image" width="100"></td>
                            <td><?php echo $fine; ?></td>
                            <td>
                                <button type="submit" name="book_no" value="<?php echo $book_no; ?>" class="btn btn-primary">Cheack Out!</button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>

</html>
