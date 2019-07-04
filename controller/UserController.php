<?php

/**
 * Author Safnaj on 7/4/2019
 * Project PhpStorm
 **/

require_once("database/DBConnection.php");
require_once("model/User.php");

if (isset($_POST["username"]) AND isset($_POST["email"])) {

    $username = $_GET["username"];
    $email = $_GET["email"];
    $password = $_GET["password1"];
    $type = $_GET["type"];

    $user = new User();
    $result = $user->createUser($username,$email,$password,$type);
    echo $result;
    exit();

}


