<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>user Image</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
            <th>Edit</th>
        
        </tr>
    </thead>
    <tbody>

        <?php

        $query = "select * from users;";
        $select_users_query = mysqli_query($connection, $query);
        if (!$select_users_query) {
            die("query failed" . mysqli_error($connection));
        }
        while ($rows = mysqli_fetch_assoc($select_users_query)) {
            $user_id = $rows['user_id'];
            $username = $rows['username'];
            $user_password = $rows['user_password'];
            $user_firstname = $rows['user_firstname'];
            $user_lastname = $rows['user_lastname'];
            $user_email = $rows['user_email'];
            $user_image = $rows['user_image'];
            $user_role = $rows['user_role'];
            
          


            echo "<tr>";
            echo "<td>{$user_id}</td>";
            echo "<td>{$username}</td>";
            echo "<td>{$user_firstname}</td>";

            echo "<td>{$user_lastname}</td>";
          
            echo "<td>{$user_email}</td>";

            echo "<td>$user_role</td>";
            echo "<td>11$user_image</td>";
           
            echo "<td><a href='comments.php?approve= '><i class='fa fa-thumbs-up' aria-hidden='true'></i></a></td>";
            echo "<td><a href='comments.php?unapprove='><i class='fa fa-thumbs-down' aria-hidden='true'></i></a></td>";
            echo "<td><a href='comments.php?delete_comment='><i class='fa fa-trash'></i></a></td>";
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