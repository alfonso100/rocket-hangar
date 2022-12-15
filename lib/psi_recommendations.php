<?php 
// List of known warnings and issues

$warnings_psi = array(

// add one line per string to detect
// array structure: [string-to-detect] [name of feature] [descripton] [reference url]
 	



//Lazyload
 array(
 	'data-lazy-src=|||window.lazyLoadOptions', 
 	'Lazyload for images',  
 	'to address the Defer <a href="https://docs.wp-rocket.me/article/1405-defer-offscreen-images" target="_blank">offscreen images audit</a>', 
 	'https://docs.wp-rocket.me/article/1141-using-lazyload-in-wp-rocket',
      '<style>.form-check.offscreen-images {opacity:0.4 !important; z-index: -1;}</style>'	
 	),

//Defer JS
 array(
 	'.js" data-minify="1" defer|||.js" defer||| defer></script>', 
 	'Load JavaScript deferred',  
 	'to fix the <a href="https://docs.wp-rocket.me/article/1407-eliminate-render-blocking-resources" target="_blank">Eliminate render-blocking resources</a> for Javascript files', 
 	'https://docs.wp-rocket.me/article/1265-load-javascript-deferred'	,
      '<style></style>'	
 	), 


//Delay JS
 array(
 	'rocket-delay-js-js-after|||type="rocketlazyloadscript"', 
 	'Delay JavaScript Execution',  
 	'to help you with <a href="https://docs.wp-rocket.me/article/1417-remove-unused-javascript" target="_blank">Reduce Unused JavaScript</a> and <a href="https://docs.wp-rocket.me/article/1398-total-blocking-time-first-input-delay" target="_blank">Total Blocking Time.</a>', 
 	'https://docs.wp-rocket.me/article/1349-delay-javascript-execution',
     '<style>.form-check.unused-javascript, .form-check.bootup-time, .form-check.mainthread-work-breakdown, .form-check.third-party-summary {opacity:0.4 !important; z-index: -1;}</style>'	

	), 

//Optimize CSS delivery
 array(
   'rocket-critical-css|||wpr-usedcss|||used.min.css', 
   'Optimize CSS Delivery - Remove Unused CSS',  
   'to solve two audits: <a href="https://docs.wp-rocket.me/article/1407-eliminate-render-blocking-resources">Eliminate render-blocking resources</a> and <a href="https://docs.wp-rocket.me/article/1529-remove-unused-css">Remove Unused CSS</a>. Alternatively you can use <a href="https://docs.wp-rocket.me/article/1266-load-css-asynchronously">Load CSS Asynchronously</a> instead to address the Eliminate render-blocking resources audit only.', 
   'https://docs.wp-rocket.me/article/1529-remove-unused-css', 
   '<style>.form-check.render-blocking-resources, .form-check.unused-css-rules {opacity:0.4 !important; z-index: -1;}</style>'	
   ),


 
		 
);