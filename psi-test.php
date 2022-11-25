<?php


$counter = file_get_contents('./file') + 1;
file_put_contents('./file', $counter);


// PSI Recommendations generator
define('MAX_FILE_SIZE', 2000000); // Simple HTML parser has a low limit of 600000.

if ( isset($_GET['url']) ) :

	$url          = $_GET['url'];
	$url_nocache  = $url . '?nowprocket';
else:
	$url = '';
endif;

if( isset($_GET['checked']) && $_GET['checked'] == 'on' ) :
	
	$checked = 'checked="checked"';
else:
	$checked = '';
endif;

include('classes/loader.php');

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

	<style>
		body {
			overflow-x: hidden;
		}

		h2 {
			margin-bottom: 20px;
		}

		h4 {
			font-size: 1.2rem;
		}

		.box {
			margin-bottom: 40px;
		}

		.spinner {
			margin-left: auto;
			margin-right: auto;
			margin-top: 20px;
		}

		.spinner-container {
			text-align: center;
		}

		.spinner-text {
			margin-top: 16px;
			animation: pulse 0.7s infinite;
			animation-direction: alternate;
			animation-delay: 0s;
		}
		@keyframes pulse {
			0% {
				opacity: 1;
			}
			100% {
				opacity: 0;
			}
		}

		.report {
			border: 2px dashed #999;
			padding: 20px;
			background: #FFF;
			border-radius: 10px;
			min-height: 100px;
			transition: height 2s;

		}

		.form-check {
			padding: 2px;
			background: #eaeaea;
			border-radius: 10px;
			margin: 2px;
			border: 2px solid #EAEAEA;
			font-size: 0.9rem;

			/* padding: 3px; */
			/* background: #FFF; */
			border-radius: 10px;
			/* margin: 3px; */
			border: 2px solid transparent;
		}

		.form-check.active {
			padding: 3px;
			background: #FFF;
			/* border-radius: 10px; */
			margin: 3px;
			/* border: 2px solid #333; */
		}

		.form-check label {
			display: block;
			padding-left: 1.25rem;
		}

		.form-check-input {
			position: absolute;
			margin-left: 0;
		}

		.form-check.out-of-scope {
			color: #C00;
		}


		
		.hint {
			font-style: italic;
		}
		
		.hint.out-of-scope {
			color: #C00;
		}

		.hint.can-advise {
			color: #007bff;
		}
		
		.hidden {
			display: none
		}

		/* Adding the Styles for the copy button div */
		.div-copy-button {
			padding-bottom: 20px;
			text-align: right;
		}

		.copy-message {
			opacity: 0;
			transition: all;
			transition-duration: 1s;
			margin-right: 5px;
		}

		.scaled-iframe {
			width: 100%;
			height: 100%;
			zoom: 0.68;
			-moz-transform: scale(0.68);
			-moz-transform-origin: 0 0;
			-o-transform: scale(0.68);
			-o-transform-origin: 0 0;
			-webkit-transform: scale(0.68);
			-webkit-transform-origin: 0 0;
		}

		.iframe-wrap {
			width: 1000px;
			height: 1500px;
			overflow: hidden;
		}


		.fixed {
			position: fixed;
			width: 600px;
			top: 10px;
			right: 10px;
			z-index: 10000;
			background-color: #FFF;
			padding: 10px;
			border-radius: 6px;
			box-shadow: 2px 2px 4px 0px rgba(0, 0, 0, 0.35);
			height: 98%;
			overflow: scroll;
		}
		/* Score number styles */
		.psi-score {
			font-size: 1.1em;
		}
		.psi-score.poor {
			color: #ff4e42;
		}
		.psi-score.passed {
			color: #0cce6b;
		}
		.psi-score.needs-improvement {
			color: #ffa400;
		}
		/* End Score number styles */
		.form-check.poor {
			border-color: #ff4e42;
		}
		.form-check.passed {
			border-color: #0cce6b;
		}
		.form-check.needs-improvement {
			border-color: #ffa400;
		}
		.form-check.informative {
			border-color: #bdbdbd;
		}
		
		.form-check.passed {
			display: none;
		}
		
		
		/* hide some useless recommendations*/
		
		.uses-passive-event-listeners {
			display: none !important;
		}
		.grid-item {
    width: 100% !important;
}
	</style>


	<title>Hangar for WP Rocket</title>
</head>

