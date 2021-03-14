<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-106486838-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-106486838-1');
    </script>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WJW4RVM');</script>
    <!-- End Google Tag Manager -->
<?php
    include('header_top.php');
  /*  error_reporting(0);
    include('classes/functions.php');
    $con = new functions();
    session_start(); */
    //$date = $con->get_datetime();

    $get_blogs = "SELECT * FROM products WHERE id=".$_GET['id'];
    //echo $getLmaievent; exit;
    $result_get_blogs = $con->data_select($get_blogs);

?>
<?php 
    include_once("classes/fetch-data.php");
    $categories=new fetch_data();
?>
<script type="text/javascript" src="js/manage_products.js"></script>
<script src="https://cdn.ckeditor.com/4.8.0/full/ckeditor.js"></script>

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-body">
                    <h3>Update Products</h3>                    
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        	<div class="hpanel">               	
                <div class="panel-body">
                	<form id="manage_blogsFormData" name="manage_blogsFormData" method="post">
	                	<div class="col-lg-12">
	                		<div class="main-image text-center">
	                			<span>Upload Photo</span>
                                <div class="event_img_div">
                                    <div class="texthover">
                                        <div class="cross_overlay pull-right">
                                            <span id="removePhoto"><i class="fa fa-times"></i></span>
                                        </div>
                                        <img id="uploadImg" src="blogs_images/<?php echo $result_get_blogs[0]['tbumb_image'];?>" width="100%" height="100%" alt="your image" />
                                        <div class="overlay">
                                            <span>Upload Photo</span>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="hidden_img_name" name="hidden_img_name" value="<?php echo $result_get_blogs[0]['tbumb_image'];?>">
								<input type="file" id="manage_blogs_main_image" name="manage_blogs_main_image" accept="image/*" style="visibility:hidden">
                            </div>
	                		<div class="form-group">
	                			<label>Product Name</label>
                                <input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></input>
	                			<input type="text" class="form-control" name="product_name" id="product_name" value="<?php echo $result_get_blogs[0]['product_name'];?>">
	                		</div>
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" class="form-control" name="category_name" id="category_name" value="<?php echo $result_get_blogs[0]['category_name'];?>"><br>
                                <?php
                                    $sql=$categories->all_categories();
                                    while($row=mysqli_fetch_array($sql))
                                        {
                                ?>
                                <span class="badge"><?= $row['title']; ?></span>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label>Brand Name</label>
                                <input type="text" class="form-control" name="brand_name" id="brand_name" value="<?php echo $result_get_blogs[0]['brand_name'];?>">
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" class="form-control" name="price" id="price" value="<?php echo $result_get_blogs[0]['price'];?>">
                            </div>
                            <div class="form-group">
                                <label>Packaging Type</label>
                                <input type="text" class="form-control" id="packaging_type" name="packaging_type" value="<?php echo $result_get_blogs[0]['packaging_type'];?>">
                            </div>
                            <div class="form-group">
                                <label>Usage/Application</label>
                                <input type="text" class="form-control" id="application" name="application" value="<?php echo $result_get_blogs[0]['application'];?>">
                            </div>
                            <div class="form-group">
                                <label>Packaging Size</label>
                                <input type="text" class="form-control" id="packaging_size" name="packaging_size" value="<?php echo $result_get_blogs[0]['packaging_size'];?>">
                            </div>
                            <div class="form-group">
                                <label>Dosage Form</label>
                                <input type="text" class="form-control" id="dosage_form" name="dosage_form" value="<?php echo $result_get_blogs[0]['dosage_form'];?>">
                            </div>
                            <div class="form-group">
                                <label>Form of Medicine</label>
                                <input type="text" class="form-control" id="fom" name="fom" value="<?php echo $result_get_blogs[0]['form_of_medicine'];?>">
                            </div>

                            <div class="form-group">
                                <label>Category Description</label>
                                <textarea rows="8" style="resize:none;" class="form-control" name="description" id="description"><?php echo trim($result_get_blogs[0]['description']);?>
                                </textarea>
                            </div>

                            <div class="form-group text-center">
                                <input type="button" class="btn btn-success" value="Submit" id="edit_blogs">
                            </div>
	                	      		
	                	</div>
	            
	                </form>               	
                </div>
            </div>
        </div>
    </div>
</div>

<script>

$(document).ready(function(){

	// Toastr options
    toastr.options = {
        "debug": false,
        "newestOnTop": false,
        "positionClass": "toast-top-center",
        "closeButton": true,
        "debug": false,
        "toastClass": "animated fadeInDown",
    };

 CKEDITOR.replace( 'description' );

});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
            $('#uploadImg').attr('src', e.target.result);
        }            
        reader.readAsDataURL(input.files[0]);
    }
}

</script>


<?php
    include('footer.php');
?>