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

    

    $(".main-image #blogs_main_image").change(function(){
        readURL(this);
    });

    $(".main-image #removePhoto").click(function(){
    	$('.main-image #uploadImg').attr('src', 'blogs_images/default_blogs.jpg');
        e=$('#blogs_main_image');
        e.wrap('<form>').parent('form').trigger('reset');
        e.unwrap();
    });

    $('.main-image .overlay').click(function(){
    	$('.main-image #blogs_main_image').trigger('click');
    });

	$('#add_blogs').click(function(){
        var product_id = document.forms["blogsFormData"]["product_id"].value;
        

        var flag = validateFields(product_id);

        if(flag == false){            
            return false;
        }

		var formData = new FormData($('#blogsFormData')[0]);
        formData.append('blogs_main_image', $("#blogs_main_image")[0].files[0]);
        formData.append('action', 'add_blogs');

		var product_id = $('#product_id').val();
		$.ajax({
			type: "POST",
			url:"webservices/ajax_add_photos.php",
	        data: formData,
            contentType: false,
            processData: false,
	        beforeSend:function(){
                $('.body_loader').show();
                $('.lightboxOverlay').show();
            },      
            success:function(data){
            //alert(data);   
            console.log(data); 
            //return false;        
                if(data ==1){
                    //toastr.success('Event Successfully Added!');
                    alert('Images Successfully Added!');
                    location.reload();
                }else if(data == 0){
                	alert('Images not Added!');
                }else if(data == 4){
                    alert('Please select Image!');
                }

            },
            complete:function(){
                $('.body_loader').hide();
                $('.lightboxOverlay').hide();
            }
		});
	});

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

function validateFields(product_id){
    if (product_id == null || product_id == "") {
        alert("Product Id must be filled out");
        return false;
    }  
    return true;
}