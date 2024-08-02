<?php
require_once("connection.php");
if(isset($_SESSION['id'])){
  $user_id = $_SESSION['id'];
  $query = "SELECT * FROM `user` WHERE `id` = '$user_id'  ";
  $result = mysqli_query($con,$query);
  $user = mysqli_fetch_assoc($result);
}else{
  header("location:signin.php");
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Return Book</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor1/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor1/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor1/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor1/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor1/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css3/util.css">
	<link rel="stylesheet" type="text/css" href="css3/main.css">
<!--===============================================================================================-->
		<link rel="stylesheet" href="css2/style.css">
	
	</head>

	<body>
	<a href="project.php"><i class="fa fa-long-arrow-left" aria-hidden="true" class="btn" style="color:white;position:fixed;left:30px;font-size:20px;top:20px;font-size:35px"></i></a>
		<div class="wrapper">
			
			<div class="inner">
			<form action="return_check.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
    <h3>Book Return</h3><br>
    <div style="width:350px;margin-top:-30px;">
        <?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
        }
        unset($_SESSION['message']);
        ?>
    </div>
    <div class="form-wrapper">
        <label for="book_id" class="label-input">Book Id</label>
        <input type="text" class="form-control" name="book_id" id="book_id" required>
    </div>
    <div class="form-wrapper">
        <label for="Reg_id" class="label-input">Student Id</label>
        <input type="text" class="form-control" name="Reg_id" id="Reg_id" required>
    </div><br><br>
    <div class="form-wrapper">
        <label for="student_name" class="label-input">Student Name</label>
        <input type="text" class="form-control" name="student_name" id="student_name" required>
    </div>
    <button style="margin-left:70px; margin-top: 70px;" name="return">Return the Book</button>
</form>
<script>
function validateForm() {
    // Get form values
    var bookId = document.getElementById('book_id').value.trim();
    var studentId = document.getElementById('Reg_id').value.trim();
    var studentName = document.getElementById('student_name').value.trim();

    // Regular expressions for validation
    var idPattern = /^[A-Za-z0-9]+$/; // Letters and numbers only
    var namePattern = /^[A-Za-z\s]+$/; // Only allows letters and spaces

    // Validate Book Id
    if (!idPattern.test(bookId)) {
        alert("Please enter a valid Book Id (letters and numbers only).");
        return false;
    }

    // Validate Student Id
    if (!idPattern.test(studentId)) {
        alert("Please enter a valid Student Id (letters and numbers only).");
        return false;
    }

    // Validate Student Name
    if (!namePattern.test(studentName)) {
        alert("Please enter a valid Student Name (letters and spaces only).");
        return false;
    }

    // All validations passed
    return true;
}
</script>

				<div class="image-holder">
					<img src="who-we-are-image.jpg" alt="" height="549px">
				</div>
			</div>
		</div>

		<script src="js1/jquery-3.3.1.min.js"></script>
		<script src="js1/main.js"></script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
