<?php
// License validation tool
include('classes/loader.php'); 

$url = $_POST['url'];
$rucss_safelist = $_POST['rucss_safelist'];
$html_code = $_POST['html_code'];

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
	
	<style>pre {
		 white-space: pre-wrap;       /* css-3 */
		 white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
		 white-space: -pre-wrap;      /* Opera 4-6 */
		 white-space: -o-pre-wrap;    /* Opera 7 */
		 word-wrap: break-word;       /* Internet Explorer 5.5+ */
		}</style>
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
		<h2>RUCSS testing tool V2</h2>
	<p>Send a CURL request to https://central-saas.wp-rocket.me/api</p>
		
<?php if($_POST['mode'] != "standalone") { ?>
		<h3 style="margin-top: 40px;"><span class="badge badge-warning">a) by Website URL</span></h3>
		<form action="rucss-tests2.php" method="post">
			<input name="action" value="unprocessedcss" type="hidden">
		
		<div class="form-group">
			<input type="text" class="form-control"  id="url" name="url" autocomplete="false" value="<?php echo $url; ?>"  placeholder="Use the full URL including https://">
		</div>

		<h3 style="margin-top: 40px;"><span class="badge badge-warning">b) by pasting HTML</span></h3>

<div class="form-group">
	<textarea class="form-control"  id="html_code" name="html_code" autocomplete="false""><?php echo $html_code?></textarea>
</div>

	<div class="form-group">
		<label for="rucss_safelist">RUCSS Safelisting</label>		    	
		<textarea class="form-control"  id="rucss_safelist" name="rucss_safelist" autocomplete="false""><?php echo $rucss_safelist?></textarea>
	</div>

			<button type="submit" class="btn btn-primary mb-2">Get response from SaaS &rsaquo;</button>
		    </div>
		 </div>
		</form>

	<?php 	

	
	// TEST URL unprocessedcss
	if($_POST['action'] == 'unprocessedcss'  ) {
		
		// prepare basic variables
		$rucss_url = $_POST['url'].'?nowprocket';
		$html_code = $html_code;
		
		if($html_code != "") {
			$rucss_html == $html_code;
		} else {
			$rucss_html = file_get_contents($rucss_url);
		}
		
		$rucss_safelist =  $rucss_safelist;
		// create CURL post array
		$post_fields = [
		    'html' => $rucss_html,
		    'url' => $rucss_url,
		    'config[rucss_safelist][]' => $rucss_safelist,
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
		echo '<h4>Parameters</h4>';
echo 'URL: '.$rucss_url.'<br>';
echo 'HTML sent: <textarea class="form-control"> '.$rucss_html.'</textarea><br>';
echo 'config[rucss_safelist]: '.$rucss_safelist.'<hr />';
		
		echo '<h4>Reply from API</h4>';

		
		echo '<pre>';
		echo print_r($response_object, true);
		
		echo '</pre>';
	 	echo '</div>';
	 
	}
	?>	

  <?php } // standalone warmup ?>


		
	


</div> 




 </div>


<?php  include('inc/footer.php'); 
	
	