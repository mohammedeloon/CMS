<?php include("includes/admin_header.php"); ?>

<div id="wrapper">

    <?php include("includes/admin_navigation.php"); ?>

    <?php include("includes/admin_sidebar.php") ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to admin
                        <small>Author</small>
                    </h1>
                    <!-- Add category form -->
                    <div class="col-xs-6">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add Category:</label>
                                <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>

                        <!-- Edit category for -->


                        <?php
                        insert_categories();
                        ?>

                        <?php //update and include query

                        if (isset($_GET['edit'])) {
                            $cat_id = $_GET['edit'];
                            include('includes/update_categories.php');
                        }
                        
                        ?>

                    </div>

                    <div class="col-xs-6">

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Title</th>
                                    <th>Delete Category</th>
                                    <th>Edit </th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php // find all categories query
                                $query = "select * from categories";
                                $select_categories_query = mysqli_query($connection, $query);
                                while ($rows = mysqli_fetch_assoc($select_categories_query)) {
                                    $cat_id =  $rows['cat_id'];
                                    $cat_title =  $rows['cat_title'];
                                ?>
                                    <tr>
                                        <td><?= $cat_id; ?></td>
                                        <td><?= $cat_title; ?></td>
                                        <td><a href="categories.php?delete=<?= $cat_id; ?>">
                                                <i class="fa fa-trash"></i></a></td>
                                        <td><a href="categories.php?edit=<?= $cat_id ?>"><i class="fa fa-edit"></i></a></td>
                                        </a></td>
                                    </tr>
                                <?php  } ?>

                                <?php
                                //Delete Query
                                delete_category();

                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include("includes/admin_footer.php") ?>