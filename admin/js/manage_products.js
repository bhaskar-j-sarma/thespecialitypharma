$(function(){

    //View in table
    create_datatable();
    
    //Redirect to edit page
    $('#manage_blogs tbody').on( 'click', '.view_manage_blogs', function () {
        var id = $(this).attr('data-id'); 
        //alert(id);
        window.location = 'edit_products.php?id='+id;
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

        var product_name = document.forms["manage_blogsFormData"]["product_name"].value;
        var category_name = document.forms["manage_blogsFormData"]["category_name"].value;
        var brand_name = document.forms["manage_blogsFormData"]["brand_name"].value;
        var price = document.forms["manage_blogsFormData"]["price"].value;
        var packaging_type = document.forms["blogsFormData"]["packaging_type"].value;
        var application = document.forms["blogsFormData"]["application"].value;
        var packaging_size = document.forms["blogsFormData"]["packaging_size"].value;
        var dosage_form = document.forms["blogsFormData"]["dosage_form"].value;
        var fom = document.forms["blogsFormData"]["fom"].value;
        var description = CKEDITOR.instances.description.getData()
       /* alert(title+"  "+description);*/
        var flag = validateFields(product_name,category_name, brand_name, price,packaging_type,application,packaging_size,dosage_form,fom,description);

        if(flag == false){            
            return false;
        }
    
        //formData = $('#infrastructureFormData').serialize();
        var formData = new FormData($('#manage_blogsFormData')[0]);
        formData.append('manage_blogs_main_image', $("#manage_blogs_main_image")[0].files[0]);
        formData.append('action', 'edit_manage_blogs');
        formData.append('product_name', product_name);
        formData.append('category_name', category_name);
        formData.append('brand_name', brand_name);
        formData.append('price', price);
        formData.append('packaging_type', packaging_type);
        formData.append('application', application);
        formData.append('packaging_size', packaging_size);
        formData.append('dosage_form', dosage_form);
        formData.append('fom', fom);
        formData.append('description', description);
        
        $.ajax({
            type: "POST",
            url:"webservices/ajax_manage_products.php",
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
                    alert("Products Successfully Updated!");
                    location.reload();
                }else{
                    alert('Products Not Updated!');
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
                url: "webservices/ajax_manage_products.php",
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
                        alert('Products Deleted!');
                        parent.fadeOut('slow', function() {$(this).remove();});
                    }else if(returnData == 0){
                        //toastr.danger('Member Not Added!');
                        alert('Products Not Deleted!');
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
                url: "webservices/ajax_manage_products.php",
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
        url: 'webservices/ajax_manage_products.php',
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

function validateFields(product_name, category_name, brand_name, price, packaging_type, application, packaging_size, dosage_form, fom, description){
    if (product_name == null || product_name == "") {
        alert("Product Name must be filled out");
        return false;
    }
    if (category_name == null || category_name == "") {
        alert("Category Name must be filled out");
        return false;
    }
    if (brand_name == null || brand_name == "") {
        alert("Brand Name must be filled out");
        return false;
    }
    if (price == null || price == "") {
        alert("Price must be filled out");
        return false;
    }
     if (packaging_type == null || packaging_type == "") {
        alert("Category Name must be filled out");
        return false;
    }
    if (application == null || application == "") {
        alert("Category Name must be filled out");
        return false;
    }
    if (packaging_size == null || packaging_size == "") {
        alert("Category Name must be filled out");
        return false;
    }
    if (dosage_form == null || dosage_form == "") {
        alert("Category Name must be filled out");
        return false;
    }
    if (fom == null || fom == "") {
        alert("Category Name must be filled out");
        return false;
    }
    if (description == null || description == "") {
        alert("Description must be filled out");
        return false;
    }

  
    return true;
}