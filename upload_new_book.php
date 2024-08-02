<?php
require_once("connection.php");

if(isset($_POST['add_book_btn'])){
    $name = $_POST['book_name'];
    $author = $_POST['Author'];
    $book_id = $_POST['book_id'];
    $quantity = $_POST['edition'];
    $pages = $_POST['pages'];
    $publisher = $_POST['publisher'];

    // Check if the book ID already exists
    $check_query = "SELECT * FROM `available_books` WHERE `bookname` = '$name'";
    $result = mysqli_query($con, $check_query);

    if(mysqli_num_rows($result) > 0){
        // Book ID already exists, display message
        $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible" style="text-align:center;">
                               Book ID already exists!..
                            </div>';
        header("location:addbook.php");
        exit; // Stop execution
    }

  
        // If the book ID is unique, proceed with insertion
       
            $query = "INSERT INTO `available_books` VALUES ('book_id','$name','$author','$quantity','$pages','$publisher')";

            if(mysqli_query($con, $query)){
                // Book inserted successfully
                $_SESSION['message'] = '<div class="alert alert-success alert-dismissible" style="text-align:center;">
                                       Book uploaded Successfully!.. 
                                    </div>';
                header("location:addbook.php");
            }else{
                // Failed to insert book
                $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible" style="text-align:center;">
                                       Book Failed to upload Successfully!.. 
                                    </div>';
                                    
            }
        }else{
            // Failed to move uploaded file
            $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible" style="text-align:center;">
                                   Book not uploaded Successfully!.. 
                                </div>';
        }
   

?>
