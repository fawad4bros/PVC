<?php 

 $mysqli = new mysqli("localhost","root","","pvc") or die("Could not connect");
 $error =  [];
 if (isset($_POST['create_submit'])) {
 	$username = clean($_POST['username']);
 	$email = clean($_POST['email']);
 	$password =$_POST['password'];

 	if (empty($username)) {
 		array_push($error,"<p class='alert alert-danger'> Username is required </p>");
 		header("Location: ../../cms_admin.php?error=Username_is_required");
 	}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 		array_push($error,"<p class='alert alert-danger'> Email is invalid </p>");
 		header("Location: ../../cms_admin.php?error=Email_is_invalid");
 	}elseif (empty($email)) {
 		array_push($error,"<p class='alert alert-danger'> Email is required </p>");
 		header("Location: ../../cms_admin.php?error=Email_is_required"); 		# code...
 	}elseif (strlen($password) <= 5) {
 		array_push($error,"<p class='alert alert-danger'>Password must be greater than 5</p>");
 		header("Location: ../../cms_admin.php?error=Password_is_short");  		# code...
 	}else{
 		if (empty($error)) {
 			$rand= rand(1,3);
 			switch ($rand) {
 				case '1':
 					$profile_pic = "users/profile_pics/defaults/head_1.png";
 					break;
 					case '2':
 					$profile_pic = "users/profile_pics/defaults/head_2.png";
 					break;
 					case '3':
 					$profile_pic = "users/profile_pics/defaults/head_3.png";
 					break;
 			}
 			$hashedpwd = md5($password);
 			$sql = mysqli_query($mysqli, "INSERT INTO blog_users VALUES('','$username','$email','$hashedpwd','$profile_pic','yes','0','Admin')");
 			 
 			header("Location: ../../cms_admin.php?admin_created");
 		}
 	}
 }

//Cleaning Data before sending in dataBase
function clean($data){
	global $mysqli;
	$data = htmlspecialchars($data);
	$data = mysqli_real_escape_string($mysqli, $data);
	$data = stripcslashes($data);
	$data = strip_tags($data);
	return $data;
}
  ?>
