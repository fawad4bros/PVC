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
	<?php
		$user = $_SESSION['user_email'];
		$get_user = "select * from users where user_email='$user'";
		$run_user = mysqli_query($con,$get_user);
		$row = mysqli_fetch_array($run_user);

		$user_name = $row['user_name'];
	?>
	<title><?php echo "$user_name"; ?></title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../bootstrap3/css/bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="../Style/mystylesheet.css">
</head>
<style>
	body{
	
    
	}
	#cover-img{
		height: 400px;
		width: 100%;
	}#profile-img{
		position: absolute;
		top: 160px;
		left: 40px;
	}
	#update_profile{
		position: relative;
		top: -33px;
		cursor: pointer;
		left:  50%;
		border-radius: 4px;
		background-color: rgba(0,0,0,0.1);
		transform: translate(-50%, -50%);
	}
	#button_profile{
		position: absolute;
		top: 82%;
		left: 30%;
		cursor: pointer;
		transform: translate(-50%, -50%);
	}
	#own_posts{
		border: 5px solid #e6e6e6;
		padding: 40px 50px;
	}
	#post_img{
		height: 300px;
		width: 100%;
	}
	



</style>
<style>
	#own_posts{
		border:5px solid #e6e6e6;
		padding: 40px 50px;
		width: 100%;
	}
	#posts_img{
		height: 300px;
		width: 100%;
	}
	.row{
		margin-right: 0px;
    	margin-left: 0px;
	}
	.col-sm-6 {
    width: 100%;
}
</style>
    <style type="text/css">
    	body{
    margin-top:20px;
}
/* User Cards */
.user-box {
    width: 110px;
    margin: auto;
    margin-bottom: 20px;
    
}

.user-box img {
    width: 100%;
    border-radius: 50%;
	padding: 3px;
	background: #fff;
	-webkit-box-shadow: 0px 5px 25px 0px rgba(0, 0, 0, 0.2);
    -moz-box-shadow: 0px 5px 25px 0px rgba(0, 0, 0, 0.2);
    -ms-box-shadow: 0px 5px 25px 0px rgba(0, 0, 0, 0.2);
    box-shadow: 0px 5px 25px 0px rgba(0, 0, 0, 0.2);
}

.profile-card-2 .card {
	position:relative;
}

.profile-card-2 .card .card-body {
	z-index:1;
}

.profile-card-2 .card::before {
    content: "";
    position: absolute;
    top: 0px;
    right: 0px;
    left: 0px;
	border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
    height: 112px;
    background-color: #e6e6e6;
}

.profile-card-2 .card.profile-primary::before {
	background-color: #008cff;
}
.profile-card-2 .card.profile-success::before {
	background-color: #15ca20;
}
.profile-card-2 .card.profile-danger::before {
	background-color: #fd3550;
}
.profile-card-2 .card.profile-warning::before {
	background-color: #ff9700;
}
.profile-card-2 .user-box {
	margin-top: 30px;
}

.profile-card-3 .user-fullimage {
	position:relative;
}

.profile-card-3 .user-fullimage .details{
	position: absolute;
    bottom: 0;
    left: 0px;
	width:100%;
}

.profile-card-4 .user-box {
    width: 110px;
    margin: auto;
    margin-bottom: 10px;
    margin-top: 15px;
}

.profile-card-4 .list-icon {
    display: table-cell;
    font-size: 30px;
    padding-right: 20px;
    vertical-align: middle;
    color: #223035;
}

.profile-card-4 .list-details {
	display: table-cell;
	vertical-align: middle;
	font-weight: 600;
    color: #223035;
    font-size: 15px;
    line-height: 15px;
}

.profile-card-4 .list-details small{
	display: table-cell;
	vertical-align: middle;
	font-size: 12px;
	font-weight: 400;
    color: #808080;
}

/*Nav Tabs & Pills */
.nav-tabs .nav-link {
    color: #223035;
	font-size: 12px;
    text-align: center;
	letter-spacing: 1px;
    font-weight: 600;
	margin: 2px;
    margin-bottom: 0;
	padding: 12px 20px;
    text-transform: uppercase;
    border: 1px solid transparent;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
	
}
.nav-tabs .nav-link:hover{
    border: 1px solid transparent;
}
.nav-tabs .nav-link i {
    margin-right: 2px;
	font-weight: 600;
}

