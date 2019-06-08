<?php

/**
 * Author Safnaj on 5/15/2019
 * Project PHP-Inventory-System
 **/

class User
{
    private $con;

    function __construct()
    {
        include_once("../database/DBConnection.php"); //DbConnection
        $db = new Database();
        $this->con = $db->connect();
//        if($this->con){
//            echo "Connected";
//        }
    }
    //User is Already Registered or Not
    private function emailExists($email){

        $PreparedStatement = $this->con->prepare("SELECT id FROM users WHERE email = ?");
        $PreparedStatement->bind_param("s",$email);
        $PreparedStatement->execute() or die ($this->con->error);
        $Result = $PreparedStatement->get_result();
        if($Result->num_rows > 0){
            return 1;
        }else{
            return 0;
        }
    }

    public function createUser($username,$email,$password,$usertype){
        if($this->emailExists($email)){
            echo "Email Already Exisists..!";
        }else {
            $passwordHash = password_hash($password,PASSWORD_BCRYPT,["cost"=>8]);
            $date = date("Y-m-d");
            $notes = " ";
            $PreparedStatement = $this->con->prepare("INSERT INTO `users`(`username`, `email`, `password`, `user_type`, `reg_date`, `last_login`, `notes`) VALUES (?,?,?,?,?,?,?)");
            $PreparedStatement->bind_param("sssssss", $username, $email, $passwordHash, $usertype, $date, $date, $notes);
            $Result = $PreparedStatement->execute() or die($this->con->error);
            if ($Result) {
                return $this->con->insert_id;
            } else {
                return "ERROR";
            }
        }
    }

}
$user = new User();
$user->createUser("Safnaj","safnaj@gmail. om","961013","Admin");

