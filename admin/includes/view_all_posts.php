<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Tags</th>
                                <th>Comments</th>
                                <th>Date</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php 
                        
                            $query = "select * from posts;";
                            $select_posts_query = mysqli_query($connection , $query);
                            if (!$select_posts_query) {
                                die("query failed" . mysqli_error($connection));
                            }
                            while ($rows = mysqli_fetch_assoc($select_posts_query)) {
                                $post_id = $rows['post_id'];
                                $post_author = $rows['post_author'];
                                $post_title = $rows['post_title'];
                                $post_image = $rows['post_image'];
                                $post_tags = $rows['post_tags'];
                                $post_status = $rows['post_status'];
                                // $post_content = $rows['post_content'];
                                $post_date = $rows['post_date'];
                                $post_category_id = $rows['post_category_id'];
                                $post_comment_count = $rows['post_comment_count'];


                                echo "<tr>";
                                echo "<td>{$post_id}</td>";
                                echo "<td>{$post_author}</td>";
                                echo "<td>{$post_title}</td>";
                                echo "<td>{$post_category_id}</td>";
                                echo "<td>{$post_status}</td>";
                                echo "<td><img class='img-responsive' width='100px' src='../images/$post_image' alt=''></td>";
                                echo "<td>{$post_tags}</td>";
                                echo "<td>{ $post_comment_count}</td>";
                                echo "<td>{$post_date}</td>";
                                echo "<td><a href='posts.php?delete=$post_id '><i class='fa fa-trash'></i></a></td>";
                                echo "<td><a href='posts.php?edit=$post_id&source=edit_post'><i class='fa fa-edit'></i></a></td>";
                                echo "<tr>";
                            }

                        ?>


                        </tbody>
                    </table>


                    <?php 
                    
                    if (isset($_GET['delete'])) {
                        $the_post_id = $_GET['delete'];
                        $query  = "delete from posts where post_id = $the_post_id ;";
                        $delete_post_query = mysqli_query($connection , $query);
                        confirmQuery($delete_post_query);
                        header('Location: posts.php');
                    }
                    
                    ?>