<?php
session_start();

// Establish a database connection with error handling
$connection = mysqli_connect("localhost", "root", "", "lms");
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle review submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['review']) && isset($_POST['rating']) && isset($_POST['book_id'])) {
    $book_id = $_POST['book_id'];
    $user_id = $_SESSION['user_id']; // Assuming the user ID is stored in the session
    $review = mysqli_real_escape_string($connection, $_POST['review']);
    $rating = intval($_POST['rating']);

    // Insert the review into the database
    $query = "INSERT INTO reviews (book_id, user_id, review, rating) VALUES (?, ?, ?, ?)";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("iisi", $book_id, $user_id, $review, $rating);
    
    if ($stmt->execute()) {
        header("Location: review.php?success=1");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch all books
$query = "SELECT * FROM books";
$query_run = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Book Reviews</title>
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

        .review-section {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .review-section h5 {
            margin-bottom: 20px;
            color: #333;
        }

        .star-rating {
            font-size: 1.5em;
            color: #ffd700;
            cursor: pointer;
        }

        .star-rating span {
            transition: transform 0.3s ease-in-out;
        }

        .star-rating span:hover {
            transform: scale(1.2);
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand text-success" href="librarians_dashboard.php">
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
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Book Name</th>
                    <th>Book Image</th>
                    <th>Author Name</th>
                    <th>Category Name</th>
                    <th>Book ISBN</th>
                </tr>

                <?php if ($query_run): ?>
                    <?php while ($row = mysqli_fetch_assoc($query_run)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['book_name']); ?></td>
                            <td><img src="<?php echo 'librarians/' . htmlspecialchars($row['book_image']); ?>" alt="Book Image" width="150"></td>
                            <td><?php echo htmlspecialchars($row['author_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['cat_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['book_isbn']); ?></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <div class="review-section">
                                    <h5>Reviews for <?php echo htmlspecialchars($row['book_name']); ?></h5>
                                    <!-- Fetch and display reviews from the database for this book -->
                                    <?php
                                    $book_id = $row['book_id'];
                                    $review_query = "SELECT * FROM reviews WHERE book_id = $book_id";
                                    $review_run = mysqli_query($connection, $review_query);

                                    if ($review_run && mysqli_num_rows($review_run) > 0):
                                        while ($review = mysqli_fetch_assoc($review_run)):
                                            $rating = intval($review['rating']);
                                    ?>
                                            <p><?php echo htmlspecialchars($review['review']); ?></p>
                                            <div class="star-rating">
                                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                                    <span class="star <?php echo $i <= $rating ? 'filled' : 'unfilled'; ?>">★</span>
                                                <?php endfor; ?>
                                            </div>
                                            <hr>
                                    <?php
                                        endwhile;
                                    else:
                                    ?>
                                        <p>No reviews yet.</p>
                                    <?php endif; ?>
                                    <!-- Rating form -->
                                    <form method="post" action="">
                                        <div class="form-group">
                                            <textarea class="form-control" name="review" placeholder="Write your review here..."></textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="star-rating">
                                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                                    <span class="star unfilled" data-value="<?php echo $i; ?>">★</span>
                                                <?php endfor; ?>
                                            </div>
                                            <input type="hidden" name="rating" id="rating-<?php echo $book_id; ?>">
                                            <input type="hidden" name="book_id" value="<?php echo $book_id; ?>">
                                        </div>
                                        <button type="submit" class="btn btn-success">Submit Review</button>
                                    </form>
                                </div>
                            </td>
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

    <script>
        $(document).ready(function() {
            $('.star-rating .star').on('click', function() {
                var ratingValue = $(this).data('value');
                var bookId = $(this).closest('form').find('input[name="book_id"]').val();
                $('#rating-' + bookId).val(ratingValue);

                // Highlight the selected stars
                $(this).siblings().each(function() {
                    if ($(this).data('value') <= ratingValue) {
                        $(this).removeClass('unfilled').addClass('filled');
                    } else {
                        $(this).removeClass('filled').addClass('unfilled');
                    }
                });
            });
        });
    </script>
</body>

</html>

<?php
// Close the database connection
mysqli_close($connection);
?>
