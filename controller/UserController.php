<?php

/**
 * Author Safnaj on 7/4/2019
 * Project PhpStorm
 **/

include_once("../database/DBConnection.php");
include_once("../model/User.php");


if (isset($_POST["username"]) AND isset($_POST["email"])) {

//    $username = $_GET["username"];
//    $email = $_GET["email"];
//    $password = $_GET["password1"];
//    $type = $_GET["type"];

    $user = new User();
    $result = $user->createUser($_POST["username"],$_POST["email"],$_POST["password1"],$_POST["type"]);
    echo $result;
    exit();

}
//$user = new User();
//$user->createUser("admin","admin@gmail.om","admin123","Admin");

?>



