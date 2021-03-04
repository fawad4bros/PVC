<?php
session_start();
$mysqli = new mysqli("localhost","root","","pvc") or die("Could not connect");
$error = [];
if(isset($_POST['login_submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = mysqli_query($mysqli, "SELECT * FROM blog_users WHERE blog_user_email='$email'");
  $row = mysqli_fetch_assoc($sql);
  $db_email = $row['blog_user_email'];
  $db_pwd = $row['blog_user_password'];
  $profile_pic = $row['blog_user_profile_pic'];
  $username = $row['blog_username'];

  $rehashpwd = md5($password);

  if($email === $db_email && $db_pwd === $rehashpwd) {
    $_SESSION['userlogged'] = $email;
    $_SESSION['profile_pic'] = $profile_pic;
    $_SESSION['username'] = $username;
   header("Location: ../../bs_admin");
  }else{
    $_SESSION['log_email'] = $email;
    header("Location: ../../cms_admin.php?wrong_entries");
  }
}
