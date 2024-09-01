<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "lms");

if (isset($_POST['submit_review'])) {
    $book_id = $_POST['book_id'];
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $review = $_POST['review'];
        $rating = $_POST['rating'];

        $review_query = "INSERT INTO reviews (book_id, user_id, review, rating) VALUES ('$book_id', '$user_id', '$review', '$rating')";
        mysqli_query($connection, $review_query);

        header("Location: view_books.php"); // Redirect to the book view page after submitting the review
    } else {
        echo "<script>alert('Please log in to submit a review.');</script>";
        header("Location: view_books.php"); // Redirect to the book view page if the user is not logged in
    }
}
?>
