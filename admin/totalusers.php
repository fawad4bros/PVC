<?php
include("connection.php");

$query = "select * FROM users";
$sql = mysqli_query($con, $query);
$nrows = mysqli_num_rows($sql);
echo'<b>Total Users: </b>'. $nrows.'<br>';

$query = "select * FROM posts";
$sql = mysqli_query($con, $query);
$nrows = mysqli_num_rows($sql);
echo'<b>Total Posts: </b>'. $nrows.'<br>';

$query = "select * FROM comments";
$sql = mysqli_query($con, $query);
$nrows = mysqli_num_rows($sql);
echo'<b>Total Comments: </b>'. $nrows.'<br>';
?>