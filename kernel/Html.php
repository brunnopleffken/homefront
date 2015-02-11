<?php
/*
 * HOMEFRONT ONLINE GAME CLIENT
 * (C) 2014 - Homefront Online. All rights reserved.
 * Developed by Brunno Pleffken Hosti
 *
 * ../kernel/Html.php
 */

class Html
{
	/**
	 * --------------------------------------------------------------------
	 * GET AND SANITIZE QUERYSTRING VALUE
	 * --------------------------------------------------------------------
	 */
	public static function Request($variable, $numeric_only = false)
	{
		@$val = String::Sanitize($_REQUEST[$variable]);

		// Check if value exists and if it is numeric if defined in $numeric_only
		if(!is_numeric($val) && $numeric_only && !isset($_REQUEST[$variable])) {
			return false;
		}

		return $val;
	}

	/**
	 * --------------------------------------------------------------------
	 * SHOW FORMATTED ERROR MESSAGE
	 * --------------------------------------------------------------------
	 */
	public static function Error($message)
	{
		echo "<h1>Error!</h1><p>" . $message . "</p><hr><em>Homefront Online - (c) " . date("Y") . " All rights reserved.</em>";
		exit;
	}
}

?>
