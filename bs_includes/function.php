<?php 
include "bs_admin/includes/db.php"; 
function show_cat(){
	global $connection;
	$query = "SELECT * FROM blog_categories";
	$result = mysqli_query($connection,$query);
	while ($row=mysqli_fetch_array($result)) {
		$cat_id = $row['blog_cat_id'];
		$cat_title = $row['blog_cat_title']; 
		echo "<li class='nav-item dropdown'>
		<a class='nav-link' href='category.php?cat_id=$cat_id'>{$cat_title}</a>
          </li>";
	}


}





?>