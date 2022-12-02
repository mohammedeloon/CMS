<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Response to</th>
            <th>Date</th>
            <th>Approve</th>
            <th>disapprove</th>
            <th>Delete</th>
            <th>Edit</th>
        
        </tr>
    </thead>
    <tbody>

        <?php

        $query = "select * from comments;";
        $select_comments_query = mysqli_query($connection, $query);
        if (!$select_comments_query) {
            die("query failed" . mysqli_error($connection));
        }
        while ($rows = mysqli_fetch_assoc($select_comments_query)) {
            $comment_id = $rows['comment_id'];
            $comment_post_id = $rows['comment_post_id'];
            $comment_author = $rows['comment_author'];
            $comment_email = $rows['comment_email'];
            $comment_content = $rows['comment_content'];
            $comment_status = $rows['comment_status'];
            $comment_date = $rows['comment_date'];
          


            echo "<tr>";
            echo "<td>{$comment_id}</td>";
            echo "<td>{$comment_author}</td>";
            echo "<td>{$comment_content}</td>";

            //this code relates categories to posts and show the category of each post as specified
            // $query = "select * from post where post_id = $post_comment_id; ";
            // $select_comment_id = mysqli_query($connection, $query);
            // confirmQuery($select_comment_id);
            // $cat_id = '';
            // $cat_title = '';
            // while ($rows = mysqli_fetch_assoc($select_comment_id)) {
            //     $post_id =  $rows['post_id'];
            //     $post_title =  $rows['post_title'];
            //     echo "<td>{$post_title}</td>";
               
            // }
            

          
            echo "<td>{$comment_email}</td>";
          
            echo "<td>{$comment_status}</td>";
            echo "<td>some title</td>";
            echo "<td>{ $comment_date}</td>";
            echo "<td><a href='posts.php?delete= '><i class='fa fa-thumbs-up' aria-hidden='true'></i></a></td>";
            echo "<td><a href='posts.php?delete= '><i class='fa fa-thumbs-down' aria-hidden='true'></i></a></td>";
            echo "<td><a href='posts.php?delete='><i class='fa fa-trash'></i></a></td>";
            echo "<td><a href='posts.php?edit=&source=edit_post'><i class='fa fa-edit'></i></a></td>";
            echo "<tr>";
        }

        ?>


    </tbody>
</table>


<?php

if (isset($_GET['delete'])) {
    $the_post_id = $_GET['delete'];
    $query  = "delete from posts where post_id = $the_post_id ;";
    $delete_post_query = mysqli_query($connection, $query);
    confirmQuery($delete_post_query);
    header('Location: posts.php');
}

?>