<body>

	<nav class="navbar navbar-expand-lg  navbar-light bg-light p-4">
		<a class="navbar-brand" href="index.php?url=<?= $url ?>"><i class="fas fa-rocket"></i> the hangar</a>
	</nav>


	<div class="container-fluid">
		<div class="grids">


			<!-- FIRST STEP  -->
			<div class="box">
				<div class="row px-4 py-0">
					<div class="col-6">

						<h2>PSI Test Tool - V2</h2>
	
					<h4 id="step-1">1 - Enter the website url and RUN REPORT</h4>

						<form class="form-inline my-4 my-lg-0 w-100 ml-auto" method="get">


						<div class="custom-control custom-switch">
						  <input  name="checked" type="checkbox" class="custom-control-input" id="customSwitch1" <?=$checked ?>>
						  <label class="custom-control-label" for="customSwitch1" ><em>I have verified the website is optimized by WP Rocket</em></label>
						  </div>
						  <br><br><br><br>
						  <input name="url" class="form-control w-75" type="url" placeholder="URL to test" aria-label="Url" value="<?php echo $url ?>">
							<button id="submit-button" class="btn btn-dark" type="submit" disabled>RUN REPORT</button>
			
						</form>
					</div>
				</div>
			</div>


			<div class="clearfix"></div>
			<?php if ($url) :  ?>
				<div class="box spinner-container">
					<img class="spinner" src="assets/images/rocket.gif">
					<h3 class="spinner-text">Waiting for Google PageSpeed Insights results...</h3>
				</div>
				<div class="box hidden" id="results-box">
					<div class="row px-4 py-0">

						<div class="col-6">

							<h4 id="step-3">2 - PSI Response</h4>


							<div class="report" id="report-box" data-container="body" data-toggle="popover" data-placement="top" trigger="manual" data-content="The response was copied!">
								<div class="col-12 row">
									<div class="psi-score col-3">
										Score: <span class="font-weight-bold psi-score-value">90%</span>
									</div>
									<!-- Adding the Copy button -->
									<div class="div-copy-button col-9">
										<!-- <span class="copy-message" id="copy-message"></span> -->
										<button type="button" class="btn btn-outline-secondary" id="copy-with-styles-button">Copy <i class="far fa-copy"></i></button>
										<button type="button" class="btn btn-outline-secondary" id="copy-text-button">Copy (Help Scout) <i class="far fa-copy"></i></button>
									</div>
								</div>
								<div id="response-content-to-copy">
									<p>​I have tested <?php echo $url ?> with our diagnosis tool.</p>
									<p>This tool allows me to detect the most relevant WP Rocket features with a direct impact on your Pagespeed score.</p>

									<p>Please see this side-by-side comparison of your performance reports, <a href="https://developers.google.com/speed/pagespeed/insights/?hl=en&url=<?php echo $url ?>" target="_blank">cached</a> vs <a href="https://developers.google.com/speed/pagespeed/insights//?hl=en&url=<?php echo $url ?>?nowprocket" target="_blank">non-cached</a>: [INSERT SCREENSHOT LINK HERE]<br><br>
									[KEEP THIS IF TRUE]<br>Your site is definitely faster with WP Rocket!<br>[/KEEP THIS IF TRUE]
</p>

									<?php

									//ROCKET PSI SCANNER	

									// GET SITE HTML
									$html = new html();
									$site_html = $html->get_html($url);


									$scanner = new scanner_psi();
									$widget_body = $scanner->html_scan($site_html);


									echo $widget_body;


									?>
									<p class="out-of-scope"><br>--------<br><span style="font-weight: bold;"><b>Some extra tips</b></span> to improve your performance even further:</p>
									<ul id="response-psi-opportunities-list-can-advise"></ul>

									
									<p class="out-of-scope"><br>--------<br><span style="font-weight: bold;"><b>Beyond WP Rocket:</b></span> there are some important optimizations pending, but we can't fix these for you. You should work them on your own:</p>
									<ul id="response-psi-opportunities-list"></ul>

									<p><br><br>

										You can learn more about the recommendations in <span style="font-weight: bold;"><b><a href="https://docs.wp-rocket.me/category/1378-pagespeed">our dedicated PageSpeed documentation</a>.</b></span>

									</p>
									<p>That should be a great start. Please let me know how it goes, and write back if you have any other questions. :)</p>
								</div>
							</div>
						</div>

						<div class="col-2">
							<div class="follower">
								<h4>3 - Add some opportunities and recommendations <button type="button" class="btn btn-outline-secondary btn-sm" id="fix-button">float it <i class="fas fa-window-restore "></i></button></h4>
								<small>From this list, add 3 or 4 <span style="font-weight: bold;"><b>Opportunities</b></span> from the cached version Pagespeed report.<br><strong>Important:</strong> If there are still any WPR options to activate, some opportunities will be automatically disabled to avoid sending duplicated recommendations.</small><br><br>
