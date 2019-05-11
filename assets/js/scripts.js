$(document).ready(function(){


$('.grid').masonry({
  itemSelector: '.grid-item', 
  percentPosition: true
});


$('.rotate' ).click(function() {
	console.log('si');
  $('.col-6' ).toggleClass( "col-12");
});

});
