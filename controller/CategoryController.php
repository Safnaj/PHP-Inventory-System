<?php

/**
 * Author Safnaj on 7/6/2019
 * Project PhpStorm
 **/
include_once("../database/DBConnection.php");
include_once("../model/Category.php");

//To get Category
if (isset($_POST["getCategory"])) {
    $obj = new Category();
    $rows = $obj->getAllRecord("category");
    foreach ($rows as $row) {
        echo "<option value='".$row["cid"]."'>".$row["category_name"]."</option>";
    }
    exit();
}

//Add Category
if (isset($_POST["category_name"]) AND isset($_POST["parent_cat"])) {
    $obj = new Category();
    $result = $obj->addCategory($_POST["parent_cat"],$_POST["category_name"]);
    echo $result;
    exit();
}
