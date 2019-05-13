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

  $url          = rtrim($_GET['url'], '/').'/';
  $url_nocache  = $_GET['url'] .'?nocache';

endif;

include('classes/loader.php'); 

include('inc/header.php'); 



if ($url) : 

  // TOGGLE ELEMENTS


  // GET SITE HTML
  $html = new html(); 
  $site_html = $html->get_html($url);

  // URL PARTS
  $url_parts = explode('://', $url);


  ///////////////////////
  // WIDGETS SECTION
  ///////////////////////


  // cached headers
  $widget = new widget();
  $cached = new headers(); 
  $cached->build_url_headers($url);
  $widget_body = $cached->display_headers();
  echo $widget->display_widget('Headers Cached', $widget_body, 'information ', 'fa-code');



  // non-cached headers
  $widget = new widget();
  $cached = new headers(); 
  $cached->build_url_headers($url_nocache);
  $widget_body = $cached->display_headers();
  echo $widget->display_widget('Headers non_cached', $widget_body, 'information ', 'fa-code');


  
  // server information
  $widget = new widget();
  $hosting = new hosting(); 
  $widget_body = $hosting->get_hosting($url);
  echo $widget->display_widget('Hosting', $widget_body, 'information ', 'fa-server');



  // wprocket - enabled options
  $widget = new widget();
  $rocket = new rocket(); 
  $widget_body = $rocket->get_rocket($url);
  echo $widget->display_widget('WP Rocket settings', $widget_body, 'rocket ', 'fa-rocket');



  // wprocket - HTML scanner
  $widget = new widget();
  $scanner = new scanner(); 
  $widget_body = $scanner->html_scan($site_html);
  echo $widget->display_widget('Potential issues', $widget_body, 'rocket scanner ', 'fa-bug');

  // info - CSS files
  $widget = new widget();
  $widget_body = 'List of CSS files';
  echo $widget->display_widget('CSS Files', $widget_body, 'information css', 'fa-file');


  // info - JS files
  $widget = new widget();
  $widget_body = 'List of JS files';
  echo $widget->display_widget('JS Files', $widget_body, 'information js', 'fa-file');


  // info - Inline Javascript 
  $widget = new widget();
  $widget_body = 'Inline JS';
  echo $widget->display_widget('Inline JS', $widget_body, 'information js', 'fa-file');


  // info - Prefetch DNS 
  $widget = new widget();
  $widget_body = 'Prefetch DNS requests URLs';
  echo $widget->display_widget('Prefetch DNS', $widget_body, 'information files', 'fa-file');


  // info - LazyLoaded Images 
  $widget = new widget();
  $widget_body = 'This will help troubleshooting features such as lazy load by providing info about how many images are lazy loaded and possible explanation for those that aren’t, e.g. background images in CSS.';
  echo $widget->display_widget('LazyLoaded Images', $widget_body, 'information files', 'fa-image');


  //check files - contributors.txt
  $widget = new widget();
  $file_exists = new files(); 
  $widget_body = $file_exists->checkURL($url.'/wp-content/plugins/wp-rocket/contributors.txt');
  echo $widget->display_widget('contributors.txt', $widget_body, 'files ', 'fa-file');


  //check files - html desktop index cached page
  $widget = new widget();
  $file_exists = new files(); 
  $widget_body = $file_exists->checkURL($url.'wp-content/cache/wp-rocket/'.$url_parts[1].'index-'.$url_parts[0].'.html');
  echo $widget->display_widget('Desktop cached file ', $widget_body, 'files ', 'fa-desktop');



  //check files - html mobile index cached page
  $widget = new widget();
  $file_exists = new files(); 
  $widget_body = $file_exists->checkURL($url.'wp-content/cache/wp-rocket/'.$url_parts[1].'index-mobile-'.$url_parts[0].'.html');
  echo $widget->display_widget('Mobile cached file ', $widget_body, 'files ', 'fa-mobile-alt');


  //check files - html mobile index cached page
  $widget = new widget();
  $file_exists = new files(); 
  $widget_body = $file_exists->checkURL($url.'wp-content/cache/wp-rocket/'.$url_parts[1].'index-mobile-'.$url_parts[0].'.html');
  echo $widget->display_widget('Mobile cached file ', $widget_body, 'files ', 'fa-mobile-alt');



  // tool - Pagespeed
  $widget = new widget();
  $widget_body = '<a class="btn btn-sm btn-outline-light btn-block" target="_blank" href="https://developers.google.com/speed/pagespeed/insights/?url='.$url.'">Run report <i class="fas fa-external-link-alt"></i></a>';
  echo $widget->display_widget('Google Pagespeed ', $widget_body, 'tools performance', 'fa-tachometer-alt');

    // tool - Pingdom
  $widget = new widget();
  $widget_body = '<a class="btn btn-sm btn-outline-light btn-block" target="_blank" href="pingdom.php?url='.$url.'">Launch <i class="fas fa-external-link-alt"></i></a>';
  echo $widget->display_widget('Pingdom', $widget_body, 'tools performance', 'fa-tachometer-alt');


   // tool - GT Metrix
  $widget = new widget();
  $widget_body = '<a class="btn btn-sm btn-outline-light" target="_blank" href="https://gtmetrix.com?url='.$url.'">Launch <i class="fas fa-external-link-alt"></i></a> <a class="btn btn-sm btn-outline-light" target="_blank" href="https://gtmetrix.com?url='.$url.'?nocache">Launch no-cache <i class="fas fa-external-link-alt"></i></a>';
  echo $widget->display_widget('GT Metrix', $widget_body, 'tools performance', 'fa-tachometer-alt');



endif; 

include('inc/footer.php'); 
