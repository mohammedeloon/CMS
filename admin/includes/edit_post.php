<?php

if (isset($_GET['edit'])) {
    $the_post_id = $_GET['edit'];
}

$query = "select * from posts where post_id = $the_post_id;";
$select_posts_by_id_query = mysqli_query($connection, $query);
if (!$select_posts_by_id_query) {
    die("query failed" . mysqli_error($connection));
}
while ($rows = mysqli_fetch_assoc($select_posts_by_id_query)) {
    //  $post_id = $rows['post_id'];
    $post_author = $rows['post_author'];
    $post_title = $rows['post_title'];
    $post_image = $rows['post_image'];
    $post_tags = $rows['post_tags'];
    $post_status = $rows['post_status'];
    $post_content = $rows['post_content'];
    $post_date = $rows['post_date'];
    $post_category_id = $rows['post_category_id'];
    $post_comment_count = $rows['post_comment_count'];
}




if (isset($_POST['update_post'])) {

    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    // $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];


    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];

    move_uploaded_file($post_image_temp, "../images/$post_image");


// this code keeps the old image if the user updated the post without selecting a new image 
    if (empty($post_image)) {
        $query = "select * from posts where post_id = $the_post_id; ";
        $select_image_query = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_image_query)) {
            $post_image = $row['post_image'];
            
        }

      
    }

    $query = "update posts set post_title = '$post_title' , post_category_id = '$post_category_id' , post_date = now(), post_author = '$post_author' , post_status = '$post_status' , post_tags = '$post_tags' , post_content = '$post_content' , post_image = '$post_image' where post_id = $the_post_id ;";

    $update_cat_query = mysqli_query($connection, $query);
    confirmQuery($update_cat_query);
    // header('Location:posts.php');

    echo '<div class=" alert alert-success " style="width: 400px;" role="alert"> Post Edited successfully! <a  href="posts.php">View Posts</a> </div>';
}


?>

<div class="col-xs-6">
    <form action="" method="post" enctype="multipart/form-data">


        <div class="form-group">
            <label for="title">Post title</label>
            <input type="text" value="<?= $post_title ?>" class="form-control" name="title">
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
            <input type="text" value="<?= $post_author ?>" class="form-control" name="author">
        </div>


        <!-- <div class="form-group">
            <label for="post_status">Post Status</label>
            <input type="text" value="<?= $post_status ?>" class="form-control" name="post_status">
        </div> -->
        <div class="form-group">
        <label for="title">Post Status</label>
        <br>
        <select name="post_status" id="" style="border-radius: 3px;" class="form-select form-select-sm">
                <option value="<?= $post_status?>"><?= $post_status?></option>
                <?php 
                if($post_status == 'published'){
                    echo "<option value='draft'>Draft</option>";

                }else{
                    echo "<option value='published'>Published</option>";
                }
                ?>

        </select>
        </div>
        

        <div class="form-group">
            <img width="200" src="../images/<?= $post_image ?>" alt="">
        </div>


        <div class="form-group">
            <label for="post_image">Post Image</label>
            <input type="file" value="<?= $post_image ?>" class="form-control" name="image">
        </div>

        <div class="form-group">
            <label for="post_tags">Post Tags</label>
            <input type="text" value="<?= $post_tags ?>" class="form-control" name="post_tags">
        </div>

        <div class="form-group">
            <label for="post_content">Post Content</label>
            <textarea class="form-control" name="post_content" id="summernote" cols="30" rows="10">
<?= $post_content ?>
</textarea>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="update_post" value="Publish Post">
        </div>



    </form>
</div>