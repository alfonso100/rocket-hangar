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
	$('#filters button').on( 'click', function() {
		$('#filters button').removeClass("btn-primary").addClass('btn-outline-dark');
	  	$(this).removeClass('btn-outline-dark').addClass('btn-primary');

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



	 
	 //psi filters
	var check;
	$(".psicheck").on("click", function(){
	    check = $(this).is(":checked");
	    if(check) {
	       $val = $(this).val();
	       $(this).parent('div').addClass('active');
	       $('.' + $val).show();
	    } else {
	       $val = $(this).val();
	       $(this).parent('div').removeClass('active');
	       $('.' + $val).hide();
	      }
	}); 
	 


});
