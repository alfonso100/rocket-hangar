<?php 
// Scanner for known issues, strings, etc
	class scanner_psi {

		var $html; 

		function html_scan($html) { 
			
			include('lib/psi_recommendations.php');

			$scan_output_enabled = '';
			$scan_output_disabled = '';
			$number_of_enabled = 0;
			$number_of_disabled = 0;

			foreach($warnings_psi as $warning) :
							
				if(	stripos($html, $warning[0]) !== false  ) { 
					
					$scan_output_enabled .= '<li><strong>'.$warning[1].'</strong><br>'.$warning[2].'. <a href="'.$warning[3].'">See doc</a></li>';
					$number_of_enabled ++;
					
				} else {
					
					$scan_output_disabled .= '<li><strong>'.$warning[1].'</strong><br>'.$warning[2].'.  <a href="'.$warning[3].'">See doc</a></li>';
					$number_of_disabled ++;
					
				}

				
			endforeach;
			
			$html_result = '<p><strong>Please activate the following options in WP Rocket:</strong></p>';
			if($number_of_disabled > 0 ) {
				$html_result .= '<ol>'.$scan_output_disabled.'</ol>';
			} else {
				$html_result .= '<p>All good, nothing else to enable!</p>';				
			}
			$html_result .= '<p><strong>These options are already enabled and making your site faster:</strong></p>';
			if($number_of_enabled > 0 ) {
				$html_result .= '<ol>'.$scan_output_enabled.'</ol>';
			} else {
				$html_result .= '<p>No WP Rocket features detected.</p>';				
			}
			
			return $html_result;

			

 		}

	} 