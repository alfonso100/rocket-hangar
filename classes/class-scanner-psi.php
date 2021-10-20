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
								
				// explode cases with multiple warnings, this adds compatibility with 3.9 and previous versions
				$warnings = explode('|||', $warning[0]);
				
				$flag = 0;
				
				foreach ($warnings as $current_warning) :							
					if(	stripos($html, $current_warning) !== false ) { 
						$flag ++;	
					} 
					
				endforeach;
				
				// after we looped the array of warnings, we output the warnings
				if($flag == 0) {
					$scan_output_disabled .= '<li><strong><a href="'.$warning[3].'">'.$warning[1].'</a></strong> '.$warning[2].' '.$warning[4].'</li>';
					$number_of_disabled ++;
					
				}
							
			endforeach;
			
			$html_result = '<p><strong>Please activate the following options in WP Rocket:</strong></p>';
			if($number_of_disabled > 0 ) {
				$html_result .= '<ol>'.$scan_output_disabled.'</ol>';
			} else {
				$html_result .= '<p>All good, nothing else to enable!</p>';				
			}
			//$html_result .= '<p><strong>These options are already enabled and making your site faster:</strong></p>';
			if($number_of_enabled > 0 ) {
			//	$html_result .= '<ol>'.$scan_output_enabled.'</ol>';
			} else {
			//	$html_result .= '<p>No WP Rocket features detected.</p>';				
			}
			
			return $html_result;

			

 		}

	} 