.top-icon.nav-tabs .nav-link i{
	margin: 0px;
	font-weight: 500;
	display: block;
    font-size: 20px;
    padding: 5px 0;
}

.nav-tabs-primary.nav-tabs{
	border-bottom: 1px solid #008cff;
}

.nav-tabs-primary .nav-link.active, .nav-tabs-primary .nav-item.show>.nav-link {
    color: #008cff;
    background-color: #fff;
    border-color: #008cff #008cff #fff;
    border-top: 3px solid #008cff;
}

.nav-tabs-success.nav-tabs{
	border-bottom: 1px solid #15ca20;
}

.nav-tabs-success .nav-link.active, .nav-tabs-success .nav-item.show>.nav-link {
    color: #15ca20;
    background-color: #fff;
    border-color: #15ca20 #15ca20 #fff;
    border-top: 3px solid #15ca20;
}

.nav-tabs-info.nav-tabs{
	border-bottom: 1px solid #0dceec;
}

.nav-tabs-info .nav-link.active, .nav-tabs-info .nav-item.show>.nav-link {
    color: #0dceec;
    background-color: #fff;
    border-color: #0dceec #0dceec #fff;
    border-top: 3px solid #0dceec;
}

.nav-tabs-danger.nav-tabs{
	border-bottom: 1px solid #fd3550;
}

.nav-tabs-danger .nav-link.active, .nav-tabs-danger .nav-item.show>.nav-link {
    color: #fd3550;
    background-color: #fff;
    border-color: #fd3550 #fd3550 #fff;
    border-top: 3px solid #fd3550;
}

.nav-tabs-warning.nav-tabs{
	border-bottom: 1px solid #ff9700;
}

.nav-tabs-warning .nav-link.active, .nav-tabs-warning .nav-item.show>.nav-link {
    color: #ff9700;
    background-color: #fff;
    border-color: #ff9700 #ff9700 #fff;
    border-top: 3px solid #ff9700;
}

.nav-tabs-dark.nav-tabs{
	border-bottom: 1px solid #223035;
}

.nav-tabs-dark .nav-link.active, .nav-tabs-dark .nav-item.show>.nav-link {
    color: #223035;
    background-color: #fff;
    border-color: #223035 #223035 #fff;
    border-top: 3px solid #223035;
}

.nav-tabs-secondary.nav-tabs{
	border-bottom: 1px solid #75808a;
}
.nav-tabs-secondary .nav-link.active, .nav-tabs-secondary .nav-item.show>.nav-link {
    color: #75808a;
    background-color: #fff;
    border-color: #75808a #75808a #fff;
    border-top: 3px solid #75808a;
}

.tabs-vertical .nav-tabs .nav-link {
    color: #223035;
    font-size: 12px;
    text-align: center;
    letter-spacing: 1px;
    font-weight: 600;
    margin: 2px;
    margin-right: -1px;
    padding: 12px 1px;
    text-transform: uppercase;
    border: 1px solid transparent;
    border-radius: 0;
    border-top-left-radius: .25rem;
    border-bottom-left-radius: .25rem;
}

.tabs-vertical .nav-tabs{
	border:0;
	border-right: 1px solid #dee2e6;
}

.tabs-vertical .nav-tabs .nav-item.show .nav-link, .tabs-vertical .nav-tabs .nav-link.active {
    color: #495057;
    background-color: #fff;
    border-color: #dee2e6 #dee2e6 #fff;
    border-bottom: 1px solid #dee2e6;
    border-right: 0;
    border-left: 1px solid #dee2e6;
}

.tabs-vertical-primary.tabs-vertical .nav-tabs{
	border:0;
	border-right: 1px solid #008cff;
}

.tabs-vertical-primary.tabs-vertical .nav-tabs .nav-item.show .nav-link, .tabs-vertical-primary.tabs-vertical .nav-tabs .nav-link.active {
    color: #008cff;
    background-color: #fff;
    border-color: #008cff #008cff #fff;
    border-bottom: 1px solid #008cff;
    border-right: 0;
    border-left: 3px solid #008cff;
}

.tabs-vertical-success.tabs-vertical .nav-tabs{
	border:0;
	border-right: 1px solid #15ca20;
}

