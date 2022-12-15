<?php 
// Lisyt of known warnings and issues

$warnings = array(

// add one line per string to detect
// array structure: [string-to-detect] [name of issue] [type] [reference url]

// ******************
// GENERAL WARNINGS

 array("rocket-loader.min.js", "Rocket Loader is enabled",  "warning", "https://secure.helpscout.net/search/?query=tag:rocket%20loader"),
 
 array("email-decode.min.js", "Email decode injected by CloudFlare",  "warning", "https://secure.helpscout.net/conversation/817213371/102538/"),

// ******************
// PLUGIN CONFLICTS




// ******************
// LAZYLOAD CONFLICTS

// Jupiter Lazyload conflict
 array("bfi_thumb/dummy-transparent", "<i class='fas fa-bug'></i> Lazyload is also enabled at the Jupiter theme",  "warning", "https://themes.artbees.net/docs/speed-optimizations/"),
 
 // Jetpack Lazyload enabled
 array("jetpack-lazy-image", "<i class='fas fa-bug'></i> Lazyload is also enabled at the Jetpack plugin. Check the source code, and find the 'jetpack-lazy-image' class.",  "warning", "https://secure.helpscout.net/conversation/907037516/116582/#thread-2545342286"),

 	 
);
