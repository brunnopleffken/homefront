<!DOCTYPE html>
<html>
<head>
	<title>Homefront Online</title>
	<meta charset="utf-8">
	<base href="<?php echo PATH ?>">
	<!-- Cascading Stylesheet -->
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- JavaScript Third-party -->
	<script src="thirdparty/jquery/jquery.min.js"></script>
	<!-- JavaScript Core -->
	<script src="libraries/core/Application.js"></script>
	<script src="libraries/core/Notification.js"></script>
	<script src="libraries/core/UI.js"></script>
	<script src="libraries/core/Utils.js"></script>
	<!-- JavaScript Library -->
	<script src="libraries/<?php echo $this->controller ?>.js"></script>
</head>
<body>

	<!-- MAIN CONTENT FRAME -->

	<div id="main-container" class="main-container">
		<?php echo $this->content ?>
	</div>

	<!-- LOADER -->

	<div class="loader">
		<div class="double-bounce1"></div>
		<div class="double-bounce2"></div>
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
