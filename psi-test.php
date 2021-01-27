<?php


$counter = file_get_contents('./file') + 1;
file_put_contents('./file', $counter);


// PSI Recommendations generator
define('MAX_FILE_SIZE', 2000000); // Simple HTML parser has a low limit of 600000

if ($_GET['url']) :

	$url          = rtrim($_GET['url'], '/') . '/';
	$url_nocache  = $_GET['url'] . '?nowprocket';

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
		h2 {
			margin-bottom: 20px;
		}

		h4 {
			font-size: 1.2rem;
		}

		.box {
			margin-bottom: 40px;
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
			padding: 5px;
			background: #eaeaea;
			border-radius: 10px;
			margin: 5px;
			border: 2px solid #EAEAEA;
		}

		.form-check.active {
			padding: 5px;
			background: #FFF;
			border-radius: 10px;
			margin: 5px;
			border: 2px solid #333;
		}

		.form-check label {
			display: block;
			padding-left: 1.25rem;
		}

		.form-check-input {
			position: absolute;
			margin-left: 0;
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

						<h2>PSI Reply Builder</h2>

						<h4 id="step-1">1 - Enter the website url and RUN REPORT</h4>

						<form class="form-inline my-4 my-lg-0 w-100 ml-auto" method="get">
							<input name="url" class="form-control w-75" type="search" placeholder="URL to test" aria-label="Search" value="<?php echo $url ?>">
							<button class="btn btn-dark" type="submit">RUN REPORT</button>

						</form>
					</div>
				</div>
			</div>


			<div class="clearfix"></div>
			<?php if ($url) :  ?>
				<div class="box">
					<div class="row px-4 py-0">

						<div class="col-6">

							<h4 id="step-3">2 - PSI Response</h4>


							<div class="report" id="report-box">
								<!-- Adding the Copy button -->
								<div class="div-copy-button">
									<span class="copy-message" id="copy-message"></span>
									<button type="button" class="btn btn-outline-secondary" id="copy-with-styles-button">Copy <i class="far fa-copy"></i></button>
									<button type="button" class="btn btn-outline-secondary" id="copy-text-button">Copy (Help Scout) <i class="far fa-copy"></i></button>
								</div>
								<div id="response-content-to-copy">
									<p>Your site is definitely faster with WP Rocket. <br>Please see this side-by-side comparison of your performance reports, <a href="https://developers.google.com/speed/pagespeed/insights/?url=<?php echo $url ?>" target="_blank">cached</a> vs <a href="https://developers.google.com/speed/pagespeed/insights/?url=<?php echo $url ?>?nowprocket" target="_blank">non-cached</a>: [INSERT SCREENSHOT LINK HERE]</p>

									<p>I have tested your website with our diagnosis tool. This tool allows me to detect the most relevant WP Rocket features with a direct impact on your Pagespeed score.</p>
									<?php

									//ROCKET PSI SCANNER	

									// GET SITE HTML
									$html = new html();
									$site_html = $html->get_html($url);


									$scanner = new scanner_psi();
									$widget_body = $scanner->html_scan($site_html);


									echo $widget_body;


									?>

									<p>
										<span style="font-weight: bold;"><b>
											Based on Pagespeed recommendations, here I send you some specific performance optimization tips for your website:
										</b></span>
									</p>
									<ul id="response-psi-opportunities-list">

<!-- 
										<li class="defer-offscreen-images hidden">
											<p><span style="font-weight: bold;"><b>Defer offscreen images</b></span><br>Our <a href="https://docs.wp-rocket.me/category/32-lazyload">LazyLoad for Images</a> feature can usually help with this.<br><br>

												But do keep in mind that while our LazyLoad feature now targets background images, it looks for <a href="https://docs.wp-rocket.me/article/1141-using-lazyload-in-wp-rocket#background-images">a very specific markup set</a>.<br><br>

												In some cases where our LazyLoad cannot be automatically be applied to a given image, you may be able to <a href="https://docs.wp-rocket.me/article/130-manually-apply-lazyload-to-an-image">apply it manually instead</a>. For those images, you can either add them in a way that matched the targeted markup or focus on optimizing their size and extension.
											</p>
										</li>


										<li class="avoid-an-excessive-dom-size hidden">
											<p><span style="font-weight: bold;"><b>Avoid an excessive DOM size</b></span><br>This is something you would have to address directly through the design of your site.<br><br>

												A DOM element is something like a DIV, HTML, BODY, etc. element on a page -- in other words, these have to do with the HTML structure of your pages, so you'd have to actually change that structure outside WP Rocket in order to satisfy this suggestion.</p>
										</li>



										<li class="avoid-serving-legacy-javascript-to-modern-browsers hidden">
											<p><span style="font-weight: bold;"><b>Avoid serving legacy JavaScript to modern browsers</b></span><br>You should check the JavaScript files listed in this recommendation and send the following request to the respective plugin/theme/external service support team:<br><br>

												<em>"Polyfills and transforms enable legacy browsers to use new JavaScript features. However, many aren't necessary for modern browsers. For your bundled JavaScript, adopt a modern script deployment strategy using module/nomodule feature detection to reduce the amount of code shipped to modern browsers, while retaining support for legacy browsers."</em><br><br>

												This isn’t something that WP Rocket can work on at the moment. It basically means your site is using old JavaScript rules for browsers that don’t need them, and this should be avoided.<br><br>

												This Opportunity is somewhat hard to accomplish but since its impact may not be noticeable for the visitor experience you could safely discard it.</p>
										</li>


										<li class="eliminate-render-blocking-resources hidden">
											<p><span style="font-weight: bold;"><b>Eliminate render blocking resources</b></span><br>Enable the <span style="font-weight: bold;"><b>Optimize CSS delivery</b></span> feature in the File Optimizations tab, and wait for the success message in the WP Rocket settings page in order to be sure it was applied to your site.</p>
										</li>




										<li class="minify-css hidden">
											<p><span style="font-weight: bold;"><b>Minify CSS</b></span><br>Minifying CSS files basically consists in removing the comments and spaces that were added to the CSS files for readability purposes, making the CSS files smaller.<br><br>

												Reducing the size of the CSS files translates into data savings for your website’s visitors.

												With WP Rocket, you can easily address this opportunity by enabling <a href="https://docs.wp-rocket.me/article/1350-css-minify-combine">Minify CSS files</a> in the File Optimization tab.

												You can also find more information in Google’s official article, <a href="https://web.dev/unminified-css/">Minify CSS</a>.
											</p>
										</li>



										<li class="minify-javascript hidden">
											<p><span style="font-weight: bold;"><b>Minify JavaScript</b></span><br>JavaScript minification consists on removing the unnecessary information from the scripts, things like spacing and developer comments are deleted when files are minified.

												The goal of JavaScript minification is to decrease the parsing time and reduce the size of the scripts that need to be downloaded when visiting your website.

												WP Rocket’s <a href="https://docs.wp-rocket.me/article/1351-javascript-minify-combine">Minify JavaScript files</a> feature in the File Optimization tab should take care of this recommendation very easily.

												Please check Google’s article on <a href="https://web.dev/unminified-javascript/">Minify JavaScript</a>.
											</p>
										</li>


										<li class="properly-size-images hidden">
											<p><span style="font-weight: bold;"><b>Properly size images</b></span><br>This means you're using images that are bigger than the space in which they are displayed, forcing the browser to resize them.<br>
												So, the way to solve the problem would be to use images that are exactly the same size as they are presented in the various sections of your page.</p>
										</li>



										<li class="preload-key-requests hidden">
											<p><span style="font-weight: bold;"><b>Preload key requests</b></span><br> According to what Google explains <a href="https://developers.google.com/web/tools/lighthouse/audits/preload">here</a> they want you to add <em>rel=preload</em> attribute to the LINK tag.<br><br>

												For font files, since WP Rocket v3.6, you can add them in the <span style="font-weight: bold;"><b>Preload Fonts</b></span> section (from the Preload tab: https://share.getcloudapp.com/qGuK8J9w).<br><br>

												You can find more info about how to use the feature in <a href="https://docs.wp-rocket.me/article/1317-preload-fonts">this link</a>.</p>
										</li>



										<li class="remove-unused-javascript hidden">
											<p><span style="font-weight: bold;"><b>Remove unused JavaScript</b></span><br>Our feature, <span style="font-weight: bold;"><b><em>Delay JavaScript Execution</em></b></span> can help. By delaying the files, PageSpeed will no longer warn you about them. However, not every file can be safely delayed. You should only delay files which are not needed for anything “above the fold”. <a href="https://docs.wp-rocket.me/article/1349-delay-javascript-execution">Please see this doc</a>.<br>

												Alternatively, the following plugins can help you to minimize unused JS from your pages. Please use them with care and consult your developer if you need help.<br>
												<ul>
													<li>https://wordpress.org/plugins/plugin-organizer/</li>
													<li>https://wordpress.org/plugins/wp-asset-clean-up/</li>
													<li>https://tomasz-dobrzynski.com/wordpress-gonzales</li>
												</ul>
											</p>
										</li>



										<li class="remove-unused-css hidden">
											<p><span style="font-weight: bold;"><b>Remove unused CSS</b></span><br>The description for "Remove unused CSS" says, <em>"Remove unused rules from stylesheets to reduce unnecessary bytes consumed by network activity"</em>.<br><br>

												When you're using pre-built WordPress themes and plugins, they will typically contain more code than is necessary for each page because the author cannot predict how the user will build their site. For example, the homepage might have grids showing the latest posts, but inner pages might not have this. But homepage and inner pages often have the same stylesheet. Which means, CSS for a different page will have to be loaded on the homepage and vice versa.<br><br>

												It's almost impossible to automate this accurately, and difficult to do even by hand. This article explains all the reasons why:<br>
												https://css-tricks.com/how-do-you-remove-unused-css-from-a-site/

												By activating the <span style="font-weight: bold;"><b>Optimize CSS Delivery</b></span> option, WP Rocket defers the loading of CSS, but we cannot remove the unused parts.<br><br>

												To truly satisfy this recommendation you would have to custom-code your site.
											</p>
										</li>



										<li class="serve-images-in-next-gen-formats hidden">
											<p><span style="font-weight: bold;"><b>Serve images in next-gen formats</b></span><br>You can consider converting images to WebP format with some plugins. Depending on the settings in the image optimization plugin you may or may not need to activate WebP cache in WP Rocket. Here are more details on that: <a href="https://docs.wp-rocket.me/article/1282-webp">WebP Compatibility</a>

												We have built-in compatibility with <a href="https://wordpress.org/plugins/imagify/">Imagify plugin</a> and some other. Sometimes the plugin can deliver the WebP images itself. In this case, you don't need to activate WebP cache option in WP Rocket.</p>
										</li>



										<li class="serve-static-assets-with-an-efficient-cache-policy hidden">
											<p><span style="font-weight: bold;"><b>Serve static assets with an efficient cache policy</b></span><br>Try enabling:<br>
												<a href="https://docs.wp-rocket.me/article/1103-google-tracking-add-on">Google Tracking Add-On</a><br>
												<a href="https://docs.wp-rocket.me/article/1117-facebook-pixel-add-on">Facebook Pixel Add-On</a><br>
												They can be found in the Add-on tab in WP Rocket.</p>
										</li>



										<li class="reduce-initial-server-response-time hidden">
											<p><span style="font-weight: bold;"><b>Reduce initial Server Response Time</b></span><br>WP Rocket's page caching will definitely improve the server response time.<br><br>

												Serving the cache via our rewrite rules in the htaccess is the most optimal method. When the Separate cache file for mobile option is active, our rewrite rules are removed from the htaccess and the cache is served using PHP instead. Usually this doesn't make a noticeable difference but if there are any server problems, it won't be quite as fast.<br><br>

												So you should also experiment with that option to see if having it turned off makes any further improvement in the TTFB.<br><br>

												But otherwise, any remaining issues with TTFB would point to some other underlying issues beyond WP Rocket's control, such as:<br>
												- Server performance<br>
												- Slow code from the theme or another plugin<br>
												- Distance between the testing location and your server<br><br>

												We also have some extra tips here which may help:<br>
												https://docs.wp-rocket.me/article/103-my-website-is-slow</p>
										</li>




 -->

									</ul>
								</div>
							</div>
						</div>

						<div class="col-6">
							<h4>3 - Add some opportunities and recommendations</h4>
							<small>From this list, add some of the <span style="font-weight: bold;"><b>Opportunities</b></span> from the Pagespeed report gave you for the <em>cached</em> version of the website.</small>

							<br><br>
							<form id="psi-opportunities-list" method="post">


							</form>



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
							<h4 id="step-2">4 - Pagespeed. Side by Side visual comparison test</h4>
							<small>This is the current WP Rocket's benefit on your website. You can see the report for the cached version of your website on the left, and the non-cached version on the right. If you scroll down at the cached version, you can find the top <span style="font-weight: bold;"><b>Opportunities and Recommendations</b></span>, these are the ones you can use on <a href="#step-3">Step #3</a> to get add some customized performance recommendations.</small>

						</div>
					</div>




					<div class="row p-4 py-0">
						<div class="col-6">

							<h5>With WP Rocket: <a href="https://developers.google.com/speed/pagespeed/insights/?url=<?php echo $url ?>" target="_blank">Open report in a new tab</a></h5>


							<iframe id="iframe1" scrolling="yes" class="browser" width="100%" frameborder="0" height="1100" src="https://developers.google.com/speed/pagespeed/insights/?url=<?php echo $url ?>"></iframe>

						</div>

						<div class="col-6">
							<h5>Not Cached: <a href="https://developers.google.com/speed/pagespeed/insights/?url=<?php echo $url ?>?nowprocket" target="_blank">Open report in a new tab</a></h5>

							<iframe id="iframe2" class="browser" width="100%" frameborder="0" height="1100" src="https://developers.google.com/speed/pagespeed/insights/?url=<?php echo $url ?>?nowprocket"></iframe>
						</div>

					</div>
				</div>
			<?php endif; ?>



			<?php if ($urlXX) : ?>
				<!-- 3rd  STEP  -->
				<div class="clearfix"></div>

				<div class="box">
					<div class="row px-4 py-0">
						<div class="col-6">
							<h4 id="step-3">3 - Pagespeed recommendations</h4>
							<small>From this list, check the <span style="font-weight: bold;"><b>Opportunities</b></span> your Pagespeed report gave you for the cached version of your website.<br>When you are ready click the "<span style="font-weight: bold;"><b>Get performance recommendations</b></span>" button</small>

							<br><br>
							<form method="post">

								<?php
								$psi_opportunities = array();
								$psi_opportunities[] = 'Minify JavaScript';
								$psi_opportunities[] = 'Minify CSS';
								$psi_opportunities[] = 'Properly size images';
								$psi_opportunities[] = 'Preload key requests';
								$psi_opportunities[] = 'Remove unused JavaScript';
								$psi_opportunities[] = 'Remove unused CSS';
								$psi_opportunities[] = 'Serve images in next-gen formats';
								$psi_opportunities[] = 'Avoid serving legacy JavaScript to modern browsers';


								$psi_diagnostics = array();
								$psi_diagnostics[] = 'Does not use passive listeners to improve scrolling performance';
								$psi_diagnostics[] = 'Ensure text remains visible during webfont load';
								$psi_diagnostics[] = 'Reduce the impact of third-party code';
								$psi_diagnostics[] = 'Reduce JavaScript execution time ';
								$psi_diagnostics[] = 'Reduce JavaScript execution time ';
								$psi_diagnostics[] = 'Reduce JavaScript execution time ';
								$psi_diagnostics[] = 'Reduce JavaScript execution time ';


								?>

								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="remove-unused-javaScript" id="remove-unused-javaScript">
									<label class="form-check-label" for="remove-unused-javaScript"> Remove unused JavaScript
									</label>
								</div>

								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="remove-unused-css" id="remove-unused-css">
									<label class="form-check-label" for="remove-unused-css"> Remove unused CSS
									</label>
								</div>

								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="minify-javaScript" id="minify-javaScript">
									<label class="form-check-label" for="minify-javaScript">Minify JavaScript
									</label>
								</div>

								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="minify-javaScript" id="minify-javaScript">
									<label class="form-check-label" for="minify-javaScript">... </label>
								</div>
								<br>
								<button type="submit" class="btn btn-primary">Get performance recommendations &rsaquo;</button>
							</form>

						</div>
					</div>
				</div>


			<?php endif; ?>



			<?php
			include('inc/footer.php');
