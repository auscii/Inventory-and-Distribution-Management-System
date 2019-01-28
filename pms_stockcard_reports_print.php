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

if (isset($_GET["pms_date_from"])) {
    $pms_date_from = $_GET['pms_date_from'];
} else {
    $pms_date_from = "";
}

if (isset($_GET["pms_date_to"])) {
    $pms_date_to = $_GET['pms_date_to'];
} else {
    $pms_date_to = "";
}



//if (isset($_GET["pms_skurmfp"])) {
//    $pms_skurmfp = $_GET['pms_skurmfp'];
//} else {
//    $pms_skurmfp = "";
//}


?>

<!DOCTYPE html>
<html>
<head>
<title>Stock Card Report | Inventory and Distribution Management System</title>
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

  <center>
    <h1 style="font-family: Arial; font-weight: lighter;">
      Stock Card Report
    </h1>
    <h2 style="font-family: Arial; font-weight: lighter; line-height: 10px;">
          As of <strong>
          <?php
          $date_from = date_create($pms_date_from);
          $date_to = date_create($pms_date_to);
          echo date_format($date_from, 'g:ia \o\n l F jS Y')
          . "</strong> to <strong>" .
          date_format($date_to, 'g:ia \o\n l F jS Y');
          ?>
        </strong>
    </h2>
  </center> <br> <br>

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


        $sql_query =
        "SELECT * FROM pms_stockcard
        WHERE pms_datetime >= '$pms_date_from' AND pms_datetime <= '$pms_date_to' ORDER BY pms_id ;";

        $sql = mysqli_query($GLOBALS["___mysqli_ston"], $sql_query);
        $report_count = 0;
        $print_pms_id_temp = "";
        $print_pms_sc_temp = "";


        while ($rows=mysqli_fetch_array($sql)) {

            $print_pms_id = $rows['pms_id'] ;
            $print_pms_sku = $rows['pms_sku'] ;
            $print_pms_datetime = $rows['pms_datetime'] ;
            $print_pms_in = $rows['pms_in'] ;
            $print_pms_out = $rows['pms_out'] ;
            $print_pms_transtype = $rows['pms_transtype'] ;
            $print_pms_transid = $rows['pms_transid'] ;
            $print_pms_user = $rows['pms_user'] ;

            // $print_pms_rid = $rows['pms_rid'] ;
            // $print_rm_sku = $rows['rm_sku'] ;
            // $print_pms_item = $rows['pms_item'] ;
            // $print_pms_description = $rows['pms_description'] ;

            $report_count++;

            if ($print_pms_id_temp!=$rows['pms_id']) {
                echo "<br><br><br><br><br>" ;
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
                        <td> <strong>Stock Card #: </strong>'. $print_pms_id . '</td>
                        <td> Transaction ID:  '. $print_pms_transid . '</td>
                        <td> SC Date:  '. $print_pms_datetime . '</td>
                        <td> Product Name:  '. $print_pms_sku . '</td>
                        </tr>

                        <tr>
                        <td>IN:  '. $print_pms_in . '</td>
                        <td>OUT:  '. $print_pms_out . '</td>
                        <td>User:  '. $print_pms_user . '</td>
                        <td>Transaction Type:  '. $print_pms_transtype . '</td>
                        </tr>

                    </tbody>
                 </table><hr><br><br>';

               }

            //     if ($print_pms_sc_temp!=$rows['pms_salesorder']) {
            //         echo $report_detail ;
            //     }
            //     echo
            //     '<table>
            //         <col width=200>
            //         <col width=165>
            //         <col width=47>
            //         <col width=335>
            //         <tbody>
            //             <tr>
            //             <td>'. $print_pms_item . '</td>
            //             <td colspan="2">'. $print_pms_qty . '</td>
            //             <td colspan="2">'. $print_pms_price . '</td>
            //             <td colspan="2">'. $print_pms_total . '</td>
            //             </tr>
            //         </tbody>
            //      </table>';
            //
            //
            // }
            // else {
            //     if ($print_pms_sc_temp!=$rows['pms_salesorder']) {
            //         echo $report_detail ;
            //     }
            //     echo
            //     '<table>
            //     <col width=200>
            //     <col width=165>
            //     <col width=47>
            //     <col width=335>
            //         <tbody>
            //             <tr>
            //             <td>'. $print_pms_item . '</td>
            //             <td colspan="2">'. $print_pms_qty . '</td>
            //             <td colspan="2">'. $print_pms_price . '</td>
            //             <td colspan="2">'. $print_pms_total . '</td>
            //             </tr>
            //         </tbody>
            //     </table>';
            // }
            //
            //
            // $print_pms_id_temp = $rows['pms_id'] ;
            // $print_pms_sc_temp = $rows['pms_salesorder'] ;

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
