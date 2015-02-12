<!DOCTYPE html>
<html>
<head>
	<title>Homefront Online</title>
	<meta charset="utf-8">
	<base href="<?php echo PATH ?>">
	<!-- Cascading Stylesheet -->
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="thirdparty/select2/select2.css">
	<!-- JavaScript Third-party -->
	<script src="thirdparty/jquery/jquery.min.js"></script>
	<script src="thirdparty/select2/select2.min.js"></script>
	<!-- JavaScript Core -->
	<script src="libraries/core/Application.js"></script>
	<script src="libraries/core/Forms.js"></script>
	<script src="libraries/core/Notification.js"></script>
	<script src="libraries/core/UI.js"></script>
	<script src="libraries/core/Utils.js"></script>
	<!-- JavaScript Library -->
	<script src="libraries/<?php echo $this->controller ?>.js"></script>
</head>
<body>

	<!-- IN-GAME USER INTERFACE -->
	<div class="resources-bar">
		<ul class="resources">
			<li class="credits"><img src="assets/images/resources/credits.png"> 1.000</li>
			<li class="metal"><img src="assets/images/resources/metal.png"> 1.000</li>
			<li class="deuterium"><img src="assets/images/resources/deuterium.png"> 1.000</li>
			<li class="food"><img src="assets/images/resources/food.png"> 1.000</li>
		</ul>
		<ul class="nav">
			<li>
				<a href="report/">
					<span class="logged-player-name">Tellani Confederacy</span>
					<span class="sign-out">[ Sign Out ]</span>
				</a>
			</li>
			<li>
				<a href=""><i class="fa fa-comments"></i></a>
			</li>
			<li>
				<a href="settings/"><i class="fa fa-cogs"></i></a>
			</li>
		</ul>
	</div>

	<div class="navigation-bar">
		<ul>
			<li id="nav-build"><a href="build/"><i class="fa fa-fw fa-wrench"></i><span>Build</span></a></li>
			<li id="nav-research"><a href="research/"><i class="fa fa-fw fa-flask"></i><span>Research</span></a></li>
			<li id="nav-resources"><a href="resources/"><i class="fa fa-fw fa-gears"></i><span>Resources</span></a></li>
			<li id="nav-colonies"><a href="colonies/"><i class="fa fa-fw fa-globe"></i><span>Colonies</span></a></li>
			<li id="nav-economy"><a href="economy/"><i class="fa fa-fw fa-bar-chart"></i><span>Economy</span></a></li>
			<li id="nav-diplomacy"><a href="diplomacy/"><i class="fa fa-fw fa-bank"></i><span>Diplomacy</span></a></li>
			<li id="nav-military"><a href="military/"><i class="fa fa-fw fa-crosshairs"></i><span>Military</span></a></li>
			<li id="nav-galaxymap"><a href="galaxymap/"><i class="fa fa-fw fa-compass"></i><span>Galaxy Map</span></a></li>
		</ul>
	</div>


	<div id="main-container" class="main-container in-game">
		<?php echo $this->content ?>
	</div>

	<!-- LOADER -->

	<div class="loader">
		<div class="double-bounce1"></div>
		<div class="double-bounce2"></div>
	</div>

	<!-- TOAST NOTIFICATION -->

	<div class="toast" style="display:none">
		<span class="title"></span>
		<span class="message"></span>
	</div>

	<!-- FULL SCREEN MODAL WINDOW / FATAL ERROR -->

	<div id="full-modal" class="full-bg-overlay">
		<div class="full-modal-window" id="full-modal-window">
			<span class="title">Warning</span>
			<span class="message"></span>
		</div>
	</div>

	<!-- HALF SCREEN MODAL WINDOW / CONFIRM -->

	<div id="half-modal" class="half-bg-overlay">
		<div class="half-bg-strip">
			<div class="half-modal-window" id="half-modal-window">
				<span class="title"></span>
				<p class="content"></p>
				<div class="buttons">
					<a class="button-link confirm" data-action="confirm">OK</a>
					<a class="button-link refuse" data-action="refuse">Cancel</a>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
