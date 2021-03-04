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

	$get_id = $_GET['post_id'];
	$get_com = "select * from comments where post_id = '$get_id' ORDER by 1 DESC";
	$run_com = mysqli_query($con,$get_com);
	while($row = mysqli_fetch_array($run_com)){
		$com = $row['comment'];
		$com_name = $row['comment_author'];
		$date = $row['date'];
		echo "
<div class='container bootstrap snippets bootdey'>
   <div class='col-md-offset-3 col-md-6 col-xs-12'>
        <div class='panel panel-white post panel-shadow'>
        <div class='post-footer'>
	<ul class='comments-list'>
                    <li class='comment'>
                        <a class='pull-left'>
                            <img class='avatar' src='https://bootdey.com/img/Content/user_1.jpg' >
                        </a>
                        <div class='comment-body'>
                            <div class='comment-heading'>
                                <h4 class='user'>$com_name</h4>
                                <h5 class='time'>$date</h5>
                            </div>
                            <p>$com</p>
                        </div>
                    </li>
                </ul>
                </div>
                 </div>
    </div>
</div>
		";
	}

?>