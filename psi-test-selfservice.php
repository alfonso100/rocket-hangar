<?php

// PSI Recommendations generator
define('MAX_FILE_SIZE', 2000000); // Simple HTML parser has a low limit of 600000

if($_GET['url']) :

  $url          = rtrim($_GET['url'], '/').'/';
  $url_nocache  = $_GET['url'] .'?nowprocket';

endif;

include('classes/loader.php'); 

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="https://wphangar.com/lab/assets/images/favicon.png" />

 <style>
	 .box {
		 margin-bottom: 40px;
	 }

	.report {
		border: 2px solid #eaeaea;
		padding: 10px;
		background: #FFF;
		border-radius: 10px;
		
	}
 </style> 
    <title>Hangar for WP Rocket</title>
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg  navbar-light bg-light p-4">
    <a class="navbar-brand" href="index.php?url=<?=$url?>"><i class="fas fa-rocket"></i> the hangar</a>
  </nav>


  <div class="container-fluid">
    <div class="grids">


 <!-- FIRST STEP  -->
<div class="box">
<div class="row px-4 py-0">
	<div class="col-6">
 		<h4 id="step-1">1 - Enter the website url and RUN REPORT</h4>
 		
 		   <form class="form-inline my-4 my-lg-0 w-100 ml-auto" method="get">
        <input name="url" class="form-control w-75" type="search" placeholder="URL to test" aria-label="Search" value="<?php echo $url?>">
        <button class="btn btn-dark" type="submit">RUN REPORT</button>
        
      </form>
	</div>
</div>
</div>


<div class="clearfix"></div>
<?php 	if ($url) :  ?>
<div class="box">

	<div class="col-6">
		
	<h4 id="step-3">2 - WP Rocket feature scanner</h4>


		<div class="report">
			<p>We have tested your website with our diagnosis tool. These are the most relevant WP Rocket features that have a direct impact over your Pagespeed score:</p>
			<?php
			
			//ROCKET PSI SCANNER	
			
			  // GET SITE HTML
			  $html = new html(); 
			  $site_html = $html->get_html($url);
			
			
			  $scanner = new scanner_psi(); 
			  $widget_body = $scanner->html_scan($site_html);
			  
			
			  echo $widget_body;
			
			
			 ?>
		</div>
		
		
		<div class="col-6">
			 	<h4>3 - Opportunities and recommendations</h4>
 	<small>From this list, select the <strong>Opportunities</strong> the Pagespeed report gave you for the <em>cached</em> version of the website.</small>

<br><br>
			<form method="post">

			<?php 
				$psi_opportunities = array();
				$psi_opportunities[] = 'Minify JavaScript';
				$psi_opportunities[] = 'Minify CSS';
				$psi_opportunities[] = 'Properly size images';
				$psi_opportunities[] = 'Preload key requests';
				$psi_opportunities[] = 'Remove unused JavaScript';
				$psi_opportunities[] = 'Remove unused CSS';
				$psi_opportunities[] = 'Serve images in next-gen formats';
				$psi_opportunities[] = 'Avoid serving legacy JavaScript to modern browsers';
				
				
				$psi_diagnostics = array();
				$psi_diagnostics[] = 'Does not use passive listeners to improve scrolling performance';
				$psi_diagnostics[] = 'Ensure text remains visible during webfont load';
				$psi_diagnostics[] = 'Reduce the impact of third-party code';
				$psi_diagnostics[] = 'Reduce JavaScript execution time ';
				$psi_diagnostics[] = 'Reduce JavaScript execution time ';
				$psi_diagnostics[] = 'Reduce JavaScript execution time ';
				$psi_diagnostics[] = 'Reduce JavaScript execution time ';


?>
 
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="remove-unused-javaScript" id="remove-unused-javaScript">
  <label class="form-check-label" for="remove-unused-javaScript"> Remove unused JavaScript
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="remove-unused-css" id="remove-unused-css">
  <label class="form-check-label" for="remove-unused-css"> Remove unused CSS
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="minify-javaScript" id="minify-javaScript">
  <label class="form-check-label" for="minify-javaScript">Minify JavaScript
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="minify-javaScript" id="minify-javaScript">
  <label class="form-check-label" for="minify-javaScript">...  </label>
