<?php include "db.php";  ?>
<?php 
function add_category(){
 global $connection;
if(isset($_POST['cat_add'])){
	if(empty($_POST['cat_title'])){
		header("location: ../categories.php?Field_cannot_be_empty");

	}else{
		$cat_title = $_POST['cat_title'];
		$query = "INSERT INTO blog_categories(blog_cat_title)VALUES('$cat_title')";
		$result = mysqli_query($connection,$query);
		if (!$result) {
			# code...
			die("Could not send data".mysqli_error($connection));
		}else{
			header("location: ../categories.php?categoory_added");
		}
	}

}

}
add_category();

function show_category(){
	global $connection;
	$query = "SELECT * FROM blog_categories";
	$result = mysqli_query($connection,$query);

	while($row = mysqli_fetch_assoc($result)){
$cat_id = $row['blog_cat_id'];
$cat_title = $row['blog_cat_title'];
echo"<tr>";
echo"<td>{$cat_id}</td>";
echo"<td>{$cat_title}</td>";
echo"<td><a  href='categories.php?delete_cat={$cat_id}'>Delete</a></td>";
echo"</tr>";
	}



}

function delete_category(){
	global $connection;
	if(isset($_GET['delete_cat'])){
		$cat_id = $_GET['delete_cat'];
	$query = "DELETE FROM blog_categories WHERE blog_cat_id = $cat_id";
	$result = mysqli_query($connection,$query);
	if (!$result) {
			# code...
			die("Could not delete data".mysqli_error($connection));
		}else{
			header("location: categories.php?categoory_deleted");
		}	
	}
	
}
delete_category();

function add_post(){
global $connection;
if(isset($_POST['publish'])){
	$post_title = $_POST['title'];
	$post_author = $_POST['author'];
	$post_category = $_POST['category'];
	//Get the $post_category_id from database
	$sql = mysqli_query($connection, "SELECT blog_cat_id FROM blog_categories WHERE blog_cat_title='$post_category'");
	$row = mysqli_fetch_array($sql);
	$post_category_id = $row['blog_cat_id'];
	 
	$post_content = mysqli_real_escape_string($connection,$_POST['content']);
	// name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = '../../uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 100000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            echo "File uploaded successfully";

        } else {
            echo "Failed to upload file.";
        }
    }
	$post_tags = $_POST['tags'];
	$post_status = $_POST['status'];
	$date = date("l d F Y");
	$post_views =  0;
	$post_comment_count = 0;
	if(isset($_FILES['post_image'])){
		$dir = "../../images/";
		$imageName = $_FILES['post_image']['name'];
		$target_file = $dir.basename($_FILES['post_image']['name']);
		if(move_uploaded_file($_FILES['post_image']['tmp_name'], $target_file)){
			echo "image was uploaded" ;
		}else{
			echo"not uploaded";
		}
	}
$query = "INSERT INTO blog_posts(blog_post_title,blog_post_author,blog_post_cat_title,blog_post_cat_id,blog_post_content,blog_post_image,name,size,blog_post_date,blog_post_comment_count,blog_post_views,blog_post_tags,blog_post_status)VALUES('$post_title','$post_author','$post_category','$post_category_id','$post_content','$imageName','$filename', '$size','$date','$post_comment_count','post_views','$post_tags','$post_status')";
	$result = mysqli_query($connection,$query);
	if (!$result) {
		die("Could Not send data".mysqli_error($connection));
		header("Location: ../posts.php?source=add_new");
		# code...
	}else{
		header("Location: ../posts.php?Post_added");
	}

}

}
	add_post();
	function show_posts(){
	global $connection;
	$user = $_SESSION['userlogged'];
    $sql = mysqli_query($connection, "SELECT * FROM blog_users WHERE blog_user_email='$user'");
    $res = mysqli_fetch_array($sql);
    $username = $res['blog_username'];
    $role = $res['blog_user_role'];

    if($role === 'Admin'){
    $query = "SELECT * FROM blog_posts";
    } else{
    $query = "SELECT * FROM blog_posts WHERE blog_post_author='$username'";
    }

	$query = "SELECT * FROM blog_posts";
	$results = mysqli_query($connection,$query);
	while ($row = mysqli_fetch_assoc($results)) {
	$post_id = $row['blog_post_id'];
	$post_title = $row['blog_post_title'];
	$post_author = $row['blog_post_author'];
	$post_category = $row['blog_post_cat_title'];
	$post_category_id = $row['blog_post_cat_id'];
	$post_content = substr($row['blog_post_content'], 0, 50);
	$post_tags = $row['blog_post_tags'];
	$post_status =$row['blog_post_status'];
	$post_image =$row['blog_post_image'];
	$date = $row['blog_post_date'];
	echo "<tr>";
	echo "<td>{$post_id}</td>";
	echo "<td>{$post_title }</td>";
	echo "<td>{$post_author }</td>";
	echo "<td>{$post_category }</td>";
	echo "<td>{$post_status }</td>";
	echo "<td><img src='../images/{$post_image}' width='50px'></td>";
	echo "<td>{$post_content }</td>";
	echo "<td>{$date }</td>";
	echo "<td>{$post_tags }</td>";

	echo "<td><a href='posts.php?approve_post=$post_id' class='btn btn-success'>Change status</a></td>";
	echo "<td><a href='posts.php?source=edit&edit_post=$post_id' class='btn btn-primary'>Edit</a></td>";
	echo "<td><a href='posts.php?delete_post=$post_id' class='btn btn-danger'>Delete</a></td>";
	echo"</tr>";	
		}
	}



	//publish or draft post
function modifyStatus($id) {
  global $connection;
  $query = mysqli_query($connection, "SELECT blog_post_status FROM blog_posts WHERE blog_post_id=$id");
  if(mysqli_num_rows($query) > 0) {
    $result = mysqli_fetch_array($query);
    $status = $result['blog_post_status'];
    
    if($status == "draft") {
      $query = mysqli_query($connection, "UPDATE blog_posts SET blog_post_status='published' WHERE blog_post_id=$id");
    } else {
      $query = mysqli_query($connection, "UPDATE blog_posts SET blog_post_status='draft' WHERE blog_post_id=$id");
    }
    return true;
  }
  else{
    return false;
  }
}




 ?>
