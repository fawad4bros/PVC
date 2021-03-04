 <style type="text/css">
    	.panel-shadow {
    box-shadow: rgba(0, 0, 0, 0.3) 7px 7px 7px;
}
.panel-white {
  border: 1px solid #dddddd;
}
.panel-white  .panel-heading {
  color: #333;
  background-color: #fff;
  border-color: #ddd;
}
.panel-white  .panel-footer {
  background-color: #fff;
  border-color: #ddd;
}

.post .post-heading {
  height: 95px;
  padding: 20px 15px;
}
.post .post-heading .avatar {
  width: 60px;
  height: 60px;
  display: block;
  margin-right: 15px;
}
.post .post-heading .meta .title {
  margin-bottom: 0;
}
.post .post-heading .meta .title a {
  color: black;
}
.post .post-heading .meta .title a:hover {
  color: #aaaaaa;
}
.post .post-heading .meta .time {
  margin-top: 8px;
  color: #999;
}
.post .post-image .image {
  width: 100%;
  height: auto;
}
.post .post-description {
  padding: 15px;
}
.post .post-description p {
  font-size: 14px;
}
.post .post-description .stats {
  margin-top: 20px;
}
.post .post-description .stats .stat-item {
  display: inline-block;
  margin-right: 15px;
}
.post .post-description .stats .stat-item .icon {
  margin-right: 8px;
}
.post .post-footer {
  border-top: 1px solid #ddd;
  padding: 15px;
}
.post .post-footer .input-group-addon a {
  color: #454545;
}
.post .post-footer .comments-list {
  padding: 0;
  margin-top: 20px;
  list-style-type: none;
}
.post .post-footer .comments-list .comment {
  display: block;
  width: 100%;
  margin: 20px 0;
}
.post .post-footer .comments-list .comment .avatar {
  width: 35px;
  height: 35px;
}
.post .post-footer .comments-list .comment .comment-heading {
  display: block;
  width: 100%;
}
.post .post-footer .comments-list .comment .comment-heading .user {
  font-size: 14px;
  font-weight: bold;
  display: inline;
  margin-top: 0;
  margin-right: 10px;
}
.post .post-footer .comments-list .comment .comment-heading .time {
  font-size: 12px;
  color: #aaa;
  margin-top: 0;
  display: inline;
}
.post .post-footer .comments-list .comment .comment-body {
  margin-left: 50px;
}
.post .post-footer .comments-list .comment > .comments-list {
  margin-left: 50px;
}
    </style>
<?php

$con = mysqli_connect("localhost","root","","pvc") or die("Connection was not established");

//function for inserting post

function insertPost(){
	if(isset($_POST['sub'])){
		global $con;
		global $user_id;

		$content = htmlentities($_POST['content']);
		$upload_image = $_FILES['upload_image']['name'];
		$image_tmp = $_FILES['upload_image']['tmp_name'];
		$random_number = rand(1, 100);
		

		if(strlen($content) > 250){
			echo "<script>alert('Please Use 250 or less than 250 words!')</script>";
			echo "<script>window.open('home.php', '_self')</script>";
		}else{
			if(strlen($upload_image) >= 1 && strlen($content) >= 1){
				move_uploaded_file($image_tmp, "../imagepost/$upload_image.$random_number");
				$insert = "insert into posts (user_id, post_content, upload_image, post_date) values('$user_id', '$content', '$upload_image.$random_number', NOW())";

				$run = mysqli_query($con, $insert);

				if($run){
					echo "<script>alert('Your Post updated a moment ago!')</script>";
					echo "<script>window.open('home.php', '_self')</script>";

					$update = "update users set posts='yes' where user_id='$user_id'";
					$run_update = mysqli_query($con, $update);
				}

				exit();
			}else{
				if($upload_image=='' && $content == ''){
					echo "<script>alert('Error Occured while uploading!')</script>";
					echo "<script>window.open('home.php', '_self')</script>";
				}else{
					if($content==''){
						move_uploaded_file($image_tmp, "../imagepost/$upload_image.$random_number");
						$insert = "insert into posts (user_id,post_content,upload_image,post_date) values ('$user_id','No','$upload_image.$random_number', NOW())";
						$run = mysqli_query($con, $insert);

						if($run){
							echo "<script>alert('Your Post updated a moment ago!')</script>";
							echo "<script>window.open('home.php', '_self')</script>";

							$update = "update users set posts='yes' where user_id='$user_id'";
							$run_update = mysqli_query($con, $update);
						}

						exit();
					}else{
						$insert = "insert into posts (user_id, post_content, post_date) values('$user_id', '$content', NOW())";
						$run = mysqli_query($con, $insert);

						if($run){
							
							echo "<script>window.open('home.php', '_self')</script>";

							$update = "update users set posts='yes' where user_id='$user_id'";
							$run_update = mysqli_query($con, $update);
						}
					}
				}
			}
		}
	}
}

