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
include('inc/header.php');
include('inc/nav.php');

?>



	<div class="container-fluid">
		<div class="grids">


			<!-- FIRST STEP  -->
			<div class="box">
				<div class="row px-4 py-0">
					<div class="col-12">

						<h2>PSI Test Tool - V2</h2>
	
					<h4 id="step-1">1 - Enter the website url and RUN REPORT</h4>

						<form class="form-inline my-4 my-lg-0 w-100 ml-auto" method="get">


						<div class="custom-control custom-switch">
						  <input  name="checked" type="checkbox" class="custom-control-input" id="customSwitch1" <?=$checked ?>>
						  <label class="custom-control-label" for="customSwitch1" ><em>I have verified the website is optimized by WP Rocket</em></label>
						  </div>
						  <br>
						  <input name="url" class="form-control w-75" type="url" placeholder="URL to test" aria-label="Url" value="<?php echo $url ?>" style="display:inline-block;    width: 90% !important;">
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
			<?php endif; ?>

		<?php
			$additionalScripts = [
				'assets/js/psi-database.js',
				'assets/js/engine/psi/psi.js',
				'assets/js/engine/psi-test/psi-test.js',
			];
			include('inc/footer.php');
