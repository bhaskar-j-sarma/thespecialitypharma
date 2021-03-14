$(function(){

    //View in table
    create_datatable();
    
    //Redirect to edit page
    $('#manage_blogs tbody').on( 'click', '.view_manage_blogs', function () {
        var id = $(this).attr('data-id'); 
        //alert(id);
        window.location = 'edit_category.php?id='+id;
    } );

   $(".main-image #manage_blogs_main_image").change(function(){
        readURL(this);
    });

    $(".main-image #removePhoto").click(function(){
        var h_img = $('#hidden_img_name').val();
        $('.main-image #uploadImg').attr('src', 'manage_blogs/'+h_img);
        e=$('#manage_blogs_main_image');
        e.wrap('<form>').parent('form').trigger('reset');
        e.unwrap();
    });

    $('.main-image .overlay').click(function(){
        $('.main-image #manage_blogs_main_image').trigger('click');
    });

    $('#edit_blogs').click(function(){

        var title = document.forms["manage_blogsFormData"]["title"].value;
        //var description = document.forms["manage_blogsFormData"]["description"].value;
        var description = CKEDITOR.instances.description.getData()

       /* alert(title+"  "+description);*/
        

        var flag = validateFields(title,description);

        if(flag == false){            
            return false;
        }
    
        //formData = $('#infrastructureFormData').serialize();
        var formData = new FormData($('#manage_blogsFormData')[0]);
        formData.append('manage_blogs_main_image', $("#manage_blogs_main_image")[0].files[0]);
        formData.append('action', 'edit_manage_blogs');
        formData.append('description', description);
        
        $.ajax({
            type: "POST",
            url:"webservices/ajax_manage_blogs.php",
            data: formData,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('.body_loader').show();
                $('.lightboxOverlay').show();
            },      
            success:function(data){    
            //alert(data);    
                if(data ==1){
                    /*toastr.success('Event Successfully Updated!');*/
                    alert("Blogs Successfully Updated!");
                    location.reload();
                }else{
                    //toastr.danger('Member Not Added!');
                    alert('Blogs Not Updated!');
                }
            },
            complete:function(){
                $('.body_loader').hide();
                $('.lightboxOverlay').hide();
            }
        });
    });
    //Delete Blogs
    $(document).delegate('.delete_blogs', 'click', function() { 
        if (confirm("Do you really want to delete record?"))
        {
            
            var id = $(this).attr('data-id'); 
            var parent = $(this).parent().parent().parent();
            $.ajax({
                type: "POST",
                url: "webservices/ajax_manage_blogs.php",
                data: {
                    'id':id,
                    'action':'delete_blogs'
                },
                cache: false,
                beforeSend:function(){
                    $('.body_loader').show();
                    $('.lightboxOverlay').show();
                },
                success: function(returnData)
                {
                    //alert(returnData);
                    if(returnData ==1){
                        alert('Blogs Deleted!');
                        parent.fadeOut('slow', function() {$(this).remove();});
                    }else if(returnData == 0){
                        //toastr.danger('Member Not Added!');
                        alert('Blogs Not Deleted!');
                    }
                },
                complete:function(){
                    $('.body_loader').hide();
                    $('.lightboxOverlay').hide();
                    //create_datatable();                    
                }
            });                
        }
    });

    //Change Status
    $(document).delegate('.blogs_status', 'click', function() { 
        if (confirm("Do you really want to change current status?"))
        {
               
            var id = $(this).attr('data-id'); 
            var status = $(this).attr('data-status');
            var parent = $(this).parent().parent().parent();

            $.ajax({
                type: "POST",
                url: "webservices/ajax_manage_blogs.php",
                data: {
                    'id':id,
                    'status':status,
                    'action':'blogs_status'
                },
                cache: false,
                beforeSend:function(){
                    $('.body_loader').show();
                    $('.lightboxOverlay').show();
                },
                success: function(returnData)
                {
                    //alert(returnData);
                    if(returnData ==1){
                        alert('Status Updated!');
                        parent.fadeOut('slow', function() {$(this).remove();});
                    }else if(returnData == 0){
                        //toastr.danger('Member Not Added!');
                        alert('Status Not Updated!');
                    }
                },
                complete:function(){
                    $('.body_loader').hide();
                    $('.lightboxOverlay').hide();
                    create_datatable();                    
                }
            });                
        }
    });

});


function create_datatable(){

    $.ajax({
        url: 'webservices/ajax_manage_blogs.php',
        data: 'action=get_all_blogs',
        beforeSend:function(){
            $('.body_loader').show();
            $('.lightboxOverlay').show();
        },
        success:function(response){
            //alert(response);
            $('#manage_blogs_body').empty();            
            $('#manage_blogs_body').html(response);            
        },
        complete:function(){
            $("#manage_blogs").DataTable();
            $('.body_loader').hide();
            $('.lightboxOverlay').hide();
        }
    });

}

function validateFields(title,description){
    if (title == null || title == "") {
        alert("Category Name must be filled out");
        return false;
    }

    if (description == null || description == "") {
        alert("Description must be filled out");
        return false;
    }

  
    return true;
}