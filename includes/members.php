<!DOCTYPE html>
<?php
session_start();
include("header.php");

if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
?>
<html>
<head>

	<title>Find people</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../bootstrap3/css/bootstrap.min.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="../style/home_style2.css">
	<style type="text/css">
		
	</style>
</head>
<body>
<div class="row">
	<div class="col-sm-12">
		<center><h2 style="color:#09aaff; ">Find New People</h2></center><br><br>
		<div class="row">
			<div class="col-sm-4">
				
			</div>
			<div class="col-sm-4">
				<center>
				<form class="search_form" action="">
					<input style="color:#09aaff; border-color: #09aaff; background-color: #414141;" type="text" placeholder="Search Friend" name="search_user">
					<button style="color:#09aaff; border-color: #09aaff; background-color: #414141;" class="btn btn-info" type="submit" name="search_user_btn">Search</button>
				</form>
				</center>
			</div>
			<div class="col-sm-4">
				
			</div>
		</div><br><br>
		<?php search_user(); ?>
	</div>
</div>
</body>
</html>