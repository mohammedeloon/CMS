<?php include('includes/header.php')  ?>
<?php include('includes/navigation.php')  ?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php
            $per_page = 5;
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = "";
            }
            if ($page == "" || $page == 1) {
                $page_1 = 0;
            } else {
                $page_1 = ($page * $per_page) - $per_page;
            }

            $Select_post_count = "select * from posts";
            $find_count = mysqli_query($connection, $Select_post_count);
            $count     = mysqli_num_rows($find_count);
            $count     = ceil($count / $per_page);

            $query = "select * from posts where post_status = 'published' limit $page_1 , $per_page";
            $select_all_post_query = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_all_post_query)) {
                $post_id     = $row['post_id'];
                $post_title  = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date   = $row['post_date'];
                $post_image  = $row['post_image'];
                $post_status = $row['post_status'];
                $post_content_explode = explode('.', $row['post_content']);
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
                    by <a href="author_posts.php?author=<?= $post_author ?>&p_id=<?= $post_id ?>"><?= $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?= $post_date ?></p>
                <hr>
                <a href="post.php?p_id=<?= $post_id ?>">
                    <img class="img-responsive" src="Images/<?= $post_image; ?>" alt="">
                </a>
                <hr>
                <p><?= $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?= $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <!-- one bracket for the loop and another for the else statement -->
            <?php } ?>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include('includes/sidebar.php') ?>

    </div>
    <!-- /.row -->
    <hr>
    <ul class="pager">
        <?php
        for ($i = 1; $i <= $count; $i++) {
            if ($i == $page) {
                echo "<li ><a class='active_link' href='index.php?page=$i'>$i</a> </li>";
            } else {
                echo "<li ><a href='index.php?page=$i'>$i</a> </li>";
            }
        }
        ?>
    </ul>
    <?php include('includes/footer.php') ?>