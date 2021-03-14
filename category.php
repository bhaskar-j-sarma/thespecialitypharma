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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>
<body>

    <!--================Header Menu Area =================-->
    <?php include 'header.php'; ?>
    <!--================Header Menu Area =================-->
    <section class="head">
        <div class="text-center">
            <div class="mt-3 mb-md-0">
                <h2 style="color: black;">All Categories</h2>
              </div>
        </div>
    </section>
   
  
<!--================ Team section start =================-->  
<section class="team-area area-padding">
    <div class="container-fluid">
        <div class="row">
        <?php
            $sql=$main_page->all_categories();
			while($row=mysqli_fetch_array($sql))
			{ ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card card-team">
                        <img class="card-img rounded-0" src="admin/blogs_images/<?= $row['image'] ?>" alt="">
                        <div class="card-team__body text-center">
                            <h3><a href="#"><?= $row['title'] ?></a></h3>
                            <p><?= $row['description'] ?></p>
                            <div class="text-center">
                                <a class="link_one" href="view_category.php/<?= $row['url'] ?>">learn more</a>
                            </div> 
                        </div>
                    </div>
                </div>
        <?php } ?>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>
    <!-- End footer Area -->






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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