<?php

if (isset($_POST['create_post'])) {
    $post_title       = escape($_POST['title']);
    $post_author      = escape($_POST['author']);
    $post_category_id = escape($_POST['post_category']);
    $post_status      = escape($_POST['post_status']);
    $post_image       = escape($_FILES['image']['name']);
    $post_image_temp  = escape($_FILES['image']['tmp_name']);
    $post_tags        = escape($_POST['post_tags']);
    $post_content     = escape($_POST['post_content']);
    $post_date        = escape(date('d-m-y'));
    move_uploaded_file($post_image_temp, "../images/$post_image");
    $query = "INSERT INTO posts (post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags,  post_status)  ";
    $query .= "values ($post_category_id , '$post_title', '$post_author' , now() , '$post_image' , '$post_content', '$post_tags' , '$post_status')";
    $add_post_query       = mysqli_query($connection, $query);
    $the_last_inserted_id = mysqli_insert_id($connection);
    confirmQuery($add_post_query);
    echo "<div class=' alert alert-success ' style='width: 400px;' role='alert'> Post created successfully! <a  href='../post.php?p_id=$the_last_inserted_id'>View Post</a> or <a href='posts.php'>view all posts</a></div>";
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
                $query = 'select * from categories;';
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
        <div class="form-group">
            <label for="title">Post Status</label>
            <br>
            <select name="post_status" id="" style="border-radius: 3px;" class="form-select form-select-sm">
                <option value="draft">Post Status</option>
                <option value="published">Published</option>
                <option value="draft">Draft</option>
            </select>
        </div>
        <div class="form-group">
            <label for="post_image">Post Image</label>
            <input type="file" class="form-control" name="image">
        </div>
        <div class="form-group">
            <label for="post_tags">Post Tags</label>
            <input type="text" class="form-control" name="post_tags">
        </div>
        <div class="form-group">
            <label for="summernote">Post Content</label>
            <textarea class="form-control" name="post_content" id="summernote" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
        </div>
    </form>
</div>