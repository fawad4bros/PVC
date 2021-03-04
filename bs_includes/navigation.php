
<header role="banner">
  <div class="top-bar">
    <div class="container">
      <div class="row">
        <div class="col-9 social">
          <a href="bs_admin/index.php">Admin Panel<span></span></a>

        </div>
        <div class="col-3 search-top">
          <!-- <a href="#"><span class="fa fa-search"></span></a> -->
          <form action="search.php" class="search-top-form" method="post">
            <span class="icon fa fa-search"></span>
            <input type="text" name="search" id="s" placeholder="Type keyword to search...">
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="container logo-wrap">
    <div class="row pt-5">
      <div class="col-12 text-center">
        <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
        <h1 class="site-logo"><a href="./bs_index.php">PVC Articles</a></h1>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-md  navbar-light bg-light">
    <div class="container">


      <div class="collapse navbar-collapse" id="navbarMenu">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link active" href="./bs_index.php">Home</a>
          </li>
            <?php show_cat() ?>

        </ul>

      </div>
    </div>
  </nav>
</header>
