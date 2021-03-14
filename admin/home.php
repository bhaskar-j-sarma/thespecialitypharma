<?php
    include('header_top.php');    
?>
<!--<script type="text/javascript" src="js/dashboard.js"></script>-->

<div class="content animate-panel">
	<div class="row">
        <div class="col-lg-12 text-center m-t-md">
            <h2>
                Welcome to Admin Panel
            </h2>
        </div>
    </div>
    <div class="row">
            <div class="col-lg-3">
                <div class="hpanel">
                    <div class="panel-body text-center h-200">
                        <i class="pe-7s-global fa-4x"></i>

                        <h1 class="m-xs" id="total">0</h1>

                        <h3 class="font-extra-bold no-margins text-success">
                            <a href="manage_blogs.php" style="color: #62cb31;">All Products</a>
                        </h3>
                        <p>Active : <span id="active">0</span>&nbsp;&nbsp;&nbsp;&nbsp;In-Active : <span id="inactive">0</span></p>
                    </div>
                    <div class="panel-footer text-center">
                        <a href="add_blogs.php">Add New Products</a>
                    </div>
                </div>
            </div>
        </div>
</div>


<?php
    include('footer.php');
?>