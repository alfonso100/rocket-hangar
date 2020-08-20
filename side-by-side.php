<?php

// Basic visual comparison tool for cache vs non-cached versions


if($_GET['url']) :

  $url          = rtrim($_GET['url'], '/').'/';
  $url_nocache  = $_GET['url'] .'?nocache';

endif;
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="https://alfonsocatron.com/lab/hangar/assets/images/favicon.png" />

  
    <title>Hangar for WP Rocket</title>
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg  navbar-light bg-light p-4">
    <a class="navbar-brand" href="index.php?url=<?=$url?>"><i class="fas fa-rocket"></i> the hangar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <form class="form-inline my-4 my-lg-0 w-100 ml-auto" method="get">
        <input name="url" class="form-control mr-sm-4 w-75 ml-auto" type="search" placeholder="URL to test" aria-label="Search" value="<?php echo $url?>">
        <button class="btn btn-dark my-4 my-sm-0" type="submit">Go</button>
      </form>
    </div>
  </nav>


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
		<h5>Non Cached Version:<br><a href="<?php echo $url ?>?nocache" target="_blank"><?php echo $url ?>?nocache</a></h5>

 		<iframe  id="iframe2" class="browser" width="100%" frameborder="0"  height="800" src="<?php echo $url?>?nocache"></iframe>
 	</div> 

 </div>
<?php endif; ?>


<?php 
include('inc/footer.php'); 