<?php
// Database conection parameters
require_once('connection.php');

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Getting form data
    $book_id = $_POST['book_id'];
    $reg_id = $_POST['Reg_id'];
    $issuer_name = $_POST['Issuer_Name'];
    $semester = $_POST['semester'];
    $department = $_POST['department'];

    // Check if the book is available in the available books table
    $sql_check = "SELECT * FROM available_books WHERE book_id = $book_id";
    $result_check = $con->query($sql_check);

    if ($result_check->num_rows > 0) {
        // Book is available, proceed to issue it
        $query = "INSERT INTO `issued_books` VALUES ('$book_id', '$reg_id', '$issuer_name', '$semester', '$department')";
        if($con->query($query) === TRUE){
            
        
            $_SESSION['message'] = '<div class="alert alert-success alert-dismissible" style="text-align:center;">
           
                
                Book Issue Successfully!
            </div>';
            header('location:issue_the_book.php');
        }else{
            $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible" style="text-align:center;">
           
                Book Issue Failed!
            </div>';
        }
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible" style="text-align:center;">
             
                Book Not available!
            </div>';
            header('location:issue_the_book.php');
    }

    
}
// Close conection
$con->close();
?>







