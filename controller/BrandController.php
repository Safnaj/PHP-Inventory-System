<?php

/**
 * Author Safnaj on 7/7/2019
 * Project PhpStorm
 **/
include_once("../database/DBConnection.php");
include_once("../model/Brand.php");
include_once("../model/Category.php");
include_once("../controller/ManageController.php");

//Add Brand
if (isset($_POST["brand_name"])) {
    $obj = new Brand();
    $result = $obj->addBrand($_POST["brand_name"]);
    echo $result;
    exit();
}

//Fetch Brand
if (isset($_POST["getBrand"])) {
    $obj = new Brand();
    $rows = $obj->getAllRecord("brands");
    foreach ($rows as $row) {
        echo "<option value='".$row["bid"]."'>".$row["brand_name"]."</option>";
    }
    exit();
}

//Delete Category
if (isset($_POST["deleteBrand"])) {
    $m = new Category();
    $result = $m->deleteRecord("brands","bid",$_POST["id"]);
    echo $result;
}

//Manage Brand
if (isset($_POST["manageBrand"])) {
    $m = new ManageController();
    $result = $m->manageRecordWithPagination("brands",$_POST["pageno"]);
    $rows = $result["rows"];
    $pagination = $result["pagination"];
    if (count($rows) > 0) {
        $n = (($_POST["pageno"] - 1) * 5)+1;
        foreach ($rows as $row) {
            ?>
            <tr>
                <td><?php echo $n; ?></td>
                <td><?php echo $row["brand_name"]; ?></td>
                <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
                <td>
                    <a href="#" did="<?php echo $row['bid']; ?>" class="btn btn-danger btn-sm del_brand">Delete</a>
                    <a href="#" eid="<?php echo $row['bid']; ?>" data-toggle="modal" data-target="#update_brand" class="btn btn-info btn-sm edit_brand">Edit</a>
                </td>
            </tr>
            <?php
            $n++;
        }
        ?>
        <tr><td colspan="5"><?php echo $pagination; ?></td></tr>
        <?php
        exit();
    }
}

//Update Brand
if (isset($_POST["updateBrand"])) {
    $m = new Category();
    $result = $m->getSingleRecord("brands","bid",$_POST["id"]);
    echo json_encode($result);
    exit();
}

//Update Record after getting data
if (isset($_POST["brandUpdate"])) {
    $m = new Category();
    $id = $_POST["bid"];
    $name = $_POST["brandUpdate"];
    $result = $m->update_record("brands",["bid"=>$id],["brand_name"=>$name,"status"=>1]);
    echo $result;
}