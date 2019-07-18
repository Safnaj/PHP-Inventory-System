<?php require_once("database/DBConnection.php"); ?>

<?php

$db = new Database();
$con = $db->connect();
$invoice_no = $_GET['invoice_no'];

$Query = "SELECT s.invoice_no, s.order_date, s.sub_total, s.discount, s.net_total, s.paid,
            s.due, s.payment_type, d.product_name, d.price,d.qty FROM invoice s LEFT JOIN invoice_details d
            ON s.invoice_no = d.invoice_no WHERE d.invoice_no = '$invoice_no'";


/*$Query2 = "SELECT s.invoice_no,s.order_date,s.sub_total,s.discount,s.net_total,s.paid,s.due,s.payment_type,
        d.product_name,d.price,d.qty FROM invoice s, invoice_details d WHERE s.invoice_no = 3";*/

$Execute = mysqli_query($con, $Query) or die($this->con->error);
$SrNo = 1;

while($DataRows = mysqli_fetch_array($Execute)) {
    $invoiceNo = $DataRows["invoice_no"];
    $orderDate = $DataRows["order_date"];
    $payementType = $DataRows["payment_type"];
    $subTotal = $DataRows["sub_total"];
    $discount = $DataRows["discount"];
    $netTotal = $DataRows["net_total"];
    $paid = $DataRows["paid"];
    $balance = $DataRows["due"];
    $productName[] = $DataRows["product_name"];
    $productPrice[] = $DataRows["price"];
    $productQty[] = $DataRows["qty"];

}

//for($i=0; $i<count($productName); $i++){
//    echo $productName[$i]; echo "|";  echo $productPrice[$i]; echo "|";  echo $productQty[$i];
//    echo "<br>";
//}

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Untitled Document</title>
    <link rel="stylesheet" type="text/css" href="public/bootstrap/css/Bill_Receipt.css">
    <script type="text/javascript" src="public/bootstrap/js/Order.js"></script>
    <style>
        @page{
            margin-left: 20px;
            margin-right: 25px;
            margin-top: 0px;
            margin-bottom: 30px;
        }
    </style>
</head>

<body class="billBody">
<!--Bill Header Logo-->
<h1 class="billHead">
    <img src="public/images/bill_head.png" width="100%" alt=""/>
</h1>
<!--Bill Header Logo-->

<!--Date,Cashier & Bill No-->
<div class="BilledTo">
    <span style="text-transform: capitalize">Bill No : <?php echo $invoiceNo ;?></span>
    <br>Date : <?php echo $orderDate ;?> &nbsp; | &nbsp; Cashier : Master
</div>
<!--Date,Cashier & Bill No-->

<!--Item List-->
<?php
for($i=0; $i<count($productName); $i++){
     ?>

<div style="margin-bottom:6px;">
    <div style="font-size:14px;text-transform:capitalize;font-weight: bold"><?php echo $SrNo++; ?>. <!--1222 :-->
        <?php echo $productName[$i]; ?>
    </div>
    <div style="text-align:right">
        <div style="display:inline-block;vertical-align:top;width:190px;text-align:left;">
            <?php echo $productPrice[$i]; ?> x <?php echo $productQty[$i]; ?> pcs
        </div>
        <div style="display:inline-block;vertical-align:top;font-weight:400;width:100px;margin-right:5px;">
            <?php echo $productPrice[$i] * $productQty[$i]; ?>
        </div>
    </div>
</div>
    <?php } ?>
<!--Item List-->


<div style="text-transform:uppercase !important;font-size:14px;text-align:right;font-weight:bolder !important;padding-top:3px;">
    <hr style="margin:2px 0; border-top-style:dashed;border-width:1px;">
    <div style="display:inline-block;vertical-align:top;width:190px;text-align:left;">NET Total</div>
    <div style="display:inline-block;vertical-align:middle;width:100px;margin-right:5px;font-size:14px;"><?php echo $netTotal; ?></div>
</div>

<hr style="margin:2px 0; border-top-style:dashed;border-width:1px;">

<div style="text-transform:uppercase !important;font-size:14px;font-weight:bolder;text-align:right;">
    <div style="display:inline-block;vertical-align:top;text-align:left;width:190px;font-size:14px;">Cash amount</div>
    <div style="display:inline-block;vertical-align:top;width:100px;margin-right:5px;font-size:14px;"><?php echo $paid; ?></div>
    <hr style="margin:2px 0; border-top-style:dashed;border-width:1px;">
    <div style="display:inline-block;vertical-align:top;text-align:left;width:190px">Balance</div>
    <div style="display:inline-block;vertical-align:top;width:100px;margin-right:5px;font-size:14px;"><?php echo $balance; ?></div>
</div>

<!--<div style="font-weight:bolder;font-size:16px;text-align:right;margin-top:8px;margin-right:4px;">*Outstanding Balance: <?php /*echo $netTotal; */?></div>-->

<div class="billFooter">
    <div style="padding-bottom:4px;margin-bottom:4px;">
        For any exchanges, please produce the bill and price tag within 3 day. Money will not be refunded.
    </div>
</div>

<div class="attribute" style="font-size:13px;color: #000;">
    Printed with Intelli POS<br> Solutions by Ahamed Safnaj - 0777 974207
</div>

<div class="printonly"></div>.
<br>
<button onclick="printPage()" style="width:100%;height:40px;" class="no-print">Print This Bill</button>

<script>
    function printPage()
    {
        print();
    }
</script>

</body>
</html>
