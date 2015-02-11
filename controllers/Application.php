<?php

class Application
{
	// True: show layout; false: hide layout and master page
	public static $layout = true;

	/**
	 * --------------------------------------------------------------------
	 * RETURNS THE VALUE OF SELF::$LAYOUT
	 * --------------------------------------------------------------------
	 */
	public static function HasLayout()
	{
		return self::$layout;
	}
}

?>
