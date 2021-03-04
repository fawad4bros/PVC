<?php

	if(isset($_POST['search'])){
	$search = $_POST['search'];
	$query = "SELECT * FROM blog_posts WHERE blog_post_tags LIKE '%$search%'";
	$result = mysqli_query($connection,$query);
	$found = mysqli_num_rows($result);
	if($found == 0){
		echo "<div class='alert alert-danger'>No search result found</div>";
	}else{
  while ($row = mysqli_fetch_assoc($result)) {
  $post_id = $row['blog_post_id'];
  $post_title = $row['blog_post_title'];
  $post_author = $row['blog_post_author'];
  $post_category = $row['blog_post_cat_title'];
  $post_category_id = $row['blog_post_cat_id'];
  $post_content = $row['blog_post_content'];
  $post_tags = $row['blog_post_tags'];
  $post_status =$row['blog_post_status'];
  $post_image =$row['blog_post_image'];
  $date = $row['blog_post_date'];
  $post_views =  $row['blog_post_views'];
  $post_comment_count = $row['blog_post_comment_count'];
?>



<div class="col-md-6">
  <a href="./bs_single.php?post=<?php echo $post_id;  ?>" class="blog-entry element-animate" data-animate-effect="fadeIn">
    <img src="images/<?php echo $post_image ; ?>" alt="Image placeholder">
    <div class="blog-content-body">
      <div class="post-meta">
        <span class="author mr-2"><?php echo $post_author ; ?></span>&bullet;
        <span class="mr-2"><?php echo $date ; ?></span>&bullet;
        <span class="ml-2"><span class="fa fa-comments"></span><?php echo $post_comment_count ; ?></span>
      </div>
      <h2><?php echo $post_title ; ?></h2>
    </div>
  </a>
</div>
<?php
}

	}
	}

 ?>