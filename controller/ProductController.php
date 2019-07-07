<?php

/**
 * Author Safnaj on 7/7/2019
 * Project PhpStorm
 **/

include_once("../database/DBConnection.php");
include_once("../model/Product.php");


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