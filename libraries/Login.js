$(document).ready(function() {
	$("#loginForm").on("submit", function(event) {
		var formData = $(this).serialize();

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
				window.location.href = "report/";
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

		event.preventDefault();
	});
});
