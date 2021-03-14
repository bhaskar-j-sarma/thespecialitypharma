<?php
include_once("class/fetch_data.php");
$product_category=new fetch_data();
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
$url = $uri_segments[2];
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>The Speciality Pharma</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/themify-icons.css">
    <link rel="stylesheet" href="../../css/flaticon.css">
    <link rel="stylesheet" href="../../vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="../../vendors/animate-css/animate.css">
    <!-- main css -->
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/responsive.css">
</head>
<body>

    <!--================Header Menu Area =================-->
    <header class="header_area">
        <div class="top_menu row m0">
            <div class="container">
                <div class="float-left">
                    <a class="dn_btn" href="mailto:specialitypharma@gmail.com"><i class="ti-email"></i>specialitypharma@gmail.com</a>
                    <span class="dn_btn"> <i class="ti-location-pin"></i>Birubari, Guwahati, Kamrup, Assam</span>
                </div>
                <div class="float-right">
                    <ul class="list header_social">
                        <li><a href="#"><i class="ti-facebook"></i></a></li>
                        <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                        <li><a href="#"><i class="ti-linkedin"></i></a></li>
                        <li><a href="#"><i class="ti-skype"></i></a></li>
                        <li><a href="#"><i class="ti-vimeo-alt"></i></a></li>
                    </ul>	
                </div>
            </div>	
        </div>	
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.html"><img src="../img/brand/logo.png" alt="" style="max-height: 80px; margin-top: 0px;"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li> 
                            <li class="nav-item"><a class="nav-link" href="../about-us.php">About</a></li> 
                            <li class="nav-item"><a class="nav-link" href="../category.php">Category</a></li> 

                          <!--  <li class="nav-item"><a class="nav-link" href="department.html">Business Segments</a></li> 
                            <li class="nav-item"><a class="nav-link" href="doctors.html">Doctors</a></li>  -->  
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products</a>
                               <!-- <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="">Pharmaceutical Tablets</a></li>
                                    <li class="nav-item"><a class="nav-link" href="">Pharmaceutical Capsules</a></li>
                                    <li class="nav-item"><a class="nav-link" href="">Pharmaceutical Injections</a></li>
                                    <li class="nav-item"><a class="nav-link" href="">Dexamethasone Tablets</a></li>
                                    <li class="nav-item"><a class="nav-link" href="">New Items</a></li>
                                </ul>-->
                            </li> 
                            <li class="nav-item"><a class="nav-link" href="../contact.php">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Menu Area =================-->
    <section class="head">
        <div class="text-center">
            <div class="mt-3 mb-md-0">
                <h2 style="color: black;">View Products</h2>
              </div>
        </div>
    </section>
   
  
<!--================ Team section start =================-->  
<section class="team-area area-padding">
    <div class="container">
        <div class="row">
           
           
        <?php
              // concatanation with "/"
            $data2 = "/";
            $result = $url . '' . $data2;
             $sql1=$product_category->select_category($result);
             while($row1=mysqli_fetch_array($sql1))
             {
                $sql=$product_category->selected_products($row1['id']);
                while($row=mysqli_fetch_array($sql))
                { ?>
           <div class="col-12 col-md-6 col-lg-4">
                    <div class="card card-team">
                        <img class="card-img rounded-0" src="../../admin/blogs_images/<?= $row['tbumb_image'] ?>" alt="">
                        <div class="card-team__body text-center">
                            <h3><a href="#"><?= $row['product_name'] ?></a></h3>
                            <p><?= $row['description'] ?></p>
                            <div class="text-center">
                                <a class="link_one" href="../../single_product.php/<?= $row['url'] ?>">learn more</a>
                            </div> 
                        </div>
                    </div>
            </div>
<?php         } } ?>
         
        </div>
    </div>
</section>
<!--================ Team section end =================--> 

     

      <!-- start footer Area -->
       <?php include 'footer.php'; ?>
    <!-- End footer Area -->






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../js/jquery-2.2.4.min.js"></script>
    <script src="../../js/popper.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/stellar.js"></script>
    <script src="../../vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="../../js/jquery.ajaxchimp.min.js"></script>
    <script src="../../js/waypoints.min.js"></script>
    <script src="../../js/mail-script.js"></script>
    <script src="../../js/contact.js"></script>
    <script src="../../js/jquery.form.js"></script>
    <script src="../../js/jquery.validate.min.js"></script>
    <script src="../../js/mail-script.js"></script>
    <script src="../../js/theme.js"></script>
</body>
</html>