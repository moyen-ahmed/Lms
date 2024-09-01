<?php
session_start();
date_default_timezone_set('UTC'); // Set the default timezone

$connection = mysqli_connect("localhost", "root", "", "lms");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['book_no'])) {
    $book_no = $_POST['book_no'];
    
    // Fetch the due date for the book
    $due_date_query = "
        SELECT due_date
        FROM issued_books
        WHERE book_no = '$book_no' AND student_id = '$_SESSION[id]' AND status = 1
    ";
    $due_date_result = mysqli_query($connection, $due_date_query);
    $due_date_row = mysqli_fetch_assoc($due_date_result);
    $due_date = $due_date_row['due_date'];

    // Calculate the fine
    $current_date = date('Y-m-d');
    $fine_per_day = 10;
    $fine = 0;

    if ($current_date > $due_date) {
        $days_overdue = (strtotime($current_date) - strtotime($due_date)) / (60 * 60 * 24);
        $fine = ceil($days_overdue) * $fine_per_day;
    }

    // Mark the specific book as returned in issued_books
    $update_issued_books_query = "
        UPDATE issued_books
        SET status = 0, fine = '$fine'
        WHERE book_no = '$book_no' AND student_id = '$_SESSION[id]' AND status = 1
    ";

    if (mysqli_query($connection, $update_issued_books_query)) {
        // Increment the availability in the books table
        $update_books_query = "
            UPDATE books
            SET aviavlity = aviavlity + 1
            WHERE book_isbn = '$book_no'
        ";

        if (mysqli_query($connection, $update_books_query)) {
            $_SESSION['message'] = "Book returned successfully. Fine: $fine taka.";
        } else {
            $_SESSION['message'] = "Failed to update book availability.";
        }
    } else {
        $_SESSION['message'] = "Failed to return the book.";
    }
}

# Fetch data from database
$query = "
    SELECT 
        issued_books.book_name,
        issued_books.book_author,
        issued_books.book_no,
        issued_books.due_date,
        books.book_image
    FROM 
        issued_books
    JOIN 
        books 
    ON 
        issued_books.book_name = books.book_name
    WHERE 
        issued_books.student_id = '$_SESSION[id]' 
        AND issued_books.status = 1
";
$query_run = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Issued Books</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-4.4.1/js/jquery_latest.js"></script>
    <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand text-success" href="librarians_dashboard.php"><img class="logo" src="logo.png">Library Management System</a>
            </div>
            <font style="color: green"><span><strong>Welcome: <?php echo $_SESSION['name']; ?></strong></span></font>
            <font style="color: green"><span><strong>Email: <?php echo $_SESSION['email']; ?></strong></font>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown navbar-dark bg-company-red">
                    <a class="nav-link dropdown-toggle text-success" data-toggle="dropdown">My Profile</a>
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
        <marquee direction="left" bgcolor="pink" text-success>Welcome To Library</marquee>
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
            <?php
            if (isset($_SESSION['message'])) {
                echo "<div class='alert alert-info'>" . $_SESSION['message'] . "</div>";
                unset($_SESSION['message']);
            }
            ?>
            <table class="table table-bordered table-danger table-hover">
                <tr>
                    <th>Book Name</th>
                    <th>Book Image</th>
                    <th>Author Name</th>
                    <th>Books ISBN</th>
                    <th>Due Date</th>
                    <th>Action</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($query_run)) {
                    $book_name = $row['book_name'];
                    $book_image = $row['book_image'];
                    $book_author = $row['book_author'];
                    $book_no = $row['book_no'];
                    $due_date = $row['due_date'];
                ?>
                <tr>
                    <td><?php echo $book_name; ?></td>
                    <td><img src="<?php echo 'librarians/' . $book_image; ?>" alt="Book Image" width="150"></td>
                    <td><?php echo $book_author; ?></td>
                    <td><?php echo $book_no; ?></td>
                    <td><?php echo $due_date; ?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="book_no" value="<?php echo $book_no; ?>">
                            <button type="submit" class="btn btn-success">Return</button>
                        </form>
                    </td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>
</html>
