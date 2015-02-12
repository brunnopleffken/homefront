/*
 * HOMEFRONT ONLINE GAME CLIENT
 * (c) 2015 - Homefront Online. All rights reserved.
 * Developed by Brunno Pleffken Hosti
 *
 * ../libraries/core/Application.js
 */

/*
 * --------------------------------------------------------------------
 * INITIAL GLOBAL SETTINGS
 * --------------------------------------------------------------------
 */
var SETTINGS = {
	server: "http://localhost/homefront",  // Define HTTP Request URL to server
	token: "7abaa0020aec",  // Token to identify main application requests
	debug: true  // Enable console.log method (disable in production environment)
};

/*
 * --------------------------------------------------------------------
 * GLOBAL FUNCTIONS THAT MUST BE APPLIED TO ALL PAGES
 * --------------------------------------------------------------------
 */
$(document).ready(function() {
	"use strict";

	// Prevent unhandled drag and drop of files into the browser from replacing the entire app
	$(window.document)
		.on("dragover", function(event) {
			event.stopPropagation();
			event.preventDefault();
		})
		.on("drop", function(event) {
			event.stopPropagation();
			event.preventDefault();
		});

	// Prevent unhandled middle button clicks from triggering native behavior
	$("html").on("mousedown", function(event) {
		if(event.button == 1) {
			event.preventDefault();
		}
	});

	// Transform SELECT fields to Select2
	$(".select2").select2({
		width: "element"
	});

	// Centralize window
	UI.loadWindow();
	UI.enableTabBar();

});
