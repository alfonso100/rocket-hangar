<?php 
// get site html for analysis
	class html {

		var $url; 

		function get_html($url) { 
			
			$html = file_get_contents( $url );

			return $html;

 		}

	} 