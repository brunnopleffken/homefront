/*
 * HOMEFRONT ONLINE GAME CLIENT
 * (c) 2015 - Homefront Online. All rights reserved.
 * Developed by Brunno Pleffken Hosti
 *
 * ../libraries/Report.js
 */

$(document).ready(function() {
	"use strict";

	(function() {
		$.ajax({
			url: 'report/build_situation_report',
			type: 'post',
			dataType: 'json'
		})
		.done(function(data) {
			console.log("success");
			console.log(data);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

	}).call(this);

});
