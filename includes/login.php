<?php include("db.php"); ?>
<?php session_start(); ?>

<?php 

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];


    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "select * from users where username  = '$username' and user_password = '$password' ";
    $select_user_query = mysqli_query($connection , $query);
    if(!$select_user_query){

        die("query failed" . mysqli_error($connection));
    }
   
    while($row = mysqli_fetch_assoc($select_user_query)){
        
         $user_id = $row['user_id'];
         $user_username = $row['username'];
         $user_password = $row['user_password'];
         $user_firstname = $row['user_firstname'];
         $user_lastname = $row['user_lastname'];
         $user_role = $row['user_role'];
        
    }
    

    if ($username === $user_username && $password === $user_password) {
        $_SESSION['username'] = $user_username;
        $_SESSION['firstname'] = $user_firstname;
        $_SESSION['lastname'] = $user_lastname;
        $_SESSION['role'] = $user_role;
        header("Location: ../admin");
        
    }else{
        header("Location: ../index.php");
    }
   
    // $username === $user_username && $password === $user_password
    // password_verify($password , $user_password);
    // exit;
    
}

?>