<?php require_once("connection.php"); 
  if(isset($_SESSION['id'])){
    header("location:project.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images6/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor6/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts6/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor6/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor6/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor6/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css6/util.css">
	<link rel="stylesheet" type="text/css" href="css6/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter" >
		<div class="container-login100" style="background:url('1.jpg');background-size:cover">
			<div class="wrap-login100" >
				<span style="position:fixed;top:50px;left:600px">
			<?php
					if(isset($_SESSION['message'])){
					  echo    $_SESSION['message'];
					}
					unset($_SESSION['message']);
				  ?></span>
				<div class="login100-pic js-tilt" data-tilt >
					<img src="images6/img-01.png" alt="IMG" >
				</div>

				<form class="login100-form validate-form" action="signincheck.php" method="post" onsubmit="return validateForm()">
    <span class="login100-form-title" style="font-size:33px;">
        Member Login
    </span>

    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
        <input class="input100" type="email" name="email" placeholder="Email" id="email" required>
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-envelope" aria-hidden="true"></i>
        </span>
    </div>

    <div class="wrap-input100 validate-input" data-validate="Password is required">
        <input class="input100" type="password" name="password" placeholder="Password" id="password" required>
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-lock" aria-hidden="true"></i>
        </span>
    </div>

    <div class="container-login100-form-btn">
        <button class="login100-form-btn" name="btn_submit">
            Login
        </button>
    </div>
</form>
<script>
function validateForm() {
    // Get form values
    var email = document.getElementById('email').value.trim();
    var password = document.getElementById('password').value.trim();

    // Regular expression for email validation
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    // Validate email
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address (ex@abc.xyz).");
        return false;
    }

    // Validate password (add any specific requirements for password here if needed)
    if (password === "") {
        alert("Please enter a password.");
        return false;
    }

    // All validations passed
    return true;
}
</script>

			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor6/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor6/bootstrap/js/popper.js"></script>
	<script src="vendor6/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor6/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor6/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js6/main.js"></script>

</body>
</html>