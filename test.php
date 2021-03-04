<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#date" ).datepicker();
  } );
  </script>
</head>
<body>
	<form class="navbar-form navbar-left" method="post" action="test.php">
<div class="form-group">
<input type="text" class="form-control" id="date" name="date" placeholder="Date">
</div>
<button type="submit" class="btn btn-info" name="search">Search</button>
</form>
 

 
 
</body>
</html>

<?php
$con = mysqli_connect("localhost","USER_name","password_if_any","Database_name");
if(isset($_POST['search'])){
$date  = $_POST['date'];
$format = strtotime($date);
$formated = date("Y/m/d",$format)
$query = "SELECT * FROM Table_name where column_name = '$formated'";
$data = mysqli_query($con, $query);
if(mysqli_num_row($data)>0){
while($row = mysqli_fetch_assoc($data)){
	$data = $row['data'];


	echo "";
}

}
else{
	echo "Tata b nar mila";
}




}

  









  //echo $row['user_id'] . "<br /> " .$row['blog_user_id'] . "<br /> " . $row['f_name']."<br /> " . $row['l_name']. "<br /> " .$row['user_email'];

  //echo "<br />";

  
?>