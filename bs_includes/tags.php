<?php
$query= "SELECT * FROM blog_posts ORDER BY blog_post_id LIMIT 5";
$result = mysqli_query($connection,$query);
$totalpostsincat = mysqli_num_rows($result);
?>

<div class="sidebar-box">
  <h3 class="heading">Tags</h3>
  <ul class="tags">
  	<?php  

  	while ($row = mysqli_fetch_assoc($result)) {
  		$tags = $row['blog_post_tags'];
  		echo"<li><a href=''>$tags</a></li>";
  	}

  	 ?>
    <li><a href="#">Travel</a></li>
  </ul>
</div>
