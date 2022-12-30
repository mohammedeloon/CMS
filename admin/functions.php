<?php 


function users_online(){
    if(isset($_GET['usersonline'])){
       
        global $connection;
        if(!$connection){
            session_start();
            include('../includes/db.php');
            $session  = session_id();
            $time     = time();
            $time_out_in_seconds = 60;
            $time_out = $time - $time_out_in_seconds;
            $query      = "select * from users_online where session = '$session'";
            $send_query = mysqli_query($connection , $query);
            $count      = mysqli_num_rows($send_query);
            if($count == null){
                mysqli_query($connection , "insert into users_online(session , time) values('$session' , '$time')");
            }else{
                mysqli_query($connection , "update users_online set time =  $time where session = '$session'");
            }

            $user_online =  mysqli_query($connection , "select * from users_online where time > '$time_out'");
            echo $count_users = mysqli_num_rows($user_online);
            }
}}

users_online();

function confirmQuery($query){
    global $connection;
    if (!$query) {
    die("Query failed " . mysqli_error($connection));
    }}
function escape($string){
    global $connection;
    return mysqli_real_escape_string($connection , trim($string));
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
            } }}}
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
 }}
?>