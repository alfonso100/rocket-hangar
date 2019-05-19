<?php 
/**
  * Checks for the following:
  *	* If WP Rocket is installed.
  *	* If WP Rocket is activated.
  *	* Which WP Rocket features are enabled.
  *
  * @author  Vasilis Manthos <vmanthos@gmail.com>
  *
  * @since 1.0
  *
  */
class Rocket{

	/**
	*	string The URL of the page to check.
	*
	*	@access public
	*/
	public $url;
	
	/**
	*	string HTML source code of the page.
	*
	*	@access public
	*/
	public $html;
	
	/**
	*	array WP Rocket's enabled features.
	*
	*	@access public
	*/
	public $enabled_features;
	
	/**
	*	array The CSS files of the page.
	*
	*	@access public
	*/
	public $css_files;
	
	/**
	*	array The JavaScript files of the page.
	*
	*	@access public
	*/
	public $javascript_files;
	
	/**
	*	array The JavaScript files of the page.
	*
	*	@access public
	*/
	public $is_wpr_installed;
	
	/**
	*	array The inline JavaScript found on the page.
	*
	*	@access public
	*/
	public $inline_javascript;
	
	
	/**
	* The constructor, obviously :)
	*
	* @author  Vasilis Manthos <vmanthos@gmail.com>
	*
	* @since 1.0
	*
	*/
	function __construct( $html, $url )
	{
		// Check if WP Rocket is installed
		$this->is_wpr_installed = $this->wp_rocket_is_installed( $url );
		
		// Find and store the CSS files of the page
		$this->css_files = $this->wp_rocket_find_files ( $html, 'css' );
		
		// Find and store the JavaScript files of the page
		$this->javascript_files = $this->wp_rocket_find_files ( $html, 'js' );
		
		// Find and store the inline JavaScript of the page
		$this->inline_javascript= $this->wp_rocket_find_files ( $html, 'inlineJS' );
		
		// Check which WP Rocket features are enabled
		$this->enabled_features = $this->wp_rocket_is_enabled_features( $html );
	}
	
	/**
	  * Check if WP Rocket's signature is in the source code of a page.
	  *
	  * @author Vasilis Manthos <vmanthos@gmail>
	  *
	  * @since 1.0
	  *
	  * @param string	$html The source code of the page.
	  *
	  * @return int		If there is a signature and a timestamp, it returns the timestamp.
	  * @return bool	True If there is a signature but no timestamp.
	  * @return bool 	False If there isn't a signature and a timestamp.
	  */
	function wp_rocket_check_signature( $html )
	{
		preg_match( '/<!--.*optimized\s*by\s*WP\s*Rocket\D*(\d*)\s*-->/', $html, $signature );
			
		if( $signature && is_array( $signature ) ) 
		{
			if( !is_null( $signature[1] ) ) // a time stamp exists
			{
				return $signature[1]; // return the time stamp
			} 
			else // there isn't a time stamp
			{
				return true; // the signature is there, but thee is no time stamp
			}
		}
		else
		{
			return false;  // there is no signature
		}
	}
	
	/**
	  * Checks if WP Rocket is installed on a site.
	  *
	  * @author  Vasilis Manthos <vmanthos@gmail.com>
	  *
	  * @since 1.0
	  *
	  * @param string	$url	The URL of the site to check.
	  *
	  * @param string	$html The source code of the page.
	  *	@return	bool	False if WP Rocket is installed.
	  */
	function wp_rocket_is_installed( $url )
	{
		$parsed_url = parse_url( $url );
		
		$host = $parsed_url['host'];
		
		$scheme = $parsed_url['scheme'];
		
		$host = $this->remove_trailing_slash( $host );
		
		return $this->get_http_response_code( $scheme. '://' . $host . '/wp-content/plugins/wp-rocket/contributors.txt' ) == 200 ? true : false ;
	}


