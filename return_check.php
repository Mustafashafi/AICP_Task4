<?php
// Database connection parameters
require_once('connection.php');

if(isset($_POST['return'])) {
    // Check if issued books table is empty
    $checkQuery = "SELECT COUNT(*) AS count FROM `issued_books`";
    $checkResult = $con->query($checkQuery);
    
    if($checkResult) {
        $rowCount = $checkResult->fetch_assoc()['count'];
        
        if($rowCount > 0) {
            if(isset($_POST['book_id']) && isset($_POST['Reg_id']) && isset($_POST['student_name'])) {
                $bookId = $_POST['book_id']; // ID of the book to be returned
                $regId = $_POST['Reg_id']; // Registration ID of the student who borrowed the book
                $studentName = $_POST['student_name']; // Name of the student

                // Query to get the information of the issued book
                $query = "SELECT * FROM `issued_books` WHERE book_id = '$bookId' AND Reg_id = '$regId' AND Issuer_Name = '$studentName'";
                $result = $con->query($query);

                if($result) {
                    if($result->num_rows == 1) {
                        // Removing the entry from the issued table
                        $deleteQuery = "DELETE FROM `issued_books` WHERE book_id = '$bookId' AND Reg_id = '$regId' AND Issuer_Name = '$studentName'";
                        $deleteResult = $con->query($deleteQuery);

                        if($deleteResult) {
                            // Updating the quantity in the available books table
                            $updateQuery = "UPDATE available_books SET quantity = quantity + 1 WHERE book_id = '$bookId'";
                            $updateResult = $con->query($updateQuery);

                            if($updateResult) {
                                // Check if quantity becomes 0, then re-insert the book into available books table
                                $checkQuantityQuery = "SELECT * FROM available_books WHERE book_id = '$bookId' AND quantity = 0";
                                $checkQuantityResult = $con->query($checkQuantityQuery);

                                if ($checkQuantityResult && $checkQuantityResult->num_rows > 0) {
                                    // Re-insert the book with quantity 1
                                    $bookData = $result->fetch_assoc();
                                    $reinsertQuery = "INSERT INTO available_books (book_id, book_name, author, quantity) VALUES ('$bookId', '{$bookData['book_name']}', '{$bookData['author']}', 1)";
                                    $reinsertResult = $con->query($reinsertQuery);

                                    if ($reinsertResult) {
                                        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                                        Book Return Successfully and Reinserted into available books.
                                        </div>';
                                        header("location:returnbook.php");
                                    } else {
                                        $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                                        Failed to re-insert the book into available books table.
                                        </div>';
                                        header("location:returnbook.php");
                                    }
                                } else {
                                    $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                                    Book Return Successfully.
                                    </div>';
                                    header("location:returnbook.php");
                                }
                            } else {
                                $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                                Failed to update available books table: 
                                </div>';
                                header("location:returnbook.php");
                            }
                        } else {
                            $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                            Failed to remove entry from issued table:  
                            </div>';
                            header("location:returnbook.php");
                        }
                    } else {
                        $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                        Book with given ID/ registration ID/ student name not found in issued table.  
                        </div>';
                        header("location:returnbook.php");
                    }
                } else {
                    throw new Exception("Error executing query: " . $con->error);
                }
            } else {
                $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                Provide book ID, registration ID, and student name.  
                </div>';
                header("location:returnbook.php");
            }
        } else {
            $_SESSION['message'] = '<div class="alert alert-info alert-dismissible">
            No books are issued at the moment.
            </div>';
            header("location:returnbook.php");
        }
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
        Error checking issued books: ' . $con->error . '  
        </div>';
        header("location:returnbook.php");
    }
}

// Close connection
$con->close();
?>