</div>
<br>
<button type="submit" class="btn btn-primary">Get performance recommendations &rsaquo;</button>
</form>

		</div>
		
		
	 </div>
</div>

<?php  endif;  ?>

<?php if($url) : ?>
 <!-- 3rd  STEP  -->
<div class="clearfix"></div>

<div class="box">
<div class="row px-4 py-0">
	<div class="col-6">
 	<h4 id="step-2">3 - Pagespeed. Side by Side test</h4>
 	<small>This is the current WP Rocket's benefit on your website. You can see the report for the cached version of your website on the left, and the non-cached version on the right. If you scroll down at the cached version, you can find the top <strong>Opportunities</strong>, these are Pagespeed recommendations which you can use on <a href="#step-4">Step #4</a> to get a personalized performance recommendation.</small>

 	</div>
</div>




<div class="row p-4 py-0">
	<div class="col-6">
	
		<h5>With WP Rocket: <a href="https://developers.google.com/speed/pagespeed/insights/?url=<?php echo $url ?>" target="_blank">Open report in a new tab</a></h5>
 	

 		<!..iframe id="iframe1" scrolling="yes" class="browser" width="100%" frameborder="0" height="1100" src="https://developers.google.com/speed/pagespeed/insights/?url=<?php echo $url?>"></iframe..>
	
	</div>

 <div class="col-6">
		<h5>Not Cached: <a href="https://developers.google.com/speed/pagespeed/insights/?url=<?php echo $url ?>?nowprocket" target="_blank">Open report in a new tab</a></h5>

 		<!--iframe  id="iframe2" class="browser" width="100%" frameborder="0"  height="1100" src="https://developers.google.com/speed/pagespeed/insights/?url=<?php echo $url?>?nowprocket"></iframe-->
 	</div> 

 </div>
 </div>
<?php endif; ?>



<?php if($urlXX) : ?>
 <!-- 3rd  STEP  -->
<div class="clearfix"></div>

<div class="box">
<div class="row px-4 py-0">
	<div class="col-6">
 	<h4 id="step-3">3 - Pagespeed recommendations</h4>
 	<small>From this list, check the <strong>Opportunities</strong> your Pagespeed report gave you for the cached version of your website.<br>When you are ready click the "<strong>Get performance recommendations</strong>" button</small>

<br><br>
<form method="post">

<?php 
	$psi_opportunities = array();
	$psi_opportunities[] = 'Minify JavaScript';
	$psi_opportunities[] = 'Minify CSS';
	$psi_opportunities[] = 'Properly size images';
	$psi_opportunities[] = 'Preload key requests';
	$psi_opportunities[] = 'Remove unused JavaScript';
	$psi_opportunities[] = 'Remove unused CSS';
	$psi_opportunities[] = 'Serve images in next-gen formats';
	$psi_opportunities[] = 'Avoid serving legacy JavaScript to modern browsers';
	
	
	$psi_diagnostics = array();
	$psi_diagnostics[] = 'Does not use passive listeners to improve scrolling performance';
	$psi_diagnostics[] = 'Ensure text remains visible during webfont load';
	$psi_diagnostics[] = 'Reduce the impact of third-party code';
	$psi_diagnostics[] = 'Reduce JavaScript execution time ';
	$psi_diagnostics[] = 'Reduce JavaScript execution time ';
	$psi_diagnostics[] = 'Reduce JavaScript execution time ';
	$psi_diagnostics[] = 'Reduce JavaScript execution time ';


?>
 
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="remove-unused-javaScript" id="remove-unused-javaScript">
  <label class="form-check-label" for="remove-unused-javaScript"> Remove unused JavaScript
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="remove-unused-css" id="remove-unused-css">
  <label class="form-check-label" for="remove-unused-css"> Remove unused CSS
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="minify-javaScript" id="minify-javaScript">
  <label class="form-check-label" for="minify-javaScript">Minify JavaScript
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="minify-javaScript" id="minify-javaScript">
  <label class="form-check-label" for="minify-javaScript">...  </label>
</div>
<br>
<button type="submit" class="btn btn-primary">Get performance recommendations &rsaquo;</button>
</form>

 	</div>
</div>
</div>


<?php endif; ?>



<?php 
include('inc/footer.php'); 