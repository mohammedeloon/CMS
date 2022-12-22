<?php include('includes/header.php')  ?>
<?php include('includes/navigation.php')  ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php
         
             if (isset($_GET['p_id'])) {
                $the_post_id = $_GET['p_id'];
               
            }
          
            $query = "select * from posts where post_id = $the_post_id";
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
                    by <a href="index.php"><?= $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?= $post_date ?></p>
                <hr>
                <img class="img-responsive" src="Images/<?= $post_image; ?>" alt="">
                <hr>
                <p><?= $post_content ?></p>
              

                <hr>

            <?php } ?>

        <?php
                if (isset($_POST['create_comment'])) {
                    $the_post_id = $_GET['p_id'];
                    $comment_author = $_POST['comment_auhtor']; 
                    $comment_email = $_POST['comment_email']; 
                    $comment_content = $_POST['comment_content']; 
                    $comment_date = date("Y-m-d h:i:sa");

                  
                
                $query = "insert into comments (comment_post_id, comment_author, comment_email, comment_content, comment_status , comment_date  ) ";
                $query .= " values ($the_post_id , '$comment_author'  , '$comment_email' , '$comment_content' , 'unapproved' , now() )";

                $instert_comment_query = mysqli_query($connection, $query);
                if (!$instert_comment_query) {
                    die("Query failed " . mysqli_error($connection));
                }

                $query = "update posts set post_comment_count = post_comment_count + 1  ";
                $query .= "where post_id = $the_post_id";
                $update_comment_count = mysqli_query($connection, $query);
                 if (!$instert_comment_query) {
                    die("Query failed " . mysqli_error($connection));
                }

            } 
                        ?>
                 <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                    <div class="form-group">
                            <label for="Author">Author</label>
                            <input type="text" class="form-control" name="comment_auhtor">
                        </div>
                        <div class="form-group">
                        <label for="Email">Email</label>
                            <input type="email" class="form-control" name="comment_email">
                        </div>
                        <div class="form-group">
                        <label for="">Comment</label>
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                

                



                <?php 
                
                $query = "select * from comments where comment_post_id = $the_post_id and comment_status = 'approved' order by 	comment_date desc";
                $select_all_comments_query = mysqli_query($connection , $query);
                if (!$query) {
                    die("Query failed " . mysqli_error($connection));
                }

                while ($rows = mysqli_fetch_assoc($select_all_comments_query)) {
                    $comment_id = $rows['comment_id'];
                    $comment_post_id = $rows['comment_post_id'];
                    $comment_author = $rows['comment_author'];
                    $comment_email = $rows['comment_email'];
                    $comment_content = $rows['comment_content'];
                    $comment_status = $rows['comment_status'];
                    $comment_date = $rows['comment_date'];
                
                ?>


                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?= $comment_author?>
                            <small><?= $comment_date ?></small>
                        </h4>
                       <?= $comment_content ?>
                        <!-- Nested Comment -->
                        <!-- <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div> -->
                        <!-- End Nested Comment -->
                    </div>
                </div>

                <?php } ?>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include('includes/sidebar.php') ?>

    </div>
    <!-- /.row -->

    <hr>
    <?php include('includes/footer.php') ?>