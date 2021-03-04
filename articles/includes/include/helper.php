<?php 
// delete function
function delete($table, $colName, $id){
	global $connection;
	$query = mysqli_query($connection, "DELETE FROM $table WHERE $colName = $id");
	if($query){
		return true;
	}else{
		return false;
	}
}

// app/unapprove function

function confirm($id){
	global $connection;
	$query = mysqli_query($connection, "SELECT blog_comment_status FROM blog_comments WHERE blog_com_id='$id' ");
	if(mysqli_num_rows($query) > 0){
		$result = mysqli_fetch_array($query);
		$status = $result['blog_comment_status'];

		//check the value of status
		if($status == 'Unapproved'){
			$sql = mysqli_query($connection, "UPDATE blog_comments SET blog_comment_status='Approved' WHERE blog_com_id='$id'" );
		}else{
			$sql = mysqli_query($connection, "UPDATE blog_comments SET blog_comment_status='Unapproved' WHERE blog_com_id='$id'" );
		}
		return true;
	}else{
		return false;
	}
}

function redirect($page = 'index.php') {
        header("Location:".$page."");
    }

 ?>