<?php 

if (isset($_POST['create_post'])) {
    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    $post_category_id = $_POST['post_category'];
    // $post_status = $_POST['post_status'];


    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

   
    
    
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');
  

    move_uploaded_file($post_image_temp, "../images/$post_image");


    $query = "INSERT INTO posts (post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status)  ";

    $query .= " values ($post_category_id , '$post_title', '$post_author' , now() , '$post_image' , '$post_content', '$post_tags' , '$post_status'  )";
   
    $add_post_query = mysqli_query($connection, $query);

    confirmQuery($add_post_query);


}

?>



<div class="col-xs-6">
<form action="" method="post" enctype="multipart/form-data">


<div class="form-group">
<label for="title">Post title</label>
<input type="text" class="form-control" name="title">
</div>



<div class="form-group">

<label for="title">Category</label>
<br>
<select style="border-radius: 3px;" class="form-select form-select-sm" name="post_category" id="post_category">

    <option selected>Select Category</option>
    <?php

    $query = 'select cat_title from categories;';
    $selet_cat_query = mysqli_query($connection, $query);
    confirmQuery($selet_cat_query);

    while ($rows = mysqli_fetch_assoc($selet_cat_query)) {
        $cat_title =  $rows['cat_title'];
        $cat_id =  $rows['cat_id'];
        echo "<option value=' $cat_id'> $cat_title </option>";
    }
    ?>

</select>



</div>




<div class="form-group">
<label for="title">Post Author</label>
<input type="text" class="form-control" name="author">
</div>



<!-- <div class="form-group">
<label for="post_status">Post Status</label>
<input type="text" class="form-control" name="post_status">
</div> -->


<div class="form-group">
<label for="post_image">Post Image</label>
<input type="file" class="form-control" name="image">
</div>

<div class="form-group">
<label for="post_tags">Post Tags</label>
<input type="text" class="form-control" name="post_tags">
</div>

<div class="form-group">
<label for="post_content">Post Content</label>
<textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
</div>

<div class="form-group">
<input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
</div>



</form>
</div>