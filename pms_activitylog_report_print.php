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

?>

<!DOCTYPE html>
<html>
<head>
<title>Activity Logs Report | Inventory and Distribution Management System</title>
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
    <h1 style="font-family: Arial; font-weight: lighter; line-height: 40px;">
      Activity Logs Report
    </h1>
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

        $sql_query = "SELECT * FROM pms_activitylogs";
        $sql = mysqli_query($GLOBALS["___mysqli_ston"], $sql_query);
        $report_count = 0;

        while ($rows=mysqli_fetch_array($sql)) {

            $print_pms_id = $rows['pms_id'] ;
            $print_pms_user = $rows['pms_user'] ;
            $print_pms_date = $rows['pms_date'] ;
            $print_pms_action = $rows['pms_action'] ;
            $print_pms_position = $rows['pms_position'] ;
            $report_count++;

            // if ($print_pms_id!=$rows['pms_id']) {
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
                        <td> <strong>Activity Log #: </strong>'. $print_pms_id . '</td>
                        <td> User:  '. $print_pms_user . '</td>
                        <td> Action:  '. $print_pms_action . '</td>
                        </tr>

                        <tr>
                        <td>AC Date:  '. $print_pms_date . '</td>
                        <td>Usertype:  '. $print_pms_position . '</td>
                        </tr>

                    </tbody>
                 </table><hr><br><br>';

               // }



        }
    ?>


    <script type="text/javascript">
        window.onload = function() { window.print(); }
    </script>

</body>
</html>
