<?php



class ManageController
{
    private $con;

    function __construct()
    {
        include_once("../database/DBConnection.php");
        $db = new Database();
        $this->con = $db->connect();
    }



    public function manageRecordWithPagination($table,$pno){
        $a = $this->pagination($this->con,$table,$pno,5);
        if ($table == "category") {
            $sql = "SELECT p.cid,p.category_name as category, c.category_name as parent, p.status FROM category p LEFT JOIN category c ON p.parent_cat=c.cid ".$a["limit"];
        }else if($table == "products"){
            $sql = "SELECT p.pid,p.product_name,c.category_name,b.brand_name,p.product_price,p.product_stock,p.added_date,p.p_status FROM products p,brands b,category c WHERE p.bid = b.bid AND p.cid = c.cid ".$a["limit"];
        }else{
            $sql = "SELECT * FROM ".$table." ".$a["limit"];
        }
        $result = $this->con->query($sql) or die($this->con->error);
        $rows = array();
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        return ["rows"=>$rows,"pagination"=>$a["pagination"]];

    }

    private function pagination($con,$table,$pno,$n){
        $query = $con->query("SELECT COUNT(*) as rows FROM ".$table);
        $row = mysqli_fetch_assoc($query);
        //$totalRecords = 100000;
        $pageno = $pno;
        $numberOfRecordsPerPage = $n;

        $last = ceil($row["rows"]/$numberOfRecordsPerPage);

        $pagination = "<ul class='pagination'>";

        if ($last != 1) {
            if ($pageno > 1) {
                $previous = "";
                $previous = $pageno - 1;
                $pagination .= "<li class='page-item'><a class='page-link' pn='".$previous."' href='#' style='color:#333;'> Previous </a></li></li>";
            }
            for($i=$pageno - 5;$i< $pageno ;$i++){
                if ($i > 0) {
                    $pagination .= "<li class='page-item'><a class='page-link' pn='".$i."' href='#'> ".$i." </a></li>";
                }

            }
            $pagination .= "<li class='page-item'><a class='page-link' pn='".$pageno."' href='#' style='color:#333;'> $pageno </a></li>";
            for ($i=$pageno + 1; $i <= $last; $i++) {
                $pagination .= "<li class='page-item'><a class='page-link' pn='".$i."' href='#'> ".$i." </a></li>";
                if ($i > $pageno + 4) {
                    break;
                }
            }
            if ($last > $pageno) {
                $next = $pageno + 1;
                $pagination .= "<li class='page-item'><a class='page-link' pn='".$next."' href='#' style='color:#333;'> Next </a></li></ul>";
            }
        }
        //LIMIT 0,10
        //LIMIT 20,10
        $limit = "LIMIT ".($pageno - 1) * $numberOfRecordsPerPage.",".$numberOfRecordsPerPage;

        return ["pagination"=>$pagination,"limit"=>$limit];
    }
}