function get_posts(){
	global $con;
	$per_page = 4;

	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page=1;
	}

	$start_from = ($page-1) * $per_page;

	$get_posts = "select * from posts ORDER by 1 DESC LIMIT $start_from, $per_page";

	$run_posts = mysqli_query($con, $get_posts);

	while($row_posts = mysqli_fetch_array($run_posts)){

		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$content = substr($row_posts['post_content'], 0,40);
		$upload_image = $row_posts['upload_image'];
		$post_date = $row_posts['post_date'];

		$user = "select * from users where user_id='$user_id' AND posts='yes'";
		$run_user = mysqli_query($con,$user);
		$row_user = mysqli_fetch_array($run_user);

		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];

		//now displaying posts from database

		if($content=="No" && strlen($upload_image) >= 1){
			echo"
			<div class='container bootstrap snippets bootdey'>
     <div class='col-md-offset-3 col-md-6 col-xs-12'>
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
                    <a href='single.php?post_id=$post_id' style='float:right;'><button style='color:#09aaff; border-color: #09aaff; background-color: #414141;' class='btn btn-info'>Comment</button></a><br>
                </div>
            </div>
              </div>
            </div>
              </div>
			";
		}

		else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
			echo"
			<div class='container bootstrap snippets bootdey'>
     <div class='col-md-offset-3 col-md-6 col-xs-12 '>
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
                <div class='stats '>
                    <img id='posts-img' src='../imagepost/$upload_image' style='height:350px;'>
                     <a href='single.php?post_id=$post_id' style='float:right;'><button style='color:#09aaff; border-color: #09aaff; background-color: #414141;' class='btn btn-info'>Comment</button></a><br>

                </div>
            </div>
              </div>
            </div>
              </div>
			";
		}

		else{
			echo"
						<div class='container bootstrap snippets bootdey'>
    <div class='col-md-offset-3 col-md-6 col-xs-12'>
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
                    <a href='single.php?post_id=$post_id' style='float:right;'><button style='color:#09aaff; border-color: #09aaff; background-color: #414141;' class='btn btn-info'>Comment</button></a><br>
                    
                </div>
            </div>
              </div>
            </div>
              </div>
		
					
				
			";
		}
	}

	include("pagination.php");
}

	function single_post(){
		if(isset($_GET['post_id'])){
			global $con;

			$get_id = $_GET['post_id'];
			$get_posts = "select * from posts where post_id = '$get_id'";
			$run_posts = mysqli_query($con,$get_posts);
			$row_posts = mysqli_fetch_array($run_posts);
			$post_id = $row_posts ['post_id'];
			$user_id = $row_posts ['user_id'];
			$content = $row_posts ['post_content'];
			$upload_image = $row_posts ['upload_image'];
			$post_date = $row_posts ['post_date'];
			$user = "select * from users where user_id = '$user_id' AND posts='yes'";

			$run_user = mysqli_query($con,$user);
			$row_user = mysqli_fetch_array($run_user);

			$user_name = $row_user['user_name'];
			$user_image = $row_user['user_image'];

			$user_com = $_SESSION['user_email'];

			$get_com = "select * from users where user_email = '$user_com'";

			$run_com = mysqli_query($con,$get_com);
			$row_com = mysqli_fetch_array($run_com);			

			$user_com_id = $row_com['user_id'];
			$user_com_name = $row_com['user_name'];

			if(isset($_GET['post_id'])){
				$post_id = $_GET['post_id'];
			}
			$get_posts = "select post_id from users where post_id = '$post_id'";
			$run_user = mysqli_query($con, $get_posts);
			$post_id = $_GET['post_id'];
			$post = $_GET['post_id'];
			$get_user = " select * from posts where post_id = '$post'";
			$run_user = mysqli_query($con, $get_user);
			$row = mysqli_fetch_array($run_user);
			$p_id = $row['post_id'];
			if($p_id != $post_id){
					echo"<script>alert('ERROR')</script>";
					echo"<script>window.open('home.php','_self')</script>";
			}else{
						//now displaying single post from database
							if($content=="No" && strlen($upload_image) >= 1){
			echo"
			<div class='container bootstrap snippets bootdey'>
     <div class='col-md-offset-3 col-md-6 col-xs-12'>
        <div class='panel panel-white post panel-shadow'>
            <div class='post-heading'>
               
                <div class='pull-left image'>
                    <img src='../users/$user_image' class='img-circle avatar' >
                </div>
               
                <div class='pull-left meta'>
                    <div class='title h5'>
                        <a href='user_profile.php?u_id=$user_id'><b>$user_name</b></a>
                        made a post.
                    </div>
                    <h6 class='text-muted time'>$post_date</h6>
                </div>
            </div> 
            <div class='post-description'> 
                
                <div class='stats'>
                    <img id='posts-img' src='../imagepost/$upload_image' style='width:100%; height:350px;'>
                </div>
            </div>
              </div>
            </div>
              </div>
			";
		}

		else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
			echo"
			<div class='container bootstrap snippets bootdey'>
     <div class='col-md-offset-3 col-md-6 col-xs-12'>
        <div class='panel panel-white post panel-shadow'>
            <div class='post-heading'>
               
                <div class='pull-left image'>
                    <img src='../users/$user_image' class='img-circle avatar' >
                </div>
               
                <div class='pull-left meta'>
                    <div class='title h5'>
                        <a href='user_profile.php?u_id=$user_id'><b>$user_name</b></a>
                        made a post.
                    </div>
                    <h6 class='text-muted time'>$post_date</h6>
                </div>
            </div> 
            <div class='post-description'> 
                <p>$content</p>
                <div class='stats'>
                    <img id='posts-img' src='../imagepost/$upload_image' style='width:100%; height:350px;'>
                </div>
            </div>
              </div>
            </div>
              </div>
			";
		}

		else{
			echo"
			<div class='container bootstrap snippets bootdey'>
    <div class='col-md-offset-3 col-md-6 col-xs-12'>
        <div class='panel panel-white post panel-shadow'>
            <div class='post-heading'>
               
                <div class='pull-left image'>
                    <img src='../users/$user_image' class='img-circle avatar' >
                </div>
               
                <div class='pull-left meta'>
                    <div class='title h5'>
                        <a href='user_profile.php?u_id=$user_id'><b>$user_name</b></a>
                        made a post.
                    </div>
                    <h6 class='text-muted time'>$post_date</h6>
                </div>
            </div> 
            <div class='post-description'> 
                <p>$content</p>
                <div class='stats'>
                    
                </div>
            </div>
              </div>
            </div>
              </div>
            



			";
		}

		// ending of single display post
		include("comments.php");
		//Comment
		echo "
		<div class='container bootstrap snippets bootdey'>
    <div class='col-md-offset-3 col-md-6 col-xs-12'>
        <div class='panel panel-white post panel-shadow'>
<div class='post-footer'>
	  <form action='' method='post' >
                <div class='input-group'>                 
                    <input name='comment' class='form-control' placeholder='Add a comment' type='text'>
                    <span class='input-group-addon'>
                        <button  name='reply'>
           				 Comment
          				</button>  
                    </span>
                </div>
        </form>
 </div>
                 </div>
    </div>
</div>
		";
		if(isset($_POST['reply'])){
			$comment = htmlentities($_POST['comment']);
			if($comment == ""){
				echo"<script>alert('Enter your comment')</script>";
				echo"<script>window.open('single.php?post_id=$post_id','_self')</script>";
			}else{
				$insert = "insert into comments (post_id,user_id,comment,comment_author,date)
				values('$post_id','$user_id','$comment','$user_com_name',NOW())";
				$run = mysqli_query($con, $insert);
			
				echo"<script>window.open('single.php?post_id=$post_id','_self')</script>";

			}
		}




			}

		}
	}

