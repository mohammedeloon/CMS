<?php include("includes/admin_header.php"); ?>

<div id="wrapper">
    <?php include("includes/admin_navigation.php"); ?>
    <?php include("includes/admin_sidebar.php") ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"  style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                        Welcome to admin
                        <small><?= $_SESSION['username'] ?></small>
                    </h1>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                    $query = "select * from posts";
                                    $select_all_posts = mysqli_query($connection, $query);
                                    $post_count = mysqli_num_rows($select_all_posts);
                                    ?>
                                    <div class='huge'><?= $post_count ?></div>
                                    <div>Posts</div>
                                </div>
                            </div>
                        </div>
                        <a href="posts.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                    $query = "select * from comments";
                                    $select_comments = mysqli_query($connection, $query);
                                    $comment_count = mysqli_num_rows($select_comments);
                                    ?>
                                    <div class='huge'><?= $comment_count ?></div>
                                    <div>Comments</div>
                                </div>
                            </div>
                        </div>
                        <a href="comments.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php

                                    $query = "select * from users";
                                    $select_users = mysqli_query($connection, $query);
                                    $user_count = mysqli_num_rows($select_users);

                                    ?>
                                    <div class='huge'><?= $user_count ?></div>
                                    <div> Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="users.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php

                                    $query = "select * from categories";
                                    $select_cats = mysqli_query($connection, $query);
                                    $cat_count = mysqli_num_rows($select_cats);

                                    ?>
                                    <div class='huge'><?= $cat_count ?></div>
                                    <div>Categories</div>
                                </div>
                            </div>
                        </div>
                        <a href="categories.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <?php
            $query = "select * from posts where post_status = 'draft'";
            $select_draft_posts = mysqli_query($connection, $query);
            $draft_post_count = mysqli_num_rows($select_draft_posts);

            $query = "select * from posts where post_status = 'published'";
            $select_published_posts = mysqli_query($connection, $query);
            $published_post_count = mysqli_num_rows($select_published_posts);

            $query = "select * from comments where comment_status = 'unapproved'";
            $select_disapproved_comments = mysqli_query($connection, $query);
            $disaproved_comment_count = mysqli_num_rows($select_disapproved_comments);

            $query = "select * from users where user_role = 'subscriber'";
            $select_subscribers = mysqli_query($connection, $query);
            $subscriber_count = mysqli_num_rows($select_subscribers);
            ?>

            <div class="row">

                <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['bar']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Data', 'Count'],

                            <?php

                            $elements_text = ['Active posts', 'Draft Posts', 'Published Posts', 'Categories', 'Users', 'Subscirbers', 'Comments', 'Pending Comments'];
                            $elements_count = [$post_count, $draft_post_count, $published_post_count, $cat_count, $user_count, $subscriber_count, $comment_count, $disaproved_comment_count];

                            for ($i = 0; $i < 8; $i++) {
                                echo "['{$elements_text[$i]}'" . "," . "{$elements_count[$i]}],";
                            }
                            ?>
                            //   ['Post', 1000],
                            //   ['2015', 1170, 460, 250],
                            //   ['2016', 660, 1120, 300],
                            //   ['2017', 1030, 540, 350]
                        ]);

                        var options = {
                            chart: {
                                title: '',
                                subtitle: '',
                            }   };
                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
                        chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                </script>
                <!-- this makes the chart visible  -->
                <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<?php include("includes/admin_footer.php") ?>