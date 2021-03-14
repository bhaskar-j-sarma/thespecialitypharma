$(function(){
	 get_rss();
     $('#rss_submit_update').click(function(){
        rss_submit_update(); 
     });

	$('#rss_submit').click(function(){

		var data = $('#rssForm').serialize();
		
		
       	console.log(data);
       
		
		$.ajax({
			type: "POST",
			url:"webservices/rss_feed.php",
	        data: data,
            
	        beforeSend:function(){
            $('#rssOutput').html("");   
            },      
            success:function(data){

            	console.log(data);
			$('#rssOutput').append(data);          
           

            },
            complete:function(){
               
            }
		});


	});
	$('#status_change').click(function(){
		
	});
});
function get_rss(){

var formData = new FormData();
formData.append('action','get_rss');
console.log(formData);
$.ajax({
        type: "POST",
        url:"webservices/rss_feed.php",
        data: formData,
        contentType: false,
        processData: false,
        dataType:"JSON",
        beforeSend:function(){
      
        },      
        success:function(data){
            var html="";
            html+='<option value="">Select an RSS-feed:</option>';
           $.each(data,function(i){
                
                html+='<option value='+data[i].id+'>'+data[i].rss_title+'</option>';
               
           });
                       
          

        $("#rss_feeds").html("");
        $("#rss_feeds").append(html);
       

        },
        complete:function(){
           
        }
    });
}
function status_change(str){

		if (confirm("Do you really want to change current status?"))
        {
               
            var id = $(str).attr('data-id'); 
            var id_p = $(str).attr('id_p'); 
            var status = $(str).attr('data-status');
            var parent = $(str).parent().parent().parent();
           
          $.ajax({
                type: "POST",
                url: "webservices/rss_feed.php",
                
                data: {
                    'id':id,
                    'status':status,
                    'action':'status_change'
                },
                cache: false,
                beforeSend:function(){
                    $('.body_loader').show();
                    $('.lightboxOverlay').show();
                },
                success: function(returnData)
                {
                   console.log(returnData);
                    if(returnData ==1){
                        alert('Status Updated!');
                        showRSS(id_p);
                    }else if(returnData == 0){
                        //toastr.danger('Member Not Added!');
                        alert('Status Not Updated!');
                        showRSS(id_p);
                    }
                },
                complete:function(){
                    $('.body_loader').hide();
                    $('.lightboxOverlay').hide();
                    
                }
            });                
        }
}

function showRSS(str)
{
    var id =  str;
   
    var formData = new FormData();
    formData.append('action','get_rss_feed');
    formData.append('id',id);
    $('#delete').show();
    $('#delete').val(id);
    $.ajax({
        type: "POST",
        url:"webservices/rss_feed.php",
        data: formData,
        contentType: false,
        processData: false,
      /*  dataType:"JSON",*/
        beforeSend:function(){
      
        },      
        success:function(data){
           $('#manage_blogs_body').html("");            
           $('#manage_blogs_body').append(data);    
                      
          

       
       

        },
        complete:function(){
          $("#manage_blogs").DataTable();  
        }
    });
}

function delete_feed(str){

		if (confirm("Do you really want to deleted this feed PERMANENTLY?"))
        {
               
            var id = $(str).attr('data-id'); 
            var id_p = $(str).attr('id_p'); 
            var status = $(str).attr('data-status');
            var parent = $(str).parent().parent().parent();
           	
           
          $.ajax({
                type: "POST",
                url: "webservices/rss_feed.php",
                
                data: {
                    'id':id,
                    'status':status,
                    'action':'delete_rss'
                },
                cache: false,
                beforeSend:function(){
                    $('.body_loader').show();
                    $('.lightboxOverlay').show();
                },
                success: function(returnData)
                {
                   console.log(returnData);
                    if(returnData ==1){
                        alert('Feed Deleted!');
                        showRSS(id_p);
                    }else if(returnData == 0){
                        //toastr.danger('Member Not Added!');
                        alert('Feed not Deleted!');
                        showRSS(id_p);
                    }
                },
                complete:function(){
                    $('.body_loader').hide();
                    $('.lightboxOverlay').hide();
                    
                }
            });                
        }
}

function delete_all_feeds(str){

    var id = str;
     var id_p = $(str).attr('id_p'); 
    if(confirm("Are you sure you want to delete all feeds of this RSS")){
        alert(id);
         $.ajax({
                type: "POST",

                url: "webservices/rss_feed.php",
                
                data: {
                    'id':id,
                   
                    'action':'delete_all_feeds'
                },
                cache: false,
                beforeSend:function(){
                    $('.body_loader').show();
                    $('.lightboxOverlay').show();
                },
                success: function(returnData)
                {
                   console.log(returnData);
                  
                    if(returnData ==1){
                        alert('Deleted!');
                        showRSS(id_p);
                    }else if(returnData == 0){
                        //toastr.danger('Member Not Added!');
                        alert('Failed to delete!');
                        showRSS(id_p);
                    }
                },
                complete:function(){
                    $('.body_loader').hide();
                    $('.lightboxOverlay').hide();
                    
                }
            });

    }

}
function getRssTitle(str){
    
    var id =  str;
    
   
    var formData = new FormData();
    formData.append('action','get_rss_link');
    formData.append('id',id);
    
   $.ajax({
            type: "POST",
            url:"webservices/rss_feed.php",
            data: formData,
            contentType: false,
            processData: false,
            dataType:"JSON",
            beforeSend:function(){
            /*$('#rssOutput').html("");   */
            },      
            success:function(data){

                console.log(data[0].rss_title);
                
                $('#rss_link_update').val(data[0].link);
                $('#rss_link_name').val(data[0].rss_title);
                /*$('#rss_id').val(data[0].id);*/
           

            },
            complete:function(){
               
            }
        });
}

function rss_submit_update(str){
   
    var data  = $('#rssFormUpdate').serialize();
   
   
   
   $.ajax({
            type: "POST",
            url:"webservices/rss_feed.php",
            data: data,
           /* contentType: false,
            processData: false,
            dataType:"JSON",*/
            beforeSend:function(){
             $('#rssOutput').html("");   
            },      
            success:function(data){

                console.log(data);
               $('#rssOutput').append(data);       
           

            },
            complete:function(){
               
            }
        });
}
