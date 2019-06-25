<?php
include_once ("../database/DBConnection.php");
include_once ("../model/User.php");
/**
 * Author Safnaj on 6/25/2019
 * Project PHP-Inventory-System
 **/

if(isset($_POST["username"])AND isset($_POST["email"])){
    $user = new User();
    $result = $user->createUser($_POST["username"],$_POST["email"],$_POST["password1"],$_POST["type"]);
    echo $result;
}


?>