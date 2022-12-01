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

    // DONOTCACHE WARNINGS
    
    array("bookly-responsive-appointment-booking-tool", "Bookly Appointment Booking Plugin - Prevents caching with a DONOTCACHEPAGE",  "warning", "https://www.notion.so/wpmedia/Known-Conflicts-8d0a97af9b9c49dd991b28b24550e3de#5504ba540cbf4a0a9caf614e71918d1d"),
    array("AMP", "AMP Plugin (Official) - When the Standard Template mode is selected, none of WP Rocket's optimizations are being applied.",  "warning", "https://www.notion.so/wpmedia/Known-Conflicts-8d0a97af9b9c49dd991b28b24550e3de#04202c70d2ec41ab8d48522a464ffbcd"),
    // array(" ", " ",  "warning", " "),
    // array(" ", " ",  "warning", " "),
    // array(" ", " ",  "warning", " "),
    // array(" ", " ",  "warning", " "),
    // array(" ", " ",  "warning", " "),
    // array(" ", " ",  "warning", " "),
    // array(" ", " ",  "warning", " "),
    // array(" ", " ",  "warning", " "),
    // array(" ", " ",  "warning", " "),
    // array(" ", " ",  "warning", " "),
    // array(" ", " ",  "warning", " "),
    // array(" ", " ",  "warning", " "),
    // array(" ", " ",  "warning", " "),
    // array(" ", " ",  "warning", " "),
    // array(" ", " ",  "warning", " "),
    // array(" ", " ",  "warning", " "),
    // array(" ", " ",  "warning", " "),
    // array(" ", " ",  "warning", " "),
    // array(" ", " ",  "warning", " "),
    // array(" ", " ",  "warning", " "),
    // array(" ", " ",  "warning", " "),
    // array(" ", " ",  "warning", " "),
    // array(" ", " ",  "warning", " "),
    // array(" ", " ",  "warning", " "),
    // array(" ", " ",  "warning", " "),


// ******************
// LAZYLOAD CONFLICTS

// Jupiter Lazyload conflict
 array("bfi_thumb/dummy-transparent", "<i class='fas fa-bug'></i> Lazyload is also enabled at the Jupiter theme",  "warning", "https://themes.artbees.net/docs/speed-optimizations/"),
 
 // Jetpack Lazyload enabled
 array("jetpack-lazy-image", "<i class='fas fa-bug'></i> Lazyload is also enabled at the Jetpack plugin. Check the source code, and find the 'jetpack-lazy-image' class.",  "warning", "https://secure.helpscout.net/conversation/907037516/116582/#thread-2545342286"),

 	 
);
