<?php

class Database{

	public function connect(){

		$server = "localhost";
		$username = "root";
		$password = "";
		$dbname = "inventorysys";

	    // Create connection
	    $DBConnect = mysqli_connect($server,$username,$password,$dbname);

	    // Check connection
	    if (!$DBConnect) { 
	    	//echo "There is an Error in Connecting to the Database..!";
	        die("Connection failed: " . mysqli_connect_error());
	        
	    }
	    //echo "Successfully Connected..!";
	    return $DBConnect;
    }
}

//$db = new Database();
//$db->connect();

?>