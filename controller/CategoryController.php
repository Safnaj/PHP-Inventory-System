<?php

/**
 * Author Safnaj on 7/6/2019
 * Project PhpStorm
 **/
include_once("../database/DBConnection.php");
include_once("../model/Category.php");
include_once("../controller/ManageController.php");

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

//Delete Category
if (isset($_POST["deleteCategory"])) {
    $m = new Category();
    $result = $m->deleteRecord("category","cid",$_POST["id"]);
    echo $result;
}

//Getting Record for Update Category
if (isset($_POST["updateCategory"])) {
    $m = new Category();
    $result = $m->getSingleRecord("category","cid",$_POST["id"]);
    echo json_encode($result);
    exit();
}

//Update Record after getting data
if (isset($_POST["update_category"])) {
    $m = new Category();
    $id = $_POST["cid"];
    $name = $_POST["update_category"];
    $parent = $_POST["parent_cat"];
    $result = $m->update_record("category",["cid"=>$id],["parent_cat"=>$parent,"category_name"=>$name,"status"=>1]);
    echo $result;
}


//Manage Category
if (isset($_POST["manageCategory"])) {
    $m = new ManageController();
    $result = $m->manageRecordWithPagination("category", $_POST["pageno"]);
    $rows = $result["rows"];
    $pagination = $result["pagination"];
    if (count($rows) > 0) {
        $n = (($_POST["pageno"] - 1) * 5) + 1;
        foreach ($rows as $row) {
            ?>
            <tr>
                <td><?php echo $n; ?></td>
                <td><?php echo $row["category"]; ?></td>
                <td><?php echo $row["parent"]; ?></td>
                <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
                <td>
                    <a href="#" did="<?php echo $row['cid']; ?>" class="btn btn-danger btn-sm del_cat">Delete</a>
                    <a href="#" eid="<?php echo $row['cid']; ?>" data-toggle="modal" data-target="#form_category" class="btn btn-info btn-sm edit_cat">Edit</a>
                </td>
            </tr>
            <?php
            $n++;
        }
        ?>
        <tr>
            <td colspan="5"><?php echo $pagination; ?></td>
        </tr>
        <?php
        exit();

    }
}


