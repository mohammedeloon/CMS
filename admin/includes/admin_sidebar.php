<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

<!-- collapse navbar-collapse navbar-ex1-collapse -->
<div   class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li>
            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>

        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#posts"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="posts" class="collapse">
                <li>
                    <a href="./posts.php">View all posts</a>
                </li>
                <li>
                    <a href="posts.php?source=add_post">Add posts</a>
                </li>
               
            </ul>
        </li>
        <li>
            <a href="./categories.php"><i class="fa fa-fw fa-wrench"></i> Catagories</a>
        </li>
       
        <li class="">
            <a href="./comments.php"><i class="fa fa-fw fa-file"></i> Comments</a>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo" class="collapse">
                <li>
                    <a href="users.php">View ALl Users</a>
                </li>
                <li>
                    <a href="users.php?source=add_user">Add User</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
        </li>
    </ul>
</div>
<!-- /.navbar-collapse -->
</nav>