	/**
	  * Check if WP Rocket is active.
	  *
	  * The section after the description contains the tags; which provide
	  * structured meta-data concerning the given element.
	  *
	  * @author  Vasilis Manthos <vmanthos@gmail.com>
	  *
	  * @since 1.0
	  *
	  * @param string	$html The source code of the page.
	  * @return bool	True If WP Rocket is active or False if it's not
	  */
	function wp_rocket_is_active( $html )
	{
		if( $this->wp_rocket_check_signature( $html ) )
		{
			return true;
		}
		
		if( $this->check_wp_rocket_features( $html ) )
		{
			return true;
		}
		
		return false;
	}

	/**
	  * Check which WP Rocket features are active.
	  *
	  * @author  Vasilis Manthos <vmanthos@gmail.com>
	  *
	  * @since 1.0
	  *
	  * @param string	$html The source code of the page.
	  * @param array	A two-dimensional array, with [0] being the enabled features and [1] being the disabled features.
	  *					Each array contains the name of the feature.
	  */
	function wp_rocket_is_enabled_features( $html )
	{
		$wp_rocket_enabled_features	= array(); // WP Rocket enabled features

		// If these flags are detected, WP Rocket's respective features are enabled
		$flags_posistives = array(
					"Google Tracking add-on"			=> "/cache/busting/google-tracking/",	// Google Tracking add-on
					"Facebook Pixel add-on"				=> "/cache/busting/facebook-tracking/",	// Facebook Pixel add-on
					"Remove query strings from static resources"	=> "/cache/busting/",			// Remove query strings from static resources
					"Optimize CSS delivery"				=> "rocket-critical-css",		// Optimize CSS Delivery
					"WP Rocket Lazyload"				=> "/wp-rocket/assets/js/lazyload/",	// WP Rocket Lazyload feature
					);
		
		// If these flags are detected, the respective WP Rocket features are disabled
		$flags_negatives = array(
					"Disable WordPress embeds"	=> "/wp-includes/js/wp-embed.min.js",		// Disable WordPress embeds
					"Disable WordPress emojis"	=> "/wp-includes/js/wp-emoji-release.min.js",	// Disable WordPress emojis
								);
		
		// Add features to the respective enabled or disabled array	
		foreach( $flags_posistives as $feature => $flag ) // check positive flags
		{
			if(stripos( $html, $flag ) !== false )
			{
				
				array_push( $wp_rocket_enabled_features, $feature );
				
			}
		}
		
		foreach( $flags_negatives as $feature => $flag ) // check negative flags
		{
			if( !stripos( $html, $flag ) )
			{
				
				array_push( $wp_rocket_enabled_features, $feature );
				
			}
		}
		
		// Check if CSS/JavaScript minification/combination are enabled.
		$css_js_minification_combination = $this->wp_rocket_is_minication_combination_active( $html );
		/*
		echo '<pre>';
		print_r( $wp_rocket_enabled_features );
		echo '</pre>';
		echo '<pre>';
		print_r( $css_js_minification_combination );
		echo '</pre>';
		*/
		return array_merge( $wp_rocket_enabled_features, $css_js_minification_combination);

	}

	/**
	* Check if CSS/JavaScript combination/minification features are enabled.
	*
	* @author  Vasilis Manthos <vmanthos@gmail.com>
	*
	* @since 1.0
	*
	* @param	string	$html	The source code of the page.
	* @param	string	$filetype	The filetype, css or js, of the files to check.
	* @return	array	The enabled features.
	*/
	function wp_rocket_is_minication_combination_active( $html )
	{
		$enabled_features	= array(); // WP Rocket enabled features

		$minification_folder_path = '/cache/min/';
		
		$file_arrays = array( 'js' => $this->javascript_files, 'css' => $this->css_files ); // a 2-dimensional array of the CSS and JavaScript files
		
		// Check for every filetype which of the features are enabled
		foreach( $file_arrays as $filetype => $files )
			{
			$files = implode( ' ', $files);
			$pattern = '#\/cache\/min\/\d\/[a-z0-9]{32}\.(?>' . $filetype . ')#i'; // when CSS/JavaScript combination is enabled, the created file's name is a 32 bytes long string consisted of lower case letters and numbers
			preg_match_all( $pattern, $files, $matches );
			
			if( ! empty( $matches[0][0] ) )
			{
				
				array_push( $enabled_features, strtoupper( $filetype ) . ' minification/combination' );
				
			} else
			{
				if( stripos( $files, $minification_folder_path) )
				{
				
					array_push( $enabled_features, strtoupper( $filetype ) . ' minification' );
					
				}
			}			
		}
		return $enabled_features;
	}