<button type="button" class="btn btn-outline-secondary btn-sm" id="hide-greens">Toggle passed audits <i class="far fa-eye"></i></button> <span class="hint out-of-scope">Out of scope</span>
								<br><br>

								<form id="psi-opportunities-list" method="post">
									<div>

									</div>
								</form>

							</div>

						</div>
						<div class="col-4">
							<div class="indicators">
						<h4>4 - Indicators <button type="button" class="btn btn-outline-secondary btn-sm" id="fix-button-indicators">float it <i class="fas fa-window-restore "></i></button></h4>
						<?php include('indicators.php');?>
						</div>				


						</div>

					</div>
				</div>

			<?php endif;  ?>

			<?php if ($url) : ?>
				<!-- 3rd  STEP  -->
				<div class="clearfix"></div>

				<div class="box">
					<div class="row px-4 py-0">
						<div class="col-6">
							<h4 id="step-2">5 - Pagespeed. Results table comparison [work in progress]</h4>
						</div>
					</div>


					<div class="row p-4 py-0 psi-iframes-message">
						<!--h3>The results table will be here after the PSI API finishes...</h3-->
					</div>

					<div class="row p-4 py-0 psi-iframes hiddenx">
						<div class="col-8">

						<table class="table table-bordered" style="background-color: #FFF">
							<thead class="thead-light">
								<tr>
								  <th scope="col">Metric</th>
								  <th scope="col" colspan="2"><a href="https://developers.google.com/speed/pagespeed/insights/?hl=en&url=<?php echo $url ?>" target="_blank">Mobile</a></th>
								  <th scope="col" colspan="2"><a href="https://developers.google.com/speed/pagespeed/insights/?hl=en&url=<?php echo $url ?>?nowprocket" target="_blank">Desktop</a></th>
								  <th scope="col">Improvement</th>
								</tr>
								
								<tr>
									 <th scope="col"></th>
									 <th scope="col"><i class="fas fa-mobile-alt "></i> WP Rocket</th>
									  <th scope="col"><i class="fas fa-mobile-alt"></i> Not Cached</th>
										<th scope="col"><i class="fas fa-desktop"></i>  WP Rocket</th>
									<th scope="col"><i class="fas fa-desktop"></i> Not Cached</th>									 
										<th scope="col"></th>
								</tr>
									
									
							  </thead>
							  <tbody>
								  <tr>
									<th scope="row">Performance</th>
									<td class="wpr-result-preformance"><span class="psi-score-value"></span></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								  </tr>
								<tr>
								<th scope="row">First Contentful Paint</th>
								<td><span class="first-Contentful-paint"></span></td>
<td></td>
<td></td>
<td></td>
<td></td>
							  </tr>
							  <tr>
								  <th scope="row">Speed Index</th>
								  <td><span class="speed-index"></span></td>
<td></td>
<td></td>
<td></td>
<td></td>
								</tr>
							<tr>
								  <th scope="row">Largest Contentful Paint</th>
								  <td><span class="speed-index"></span></td>
<td></td>
<td></td>
<td></td>
<td></td>
								</tr>
							<tr>
								  <th scope="row">Time to Interactive</th>
								  <td><span class="speed-index"></span></td>
<td></td>
<td></td>
<td></td>
<td></td>
								</tr>	
								<tr>
									  <th scope="row">Total Blocking Time</th>
									  <td><span class="speed-index"></span></td>
<td></td>
<td></td>
<td></td>
<td></td>
									</tr>				  
							<tr>
								  <th scope="row">Cumulative Layout Shift</th>
								  <td><span class="speed-index"></span></td>
<td></td>
<td></td>
<td></td>
<td></td>
								</tr>					    							  
							
							<tbody>
							
							
						</table>
						
							
						</div>

					</div>
				</div>
			<?php endif; ?>

		<?php
			$additionalScripts = [
				'assets/js/psi-database.js',
				'assets/js/engine/psi/psi.js',
				'assets/js/engine/psi-test/psi-test.js',
			];
			include('inc/footer.php');
