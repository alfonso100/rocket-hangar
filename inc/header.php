<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->

    <!-- Bootstrap 5 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
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
			background: #999;
			border-radius: 10px;
			min-height: 100px;
			transition: height 2s;

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