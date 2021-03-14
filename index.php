<?php
    include_once("class/fetch_data.php");
    $main_page=new fetch_data();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>The Speciality Pharma</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="vendors/animate-css/animate.css">
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css?vs=1">
    <link rel="stylesheet" href="css/responsive.css">
</head>
<body>
   <?php include 'header.php'; ?>
    <section class="banner-area d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <h1>The Speciality<br>
                    Pharma</h1>
                    <p>We The Speciality Pharma, from 2014, are serving our customers by wholesaling and trading a high-quality Pharmaceutical Products. We deals with all types of Chemotherapy, Cancer Medicine, Hepatitis B, Hepatitis C and all kind of kidney and Nephrology Medicines.</p>
                    <a href="" class="main_btn">Make an Appointment</a>
                    <a href="http://thespecialitypharma.com/category.php" class="main_btn_light">View Department</a>
                </div>
            </div>
        </div>
    </section>
        <div class="text-center">
            <br><br>
            <div class="header">
                <h2>About Us</h2>
            </div>
            <br><br>
        </div>
        <div class="container">
            <div class="area-heading row">
                <div class="col-md-6 col-xl-7">
                    <div class="about-content">    
                        <p>We The Speciality Pharma, from 2014, are serving our customers by wholesaling and trading a high-quality Pharmaceutical Products. We deals with all types of Chemotherapy, Cancer Medicine, Hepatitis B, Hepatitis C and all kind of kidney and Nephrology Medicines. All offered products are prepared at vendors end using best quality ingredients. This pharmaceutical products range is highly required for their features like high effectiveness, and long shelf life.</p>
                        <p>Banking on our vendor base, we are able to offer optimum quality products for our customers. Our vendors use the latest technologies in the operational field. Owing to our high-quality pharmaceutical products; we have respected position in this domain. Our company is famous for providing pharmaceutical products of superior quality at very affordable rates.</p>
                    </div>  
                </div>
                <div class="col-md-6 col-xl-5">
                    <img src="img/undraw_medicine_b1ol.svg">
                </div>
            </div>
        </div>
    </div>            
    <section class="feature-section">
            <div class="container">
                <div class="text-center" style="color: aliceblue;">
                    <h2>Why Us?</h2><br>
                    <div class="col align-self-center">
                        <p>Emphasizing on the quality of offered pharmaceutical products, we believe in making a long-term relationship with our customers. For the aim of catering industry quality norms, our vendors prepared products through a series of predefined quality checks.</p>
                    </div>
                    <br>
                    <hr>
            </div>
        </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-feature text-center text-lg-left" style="border-radius: 6px;">
                            <h3 class="card-feature__title"><span class="card-feature__icon">
                                <i class="ti-layers"></i>
                            </span>Rich vendor base</h3>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-feature text-center text-lg-left" style="border-radius: 6px;">
                           <h3 class="card-feature__title"><span class="card-feature__icon">
                                <i class="ti-heart-broken"></i>
                            </span>Best quality products</h3>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-feature text-center text-lg-left" style="border-radius: 6px;">
                            <h3 class="card-feature__title"><span class="card-feature__icon">
                                <i class="ti-headphone-alt"></i>
                            </span>On time delivery</h3>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-feature text-center text-lg-left" style="border-radius: 6px;">
                            <h3 class="card-feature__title"><span class="card-feature__icon">
                                <i class="ti-layers"></i>
                            </span>Good market position</h3>
                        </div>
                    </div>

                </div>
            </div>
    </section>
    <section class="team-area area-padding">
        <div class="container-fluid">
            <div class="area-heading row">
                <div class="col-md-12 col-xl-12">
                    <h3>Explore our categories</h3>
                </div>
            </div>
            <div class="row">
            <?php
            $sql=$main_page->all_categories();
			while($row=mysqli_fetch_array($sql))
			{ ?>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-team">
                        <img class="card-img" src="admin/blogs_images/<?= $row['image'] ?>" alt="" style="border-radius: 20px 20px 0px 0px;">
                        <div class="card-team__body text-center">
                            <h3><a href="#"><?= $row['title'] ?></a></h3>
                            <p><?= $row['description'] ?></p>
                            <div class="text-center">
                                <a class="link_one" href="view_category.php/<?= $row['url'] ?>">View More</a>
                            </div> 
                        </div>
                    </div>
                </div>
        <?php } ?>
                
                </div>
            </div>
        </div>
    </section>
   <?php include 'footer.php'; ?>
<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/stellar.js"></script>
<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/contact.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/theme.js"></script>
</body>
</html>