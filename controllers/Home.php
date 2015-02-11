<?php
/*
 * HOMEFRONT ONLINE GAME CLIENT
 * (C) 2014 - Homefront Online. All rights reserved.
 * Developed by Brunno Pleffken Hosti
 *
 * ../controllers/Home.php
 */

class Home extends Application
{
	public function Main()
	{
		$user = "BrunnoPleffken";

		$this->Set("player_username", $user);
	}
}

?>
