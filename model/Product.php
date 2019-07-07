<?php


class Product
{
    private $con;

    function __construct()
    {
        include_once("../database/DBConnection.php");
        $db = new Database();
        $this->con = $db->connect();
    }

    public function addProduct($cid,$bid,$pro_name,$price,$stock,$date){
        $pre_stmt = $this->con->prepare("INSERT INTO `products`
			(`cid`, `bid`, `product_name`, `product_price`,
			 `product_stock`, `added_date`, `p_status`)
			 VALUES (?,?,?,?,?,?,?)");
        $status = 1;
        $pre_stmt->bind_param("iisdisi",$cid,$bid,$pro_name,$price,$stock,$date,$status);
        $result = $pre_stmt->execute() or die($this->con->error);
        if ($result) {
            return "NEW_PRODUCT_ADDED";
        }else{
            return 0;
        }

    }
}