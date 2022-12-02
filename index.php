<?php


$counter = file_get_contents('./file') + 1;
file_put_contents('./file', $counter);


// PSI Recommendations generator
define('MAX_FILE_SIZE', 2000000); // Simple HTML parser has a low limit of 600000.

if ( isset($_GET['url']) ) :

	$url          = $_GET['url'];
	$url_nocache  = $url . '?nowprocket';
else:
	$url = '';
endif;

if( isset($_GET['checked']) && $_GET['checked'] == 'on' ) :
	
	$checked = 'checked="checked"';
else:
	$checked = '';
endif;

include('classes/loader.php');
include('inc/header.php');
include('inc/nav-index.php');

?>
	<style>
		.container-fluid {
    width: 100% !important;
    padding-right: 15px !important;
    padding-left: 15px !important;
    margin-right: auto  !important;
    margin-left: auto !important;
}
.widget {
    font-size: 0.8rem !important;
    border-radius: 0.4rem !important;
    background: #FFF !important;
    margin-top: 1rem !important;
    margin-bottom: 1rem !important;
    overflow-y: hidden !important;
}
.grid-item {
    width: 23% !important;
    margin-left: 1% !important;
    margin-right: 1% !important;
}
	</style>





					
					<?php include('indicators.php');?>



			<?php if ($url) : ?>
			<?php endif; ?>

		<?php
			$additionalScripts = [
				// 'assets/js/scripts-index.js',
				// 'assets/js/engine/psi/psi.js',
				// 'assets/js/engine/psi-test/psi-test.js',
			];
			include('inc/footer.php');
			?>

			<script>
$(document).ready(function () {

$('.grid').masonry({
	itemSelector: '.grid-item',
	percentPosition: true
});


});
</script>