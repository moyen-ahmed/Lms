<?php
session_start();

// Establish a database connection with error handling
$connection = mysqli_connect("localhost", "root", "", "lms");
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch search query if it exists
$search_query = "";
if (isset($_POST['search'])) {
    $search_query = $_POST['search_query'];
}

// Prepare and execute the SQL query securely
$query = "SELECT * FROM books";
if (!empty($search_query)) {
    $stmt = $connection->prepare("SELECT * FROM books WHERE book_name LIKE ? OR book_isbn LIKE ?");
    $search_term = "%$search_query%";
    $stmt->bind_param("ss", $search_term, $search_term);
    $stmt->execute();
    $query_run = $stmt->get_result();
} else {
    $query_run = mysqli_query($connection, $query);
}

// Close the database connection
mysqli_close($connection);
?>
<!DOCTYPE html>
<html>

<head>
    <title>All Reg Users</title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
        }

        .navbar-brand img.logo {
            width: 40px;
            height: auto;
            margin-right: 10px;
        }

        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .marquee {
            padding: 10px 0;
            font-size: 1.2em;
            font-weight: bold;
        }

        .search-form {
            margin-bottom: 30px;
        }

        .table {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }

        .table th {
            color: red;
        }

        .table img {
            border-radius: 5px;
            transition: transform 0.3s ease-in-out;
        }

        .table img:hover {
            transform: scale(1.1);
        }

        .search-button {
            transition: background-color 0.3s, transform 0.3s;
        }

        .search-button:hover {
            background-color: #28a745;
            transform: translateY(-2px);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand text-success" href="user_dashboard.php">
                    <img class="logo" src="logo.png" alt="Library Logo">Library Management System
                </a>
            </div>
            <span class="navbar-text text-success">Welcome: <?php echo $_SESSION['name']; ?></span>
            <span class="navbar-text text-success">Email: <?php echo $_SESSION['email']; ?></span>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown">
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
        <marquee direction="left" bgcolor="pink" class="marquee">Welcome To Library</marquee>
    </span><br>

    <span>
        <marquee direction="right" bgcolor="yellow" class="marquee">A library is the delivery room for the birth of ideas, a place where history comes to life</marquee>
    </span><br><br>
    <center>
        <h4>Books in Library</h4><br>
    </center>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form method="post" action="" class="search-form">
                <div class="form-group">
                    <input type="text" name="search_query" class="form-control" placeholder="Search by Book Name or ISBN" value="<?php echo htmlspecialchars($search_query); ?>">
                </div>
                <button type="submit" name="search" class="btn btn-success search-button">Search</button>
            </form>
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Book Name</th>
                    <th>Book Image</th>
                    <th>Author Name</th>
                    <th>Category Name</th>
                    <th>Book ISBN</th>
                </tr>

                <?php if ($query_run): ?>
                    <?php while ($row = $query_run->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['book_name']); ?></td>
                            <td><img src="<?php echo 'librarians/' . htmlspecialchars($row['book_image']); ?>" alt="Book Image" width="150"></td>
                            <td><?php echo htmlspecialchars($row['author_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['cat_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['book_isbn']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No books found</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>

</html>