	/**
	* Find various assets on the page
	*
	* @author  Vasilis Manthos <vmanthos@gmail.com>
	*
	* @since 1.0
	*
	* @param string	$html	The source code of the page.
	* @param string	$filetype	The file that we are looking for.
	*	It can take the following values:
	*	* js: JavaScript files
	*	* css: CSS files
	*	* image: images
	*	* inlineJS: inline JavaScript
	*/
	function wp_rocket_find_files ( $html, $filetype )
	{
		$dom = str_get_html( $html );
		
		switch( $filetype )
		{
			case null:
				return;
			
			// JavaScript files
			case "js":
				$tag = 'script';
				$attribute = 'src';
				break;
				
			// CSS files
			case "css":
				$tag = 'link[rel=stylesheet]';
				$attribute = 'href';
				break;

			// Images
			case "image":
				$tag = 'img';
				$attribute = 'src';
				break;
			
			// Images
			case "inlineJS":
				$tag = 'script[!src]';
				$attribute = 'outertext'; // using PHP HTML Simple Parser's magic attribute
				break;
		}
		
		$results = array();
		
		foreach( $dom->find( $tag ) as $element ) {
		   if( $element->$attribute ) 
		   {
			   array_push( $results, $element->$attribute );
		   }
		}
		
		return $results;
	}

	/********************************************
	 *		HELPER FUNCTIONS 	    *
	 ********************************************/
	
	/**
	  * Prints the items of a non-associated array as an ordered list. 
	  *	If code is set, the results will be enclosed in <code></code>.
	  *
	  * @author  Vasilis Manthos <vmanthos@gmail.com>
	  *
	  * @since 1.0
	  *
	  * @param array	$array	The array to be printed.
	  * @param string	$list	The kind of list we want printed, i.e. ol or ul.
	  * @param bool		$code	Set to 1 to print code, e.g. inline JavaScript.
	  *	@return	string|bool	The code for an ordered list or false if the argument passed is not an array.
	  */
	function wp_rocket_print_array_list( $array, $list, $code = 0 )
	{
		if( is_array( $array) )
		{
		echo "<$list>";
		foreach( $array as $array_item )
		{
			if( $code )
			{
				echo '<li><pre><code>' . htmlentities( $array, ENT_SUBSTITUTE, 'UTF-8' ) . '</pre></code></li>';
				
			} else 
			{
				echo '<li>' . $array_item . '</li>';
			}
		}
		echo "</$list>";
		}
		else
		{
			return false;
		}
	}

	/*
	  * Removes the trailing slash from a URL.
	  *
	  * @author  Vasilis Manthos <vmanthos@gmail.com>
	  *
	  * @since 1.0
	  *
	  * @param string	$url  The URL of the page.
	  *
	  * @return string	The URL without a trailing slash.
	  */
	function remove_trailing_slash( $url )
	{
		return $url = rtrim ( $url, '/' );
	}

	/**
	  * Get the response code of a request.
	  *
	  * @author  Vasilis Manthos <vmanthos@gmail.com>
	  *
	  * @since 1.0
	  *
	  * @param string	$url  The URL to check.
	  *
	  * @return int 	The response code of the request.
	  */
	function get_http_response_code( $url ) 
	{
		$headers = get_headers( $url, 1 ); // get an associative array of the headers
		
		$headers = implode( ' ', $headers ); // convert array into string
		
		// Find the response code in case of redirects
		preg_match_all('#HTTP\/\d\.?\d?\s(\d{3})#', $headers, $response_codes, PREG_SET_ORDER );
		
		return $response_codes[ count( $response_codes ) -1][1]; // return the response code in the last array
	}

}
