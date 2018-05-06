// script qui soccupe de la petite animation des scroll d'images dans l'en tete de la page
$(window).scroll(function() {
	var vscroll = $(this).scrollTop();
	$("#logo-text").css({
		"transform" : "translate(0px, "+vscroll/2+"px)"
	});

	var vscroll = $(this).scrollTop();
	$("#back-flower").css({
		"transform" : "translate("+vscroll/5+"px, -"+vscroll/12+"px)"
	});

	var vscroll = $(this).scrollTop();
	$("#for-flower").css({
		"transform" : "translate(0px, -"+vscroll/2+"px)"
	});

});

function detailModal(id) {
	
	var data = { "id": id};
	$.ajax({
		url: '/shaunta/includes/details_modal.php',
		method: "post",
		data: data,
		success: function(data) {
			
			$('body').append(data);
			$('#details-modal').modal('toggle');

		},
		error: function() {
			alert('Something went wrong');
		}
	});
}

function update_cart(mode, edit_id, edit_size) {
	var data = {"mode" : mode, "edit_id" : edit_id, "edit_size": edit_size};
	$.ajax({
		url : "/shaunta/admin/parsers/update_cart.php",
		method : "post",
		data : data,
		success : function(){ location.reload() },
		error : function(){ alert('Something wen wrong') }
	});
}

function add_to_cart() {
	$('#modal_errors').html("");
	var size = $('#size').val();
	var quantity = parseInt($('#quantity').val());
	var available = parseInt($('#available').val());
	var error = "";
	var data = $('#add_product_form').serialize();
	//console.log(quantity+','+available);
	if(available < quantity)
	{
		error += '<p class="text-danger text-center">There are only '+available+' available.</p>';
		$('#modal_errors').html(error);
		return;
	} 
	else if(size == '' || quantity == '' || quantity == 0)
	{
		error += '<p class="text-danger text-center">You must choose a size and quantity.</p>';
		$('#modal_errors').html(error);
		return;
	} 
	else 
	{
		$.ajax({
			url : '/shaunta/admin/parsers/add_cart.php',
			method : 'post',
			data : data,
			success: function() {
				location.reload();
			},

			error: function() { alert('Something went wrong');}
		});
	}
}