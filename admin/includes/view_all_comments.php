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


            $select_query = "select * from posts where post_id = $comment_post_id ";
            $selct_post_query = mysqli_query($connection , $select_query);
            confirmQuery($selct_post_query);

            while ($rows = mysqli_fetch_assoc($selct_post_query)) {
                $post_id = $rows['post_id'];
                $post_title = $rows['post_title'];
                echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a> </td>";
               
            }
            

            




            echo "<td>{ $comment_date}</td>";
            echo "<td><a href='comments.php?approve=$comment_id '><i class='fa fa-thumbs-up' aria-hidden='true'></i></a></td>";
            echo "<td><a href='comments.php?unapprove=$comment_id'><i class='fa fa-thumbs-down' aria-hidden='true'></i></a></td>";
            echo "<td><a href='comments.php?delete_comment=$comment_id'><i class='fa fa-trash'></i></a></td>";
            echo "<td><a href='posts.php?edit=&source=edit_comment'><i class='fa fa-edit'></i></a></td>";
            echo "<tr>";
        }

        ?>


    </tbody>
</table>


<?php


if (isset($_GET['unapprove'])) {
    $the_comment_id = $_GET['unapprove'];
    $query  = "update comments set comment_status = 'unapproved' where comment_id = $the_comment_id ";
    $unapprove_comment_query = mysqli_query($connection, $query);
    confirmQuery($unapprove_comment_query);
    header('Location: comments.php');
}

if (isset($_GET['approve'])) {
    $the_comment_id = $_GET['approve'];
    $query  = "update comments set comment_status = 'approved' where comment_id = $the_comment_id ";
    $approve_comment_query = mysqli_query($connection, $query);
    confirmQuery($approve_comment_query);
    header('Location: comments.php');
}


if (isset($_GET['delete_comment'])) {
    $the_comment_id = $_GET['delete_comment'];
    $query  = "delete from comments where comment_id = $the_comment_id ;";
    $delete_comment_query = mysqli_query($connection, $query);
    confirmQuery($delete_comment_query);
    header('Location: comments.php');
}

?>