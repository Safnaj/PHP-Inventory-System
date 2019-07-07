<?php

/**
 * Author Safnaj on 7/7/2019
 * Project PhpStorm
 **/
include_once("../database/DBConnection.php");
include_once("../model/Brand.php");
include_once("../model/Category.php");

//Add Brand
if (isset($_POST["brand_name"])) {
    $obj = new Brand();
    $result = $obj->addBrand($_POST["brand_name"]);
    echo $result;
    exit();
}

//Fetch Brand
if (isset($_POST["getBrand"])) {
    $obj = new Category();
    $rows = $obj->getAllRecord("brands");
    foreach ($rows as $row) {
        echo "<option value='".$row["bid"]."'>".$row["brand_name"]."</option>";
    }
    exit();
}