.tabs-vertical-success.tabs-vertical .nav-tabs .nav-item.show .nav-link, .tabs-vertical-success.tabs-vertical .nav-tabs .nav-link.active {
    color: #15ca20;
    background-color: #fff;
    border-color: #15ca20 #15ca20 #fff;
    border-bottom: 1px solid #15ca20;
    border-right: 0;
    border-left: 3px solid #15ca20;
}

.tabs-vertical-info.tabs-vertical .nav-tabs{
	border:0;
	border-right: 1px solid #0dceec;
}

.tabs-vertical-info.tabs-vertical .nav-tabs .nav-item.show .nav-link, .tabs-vertical-info.tabs-vertical .nav-tabs .nav-link.active {
    color: #0dceec;
    background-color: #fff;
    border-color: #0dceec #0dceec #fff;
    border-bottom: 1px solid #0dceec;
    border-right: 0;
    border-left: 3px solid #0dceec;
}

.tabs-vertical-danger.tabs-vertical .nav-tabs{
	border:0;
	border-right: 1px solid #fd3550;
}

.tabs-vertical-danger.tabs-vertical .nav-tabs .nav-item.show .nav-link, .tabs-vertical-danger.tabs-vertical .nav-tabs .nav-link.active {
    color: #fd3550;
    background-color: #fff;
    border-color: #fd3550 #fd3550 #fff;
    border-bottom: 1px solid #fd3550;
    border-right: 0;
    border-left: 3px solid #fd3550;
}

.tabs-vertical-warning.tabs-vertical .nav-tabs{
	border:0;
	border-right: 1px solid #ff9700;
}

.tabs-vertical-warning.tabs-vertical .nav-tabs .nav-item.show .nav-link, .tabs-vertical-warning.tabs-vertical .nav-tabs .nav-link.active {
    color: #ff9700;
    background-color: #fff;
    border-color: #ff9700 #ff9700 #fff;
    border-bottom: 1px solid #ff9700;
    border-right: 0;
    border-left: 3px solid #ff9700;
}

.tabs-vertical-dark.tabs-vertical .nav-tabs{
	border:0;
	border-right: 1px solid #223035;
}

.tabs-vertical-dark.tabs-vertical .nav-tabs .nav-item.show .nav-link, .tabs-vertical-dark.tabs-vertical .nav-tabs .nav-link.active {
    color: #223035;
    background-color: #fff;
    border-color: #223035 #223035 #fff;
    border-bottom: 1px solid #223035;
    border-right: 0;
    border-left: 3px solid #223035;
}

.tabs-vertical-secondary.tabs-vertical .nav-tabs{
	border:0;
	border-right: 1px solid #75808a;
}

.tabs-vertical-secondary.tabs-vertical .nav-tabs .nav-item.show .nav-link, .tabs-vertical-secondary.tabs-vertical .nav-tabs .nav-link.active {
    color: #75808a;
    background-color: #fff;
    border-color: #75808a #75808a #fff;
    border-bottom: 1px solid #75808a;
    border-right: 0;
    border-left: 3px solid #75808a;
}

.nav-pills .nav-link {
    border-radius: .25rem;
    color: #223035;
    font-size: 12px;
    text-align: center;
	letter-spacing: 1px;
    font-weight: 600;
    text-transform: uppercase;
	margin: 3px;
    padding: 12px 20px;
	-webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease; 

}

.nav-pills .nav-link:hover {
    background-color:#f4f5fa;
}

.nav-pills .nav-link i{
	margin-right:2px;
	font-weight: 600;
}

.top-icon.nav-pills .nav-link i{
	margin: 0px;
	font-weight: 500;
	display: block;
    font-size: 20px;
    padding: 5px 0;
}

.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #fff;
    background-color: #008cff;
    box-shadow: 0 4px 20px 0 rgba(0,0,0,.14), 0 7px 10px -5px rgba(0, 140, 255, 0.5);
}

.nav-pills-success .nav-link.active, .nav-pills-success .show>.nav-link {
    color: #fff;
    background-color: #15ca20;
    box-shadow: 0 4px 20px 0 rgba(0,0,0,.14), 0 7px 10px -5px rgba(21, 202, 32, .5);
}

.nav-pills-info .nav-link.active, .nav-pills-info .show>.nav-link {
    color: #fff;
    background-color: #0dceec;
    box-shadow: 0 4px 20px 0 rgba(0,0,0,.14), 0 7px 10px -5px rgba(13, 206, 236, 0.5);
}