function user_posts(){
	global $con;
	if(isset($_GET['u_id'])){
		$u_id=$_GET['u_id'];

	}
	$get_posts = "select * from posts where user_id='$u_id' ORDER by 1 DESC LIMIT 5";
	$run_posts = mysqli_query($con,$get_posts);
	while ($row_posts=mysqli_fetch_array($run_posts)) {
		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$content = $row_posts['post_content'];
		$upload_image = $row_posts['upload_image'];
		$post_date = $row_posts['post_date'];

		$user = "select * from users where user_id='$user_id' AND posts='yes'";
		
		$run_user = mysqli_query($con,$user);
		$row_user = mysqli_fetch_array($run_user);

		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];
		if(isset($_GET['u_id'])){
			$u_id = $_GET['u_id'];

		}
		$getuser = "select user_email from users where user_id='$u_id'";
		$run_user = mysqli_query($con,$getuser);
		$row = mysqli_fetch_array($run_user);

		$user_email = $row['user_email'];

		$user = $_SESSION['user_email'];
		$get_user = "select * from users where user_email='$user'";
		$run_user = mysqli_query($con,$get_user);
		$row = mysqli_fetch_array($run_user);

		$user_id = $row['user_id'];
		$u_email = $row['user_email'];

		if($u_email != $user_email){
			echo"<script>window.open('my_post.php?u_id=$user_id','_self')</script>";
		}else{
//now displaying posts from database

		if($content=="No" && strlen($upload_image) >= 1){
    echo"
<div class='container bootstrap snippets bootdey'>
  <div class='col-md-offset-3 col-md-6 col-xs-12'>
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

          </div>
          <div class='stats'>
             <a href='../functions/delete_post.php?post_id=$post_id' class='btn btn-default stat-item'>Delete</a>
            <a href='edit_post.php?post_id=$post_id' class='btn btn-default stat-item'>Edit</a>
            <a href='single.php?post_id=$post_id' class='btn btn-default stat-item'>View</a>
           
            <a href='single.php?post_id=$post_id' class='btn btn-default stat-item'>Comment</a>
          </div>
        
      </div>
    </div>
  </div>
</div>
    ";
		}

		else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
      echo"
<div class='container bootstrap snippets bootdey'>
  <div class='col-md-offset-3 col-md-6 col-xs-12'>
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

  <div class='stats'>
      <a href='edit_post.php?post_id=$post_id' class='btn btn-default stat-item'>Edit</a>
            <a href='single.php?post_id=$post_id' class='btn btn-default stat-item'>View</a>
            <a href='../functions/delete_post.php?post_id=$post_id' class='btn btn-default stat-item'>Delete</a>
            <a href='single.php?post_id=$post_id' class='btn btn-default stat-item'>Comment</a>

          </div>
      </div>
                      
    </div>
  </div>
</div>
      ";
		}

		else{
      echo"
<div class='container bootstrap snippets bootdey'>
  <div class='col-md-offset-3 col-md-6 col-xs-12'>
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
          <div class='stats'>
            <a href='edit_post.php?post_id=$post_id' class='btn btn-default stat-item'>Edit</a>
            <a href='single.php?post_id=$post_id' class='btn btn-default stat-item'>View</a>
            <a href='../functions/delete_post.php?post_id=$post_id' class='btn btn-default stat-item'>Delete</a>
            <a href='single.php?post_id=$post_id' class='btn btn-default stat-item'>Comment</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
      ";
		}			

		}
	}
}
function results(){
	global $con;
	if(isset($_GET['search'])){
		$search_query = htmlentities($_GET['user_query']);

	}
	$get_posts = "select * from posts where post_content like '%$search_query%' OR upload_image like '%$search_query%'";
	$run_posts = mysqli_query($con,$get_posts);
	while ($row_posts=mysqli_fetch_array($run_posts)) {
		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$content = $row_posts['post_content'];
		$upload_image = $row_posts['upload_image'];
		$post_date = $row_posts['post_date'];

		$user = "select * from users where user_id='$user_id' AND posts='yes'";

		$run_user = mysqli_query($con,$user);
		$row_user = mysqli_fetch_array($run_user);
		
		$user_name = $row_user['user_name'];
		$first_name = $row_user['f_name'];
		$last_name = $row_user['l_name'];
		$user_image = $row_user['user_image'];

				if($content=="No" && strlen($upload_image) >= 1){
      echo"
      <div class='container bootstrap snippets bootdey'>
     <div class='col-md-offset-3 col-md-6 col-xs-12'>
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
                    <a href='single.php?post_id=$post_id' style='float:right;'><button style='color:#09aaff; border-color: #09aaff; background-color: #414141;' class='btn btn-info'>Comment</button></a><br>
                </div>
            </div>
              </div>
            </div>
              </div>
      ";
		}

		else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
      echo"
      <div class='container bootstrap snippets bootdey'>
     <div class='col-md-offset-3 col-md-6 col-xs-12 '>
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
                <div class='stats '>
                    <img id='posts-img' src='../imagepost/$upload_image' style='height:350px;'>
                     <a href='single.php?post_id=$post_id' style='float:right;'><button style='color:#09aaff; border-color: #09aaff; background-color: #414141;' class='btn btn-info'>Comment</button></a><br>

                </div>
            </div>
              </div>
            </div>
              </div>
      ";
		}

		else{
      echo"
            <div class='container bootstrap snippets bootdey'>
    <div class='col-md-offset-3 col-md-6 col-xs-12'>
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
                    <a href='single.php?post_id=$post_id' style='float:right;'><button style='color:#09aaff; border-color: #09aaff; background-color: #414141;' class='btn btn-info'>Comment</button></a><br>
                    
                </div>
            </div>
              </div>
            </div>
              </div>
    
          
        
      ";
		}
	}
}









