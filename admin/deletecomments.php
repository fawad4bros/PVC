<?php
include("connection.php");


$userId=$_GET['u_id'];


$query = "delete from comments where user_id='$userId'";
$run_com = mysqli_query($con,$query);
//echo "<script>window.open('home.php', '_self')</script>";
?>