<!DOCTYPE html>
<html>
<head>
	<title>PVC login and signup</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	   <link rel="stylesheet" href="css/bootstrap.css">
      <link rel="stylesheet" href="css/style.css">

	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	-->
	<link rel="icon" type="image/png" href="images/pvc.png">
</head>
<style>
		.form{
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;

	}
	.form button{
		width: 400px;
	}
		#signup{
		
		border-radius: 30px;
		background-color: #414141;
		border-color: white;
		color: #09aaff;
	}
	#login{
		border-radius: 30px;
		background-color: #414141;
		border-color: white;
		color: #09aaff;
	}

</style>
<body>


		
		<form class="form " method="post" action="" role="form" autocomplete="off">	
			<br><br><br><h4>
				<strong style="color: #09aaff;">Join PVC Today.</strong>
			</h4><br><br>
			<div class="form-group">
				<button id="signup" class="form-control btn btn-primary " name="signup">Sign up</button><br><br></div>
				<?php
					if(isset($_POST['signup'])){
						echo "<script>window.open('includes/signup.php','_self')</script>";
					}
				?>
				<div class="form-group">
				<button id="login" class="form-control btn btn-primary" name="login">Login</button><br><br>
				</div>
				<?php
					if(isset($_POST['login'])){
						echo "<script>window.open('includes/signin.php','_self')</script>";
					}
				?>
			</form>
		

</body>
</html>