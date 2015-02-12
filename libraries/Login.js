/*
 * HOMEFRONT ONLINE GAME CLIENT
 * (c) 2015 - Homefront Online. All rights reserved.
 * Developed by Brunno Pleffken Hosti
 *
 * ../libraries/Login.js
 */

$(document).ready(function() {
	"use strict";

	/*
	 * --------------------------------------------------------------------
	 * VALIDATE LOGIN FORM AND SUBMIT
	 * --------------------------------------------------------------------
	 */
	$("#loginForm").on("submit", function(event) {
		var isValid  = Forms.validateForm($(this));
		var formData = $(this).serialize();

		event.preventDefault();

		if(!isValid) {
			$.ajax({
				url: $(this).attr("action"),
				type: "POST",
				dataType: "json",
				data: formData,
				beforeSend: function() {
					UI.startLoader();
				}
			})
			.done(function(data) {
				if(data.status == "ok") {
					console.log("Form OK");
					// window.location.href = "report/";
				}
				else if(data.status == "wrong_password") {
					Notification.warning(
						"Login Failed",
						"Wrong username or password."
					);
					UI.endLoader();
				}
				else if(data.status == "banned") {
					Notification.warning(
						"Login Failed",
						"You have been banned."
					);
					UI.endLoader();
				}
			})
			.fail(function() {
				Notification.warning(
					"HTTP Request failed",
					"Unable to retrieve player information."
				);
				UI.endLoader();
			});
		}
	});
});
