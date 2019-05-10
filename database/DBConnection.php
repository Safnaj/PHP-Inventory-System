<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventorysys";

    // Create connection
    $DBConnect = mysqli_connect($servername,$username,$password,$dbname);

    // Check connection
    if (!$DBConnect) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //echo "Successfully Connected..!";
    return $DBConnect;

?>