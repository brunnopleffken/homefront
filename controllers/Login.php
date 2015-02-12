<?php
/*
 * HOMEFRONT ONLINE GAME CLIENT
 * (C) 2014 - Homefront Online. All rights reserved.
 * Developed by Brunno Pleffken Hosti
 *
 * ../controllers/Login.php
 */

class Login extends Application
{
	public function Main()
	{
		// Define master page
		$this->master = "NoFrame";
	}

	public function UserAuthentication()
	{
		// Do not use layout
		$this->layout = false;

		$username = String::Sanitize(strtolower(Html::Request("username")));
		$password = String::Sanitize(Html::Request("password"));

		if($username == "brunno.pleffken@outlook.com" && $password == "teste") {
			$status = "ok";
		}
		else {
			$status ="wrong_password";
		}

		// Returning array
		$value = array("status" => $status, "username_received" => $username, "password_received" => $password);

		echo json_encode($value);
	}
}

?>
