
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Untitled Document</title>
    <link rel="stylesheet" type="text/css" href="public/bootstrap/css/Bill_Receipt.css">
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

<h1 class="billHead">
    <img src="public/images/bill_head.png" width="100%" alt=""/>
</h1>

<div class="BilledTo">
    <strong>- | <span style="text-transform: capitalize"></span></strong> <br> Date:  <br>Cashier: Master</div>

<div style="margin-bottom:6px;">
    <div style="font-size:13px;text-transform:capitalize;">1. <!--1222 :--> Batik Saree</div>

    <div style="text-align:right">



        <div style="display:inline-block;vertical-align:top;width:190px">

            6200.00 x 1 pcs		</div>

        <div style="display:inline-block;vertical-align:top;font-weight:400;width:100px;margin-right:5px;">
            6200.00
        </div>
    </div>
</div>



<div style="text-transform:uppercase !important;font-size:14px;text-align:right;font-weight:bolder !important;padding-top:3px;">
    <hr style="margin:2px 0; border-top-style:dashed;border-width:1px;">
    <div style="display:inline-block;vertical-align:top;width:190px;text-align:left;">NET Total</div>
    <div style="display:inline-block;vertical-align:middle;width:100px;margin-right:5px;font-size:14px;">0.00</div>
</div>

<hr style="margin:2px 0; border-top-style:dashed;border-width:1px;">

<div style="text-transform:uppercase !important;font-size:14px;font-weight:bolder;text-align:right;">
    <div style="display:inline-block;vertical-align:top;text-align:left;width:190px;font-size:14px;">Cash amount</div>
    <div style="display:inline-block;vertical-align:top;width:100px;margin-right:5px;font-size:14px;">0.00</div>
    <hr style="margin:2px 0; border-top-style:dashed;border-width:1px;">
    <div style="display:inline-block;vertical-align:top;text-align:left;width:190px">Balance</div>
    <div style="display:inline-block;vertical-align:top;width:100px;margin-right:5px;font-size:14px;">0.00</div>
</div>

<div style="font-weight:bolder;font-size:16px;text-align:right;margin-top:8px;margin-right:4px;">*Outstanding Balance: 39985.00</div>

<div class="billFooter">
    <div style="padding-bottom:4px;margin-bottom:4px;">
        For any exchanges, please produce the bill and price tag within 3 day. Money will not be refunded. No re-fund and return for wholesale buyers.
    </div>
</div>

<div class="attribute" style="font-size:13px;color: #000;">
    Printed with Shopman 2.0 <br> Solution by Graze.LK - 0776791656
</div>

<div class="printonly"></div>.
<br>
<button onclick="printPage()" style="width:100%;height:40px;" class="no-print">Print This Bill</button>

<script>
    function printPage() { print(); }
</script>

</body>
</html>
