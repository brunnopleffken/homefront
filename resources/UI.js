/*
 * HOMEFRONT ONLINE GAME CLIENT
 * (c) 2015 - Homefront Online. All rights reserved.
 * Developed by Brunno Pleffken Hosti
 *
 * ../resources/UI.js
 */

var UI;

(function() {
	"use strict";

	/**
	 * --------------------------------------------------------------------
	 * UI.JS CONSTRUCTOR
	 * --------------------------------------------------------------------
	 */
	UI = function() {};

	/**
	 * --------------------------------------------------------------------
	 * CENTRALIZE MODAL WINDOW
	 * --------------------------------------------------------------------
	 * Used on: loadWindow()
	 */
	UI.prototype._centralizeModalWindow = function(identifier) {
		var elementOffsetHeight = identifier.offsetHeight,
			elementOffsetWidth  = identifier.offsetWidth;

		identifier.style.marginTop = elementOffsetHeight * -0.5 + "px";
		identifier.style.marginLeft = elementOffsetWidth * -0.5 + "px";
	};

	/**
	 * --------------------------------------------------------------------
	 * FADE IN AND CENTRALIZE MAIN MODAL WINDOW
	 * --------------------------------------------------------------------
	 */
	UI.prototype.loadWindow = function() {
		var modalWindow = document.getElementById("modal-window");

		// Hide loader
		$(".loader").hide();

		// Show modal window
		$(modalWindow).fadeIn();

		// PerfectScrollbar.js on main modal-window
		try {
			$('#modal-window .content').perfectScrollbar();
		} catch(e) {
			console.error(e.message);
		}

		// Centralize modal window
		this._centralizeModalWindow(modalWindow);
	};

	/**
	 * --------------------------------------------------------------------
	 * TAB NAVIGATION BAR
	 * --------------------------------------------------------------------
	 */
	UI.prototype.enableTabBar = function() {
		$("body").on("click", "#tab-bar ul li", function() {
			var sectionId = $(this).data("section");

			// Remove "selected" class from tabs
			$("#tab-bar ul li").removeClass("selected");
			$(this).addClass("selected");

			// Show content
			$("#modal-window .content section").fadeOut(200);
			$("#modal-window .content #" + sectionId).delay(200).fadeIn(200, function() {
				$("#modal-window .content").perfectScrollbar();
			});
		});
	}

}).call(this);
