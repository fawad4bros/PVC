<?php 
include 'includes/header.php';
$email = $_SESSION['userlogged'];
$query = mysqli_query($connection,"SELECT * FROM blog_users WHERE blog_user_email='$email'");

$data = mysqli_fetch_array($query);

//Update User info
if(isset($_POST['update'])){
    $usr = $_POST['username'];
    $em = $_POST['email'];
    if (!empty($usr && !empty($em))) {
        $query = mysqli_query($connection,"UPDATE blog_users SET blog_username='$usr', blog_user_email='$em' WHERE blog_user_email=$'email' ");
        if ($query) {
            $_SESSION['userlogged']=$em;
            header("Location:profile.php?message=updated");
        }
    }
}

 ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include 'includes/navigation.php'; ?>


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <h3>Welcome to your profile page Username</h3>
                <br>
                <p class="alert alert-info col-md-6">To update your profile picture and password go to the <a href="settings.php"><b>settings</b></a> page</p>
                <div class="col-md-12">
                    <img src="<?php echo 'images/'.$data['blog_user_profile_pic']; ?>" alt="" style="width: 150px; height: 150px; border-radius: 100%;">
                    <form action="" method="post">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $data['blog_username']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $data['blog_user_email']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <input type="text" name="role" class="form-control" value="<?php echo $data['blog_user_role']; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="update" class="btn btn-success" value="Update your profile">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="bootstrap/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- our ajax call  -->
<script>

</script>

</body>

</html>