<?php 

if (isset($_POST['create_user'])) {
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    // $post_status = $_POST['post_status'];


    // $post_image = $_FILES['image']['name'];
    // $post_image_temp = $_FILES['image']['tmp_name'];

   
    
    
    // $post_tags = $_POST['post_tags'];
    // $post_content = $_POST['post_content'];
    // $post_date = date('d-m-y');
  

    // move_uploaded_file($post_image_temp, "../images/$post_image");


    $query = "INSERT INTO users (user_firstname, user_lastname, user_role, username, user_email, user_password)  ";

    $query .= " values ('$user_firstname' , '$user_lastname', '$user_role'  , '$username' , '$user_email', '$user_password'   )";
   
    $add_user_query = mysqli_query($connection, $query);

    confirmQuery($add_user_query);


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





<!-- <div class="form-group">
<label for="post_image">Post Image</label>
<input type="file" class="form-control" name="image">
</div> -->

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


<!-- <div class="form-group">
<label for="post_content">Email</label>
<textarea class="form-control" name="email" id="" cols="30" rows="10"></textarea>
</div> -->

<div class="form-group">
<input type="submit" class="btn btn-primary" name="create_user" value="Add user">
</div>



</form>
</div>