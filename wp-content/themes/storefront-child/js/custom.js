(function($) {
	

$(document).ready(function(){

	$('.part-box .fa').on('click', function() {
		$(this).parent('.part-box').addClass('clicked');
		$(this).closest('.part-box').children().show('fast');
	});

	$('.part-box').on('click', function() {
		$('.continue').animate({
			opacity: 1,
		}, 300)
	});


	//$('.popup-click').remodal();

	//$('[data-remodal-id=modal2]').remodal();

	


});

	// $ Works! You can test it with next line if you like
	// console.log($);

$(window).load(function() {
	$('.bx-slider').bxSlider();
});
	
	
})( jQuery );

