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
	<title>Issue The Book</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css7/nunito-font.css">
	<link href="vendor5/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css7/style.css"/>
    <link type="text/css" rel="stylesheet" href="css1/bootstrap.min.css" />
</head>

<body class="form-v9">

    
	<div class="page-content" style="background-color:black">
    
		<div class="form-v9-content" style="background-image: url('images7/form-v9.jpg');margin-top:10px;width:70%;font-family: monospace">
		<form class="form-detail" action="issue the book check.php" method="POST" style="height:540px;padding-top:1px;" onsubmit="return validateForm()">
    <?php
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
    }
    unset($_SESSION['message']);
    ?>
    <h2>Book Issue</h2>
    <a href="project.php" class="btn btn-primary" style="position:absolute;color:white;right:10px;top:10px">
        <i class="fa fa-long-arrow-left" aria-hidden="true" style="font-size:15px;margin-right:10px"></i>Back to Home
    </a>
    <div class="form-row-total">
        <div class="form-row">
            <input type="text" name="book_id" class="input-text" placeholder="Your Book Id" id="book_id" required>
        </div>
        <div class="form-row">
            <input type="text" name="Reg_id" class="input-text" placeholder="Your Reg Id" id="Reg_id" required>
        </div>
    </div>
    <div class="form-row-total">
        <div class="form-row">
            <input type="text" name="Issuer_Name" class="input-text" placeholder="Your Name" id="Issuer_Name" required>
        </div>
        <div class="form-row">
            <input type="number" name="semester" class="input-text" placeholder="Semester" id="semester" min="1" max="8" required>
        </div>
    </div>
    <div class="form-row-total">
        <div class="form-row" style="margin-left:180px">
            <input type="text" name="department" class="input-text" placeholder="Department" id="department" required>
        </div>
    </div>
    <div class="form-row-last" style="margin-top:-40px;margin-right:30px">
        <input type="submit" name="submit" class="register" value="Done">
    </div>
</form>

<script>
function validateForm() {
    // Get form values
    var bookId = document.getElementById('book_id').value.trim();
    var studentId = document.getElementById('Reg_id').value.trim();
    var issuerName = document.getElementById('Issuer_Name').value.trim();
    var semester = document.getElementById('semester').value.trim();
    var department = document.getElementById('department').value.trim();

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

    // Validate Issuer Name
    if (!namePattern.test(issuerName)) {
        alert("Please enter a valid Name (letters and spaces only).");
        return false;
    }

    // Validate Semester (e.g., numbers only or specific format, adjust pattern if needed)
    if (!/^[0-9]+$/.test(semester)) {
        alert("Please enter a valid Semester (numbers only).");
        return false;
    }

    // Validate Department
    if (!namePattern.test(department)) {
        alert("Please enter a valid Department (letters and spaces only).");
        return false;
    }

    // All validations passed
    return true;
}
</script>

		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>