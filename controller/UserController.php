<?php

/**
 * Author Safnaj on 5/15/2019
 * Project PHP-Inventory-System
 **/

class UserController
{
    private $con;

    function __construct()
    {
        include_once("../database/DBConnection.php"); //DbConnection
        $db = new Database();
        $this->con = $db->connect();

    }
    //UserController is Already Registered or Not
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
    //CreateUser Function
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
    //Login Function
    public function userLogin($email,$password){
        $PreparedSatement = $this->con->prepare("SELECT id,username,password,last_login FROM USERS WHERE email = ? ");
        $PreparedSatement->bind_param("s",$email);
        $PreparedSatement->execute() or die($this->con->error);
        $Result = $PreparedSatement->get_result();

        if($Result->num_rows < 1){
            return "NOT_REGISTERED";
        }else{
            $row = $Result->fetch_assoc();
            if(password_verify($password,$row["password"])) {
                $_SESSION["id"] = $row["id"];
                $_SESSION["username"] = $row["username"];
                $_SESSION["last_login"] = $row["last_login"];

                //Here We Updating UserController's Last Login Time
                $last_login = date("Y-d-m h:m:s");

                //Time ZONE PROBLEM

                $PreparedSatement = $this->con->prepare("UPDATE USERS SET last_login = ? WHERE email = ? ");
                $PreparedSatement->bind_param("ss", $last_login, $email);
                $Result = $PreparedSatement->execute() or die($this->con->error);
                if ($Result) {
                    return 1;
                } else {
                    return 0;
                }
            }else{
                return "PASSWORD_NOT_MATCHED";
            }
        }
    }

}
//$user = new UserController();
//$user->createUser("Safnaj","safnaj@gmail.om","961013","Admin");
//echo $user->userLogin("safnaj@gmail.com","961013");
//echo  $_SESSION["username"];
