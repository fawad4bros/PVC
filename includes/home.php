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
	<link rel="stylesheet" type="text/css" href="../Style/mystylesheet.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--
	

	-->
	
	  
	    <style type="text/css">


.well-social-post {
    border-radius: 0;
    background-color: #ffffff;
    border: 1px solid #ddd;
    padding:0;
}

.well-social-post .glyphicon,
.well-social-post .fa,
.well-social-post [class^='icon-'],
.well-social-post [class*='icon-'] {
    font-weight: bold;
    color: #999999;
}

.well-social-post a,
.well-social-post a:hover,
.well-social-post a:active,
.well-social-post a:focus {
    text-decoration: none;
}

.well-social-post .list-inline {
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
}

.well-social-post .list-inline li {
    position: relative;
}

.well-social-post .list-inline li.active::after {
    position: absolute;
    display: block;
    width: 0;
    height: 0;
    content: "";
    top: 30px;
    left: 50%;
    left: -webkit-calc(50% - 5px);
    left: -moz-calc(50%-5px);
    left: calc(50% - 5px);
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-top: 5px solid #dddddd;
}

.well-social-post .list-inline li.active a {
    color: #222222;
    font-weight: bold;
}

.well-social-post .form-control {
    width: 100%;
    min-height: 100px;
    border: none;
    border-radius: 0;
    box-shadow: none;
}

.well-social-post .list-inline {
    padding: 10px;
}

.well-social-post .list-inline li + li {
    margin-left: 10px;
}

.well-social-post .post-actions {
    margin: 0;
    background-color: #f6f7f8;
    border-top-color: #e9eaed;
} 
.GB{
	color: #09aaff;
	border-style: solid;
	border-color: #09aaff; 
	background-color: #414141;
}    


    </style>
</head>
<body>




<div class="container bootstrap snippets bootdey">
    <div class="row">
        <div class="col-md-offset-3 col-md-6 col-xs-12">
            <div  class="well well-sm well-social-post GB">
        <form action="home.php?id=<?php echo $user_id; ?>" method="post" id="f" enctype="multipart/form-data">
            <ul class="list-inline" id='list_PostActions'>
                <li class='active'>Status</li>
            </ul>
            <textarea name="content" class="form-control GB" placeholder="What's in your mind?"></textarea>
            <ul class='list-inline post-actions GB'>
                <li><input class="inputfile" type="file" name="upload_image" size="60"></li>
                <li class="pull-right"><button  class="btn btn-primary btn-xs " name="sub">Post</button></li>
                
            </ul>
        </form>
        <?php insertPost(); ?>
            </div>
        </div>
    </div>
</div>      

















<div class="row">
	<div class="col-sm-12">
		<center><h2 style="color:#09aaff;">News Feed</h2><br></center>
		<?php echo get_posts(); ?>
	</div>
</div>

</body>
</html>