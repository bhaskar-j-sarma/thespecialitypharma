<?php
if(isset($_POST['submit']))
{
include 'admin/classes/connect.php';

$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$message = $_POST['message'];

$sql="insert into `review` (`name`,`email`,`number`,`message`)values('".$_POST['name']."','".$_POST['email']."','".$_POST['number']."','".$_POST['message']."')";

if($db->query($sql))
{
?>
<script>
alert("Your message has been successfully sent");
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
    <link rel="stylesheet" href="css/style.css?vs=2">
    <link rel="stylesheet" href="css/responsive.css">
</head>
<style>iframe {width:100%;height:100%;}</style>
<body>


    <!--================Header Menu Area =================-->
   <?php include 'header.php'; ?>
    <!--================Header Menu Area =================-->


 
 <!--================Home Banner Area =================-->
 <section class="head">
  <div class="text-center">
      <div class="mt-3 mb-md-0">
          <h2 style="color: black;">Contact Us</h2>
        </div>
  </div>
</section>
    <!--================End Home Banner Area =================-->


  <!-- ================ contact section start ================= -->
  <section class="contact-section area-padding">
    <div class="container-fluid">
     <div class="col-md-12">
        <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=speciality%20pharma%20guwahati&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.whatismyip-address.com/nordvpn-coupon/">nord coupon code</a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:100%;}</style></div>
     </div>
    </div>
  </section>
  <section class="contact-section area-padding">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Get in Touch</h2>
        </div>
        <div class="col-lg-8">
          <form class="form-contact" action="" method="post" id="contactForm" novalidate="novalidate" name = "myForm" onsubmit = "return(validate());">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" placeholder="Enter Message"></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="number" id="number" type="number" placeholder="Enter your Phone Number">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="email" placeholder="Enter email address">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="name" placeholder="Enter Name">
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <button type="submit" name="submit" id="submit" class="button button-contactForm">Send Message</button>
            </div>
          </form>


        </div>

        <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>Birubari, Guwahati,</h3>
              <p> Kamrup, Assam</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
              <h3><a href="tel:454545654">08048877090</a></h3>
              <p>Mon to Fri 9am to 6pm</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3><a href="">specialitypharma@gmail.com</a></h3>
              <p>Send us your query anytime!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->



       

<!-- start footer Area -->
    <?php include 'footer.php'; ?>
    <!-- End footer Area -->


    
<!--================Contact Success and Error message Area =================-->
    <div id="success" class="modal modal-message fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                    <h2>Thank you</h2>
                    <p>Your message is successfully sent...</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals error -->

    <div id="error" class="modal modal-message fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                    <h2>Sorry !</h2>
                    <p> Something went wrong </p>
                </div>
            </div>
        </div>
    </div>
    <!--================End Contact Success and Error message Area =================-->   
    <script type = "text/javascript">
        
           // Form validation code will come here.
           function validate() {
           
              if( document.myForm.name.value == "" ) {
                 alert( "Please provide your name!" );
                 document.myForm.name.focus() ;
                 return false;
              }
              if( document.myForm.email.value == "" ) {
                 alert( "Please provide your Email!" );
                 document.myForm.email.focus() ;
                 return false;
              }
              if( document.myForm.number.value == "" ) {
                 alert( "Please provide your Phone Number!" );
                 document.myForm.number.focus() ;
                 return false;
              }
             if( document.myForm.message.value == "" ) {
                 alert( "Please write your message!" );
                 document.myForm.message.focus() ;
                 return false;
              }
              
              return( true );
           }
        //-->
     </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/stellar.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <!--<script src="js/mail-script.js"></script>-->
    <!--<script src="js/contact.js"></script>-->
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/theme.js"></script>
</body>
</html>