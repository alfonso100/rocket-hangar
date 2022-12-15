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

    // ### [Prevents Caching and/or Optimizations](https://www.notion.so/Known-Conflicts-8d0a97af9b9c49dd991b28b24550e3de)
  
    array("bookly-responsive-appointment-booking-tool", "Bookly Appointment Booking Plugin - Prevents caching with a DONOTCACHEPAGE",  "warning", "https://www.notion.so/wpmedia/Known-Conflicts-8d0a97af9b9c49dd991b28b24550e3de#5504ba540cbf4a0a9caf614e71918d1d"),
    array("amp=", "AMP Plugin (Official) - When the Standard Template mode is selected, none of WP Rocket's optimizations are being applied.",  "warning", "https://www.notion.so/wpmedia/Known-Conflicts-8d0a97af9b9c49dd991b28b24550e3de#04202c70d2ec41ab8d48522a464ffbcd"),
    array("/gravityforms", "Fresh Forms for Gravity - This plugins works with any caching plugin that supports the DONOTCACHEPAGE constant ",  "warning", "https://www.notion.so/wpmedia/Known-Conflicts-8d0a97af9b9c49dd991b28b24550e3de#48d2991e0c2444519dfeeff629ce43f8"),
    //ActiveMember360
        // array(" ", " ",  "warning", " "),
    //AMP plugin
        // array(" ", " ",  "warning", " "),
    //Ad Inserter Pro
        // array(" ", " ",  "warning", " "),
    //Advanced Ads Pro
        // array(" ", " ",  "warning", " "),
    //ADS PRO – Multi-Purpose WordPress Ad Manager
        // array(" ", " ",  "warning", " "),
    //Asset Cleanup
        // array(" ", " ",  "warning", " "),
    //Auto Login Add On DSP
        // array(" ", " ",  "warning", " "),
    //Bamboo Theme (by Mediavine)
        // array(" ", " ",  "warning", " "),
    //Bertha AI
        // array(" ", " ",  "warning", " "),
    //Bookly Appointment Booking Plugin
        // array(" ", " ",  "warning", " "),
    //BIALTY
        // array(" ", " ",  "warning", " "),
    //Cartflows
        // array(" ", " ",  "warning", " "),
    //Coming Soon Pro
        // array(" ", " ",  "warning", " "),
    //Cookie Cracker by MarketPress
        // array(" ", " ",  "warning", " "),
    //CURCY - WooCommerce Multi-Currency Premium plugin
        // array(" ", " ",  "warning", " "),
    //Disable XML-RPC-API
        // array(" ", " ",  "warning", " "),
    //Divi LearnDash Kit
        // array(" ", " ",  "warning", " "),
    //Download Monitor
        // array(" ", " ",  "warning", " "),
    //Dynamically Inserted Phone Numbers
        // array(" ", " ",  "warning", " "),
    //Ezoic Integration
        // array(" ", " ",  "warning", " "),
    //Fidelo Snippet
        // array(" ", " ",  "warning", " "),
    //Forminator Plugin
        // array(" ", " ",  "warning", " "),
    //Fresh Forms for Gravity
        // array(" ", " ",  "warning", " "),
    //GDPR Cookie Consent
        // array(" ", " ",  "warning", " "),
    //GeoIP Detection
        // array(" ", " ",  "warning", " "),
    //Ginger – EU Cookie Law
        // array(" ", " ",  "warning", " "),
    //Groovy Menu Plugin
        // array(" ", " ",  "warning", " "),
    //Jevelin Theme
        // array(" ", " ",  "warning", " "),
    //Jupiter theme
        // array(" ", " ",  "warning", " "),
    //LegalBlink Policy
        // array(" ", " ",  "warning", " "),
    //Mailster
        // array(" ", " ",  "warning", " "),
    //MainWP
        // array(" ", " ",  "warning", " "),
    //Memberium for ActiveCampaign
        // array(" ", " ",  "warning", " "),
    //MemberPress Developer Tools
        // array(" ", " ",  "warning", " "),
    //OptimizePress Dashboard
        // array(" ", " ",  "warning", " "),
    //Password Protected
        // array(" ", " ",  "warning", " "),
    //Plesk clone website
        // array(" ", " ",  "warning", " "),
    //Plugin Load Filter
        // array(" ", " ",  "warning", " "),
    //Polylang (2.3)
        // array(" ", " ",  "warning", " "),
    //Praison SEO WordPress
        // array(" ", " ",  "warning", " "),
    //ProfilePress plugin
        // array(" ", " ",  "warning", " "),
    //Purity theme
        // array(" ", " ",  "warning", " "),
    //QuadLayers TikTok Feed
        // array(" ", " ",  "warning", " "),
    //Query Monitor
        // array(" ", " ",  "warning", " "),
    //RAIDBOXES
        // array(" ", " ",  "warning", " "),
    //Remove Yoast SEO Comments
        // array(" ", " ",  "warning", " "),
    //SEOPressor
        // array(" ", " ",  "warning", " "),
    //She Media Influse
        // array(" ", " ",  "warning", " "),
    //Simple Webp Images
        // array(" ", " ",  "warning", " "),
    //Soil plugin
        // array(" ", " ",  "warning", " "),
    //Solarenergy theme by Nexus Themes (and probably all of their themes)
        // array(" ", " ",  "warning", " "),
    //Spam protection, AntiSpam, FireWall by CleanTalk
        // array(" ", " ",  "warning", " "),
    //Sprout Invoices
        // array(" ", " ",  "warning", " "),
    //Search and Filter Pro
        // array(" ", " ",  "warning", " "),
    //ThemeREX Addons
        // array(" ", " ",  "warning", " "),
    //Thrive Architect
        // array(" ", " ",  "warning", " "),
    //Thrive Optimize
        // array(" ", " ",  "warning", " "),
    //Ti WooCommerce Wishlist
        // array(" ", " ",  "warning", " "),
    //Ultimate Reviews from Etoile Web Design
        // array(" ", " ",  "warning", " "),
    //Weglot
        // array(" ", " ",  "warning", " "),
    //WooCommerce Login Popup and Shortcodes
        // array(" ", " ",  "warning", " "),
    //Woozone Amazon Affiliates
        // array(" ", " ",  "warning", " "),
    //Woocommerce Uploads
        // array(" ", " ",  "warning", " "),
    //WE WP-Varnish-Cache
        // array(" ", " ",  "warning", " "),
    //Webcraftic Clearfy – WordPress optimization plugin
        // array(" ", " ",  "warning", " "),
    //WP Facebook Open Graph protocol
        // array(" ", " ",  "warning", " "),
    //WP Social SEO Booster
        // array(" ", " ",  "warning", " "),
    //WP EasyCart
        // array(" ", " ",  "warning", " "),
    //WP Emember by Tips and Tricks HQ
        // array(" ", " ",  "warning", " "),

