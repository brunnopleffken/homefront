<?php
/*
 * HOMEFRONT ONLINE GAME CLIENT
 * (C) 2014 - Homefront Online. All rights reserved.
 * Developed by Brunno Pleffken Hosti
 *
 * ../kernel/Database.php
 */

class Database
{
	// Database connection information
	private $data = array(
		"server"   => "localhost",
		"username" => "root",
		"password" => "root",
		"database" => "homefront",
		"charset"  => "utf-8"
	);

	// Database connection
	private $link;

	// Database result link of the last executed query
	private $query;
	private $result;

	// Log of queries of the current session
	private $queries = array();

	/**
	 * --------------------------------------------------------------------
	 * CONSTRUCTOR: CONNECT TO DATABASE SERVER
	 * --------------------------------------------------------------------
	 */
	public function __construct()
	{
		// Connect to MySQL server
		$this->link = mysqli_connect(
			$this->data['server'],
			$this->data['username'],
			$this->data['password'],
			$this->data['database']
		);

		// Show error message... in case of error...
		if(mysqli_connect_errno()) {
			$this->Exception("Unable to connect to MySQL server.");
		}
		else {
			// Set response charset to UTF-8
			$this->Query("SET NAMES UTF8;");
		}
	}

	/**
	 * --------------------------------------------------------------------
	 * CONSTRUCTOR: CONNECT TO DATABASE SERVER
	 * --------------------------------------------------------------------
	 */
	public function Query($sql)
	{
		// Execute SQL query
		$this->query = mysqli_query($this->link, $sql);
		$this->log[] = $sql;

		// In case of error...
		if(!$this->query) {
			$this->Exception("An error occoured on the following query: " . $sql);
		}

		return $this->query;
	}

	/**
	 * --------------------------------------------------------------------
	 * RETURN RESULTS FROM QUERY() COMMAND
	 * --------------------------------------------------------------------
	 */
	public function Fetch($result = "")
	{
		// If any SQL command is passed as parameter...
		if($result == "") {
			$result = $this->query;
		}

		// Fetch results from database
		$this->result = mysqli_fetch_assoc($result, MYSQLI_ASSOC);

		return $this->result;
	}

	/**
	 * --------------------------------------------------------------------
	 * INSERT DATA FROM AN ARRAY INTO A TABLE
	 * --------------------------------------------------------------------
	 */
	public function Insert($table, $array)
	{
		// Loop through array
		foreach($array as $f => $v) {
			$fields[] = $f;
			$values[] = "'" . $v . "'";
		}

		// Insert into table
		$sql = "INSERT INTO {$table} (" . implode(", ", $fields) . ") VALUES (" . implode(", ", $values) . ");";
		$this->query = mysqli_query($this->link, $sql);
		$this->log[] = $sql;

		// In case of error...
		if(!$this->query) {
			$this->Exception("An error occoured on the following query: " . $sql);
		}

		return $this->query;
	}

	/**
	 * --------------------------------------------------------------------
	 * CONSTRUCTOR: CONNECT TO DATABASE SERVER
	 * --------------------------------------------------------------------
	 */
	private function Exception($message)
	{
		Html::Error($message);
	}
}

?>
