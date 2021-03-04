<?php include 'header.php'; 


include 'helper.php';






?>

<div id="wrapper">

	<!-- Navigation -->
	<?php include 'nav.php'; ?>


	<div id="page-wrapper">

		<div class="container-fluid">

			<!-- Page Heading -->
			<div class="row">

					<h1 class="page-header">
						Welcome to the Administration Panel
					</h1>

					<!-- This Switch is giving problem -->
<?php  

if(isset($_GET['source'])){
	$source = $_GET['source'];

switch ($source) {
	case 'add_new':
	include"add_post.php";
		# code...
		break;
			case 'edit':
	include"edit_post.php";
		# code...
		break;
	default:
	include "view_post.php"; 
		# code...
		break;
}
}else{
	include "view_post.php"; 
}

 ?>
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

</body>

</html>
