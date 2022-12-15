<?php
// License validation tool
include('classes/loader.php'); 

$url = $_GET['url'];
$warmup_url = $_GET['url_warmup'];

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="https://wphangar.com/lab/assets/images/favicon.png" />

  
    <title>Hangar for WP Rocket</title>
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg  navbar-light bg-light p-4">
    <a class="navbar-brand" href="index.php?url=<?=$url?>"><i class="fas fa-rocket"></i> the hangar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

     </nav>


  <div class="container-fluid">
    <div class="grids">

 

<div class="clearfix"></div>


<div class="row p-4 py-0">

	<div class="col-12">
		<h2>RUCSS testing tool</h2>
		<small>If pages still contains CSS files or not all CSS files are removed, go to Step 1 and check the <strong>unprocessedcss</strong>. If everything is finished this should be empty, but if there are some files pending to process continue with steps 2 and 3.</small><br><br>
		
<?php if($_GET['mode'] != "standalone") { ?>
		<h3 style="margin-top: 40px;"><span class="badge badge-warning">Step 1</span> unProcessedCss</h3>
		<p>Check if the URL receives <strong>unprocessedcss</strong> from our SaaS:</p>

		<form action="rucss-tests.php" method="get">
			<input name="action" value="unprocessedcss" type="hidden">
			<div class="form-row">
		    	<div class="col">	    
					<input type="text" class="form-control"  id="url" name="url" autocomplete="false" value="<?php echo $url; ?>"  placeholder="Use the full URL including https://">
				</div>
		    <div class="col">
				<button type="submit" class="btn btn-primary mb-2">Test response from SaaS &rsaquo;</button>
		    </div>
		 </div>
		</form>

	<?php 	

	
	// TEST URL unprocessedcss
	if($_GET['action'] == 'unprocessedcss'  ) {
		
		// prepare basic variables
		$rucss_url = $_GET['url'].'?nowprocket';
		$rucss_html = file_get_contents($rucss_url);
		
		// create CURL post array
		$post_fields = [
		    'html' => $rucss_html,
		    'url' => $rucss_url,
		    'config[rucss_safelist][]' => '',
		];
			
		// do the CURL request
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://central-saas.wp-rocket.me/api",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POSTFIELDS => $post_fields,
			CURLOPT_ENCODING => "",
			CURLOPT_TIMEOUT => 30));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
	
		// process the response
		$response_object = json_decode($response, true);
	 	
		// display the response


		echo '<div class="api-results alert alert-info">';
		echo '<h4>API Reply: List of unProcessedCss</h4>';
				
		echo '<pre>';
			
		foreach ($response_object['contents']["unProcessedCss"] as $unprocessed ) {
			echo '<div><a class="btn btn-secondary btn-xs"  target="_blank" href="?mode=standalone&action=warmup&url_warmup='.$unprocessed['content'].'">warmup resource &rsaquo;</a> - '.$unprocessed['content'].'</div>';
		}
		
		echo '</pre>';
	 	echo '</div>';
	 
	}
	?>	
		
  
   <hr>

 		<h3 style="margin-top: 40px;"><span class="badge badge-warning">Step 2</span> Clean the Used CSS</h3>
		<p>Is unProcessedCss empty?<br>- <strong>NO</strong> wait for 30 minutes, and test step 1 again. <br>- <strong>YES</strong> something went wrong. <strong>clean the Used CSS</strong> at the WP Admin, and test if everything is removed. 
</p>
 
 <hr>
  <?php } // standalone warmup ?>

   		<h3 style="margin-top: 40px;"><span class="badge badge-warning">Step 3</span> Manual Warmup</h3>
		<p>If after 30 minutes we still have unProcessedCSS then either our queue is too big or the file could NOT be processed. Manually try to warmup the file</p>

		<form action="rucss-tests.php" method="get">
			<input name="action" value="warmup" type="hidden">
			<div class="form-row">
		    	<div class="col">	    
					<input type="text" class="form-control"  id="url_warmup" name="url_warmup" autocomplete="false" value="<?php echo $warmup_url; ?>"  placeholder="CSS or JS File to Warmup">
				</div>
		    <div class="col">
				<button type="submit" class="btn btn-primary mb-2">Warmup resource &rsaquo;</button>
		    </div>
		 </div>
		</form>
		
		<?php 
	// TEST URL unprocessedcss
	if($_GET['action'] == 'warmup'  ) {
		
		// prepare basic variables
		$warmup_content = file_get_contents($warmup_url);		
		$parsed_url = parse_url($warmup_url);
		$warmup_type  = pathinfo($parsed_url['path'], PATHINFO_EXTENSION);
		
		// create CURL post array
		$post_fields = [
		    'resources[0][content]' => $warmup_content,
		    'resources[0][url]' => $warmup_url,
		    'resources[0][type]' => $warmup_type,
		];
			
		// do the CURL request
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://central-saas.wp-rocket.me/warmup",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POSTFIELDS => $post_fields,
			CURLOPT_ENCODING => "",
			CURLOPT_TIMEOUT => 30));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
	
		
		// process the response
		$response_object = json_decode($response, true);

		// display the response	
		echo '<div class="api-results alert alert-info">';
		echo '<h4>API Reply: Warmup Resource </h4>';
			echo '<pre>';
			echo var_dump($response_object);		
			echo '</pre>';
	 	echo '</div>';
	 	
	 	}
	 	?>

</div> 




 </div>


<?php  include('inc/footer.php'); 
	
	