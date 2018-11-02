// var baseUrl = window.location;
// var baseUrl = loc.protocol + "//" + loc.hostname + (loc.port? ":"+loc.port : "") + "/" + phpBaseUrl;
$(document).ready(function(){ 
	$(".changecolor").switchstylesheet( { seperator:"color"} );
	$('.show-theme-options').click(function(){
		$(this).parent().toggleClass('open');
		return false;
	});

	
});

$(window).bind("load", function() {
	$('.show-theme-options').delay(2000).trigger('click');
});


var idPro;

function addCart(id) {
	num = $("#number").val();
	number = 1;
	if(num > 0){
		number = num;
	}
	img = $("#img_"+id).attr('src');
	$("#imgPreview").attr('src', img);
// alert(img);
	txtPro = $("#txtPro_"+id).text();
	$("#txtNameProduct").text(txtPro);

	txtPrice = $("#txtPrice_"+id).text();
	$("#txtprice").text(txtPrice);

	// alert(txtPrice);
	$("#shoppingcart").modal();
	$.get('/gio-hang/addcart/'+id+'/'+number, function(data) {
		val = data.split("-");
		$("#quantity").text(val[0]);
		$("#total").text(val[1]);
	});
}

function itemDown(id) {
	idPro = id;
	quantity = parseInt($("#quantity_"+id).val()) - 1;
	if(quantity>0){
		$("#quantity_"+id).val(quantity);
		updateCart(id,quantity)
	}else{
		img = $("#img_"+id).attr('src');
		$("#imgPreviewdel").attr('src', img);
	// alert(img);
		txtPro = $("#txtPro_"+id).text();
		$("#txtNameProductdel").text(txtPro);

		txtPrice = $("#txtPrice_"+id).text();
		$("#txtpricedel").text(txtPrice);

		$("#deleteshopping").modal();
		// alert('Giá trị nhỏ nhất là bằng 1. hoặc bạn xóa sản phẩm đi');
	}
	
}

function itemUp(id) {
	idPro = id;
	quantity = parseInt($("#quantity_"+id).val()) + 1;
	$("#quantity_"+id).val(quantity);
	updateCart(id,quantity)
}

function onchange_num(id) {
	idPro = id;
	quantity = parseInt($("#quantity_"+id).val());
	if(quantity>0){
		updateCart(id,quantity)
	}else{
		$("#deleteshopping").modal();
	}
}


function updateCart(id,quantity) {
	$.get('/gio-hang/updatecart/'+id+'/'+quantity, function(data) {
		$("#content").html(data);
	});
}

function deleteItem(id) {
	if(id == 0){
		proId = idPro;
	}else{
		if (confirm('Bạn muốn xóa sản phẩm này khỏi giỏ hàng ?')) {
			proId = id;
		}
	}
	updateCart(proId,0);
	$("#deleteshopping").modal('hide');
}
