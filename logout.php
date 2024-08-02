<?php
require_once("connection.php");

session_destroy();
header("location:signin.php");
?>