<?php

// Basic visual comparison tool for cache vs non-cached versions


if($_GET['url']) :

  $url          = rtrim($_GET['url'], '/').'/';
  $url_nocache  = $_GET['url'] .'?nocache';

endif;

include('inc/header.php'); 


if( $url) :  ?>
 
<div class="row px-4 py-0">
	<div class="col-12">
 		<a class="btn btn-primary rotate"  href="#">Change Orientation <i class="fas fa-random"></i></a>
	</div>
</div>

<div class="row p-4 py-0">
	<div class="col-6">
	
		<h5>Cached Version:<br><a href="<?php echo $url ?>" target="_blank"><?php echo $url ?></a></h5>
 	
 		<iframe id="iframe1" scrolling="yes" class="browser" width="100%" frameborder="0" height="1200" src="https://tools.pingdom.com"></iframe>
	
	</div>

 <div class="col-6">
		<h5>Non Cached Version:<br><a href="<?php echo $url ?>?nocache" target="_blank"><?php echo $url ?>?nocache</a></h5>

 		<iframe  id="iframe2" class="browser" width="100%" frameborder="0"  height="1200" src="https://tools.pingdom.com"></iframe>
 	</div> 

 </div>
<?php endif; ?>


<?php 
include('inc/footer.php'); 