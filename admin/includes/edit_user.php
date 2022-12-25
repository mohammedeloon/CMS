<?php

if (isset($_GET['edit'])) {

    $the_user_id = $_GET['edit'];
}


$query = "select * from users where user_id = $the_user_id";
$select_user_query = mysqli_query($connection, $query);
confirmQuery($select_user_query);

while ($rows = mysqli_fetch_assoc($select_user_query)) {

    $user_firstname = $rows['user_firstname'];
    $user_id = $rows['user_id'];
    $user_lastname = $rows['user_lastname'];
    $user_role = $rows['user_role'];
    $username = $rows['username'];
    $user_email = $rows['user_email'];
    $user_password = $rows['user_password'];
    $user_image = $rows['user_image'];
}

if (isset($_POST['edit_user'])) {
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    

    $user_image = $_FILES['image']['name'];
    $user_image_temp = $_FILES['image']['tmp_name'];
    move_uploaded_file($user_image_temp, "../images/users_images/$user_image");

    $query = "update users set user_firstname = '$user_firstname', user_lastname = '$user_lastname', user_role =  '$user_role' , username = '$username', user_email = '$user_email', user_password = '$user_password', user_image = '$user_image' where user_id = $the_user_id  ";

    $edit_user_query = mysqli_query($connection, $query);
    confirmQuery($edit_user_query);
    echo "<div class=' alert alert-success ' style='width: 400px;' role='alert'> User Edited successfully! <a href='users.php'>view all users</a></div>";  
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
            <img width="200" src="../images/users_images/<?= $user_image ?>" alt="">
        </div>

        <div class="form-group">
            <label for="post_image">User Picture</label>
            <input type="file" class="form-control" value="<?= $user_image ?>" name="image">
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


        <!-- <div class="form-group">
<label for="post_content">Email</label>
<textarea class="form-control" name="email" id="" cols="30" rows="10"></textarea>
</div> -->

        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="edit_user" value="Edit user">
        </div>



    </form>
</div>