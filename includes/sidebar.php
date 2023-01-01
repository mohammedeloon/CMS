<div class="col-md-4">





    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="POST">
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>

    <!-- login -->


    <div class="well">

        <?php if(isset($_SESSION['role'])): ?>
            <h4>Loggged in as <?= $_SESSION['username'] ?></h4>
            <a href="includes/logout.php" class="btn btn-primary">Logout</a>
        <?php else: ?>
            <h4>Login</h4>
        <form action="includes/login.php" method="POST">
            <div class="form-group">
                <input name="username" placeholder="Enter username" type="text" class="form-control">
            </div>
            <div class="input-group">
                <input name="password" placeholder="Enter password" type="password" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-primary" name="login" type="submit">Login</button>

                </span>

            </div>
        </form>
        <?php endif; ?>
        
       
        <!-- /.input-group -->
    </div>




    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <?php

                $query = "select * from categories";
                $cat_title_select_query = mysqli_query($connection, $query);
                ?>
                <ul class="list-unstyled">
                    <?php
                    while ($rows = mysqli_fetch_assoc($cat_title_select_query)) {
                        $cat_title = $rows['cat_title'];
                        $cat_id = $rows['cat_id'];
                        echo  "<li><a href='category.php?category=$cat_id'> {$cat_title} </a> </li>";
                    }


                    ?>
                </ul>
            </div>

        </div>
        <!-- /.row -->
    </div>


    <!-- Side Widget Well -->
    <?php include("widget.php");  ?>

</div>