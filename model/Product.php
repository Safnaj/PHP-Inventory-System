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

    public function deleteRecord($table,$pk,$id){
        if($table == "category"){
            $pre_stmt = $this->con->prepare("SELECT ".$id." FROM category WHERE parent_cat = ?");
            $pre_stmt->bind_param("i",$id);
            $pre_stmt->execute();
            $result = $pre_stmt->get_result() or die($this->con->error);
            if ($result->num_rows > 0) {
                return "DEPENDENT_CATEGORY";
            }else{
                $pre_stmt = $this->con->prepare("DELETE FROM ".$table." WHERE ".$pk." = ?");
                $pre_stmt->bind_param("i",$id);
                $result = $pre_stmt->execute() or die($this->con->error);
                if ($result) {
                    return "CATEGORY_DELETED";
                }
                // return "It Can be Delete";
            }
        }else{
            $pre_stmt = $this->con->prepare("DELETE FROM ".$table." WHERE ".$pk." = ?");
            $pre_stmt->bind_param("i",$id);
            $result = $pre_stmt->execute() or die($this->con->error);
            if ($result) {
                return "DELETED";
            }
            //return "It Can be Delete";
        }
    }
}