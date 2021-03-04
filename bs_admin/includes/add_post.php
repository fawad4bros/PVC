<?php 

 $sql = "SELECT * FROM blog_categories";
 $res = mysqli_query($connection, $sql);

?>

<h2>Add Posts</h2>
<div class="container">
<div class="row">
	<div class="col-sm-6 col-lg-7">
	<form action="includes/functions.php" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="">Post Title</label>
		<input type="text" name="title" placeholder="Post Title" class="form-control">
	</div>
	<div class="form-group">
		<label for="">Post Author</label>
		<input type="text" value="<?php echo $_SESSION['username'];?>" name="author" placeholder="Post Author" class="form-control" >
	</div>
	<div class="form-group">
		<label for="">Post Category</label>
		<select class="form-control" name="category">
			<?php 
			$sql = "SELECT * FROM blog_categories";
			$res = mysqli_query($connection,$sql);
			while($row = mysqli_fetch_array($res)){
				$cat_title = $row['blog_cat_title'];
				echo "<option value='$cat_title'>$cat_title</option>";
			}

			?>
		</select>
	</div>

	<div class="form-group">
		<label for="">Post Content</label>
		<textarea name="content" rows="8" cols="80" class="form-control" ></textarea>
	</div>
	<div class="form-group">
		<label for="">Post Tags</label>
		<input type="text" name="tags" placeholder="Seperate tags with a comma(,) " class="form-control">
	</div>
	<div class="form-group">
		<label for="">Post Status</label>
		<select class="form-control" name="status">
			<option value="draft">Draft</option>
			<option value="published">Published</option>
		</select>
	</div>	
	<div class="form-group">
		<label for="">Post image</label>
		<input type="file" name="post_image" class="form-control">
	</div>
			<div class="form-group">
		<label for="">Upload file</label>
		<input type="file" name="myfile" class="form-control">
	</div>
		<div class="form-group">

		<input type="submit" name="publish" value="Publish Post" class="btn btn-primary">
	</div>
</form>	
	</div>
</div>

</div>
