<?php 

function confirmQuery($query){
    global $connection;
if (!$query) {
    die("Query failed " . mysqli_error($connection));
}


}


function insert_categories(){
    global $connection;
    if (isset($_POST["submit"])) {
        $cat_title = $_POST["cat_title"];
        if ($cat_title == "" || empty($cat_title)) {
            echo "This field should not be empty!";
        } else {
            $query = "INSERT INTO `categories` ( `cat_title`) VALUES ('$cat_title');";
            $insert_cat_query = mysqli_query($connection, $query);
            header('Location: categories.php');
            if (!$insert_cat_query) {
                die("Query Failed" . mysqli_error($connection));
            }
        }
    }
}

function delete_category(){
    
    global $connection;
    if (isset($_GET['delete'])) {
                                    
        $category_id = $_GET['delete'];
        $query = "delete from categories where cat_id = $category_id ";
        $delete_cat_query = mysqli_query($connection,$query);
        header('Location: categories.php');
        if (!$delete_cat_query) {
            die("Query failed" );
        } 

    }
}




?>