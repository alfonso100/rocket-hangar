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

include('classes/loader.php'); 


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
    
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Hangar</a>
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

  // GET SITE HTML
  $html = new html(); 
  $site_html = $html->get_html($url);

  // URL PARTS
  $url_parts = explode('://', $url);


  ///////////////////////
  // WIDGETS SECTION
  ///////////////////////


    // wprocket - HTML scanner
  $widget = new widget();
  $scanner = new scanner(); 
  $widget_body = $scanner->html_scan($site_html);
  echo $widget->display_widget('Potential issues', $widget_body, 'scanner ');

die;

  // server information
  $widget = new widget();
  $hosting = new hosting(); 
  $widget_body = $hosting->get_hosting($url);
  echo $widget->display_widget('Server', $widget_body, 'information ');


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

  //check files - contributors.txt
  $widget = new widget();
  $file_exists = new files(); 
  $widget_body = $file_exists->checkURL($url.'/wp-content/plugins/wp-rocket/contributors.txt');
  echo $widget->display_widget('contributors.txt', $widget_body, 'files ');


  //check files - html desktop index cached page
  $widget = new widget();
  $file_exists = new files(); 
  $widget_body = $file_exists->checkURL($url.'wp-content/cache/wp-rocket/'.$url_parts[1].'index-'.$url_parts[0].'.html');
  echo $widget->display_widget('Desktop cached file ', $widget_body, 'files ');


  //check files - html mobile index cached page
  $widget = new widget();
  $file_exists = new files(); 
  $widget_body = $file_exists->checkURL($url.'wp-content/cache/wp-rocket/'.$url_parts[1].'index-mobile-'.$url_parts[0].'.html');
  echo $widget->display_widget('Mobile cached file ', $widget_body, 'files ');


  // tool - visual side by side comparison
  $widget = new widget();
  $widget_body = '<a target="_blank" href="https://alfonsocatron.com/lab/wprocket/sidebyside.php?url='.$url.'">Launch</a>';
  echo $widget->display_widget('Visual side by side ', $widget_body, 'files ');


 // wprocket - enabled options
  $widget = new widget();
  $rocket = new rocket(); 
  $widget_body = $rocket->get_rocket;
  echo $widget->display_widget('WP Rocket settings', $widget_body, 'rocket ');



 

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