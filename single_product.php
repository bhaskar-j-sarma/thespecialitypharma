<?php
if(isset($_POST['submit']))
{
  include 'admin/classes/connect.php';
  $text = $_POST['text'];
  $email = $_POST['email'];
  $number = $_POST['number'];
  $address = $_POST['address'];
  $sql="insert into `orders` (`email_id`,`phone_number`,`product`,`address`)values('".$_POST['email']."','".$_POST['number']."','".$_POST['text']."','".$_POST['address']."')";

  if($db->query($sql))
  {
?>
<script>
  alert("Your order has been successfully Placed");
</script>
<?php			
  }
  else
  {
?>
    <script>
    alert("Sorry! An error occured");
    </script>
<?php
}
}
?>
<?php
include_once("class/fetch_data.php");
$product_single=new fetch_data();
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
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/themify-icons.css">
    <link rel="stylesheet" href="../../css/flaticon.css">
    <link rel="stylesheet" href="../../vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="../../vendors/animate-css/animate.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/responsive.css">
</head>
<body>
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
                    <a class="navbar-brand logo_h" href="http://thespecialitypharma.com/"><img src="../../img/brand/logo.png" alt="" style="max-height: 80px; margin-top: 0px;"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="http://thespecialitypharma.com/">Home</a></li> 
                            <li class="nav-item"><a class="nav-link" href="http://thespecialitypharma.com/about-us.php">About</a></li> 
                            <li class="nav-item"><a class="nav-link" href="http://thespecialitypharma.com/category.php">Category</a></li> 

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
                            <li class="nav-item"><a class="nav-link" href="http://thespecialitypharma.com/contact.php">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Menu Area =================-->
    
   
  
<!--================ Team section start =================-->  
<section class="team-area area-padding">
    <div class="container">
    <?php

         // concatanation with "/";
            $data2 = "/";
            $result = $url . '' . $data2;
            $sql=$product_single->selected_product($result);
            while($row=mysqli_fetch_array($sql))	{	?>
       <div class="row">
           <div class="col-md-5">
                <img src="../../admin/blogs_images/<?= $row['tbumb_image'] ?>">
           </div>
           <div class="col-md-7">
               <h3 class="product-name"><?= $row['product_name'] ?></h3>
               <div class="product-details">
                   <p><span><i class="fa fa-check"></i></span>Brand : <span><?= $row['brand_name'] ?></span></p>
                   <p><span><i class="fa fa-check"></i></span>Packaging Type : <span><?= $row['packaging_type'] ?></span></p>
                   <p><span><i class="fa fa-check"></i></span>Usage/Application : <span><?= $row['application'] ?></span></p>
                   <p><span><i class="fa fa-check"></i></span>Packaging Size : <span><?= $row['packaging_size'] ?></span></p>
                   <p><span><i class="fa fa-check"></i></span>Dosage Form : <span><?= $row['dosage_form'] ?></span></p>
                   <p><span><i class="fa fa-check"></i></span>Form of Medicine : <span><?= $row['form_of_medicine'] ?></span></p>
                   <p class="product-price"><span><i class="fa fa-rupee-sign"></i></span>&nbsp;&nbsp;<span><?= $row['price'] ?>/-</span></p><br>
                   <button type="button" class="btn btn-primary booknow" data-toggle="modal" data-target="#exampleModalLong">Order Now</button>
               </div>
           </div>
       </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Order your medicines</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="form-group">
            <label for="exampleInputEmail1">Product Name : <?= $row['product_name'] ?></label>
            <input type="hidden" name="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?= $row['product_name'] ?>" value="<?= $row['product_name'] ?>">
           
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Phone Number *</label>
            <input type="number" name="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Phone number" required>
           
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address *</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" required>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Address *</label>
          <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3" required></textarea>
        </div>
      </div>
      <?php } ?>
      <div class="modal-footer">
      <button type="submit" name="submit" id="submit" class="button button-contactForm">Place Order</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal End -->
<!--================ Team section end =================--> 

     

      <!-- start footer Area -->
<?php include 'footer.php'; ?>
    <!-- End footer Area -->






    <!-- Optional JavaScript -->
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