function search_user(){
	global $con;
	if(isset($_GET['search_user_btn'])){
		$search_query = htmlentities($_GET['search_user']);
		$get_user = "select * from users where f_name like '%$search_query%' OR l_name like '%$search_query%' OR user_name like '%$search_query%'";
	}else{
		$get_user = "select * from users";
	}
	$run_user = mysqli_query($con, $get_user);
	while($row_user = mysqli_fetch_array($run_user)){
		$user_id = $row_user['user_id'];
		$f_name  = $row_user['f_name'];
		$l_name  = $row_user['l_name'];
		$username = $row_user['user_name'];
		$user_image = $row_user['user_image'];
    $reg_on = $row_user['user_reg_date'];
		echo"
	

      <div class='container bootstrap snippets bootdey'>
     <div class='col-md-offset-3 col-md-6 col-xs-12'>
        <div class='panel panel-white post panel-shadow'>
            <div class='post-heading'>
               
                <div class='pull-left image'>
                    <img src='../users/$user_image' class='img-circle avatar' >
                </div>
               
                <div class='pull-left meta'>
                    <div class='title h5'>
                        <a href='user_profile.php?u_id=$user_id'><b>$username</b></a>
                    </div>
                    <h6 class='text-muted time'> $reg_on</h6>
                </div>
            </div> 
           
              </div>
            </div>
              </div>





















		";
	}
}

?>