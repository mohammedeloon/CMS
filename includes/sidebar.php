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



<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <?php 
            
            $query = "select cat_title from categories";
            $cat_title_select_query = mysqli_query($connection, $query);
            ?>
            <ul class="list-unstyled">
                <?php 
            while ($rows = mysqli_fetch_assoc($cat_title_select_query)) { 
                $cat_title = $rows['cat_title'];
                echo  "<li><a href='#'> {$cat_title} </a> </li>";
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