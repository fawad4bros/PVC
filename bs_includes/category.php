<?php
$query= "SELECT * FROM blog_categories ORDER BY blog_cat_id DESC LIMIT 6";
$result = mysqli_query($connection,$query);

?>
<div class="sidebar-box">
  <h3 class="heading">Categories</h3>
  <ul class="categories">
  	<?php 

  	while ($row = mysqli_fetch_array($result)) {
  		$cat_id = $row['blog_cat_id'];
  		$cat_title = $row['blog_cat_title'];
  		$sql = mysqli_query($connection, "SELECT * FROM blog_posts WHERE blog_post_cat_id=$cat_id");
  		$totalpostsincat = mysqli_num_rows($sql);
  		echo "<li><a href='category.php?cat_id=$cat_id'>$cat_title<span>($totalpostsincat)</span></a></li>";
  	}

  	 ?>

  </ul>
</div>
