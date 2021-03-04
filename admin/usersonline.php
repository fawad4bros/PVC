<?php


$session=session_id();
$time=time();
$time_check=$time-100; //SET TIME 10 Minute
$con = mysqli_connect("localhost","root","","pvc");


// Connect to server and select databse


$sql="SELECT * FROM user_online WHERE session='$session'";
$result=mysqli_query($con,$sql);

$count=mysqli_num_rows($result);

if($count=="0"){

$sql1="INSERT INTO user_online(session, time)VALUES('$session', '$time')";
$result1=mysqli_query($con,$sql1);
}

else {
$sql2="UPDATE user_online SET time='$time' WHERE session = '$session'";
$result2=mysqli_query($con,$sql2);
}



// if over 10 minute, delete session
$sql4="DELETE FROM user_online WHERE time<$time_check";
$result4=mysqli_query($con,$sql4);

// Open multiple browser page for result


// Close connection

 
?>