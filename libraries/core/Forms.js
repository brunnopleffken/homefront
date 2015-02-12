/*
 * HOMEFRONT ONLINE GAME CLIENT
 * (c) 2015 - Homefront Online. All rights reserved.
 * Developed by Brunno Pleffken Hosti
 *
 * ../libraries/core/Forms.js
 */

var Forms;

(function() {
	"use strict";

	/*
	 * --------------------------------------------------------------------
	 * FORMS.JS CONSTRUCTOR
	 * --------------------------------------------------------------------
	 */
	Forms = {};

	/*
	 * --------------------------------------------------------------------
	 * PERFORM FORM VALIDATION
	 * --------------------------------------------------------------------
	 */
	Forms.validateForm = function(formId) {
		var stopSend = false;
		var parent   = this;

		$(formId).find("input[type=text], input[type=password], textarea, select").filter(".required")
			.each(function() {
				// Valida campo vazio
				if($(this).val() == "") {
					this.classList.add("error");
					stopSend = true;
				}
				else {
					this.classList.remove("error");
				}

				// Validate e-mail field
				if($(this).hasClass("email")) {
					if(!parent._emailValidation($(this).val())) {
						this.classList.add("error");
						stopSend = true;
					}
					else {
						this.classList.remove("error");
					}
				}

				// Validate numeric only fields
				if($(this).hasClass("numeric")) {
					if(!parent._numericOnly($(this).val())) {
						this.classList.add("error");
						stopSend = true;
					}
					else {
						this.classList.remove("error");
					}
				}
			});

		return stopSend;
	}

	/*
	 * --------------------------------------------------------------------
	 * E-MAIL SYNTAX VALIDATION
	 * --------------------------------------------------------------------
	 */
	Forms._emailValidation = function(string) {
		var pattern = new RegExp(/^[a-z0-9_\.\-]+\@[a-z0-9_\.\-]+\.[a-z]{2,3}$/gm),
			result  = pattern.test(string);

		return result;
	}

	/*
	 * --------------------------------------------------------------------
	 * NUMERIC ONLY FIELD
	 * --------------------------------------------------------------------
	 */
	Forms._numericOnly = function(string) {
		var pattern = new RegExp(/([0-9]*)/),
			result  = pattern.test(string);

		return result;
	}

}).call(this);
