<?php
require("count.php");
session_start();

// Establish a database connection with error handling
$connection = mysqli_connect("localhost", "root", "", "lms");
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Fetch search query if it exists
$search = "";
if (isset($_POST['submit2']) && !empty($_POST['search'])) {
    $search = mysqli_real_escape_string($connection, $_POST['search']);
    $query = "SELECT * FROM `books` 
              WHERE `book_name` LIKE '%$search%' 
              OR `book_isbn` LIKE '%$search%' 
              OR `aviavlity` LIKE '%$search%'";
} else {
    $query = "SELECT `book_image`, `book_name`, `book_isbn`, `aviavlity`, `book_id` FROM `books`";
}

// Fetch all books
$query_run = mysqli_query($connection, $query);
if (!$query_run) {
    die("Query failed: " . mysqli_error($connection));
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>All Reg Users</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="../bootstrap-4.4.1/js/jquery_latest.js"></script>
    <script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .navbar-brand img {
            height: 30px;
        }
        .logo {
            margin-right: 10px;
        }
        .navbar-brand {
            display: flex;
            align-items: center;
            color: #28a745 !important; /* Green color */
        }
        .nav-link {
            color: #28a745 !important; /* Green color */
        }
        .nav-link:hover {
            color: #218838 !important; /* Dark green color on hover */
        }
        .table th, .table td {
            font-size: 18px;
            vertical-align: middle;
            text-align: center;
        }
        .table img {
            max-width: 150px;
            height: auto;
        }
        .search-bar {
            position: relative;
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        .search-bar input {
            padding: 10px;
            font-size: 18px;
            border: 2px solid #28a745;
            border-radius: 50px;
            transition: all 0.3s ease-in-out;
        }
        .search-bar input:focus {
            width: 70%;
            outline: none;
            border-color: #218838;
        }
        .search-bar button {
            position: absolute;
            right: calc(15% - 50px);
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 50px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }
        .search-bar button:hover {
            background-color: #218838;
        }
        .star-rating {
            font-size: 1.5em;
            color: #ffd700;
        }
        .star-rating .filled {
            color: #ffd700;
        }
        .star-rating .unfilled {
            color: #ddd;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-success" href="librarians_dashboard.php"><img class="logo" src="logo.png" alt="Library Logo">Library Management System</a>
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

<div class="search-bar">
    <form method="post" name="form1" class="d-flex">
        <input class="form-control" type="search" placeholder="Search" name="search">
        <button class="btn btn-outline-danger" name="submit2" type="submit">Search</button>
    </form>
</div>

<center>
    <h4>Registered Books</h4><br>
</center>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <table class="table table-bordered table-danger table-hover">
            <tr>
                <th>Book Image</th>
                <th>Book Name</th>
                <th>ISBN</th>
                <th>Availability</th>
                <th>Rating</th>
            </tr>

            <?php
            if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {
                    $book_image = $row['book_image'];
                    $book_name = $row['book_name'];
                    $aviavlity = $row['aviavlity'];
                    $book_isbn = $row['book_isbn'];
                    $book_id = $row['book_id'];

                    // Fetch average rating for the book
                    $rating_query = "SELECT AVG(rating) as average_rating FROM reviews WHERE book_id = $book_id";
                    $rating_result = mysqli_query($connection, $rating_query);
                    $average_rating = 0;
                    if ($rating_result && mysqli_num_rows($rating_result) > 0) {
                        $rating_data = mysqli_fetch_assoc($rating_result);
                        $average_rating = round($rating_data['average_rating']);
                    }
            ?>
                    <tr class="animate-slidein">
                        <td><img src="<?php echo htmlspecialchars($book_image); ?>" alt="Book Image" width="150"></td>
                        <td><?php echo htmlspecialchars($book_name); ?></td>
                        <td><?php echo htmlspecialchars($book_isbn); ?></td>
                        <td><?php echo htmlspecialchars($aviavlity); ?></td>
                        <td>
                            <div class="star-rating">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <span class="star <?php echo $i <= $average_rating ? 'filled' : 'unfilled'; ?>">★</span>
                                <?php endfor; ?>
                            </div>
                        </td>
                    </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='5'>No records found</td></tr>";
            }
            ?>
        </table>
    </div>
    <div class="col-md-2"></div>
</div>
</body>
</html>

<?php
// Close the database connection
mysqli_close($connection);
?>
