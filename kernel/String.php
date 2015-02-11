<?php
/*
 * HOMEFRONT ONLINE GAME CLIENT
 * (C) 2014 - Homefront Online. All rights reserved.
 * Developed by Brunno Pleffken Hosti
 *
 * ../kernel/String.php
 */

class String
{
	/**
	 * --------------------------------------------------------------------
	 * FORMATTED print_r() FUNCTION
	 * --------------------------------------------------------------------
	 */
	public static function PR($var)
	{
		echo "<pre>";
		print_r($var);
		echo "</pre>";
	}

	/**
	 * --------------------------------------------------------------------
	 * GET AND SANITIZE QUERYSTRING VALUE
	 * --------------------------------------------------------------------
	 */
	public static function Sanitize($text)
	{
		$text = str_replace("&", "&amp;", $text);
		$text = str_replace("<", "&lt;", $text);
		$text = str_replace(">", "&gt;", $text);
		$text = str_replace("'", "&apos;", $text);
		$text = str_replace('"', "&quot;", $text);

		// An extra for double slashes (escape char in PHP)
		$text = str_replace("\\", "\\\\", $text);

		return $text;
	}
}

?>
