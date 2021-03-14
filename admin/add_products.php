<?php
    include('header_top.php');    
?>
<?php 
    include_once("classes/fetch-data.php");
    $categories=new fetch_data();
?>
<script type="text/javascript" src="js/add_products.js"></script>
<script src="https://cdn.ckeditor.com/4.8.0/full/ckeditor.js"></script>

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-body">
                    <h3>Add Products</h3>                    
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">                
                <div class="panel-body">
                    <form id="blogsFormData"  name ="blogsFormData" enctype="multipart/form-data" method="post">
                        <div class="col-lg-12">
                            <div class="main-image text-center">
                                <span>Thumb Image</span>
                                <div class="event_img_div">
                                    <div class="texthover">
                                        <div class="cross_overlay pull-right">
                                            <span id="removePhoto"><i class="fa fa-times"></i></span>
                                        </div>
                                        <img id="uploadImg" src="blogs_images/default_blogs.jpg" width="100%" height="100%" alt="your image" />
                                        <div class="overlay">
                                            <span>Upload Photo</span>
                                        </div>
                                    </div>
                                </div>
                                <input type="file" id="blogs_main_image" name="blogs_main_image" accept="image/*" style="visibility:hidden">
                            </div>
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" class="form-control" id="product_name" name="product_name">
                            </div>
                            <div class="form-group">
                                <label>Category Name</label>
                                <select class="form-control" id="category_name" name="category_name">
                                    <?php
                                        $sql=$categories->all_categories();
                                        while($row=mysqli_fetch_array($sql))
                                            {
                                    ?>
                                    <option value="<?= $row['id']; ?>"><?= $row['title']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Brand Name</label>
                                <input type="text" class="form-control" id="brand_name" name="brand_name">
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" class="form-control" id="price" name="price">
                            </div>
                            <div class="form-group">
                                <label>Packaging Type</label>
                                <input type="text" class="form-control" id="packaging_type" name="packaging_type">
                            </div>
                            <div class="form-group">
                                <label>Usage/Application</label>
                                <input type="text" class="form-control" id="application" name="application">
                            </div>
                            <div class="form-group">
                                <label>Packaging Size</label>
                                <input type="text" class="form-control" id="packaging_size" name="packaging_size">
                            </div>
                            <div class="form-group">
                                <label>Dosage Form</label>
                                <input type="text" class="form-control" id="dosage_form" name="dosage_form">
                            </div>
                            <div class="form-group">
                                <label>Form of Medicine</label>
                                <input type="text" class="form-control" id="fom" name="fom">
                            </div>


                             <div class="form-group">
                                <label>Product Description</label>
                                <textarea rows="8" style="resize:none;" class="form-control" name="description" id="description"></textarea>
                            </div>
                            <div class="col-md-12 text-center">
                                <div class="form-group text-center">
                                    <input type="button" class="btn btn-success" value="Submit" id="add_blogs">
                                </div>
                            </div>
                        </div>   
                    </form>                 
                </div>
            </div>
        </div>
    </div>
</div>

<script>
	/*$(document).ready(function() {
		$('#description').summernote({
			tabsize: 2,
			height: 200
		});
	});*/
	CKEDITOR.replace( 'description' );
</script>

<?php
    include('footer.php');
?>