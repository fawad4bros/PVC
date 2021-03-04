<?php  

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "pvc";

$connection = mysqli_connect($db_host,$db_user,$db_pass,$db_name);

if(!$connection){

die("couldn't connect to the database".mysqli_error($connection));

}
 ?>

<?php
// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM blog_posts WHERE blog_post_id=$id";
    $result = mysqli_query($connection, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['name'];
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['name']));
        readfile('uploads/' . $file['name']);


        exit;
    }

}
?>