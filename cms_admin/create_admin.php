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

<form class="form" action="bs_includes/form_handler/create.php" method="post" role="form" autocomplete="off">
	<h3>Create a new admin</h3>
	<div class="form-group">
		<label>Username</label>
		<input type="text" name="username" placeholder="User Name" class="form-control">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" placeholder="Email" class="form-control">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="text" name="password" placeholder="User Password" class="form-control">
		Suggested Passwords:<br>
		<i><?php echo uniqid(); ?></i>
		<br>
		<i><?php echo uniqid(); ?></i>
	</div>
	<div class="form-group">
		<input type="submit" name="create_submit" value="Continue" class="btn btn-primary">
	</div>	
</form>