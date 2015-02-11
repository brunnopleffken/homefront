<?php
/*
 * HOMEFRONT ONLINE GAME CLIENT
 * (C) 2014 - Homefront Online. All rights reserved.
 * Developed by Brunno Pleffken Hosti
 *
 * ../index.php
 */

/**
 * --------------------------------------------------------------------
 * DEFINE PATH CONSTANTS
 * --------------------------------------------------------------------
 */

define("PATH", "http://localhost/homefront");
define("BASEPATH", dirname(__FILE__));

/**
 * --------------------------------------------------------------------
 * LOAD THE BOOTSTRAP FILE
 * --------------------------------------------------------------------
 * And away we go...
 */

class Main
{
	// What are we doing?
	public $controller;
	public $action;
	public $id;

	// Database class
	public $Db;

	// Development environment
	const DEBUG = true;

	/**
	 * --------------------------------------------------------------------
	 * CONSTRUCTOR
	 * --------------------------------------------------------------------
	 */
	public function __construct()
	{
		// Load kernel classes
		$this->LoadKernel();

		// Instance of Database() class
		$this->Db = new Database();

		// Get query strings from URL
		$this->controller = strtolower(Html::Request("c"));
		$this->action = strtolower(Html::Request("act"));
		$this->id = strtolower(Html::Request("id"));

		// If there isn't any controller defined...
		if(!$this->controller) {
			$this->controller = "home";
		}

		$this->LoadController($this->controller, $this->action);
		$this->LoadView($this->controller, $this->action);

		// Debug
		//String::PR($this);
	}

	/**
	 * --------------------------------------------------------------------
	 * LOAD MAIN KERNEL/CORE MODULES
	 * --------------------------------------------------------------------
	 */
	private function LoadKernel()
	{
		require("kernel/Database.php");
		require("kernel/Html.php");
		require("kernel/Security.php");
		require("kernel/String.php");
	}

	/**
	 * --------------------------------------------------------------------
	 * LOAD CONTROLLER AND FIRST METHOD
	 * --------------------------------------------------------------------
	 */
	private function LoadController($controller, $action = "")
	{
		// Controllers' name are in UpperCamelCase
		$_controller = $this->controller = ucwords($controller);

		// Load Application class
		require("controllers/Application.php");

		// Load controller
		require("controllers/" . $_controller . ".php");

		// Get and execute action passed by URL, if any
		if($action != "") {
			$action = $this->action;
		}
		else {
			$action = $this->action = "Main";
		}

		// Execute Controller::_beforeReady() method
		if(method_exists($_controller, "_beforeReady")) {
			$_controller::_beforeReady();
		}

		// Execute Controller with the provided method
		$_controller::$action();

		// Execute Controller::_afterReady() method
		if(method_exists($_controller, "_afterReady")) {
			$_controller::_afterReady();
		}
	}

	private function Loadview($controller, $action)
	{
		if(Application::HasLayout()) {
			require("views/" . $this->controller . "." . $this->action . ".php");
		}
	}
}

$main = new Main();

?>