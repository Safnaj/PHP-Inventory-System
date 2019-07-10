<?php
/**
 * Author Safnaj on 6/25/2019
 * Project PHP-Inventory-System
 **/

class Category
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
            return "CATEGORY_ADDED";
        }else{
            return 0;
        }
    }

    public function getAllRecord($table){
        $pre_stmt = $this->con->prepare("SELECT * FROM ".$table);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        $rows = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }
        return "NO_DATA";
    }

    public function deleteRecord($table,$pk,$id){
        if($table == "category"){
            $pre_stmt = $this->con->prepare("SELECT ".$id." FROM ".$table." WHERE parent_cat = ?");
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
            }
        }else{
            $pre_stmt = $this->con->prepare("DELETE FROM ".$table." WHERE ".$pk." = ?");
            $pre_stmt->bind_param("i",$id);
            $result = $pre_stmt->execute() or die($this->con->error);
            if ($result) {
                return "DELETED";
            }
        }
    }

}

/*$opr = new Category();
echo $opr->addCategory(1,"Mobiles");*/

?>