<?php
date_default_timezone_set('Asia/Manila');
include("includes/pms_dbcon.php");
$curr_uri = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
session_start();
if (isset($_SESSION['pms_security'])) {
    $secure = $_SESSION['pms_security'];
} else {
    $secure = "";
}
if ($secure!="01787amk038894kk") {
    header('Location: http://localhost/PMS/8080/index.php');
    exit();
}

if (isset($_SESSION['pms_user'])) {
    $pms_user = $_SESSION['pms_user'];
} else {
    $pms_user = "";
}

if (isset($_SESSION['pms_id'])) {
    $pms_id = $_SESSION['pms_id'];
} else {
    $pms_id = "";
}

if (isset($_SESSION['pms_usertype'])) {
    $pms_usertype = $_SESSION['pms_usertype'];
} else {
    $pms_usertype = "";
}

if (isset($_SESSION['pms_image'])) {
    $pms_image = $_SESSION['pms_image'];
} else {
    $pms_image = "";
}

if (isset($_GET["pms_hid"])) {
    $pms_hid = $_GET['pms_hid'];
} else {
    $pms_hid = "";
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Job Order Report | Inventory and Distribution Management System</title>
<link rel="icon" type="image/png" sizes="16x16" href="images/pms_logo/logo-small.png"">
<style type="text/css">

	body {
	       font-family: Arial;
		  }

</style>
<style type="text/css" media="print">
  	@page { size: portrait;
	 		margin-top: 5mm;
		    margin-bottom: 5mm;
		  }
</style>
<script>
var myVar;

function animateEffect() {
    myVar = setTimeout(showPage, 1);
}

function showPage() {
  document.getElementById("preloader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}

var t;
window.onload = resetTimer;
document.onmousemove = resetTimer;
document.onkeypress = resetTimer;

function logout() {
    // alert("You are automatically signed out after 20 sec. of inactivity.");
    window.location.href = "lock/pms_ls.php";
}

function resetTimer() {
    clearTimeout(t);
     t = setTimeout(logout, 50000000)
}
</script>
</head><input type="hidden" id="url" value="<?php echo $curr_uri; ?>">

<body>
    <!-- <center> -->
    <?php
        $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'qrcode'.DIRECTORY_SEPARATOR;

        $PNG_WEB_DIR = 'qrcode/';

        include('qr/qrlib.php');

        if (!file_exists($PNG_TEMP_DIR))
            mkdir($PNG_TEMP_DIR);


        $filename = $PNG_TEMP_DIR.'qr.png';

        $errorCorrectionLevel = 'L';
        if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
            $errorCorrectionLevel = $_REQUEST['level'];

        $matrixPointSize = 4;
        if (isset($_REQUEST['size']))
            $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);

        if (isset($_REQUEST['data'])) {

            if (trim($_REQUEST['data']) == '')
                die('data cannot be empty! <a href="?">back</a>');

            $filename = $PNG_TEMP_DIR.'test'.md5($_REQUEST['data'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
            QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);

        }

        // // // // // //

        // $sql_query =
        // "SELECT t1.pms_id AS pms_hid, t1.pms_date, t1.pms_purchaseorder, t1.pms_customer, t1.pms_deliverydate,
        //         t1.pms_total AS pms_h_total, t1.pms_remarks, t1.pms_joborder_qty,
        //         t2.pms_id AS pms_did, t2.pms_joborder, t2.pms_rm_sku, t2.pms_orderqty, t2.pms_unit, t2.pms_description,
        //         t2.pms_unitprice, FORMAT(t2.pms_orderqty * t2.pms_unitprice, 2) AS pms_total,
        //         t3.pms_id AS pms_rmid, t3.pms_sku, t3.pms_item, t3.pms_description
        // FROM pms_joborderheader AS t1
        // INNER JOIN pms_joborderdetails AS t2
        // ON t1.pms_id = t2.pms_joborder
        // INNER JOIN pms_rawmaterials AS t3
        // ON t2.pms_rm_sku = t3.pms_id
        // WHERE t1.pms_id = '$pms_hid'";

        $sql_query =
        "SELECT t1.pms_id AS pms_hid, t1.pms_date, t1.pms_customer, t1.pms_deliverydate, t1.pms_remarks,
                           t1.pms_jo_no, t1.pms_operator_name, t1.pms_joborder_qty, t1.pms_joborder_prod_item,
                           t2.pms_id AS pms_did, t2.pms_reference_product_itemname, t2.pms_order_quantity, t2.pms_unit, t2.pms_typeunit, 
                           t2.pms_unit_price, t2.pms_image, t2.pms_product_item_name, FORMAT(t2.pms_order_quantity * t2.pms_unit_price, 2) AS pms_total
                FROM pms_joborderheader AS t1
                INNER JOIN pms_referenceproducts AS t2
                ON t2.pms_product_item_name = t1.pms_joborder_prod_item
                WHERE t1.pms_id = '$pms_hid'";

        $sql = mysqli_query($GLOBALS["___mysqli_ston"], $sql_query);
        $report_count = 0;
        $print_pms_hid_temp = "";
        $print_pms_joborder_temp = "";
        $report_detail = "<table border=0>
                          <tr>
                            <td> <strong>Product (SKU)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> </td>
                            <td> <strong>Order Quantity&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> </td>
                            <td> <strong>Unit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> </td>
                            <td> <strong>Unit Price&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> </td>
                            <td> <strong>Total Amount&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> </td>
                          </tr>
                          </table>" ;

        $report_header = "<table border=0>
                          <tr>
                            <td> <strong>Product (SKU)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> </td>
                            <td> <strong>Order Quantity&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> </td>
                            <td> <strong>Unit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> </td>
                            <td> <strong>Unit Price&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> </td>
                            <td> <strong>Total Amount&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> </td>
                          </tr>
                          </table>" ;

        while ($rows=mysqli_fetch_array($sql)) {
            $print_pms_hid = $rows['pms_hid'] ;
            $print_pms_jo_no = $rows['pms_jo_no'];
            $print_pms_operator_name = $rows['pms_operator_name'];
            $print_pms_date = $rows['pms_date'] ;
            $print_pms_customer = $rows['pms_customer'] ;
            $print_pms_deliverydate = $rows['pms_deliverydate'] ;
            $print_pms_total = $rows['pms_total'] ;
            $print_pms_remarks = $rows['pms_remarks'] ;
            $print_pms_joborder_qty = $rows['pms_joborder_qty'] ;
            $print_pms_joborder_prod_item = $rows['pms_joborder_prod_item'];

            $print_pms_did = $rows['pms_did'] ;
            $print_pms_reference_product_itemname = $rows['pms_reference_product_itemname'] ;
            $print_pms_order_quantity = $rows['pms_order_quantity'] ;
            $print_pms_unit = $rows['pms_unit'] ;
            $print_pms_typeunit = $rows['pms_typeunit'] ;
            $print_pms_unit_price = $rows['pms_unit_price'] ;
            $print_pms_product_item_name = $rows['pms_product_item_name'] ;

            $report_count++;


            if ($print_pms_hid_temp!=$rows['pms_hid']) {
                echo "<br><br>" ;
                echo '<img src="images/pms_logo/pms_logo.jpg" height="133" width="161">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;
                      <img src="images/pms_logo/idms-text.png" height="50" width="270">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <img src="'.$PNG_WEB_DIR.basename($filename).'" height="133" width="161"/> <br>';
                echo "<p>Jentec Storage Inc.<br> +81-9120 - +639205530103<br>
                         3515 Hilario st. Palanan Makati City <br>
                         Philippines
                      </p>";

                echo
                '<hr><table>
                    <col width=200>
                    <col width=210>
                    <col width=338>
                    <col width=350>
                    <tbody>
                        <tr>
                        <td> <strong>Job Order #: </strong>'. $print_pms_hid . '</td>
                        <td> Delivery Date:  '. $print_pms_deliverydate . '</td>
                        <td> JO Date:  '. $print_pms_date . '</td>
                        <td> Remarks:  '. $print_pms_remarks . '</td>
                        </tr>

                        <tr>
                        <td>Operator Name:  '. $print_pms_operator_name . '</td>
                        <td>JO Quantity:  '. $print_pms_joborder_qty . '</td>
                        <td>Item / Product Name:  '. $print_pms_joborder_prod_item . '</td>
                        <td>Customer:  '. $print_pms_customer . '</td>
                        </tr>

                    </tbody>
                 </table><hr>';

                if ($print_pms_joborder_temp!=$rows['pms_did']) {
                    echo $report_detail ;
                }
                echo
                '<table>
                      <col width=200>
                      <col width=210>
                      <col width=32>
                      <col width=70>
                      <col width=155>
                      <col width=268>
                    <tbody>
                        <tr>
                        <td>'. $print_pms_reference_product_itemname . '</td>
                        <td colspan="2">'. $print_pms_order_quantity . '</td>
                        <td colspan="2">'. $print_pms_unit . ' ' . $print_pms_typeunit . '</td>
                        <td colspan="2">'. $print_pms_unit_price . '</td>
                        <td colspan="2">'. $print_pms_total . '</td>
                        </tr>
                    </tbody>
                 </table>';

            }
            else {
                if ($print_pms_joborder_temp!=$rows['pms_did']) {
                    echo $report_detail ;
                }
                echo
                '<table>
                <col width=200>
                <col width=210>
                <col width=32>
                <col width=70>
                <col width=155>
                <col width=268>
                    <tbody>
                        <tr>
                        <td>'. $print_pms_reference_product_itemname . '</td>
                        <td colspan="2">'. $print_pms_order_quantity . '</td>
                        <td colspan="2">'. $print_pms_unit . ' ' . $print_pms_typeunit . '</td>
                        <td colspan="2">'. $print_pms_unit_price . '</td>
                        <td colspan="2">'. $print_pms_total . '</td>
                        </tr>
                    </tbody>
                </table>';
            }


            $print_pms_hid_temp = $rows['pms_hid'] ;
            $print_pms_joborder_temp = $rows['pms_did'] ;

        }
    ?>
    <!-- </center> -->

	<!-- <script src="jquery/jquery.min.js"></script>
    <script type="text/javascript" src="barcode/jquery.qrcode.js"></script>
    <script type="text/javascript" src="barcode/qrcode.js"></script> -->

    <script type="text/javascript">
        window.onload = function() { window.print(); }
    </script>

</body>
</html>
