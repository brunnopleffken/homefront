/*
 * HOMEFRONT ONLINE GAME CLIENT
 * (c) 2015 - Homefront Online. All rights reserved.
 * Developed by Brunno Pleffken Hosti
 *
 * ../resources/Application.js
 */

$(document).ready(function() {
	"use strict";

	// Prevent unhandled drag and drop of files into the browser from replacing the entire app.
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
});
