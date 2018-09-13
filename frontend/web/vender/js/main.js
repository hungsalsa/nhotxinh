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