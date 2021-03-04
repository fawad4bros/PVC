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

	<title>Messages</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../bootstrap3/css/bootstrap.min.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="../style/home_style2.css">
</head>
<style>
	
#scroll_messages{
	max-height: 500px;

	overflow: scroll;
	overflow-x: hidden;
}
#btn-msg{
	width: 20%;
	height: 28px;
	border-radius: 5px;
	margin: 5px;
	border: none;
	color: #fff;
	float: right;
	background-color: #2ecc71; 
}
#select_user{
	max-height: 500px;
	overflow: scroll;
}
#green{
	background-color: #2ecc71;
	border-color: #27ae60;
	width: 45%;
	padding: 2.5px;
	font-size: 16px;
	border-radius: 3px;
	float: left;
	margin-bottom: 5px;
}
#blue{
		background-color: #3498db;
	border-color: #2980b9;
	width: 45%;
	padding: 2.5px;
	font-size: 16px;
	border-radius: 3px;
	float: right;
	margin-bottom: 5px;
}

</style>
    <style type="text/css">
                          

 .portlet {
    margin-bottom: 15px;
}

.btn-white {
    border-color: #cccccc;
    color: #333333;
    background-color: #ffffff;
}

.portlet {
    border: 1px solid;
}

.portlet .portlet-heading {
    padding: 0 15px;
}

.portlet .portlet-heading h4 {
    padding: 1px 0;
    font-size: 16px;
}

.portlet .portlet-heading a {
    color: #fff;
}

.portlet .portlet-heading a:hover,
.portlet .portlet-heading a:active,
.portlet .portlet-heading a:focus {
    outline: none;
}

.portlet .portlet-widgets .dropdown-menu a {
    color: #333;
}

.portlet .portlet-widgets ul.dropdown-menu {
    min-width: 0;
}

.portlet .portlet-heading .portlet-title {
    float: left;
}

.portlet .portlet-heading .portlet-title h4 {
    margin: 10px 0;
}

.portlet .portlet-heading .portlet-widgets {
    float: right;
    margin: 8px 0;
}

.portlet .portlet-heading .portlet-widgets .tabbed-portlets {
    display: inline;
}

.portlet .portlet-heading .portlet-widgets .divider {
    margin: 0 5px;
}

.portlet .portlet-body {
    padding: 15px;
    background: #fff;
}

.portlet .portlet-footer {
    padding: 10px 15px;
    background: #e0e7e8;
}

.portlet .portlet-footer ul {
    margin: 0;
}

.portlet-green,
.portlet-green>.portlet-heading {
    border-color: #16a085;
}

.portlet-green>.portlet-heading {
    color: #fff;
    background-color: #16a085;
}

.portlet-orange,
.portlet-orange>.portlet-heading {
    border-color: #f39c12;
}

.portlet-orange>.portlet-heading {
    color: #fff;
    background-color: #f39c12;
}

.portlet-blue,
.portlet-blue>.portlet-heading {
    border-color: #2980b9;
}

.portlet-blue>.portlet-heading {
    color: #fff;
    background-color: #2980b9;
}

.portlet-red,
.portlet-red>.portlet-heading {
    border-color: #e74c3c;
}

.portlet-red>.portlet-heading {
    color: #fff;
    background-color: #e74c3c;
}

.portlet-purple,
.portlet-purple>.portlet-heading {
    border-color: #8e44ad;
}

.portlet-purple>.portlet-heading {
    color: #fff;
    background-color: #8e44ad;
}

.portlet-default,
.portlet-dark-blue,
.portlet-default>.portlet-heading,
.portlet-dark-blue>.portlet-heading {
    border-color: #34495e;
}

.portlet-default>.portlet-heading,
.portlet-dark-blue>.portlet-heading {
    color: #fff;
    background-color: #34495e;
}

.portlet-basic,
.portlet-basic>.portlet-heading {
    border-color: #333;
}

.portlet-basic>.portlet-heading {
    border-bottom: 1px solid #333;
    color: #333;
    background-color: #fff;
}

@media(min-width:768px) {
    .portlet {
        margin-bottom: 30px;
    }
}

.img-chat{
width:40px;
height:40px;
}

.text-green {
    color: #16a085;
}

.text-orange {
    color: #f39c12;
}

.text-red {
    color: #e74c3c;
}                
    </style>
