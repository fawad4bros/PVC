<?php include 'bs_includes/header.php'; ?>
    <div class="wrap">
<?php include 'bs_includes/navigation.php'; ?>
      <!-- END header -->
    <section class="site-section py-lg">
      <div class="container">
        <div class="row blog-entries element-animate">
          <?php  
          if(isset($_GET['post'])){
          $p_id = $_GET['post'];
          $query = "SELECT * FROM blog_posts WHERE blog_post_id = $p_id";
          $result = mysqli_query($connection,$query);
        }else{
        header("Location: bs_index.php");
      }
           ?>

           <?php
           while($row = mysqli_fetch_assoc($result)){
              $post_id = $row['blog_post_id'];
              $post_title = $row['blog_post_title'];
              $post_author = $row['blog_post_author'];
              $post_category = $row['blog_post_cat_title'];
              $post_category_id = $row['blog_post_cat_id'];
              $post_content = $row['blog_post_content'];
              $post_tags = $row['blog_post_tags'];
              $post_status =$row['blog_post_status'];
              $post_image =$row['blog_post_image'];
              $filename =$row['name'];
              $filesize =$row['size'];
              $date = $row['blog_post_date'];
              $post_views =  $row['blog_post_views'];
              $post_comment_count = $row['blog_post_comment_count'];
?>
          <div class="col-md-12 col-lg-8 main-content">
            <img src="images/<?php echo $post_image;  ?>" alt="Image" class="img-fluid mb-5">
             <div class="post-meta">
                        <span class="author mr-2"><?php echo $post_author ;  ?></span>&bullet;
                        <span class="mr-2"><?php echo $date;  ?></span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span>
                        <?php echo $post_comment_count;?></span>
                      </div>
            <h1 class="mb-4"><?php echo $post_title;  ?></h1>
            <a class="category mb-5" href="#"><?php echo $post_category;  ?></a> 
            <div class="post-content-body">
              <p><?php echo $post_content;  ?></p>
            </div>
 <div class="post-content-body">
    <tr>    
      <td><?php echo $row['name']; ?></td>
      <td><?php echo floor($row['size'] / 1000) . ' KB'; ?></td>
      <br>
      <td><a href="download.php?file_id=<?php echo $row['blog_post_id'] ?>">Download</a></td>
    </tr>
</div>
            <div class="pt-5">
            <p>
              Categories: <a href="#"><?php echo $post_category;  ?></a>
              Tags: <a href="#"><?php echo $post_tags;  ?></a>
            </p>
            </div>
        <?php
         }
        ?>
              <h3 class="mb-5"><?php  
                (isset($_GET['post'])) ? $post_id = $_GET['post'] : $post_id = 0;
                $query = mysqli_query($connection,"SELECT * FROM blog_comments WHERE blog_comment_status = 'Approved' AND blog_post_id = $post_id");
                $num_comments = mysqli_num_rows($query);
                echo $num_comments . " comment(s)";
               ?></h3>
              <ul class="comment-list">
                <li class="comment">
                  <div class="vcard">
                  </div>                         
                  <div class="comment-body">
                     <?php
                      if(isset($_GET['post'])){
                        $id = $_GET['post']; 
                        $comment_obj->getApprovedComments($id);
                          }
                    ?>
                  </div>
                </li>
              </ul>
              <!-- END comment-list -->
              <?php 
              if(isset($_GET['post'])){
              $id = $_GET['post'];
              if(isset($_POST['comment'])){
              $name = $_POST['name'];
              $email = $_POST['email'];
              $body = $_POST['body'];
              $myfile = $_FILES['myfile'];
              $comment_obj->addComments($id,$name,$email,$body,$myfile);
            }
            }
            
              ?>
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form action="bs_single.php?post=<?php echo $post_id; ?>" method="POST" enctype="multipart/form-data" class="p-5 bg-light">
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" name="name" class="form-control" id="name" value="<?php echo $_SESSION['username'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" name="email" class="form-control" id="email" value="<?php echo $_SESSION['userlogged'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="body" id="message" cols="30" rows="10" class="form-control"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="">Upload file</label>
                    <input type="file" name="myfile" class="form-control">
                  </div>

                  <div class="form-group">
                    <input type="submit" name="comment" value="Post Comment" class="btn btn-primary">
                  </div>
                </form>
          </div>
</div>
  <!-- END main-content -->
            <div class="col-md-12 col-lg-4 sidebar">
              <div class="sidebar-box search-form-wrap">
                <form action="search.php" class="search-form" method="post">
                  <div class="form-group">
                    <span class="icon fa fa-search"></span>
                    <input type="text" name="search" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                  </div>
                </form>
              </div>
              <!-- END sidebar-box -->

              <!-- END sidebar-box -->
              <?php include 'bs_includes/sidebar.php'; ?>
              <!-- END sidebar-box -->
<?php include 'bs_includes/category.php'; ?>

              <!-- END sidebar-box -->

<?php include 'bs_includes/tags.php'; ?>
            </div>
            <!-- END sidebar -->

          </div>
        
      </section>

</div>
</div>
    </div>
    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>

    
    <script src="js/main.js"></script>
  </body>
</html>