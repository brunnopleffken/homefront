/*
 * HOMEFRONT ONLINE GAME CLIENT
 * (c) 2015 - Homefront Online. All rights reserved.
 * Developed by Brunno Pleffken Hosti
 *
 * ../libraries/core/UI.js
 */

var UI;

(function() {
	"use strict";

	/**
	 * --------------------------------------------------------------------
	 * UI.JS CONSTRUCTOR
	 * --------------------------------------------------------------------
	 */
	UI = {};

	/**
	 * --------------------------------------------------------------------
	 * CENTRALIZE MODAL WINDOW
	 * --------------------------------------------------------------------
	 * Used on: loadWindow()
	 */
	UI._centralizeModalWindow = function(identifier) {
		var elementOffsetHeight = identifier.offsetHeight,
			elementOffsetWidth  = identifier.offsetWidth;

		identifier.style.marginTop = elementOffsetHeight * -0.5 + "px";
		identifier.style.marginLeft = elementOffsetWidth * -0.5 + "px";
	}

	/**
	 * --------------------------------------------------------------------
	 * FADE IN AND CENTRALIZE MAIN MODAL WINDOW
	 * --------------------------------------------------------------------
	 */
	UI.loadWindow = function() {
		var modalWindow = document.getElementById("modal-window");

		// Hide loader
		$(".loader").hide();

		// Show modal window
		$(modalWindow).fadeIn();

		// PerfectScrollbar.js on main modal-window
		try {
			$('#modal-window .content').perfectScrollbar();
		} catch(e) {
			console.log(e.message);
		}

		// Centralize modal window
		this._centralizeModalWindow(modalWindow);

		// Mark corresponding navigation bar item
		this._selectNavigationBarItem(SETTINGS.controller);
	}

	/**
	 * --------------------------------------------------------------------
	 * INITIATE LOADER AND HIDE FRAME WINDOW
	 * --------------------------------------------------------------------
	 */
	UI.startLoader = function() {
		$(".modal-window").hide();
		$(".loader").show();
	}

	/**
	 * --------------------------------------------------------------------
	 * CLOSE LOADER AND SHOW FRAME WINDOW
	 * --------------------------------------------------------------------
	 */
	UI.endLoader = function() {
		$(".modal-window").fadeIn();
		$(".loader").hide();
	}

	/**
	 * --------------------------------------------------------------------
	 * TAB NAVIGATION BAR
	 * --------------------------------------------------------------------
	 */
	UI.enableTabBar = function() {
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

	/**
	 * --------------------------------------------------------------------
	 * SELECT CORRESPONDING ITEM ON NAVIGATION BAR
	 * --------------------------------------------------------------------
	 */
	UI._selectNavigationBarItem = function(controller) {
		var controller = controller.toLowerCase();
		$(".navigation-bar #nav-" + controller).addClass("selected");
	}

}).call(this);
