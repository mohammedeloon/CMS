
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Edit Category:</label>

                                <?php 
                                if (isset($_GET["edit"])) {
                                    $cat_id = $_GET["edit"];
                                    $query = "select * from categories where cat_id = $cat_id";
                                    $select_categories_id = mysqli_query($connection, $query);
                                    while ($rows = mysqli_fetch_assoc($select_categories_id)) {
                                       $cat_id =  $rows['cat_id'];
                                       $cat_title =  $rows['cat_title'];
                                 ?>

                                    <input class="form-control" type="text" value="<?php if (isset($cat_title)) {
                                       echo $cat_title;
                                    } ?>" name="cat_title">

                                 <?php }} ?>
                                
                                <?php 
                                //update category
                                
                                if (isset($_POST['update_category'])) {
                                    
                                    $the_cat_title = $_POST['cat_title'];
                                    $query = "update categories set cat_title = '$the_cat_title' where cat_id = $cat_id ";
                                    $update_cat_query = mysqli_query($connection,$query);
                                    header('Location: categories.php');
                                    if (!$update_cat_query) {
                                        die("Query failed" . mysqli_error($connection));
                                    } 

                                }
                                
                                
                                
                                
                                
                                
                                ?>
                   
                                
                             
                                
                            </div>
                           
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
                            </div>
                        </form>
                   