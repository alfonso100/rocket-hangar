<?php 
// List of known warnings and issues

$warnings_psi = array(

// add one line per string to detect
// array structure: [string-to-detect] [name of feature] [descripton] [reference url]
 	



//Lazyload
 array(
 	'data-lazy-src=|||window.lazyLoadOptions', 
 	'Lazyload for images',  
 	'The <em>Lazyload for images</em> feature helps with: <em>Defer offscreen images</em>', 
 	'https://docs.wp-rocket.me/article/1141-using-lazyload-in-wp-rocket'	
 	),

//Defer JS
 array(
 	'.js" data-minify="1" defer|||.js" defer||| defer></script>', 
 	'Load JavaScript deferred',  
 	'This option addresses the <a href="https://developers.google.com/web/tools/lighthouse/audits/blocking-resources" target="_blank">PageSpeed recommendation</a>:  <em>Eliminate render-blocking resources</em>', 
 	'https://docs.wp-rocket.me/article/1265-load-javascript-deferred'	
 	), 


//Delay JS
 array(
 	'rocket-delay-js-js-after|||type="rocketlazyloadscript"', 
 	'Delay JavaScript Execution',  
 	'This option improves performance by delaying the loading of all JavaScript files and inline scripts until there is a user interaction. It’s like LazyLoad, but for JavaScript files.', 
 	'https://docs.wp-rocket.me/article/1349-delay-javascript-execution'	
 	), 

//Optimize CSS delivery
 array(
   'rocket-critical-css|||wpr-usedcss|||used.min.css', 
   'Optimize CSS Delivery',  
   'The <em>Optimize CSS Delivery</em> option is very important, as it addresses the <a href="https://developers.google.com/web/tools/lighthouse/audits/blocking-resources" target="_blank">PageSpeed recommendation</a>: <em>Eliminate render-blocking resources</em>. <a href="https://docs.wp-rocket.me/article/1529-remove-unused-css">Remove Unused CSS</a> is the recommended method of optimizing your CSS. If you have trouble with this option, try <a href="https://docs.wp-rocket.me/article/1266-load-css-asynchronously">Load CSS Asynchronously</a> instead.', 
   'https://docs.wp-rocket.me/article/1529-remove-unused-css'	
   ),


 
		 
);