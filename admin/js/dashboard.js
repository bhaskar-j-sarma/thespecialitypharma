$(function() {        
    $('.body_loader').show();
    $('.lightboxOverlay').show();

    get_counts();

    setInterval(function(){
	 	 get_counts();
	}, 1000*60);

});

$(window).load(function() {
    $('.body_loader').hide();
    $('.lightboxOverlay').hide();
});

function get_counts(){
	$.ajax({
		url:'webservices/ajax_dashboard.php',
		data:'action=dashboard_counts',
		dataType:'JSON',
		success:function( returnData ){
			//alert(returnData);
			//console.log(returnData);
			//return false;
			$('#active').html(returnData.active);
			$('#inactive').html(returnData.inactive);
			$('#total').html(returnData.total);
			return false;
		}
	});
}