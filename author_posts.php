<?php include('includes/header.php')  ?>
<?php include('includes/navigation.php')  ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php
         
             if (isset($_GET['p_id'])) {
                $the_post_id     = $_GET['p_id'];
                $the_post_author = $_GET['author'];
               
            }
          
            $query = "select * from posts where post_author = '$the_post_author' ";
            $show_post_details_query = mysqli_query($connection, $query);
          
            
            while ($row = mysqli_fetch_assoc($show_post_details_query)) {
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];

            ?>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?= $post_title ?></a>
                </h2>
                <p class="lead">
                    All posts by <?= $post_author ?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?= $post_date ?></p>
                <hr>
                <img class="img-responsive" src="Images/<?= $post_image; ?>" alt="">
                <hr>
                <p><?= $post_content ?></p>
              

                <hr>

            <?php } ?>

        <?php
                // if (isset($_POST['create_comment'])) {
                //     $the_post_id = $_GET['p_id'];
                //     $comment_author = $_POST['comment_auhtor']; 
                //     $comment_email = $_POST['comment_email']; 
                //     $comment_content = $_POST['comment_content']; 
                //     $comment_date = date("Y-m-d h:i:sa");

                //     if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content)){

  
                //         $query = "insert into comments (comment_post_id, comment_author, comment_email, comment_content, comment_status , comment_date  ) ";
                //         $query .= " values ($the_post_id , '$comment_author'  , '$comment_email' , '$comment_content' , 'unapproved' , now() )";
        
                //         $instert_comment_query = mysqli_query($connection, $query);
                //         if (!$instert_comment_query) {
                //             die("Query failed " . mysqli_error($connection));
                //         }
        
                //         $query = "update posts set post_comment_count = post_comment_count + 1  ";
                //         $query .= "where post_id = $the_post_id";
                //         $update_comment_count = mysqli_query($connection, $query);
                //          if (!$instert_comment_query) {
                //             die("Query failed " . mysqli_error($connection));
                //         }
                //     }else{
                //         echo "<script>alert('Fields cannot be empty!')</script>";
                //     }
                    
                //     }

                        ?>
                 <!-- Blog Comments -->

                <!-- Comments Form -->
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include('includes/sidebar.php') ?>

    </div>
    <!-- /.row -->

    <hr>
    <?php include('includes/footer.php') ?>