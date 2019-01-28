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
<title>Purchase Order Report | Inventory and Distribution Management System</title>
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

        $sql_query = "SELECT t1.pms_id AS pms_hid, t1.pms_date, t1.pms_duedate, t1.pms_supplier, t1.pms_total,
        t1.pms_paid, t1.pms_settled, t1.pms_debitmemo, t1.pms_posted, t1.pms_posteddate, t1.pms_reference,
        t1.pms_checkno, t1.pms_checkdate, t1.pms_bankname, t1.pms_bankaccountno, t1.pms_bankaccountname,t1.pms_remarks,
        t2.pms_id AS pms_sid, t2.pms_fullname,
        t3.pms_id AS pms_did, t3.pms_purchaseorder, t3.pms_rm_sku, t3.pms_qty, t3.pms_cost, FORMAT(t3.pms_qty * t3.pms_cost, 2) AS pms_total,
        t4.pms_id AS pms_rmid, t4.pms_suprod_itemname, t4.pms_suprod_quantity, t4.pms_suprod_description
        FROM pms_purchaseorderheader AS t1
        INNER JOIN pms_suppliers AS t2
        ON t1.pms_supplier = t2.pms_fullname
        INNER JOIN pms_purchaseorderdetails AS t3
        ON t1.pms_id = t3.pms_purchaseorder
        INNER JOIN pms_suppliers_product AS t4
        ON t3.pms_rm_sku = t4.pms_id
        WHERE t1.pms_id = '$pms_hid'";

        $sql = mysqli_query($GLOBALS["___mysqli_ston"], $sql_query);
        $report_count = 0;
        $print_pms_hid_temp = "";
        $print_pms_purchaseorder_temp = "";
        $report_detail = "<table border=0>
                          <tr>
                            <td> <strong>Product (SKU)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> </td>
                            <td> <strong>Quantity&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> </td>
                            <td> <strong>Cost&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> </td>
                            <td> <strong>Total Amount</strong> </td>
                          </tr>
                          </table>" ;

        $report_header = "<table border=0>
                          <tr>
                          <td> <strong>Product (SKU)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> </td>
                          <td> <strong>Quantity&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> </td>
                          <td> <strong>Cost&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> </td>
                          <td> <strong>Total Amount</strong> </td>
                          </tr>
                          </table>" ;

        while ($rows=mysqli_fetch_array($sql)) {
            $print_pms_hid = $rows['pms_hid'];
            $print_pms_date = $rows['pms_date'];
            $print_pms_duedate = $rows['pms_duedate'];
            $print_pms_supplier = $rows['pms_supplier'];
            $print_pms_paid = $rows['pms_paid'];
            $print_pms_settled = $rows['pms_settled'];
            $print_pms_debitmemo = $rows['pms_debitmemo'];
            $print_pms_posted = $rows['pms_posted'];
            $print_pms_posteddate = $rows['pms_posteddate'];
            $print_pms_reference = $rows['pms_reference'];
            $print_pms_checkno = $rows['pms_checkno'];
            $print_pms_checkdate = $rows['pms_checkdate'];
            $print_pms_bankname = $rows['pms_bankname'];
            $print_pms_bankaccountno = $rows['pms_bankaccountno'];
            $print_pms_bankaccountname = $rows['pms_bankaccountname'];
            $print_pms_remarks = $rows['pms_remarks'];

            $print_pms_did = $rows['pms_did'];
            $print_pms_purchaseorder = $rows['pms_purchaseorder'];
            $print_pms_rm_sku = $rows['pms_rm_sku'];
            $print_pms_qty = $rows['pms_qty'];
            $print_pms_cost = $rows['pms_cost'];
            $print_pms_total = $rows['pms_total'];

            $print_pms_rmid = $rows['pms_rmid'];
            $print_pms_item = $rows['pms_suprod_itemname'];
            $print_pms_description = $rows['pms_suprod_description'];

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
                    <col width=450>
                    <tbody>
                        <tr>
                        <td> <strong>Purchase Order #: </strong>'. $print_pms_hid . '</td>
                        <td> Due Date:  '. $print_pms_duedate . '</td>
                        <td> PO Date:  '. $print_pms_date . '</td>
                        <td> Supplier:  '. $print_pms_supplier . '</td>
                        </tr>

                        <tr>
                        <td>Paid:  '. $print_pms_paid . '</td>
                        <td>Settled:  '. $print_pms_settled . '</td>
                        <td>Debit Memo:  '. $print_pms_debitmemo . '</td>
                        <td>Posted Date:  '. $print_pms_posteddate . '</td>
                        </tr>

                        <tr>
                        <td>Remarks:  '. $print_pms_remarks . '</td>
                        <td>Check #:  '. $print_pms_checkno . '</td>
                        <td>Check Date:  '. $print_pms_checkdate . '</td>
                        <td>Bank Name:  '. $print_pms_bankname . '</td>
                        </tr>

                        <tr>
                        <td>Bank Account #:  '. $print_pms_bankaccountno . '</td>
                        <td>Bank Account Name:  '. $print_pms_bankaccountname . '</td>
                        </tr>

                    </tbody>
                 </table><hr>';

                if ($print_pms_purchaseorder_temp!=$rows['pms_purchaseorder']) {
                    echo $report_detail ;
                }
                echo
                '<table>
                    <col width=200>
                    <col width=165>
                    <col width=47>
                    <col width=335>
                    <tbody>
                        <tr>
                        <td>'. $print_pms_item . '</td>
                        <td colspan="2">'. $print_pms_qty . '</td>
                        <td colspan="2">'. $print_pms_cost . '</td>
                        <td colspan="2">'. $print_pms_total . '</td>
                        </tr>
                    </tbody>
                 </table>';

            }
            else {
                if ($print_pms_purchaseorder_temp!=$rows['pms_purchaseorder']) {
                    echo $report_detail ;
                }
                echo
                '<table>
                <col width=200>
                <col width=165>
                <col width=47>
                <col width=335>
                    <tbody>
                        <tr>
                        <td>'. $print_pms_item . '</td>
                        <td colspan="2">'. $print_pms_qty . '</td>
                        <td colspan="2">'. $print_pms_cost . '</td>
                        <td colspan="2">'. $print_pms_total . '</td>
                        </tr>
                    </tbody>
                </table>';
            }


            $print_pms_hid_temp = $rows['pms_hid'] ;
            $print_pms_purchaseorder_temp = $rows['pms_purchaseorder'] ;

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
