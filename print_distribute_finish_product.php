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

if (isset($_GET["pms_date_to"])) {
    $pms_date_to = $_GET['pms_date_to'];
} else {
    $pms_date_to = "";
}

if (isset($_GET["pms_date_from"])) {
    $pms_date_from = $_GET['pms_date_from'];
} else {
    $pms_date_from = "";
}

// echo $pms_date_to . $pms_date_from;
// exit();
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


<link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

  <center>
    <h1 style="font-family: Arial; font-weight: lighter;">
      Distribution Finish Product Report
    </h1>
   <img src="images/pms_logo/pms_logo.jpg" height="133" width="161"><br><br><br>
    <img src="images/pms_logo/idms-text.png" height="50" width="270"><br><br><br>
    <p style="color:#000;">Jentec Storage Inc.<br> +81-9120 - +639205530103<br>
        3515 Hilario st. Palanan Makati City <br>
        Philippines
    </p>
    <!-- <h2 style="font-family: Arial; font-weight: lighter; line-height: 10px;">
          As of <strong>
          <?php
        //   $date_from = date_create($pms_date_from);
        //   $date_to = date_create($pms_date_to);
        //   echo date_format($date_from, 'g:ia \o\n l F jS Y')
        //   . "</strong> to <strong>" .
        //   date_format($date_to, 'g:ia \o\n l F jS Y');
          ?>
        </strong>
    </h2> -->
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

        // $sql_query = "SELECT t1.pms_id AS pms_hid, t1.pms_fp_sku, t1.pms_datetime, t1.pms_joborder,
        // t1.pms_production_qty, t1.pms_remarks, t1.pms_checkedby, t1.pms_supervisor,
        // t1.pms_posted, t1.pms_posteddate, t1.pms_finishing_distribute,
        // t2.pms_id AS pms_did, t2.pms_finishing, t2.pms_rm_sku, t2.pms_date, t2.pms_qty,
        // t3.pms_sku, t3.pms_item, t3.pms_description
        // FROM pms_finishingheader AS t1
        // INNER JOIN pms_finishingdetails AS t2
        // ON t1.pms_id = t2.pms_finishing
        // INNER JOIN pms_rawmaterials AS t3
        // ON t2.pms_rm_sku = t3.pms_id
        //                         WHERE t1.pms_finishing_distribute = '1'";

        // $sql = mysqli_query($GLOBALS["___mysqli_ston"], $sql_query);
        // $report_count = 0;

        // while ($rows=mysqli_fetch_array($sql)) {
        //     $report_count++;
        //     $print_pms_hid = $rows['pms_hid'];
        //     $print_pms_date = $rows['pms_date'];

        // }
    ?>

    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="color: #000; text-align: center;">#</th>
                                                <th style="color: #000; text-align: center;">ID Number</th>
                                                <th style="color: #000; text-align: center;">Finished By</th>
                                                <th style="color: #000; text-align: center;">Product Name</th>
                                                <th style="color: #000; text-align: center;">Quantity</th>
                                                <th style="color: #000; text-align: center;">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                        <?php
                            $countnum = 0;
                            $sql_fp_sku = "SELECT t1.pms_id AS pms_hid, t1.pms_fp_sku, t1.pms_datetime, t1.pms_joborder,
                            t1.pms_production_qty, t1.pms_remarks, t1.pms_checkedby, t1.pms_supervisor,
                            t1.pms_posted, t1.pms_posteddate, t1.pms_finishing_distribute,
                            t2.pms_id AS pms_did, t2.pms_finishing, t2.pms_rm_sku, t2.pms_date, t2.pms_qty,
                            t3.pms_sku, t3.pms_item, t3.pms_description
                    FROM pms_finishingheader AS t1
                    INNER JOIN pms_finishingdetails AS t2
                    ON t1.pms_id = t2.pms_finishing
                    INNER JOIN pms_rawmaterials AS t3
                    ON t2.pms_rm_sku = t3.pms_id
                                            WHERE t1.pms_finishing_distribute = '1' LIMIT 5";
                            $sql_fp = mysqli_query($GLOBALS["___mysqli_ston"], $sql_fp_sku);
                            while ($rowzz=mysqli_fetch_array($sql_fp)) {
                            $countnum++;
                            $appr_pms_id = $rowzz['pms_hid'];
                            $appr_pms_checkedby = $rowzz['pms_checkedby'];
                            $appr_pms_item = $rowzz['pms_item'];
                            $appr_pms_qty = $rowzz['pms_qty'];
                            $appr_pms_finishing_distribute = $rowzz['pms_finishing_distribute'];
                        ?>

                                            <tr>
                                                <td style="color: #000; text-align: center;"><?php echo $countnum; ?></td>
                                                <td style="color: #000; text-align: center;"><?php echo $appr_pms_id; ?></td>
                                                <td style="color: #000; text-align: center;"><?php echo $appr_pms_checkedby; ?></td>
                                                <td style="color: #000; text-align: center;"><?php echo $appr_pms_item; ?></td>
                                                <td style="color: #000; text-align: center;"><?php echo $appr_pms_qty; ?></td>
                                                <td style="color: #000; text-align: center;">
                                                <?php 
                                                if($appr_pms_finishing_distribute == 1){
                                                ?>
                                                <span class="badge badge-success">Successfully Distribute</span>
                                                <?php
                                                } if($appr_pms_finishing_distribute == 0) {
                                                ?>
                                                    <span class="badge badge-warning">Pending</span>
                                                <?php
                                                }
                                                ?>
                                                </td>
                                            </tr>
                            <?php } ?>
                           
                                            <!-- 
                                            <tr>
                                                <td>
                                                    <div class="round-img">
                                                        <a href=""><img src="images/avatar/3.jpg" alt=""></a>
                                                    </div>
                                                </td>
                                                <td>John Abraham</td>
                                                <td><span>iMac</span></td>
                                                <td><span>456 pcs</span></td>
                                                <td><span class="badge badge-warning">Pending</span></td>
                                            </tr> -->
                                        </tbody>
                                    </table>
    
    <script type="text/javascript">
        window.onload = function() { window.print(); }
    </script>

</body>
</html>
