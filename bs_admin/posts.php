<?php include 'includes/header.php'; 


include 'includes/helper.php';
//Delete Post
if(isset($_GET['delete_post']) && $_GET['delete_post'] !== '') {
    $dlt = $_GET['delete_post'];
    if(delete('blog_posts','blog_post_id', $dlt)) {
      redirect('posts.php?source=');
    }else {
      die('FAILED');
    }
  } 

    //Approve Post
if(isset($_GET['approve_post']) && $_GET['approve_post'] !== "") {
	$app_id = $_GET['approve_post'];
	if(modifyStatus($app_id)) {
		redirect('posts.php?source=');
	}else {
		die("Failed");
	}
}
  //Unapprove Post
  if(isset($_GET['unapprove_post']) && $_GET['unapprove_post'] !== "") {
	$app_id = $_GET['unapprove_post'];
	if(modifyStatus($app_id)) {
		redirect('posts.php?source=');
	}else {
		die("Failed");
	}
}

  //Modify Post
  if(isset($_POST['modify'])) {
  	$eid = $_POST['editID'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $author = $_POST['author'];
    $content = $_POST['content'];
    $tags = $_POST['tags'];
    $status = $_POST['status'];
    $img = $_POST['image'];
    $post_image = $_FILES['post_image']['name'];
    $image = "";
        //get the cat_id from db
    $sql = mysqli_query($connection, "SELECT blog_cat_id FROM blog_categories WHERE blog_cat_title='$category'");
    $record = mysqli_fetch_array($sql);
    $post_cat_id = $record['cat_id'];
    // Check if user uploaded a new image
    if(isset($_FILES['post_image']) && $post_image !== ""){
    	$dir = "images/";
      $fileName = $_FILES['post_image']['name'];
      $fileSize = $_FILES['post_image']['size'];
      $fileTmpName = $_FILES['post_image']['tmp_name'];
      $allowed = ['png','jpg','jpeg','gif'];
      $fileExt = explode('.', $fileName);
      $fileActExt = strtolower(end($fileExt));
      // check if image ext is allowed
      if(!in_array($fileActExt,$allowed)){
      	echo "<script>alert('File Type not allowed')</script>";
      }
      elseif ($fileSize > 10000000)//10mb size
       {
      	echo "<script>alert('File size is too large')</script>";
      }else{
      	//prefix
      	$newImage = uniqid("PVC",true).".".$fileActExt;
      	$target = $dir.basename($newImage);
      	if (move_uploaded_file($fileTmpName, $target)) {
      		$image = $target;
      	}
      }
    }else{
    	$image = $img;
    }
    $query = mysqli_query($connection, "UPDATE blog_posts SET 
    	blog_post_title='$title',
    	blog_post_author='$author',
    	blog_post_cat_title='$category',
    	blog_post_cat_id='$post_cat_id',
    	blog_post_content='$content',
    	blog_post_status='$status',
    	blog_post_tags='$tags',
    	blog_post_image='$image'

    	WHERE blog_post_id='$eid'");
    if ($query) {
    	header("Location: posts.php");
    }

}
//echo "<script>alert('$eid')</script>";


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

					<!-- This Switch is giving problem -->
<?php  

if(isset($_GET['source'])){
	$source = $_GET['source'];

switch ($source) {
	case 'add_new':
	include"includes/add_post.php";
		# code...
		break;
			case 'edit':
	include"includes/edit_post.php";
		# code...
		break;
	default:
	include "includes/view_post.php"; 
		# code...
		break;
}
}else{
	include "includes/view_post.php"; 
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
