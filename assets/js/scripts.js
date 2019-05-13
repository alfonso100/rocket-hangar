$(document).ready(function(){


	$('.grid').masonry({
	  itemSelector: '.grid-item', 
	  percentPosition: true
	});


	$('.rotate' ).click(function() {
		console.log('si');
	  $('.col-6' ).toggleClass( "col-12");
	});

	// highlight active option
	$('#filters button').on( 'click', 'button', function() {
		$('#filters button').removeClass("btn-primary");
	  	$(this).addClass('btn-primary');


	});

	// init Isotope
	var $grid = $('.grid').isotope({
	  // options
	});
	// filter items on button click
	$('.filter-button-group').on( 'click', 'button', function() {


	  var filterValue = $(this).attr('data-filter');
	  $grid.isotope({ filter: filterValue });

	});



});
