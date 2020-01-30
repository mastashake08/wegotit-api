<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>{{env('APP_NAME')}}</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="stellar/assets/css/main.css" />
		<noscript><link rel="stylesheet" href="stellar/assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<span class="logo"><img src="{{url('/logo.svg')}}" alt="WeGotIt Logo" width="500px" height="500px" /></span>
						<h1>{{env('APP_NAME')}}</h1>
						<p>Get your food and merchandise while you enjoy the entertainment you came for.</p>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="#intro" class="active">Introduction</a></li>
							<li><a href="#first">Features</a></li>
							<li><a href="#cta">Get Started</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Introduction -->
							<section id="intro" class="main">
								<div class="spotlight">
									<div class="content">
										<header class="major">
											<h2>Food Mobile Point of Sale System</h2>
										</header>
										<p>{{env('APP_NAME')}} is an on demand app that connects event vendors with customers looking to order food, drink and merchandise.</p>
										<ul class="actions">
											<li><a href="{{url('/venues')}}" class="button">Shop Now</a></li>
										</ul>
									</div>
									<span class="image"><img src="https://www.pexels.com/photo/1390940/download/?search_query=fast%2520food&tracking_id=5aax471hhy8" alt="" /></span>
								</div>
							</section>

						<!-- First Section -->
							<section id="first" class="main special">
								<header class="major">
									<h2>Features</h2>
								</header>
								<ul class="features">
									<li>
										<span class="icon major style1 fa-mobile"></span>
										<h3>mPOS</h3>
										<p>{{env('APP_NAME')}} mobile point of sales system makes it easy to accept in app payments for all of your orders.</p>
									</li>
									<li>
										<span class="icon major style3 fa-exclamation"></span>
										<h3>Push Notifications</h3>
										<p>Keep your team and the customer in the loop in real time with push notifications. </p>
									</li>
									<li>
										<span class="icon major style5 fa-tachometer"></span>
										<h3>Dashboard</h3>
										<p>See all your orders and inventory in a sleek dashboard.</p>
									</li>
								</ul>
								<footer class="major">
									<ul class="actions special">
										<li><a href="generic.html" class="button">Learn More</a></li>
									</ul>
								</footer>
							</section>


						<!-- Get Started -->
							<section id="cta" class="main special">
								<header class="major">
									<h2>Ready To Get Started?</h2>
									<p>Whether you are looking for food, convenience or fun {{env('APP_NAME')}}<br /></p>
								</header>
								<footer class="major">
									<ul class="actions special">
										<li><a href="{{url('/home')}}" class="button primary">Get Started</a></li>
										<li><a href="{{url('/about')}}" class="button">Learn More</a></li>
									</ul>
								</footer>
							</section>

					</div>

				<!-- Footer -->
					<footer id="footer">
			         <p class="copyright">&copy; {{env('APP_NAME')}}. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="stellar/assets/js/jquery.min.js"></script>
			<script src="stellar/assets/js/jquery.scrollex.min.js"></script>
			<script src="stellar/assets/js/jquery.scrolly.min.js"></script>
			<script src="stellar/assets/js/browser.min.js"></script>
			<script src="stellar/assets/js/breakpoints.min.js"></script>
			<script src="stellar/assets/js/util.js"></script>
			<script src="stellar/assets/js/main.js"></script>

	</body>
</html>
