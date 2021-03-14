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
        var title = document.forms["blogsFormData"]["title"].value; 
        var flag = validateFields(title);

        if(flag == false){            
            return false;
        }

		var formData = new FormData($('#blogsFormData')[0]);
        formData.append('blogs_main_image', $("#blogs_main_image")[0].files[0]);
        formData.append('action', 'add_blogs');

		var title = $('#title').val();
		$.ajax({
			type: "POST",
			url:"webservices/ajax_add_slider.php",
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
                    alert('slider Successfully Added!');
                    location.reload();
                }else if(data == 0){
                    //toastr.danger('Member Not Added!');
                    alert('slider Not Added!');
                }else if(data == 2){
                	alert('"'+title+'" heading text is already added!');
                }else if(data == 4){
                    alert('Pleae select Image!');
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

function validateFields(title){
    if (title == null || title == "") {
        alert("Slider head must be filled out");
        return false;
    }  
    return true;
}