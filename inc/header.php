<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="https://wphangar.com/lab/assets/images/favicon.png" />

  
    <title>Hangar for WP Rocket</title>
  </head>
  <body>
    
<div id="filters" class="filter-button-group">
	<a class="btn btn-secondary btn-sm" target="_blank" href="https://developers.google.com/speed/pagespeed/insights/?url=<?php echo $url ?>"> <i class="fas fa-tachometer-alt"></i> Pagespeed</a>
	
	<a class="btn btn-secondary btn-sm" target="_blank" href="https://tools.pingdom.com/"> <i class="fas fa-tachometer-alt"></i> Pingdom</a>	
	
	<a class="btn btn-secondary btn-sm" target="_blank" href="https://gtmetrix.com?url=<?php echo $url ?>"> <i class="fas fa-tachometer-alt"></i> GT Metrix</a>
	
	<a class="btn btn-info btn-sm" target="_blank" href="side-by-side.php?url=<?php echo $url ?>"> <i class="fas fa-eye"></i> Side by Side</a>
	
	<a class="btn btn-info btn-sm" target="_blank" href="https://cpcss.wp-rocket.me/ui?=<?php echo $url ?>"> <i class="fas fa-code"></i> CPCSS UI Test</a>
	
    <a class="btn btn-info btn-sm" target="_blank" href="https://rocketcdn.me/admin/website/website/?q=<?php echo $url ?>"> <i class="fas fa-code"></i>Search in RocketCDN</a>

	<a class="btn btn-warning btn-sm" target="_blank" href="license-validator.php?url=<?php echo $url ?>"> <i class="fas fa-key"></i> License Validation</a>
		
 </div>

  
  <nav class="navbar navbar-expand-lg  navbar-light bg-light p-4">
    <a class="navbar-brand" href="index.php"><i class="fas fa-rocket"></i> the hangar</a>

      <form class="form-inline my-4 my-lg-0 w-100 ml-auto" method="get" action="index.php">
        <input name="url" class="form-control mr-sm-4 w-75 ml-auto" type="search" placeholder="URL to test" aria-label="Search" value="<?php echo $url?>">
        <button class="btn btn-dark my-4 my-sm-0" type="submit">Go</button>
      </form>
  </nav>





   

  <div class="container-fluid">
    <div class="grid">