<?php

/**
 * Author Safnaj on 7/7/2019
 * Project PhpStorm
 **/

class Brand
{
    private $con;

    function __construct()
    {
        include_once("../database/DBConnection.php");
        $db = new Database();
        $this->con = $db->connect();
    }

    public function addBrand($brand_name){
        $pre_stmt = $this->con->prepare("INSERT INTO `brands`(`brand_name`, `status`) VALUES (?,?)");
        $status = 1;
        $pre_stmt->bind_param("si",$brand_name,$status);
        $result = $pre_stmt->execute() or die($this->con->error);
        if ($result) {
            return "BRAND_ADDED";
        }else{
            return 0;
        }

    }
}