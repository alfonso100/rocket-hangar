<?php 
// Scanner for known issues, strings, etc
	class scanner {

		var $html; 

		function html_scan($html) { 
			
			include('lib/known_warnings.php');

			$scan_output = '<table class="table table-striped table-sm">';
			$number_of_warnings = 0;

			foreach($warnings as $warning) :
							
				if(	stripos($html, $warning[0]) !== false  ) { 
					$scan_output .= '<tr><td><span class="'.$warning[2].'"><a target="_blank" href="'.$warning[3].'">'.$warning[1].'</a></span></td></tr>';

						$number_of_warnings ++;
				}

				
			endforeach;
			
			$scan_output .= '</table>';

			if($number_of_warnings == 0) {

				return 'No warnings';
				
			} else {

				return $scan_output;

			}


 		}

	} 