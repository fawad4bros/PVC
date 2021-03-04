<?php
include "../includes/db.php";

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $image = $_POST['img'];
    $msg = "";
    $class = "alert alert";

    if(empty($username)) {
        $msg = "<b>Username is required</b>";
        echo "<div class='$class-danger'>$msg</div>";
    } 
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = "<b>Email is invalid</b>";
        echo "<div class='$class-danger'>$msg</div>";
    } 
    else if (strlen($password) < 6) {
        $msg = "<b>Password is short</b>";
        echo "<div class='$class-danger'>$msg</div>";
    }
    else {
        $password = md5($password);
        $query = mysqli_query($connection, "INSERT INTO blog_users(blog_username,blog_user_email,blog_user_password,blog_user_profile_pic,blog_user_role) VALUES('$username', '$email', '$password','$image','$role')");
        if(!$query) {
            $msg = "<b>Could not add user</b>";
            echo "<div class='$class-success'>$msg</div>";
         } else {
            ?>
            <script>
                window.location.assign("../view_users.php");
            </script>
            <?php
        }
    }
}