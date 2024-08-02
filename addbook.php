<?php
require_once("connection.php");
if(isset($_SESSION['id'])){
  $user_id = $_SESSION['id'];
  $query = "SELECT * FROM `user` WHERE `id` = '$user_id' ";
  $result = mysqli_query($con,$query);
  $user = mysqli_fetch_assoc($result);
}else{
  header("location:signin.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
<script>
function validateForm() {
    // Get form values
    var bookName = document.getElementById('book_name').value.trim();
    var authorName = document.getElementById('author').value.trim();
    var bookId = document.getElementById('book_id').value.trim();
    var quantity = document.getElementById('quantity').value;
    var photo = document.getElementById('photo').files[0];

    // Regular expressions for validation
    var namePattern = /^[A-Za-z\s]+$/; // Only allows letters and spaces
    var idPattern = /^[A-Za-z0-9]+$/; // Letters and numbers only

    // Validate Book Name
    if (!namePattern.test(bookName)) {
        alert("Please enter a valid Book Name (letters and spaces only).");
        return false;
    }

    // Validate Author Name
    if (!namePattern.test(authorName)) {
        alert("Please enter a valid Author Name (letters and spaces only).");
        return false;
    }

    // Validate Book Id
    if (!idPattern.test(bookId)) {
        alert("Please enter a valid Book Id (letters and numbers only).");
        return false;
    }

    // Validate Quantity
    if (quantity <= 0 || isNaN(quantity)) {
        alert("Please enter a valid quantity (a positive number).");
        return false;
    }

    // Validate File Upload
    if (!photo) {
        alert("Please upload a photo.");
        return false;
    }

    // All validations passed
    return true;
}
</script>


	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Add book</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css1/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css1/style.css" />

</head>

<body>

	<div id="booking" class="section" style="background-image: url('images/header-slide.jpg');height:600px;">
	
		<div class="section-center">
			
			<div class="container">
			
				<div class="row">
					<div class="booking-form">
						
						<div class="form-header">
						
				
							
				
						</div>
						
						<form action="upload_new_book.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
    <br><br><br>
    <?php
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
    }
    unset($_SESSION['message']);
    ?>
    <h1 style="color:white;margin-left:180px;font-weight:bold;font-size:40px">Add a Book</h1>
    <a href="project.php" style="color:white;position:fixed;left:50px;top:120px;">
        <i class="fa fa-long-arrow-left" aria-hidden="true" style="font-size:40px"></i>
    </a>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <span class="form-label">Book Id</span>
                <input class="form-control" type="text" placeholder="Enter book id" name="book_id" id="book_id" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <span class="form-label">Book Title</span>
                <input class="form-control" type="text" placeholder="Enter book name" name="book_name" id="book_name" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <span class="form-label">Author Name</span>
                <input class="form-control" type="text" placeholder="Enter author name" name="Author" id="author" required>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <span class="form-label">Book Pages</span>
                <input class="form-control" type="number" placeholder="Enter book pages" name="pages" id="pages"  required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <span class="form-label">Book Publisher</span>
                <input class="form-control" type="text" placeholder="Enter book publisher" name="publisher" id="publisher"  required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <span class="form-label">Book Edition</span>
                <input class="form-control" type="number" placeholder="Enter book edition" name="edition" id="edition"  required>
            </div>
        </div>
    </div>
    <div class="form-btn">
        <button class="submit-btn" name="add_book_btn">Add Now</button>
    </div>
</form>

					</div>
				</div>
			</div>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>