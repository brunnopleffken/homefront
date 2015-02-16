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

	/**
	 * --------------------------------------------------------------------
	 * ONE-WAY PASSWORD ENCRYPTION
	 * --------------------------------------------------------------------
	 */
	public static function Encrypt($password)
	{
		return hash("sha512", base64_decode("Ly9ob21lZnJvbnQ=") . $password);
	}

	/**
	 * --------------------------------------------------------------------
	 * GENERATE RANDOM 8 CHAR PASSWORD
	 * --------------------------------------------------------------------
	 */
	public static function MakePassword()
	{
		$pass = "";
		$chars = array(
			"1","2","3","4","5","6","7","8","9","0",
			"a","A","b","B","c","C","d","D","e","E","f","F","g","G","h","H","i","I","j","J",
			"k","K","l","L","m","M","n","N","o","O","p","P","q","Q","r","R","s","S","t","T",
			"u","U","v","V","w","W","x","X","y","Y","z","Z");

		$count = count($chars) - 1;

		for($i = 0; $i < 8; $i++) {
			$pass .= $chars[rand(0, $count)];
		}

		return $pass;
	}
}

?>
