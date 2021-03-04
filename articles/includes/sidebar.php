<div class="sidebar-box">
  <h3 class="heading">Recent Posts</h3>
  <div class="post-entry-sidebar">
    <ul>
<?php 
include "connection.php";
$query= "SELECT * FROM blog_posts  WHERE blog_post_status = 'published' ORDER BY blog_post_id DESC LIMIT 5";
$result = mysqli_query($connection,$query);
while ($row = mysqli_fetch_assoc($result)) {
  $post_id = $row['blog_post_id'];
  $post_title = $row['blog_post_title'];
  $post_author = $row['blog_post_author'];
  $post_category = $row['blog_post_cat_title'];
  $post_category_id = $row['blog_post_cat_id'];
  $post_content = $row['blog_post_content'];
  $post_tags = $row['blog_post_tags'];
  $post_status =$row['blog_post_status'];
  $post_image =$row['blog_post_image'];
  $date = $row['blog_post_date'];
  $post_views =  $row['blog_post_views'];
  $post_comment_count = $row['blog_post_comment_count'];
?>


      <li>
        <a href="single.php?post=<?php echo $post_id;  ?>" >
          <img src="../images/<?php echo $post_image ; ?>" alt="Image placeholder" class="mr-4">
          <div class="text">
            <h4><?php echo $post_title ; ?></h4>
            <div class="post-meta">
              <span class="mr-2"><?php echo $date ; ?></span>
            </div>
          </div>
        </a>
      </li>
    
<?php
}
?>
</ul>
  </div>
</div>