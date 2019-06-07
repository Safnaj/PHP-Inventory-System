<?php


	$server = "localhost";
	$username = "root";
	$password = "";
	$dbname = "inventorysys";

class Database
{

	private $con;

	public function connect(){
		$this->con - new Mysqli(server,username,password,dbname);
		if ($this->con) {
			echo "Connected";
			return $this->con;
		}
		return "DATABASE CONNECTION FAILED..!";
	}
}

$db = new Database();
$db->connect();

?>