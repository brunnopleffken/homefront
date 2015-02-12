<?php
/*
 * HOMEFRONT ONLINE GAME CLIENT
 * (C) 2014 - Homefront Online. All rights reserved.
 * Developed by Brunno Pleffken Hosti
 *
 * ../controllers/Report.php
 */

class Report extends Application
{
	public function _beforeFilter()
	{
		// ...
	}

	public function Main()
	{
		// ...
	}

	public function BuildSituationReport()
	{
		$this->layout = false;

		$report = array(
			array("priority" => "high", "type" => "technology", "description" => "Lorem ipsum dolor sit amet consectetur adispicing elit"),
			array("priority" => "low", "type" => "build", "description" => "Lorem ipsum dolor sit amet consectetur adispicing elit"),
			array("priority" => "medium", "type" => "colony", "description" => "Lorem ipsum dolor sit amet consectetur adispicing elit")
		);

		echo json_encode($report);
	}
}

?>
