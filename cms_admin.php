<?php 

//	include 'includes/header.php';
include "bs_admin/includes/db.php";
	$query = mysqli_query($connection,"SELECT * FROM blog_users");
	if(mysqli_num_rows($query) === 0){
		include 'cms_admin/create_admin.php';
	}else{
		include 'cms_admin/login.php';
	}

 ?>