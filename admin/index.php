<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['username'])) {
    header('Location: home.php');
}

?>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Page title -->
    <title>Blog</title>
    <!-- <link rel="shortcut icon" type="image/x-icon" href="images/mangalam_ico.ico" /> -->

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->

    <!-- Vendor styles -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.css" />
    <link rel="stylesheet" href="vendor/metisMenu/metisMenu.css" />
    <link rel="stylesheet" href="vendor/animate/animate.css" />
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css" />

    <!-- App styles -->
    <link rel="stylesheet" href="fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="fonts/pe-icon-7-stroke/css/helper.css" />
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/main.css">

</head>
<body class="blank">

<!--[if lt IE 7]>
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="color-line"></div>

<div class="back-link">
  
</div>
<div id="lightboxOverlay" class="lightboxOverlay"></div>
<div class="body_loader text-center">
    <img src="images/loading-bars.svg" width="60%" height="60%">
    <p>Please Wait</p>
</div>
<div class="login-container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md">
                <h3>Pharma Admin Login</h3>
               
            </div>
            <div class="hpanel">
                <div class="panel-body">
                        <form name="loginForm" class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="" title="Please enter you username" required value="" name="username" id="username" class="form-control">
                               
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required value="" name="password" id="password" class="form-control">
                               
                            </div>
                           
                            <input type ="button"  value ="login" class="btn btn-success btn-block" id ="login">
                           
                        </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <strong>Megsan</strong><br/> <?php echo date("Y");?> 
        </div>
    </div>
</div>




<!-- Vendor scripts -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/jquery-ui.min.js"></script>
<script src="vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/metisMenu/metisMenu.min.js"></script>
<script src="vendor/iCheck/icheck.min.js"></script>
<script src="vendor/sparkline/index.js"></script>

<!-- App scripts -->
<script src="js/login.js"></script>


<script>

</script>
</body>


</html>