.nav-pills-danger .nav-link.active, .nav-pills-danger .show>.nav-link{
    color: #fff;
    background-color: #fd3550;
    box-shadow: 0 4px 20px 0 rgba(0,0,0,.14), 0 7px 10px -5px rgba(253, 53, 80, .5);
}

.nav-pills-warning .nav-link.active, .nav-pills-warning .show>.nav-link {
    color: #fff;
    background-color: #ff9700;
    box-shadow: 0 4px 20px 0 rgba(0,0,0,.14), 0 7px 10px -5px rgba(255, 151, 0, .5);
}

.nav-pills-dark .nav-link.active, .nav-pills-dark .show>.nav-link {
    color: #fff;
    background-color: #223035;
    box-shadow: 0 4px 20px 0 rgba(0,0,0,.14), 0 7px 10px -5px rgba(34, 48, 53, .5);
}

.nav-pills-secondary .nav-link.active, .nav-pills-secondary .show>.nav-link {
    color: #fff;
    background-color: #75808a;
    box-shadow: 0 4px 20px 0 rgba(0,0,0,.14), 0 7px 10px -5px rgba(117, 128, 138, .5);
}
.card .tab-content{
	padding: 1rem 0 0 0;
}

.z-depth-3 {
    -webkit-box-shadow: 0 11px 7px 0 rgba(0,0,0,0.19),0 13px 25px 0 rgba(0,0,0,0.3);
    box-shadow: 0 11px 7px 0 rgba(0,0,0,0.19),0 13px 25px 0 rgba(0,0,0,0.3);
}
    </style>
<body>
<div class="row">
	<div class="col-sm-2">	
	</div>
	<div class="col-sm-8">
		<?php
			echo"
			<div>
				<div><img id='cover-img' class='img-rounded' src='../cover/$user_cover' alt='cover'></div>
				


				<form action='profile.php?u_id=$user_id' method='post' enctype='multipart/form-data'>

				<ul class='nav pull-left' style='position:absolute;top:10px;left:40px;'>
					<li class='dropdown'>
						
						<button class='dropdown-toggle btn btn-default' data-toggle='dropdown'>Choose Cover</button>


						<div class='dropdown-menu'>

							<center>
							<label class='btn btn-info'> Select Cover
							<input type='file' name='u_cover' size='60' />
							</label><br><br>
							<button name='submit' class='btn btn-info'>Update Cover</button>
							</center>

						</div>
					</li>
				</ul>

				</form>

			



			</div>
			<div id='profile-img'>
				<img src='../users/$user_image' alt='Profile' class='img-circle' width='180px' height='185px'>
				<form action='profile.php?u_id='$user_id' method='post' enctype='multipart/form-data'>
				<div class='row'>
				<label id='update_profile'> Select Profile
				<input type='file' name='u_image' size='60' />
				</label>
				<button id='button_profile' name='update' class='btn btn-info'>Update Profile Picture</button>
				</div>
				</form>
			</div><br>
			";
		?>
		<?php

			if(isset($_POST['submit'])){

				$u_cover = $_FILES['u_cover']['name'];
				$image_tmp = $_FILES['u_cover']['tmp_name'];
				$random_number = rand(1,100);

				if($u_cover==''){
					echo "<script>alert('Please Select Cover Image')</script>";
					echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
					exit();
				}else{
					move_uploaded_file($image_tmp, "../cover/$random_number.$u_cover");
					$update = "update users set user_cover='$random_number.$u_cover' where user_id='$user_id'";

					$run = mysqli_query($con, $update);

					if($run){
					
					echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
					}
				}

			}

		?>
	</div>


	<?php
		if(isset($_POST['update'])){

				$u_image = $_FILES['u_image']['name'];
				$image_tmp = $_FILES['u_image']['tmp_name'];
				$random_number = rand(1,100);

				if($u_image==''){
					echo "<script>alert('Please Select Profile Image on clicking on your profile image')</script>";
					echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
					exit();
				}else{
					move_uploaded_file($image_tmp, "../users/$random_number.$u_image");
					$update = "update users set user_image='$random_number.$u_image' where user_id='$user_id'";

					$run = mysqli_query($con, $update);

					if($run){
					
					echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
					}
				}

			}
	?>
	<div class="col-sm-2">
	</div>