<body>
<div class="row">
	<?php   

	if(isset($_GET['u_id'])){
	global $con;
	
	$get_id = $_GET['u_id'];
	
	$get_user = "select * from users where user_id = '$get_id'";
	
	$run_user = mysqli_query($con,$get_user);
	$row_user = mysqli_fetch_array($run_user);
	
	$user_to_msg = $row_user['user_id'];
	$user_to_name = $row_user['user_name'];
}
	$user = $_SESSION['user_email'];
	$get_user = "select * from users where user_email = '$user'";
	$run_user = mysqli_query($con, $get_user);
	$row = mysqli_fetch_array($run_user);
	
	$user_from_msg = $row['user_id'];
	$user_from_name = $row['user_name'];
	$user_from_image = $row['user_image'];

	?>
	<div class="col-sm-2"></div>
	<div class="col-sm-2" id="select_user ">
		<?php  

		$user = "select * from users";

		$run_user = mysqli_query($con, $user);
		while($row_user = mysqli_fetch_array($run_user)){

		$user_id = $row_user['user_id'];
		$user_name = $row_user['user_name'];
		$first_name = $row_user['f_name'];
		$last_name = $row_user['l_name'];
		$user_image = $row_user['user_image'];

		echo"

		<div class='container-fluid'>
			<a  style='text-decoration: none; cursor: pointer; color: #3897F0;' href='messages.php?u_id=$user_id'>
			<img class='img-circle' src='../users/$user_image' width='90px' height='80px' title='$user_name'><strong>  &nbsp;  $first_name $last_name</strong><br><br></a>
		</div>

		";
		}

		 ?>
	</div>







	<div class="col-sm-4">
		<div class="load_msg" id="scroll_messages">
			<?php  

			$sel_msg = "select * from user_messages where (user_to='$user_to_msg' AND user_from='$user_from_msg') OR (user_from='$user_to_msg' AND user_to='$user_from_msg') ORDER by 1 ASC";
			$run_msg = mysqli_query($con, $sel_msg);

			while($row_msg = mysqli_fetch_array($run_msg)){
			$user_to = $row_msg['user_to'];
			$user_from = $row_msg['user_from'];
			$msg_body = $row_msg['msg_body'];
			$msg_date = $row_msg['date'];
			?>
			<div id="loaded_msg">





<?php   

	if(isset($_GET['u_id'])){
	global $con;
	
	$get_id = $_GET['u_id'];
	
	$get_user = "select * from users where user_id = '$get_id'";
	$run_user = mysqli_query($con,$get_user);
	$row = mysqli_fetch_array($run_user); 

	$user_id = $row['user_id'];
	$user_name = $row['user_name'];
	$user_imaged = $row['user_image'];

	
}





?>


				<p> <?php 
					if($user_to == $user_to_msg AND $user_from == $user_from_msg){
					echo "
                        <div class='row'>
                            <div class='col-lg-12'>
                                <div class='media'>
                                    <a class='pull-left'>
                                        <img class='media-object img-circle img-chat' src='../users/$user_from_image '>
                                    </a>
                                    <div class='media-body'>
                                        <h4 class='media-heading'>$user_from_name
                                            <span class='small pull-right'>$msg_date</span>
                                        </h4>
                                        <p>$msg_body</p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
					";
				} 
				else if($user_from == $user_to_msg AND $user_to == $user_from_msg){
				echo"
				                 <div class='row'>
                            <div class='col-lg-12'>
                                <div class='media'>
                                    <a class='pull-left'>
                                        <img class='media-object img-circle img-chat' src='../users/$user_imaged'>
                                    </a>
                                    <div class='media-body'>
                                        <h4 class='media-heading'>$user_name
                                            <span class='small pull-right'>$msg_date</span>
                                        </h4>
                                        <p>$msg_body</p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
				";
			}
				?></p>
			</div>
			<?php

		}
			 ?>
			
		</div>
		<?php  

		if(isset($_GET['u_id'])){
		$u_id = $_GET['u_id'];
		if($u_id == "new"){
		echo'

		<form>
			<center><h3>Select someone to start conversation</h3></center>
			<textarea disabled class="form-control" placeholder="Enter your Message"></textarea>
			<input type="submit" class="btn btn-default" disabled value="send">
		</form><br><br>

		';
	}
	else{
	echo'
	<div id="chat" class="panel-collapse collapse in">
                    <div class="portlet-footer">
                        <form action="" method="POST">
                            <div class="form-group">
                                <textarea name="msg_box" class="form-control" placeholder="Enter message..."></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="send_msg" class="btn btn-default pull-right">Send</button>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                     </div>
		';
}
	}

		 ?>

		 <?php  

		 if(isset($_POST['send_msg'])){
		 $msg = htmlentities($_POST['msg_box']);
		 if($msg == ""){
		 echo"
		 	<h4 style='color: red; text-align: center;'> Message was unable to send!</h4>
		 ";
		} else if(strlen($msg) > 37){
		echo"
		 	<h4 style='color: red; text-align: center;'> Message is too long! Use 37 characters</h4>
		 ";
	}else{
	$insert = "insert into user_messages(user_to,user_from,msg_body,date,msg_seen) 
	values('$user_to_msg','$user_from_msg', '$msg', NOW(), 'no')";

	$run_insert = mysqli_query($con,$insert);


		}


}


		  ?>
	
		
	</div>





	<div class="col-sm-2">
		
		<?php   

	if(isset($_GET['u_id'])){
	global $con;
	
	$get_id = $_GET['u_id'];
	
	$get_user = "select * from users where user_id = '$get_id'";
	$run_user = mysqli_query($con,$get_user);
	$row = mysqli_fetch_array($run_user); 

	$user_id = $row['user_id'];
	$user_name = $row['user_name'];
	$f_name = $row['f_name'];
	$l_name = $row['l_name'];
	$describe_user = $row['describe_user'];
	$user_country = $row['user_country'];
	$user_image = $row['user_image'];
	$register_date = $row['user_reg_date'];
	$gender = $row['user_gender'];
	
	
}
	if($get_id == "new"){

}else{
	echo"

			
		
		
			<div style='background-color: #e6e6e6;' >
			<div class='container-fluid'>
			<center>
				<br>
				<img class='img-circle' src='../users/$user_image' width='90' height='80'><br><br>
				<ul class='list-group'>
				<li class='list-group-item'><b>User info</b></li>
					<li class='list-group-item' title='Username'>
					<strong>$f_name $l_name</strong>
					</li>
					<li class='list-group-item' title='User Status'>
					<strong style='color:grey;'>$describe_user</strong>
					</li>
					<li class='list-group-item' title='Gender'><strong>$gender </strong></li>
					<li class='list-group-item' title='Country'><strong>$user_country </strong></li>
					<li class='list-group-item' title='User Register Date'><strong>$register_date </strong></li>
				</ul>	
				</center>
			</div>
			</div>
			
			

	
	";
}




?>

	</div>

</div>
<script>
	var div = document.getElementById("scroll_messages");
	div.scrollTop = div.scrollHeight;
</script>
</body>
</html>