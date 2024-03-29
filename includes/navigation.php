   <!-- Navigation -->
   <?php include('includes/db.php')  ?>
   <?php session_start(); ?>
   <nav class="navbar navbar-inverse navbar-fixed-top"  role="navigation">
       <div class="container">
           <!-- Brand and toggle get grouped for better mobile display -->
           <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                   <span class="sr-only">Toggle navigation</span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="index.php">CMS</a>
           </div>
           <!-- Collect the nav links, forms, and other content for toggling -->
           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="nav navbar-nav">
                   <?php
                    global $connection;
                    $query = "SELECT * from categories limit 3";
                    $select_all_categories_query = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
                        $cat_tilte  = $row['cat_title'];
                        $cat_id     = $row['cat_id'];
                        $category_class     = '';
                        $registration_class = '';
                        $registration = 'registration.php';
                        $page_name    = basename($_SERVER['PHP_SELF']);
                        if(isset($_GET['category']) && $_GET['category'] == $cat_id){
                            $category_class = 'active';
                        }else if ($page_name == $registration){
                            $registration_class = 'active';
                        }
                      echo "<li class='$category_class'><a href='category.php?category={$cat_id}'> $cat_tilte </a></li>";
                    } ?>
                   <li><a href="admin">Admin</a> </li>
                   <li class=" <?= $registration_class?>"><a href="./registration/">Registration</a></li>
                   <?php

                    if (isset($_SESSION['role'])) {
                        if (isset($_GET['p_id'])) {
                            $the_post_id = $_GET['p_id'];

                            $category_class = '';

                            echo " <li><a href='admin/posts.php?edit={$the_post_id}&source=edit_post'>Edit Post</a> </li>";
                        }
                    }
                    ?>
               </ul>
           </div>
           <!-- /.navbar-collapse -->
       </div>
       <!-- /.container -->
   </nav>