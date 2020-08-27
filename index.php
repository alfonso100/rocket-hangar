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

define('MAX_FILE_SIZE', 2000000); // Simple HTML parser has a low limit of 600000

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
  $widget = new widget;
  $rocket = new Rocket( $site_html, $url );
  $widget_body = '';
  if( $rocket->is_wpr_installed ){
		$features_enabled = $rocket->enabled_features;
      
      asort($features_enabled);
      $widget_body = '<h5><span class="badge badge-success">WP Rocket is enabled!</span></h5>';

		foreach( $features_enabled as $feature ){
			$widget_body .= '<i class="far fa-check-square"></i> ' . $feature . '<br>';
		}

		// FILE DETECTIONS
		$widget_body .= '<br><h5><span class="badge badge-primary">FILES</h5>';
		
		$file_exists = new files(); 
		$widget_body .= '<table class="table table-striped table-sm">';
		
		// contributors file
		$widget_body .= '<tr><td><trong>Contributors.txt</strong></td><td>'. $file_exists->checkURL($url.'/wp-content/plugins/wp-rocket/contributors.txt') .'</td></tr>';
		
		//desktop cache
		$widget_body .= '<tr><td><trong>Desktop HTML Cache</strong></td><td>'. $file_exists->checkURL($url.'wp-content/cache/wp-rocket/'.$url_parts[1].'index-'.$url_parts[0].'.html') .'</td></tr>';

		// mobile cache
		$widget_body .= '<tr><td><trong>Mobile HTML cache</strong></td><td>'. $file_exists->checkURL($url.'wp-content/cache/wp-rocket/'.$url_parts[1].'index-mobile-'.$url_parts[0].'.html') .'</td></tr>';	

		// webp cache
		$widget_body .= '<tr><td><trong>WebP HTML cache</strong></td><td>'. $file_exists->checkURL($url.'wp-content/cache/wp-rocket/'.$url_parts[1].'index-'.$url_parts[0].'-webp.html') .'</td></tr>';	
		
		
					
		$widget_body .= '</table>';
		


  } else {
	  $widget_body = '<h5><span class="badge badge-danger">Oops! WP Rocket is not installed!</h5>';
  }
  
    
  echo $widget->display_widget('WP Rocket Enabled Features', $widget_body, 'rocket ', 'fa-rocket');



  // wprocket - HTML scanner
  $widget = new widget();
  $scanner = new scanner(); 
  $widget_body = $scanner->html_scan($site_html);
  echo $widget->display_widget('Potential issues', $widget_body, 'rocket scanner ', 'fa-bug');

/*
   // info - CSS files
  $widget = new widget();
  $css_files = $rocket->css_files;
  $widget_body = '';
  foreach( $css_files as $css_file){
	  $widget_body .= $css_file . '<br>';
  }
  echo $widget->display_widget('CSS Files', $widget_body, 'information css', 'fa-file');


 // info - JS files
  $widget = new widget();
  $widget_body = 'List of JS files';
  $javascript_files = $rocket->javascript_files;
  
  foreach( $javascript_files as $javascript_file ){
	  $widget_body_javascript_files .= $javascript_file . '<br>';
  }
  echo $widget->display_widget('JavaScript Files', $widget_body_javascript_files, 'information js', 'fa-file');


  // info - Inline Javascript 
  $widget = new widget();
  $widget_body = 'Inline JS';
  echo $widget->display_widget('Inline JS', $widget_body, 'information js', 'fa-file');


  // info - Prefetch DNS 
  $widget = new widget();
  $widget_body = 'Prefetch DNS requests URLs';
  echo $widget->display_widget('Prefetch DNS', $widget_body, 'information', 'fa-file');


  // info - LazyLoaded Images 
  $widget = new widget();
  $widget_body = 'This will help troubleshooting features such as lazy load by providing info about how many images are lazy loaded and possible explanation for those that aren’t, e.g. background images in CSS.';
  echo $widget->display_widget('LazyLoaded Images', $widget_body, 'information files', 'fa-image');

*/



endif; 

include('inc/footer.php'); 
