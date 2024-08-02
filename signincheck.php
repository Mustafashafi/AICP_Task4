<?php
require_once("connection.php");

if(isset($_POST["btn_submit"])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Assuming 'role' column indicates the user type
    $query = "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['id'];

        // Check user role
        if ($row['role'] === 'admin') {
            header("location:teacher_student.php"); // Redirect to admin page
        } else {
            header("location:project.php"); // Redirect to project page
        }
        exit; // Make sure to call exit after header redirect
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding:30px 40px">
            <strong>Invalid Email or Password!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        header("location:signin.php");
        exit; // Make sure to call exit after header redirect
    }
}
?>
