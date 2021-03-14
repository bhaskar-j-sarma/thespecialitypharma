<!-- Navigation -->
<aside id="menu">
    <div id="navigation">
        <div class="profile-picture">
            <a href="home.php">
            <!-- <img class="m-b" alt="logo" src="images/logo1.png" style="width: 100%;height: 100%;"> -->
            </a>
            <div class="stats-label text-color">
                <span class="font-extra-bold font-uppercase">Admin</span>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                    <small class="text-muted">Admin<b class="caret"></b></small>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">                        
                        <li><a href="webservices/ajax_authentication.php?action=doLogOut">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav" id="side-menu">
            <li>
                <a href="home.php"> <span class="nav-label">Dashboard</span> <span class="label label-success pull-right"></span> </a>
            </li>                      
            <li>
                <a href="#"><span class="nav-label">Orders</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="view_orders.php">View Orders</a></li>
                </ul>
            </li>
             <li>
                <a href="#"><span class="nav-label">Category</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="add_category.php">Add Category</a></li>
                    <li><a href="manage_category.php">View Category</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><span class="nav-label">Products</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="add_products.php">Add Products</a></li>
                    <li><a href="manage_products.php">View Products</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><span class="nav-label">Reviews</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="view_review.php">View Reviews</a></li>
                </ul>
            </li>
            
        </ul>
    </div>
</aside>