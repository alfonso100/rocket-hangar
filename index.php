<?php 
/*
 ______ __ __   ___      __ __  ____ ____   ____  ____ ____  
|      |  |  | /  _]    |  |  |/    |    \ /    |/    |    \ 
|      |  |  |/  [_     |  |  |  o  |  _  |   __|  o  |  D  )
|_|  |_|  _  |    _]    |  _  |     |  |  |  |  |     |    / 
  |  | |  |  |   [_     |  |  |  _  |  |  |  |_ |  _  |    \ 
  |  | |  |  |     |    |  |  |  |  |  |  |     |  |  |  .  \
  |__| |__|__|_____|    |__|__|__|__|__|__|___,_|__|__|__|\_|
                                                             
*/


if($_GET['url']) :

  $url          = $_GET['url'];
  $url_nocache  = $_GET['url'] .'?nocache';

endif;

include('lib/loader.php'); 


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Hangar for WP Rocket</title>
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="#">The Hangar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <form class="form-inline my-4 my-lg-0 w-50 ml-auto" method="get" action="index.php">
        <input name="url" class="form-control mr-sm-4 w-75 ml-auto" type="search" placeholder="URL to test" aria-label="Search" value="<?php echo $url?>">
        <button class="btn btn-primary my-4 my-sm-0" type="submit">Go</button>
      </form>
    </div>
  </nav>

<div class="container-fluid">
<div class="grid">
<?php 

if ($url) : 

  // WIDGETS SECTION
  $widget = new widget();
  echo $widget->display_widget('Server', 'server', ' ');


  // cached headers
  $widget = new widget();
  $cached = new headers(); 
  $cached->build_url_headers($url);
  $widget_body = $cached->display_headers();
  echo $widget->display_widget('Headers Cached', $widget_body, 'information ');


  // non-cached headers
  $widget = new widget();
  $cached = new headers(); 
  $cached->build_url_headers($url_nocache);
  $widget_body = $cached->display_headers();
  echo $widget->display_widget('Headers non_cached', $widget_body, 'information ');

  //check files
  $widget = new widget();
  echo $widget->display_widget('contributors.txt', 'file', 'files ');

 $widget = new widget();
  echo $widget->display_widget('Desktop cached file ', 'file', 'files ');

$widget = new widget();
  echo $widget->display_widget('Mobile cached file ', 'file', 'files ');



endif; 

?>

</div> <!-- grid -->

</div> <!-- container -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/masonry.pkgd.min.js"></script>
    <script src="assets/js/scripts.js"></script>
  </body>
</html>