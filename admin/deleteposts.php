<?php
include("connection.php");
$postId=$_GET['post_id'];

$query = "select upload_image from posts where post_id='$postId'";
$run_com = mysqli_query($con,$query);
while ($row_com = mysqli_fetch_array($run_com)){
$filepath = "../imagepost/".$row_com['upload_image'];			
@unlink($filepath);
}
$query = "delete from posts where post_id='$postId'";
$run_com = mysqli_query($con,$query);

$query = "delete from comments where post_id='$postId'";
$run_com = mysqli_query($con,$query);

echo "<script>window.open('home.php', '_self')</script>";
?>
