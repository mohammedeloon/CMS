<?php 
if (isset($_POST['create_user'])) {
    $user_firstname = escape($_POST['user_firstname']);
    $user_lastname  = escape($_POST['user_lastname']);
    $user_role      = escape($_POST['user_role']);
    $username       = escape($_POST['username']);
    $user_email     = escape($_POST['user_email']);
    $user_password  = escape($_POST['user_password']);
    $user_image     = escape($_FILES['image']['name']);
    $user_image_temp = escape($_FILES['image']['tmp_name']);

    move_uploaded_file($user_image_temp , "../images/users_images/$user_image");
    $query = "INSERT INTO users (user_firstname, user_lastname, user_role, username, user_email, user_password , user_image)  ";

    $query .= " values ('$user_firstname' , '$user_lastname', '$user_role'  , '$username' , '$user_email', '$user_password', '$user_image'   )";
   
    $add_user_query = mysqli_query($connection, $query);

    confirmQuery($add_user_query);

    echo '<div class=" alert alert-success " style="width: 400px;" role="alert"> User Created successfully! <a  href="users.php">View Users</a> </div>';
}
?>
<div class="col-xs-6">
<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
<label for="title">First Name</label>
<input type="text" class="form-control" name="user_firstname">
</div>

<div class="form-group">
<label for="post_status">Last Name</label>
<input type="text" class="form-control" name="user_lastname">
</div>

<div class="form-group">
    <select name="user_role" id="">
        <option value="subscriber">Select Role</option>
        <option value="admain">Admin</option>
        <option value="subscriber">Subscriber</option>

    </select>
</div>
<div class="form-group">
<label for="user_image">User Picture</label>
<input type="file" class="form-control" name="image">
</div>

<div class="form-group">
<label for="post_tags">Username</label>
<input type="text" class="form-control" name="username">
</div>

<div class="form-group">
<label for="post_tags">Email</label>
<input type="email" class="form-control" name="user_email">
</div>

<div class="form-group">
<label for="post_tags">Password</label>
<input type="password" class="form-control" name="user_password">
</div>

<div class="form-group">
<input type="submit" class="btn btn-primary" name="create_user" value="Add user">
</div>



</form>
</div>