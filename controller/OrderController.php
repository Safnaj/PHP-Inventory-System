<?php

/**
 * Author Safnaj on 7/15/2019
 * Project PhpStorm
 **/

include_once("../database/DBConnection.php");
include_once("../model/Order.php");


if (isset($_POST["getNewOrderItem"])) {
    $obj = new Order();
    $rows = $obj->getAllRecord("products");
    ?>
    <tr>
        <td><b class="number">1</b></td>
        <td>
            <select name="pid[]" class="form-control form-control-sm pid" required>
                <option value="">Choose Product</option>
                <?php
                foreach ($rows as $row) {
                    ?><option value="<?php echo $row['pid']; ?>"><?php echo $row["product_name"]; ?></option><?php
                }
                ?>
            </select>
        </td>
        <td><input name="tqty[]" readonly type="text" class="form-control form-control-sm tqty"></td>
        <td><input name="qty[]" type="text" class="form-control form-control-sm qty" required></td>
        <td><input name="price[]" type="text" class="form-control form-control-sm price" readonly></span>
            <span><input name="pro_name[]" type="hidden" class="form-control form-control-sm pro_name"></td>
        <td>Rs.<span class="amt">0</span></td>
    </tr>
    <?php
    exit();
}

//Get price and qty of one item
if (isset($_POST["getPriceAndQty"])) {
    $m = new Order();
    $result = $m->getSingleRecord("products","pid",$_POST["id"]);
    echo json_encode($result);
    exit();
}