</div>



	<div class='container'>
	<div class="row">
        <div class='col-md-6 col-xs-12'>
           <div class='profile-card-4 z-depth-3'>
            <div class='card'>
		<?php
		echo"
		      <div class='card-body'>
                <ul class='list-group shadow-none'>
               <li class='list-group-item'>
                  <div class='list-icon'>
                    <i class='fa fa-phone-square'></i>
                  </div>
                  <div class='list-details'>
                    <span>First Name</span>
                    <small>$first_name</small>
                  </div>
                </li>
               <li class='list-group-item'>
                  <div class='list-icon'>
                    <i class='fa fa-phone-square'></i>
                  </div>
                  <div class='list-details'>
                    <span>Last Name</span>
                    <small>$last_name</small>
                  </div>
                </li>
               <li class='list-group-item'>
                  <div class='list-icon'>
                    <i class='fa fa-phone-square'></i>
                  </div>
                  <div class='list-details'>
                    <span>Relationship Status</span>
                    <small> $Relationship_status</small>
                  </div>
                </li>
                <li class='list-group-item'>
                  <div class='list-icon'>
                    <i class='fa fa-phone-square'></i>
                  </div>
                  <div class='list-details'>
                    <span>About</span>
                    <small>$describe_user</small>
                  </div>
                </li>
                <li class='list-group-item'>
                  <div class='list-icon'>
                    <i class='fa fa-envelope'></i>
                  </div>
                  <div class='list-details'>
                    <span>Gender</span>
                    <small>$user_gender</small>
                  </div>
                </li>
                <li class='list-group-item'>
                  <div class='list-icon'>
                    <i class='fa fa-envele'></i>
                  </div>
                  <div class='list-details'>
                    <span>From</span>
                    <small>$user_country</small>
                  </div>
                </li>
                <li class='list-group-item'>
                  <div class='list-icon'>
                    <i class='fa fa-globe'></i>
                  </div>
                  <div class='list-details'>
                    <span>Member since</span>
                    <small>$register_date</small>
                  </div>
                </li>
                </ul>
               </div>

		";
		?>
	</div>
           </div>
        </div>
<!-- Display user posts on user profile-->
<div class="col-md-6 col-xs-12">
	           <div class="card z-depth-3">
            <div class="card-body">
		
<?php
	global $con;
	if(isset($_GET['u_id'])){
		$u_id = $_GET['u_id'];
	}
	$get_posts = "select * from posts where user_id ='$u_id' ORDER by 1 DESC LIMIT 5";
	$run_posts = mysqli_query($con, $get_posts);
	while ($row_posts = mysqli_fetch_array($run_posts)){
		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$content = $row_posts['post_content'];
		$upload_image = $row_posts['upload_image'];
		$post_date = $row_posts['post_date'];
		$user = "select * from users where user_id = '$user_id' AND posts='yes'";
		$run_user = mysqli_query($con,$user);
		$row_user = mysqli_fetch_array($run_user);
		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];
		// now Display the Posts
		if($content == "NO" && strlen($upload_image) >= 1){
			echo"
<div class='container bootstrap snippets bootdey'>
  <div class=' col-md-6 col-xs-12'>
    <div class='panel panel-white post panel-shadow'>
      <div class='post-heading'>
        <div class='pull-left image'>
          <img src='../users/$user_image' class='img-circle avatar' >
        </div>
          <div class='pull-left meta'>
            <div class='title h5'>
              <a href='user_profile.php?u_id=$user_id'><b>$user_name</b></a>
            </div>
              <h6 class='text-muted time'>$post_date</h6>
          </div>
      </div> 
      <div class='post-description'> 
        
        <div class='stats'>
          <img id='posts-img' src='../imagepost/$upload_image' style='height:350px;'>

          </div>";
          $user_id = $_GET['u_id'];
          	$user = $_SESSION['user_email'];
	$get_user = "select * from users where user_email='$user'";
	$run_user = mysqli_query($con, $get_user);
	$row = mysqli_fetch_array($run_user);
	$userown_id = $row['user_id'];
	if($user_id == $userown_id){
         echo" <div class='stats'>
          	
          	<a href='../functions/delete_post.php?post_id=$post_id' class='btn btn-default stat-item'>Delete</a>
            <a href='edit_post.php?post_id=$post_id' class='btn btn-default stat-item'>Edit</a>
            
            <a href='single.php?post_id=$post_id' class='btn btn-default stat-item'>View</a>        
            <a href='single.php?post_id=$post_id' class='btn btn-default stat-item'>Comment</a>
          </div>
        ";
    }
        else{
         echo" <div class='stats'>
            <a href='single.php?post_id=$post_id' class='btn btn-default stat-item'>View</a>        
            <a href='single.php?post_id=$post_id' class='btn btn-default stat-item'>Comment</a>
          </div>
        ";
        }
         echo"
      </div>
    </div>
  </div>
</div>
		";
		}


			else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
			echo"
