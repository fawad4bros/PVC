<?php 

	include 'includes/header.php';
	 


	function showusers() {
    global $connection;
    $user = $_SESSION['userlogged'];
    $sql = mysqli_query($connection, "SELECT * FROM blog_users WHERE blog_user_email='$user'");
    $row = mysqli_fetch_array($sql);
    $role = $row['blog_user_role']; 
    $query = mysqli_query($connection, "SELECT * FROM blog_users WHERE blog_user_role != 'Admin' ORDER BY blog_user_id DESC");
    while($row = mysqli_fetch_array($query)) {
        $username = $row['blog_username'];
        $id = $row['blog_user_id'];
        $email = $row['blog_user_email'];
        if($role == "Admin") {
            echo "<tr>"
                    ."<td>$username</td>"
                    ."<td>$email</td>"
                    ."<td><a href='?duid=$id' class='btn btn-danger'>Delete</a></td>"
                   ."</tr>";
        } else {
            echo  "<tr>"
                . "<td>$username</td>"
                . "<td>$email</td>"
                . "</tr>";
        }
        
    }
}
if (isset($_GET['duid'])) {
	$duid = $_GET['duid'];
	$sql = mysqli_query($connection, "DELETE FROM blog_users WHERE blog_user_id=$duid");
	if ($sql) {
		header("Location: view_users.php");
	}else{
		die("Faild:"+ mysqli_error($connection));
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

					<h1 class="page-header">
						Welcome to the Administration Panel
					</h1>
					<div class="table-responsive">
						<table class="table table-bordered table-hover table-striped table-success">
							<thead>
								<th>Username</th>
								<th>Email</th>
								<th>Action</th>
							</thead>
							<tbody>
								<?php  showusers(); ?>
							</tbody>
							
						</table>
						
					</div>

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

<!-- ajax call-->
<script >

</script>
</body>

</html>
