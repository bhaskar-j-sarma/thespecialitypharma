$(function(){

	$('#login').click(function(){
		var username = $('#username').val();
		var password = $('#password').val();

		if(username == ''){
			alert('Please enter username');
			return false;
		}

		if(password == ''){
			alert('Please enter password');
			return false;
		}

		$.ajax({
			url:'webservices/ajax_authentication.php',
			data:'username='+username+'&password='+password+'&action=doLogin',
			type:'POST',
			beforeSend:function(){
                $('.body_loader').show();
                $('.lightboxOverlay').show();
            },
			success:function( responseData ){
				if(responseData == 1){
					window.location = 'home.php';
				}else{
					alert('Invalid username or password!!!');
				}
			},
			complete:function(){
				$('.body_loader').hide();
                $('.lightboxOverlay').hide();
			}
		});
	});
});