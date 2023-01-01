<?php include("includes/admin_header.php"); ?>

<div id="wrapper">

    <?php include("includes/admin_navigation.php"); ?>

    <?php include("includes/admin_sidebar.php"); ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header"  style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                        Welcome to admin
                        <small><?= $_SESSION['username'] ?></small>
                    </h1>

                    <div class="col-xs-12 ">


                        <?php
                        $username = $_SESSION['username'];
                        $query = "select user_image from users where username = '$username'";
                        $select_image_query = mysqli_query($connection, $query);
                        while ($rows = mysqli_fetch_assoc($select_image_query)) {
                            $user_image = $rows['user_image'];


                        ?>
                            <img id='user_image' style="border-radius: 150px; width:300px ; hight:300px " src='../images/users_images/<?= $user_image ?>' alt="">
                        <?php } ?>
                    </div>

                    <?php

                    if (isset($_SESSION['username'])) {
                        $username = $_SESSION['username'];
                        $query = "select * from users where username = '$username'";
                        $select_user_profile = mysqli_query($connection, $query);
                        confirmQuery($query);
                        while ($rows = mysqli_fetch_assoc($select_user_profile)) {
                            $user_firstname = $rows['user_firstname'];
                            $user_id = $rows['user_id'];
                            $user_lastname = $rows['user_lastname'];
                            $user_role = $rows['user_role'];
                            $username = $rows['username'];
                            $user_email = $rows['user_email'];
                            $user_password = $rows['user_password'];
                            $user_image = $rows['user_image'];
                        }
                    }

                    if (isset($_POST['edit_user'])) {
                        $user_password = $_POST['user_password'];
                        $user_email = $_POST['user_email'];
                        $user_lastname = $_POST['user_lastname'];
                        $user_username = $_POST['username'];
                        $user_firstname = $_POST['user_firstname'];


                        $query = "update users set user_password = '$user_password' , user_email = '$user_email' , user_lastname = '$user_lastname' , user_firstname = '$user_firstname' , username = '$user_username' where username = '$username' ";
                        $update_user_query = mysqli_query($connection, $query);
                        confirmQuery($update_user_query);

                        // echo "<div class=' alert alert-success ' style='width: 400px;' role='alert'> User updated successfully! <a href='users.php'>view all users</a></div>";  
                    }

                    ?>

                    <div class="col-xs-6">
                        
                        <form action="" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="title">First Name</label>
                                <input type="text" class="form-control" value="<?= $user_firstname ?>" name="user_firstname">
                            </div>



                            <div class="form-group">
                                <label for="post_status">Last Name</label>
                                <input type="text" class="form-control" value="<?= $user_lastname ?>" name="user_lastname">
                            </div>

                            <div class="form-group">
                                <select name="user_role" id="">
                                    <option value="subscriber"><?= $user_role ?></option>

                                    <?php


                                    if ($user_role = 'admin') {
                                        echo "<option value='subscriber'>subscriber</option>";
                                    }

                                    if ($user_role = "subscriber") {
                                        echo  "<option value='admain'>admin</option>";
                                    }


                                    ?>



                                </select>
                            </div>


                            <div class="form-group">
                                <label for="post_tags">Username</label>
                                <input type="text" class="form-control" value="<?= $username ?>" name="username">
                            </div>

                            <div class="form-group">
                                <label for="post_tags">Email</label>
                                <input type="email" class="form-control" value="<?= $user_email ?>" name="user_email">
                            </div>


                            <div class="form-group">
                                <label for="post_tags">Password</label>
                                <input type="password" class="form-control" value="<?= $user_password ?>" name="user_password">
                            </div>


                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="edit_user" value="Update Profile">
                            </div>



                        </form>
                    </div>

                    <!-- <div class="col-xs-6" >


</div> -->

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include("includes/admin_footer.php") ?>