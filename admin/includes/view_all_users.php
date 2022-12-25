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
            <th>Make Admin</th>
            <th>Make Subscriber</th>
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

            echo "<td><a href='users.php?change_to_admin=$user_id '><i class='fa fa-thumbs-up' aria-hidden='true'></i></a></td>";
            echo "<td><a href='users.php?change_to_sub=$user_id'><i class='fa fa-thumbs-down' aria-hidden='true'></i></a></td>";
            echo "<td><a href='users.php?delete_user=$user_id'><i class='fa fa-trash'></i></a></td>";
            echo "<td><a href='users.php?edit=$user_id&source=edit_user'><i class='fa fa-edit'></i></a></td>";
            echo "<tr>";
        }

        ?>


    </tbody>
</table>


<?php


if (isset($_GET['change_to_sub'])) {
    $the_comment_id = $_GET['change_to_sub'];
    $query  = "update users set user_role = 'subscriber' where user_id = $the_comment_id ";
    $subscriber_query = mysqli_query($connection, $query);
    confirmQuery($subscriber_query);
    header('Location: users.php');
}

if (isset($_GET['change_to_admin'])) {
    $the_comment_id = $_GET['change_to_admin'];
    $query  = "update users set user_role = 'admin' where user_id = $the_comment_id ";
    $admin_query = mysqli_query($connection, $query);
    confirmQuery($admin_query);
    header('Location: users.php');
}


if (isset($_GET['delete_user'])) {
    $the_user_id = $_GET['delete_user'];
    $query  = "delete from users where user_id = $the_user_id ;";
    $delete_user_query = mysqli_query($connection, $query);
    confirmQuery($delete_user_query);
    header('Location: users.php');
}

?>