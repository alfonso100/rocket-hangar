<?php 
// response headers fetch and analysis
	class headers {

		var $url; 

		function build_url_headers($url) { 
			
			$array = get_headers($url);

			$headers_output = '<table class="table table-striped table-sm">';

			foreach($array as $row) :
				
				$class = ''; 
				
				// information
				if (
				stripos($row, 'Cache-Control') !== false ||
				stripos($row, 'X-Rocket') !== false ||
				stripos($row, 'WP Rocket') !== false ||
				stripos($row, 'server: apache') !== false) {
					$class = 'text-primary'; 
				}


				
				// alerts
				if(	stripos($row, '301 Moved Permanently') !== false  ) {
						$class = 'text-info'; 
				}	
					
				// warnings					
				if(	$row == 'Server: cloudflare'   || 
					$row == 'Via: 1.1 varnish' || 
					$row == 'X-Cache: MISS' || 
					$row == 'X-Cache: HIT' ||
					$row == 'x-nginx-cache-status:HIT' || 
					$row == 'X-Proxy-Cache:HIT' ||
					stripos($row, 'CF-Cache-Status: HIT') !== false ||
					stripos($row, 'X-Mod-Pagespeed') !== false ||
					stripos($row, 'X-SRCache-Fetch-Status') !== false ||
					stripos($row, 'X-Page-Speed') ) {
						
						$class = 'text-danger'; 
				} 	

										
				$headers_output .= '<tr><td><span class="'.$class.'">'.$row.'</span></td></tr>';
				
			endforeach;
			
			$headers_output .= '</table>';


			$this->headers = $headers_output;

 		}

 		function display_headers() {
			return $this->headers;
		}
 

	} 
?>