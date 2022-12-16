<?php
// License validation tool

include('classes/loader.php'); 


if($_GET['url']) :
  $url = rtrim($_GET['url'], '/').'/';
endif;

// default WP Rocket version
$wprocket_version  = "3.1";


if($_POST['websiteurl']) : 

	$url 				= $_POST['websiteurl'];
	$customeremail 		= $_POST['customeremail'];
	$apikey 			= $_POST['apikey'];
	$wordpress_version 	= $_POST['wordpress_version'];
	$password 			= $_POST['password'];
	$wprocket_version  = $_POST['wprocket_version'];


endif;

?>




<?php    
  include('inc/header.php');
  include('inc/nav.php');
    ?>


  <div class="container-fluid">
    <div class="grids">

 

<div class="clearfix"></div>

<div class="row p-4 py-0">

	<div class="col-5">
		<h2>License validation tool</h2>
		<small>This form will run a license validation request against WP-Rockt.me server, and it will display the response we are getting from there. You can <a href="https://www.notion.so/wpmedia/How-to-track-a-license-validation-issue-with-Postman-ee9539fb65374ce8874be89231643f6b" target="_blank">read this doc for more information</a></small>
		
  <form action="license-validator.php" method="post">
  <div class="form-group">
    <label for="websiteurl">Website url</label>
    <input name="websiteurl" type="text" class="form-control" id="websiteurl" aria-describedby="webHelp" placeholder="Enter website URL" autocomplete="false" value="<?php echo $url; ?>">
    <small id="webHelp" class="form-text text-muted">The customer website. Use the full URL including https://. 
    
    <?php if($url) : ?>
   		<a href="https://wp-rocket.me/wp-admin/edit.php?s=<?php echo cleanURL($url); ?>&unscoped_q=<?php echo cleanURL($url); ?>&post_status=all&post_type=website&action=-1&m=0&lang=en&paged=1&action2=-1" target="_blank">Find this URL</a>
    <?php endif; ?>
    
    </small>
  </div>

  <div class="form-group">
    <label for="customeremail">Customer Email</label>
    <input name="customeremail" type="text" class="form-control" id="customeremail" aria-describedby="emailHelp" placeholder="Enter customer Email" autocomplete="off" value="<?php echo $customeremail; ?>">
    <small id="emailHelp" class="form-text text-muted">You can get this from the user account page.</small>
  </div>  

   <div class="row">
    <div class="col">
	    
  <div class="form-group">
    <label for="apikey">API Key</label>
    <input name="apikey" type="text" class="form-control" id="apikey" aria-describedby="apikeyHelp" placeholder="Enter API Key" autocomplete="off" value="<?php echo $apikey; ?>">
    <small id="apikeyHelp" class="form-text text-muted">You can get this from the user account page.</small>
  </div>    
  
    </div>
     <div class="col">
   
  
   <div class="form-group">
    <label for="password">WordPress Version</label>
	<select name="wordpress_version" id="wordpress_version" class="form-control">
		<option value="">Select</option>
		<option value="5.5" selected>5.5</option>
		<option value="5.4">5.4</option>
		<option value="5.3">5.3</option>
		<option value="5.2">5.2</option>
		<option value="5.1">5.1</option>
		<option value="5.0">5.0</option>
		<option value="4.9">4.9</option>
	</select>
  </div> 
     </div>
   </div>
  
   <div class="row">
    <div class="col">
	    
  <div class="form-group">
    <label for="wprocket_version">WP Rocket version</label>
    <input name="wprocket_version" type="text" class="form-control" id="wprocket_version" aria-describedby="wprocket_versionlHelp" placeholder="Enter WP Rocket version Email" autocomplete="off" value="<?php echo $wprocket_version; ?>">
    <small id="wprocket_versionlHelp" class="form-text text-muted">If you'd like to test validating for a specific WP Rocket version, you can manually add it here.</small>
  </div>
  
    </div>
    <div class="col">
  <div class="form-group">
    <label for="password">Password</label>
    <input name="password" type="password" class="form-control" id="password" placeholder="Password" autocomplete="off" value="<?php echo $password; ?>">
  </div>
  
    </div>
</div>

 
   <button type="submit" class="btn btn-primary">Validate it!</button>
</form>

	</div> 

	<div class="col-1"></div>

	<div class="col-5">

<?php 

if($password == 'Rocket2020!' ) :



$useragent		= 'WordPress/'.$wordpress_version.';'.$url.';'.$wprocket_version.'|'.$apikey.'|'.$customeremail.'|WP-Rocket|'.$wprocket_version.'|'.$apikey.'|'.$customeremail.'|'.$url.'|;" -H "X-Rocket: WordPress/'.$wordpress_version.';'.$url.';'.$wprocket_version.'|'.$apikey.'|'.$customeremail.'|WP-Rocket|'.$wprocket_version.'|'.$apikey.'|'.$customeremail.'|'.$url.'|;';

$curlcommand = 'curl -i -X POST -H "User-Agent: WordPress/'.$wordpress_version.';'.$url.';'.$wprocket_version.'|'.$apikey.'|'.$customeremail.'|WP-Rocket|'.$wprocket_version.'|'.$apikey.'|'.$customeremail.'|'.$url.'|;" -H "X-Rocket: WordPress/'.$wordpress_version.';'.$url.';'.$wprocket_version.'|'.$apikey.'|'.$customeremail.'|WP-Rocket|'.$wprocket_version.'|'.$apikey.'|'.$customeremail.'|'.$url.'|;" https://wp-rocket.me/valid_key.php';


	// create user
	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://wp-rocket.me/valid_key.php",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_USERAGENT => $useragent));
	  $response = curl_exec($curl);
	  $err = curl_error($curl);
	  curl_close($curl);

 if (strpos($response, 'true') !== false) {
	 $response_class = 'alert-success';
 } else {
	 $response_class = 'alert-danger';
}
 ?>

		<h2>WP Rocket API Response</h2>
		
		<div class="results alert <?php echo $response_class; ?>">
			<?php echo $response; ?>
		</div>
		
		<h4>CURL Request</h4>
		<code><?php echo $curlcommand; ?></code>
 
<?php endif; ?> 

	</div> 


 </div>


<?php  include('inc/footer.php'); 
	
	