<?php
require_once("database/DBConnection.php");
/**
 * Author Safnaj on 5/15/2019
 * Project PHP-Inventory-System
 **/

class User
{
    private $con;

    function __construct()
    {
        include_once ("../database/DBConnection.php");
        global $DBConnect;
    }
    private function emailExists($email){
        $PreparedStatement = $this->con->prepare("SELECT id FROM users WHERE email = ?");
        $PreparedStatement->bind_param("s",$email);
        $PreparedStatement->execute() or die ($this->con->error);
        $Result = $PreparedStatement->get_result();
        if($$Result > 0){
            return 1;
        }else{
            return 0;
        }
    }

    public function createUser($username,$email,$password,$usertype){
        $pre_stmt = $this->con->prepare("");
    }
}

