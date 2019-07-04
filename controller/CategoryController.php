<?php
/**
 * Author Safnaj on 6/25/2019
 * Project PHP-Inventory-System
 **/

class CategoryController
{
    private $con;

    function __construct()
    {
        include_once("../database/DBConnection.php");
        $db = new Database();
        $this->con = $db->connect();
    }

    public function addCategory($parent,$category){

        $pre_stmt = $this->con->prepare("INSERT INTO `category`(`parent_cat`, `category_name`, `status`) VALUES (?,?,?)");
        $status = 1;
        $pre_stmt->bind_param("isd",$parent,$category,$status);
        $result = $pre_stmt->execute() or die ($this->con->error);
        if($result){
            return "CATEGORY ADDED";
        }else{
            return 0;
        }
    }
}
                                                                            //Video No 13
$opr = new CategoryController();
echo $opr->addCategory(0,"Electronics");

?>