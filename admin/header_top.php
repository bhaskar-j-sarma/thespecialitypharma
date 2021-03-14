<!DOCTYPE html>
<html>
<head>
<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('Location: index.php');
        exit;
    }
    include('header.php');
    include('sidebar.php');
    include('classes/functions.php');
    error_reporting(0);
    $con = new functions();
?>
<title>Blog</title>
<!-- <link rel="shortcut icon" type="image/x-icon" href="images/mangalam_ico.ico" /> -->
</head>
<body>
<div id="lightboxOverlay" class="lightboxOverlay"></div>
<div class="body_loader text-center">
    <img src="images/loading-bars.svg" width="60%" height="60%">
    <p>Please Wait</p>
</div>   
<!-- Header -->
<div id="header">
    <div class="color-line"></div>
    
    <div id="logo" class="light-version">
        <span>
        Admin
        </span>
    </div>
    <nav role="navigation">
        <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
        <div class="small-logo">
            <span class="text-primary">Admin</span>
        </div>
        
        <div class="mobile-menu">
            <button type="button" class="navbar-toggle mobile-menu-toggle" data-toggle="collapse" data-target="#mobile-collapse">
            <i class="fa fa-chevron-down"></i>
            </button>
            <div class="collapse mobile-navbar" id="mobile-collapse">
                <ul class="nav navbar-nav">                    
                    <li>
                        <a class="" href="webservices/ajax_authentication.php?action=doLogOut">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav no-borders">
                <li class="dropdown">
                    <a href="webservices/ajax_authentication.php?action=doLogOut">
                    <i class="pe-7s-upload pe-rotate-90"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<!-- Main Wrapper -->
<div id="wrapper">