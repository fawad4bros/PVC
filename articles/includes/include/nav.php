

 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../../articles.php">Articles Hello <?php  echo $user; ?> </a>
            </div>
            <!-- Top Menu Items -->
            
               
   
  
             <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="javascript:;"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-send"></i> Posts  <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="useraddpost.php?source=">View Posts</a>
                            </li>
                            <li>

                                <a href="useraddpost.php?source=add_new">Add New Posts</a>
                            
                            </li>


                        </ul>
                    </li>
                            
                            

                        </ul>
                    </li>
               
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
       <script src="bootstrap/js/jquery.js"></script>
