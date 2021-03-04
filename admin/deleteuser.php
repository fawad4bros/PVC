<?php
include("connection.php");


$userId=$_GET['u_id'];
$query = "select user_image from users where user_id='$userId'";
$run_com = mysqli_query($con,$query);
$row_com = mysqli_fetch_array($run_com);
$filepath = "../users/".$row_com['user_image'];			
@unlink($filepath);

$query = "select upload_image from posts where user_id ='$userId'";
$run_com = mysqli_query($con,$query);
while ($row_com = mysqli_fetch_array($run_com)){
$filepath = "../imagepost/".$row_com['upload_image'];			
@unlink($filepath);
}
$query = "select user_cover from users where user_id ='$userId'";
$run_com = mysqli_query($con,$query);
$row_com = mysqli_fetch_array($run_com);
$filepath = "../cover/".$row_com['user_cover'];			
@unlink($filepath);

$query = "delete from users_messages where user_from='$userId'";
$run_com = mysqli_query($con,$query);
$query = "delete from posts where user_id='$userId'";
$run_com = mysqli_query($con,$query);
$query = "delete from comments where user_id='$userId'";
$run_com = mysqli_query($con,$query);
$query = "delete from users where user_id='$userId'";
$run_com = mysqli_query($con,$query);
echo "<script>window.open('members.php', '_self')</script>";
?>
