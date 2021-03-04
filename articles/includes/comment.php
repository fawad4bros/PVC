<?php include "connection.php"; ?>
<?php 










class Comment{
	private $con;
	public function __construct($con){
		$this->con = $con;
	}
	public function addComments($id,$name,$email,$body,$myfile){
		if(!empty($body)){

	// name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = '../uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    
    $size = $_FILES['myfile']['size'];
    

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "Your comment has been sent for Admin Approval and file extension must be .zip, .pdf or .docx if added.";
    } elseif ($_FILES['myfile']['size'] > 100000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            echo "File uploaded successfully";

        } else {
            echo "Failed to upload file.";
            echo "$filename"."+";
            echo "$destination"."+";
            echo "$extension"."+";
            echo "$file"."+";
            echo "$size"."+";
        }
    }




			$query = mysqli_query($this->con,"INSERT INTO blog_comments VALUES('','$name','$email','$body','$filename','$size','Unapproved','$id');");
			if(!$query){
				die("Failed".mysqli_error($this->con));
			}
		}else{
			return false;
		}
	}
	public function getApprovedComments($id){
		$query = mysqli_query($this->con,"SELECT * FROM blog_comments WHERE blog_post_id = $id AND blog_comment_status ='Approved' ");
		$str = "";
		while ($row = mysqli_fetch_assoc($query)) {
			$id = $row['blog_com_id'];
			$post_id = $row['blog_post_id'];
			$name = $row['blog_comment_name'];
			$body = $row['blog_comment_body'];
			$filename = $row['name'];
			$size = $row['size'];
			$sizeconvert = floor($row['size'] / 1000);
		if($size=="0"){
		echo "
		
			<br>
			<br>
			<h3>$name</h3>
            <p>$body</p>

";
}else{
			echo "
		
			<br>
			<br>
			<h3>$name</h3>
            <p>$body</p>
            <p>$filename $sizeconvert KB </p>
            <a href='includes/download.php?file_id=$id'>Download</a>
";
}
            ?>	
<?php		}

	}

	public function getComments(){
		global $role;
		$query = mysqli_query($this->con,"SELECT * FROM blog_comments ORDER BY blog_com_id DESC LIMIT 20");
		$str = "";
		while ($row = mysqli_fetch_array($query)) {
			$id = $row['blog_com_id'];
			$name = $row['blog_comment_name'];
			$body = $row['blog_comment_body'];
			$email = $row['blog_comment_email'];
			$status = $row['blog_comment_status'];
			$post_id = $row['blog_post_id'];

			if ($role !== "Admin") {
			
					$str .= "<tr> 
					<td>$id</td>
					<td>$name</td>
					<td>$email</td>
					<td>$body</td>
					<td>$status</td>
					<td>$post_id</td>
					</tr>";
			}else{
					$str .= "<tr> 
					<td>$id</td>
					<td>$name</td>
					<td>$email</td>
					<td>$body</td>
					<td>$status</td>
					<td>$post_id</td>
					<td><a href='comment.php?app=$id' class='btn btn-primary'>Change Status</a></td>
					<td><a href='comment.php?del_com=$id' class='btn btn-danger'>Delete</a></td>
					</tr>";
			}

		}
		echo $str;
	}
}

?>