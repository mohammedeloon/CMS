<?php include('includes/header.php')  ?>
<?php include('includes/navigation.php')  ?>


<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php
            $query = "select * from posts where post_status = 'published' ";
            $select_all_post_query = mysqli_query($connection, $query);


       
            while ($row = mysqli_fetch_assoc($select_all_post_query)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_status = $row['post_status'];
                $post_content_explode = explode('.',$row['post_content'] );
                $post_content = $post_content_explode[0] . '.'; // ADD A FULLSTOP TO THE FIRST SENTENCE.


            ?>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                     
                    <a href="post.php?p_id=<?= $post_id ?>"><?= $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?= $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?= $post_date ?></p>
                <hr>
                <a href="post.php?p_id=<?= $post_id ?>">
                <img class="img-responsive" src="Images/<?= $post_image; ?>" alt="">
                </a>
                <hr>
                <p><?= $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
<!-- one bracket for the loop and another for the else statement -->
            <?php } ?>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include('includes/sidebar.php') ?>

    </div>
    <!-- /.row -->

    <hr>
    <?php include('includes/footer.php') ?>