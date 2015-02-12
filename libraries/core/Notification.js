/*
 * HOMEFRONT ONLINE GAME CLIENT
 * (c) 2015 - Homefront Online. All rights reserved.
 * Developed by Brunno Pleffken Hosti
 *
 * ../resources/Notification.js
 */

var Notification = {};

(function() {
	"use strict";

	/**
	 * --------------------------------------------------------------------
	 * WARNING - SHOW SIMPLE WARNING MESSAGE WITH "OK" BUTTON TO CLOSE
	 * --------------------------------------------------------------------
	 */
	Notification.warning = function(title, message) {
		var $modal = $("#half-modal"),
			parent = this;

		// Build warning message and window structure
		document.querySelector(".half-modal-window .title").innerHTML = title;
		document.querySelector(".half-modal-window .content").innerHTML = message;

		// Hide "Cancel" button
		var cancelButton = document.getElementsByClassName("refuse");
		cancelButton[0].style.display = "none";

		// Show Warning window
		$modal.fadeIn();

		// Action when clicking on OK
		$(".half-modal-window a").on("click", function() {
			parent._closeWarningWindow($modal);
		});

		// Hide loader, if it is being shown
		$(".loader").hide();
	};

	/**
	 * --------------------------------------------------------------------
	 * ERROR - SHOW FATAL ERROR MESSAGE WITHOUT ANY ACTION POSSIBLE
	 * --------------------------------------------------------------------
	 */
	Notification.fatalError = function(title, message) {
		var $modal = $("#full-modal");

		// Build warning message and window structure
		document.querySelector(".full-modal-window .title").innerHTML = title;
		document.querySelector(".full-modal-window .message").innerHTML = message;
		$modal.fadeIn();

		// Hide loader, if it is being shown
		$(".loader").hide();
	};

	/**
	 * --------------------------------------------------------------------
	 * SHOW CONFIRMATION MESSAGE TO PLAYER ("OK" and "CANCEL" BUTTONS)
	 * --------------------------------------------------------------------
	 * confirmAction() = callback function to execute if user clicks on OK
	 */
	Notification.confirm = function(title, message, confirmAction) {
		var $modal = $("#half-modal"),
			parent = this;

		// Build warning message and window structure
		document.querySelector(".half-modal-window .title").innerHTML = title;
		document.querySelector(".half-modal-window .content").innerHTML = message;
		$modal.fadeIn();

		// Do defined actions
		$(".half-modal-window a").on("click", function() {
			var $button = $(this);

			if($button.data("action") == "confirm") {
				confirmAction();
			}
			else if ($button.data("action") == "refuse") {
				$modal.fadeOut();
			}
		});
	};

	/**
	 * --------------------------------------------------------------------
	 * PRIVATE: CLOSE MODAL WINDOWS PASSES BY JQUERY REFERENCE
	 * --------------------------------------------------------------------
	 * Used on: warning()
	 */
	Notification._closeWarningWindow = function(modalWindowObject) {
		modalWindowObject.fadeOut(300,
			function() {
				// Show confirm/refuse buttons for further usage
				modalWindowObject.find(".confirm, .refuse").show();
			}
		);
	}

	/**
	 * --------------------------------------------------------------------
	 * TOAST NOTIFICATION (THAT DISAPPEARS 3 SECONDS LATER)
	 * --------------------------------------------------------------------
	 * Type: success | warning | error
	 */
	Notification.toast = function(title, message, type) {
		var $htmlElement = $('.toast');

		// Populate toast notification with data
		document.querySelector('.toast .title').innerHTML = title;
		document.querySelector('.toast .message').innerHTML = message;

		// Show toast notification for 3s and then fades out
		$htmlElement.addClass('visible ' + type).delay(4000).fadeOut(1000, function() {
			$(this).removeClass('visible ' + type);
		});
	}

}).call(this);
