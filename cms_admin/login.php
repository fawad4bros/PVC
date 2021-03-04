<head>
	      <link rel="stylesheet" href="css/bootstrap.css">
      <link rel="stylesheet" href="css/style.css">
</head>
<style>

	.form{
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;

	}
	.form input{
		width: 400px;
	}
</style>

<form class="form " action="bs_includes/form_handler/login.php" method="post" role="form" autocomplete="off">
	<h3>Login</h3>

	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" placeholder="Email" class="form-control">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password" placeholder="User Password" class="form-control">
	</div>
	<div class="form-group">
		<input type="submit" name="login_submit" value="Login" class="btn btn-primary">
	</div>	
</form>