### [GZIP Issues: Weird Characters

    //Check and enable GZIP compression plugin
    // array(" ", " ",  "warning", " "),
    //HTTP Headers
    // array(" ", " ",  "warning", " "),

### [Nonce Issues

    //Email to Download
    // array(" ", " ",  "warning", " "),
    //WooCommerce Bookings
    // array(" ", " ",  "warning", " "),
    //ReviewX
    // array(" ", " ",  "warning", " "),

### [Causes White Screen

    //SV Proven Expert
    // array(" ", " ",  "warning", " "),
    //WP External Links
    // array(" ", " ",  "warning", " "),
    //WP Realty Plugin
    // array(" ", " ",  "warning", " "),

### [Causes Fatal Errors

    //Classified Listing Pro for WordPress
    // array(" ", " ",  "warning", " "),
    //P3 Profiler
    // array(" ", " ",  "warning", " "),
    //SW WooCommerce
    // array(" ", " ",  "warning", " "),
    //WP FeedBack Pro
    // array(" ", " ",  "warning", " "),
    //**WP CriticalCSS**
    // array(" ", " ",  "warning", " "),

### [File Optimization Conflicts

    //Amazon Lightsail (using Bitnami image)
    // array(" ", " ",  "warning", " "),
    //Cookie and Consent Solution for the GDPR & ePrivacy
    // array(" ", " ",  "warning", " "),
    //Hide My WP Ghost – Security Plugin
    // array(" ", " ",  "warning", " "),
    //ShortPixel Adaptive Images
    // array(" ", " ",  "warning", " "),
    //Pre-Party Resource Hints Plugin
    // array(" ", " ",  "warning", " "),
    //WP Content Copy Protection & No Right Click
    // array(" ", " ",  "warning", " "),
    //Yasr – Yet Another Stars Rating
    // array(" ", " ",  "warning", " "),

### [Other

    //Cloudways + Varnish + Separate Cache Files for Mobile devices
    // array(" ", " ",  "warning", " "),
    //Cookiebot + SG Optimizer + WP Rocket cause an error 500
    // array(" ", " ",  "warning", " "),
    //Custom security headers on the htaccess file leading to blank pages
    // array(" ", " ",  "warning", " "),
    //Custom Permalinks
    // array(" ", " ",  "warning", " "),
    //404page – your smart custom 404 error page
    // array(" ", " ",  "warning", " "),
    //HubSpot for WooCommerce
    // array(" ", " ",  "warning", " "),
    //LayerSlider WP
    // array(" ", " ",  "warning", " "),
    //Rehub Theme
    // array(" ", " ",  "warning", " "),
    //ShortPixel Image Optimizer
    // array(" ", " ",  "warning", " "),
    //ThemeREX Addons
    // array(" ", " ",  "warning", " "),
    //User Registration
    // array(" ", " ",  "warning", " "),
    //**WP Graphql plugin**
    // array(" ", " ",  "warning", " "),
    //WooCommerce PayPal Checkout Payment Gateway
    // array(" ", " ",  "warning", " "),
    //WooSwatches - WooCommerce Color or Image Variation Swatches
    // array(" ", " ",  "warning", " "),
    //Jet Widgets plugin when used with our Delay JS and Defer JS
    // array(" ", " ",  "warning", " "),
    //Woocommerce Conversion Tracking
    // array(" ", " ",  "warning", " "),
    //WooCommerce Show Single Variations
    // array(" ", " ",  "warning", " "),
    //Woodmart theme
    // array(" ", " ",  "warning", " "),

// ******************
// LAZYLOAD CONFLICTS

// Jupiter Lazyload conflict
 array("bfi_thumb/dummy-transparent", "<i class='fas fa-bug'></i> Lazyload is also enabled at the Jupiter theme",  "warning", "https://themes.artbees.net/docs/speed-optimizations/"),
 
 // Jetpack Lazyload enabled
 array("jetpack-lazy-image", "<i class='fas fa-bug'></i> Lazyload is also enabled at the Jetpack plugin. Check the source code, and find the 'jetpack-lazy-image' class.",  "warning", "https://secure.helpscout.net/conversation/907037516/116582/#thread-2545342286"),

 	 
);
