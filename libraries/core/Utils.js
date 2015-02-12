/*
 * HOMEFRONT ONLINE GAME CLIENT
 * (c) 2015 - Homefront Online. All rights reserved.
 * Developed by Brunno Pleffken Hosti
 *
 * ../libraries/core/Utils.js
 */

var Utils;

(function() {
	"use strict";

	/*
	 * --------------------------------------------------------------------
	 * UTILS.JS CONSTRUCTOR
	 * --------------------------------------------------------------------
	 */
	Utils = function() {};

	/*
	 * --------------------------------------------------------------------
	 * BUILD URL TO ACCESS GAME API
	 * --------------------------------------------------------------------
	 */
	Utils.serverUrl = function(controller, method){
		return SETTINGS.server + "/" + controller + "/" + method;
	};
}).call(this);
