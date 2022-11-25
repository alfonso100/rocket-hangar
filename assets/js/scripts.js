
$(document).ready(function () {

	$('.grid').masonry({
		itemSelector: '.grid-item',
		percentPosition: true
	});


	$('.rotate').click(function () {
		console.log('si');
		$('.col-6').toggleClass("col-12");
	});

	// highlight active option
	$('#filters button').on('click', function () {
		$('#filters button').removeClass("btn-primary").addClass('btn-outline-dark');
		$(this).removeClass('btn-outline-dark').addClass('btn-primary');
	});

	$('#fix-button').on('click', function () {
		$('.follower').toggleClass('fixed');
		//$(this).removeClass('btn-outline-dark').addClass('btn-primary');
	});
	$('#fix-button-indicators').on('click', function () {
		$('.indicators').toggleClass('fixed');
		//$(this).removeClass('btn-outline-dark').addClass('btn-primary');
	});
	
	// init Isotope
	var $grid = $('.grid').isotope({
		// options
	});
	// filter items on button click
	$('.filter-button-group').on('click', 'button', function () {

		var filterValue = $(this).attr('data-filter');
		$grid.isotope({ filter: filterValue });

	});	
});