<div class='container bootstrap snippets bootdey'>
  <div class='col-md-6 col-xs-12'>
    <div class='panel panel-white post panel-shadow'>
      <div class='post-heading'>
        <div class='pull-left image'>
          <img src='../users/$user_image' class='img-circle avatar' >
        </div>
          <div class='pull-left meta'>
            <div class='title h5'>
              <a href='user_profile.php?u_id=$user_id'><b>$user_name</b></a>
            </div>
              <h6 class='text-muted time'>$post_date</h6>
          </div>
      </div> 
      <div class='post-description'> 
        <p>$content</p>
        
          <div class='stats'>
          <img id='posts-img' src='../imagepost/$upload_image' style='height:350px;'>

          </div>

  ";
          $user_id = $_GET['u_id'];
          	$user = $_SESSION['user_email'];
	$get_user = "select * from users where user_email='$user'";
	$run_user = mysqli_query($con, $get_user);
	$row = mysqli_fetch_array($run_user);
	$userown_id = $row['user_id'];
	if($user_id == $userown_id){
         echo" <div class='stats'>
          	
          	<a href='../functions/delete_post.php?post_id=$post_id' class='btn btn-default stat-item'>Delete</a>
            <a href='edit_post.php?post_id=$post_id' class='btn btn-default stat-item'>Edit</a>
            
            <a href='single.php?post_id=$post_id' class='btn btn-default stat-item'>View</a>        
            <a href='single.php?post_id=$post_id' class='btn btn-default stat-item'>Comment</a>
          </div>
        ";
    }
        else{
         echo" <div class='stats'>
            <a href='single.php?post_id=$post_id' class='btn btn-default stat-item'>View</a>        
            <a href='single.php?post_id=$post_id' class='btn btn-default stat-item'>Comment</a>
          </div>
        ";
        }
         echo"
      </div>
    </div>
  </div>
</div>
		

			";
		}

			else{
			echo"
<div class='container bootstrap snippets bootdey'>
  <div class=' col-md-6 col-xs-12'>
    <div class='panel panel-white post panel-shadow'>
      <div class='post-heading'>
        <div class='pull-left image'>
          <img src='../users/$user_image' class='img-circle avatar' >
        </div>
          <div class='pull-left meta'>
            <div class='title h5'>
              <a href='user_profile.php?u_id=$user_id'><b>$user_name</b></a>
            </div>
              <h6 class='text-muted time'>$post_date</h6>
          </div>
      </div> 
      <div class='post-description'> 
        <p>$content</p>
       ";
          $user_id = $_GET['u_id'];
          	$user = $_SESSION['user_email'];
	$get_user = "select * from users where user_email='$user'";
	$run_user = mysqli_query($con, $get_user);
	$row = mysqli_fetch_array($run_user);
	$userown_id = $row['user_id'];
	if($user_id == $userown_id){
         echo" <div class='stats'>
          	
          	<a href='../functions/delete_post.php?post_id=$post_id' class='btn btn-default stat-item'>Delete</a>
            <a href='edit_post.php?post_id=$post_id' class='btn btn-default stat-item'>Edit</a>
            
            <a href='single.php?post_id=$post_id' class='btn btn-default stat-item'>View</a>        
            <a href='single.php?post_id=$post_id' class='btn btn-default stat-item'>Comment</a>
          </div>
        ";
    }
        else{
         echo" <div class='stats'>
            <a href='single.php?post_id=$post_id' class='btn btn-default stat-item'>View</a>        
            <a href='single.php?post_id=$post_id' class='btn btn-default stat-item'>Comment</a>
          </div>
        ";
        }
         echo"
      </div>
    </div>
  </div>
</div>
		

			";






		}

		include("../functions/delete_post.php");

	}

?>
	

</div>
</div>
</div>




</div>
</div>


	<div class="col-sm-2">
		

	</div>



</body>
</html>