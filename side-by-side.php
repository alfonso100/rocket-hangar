<?php

// Basic visual comparison tool for cache vs non-cached versions


if($_GET['url']) :

  $url          = rtrim($_GET['url'], '/').'/';
  $url_nocache  = $_GET['url'] .'?nowprocket';
  include('classes/loader.php');
  include('inc/header.php');
  include('inc/nav.php');
  include('inc/form-sidebyside.php');
endif;
?>





  <div class="container-fluid">
    <div class="grids">

<?php 
if( $url) :  ?>
 
<div class="row px-4 py-0">
	<div class="col-12">
 		<a class="btn btn-primary rotate"  href="#">Change Orientation <i class="fas fa-random"></i></a>
	</div>
</div>
<div class="clearfix"></div>

<div class="row p-4 py-0">
	<div class="col-6">
	
		<h5>Cached Version:<br><a href="<?php echo $url ?>" target="_blank"><?php echo $url ?></a></h5>
 	
 		<iframe id="iframe1" scrolling="yes" class="browser" width="100%" frameborder="0" height="800" src="<?php echo $url?>"></iframe>
	
	</div>

 <div class="col-6">
		<h5>Non Cached Version:<br><a href="<?php echo $url ?>?nowprocket" target="_blank"><?php echo $url ?>?nowprocket</a></h5>

 		<iframe  id="iframe2" class="browser" width="100%" frameborder="0"  height="800" src="<?php echo $url?>?nowprocket"></iframe>
 	</div> 

 </div>
<?php endif; ?>


<?php 
include('inc/footer.php'); 