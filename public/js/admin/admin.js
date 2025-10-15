$(document).ready(function() {
	//ITEM LIST TOGGLE
	let n = 0;
	$('.menu-toggle').on('click', function() {
		n++;
		if(n % 2 == 0) {
			$(this).parent().parent().next().slideUp();
			$(this).find('.fa-caret-down').css('transform', 'rotateX(360deg)').css('transition', 'all 0.3s ease 0s');
		}
		else {
			$(this).parent().parent().next().slideDown();
			$(this).find('.fa-caret-down').css('transform', 'rotateX(180deg)').css('transition', 'all 0.3s ease 0s');
		}
	});
	//MOBILE MENU TOGGLE
	$('#mobile_menu').on('click', function() {
		$('.left-sidebar .sidebar').toggle();
	})
	//DISPLAY/HIDE SIDEBAR ON RESIZE
	$(window).resize(function() {
		let width = $(window).width();
		if(width > 770) {
			$('.left-sidebar .sidebar').css('display', 'inline-block');
		}
		if(width <= 770) {
			$('.left-sidebar .sidebar').css('display', 'none');
		}
	});
	//CLOSE ADMIN FLASH MESSAGES
	$('.close-error').on('click', function() {
		$('.error-container').slideUp();
	});
	//CONFIRMATION ON ADMIN ACTION
	$('.publish-btn').on('click', function(e) {
		if(!confirm('Are you sure you want to publish?')) {
			e.preventDefault();
		}
	});
	$('.delete-btn').on('click', function(e) {
		if(!confirm('Are you sure you want to delete this item?')) {
			e.preventDefault();
		}
	});
});	