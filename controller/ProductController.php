<?php

/**
 * Author Safnaj on 7/7/2019
 * Project PhpStorm
 **/

include_once("../database/DBConnection.php");
include_once("../model/Product.php");
include_once("../model/Category.php");
include_once("../controller/ManageController.php");


//Add Product
if (isset($_POST["added_date"]) AND isset($_POST["product_name"])) {

    $category = $_POST["select_cat"];
    $brand = $_POST["select_brand"];
    $productName = $_POST["product_name"];
    $productPrice = $_POST["product_price"];
    $productQty = $_POST["product_qty"];
    $addedDate = $_POST["added_date"];

    $obj = new Product();
    $result = $obj->addProduct($category,$brand,$productName,$productPrice,$productQty,$addedDate);
    echo $result;
    exit();

}

if (isset($_POST["manageProduct"])) {
    $m = new ManageController(); //Pagination Class
    $result = $m->manageRecordWithPagination("products",$_POST["pageno"]);
    $rows = $result["rows"];
    $pagination = $result["pagination"];
    if (count($rows) > 0) {
        $n = (($_POST["pageno"] - 1) * 5)+1;
        foreach ($rows as $row) {
            ?>
            <tr>
                <td><?php echo $n; ?></td>
                <td><?php echo $row["product_name"]; ?></td>
                <td><?php echo $row["category_name"]; ?></td>
                <td><?php echo $row["brand_name"]; ?></td>
                <td><?php echo $row["product_price"]; ?></td>
                <td><?php echo $row["product_stock"]; ?></td>
                <td><?php echo $row["added_date"]; ?></td>
                <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
                <td>
                    <a href="#" did="<?php echo $row['pid']; ?>" class="btn btn-danger btn-sm del_product">Delete</a>
                    <a href="#" eid="<?php echo $row['pid']; ?>" data-toggle="modal" data-target="#form_products" class="btn btn-info btn-sm edit_product">Edit</a>
                </td>
            </tr>
            <?php
            $n++;
        }
        ?>
        <tr>
            <td colspan="9"><?php echo $pagination; ?></td>
        </tr>
        <?php
        exit();
    }
}

//Delete
if (isset($_POST["deleteProduct"])) {
    $m = new Product();
    $result = $m->deleteRecord("products","pid",$_POST["id"]);
    echo $result;
}

//Update Product
if (isset($_POST["updateProduct"])) {
    $m = new Category();
    $result = $m->getSingleRecord("products","pid",$_POST["id"]);
    echo json_encode($result);
    exit();
}