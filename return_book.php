<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "lms");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_no = $_POST['book_no'];
    $student_id = $_SESSION['id'];

    // Update the status of the issued book
    $query = "UPDATE issued_books SET status = 0 WHERE book_no = '$book_no' AND student_id = '$student_id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        // Update the availability of the book in the books table
        $update_books_query = "UPDATE books SET available_copies = aviavlity + 1 WHERE 	book_isbn = '$book_isbn'";
        mysqli_query($connection, $update_books_query);

        $_SESSION['message'] = "Book returned successfully.";
    } else {
        $_SESSION['message'] = "Failed to return the book.";
    }

    header("Location: return_books.php");
    exit();
}
?>
