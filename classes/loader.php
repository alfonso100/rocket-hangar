<?php 
	
// Helpers
require_once('lib/simple_html_dom.php');  // the parser library
require_once('lib/helpers.php');  // the parser library

//Classes
include('classes/class-widgets.php'); 	// a simple widget builder
include('classes/class-headers.php'); 	// gets the URL response headers
include('classes/class-hosting.php'); 	// gets the hosting information
include('classes/class-html.php'); 		// gets the HTML of the website for analysis
include('classes/class-files.php'); 	// file verification tools
include('classes/class-rocket.php'); 	// get WP Rocket enabled options
include('classes/class-scanner.php'); 	// Scan HTML for strings


