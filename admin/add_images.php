<?php
    include('header_top.php');    
?>

<script type="text/javascript" src="js/add_photos.js"></script>
<!--<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>-->
<script src="https://cdn.ckeditor.com/4.8.0/full/ckeditor.js"></script>

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-body">
                    <h3>Add Images</h3>                    
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
                                <span>Upload Photo</span>
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
                                <label>Product Id</label>
                                <input type="text" class="form-control" id="product_id" name="product_id">
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