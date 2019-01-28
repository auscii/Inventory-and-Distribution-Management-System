<?php
date_default_timezone_set('Asia/Manila');
include("includes/pms_dbcon.php");
$curr_uri = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
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

if (isset($_POST["inputstatus"])) {
  $pms_mode = $_POST['inputstatus'];
 } else {
  $pms_mode = "";
}

if (isset($_POST["inputstatus2"])) {
    $pms_mode2 = $_POST['inputstatus2'];
} else {
    $pms_mode2 = "";
  }

if (isset($_POST["inputkey"])) {
  $key = $_POST['inputkey'];
 } else {
  $key = "";
}

if (isset($_POST["inputkey2"])) {
    $key2 = $_POST['inputkey2'];
} else {
    $key2 = "";
}

if (isset($_POST["deletestatus"])) {
  $pms_deletemode = $_POST['deletestatus'];
 } else {
  $pms_deletemode = "";
}


if (isset($_POST["deletekey"])) {
  $deletekey = $_POST['deletekey'];
 } else {
  $deletekey = "";
}


if (isset($_POST["deletestatus_detail"])) {
    $pms_deletemode_detail = $_POST['deletestatus_detail'];
} else {
    $pms_deletemode_detail = "";
}


if (isset($_POST["deletekey_detail"])) {
    $deletekey_detail = $_POST['deletekey_detail'];
} else {
    $deletekey_detail = "";
}


if (isset($_GET["id"])) {
    $id = $_GET['id'];
} else {
    $id = "";
}

if (isset($_POST["inputkey_posted_sales_order"])) {
    $key_posted_sales_order = $_POST['inputkey_posted_sales_order'];
} else {
    $key_posted_sales_order = "";
}

if (isset($_POST["inputstatus_sales_order"])) {
  $pms_mode_posted_sales_order = $_POST['inputstatus_sales_order'];
 } else {
  $pms_mode_posted_sales_order = "";
}



// pms_salesorderheader

if (isset($_POST["pms_duedate"])) {
    $pms_duedate = $_POST['pms_duedate'];
} else {
    $pms_duedate = "";
}

if (isset($_POST["pms_deliveryreceipt"])) {
    $pms_deliveryreceipt = $_POST['pms_deliveryreceipt'];
} else {
    $pms_deliveryreceipt = "";
}

if (isset($_POST["pms_purchaseorder"])) {
    $pms_purchaseorder = $_POST['pms_purchaseorder'];
} else {
    $pms_purchaseorder = "";
}

if (isset($_POST["pms_customer"])) {
    $pms_customer = $_POST['pms_customer'];
} else {
    $pms_customer = "";
}

if (isset($_POST["pms_shippingmark"])) {
    $pms_shippingmark = $_POST['pms_shippingmark'];
} else {
    $pms_shippingmark = "";
}

if (isset($_POST["pms_carriers"])) {
    $pms_carriers = $_POST['pms_carriers'];
} else {
    $pms_carriers = "";
}

if (isset($_POST["pms_checkedby"])) {
    $pms_checkedby = $_POST['pms_checkedby'];
} else {
    $pms_checkedby = "";
}

if (isset($_POST["pms_salesman"])) {
    $pms_salesman = $_POST['pms_salesman'];
} else {
    $pms_salesman = "";
}

if (isset($_POST["pms_total"])) {
    $pms_total = $_POST['pms_total'];
} else {
    $pms_total = "";
}

if (isset($_POST["pms_paid"])) {
    $pms_paid = $_POST['pms_paid'];
} else {
    $pms_paid = "";
}

if (isset($_POST["pms_settled"])) {
    $pms_settled = $_POST['pms_settled'];
} else {
    $pms_settled = "";
}

if (isset($_POST["pms_creditmemo"])) {
    $pms_creditmemo = $_POST['pms_creditmemo'];
} else {
    $pms_creditmemo = "";
}

if (isset($_POST["pms_posted"])) {
    $pms_posted = $_POST['pms_posted'];
} else {
    $pms_posted = "";
}

if (isset($_POST["pms_posteddate"])) {
    $pms_posteddate = $_POST['pms_posteddate'];
} else {
    $pms_posteddate = "";
}

if (isset($_POST["pms_reference"])) {
    $pms_reference = $_POST['pms_reference'];
} else {
    $pms_reference = "";
}

if (isset($_POST["pms_checkno"])) {
    $pms_checkno = $_POST['pms_checkno'];
} else {
    $pms_checkno = "";
}

if (isset($_POST["pms_checkdate"])) {
    $pms_checkdate = $_POST['pms_checkdate'];
} else {
    $pms_checkdate = "";
}

if (isset($_POST["pms_bankname"])) {
    $pms_bankname = $_POST['pms_bankname'];
} else {
    $pms_bankname = "";
}

if (isset($_POST["pms_bankaccountno"])) {
    $pms_bankaccountno = $_POST['pms_bankaccountno'];
} else {
    $pms_bankaccountno = "";
}

if (isset($_POST["pms_bankaccountname"])) {
    $pms_bankaccountname = $_POST['pms_bankaccountname'];
} else {
    $pms_bankaccountname = "";
}

if (isset($_POST["pms_remarks"])) {
    $pms_remarks = $_POST['pms_remarks'];
} else {
    $pms_remarks = "";
}


// pms_salesorderdetails
if (isset($_POST["pms_salesorder"])) {
    $pms_salesorder = $_POST['pms_salesorder'];
} else {
    $pms_salesorder = "";
}

if (isset($_POST["pms_rm_sku"])) {
    $pms_rm_sku = $_POST['pms_rm_sku'];
} else {
    $pms_rm_sku = "";
}

if (isset($_POST["pms_qty"])) {
    $pms_qty = $_POST['pms_qty'];
} else {
    $pms_qty = "";
}

if (isset($_POST["pms_price"])) {
    $pms_price = $_POST['pms_price'];
} else {
    $pms_price = "";
}

if (isset($_POST["pms_total"])) {
    $pms_total = $_POST['pms_total'];
} else {
    $pms_total = "";
}


if ($pms_mode_posted_sales_order=="psom") {
    echo '
    <div id="myModal">
        <div class="modal-dialog" style="margin-left: -50px;">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                    <div class="modal-body">
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-check"></i> Successfully Posted! </h4>
                    </div>
                    <div class="modal-footer">
                        <button onclick="document.getElementById(&#39;myModal&#39;).style.display=&#39;none&#39;" class="btn btn-primary" type="button">Close</button>
                    </div>
            </div>
        </div>
    </div>
            ';
    $con=mysqli_query($GLOBALS["___mysqli_ston"],
    "UPDATE pms_salesorderheader
    SET pms_posted = 1
    WHERE pms_id = $key_posted_sales_order");

    $sql_post =
    "SELECT t1.pms_id AS pms_hid, t1.pms_duedate, t1.pms_deliveryreceipt, t1.pms_purchaseorder, t1.pms_customer,
            t1.pms_shippingmark, t1.pms_carriers, t1.pms_checkedby, t1.pms_salesman, t1.pms_total, t1.pms_paid, t1.pms_settled,
            t1.pms_creditmemo, t1.pms_posted, t1.pms_reference, t1.pms_checkno, t1.pms_checkdate, t1.pms_bankname, t1.pms_bankaccountno,
            t1.pms_bankaccountname, t1.pms_remarks,
            t2.pms_id AS pms_did, t2.pms_salesorder, t2.pms_rm_sku, t2.pms_qty, t2.pms_price,
            t3.pms_id AS pms_rid, t3.pms_sku, t3.pms_item, t3.pms_description
    FROM pms_salesorderheader AS t1
    INNER JOIN pms_salesorderdetails AS t2
    ON t1.pms_id = t2.pms_salesorder
    INNER JOIN pms_rawmaterials AS t3
    ON t2.pms_rm_sku = t3.pms_id
    WHERE t1.pms_id = '$key_posted_sales_order'";

    $sql = mysqli_query($GLOBALS["___mysqli_ston"], $sql_post);

    while ($row=mysqli_fetch_array($sql)) {
        $post_pms_finishedproduct_code = $row['pms_hid'];
        $post_pms_purchaseorder = $row['pms_purchaseorder'];

        $post_pms_detail_id = $row['pms_did'];
        $post_pms_salesorder = $row['pms_salesorder'];
        $post_pms_rm_sku = $row['pms_rm_sku'];
        $post_pms_cost = $row['pms_price'];
        $post_pms_qty = $row['pms_qty'];
        $post_pms_item = $row['pms_item'];
        // $post_pms_total = $row['pms_total'];

        $con=mysqli_query($GLOBALS["___mysqli_ston"],
        "INSERT INTO
        pms_stockcard
        (
        pms_sku,
        pms_in,
        pms_out,
        pms_transtype,
        pms_transid,
        pms_user
        )
        VALUES
        (
        '$post_pms_item',
        0,
        '$post_pms_qty',
        'Sales Order',
        '$key_posted_sales_order',
        '$pms_user'
        )");

        $con=mysqli_query($GLOBALS["___mysqli_ston"],
        "UPDATE pms_rawmaterials
        SET pms_qty = pms_qty - '$post_pms_qty', pms_finishedproduct_code = '$post_pms_finishedproduct_code'
        WHERE pms_id = '$post_pms_rm_sku'");
    }

    $sql_f_update =
    "SELECT pms_id, pms_finishing, pms_rm_sku, pms_date, pms_qty FROM pms_finishingdetails WHERE pms_finishing = '$post_pms_finishedproduct_code'";
    $sqll = mysqli_query($GLOBALS["___mysqli_ston"], $sql_f_update);

    while ($rowz=mysqli_fetch_array($sqll)) {

        $post_fdetail_pms_id = $rowz['pms_id'];
        $post_fdetail_pms_rm_sku = $rowz['pms_rm_sku'];
        $post_fdetail_pms_qty = $rowz['pms_qty'];

        $con=mysqli_query($GLOBALS["___mysqli_ston"],
        "UPDATE pms_rawmaterials
        SET pms_qty = pms_qty - ($post_pms_qty * $post_fdetail_pms_qty)
        WHERE pms_id = '$post_fdetail_pms_rm_sku'");

        $con=mysqli_query($GLOBALS["___mysqli_ston"],
        "INSERT INTO
        pms_stockcard
        (
        pms_sku,
        pms_in,
        pms_out,
        pms_transtype,
        pms_transid,
        pms_user
        )
        VALUES
        (
        '$post_fdetail_pms_rm_sku',
        0,
        ($post_pms_qty * $post_fdetail_pms_qty),
        'Sales Order',
        '$key_posted_sales_order',
        '$pms_user'
        )");

    }

}


if ($pms_mode=="salesOrderHeaderAdd") {
    echo '
    <div id="myModal">
        <div class="modal-dialog" style="margin-left: -50px;">
            <div class="modal-content">
                <div class="modal-header">


                </div>
                    <div class="modal-body">
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-check"></i> Successfully Added! </h4>
                    </div>
                    <div class="modal-footer">
                        <button onclick="document.getElementById(&#39;myModal&#39;).style.display=&#39;none&#39;" class="btn btn-primary" type="button">Close</button>
                    </div>
            </div>
        </div>
    </div>
         ';
    $con=mysqli_query($GLOBALS["___mysqli_ston"],
    "INSERT INTO
    pms_salesorderheader
    (
    pms_duedate,
    pms_deliveryreceipt,
    pms_purchaseorder,
    pms_customer,
    pms_checkedby,
    pms_total,
    pms_posted,
    pms_checkno,
    pms_checkdate,
    pms_bankname,
    pms_bankaccountno,
    pms_bankaccountname,
    pms_remarks
    )
    VALUES
    (
    '$pms_duedate',
    '$pms_deliveryreceipt',
    '$pms_purchaseorder',
    '$pms_customer',
    '$pms_checkedby',
    '0',
    '0',
    '$pms_checkno',
    '$pms_checkdate',
    '$pms_bankname',
    '$pms_bankaccountno',
    '$pms_bankaccountname',
    '$pms_remarks'
    )");
}

if ($pms_mode2=="salesOrderDetailAdd") {
    echo '
    <div id="myModal">
        <div class="modal-dialog" style="margin-left: -50px;">
            <div class="modal-content">
                <div class="modal-header">


                </div>
                    <div class="modal-body">
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-check"></i> Successfully Added! </h4>
                    </div>
                    <div class="modal-footer">
                        <button onclick="document.getElementById(&#39;myModal&#39;).style.display=&#39;none&#39;" class="btn btn-primary" type="button">Close</button>
                    </div>
            </div>
        </div>
    </div>
         ';
    $con=mysqli_query($GLOBALS["___mysqli_ston"],
    "INSERT INTO
    pms_salesorderdetails
    (
    pms_salesorder,
    pms_rm_sku,
    pms_qty,
    pms_price,
    pms_total
    )
    VALUES
    (
    '$pms_salesorder',
    '$pms_rm_sku',
    '$pms_qty',
    '$pms_price',
    '0'
    )");
  }

if ($pms_mode=="easoh") {
    echo '
    <div id="myModal">
        <div class="modal-dialog" style="margin-left: -50px;">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                    <div class="modal-body">
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil"></i> Successfully Updated! </h4>
                    </div>
                    <div class="modal-footer">
                        <button onclick="document.getElementById(&#39;myModal&#39;).style.display=&#39;none&#39;" class="btn btn-primary" type="button">Close</button>
                    </div>
            </div>
        </div>
    </div>
            ';
  $con=mysqli_query($GLOBALS["___mysqli_ston"],
    "UPDATE pms_salesorderheader
     SET pms_duedate='$pms_duedate',
         pms_deliveryreceipt='$pms_deliveryreceipt',
         pms_purchaseorder='$pms_purchaseorder',
         pms_customer='$pms_customer',
         pms_checkedby='$pms_checkedby',
         pms_checkno='$pms_checkno',
         pms_checkdate='$pms_checkdate',
         pms_bankname='$pms_bankname',
         pms_bankaccountno='$pms_bankaccountno',
         pms_bankaccountname='$pms_bankaccountname',
         pms_remarks='$pms_remarks'
    WHERE pms_id = $key");
}

if ($pms_mode2=="easod") {
    echo '
    <div id="myModal">
        <div class="modal-dialog" style="margin-left: -50px;">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                    <div class="modal-body">
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil"></i> Successfully Updated! </h4>
                    </div>
                    <div class="modal-footer">
                        <button onclick="document.getElementById(&#39;myModal&#39;).style.display=&#39;none&#39;" class="btn btn-primary" type="button">Close</button>
                    </div>
            </div>
        </div>
    </div>
            ';
  $con=mysqli_query($GLOBALS["___mysqli_ston"],
  "UPDATE pms_salesorderdetails
    SET pms_salesorder='$pms_salesorder',
        pms_rm_sku='$pms_rm_sku',
        pms_qty='$pms_qty',
        pms_price='$pms_price'
    WHERE pms_id = $key2");
}

if ($pms_deletemode=="salesOrderListDelete") {
    echo '
    <div id="myModal">
        <div class="modal-dialog" style="margin-left: -50px;">
            <div class="modal-content">
                <div class="modal-header">


                </div>
                    <div class="modal-body">
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-check"></i> Successfully Deleted! </h4>
                    </div>
                    <div class="modal-footer">
                        <button onclick="document.getElementById(&#39;myModal&#39;).style.display=&#39;none&#39;" class="btn btn-primary" type="button">Close</button>
                    </div>
            </div>
        </div>
    </div>
            ';
  $con=mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM pms_salesorderheader WHERE pms_id = $deletekey");
  $con=mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM pms_salesorderdetails WHERE pms_salesorder = $deletekey");
}

if ($pms_deletemode_detail=="salesOrderDetailListDelete") {
    echo '
    <div id="myModal">
        <div class="modal-dialog" style="margin-left: -50px;">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                    <div class="modal-body">
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-check"></i> Successfully Deleted! </h4>
                    </div>
                    <div class="modal-footer">
                        <button onclick="document.getElementById(&#39;myModal&#39;).style.display=&#39;none&#39;" class="btn btn-primary" type="button">Close</button>
                    </div>
            </div>
        </div>
    </div>
            ';
  $con=mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM pms_salesorderdetails WHERE pms_id = $deletekey_detail");
}


$dp_pms_id = "";
$dp_pms_date = "";
$dp_pms_duedate = "";
$dp_pms_deliveryreceipt = "";
$dp_pms_purchaseorder = "";
$dp_pms_customer = "";
$dp_pms_shippingmark = "";
$dp_pms_carriers = "";
$dp_pms_checkedby = "";
$dp_pms_salesman = "";
$dp_pms_total = "";
$dp_pms_paid = "";
$dp_pms_settled = "";
$dp_pms_creditmemo = "";
$dp_pms_posted = "";
$dp_pms_posteddate = "";
$dp_pms_reference = "";
$dp_pms_checkno = "";
$dp_pms_checkdate = "";
$dp_pms_bankname = "";
$dp_pms_bankaccountno = "";
$dp_pms_bankaccountname = "";
$dp_pms_remarks = "";

$title_pms_duedate = "";
$title_pms_deliveryreceipt = "";
$title_pms_purchaseorder = "";
$title_pms_customer = "";
$title_pms_shippingmark = "";
$title_pms_carriers = "";
$title_pms_checkedby = "";
$title_pms_salesman = "";
$title_pms_total = "";
$title_pms_paid = "";
$title_pms_settled = "";
$title_pms_creditmemo = "";
$title_pms_posted = "";
$title_pms_posteddate = "";
$title_pms_reference = "";
$title_pms_checkno = "";
$title_pms_checkdate = "";
$title_pms_bankname = "";
$title_pms_bankaccountno = "";
$title_pms_bankaccountname = "";
$title_pms_remarks = "";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/pms_logo/logo-small.png"">
    <title>Sales Order| Inventory and Distribution Management System</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/w3.css">
    <link href="css/overlay.css" rel="stylesheet">

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
    var url = document.getElementById("url").value;

    window.location.href = "lock/pms_ls.php?url=" + url;
}

function resetTimer() {
    clearTimeout(t);
     t = setTimeout(logout, 50000000)
}
</script>

</head>

<input type="hidden" id="url" value="<?php echo $curr_uri; ?>">

<body class="fix-header fix-sidebar">


    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header" style="background-color: #3b54af;">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header" style="background-color: #3b54af;">
                    <a class="navbar-brand" href="#">
                        <!-- Logo icon -->
                        <b><img src="images/pms_logo/logo-small.png"" alt="homepage" class="dark-logo" /></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        &nbsp;
                        <span><img style="height: 33px;" src="images/pms_logo/idms_new_text.png" alt="homepage" class="dark-logo" /></span>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">

                        <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- Messages -->
                        <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th-large"></i></a>
                            <div class="dropdown-menu animated zoomIn">

                                <ul class="mega-dropdown-menu row">


                                    <li class="col-lg-3  m-b-30">
                                        <h3 class="m-b-20" class ="align-self-center">ABOUT US</h3>
                                </ul>
                            </div>
                        </li>
                        <!-- End Messages -->
                    </ul>
                    </ul>
                        <?php include("includes/pms_user_menu.php") ?>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <?php include("includes/pms_sidebar_operator.php");?>
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Sales Order</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Sales Order</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
  <div class="container-fluid">
      <!-- Start Page Content -->
      <div class="row">


          <div class="col-12">
              <div class="card" style="background: #ebefea;">
                  <div class="card-body" >

                  <button
                    onclick="listPurchaseOrder();"
                    class="btn"
                    href="#SalesOrderListModal"
                    data-target="#SalesOrderListModal"
                    style="color:#FFF; background-color: #a53cd8"
                    >
                    <i class="fa fa-list"></i> SALES ORDER LIST
                    </button> &nbsp;&nbsp;

                    <button
                    onclick="addSalesOrderHeader();"
                    class="btn btn-primary"
                    href="#salesOrderHeaderModal"
                    data-target="#salesOrderHeaderModal"
                    id="addBtnSalesOrderHeader"
                    style="color:#fff;"
                    >
                    <i class="fa fa-plus"></i> ADD NEW SALES ORDER (HEADER)
                    </button>

                    <?php
                    $sql = mysqli_query($GLOBALS["___mysqli_ston"], 
                    "SELECT * FROM pms_salesorderheader");
                    $count_entry = mysqli_num_rows($sql);
                    echo "<p class='text-primary' style='position:absolute; right:10px; top:70px;'>Total Number of Sales Order(s): $count_entry</p>"; 
                    ?>

                  </div>

        <?php
        $sql_query_header =
        "SELECT t1.pms_id AS pms_hid, t1.pms_date, t1.pms_duedate, t1.pms_deliveryreceipt, t1.pms_purchaseorder,
                t1.pms_customer, t1.pms_shippingmark, t1.pms_carriers, t1.pms_checkedby, t1.pms_salesman,
                t1.pms_total, t1.pms_paid, t1.pms_settled, t1.pms_creditmemo, t1.pms_posted, t1.pms_posteddate,
                t1.pms_reference, t1.pms_checkno, t1.pms_checkdate, t1.pms_bankname, t1.pms_bankaccountno,
                t1.pms_bankaccountname, t1.pms_remarks,
                t2.pms_id AS pms_cid, t2.pms_fullname
        FROM pms_salesorderheader AS t1
        INNER JOIN pms_customers AS t2
        ON t1.pms_customer = t2.pms_fullname
        WHERE t1.pms_id = '$id'";

        $sql2 = mysqli_query($GLOBALS["___mysqli_ston"], $sql_query_header);
        while ($row_header=mysqli_fetch_array($sql2)) {

            $dp_pms_id = $row_header['pms_hid'];
            $dp_pms_date = $row_header['pms_date'];
            $dp_pms_duedate = $row_header['pms_duedate'];
            $dp_pms_deliveryreceipt = $row_header['pms_deliveryreceipt'];
            $dp_pms_purchaseorder = $row_header['pms_purchaseorder'];
            $dp_pms_customer = $row_header['pms_customer'];
            $dp_pms_shippingmark = $row_header['pms_shippingmark'];
            $dp_pms_carriers = $row_header['pms_carriers'];
            $dp_pms_checkedby = $row_header['pms_checkedby'];
            $dp_pms_salesman = $row_header['pms_salesman'];
            $dp_pms_total = $row_header['pms_total'];
            $dp_pms_paid = $row_header['pms_paid'];
            $dp_pms_settled = $row_header['pms_settled'];
            $dp_pms_creditmemo = $row_header['pms_creditmemo'];
            $dp_pms_posted = $row_header['pms_posted'];
            $dp_pms_posteddate = $row_header['pms_posteddate'];
            $dp_pms_reference = $row_header['pms_reference'];
            $dp_pms_checkno = $row_header['pms_checkno'];
            $dp_pms_checkdate = $row_header['pms_checkdate'];
            $dp_pms_bankname = $row_header['pms_bankname'];
            $dp_pms_bankaccountno = $row_header['pms_bankaccountno'];
            $dp_pms_bankaccountname = $row_header['pms_bankaccountname'];
            $dp_pms_remarks = $row_header['pms_remarks'];

            $title_pms_duedate = "Due Date";
            $title_pms_deliveryreceipt = "Delivery Receipt";
            $title_pms_purchaseorder = "Purchase Order";
            $title_pms_customer = "Customer";
            $title_pms_checkedby = "Operator Name";
            $title_pms_total = "Total Quantity";
            $title_pms_posted = "Posted";
            $title_pms_posteddate = "Posted Date";
            $title_pms_checkno = "Check No.";
            $title_pms_checkdate = "Check Date";
            $title_pms_bankname = "Bank Name";
            $title_pms_bankaccountno = "Bank Account No.";
            $title_pms_bankaccountname = "Bank Account Name";
            $title_pms_remarks = "Remarks";


            if ($dp_pms_posted == "1"){
                $dp_pms_posted = "Yes";
            }
            if ($dp_pms_posted == "0"){
                $dp_pms_posted = "No";
            }
        ?>
        <div class="card-body" style="margin-top: -34px; margin-left: 550px;">
                    <button
                        onclick="editSOH('<?php echo $row_header['pms_hid'] ; ?>',
                                        '<?php echo $row_header['pms_duedate'] ?>',
                                        '<?php echo $row_header['pms_deliveryreceipt'] ?>',
                                        '<?php echo $row_header['pms_purchaseorder'] ?>',
                                        '<?php echo $row_header['pms_customer'] ?>',
                                        '<?php echo $row_header['pms_checkedby'] ?>',
                                        '<?php echo $row_header['pms_checkno'] ?>',
                                        '<?php echo $row_header['pms_checkdate'] ?>',
                                        '<?php echo $row_header['pms_bankname'] ?>',
                                        '<?php echo $row_header['pms_bankaccountno'] ?>',
                                        '<?php echo $row_header['pms_bankaccountname'] ?>',
                                        '<?php echo $row_header['pms_remarks'] ?>');"
                        class="btn"
                        href="#salesOrderHeaderModal"
                        data-target="#salesOrderHeaderModal"
                        style="color:#fff; background-color: #3bdb39;"
                    >
                    <i class="fa fa-pencil"></i> EDIT SALES ORDER (HEADER)
                    </button>
                    &nbsp; &nbsp;
                    <?php
                        if ($dp_pms_posted != "Yes"){
                            echo '<button
                                   onclick="postedSalesOrder('. $row_header['pms_hid'] . ');"
                                   class="btn"
                                   href="#postedSalesOrderModal"
                                   style="color:#fff;
                                   background-color: #ba1307;">
                                   <i class="fa fa-check-square-o"></i> POST SALES ORDER</button>' ;
                        }
                    ?>

                    <br> <br>
        </div>
        <form method="">

          <div class="form-group" style="width: 450px;">
            <label class="control-label col-lg-7" style="font-size: 20px; font-weight: bold;">Sales Order ID</label>
            <div class="col-lg-9">
                <h4> <?php echo $dp_pms_id; ?> </h4>
            </div>
          </div> <br>
          <div class="form-group" style="position: absolute; width: 350px; margin-top: -20px;">
            <label class="control-label col-lg-9" style="font-size: 20px; font-weight: bold;">Date/Time</label>
            <div class="col-lg-9">
                <h4> <?php echo $dp_pms_date; ?> </h4>
            </div>
          </div> <br>

          <div class="form-group" style="position: absolute; right: 0px; width: 450px; margin-top: -110px;">
            <label class="control-label col-lg-9" style="font-size: 20px; font-weight: bold;">Due Date</label>
            <div class="col-lg-9">
                <h4> <?php echo $dp_pms_duedate; ?> </h4>
            </div>
          </div>

          <div class="form-group" style="position: absolute; right: 0px; margin-top: -40px; width: 450px;">
            <label class="control-label col-lg-9" style="font-size: 20px; font-weight: bold;">Delivery Receipt</label>
            <div class="col-lg-9">
                <h4> <?php echo $dp_pms_deliveryreceipt; ?> </h4>
            </div>
          </div>

        </form><br><br><br>

        <div class="card-body" >
            <button
                        onclick="addSalesOrderDetail('<?php echo $row_header['pms_hid'] ; ?>');"
                        class="btn btn-primary"
                        href="#salesOrderDetailModal"
                        data-target="#salesOrderDetailModal"
                        style="color:#fff;"
                        >
                        <i class="fa fa-plus"></i> ADD NEW SALES ORDER (DETAIL)
            </button> &nbsp;&nbsp;

            <button
                    onclick="printSalesOrder('<?php echo $row_header['pms_hid'] ; ?>');"
                    class="btn btn-primary"
                    style="color:#fff; background: #ba1307;"
                    >
                    <i class="fa fa-print"></i> PRINT SALES ORDER
                    </button>

        </div>

        <?php } ?>

 <!-- 1st Table -->
        <!-- <h4 class="card-title">Save As</h4> -->
        <br>

                    <br>
            <table id="DataTable2" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">Product (SKU)</th>
                        <th style="text-align: center;">Quantity</th>
                        <th style="text-align: center;">Price</th>
                        <th style="text-align: center;">Total</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>

                <tbody>

                  <?php
                    $totaldetail = 0;
                    $sql_query_detail = mysqli_query($GLOBALS["___mysqli_ston"],
                    "SELECT SUM(pms_qty) AS total_qty FROM pms_salesorderdetails WHERE pms_salesorder = '$id'");
                    while ($rowtotal=mysqli_fetch_array($sql_query_detail)) {
                          $totaldetail = $rowtotal['total_qty'];
                    }
                    $sql_query_detail =
                   "SELECT t1.pms_id AS pms_hid, t1.pms_date, t1.pms_duedate, t1.pms_deliveryreceipt, t1.pms_purchaseorder,
                           t1.pms_customer, t1.pms_shippingmark, t1.pms_carriers, t1.pms_checkedby, t1.pms_salesman,
                           t1.pms_total, t1.pms_paid, t1.pms_settled, t1.pms_creditmemo, t1.pms_posted, t1.pms_posteddate,
                           t1.pms_reference, t1.pms_checkno, t1.pms_checkdate, t1.pms_bankaccountno,
                           t1.pms_bankaccountname, t1.pms_remarks,
                           t2.pms_id AS pms_did, t2.pms_salesorder, t2.pms_rm_sku, t2.pms_qty, t2.pms_price, FORMAT(t2.pms_qty * t2.pms_price, 2) AS pms_total,
                           t3.pms_id AS pms_rmid, t3.pms_sku, t3.pms_item, t3.pms_description
                    FROM pms_salesorderheader AS t1
                    INNER JOIN pms_salesorderdetails AS t2
                    ON t1.pms_id = t2.pms_salesorder
                    INNER JOIN pms_rawmaterials AS t3
                    ON t2.pms_rm_sku = t3.pms_id
                    WHERE t1.pms_id = '$id'";

                    $sql_po_d = mysqli_query($GLOBALS["___mysqli_ston"], $sql_query_detail);
                    $detail_count = 0;
                    while ($row=mysqli_fetch_array($sql_po_d)) {
                    $dp_pms_posted = $row['pms_posted'];
                    $detail_count++;
                  ?>

                        <tr>

                        <td style="color: #000; text-align: center;"><?php echo $detail_count;?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_item'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_qty'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo "₱ " . $row['pms_price'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo "₱ " . $row['pms_total'];?></td>

                        <td style="color: #000; text-align: center;">

                        <button onclick="editSOD('<?php echo $row['pms_did'] ; ?>',
                                                 '<?php echo $row['pms_salesorder'] ?>',
                                                 '<?php echo $row['pms_rm_sku'] ?>',
                                                 '<?php echo $row['pms_qty'] ?>',
                                                 '<?php echo $row['pms_price'] ?>');"
                                    href="#salesOrderDetailModal"
                                    data-target="#salesOrderDetailModal"
                                    style="background-color: #3bdb39; color: #ffffff;"
                                    class="btn"><i class="icon-pencil icon-large"> Edit</i></button>

                        &nbsp;

                        <?php
                        if ($dp_pms_posted != "1"){
                            echo '<button
                                   onclick="deleteSODM('. $row['pms_did'] . ');"
                                   class="btn"
                                   href="#deleteSalesOrderDetailListModal"
                                   data-target="#deleteSalesOrderDetailListModal"
                                   style="color:#fff;
                                   background-color: #ba1307; color: #ffffff;">
                                   <i class="icon-trash icon-large"></i> Delete</button>' ;
                        }
                        ?>
                        <!-- <button onclick="deleteSODM('<?php echo $row['pms_did'] ; ?>');"
                                href="#deleteSalesOrderDetailListModal<?php echo $row['pms_did'];?>"
                                data-target="#deleteSalesOrderDetailListModal"
                                style="background-color: #ba1307; color: #ffffff;"
                                class="btn"><i class="icon-trash icon-large"> Delete</i></button> -->

                        </td>
                        <!-- aaa -->

                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

                        <br> <br> <br> <br>
                    <form method="">

                        <div class="form-group" style="width: 450px; margin-top: -50px;">
                            <label class="control-label col-lg-7" style="font-size: 20px; font-weight: bold;"><?php echo $title_pms_purchaseorder; ?></label>
                            <div class="col-lg-9">
                                <!-- <h4> <?php //echo $totalquantity; ?> </h4> -->
                                <h4> <?php echo $dp_pms_purchaseorder; ?> </h4>
                            </div>
                        </div> <br>

                        <div class="form-group" style="position: absolute; width: 350px; margin-top: -20px;">
                            <label class="control-label col-lg-7" style="font-size: 20px; font-weight: bold;"><?php echo $title_pms_customer; ?></label>
                            <div class="col-lg-9">
                                <h4> <?php echo $dp_pms_customer; ?> </h4>
                            </div>
                        </div> <br>

                        <div class="form-group" style="position: absolute; width: 350px; margin-top: 30px;">
                            <label class="control-label col-lg-7" style="font-size: 20px; font-weight: bold;"><?php echo $title_pms_posted; ?></label>
                            <div class="col-lg-9">
                                <h4> <?php echo $dp_pms_posted; ?> </h4>
                            </div>
                        </div> <br>


                        <div class="form-group" style="position: absolute; right: 0px; margin-top: -130px; width: 450px;">
                            <label class="control-label col-lg-7" style="font-size: 20px; font-weight: bold;"><?php echo $title_pms_checkedby; ?></label>
                            <div class="col-lg-9">
                                <h4> <?php echo $dp_pms_checkedby; ?> </h4>
                            </div>
                        </div>

                        <div class="form-group" style="position: absolute; right: 0px; margin-top: -60px; width: 450px;">
                            <label class="control-label col-lg-7" style="font-size: 20px; font-weight: bold;"><?php echo $title_pms_posteddate; ?></label>
                            <div class="col-lg-9">
                                <h4> <?php echo $dp_pms_posteddate; ?> </h4>
                            </div>
                        </div>

                         <div class="form-group" style="position: absolute; right: 0px; margin-top: 5px; width: 450px;">
                            <label class="control-label col-lg-7" style="font-size: 20px; font-weight: bold;"><?php echo $title_pms_total; ?></label>
                            <div class="col-lg-9">
                                <h4> <?php echo $totaldetail; ?> </h4>
                            </div>
                        </div>


                         <br> <br> <br> <br> <br> <br> <br> <br> <br>
                    </form>

                      </div>
                  </div>
              </div>
            <!-- //1st Table -->
              </div>
          </div>
      </div>
                <!-- End Page Content -->
            </div>
            <!-- End Container fluid  -->

        </div>
        <!-- End Page wrapper  -->
    </div>

<form method="POST">
<div id="salesOrderHeaderModal" class="w3-modal">
    <div class="w3-modal-content" style="width: 700px; height: 650px; margin-top: -70px; margin-left: 420px;">
        <div class="w3-container">
            <br>
            <center>
              <h4 class="modal-title"><span id="salesOrderHeaderModalTitle"></span></h4>
            </center>
        <span onclick="document.getElementById('salesOrderHeaderModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

        <input type="hidden" name="inputstatus" id="inputstatus">
        <input type="hidden" name="inputkey" id="inputkey">

        <?php
        function randomNum(){
            $char = "01239120391231237951415678";
            srand((double)microtime()*1000000);
            $i = 0;
            $pass = "";
            while ($i <= 5){
                $num = rand() % 33;
                $tmp = substr($char, $num, 1);
                $pass = $pass . $tmp;
                $i++;
            }
            return $pass;
        }
        ?>


            <div class="modal-body">
            <br>

                <div class="form-group" style="width: 850px; margin-top: 11px;">
                <label class="control-label col-lg-5" >Purchase Order</label>
                <div class="col-lg-4">
                    <select class="form-control input-focus" id="pms_purchaseorder" name="pms_purchaseorder" onchange="itemProduct();">
                        <option value="" disabled selected>Select Purchase Order ID</option>
                        <?php
                            $sql_po = "SELECT * FROM pms_purchaseorderheader";
                            $sql_po = mysqli_query($GLOBALS["___mysqli_ston"], $sql_po);
                            while ($row_s=mysqli_fetch_array($sql_po)) {
                            $po_number = $row_s['pms_po_number'];
                        ?>
                        <option value="<?php echo $po_number; ?>"><?php echo $po_number; ?></option>
                        <?php } ?>
                    </select>
                </div>
                </div>

                <div class="form-group" style="width: 850px; margin-top: 11px;">
                <label class="control-label col-lg-5" >Customer</label>
                <div class="col-lg-4">
                    <select class="form-control input-focus" id="pms_customer" name="pms_customer">
                        <option value="" disabled selected>Select Customer</option>
                        <?php
                            $select_customer = "";
                            $sql_customer = "SELECT * FROM pms_customers";
                            $sql_c = mysqli_query($GLOBALS["___mysqli_ston"], $sql_customer);
                            while ($row_s=mysqli_fetch_array($sql_c)) {
                            $select_customer = $row_s['pms_fullname'];
                        ?>
                        <option value="<?php echo $select_customer; ?>"><?php echo $select_customer; ?></option>
                        <?php } ?>
                    </select>
                </div>
                </div>

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Operator Name</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control input-focus" id="pms_checkedby" name="pms_checkedby" 
                    value="<?php echo $pms_user; ?>" readonly>
                </div>
                </div>

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Delivery Receipt </label>
                <div class="col-lg-4">
                    <input type="text" class="form-control input-focus" id="pms_deliveryreceipt" name="pms_deliveryreceipt" 
                    value="PMSDR<?php echo randomNum(); ?>" readonly>
                </div>
                </div>
                

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Check Number</label>
                <div class="col-lg-4">
                    <input type="number" class="form-control input-focus" id="pms_checkno" name="pms_checkno" placeholder="--------" readonly> 
                </div>
                </div>

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Check Date</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control input-focus" id="pms_checkdate" name="pms_checkdate" placeholder="--------" readonly>
                </div>
                </div>


                <div style="margin-left: 350px; margin-top: -495px;">

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Bank Name</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control input-focus" id="pms_bankname" name="pms_bankname" placeholder="--------" readonly>
                </div>
                </div>

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Bank Account Number</label>
                <div class="col-lg-4">
                    <input type="number" class="form-control input-focus" id="pms_bankaccountno" name="pms_bankaccountno" placeholder="--------" readonly>
                </div>
                </div>

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Bank Account Name</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control input-focus" id="pms_bankaccountname" name="pms_bankaccountname" placeholder="--------" readonly>
                </div>
                </div>

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Remarks</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control input-focus" id="pms_remarks" name="pms_remarks" placeholder="--------" readonly>
                </div>
                </div>

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Due Date</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control input-focus" id="pms_duedate" name="pms_duedate" placeholder="--------" readonly>
                </div>
                </div>

                </div>

            <div style="text-align: center; margin-top: 120px;">
                <button type="submit" style="border-radius: 20px;" class="btn btn-lg btn-success">Save</button>&nbsp;&nbsp;
                <button type="button" style="border-radius: 20px;" class="btn btn-lg btn-danger" onclick="document.getElementById('salesOrderHeaderModal').style.display='none'" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
            </div>
        </div>
    </div>
</div>
</form>

<!-- To be Continued... -->
<form method="POST">
<div id="salesOrderDetailModal" class="w3-modal">
    <div class="w3-modal-content" style="width: 370px; height: 425px; margin-top: 10px; margin-left: 470px;">
        <div class="w3-container"style="">
            <br>
            <center>
              <h4 class="modal-title"><span id="salesOrderDetailModalTitle"></span></h4>
            </center>
        <span onclick="document.getElementById('salesOrderDetailModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

        <input type="hidden" name="inputstatus2" id="inputstatus2">
        <input type="hidden" name="inputkey2" id="inputkey2">

            <div class="modal-body" >
            <br>

                <div class="form-group" style="width: 850px;">
                <div class="col-lg-4">
                    <input type="hidden" class="form-control input-focus" id="pms_salesorder" name="pms_salesorder">
                </div>
                </div>

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Finish Product</label>
                <div class="col-lg-4">
                    <select class="form-control input-focus" id="pms_rm_sku" name="pms_rm_sku">
                        <option value="" disabled selected>Select Finish Product</option>
                        <?php
                            $sql_raw_material = "SELECT * FROM pms_rawmaterials WHERE pms_finishedproduct = 1";
                            $sql_rm = mysqli_query($GLOBALS["___mysqli_ston"], $sql_raw_material);
                            while ($row_rm=mysqli_fetch_array($sql_rm)) {
                            $pms_raw_material_id = $row_rm['pms_id'];
                            $pms_raw_material_item = $row_rm['pms_item'];
                            $pms_raw_material_quantity = $row_rm['pms_qty'];
                            $pms_raw_material_cost = $row_rm['pms_cost'];

                            $str = $pms_raw_material_id . "~" . $pms_raw_material_cost 
                            . "~" . $pms_raw_material_quantity;
                        ?>
                        <option value="<?php echo $str; ?>"><?php echo $pms_raw_material_item; ?></option>
                        <?php } ?>
                    </select>
                </div>
                </div>

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Quantity</label>
                <div class="col-lg-4">
                    <input type="number" class="form-control input-focus" id="pms_qty" name="pms_qty" placeholder="Enter Quantity" required autofocus>
                    <label style="color: green;"> <span id="remainingQuantity"> </span> </label>
                </div>
                </div>

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Price</label>
                <div class="col-lg-4">
                    <input type="number" class="form-control input-focus" id="pms_price" name="pms_price" placeholder="00.00" readonly>
                </div>
                </div>

            </div>

            <div style="text-align: center;">
                <button type="submit" style="border-radius: 20px;" class="btn btn-lg btn-success">Save</button>&nbsp;&nbsp;
                <button type="button" style="border-radius: 20px;" class="btn btn-lg btn-danger" onclick="document.getElementById('salesOrderDetailModal').style.display='none'" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
            </div>
        </div>
    </div>
</div>
</form>

<form method="POST">
<div id="deleteSalesOrderDetailListModal" class="w3-modal">
    <div class="w3-modal-content" style="width: 700px; margin-left: 350px; margin-top: 110px;">
        <div class="w3-container">
        <span onclick="document.getElementById('deleteSalesOrderDetailListModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

        <input type="hidden" name="deletestatus_detail" id="deletestatus_detail">
        <input type="hidden" name="deletekey_detail" id="deletekey_detail">
            <center><br>
            <h2>Do you want to Delete?</h2><br>

            <button type="submit" style="border-radius: 20px;" class="btn btn-success">Yes</button>&nbsp;&nbsp;
            <button type="button" style="border-radius: 20px;" class="btn btn-danger" onclick="document.getElementById('deleteSalesOrderDetailListModal').style.display='none'">No</button><br><br><br>
            </center>

        </div>
    </div>
</div>
</form>

<form method="POST">
<div id="deleteBtnSalesOrderHeaderListModal" class="w3-modal">
    <div class="w3-modal-content" style="width: 700px; margin-left: 350px; margin-top: 110px;">
        <div class="w3-container">
        <span onclick="document.getElementById('deleteBtnSalesOrderHeaderListModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

        <input type="hidden" name="deletestatus" id="deletestatus">
        <input type="hidden" name="deletekey" id="deletekey">
            <center><br>
            <h2>Do you want to Delete?</h2><br>

            <button type="submit" style="border-radius: 20px;" class="btn btn-success">Yes</button>&nbsp;&nbsp;
            <button type="button" style="border-radius: 20px;" class="btn btn-danger" onclick="document.getElementById('deleteBtnSalesOrderHeaderListModal').style.display='none'">No</button><br><br><br>
            </center>

        </div>
    </div>
</div>
</form>

<form method="POST">
<div id="postedSalesOrderModal" class="w3-modal">
    <div class="w3-modal-content" style="width: 700px; margin-left: 350px; margin-top: 110px;">
        <div class="w3-container">
        <span onclick="document.getElementById('postedSalesOrderModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

        <input type="hidden" name="inputstatus_sales_order" id="inputstatus_sales_order">
        <input type="hidden" name="inputkey_posted_sales_order" id="inputkey_posted_sales_order">
            <center><br>
            <h2>Do you want to post this SALES ORDER?</h2><br>
            <h2>Note: Once you post this SALES ORDER you cannot post it.</h2> <br>
            <button type="submit" id="postedAssembleYes" style="border-radius: 20px;" class="btn btn-success">Yes</button>&nbsp;&nbsp;
            <button type="button" style="border-radius: 20px;" class="btn btn-danger" onclick="document.getElementById('postedSalesOrderModal').style.display='none'">No</button><br><br><br>
            </center>

        </div>
    </div>
</div>
</form>

<div id="SalesOrderListModal" class="w3-modal">
  <div class="w3-modal-content" style="margin-top: -70px; margin-left: 100px; width: 1300px;">
    <div class="w3-container">

      <br>
      <center>
      <h4 class="modal-title"><span id="SalesOrderListModaltitle"></span></h4>
      </center>

      <br><br>
      <span onclick="document.getElementById('SalesOrderListModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

    <h4 class="card-title">Save As</h4>
      <table id="DataTableAssembleList"
             class="display nowrap table table-hover table-striped table-bordered"
             cellspacing="0" >
                <thead>
                    <tr>
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">Purchase Order #</th>
                        <th style="text-align: center;">Customer</th>
                        <th style="text-align: center;">Operator Name</th>
                        <th style="text-align: center;">Delivery Receipt</th>
                        <th style="text-align: center;">Due Date</th>
                        <th style="text-align: center;">Date/Time Created</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>

                <tbody>

                  <?php

                  $sql_query_header_list = "SELECT * FROM pms_salesorderheader";
                  $sql = mysqli_query($GLOBALS["___mysqli_ston"], $sql_query_header_list);
                  $header_count = 0;
                  while ($row=mysqli_fetch_array($sql)) {
                  $dp_pms_posted = $row['pms_posted'];
                  $header_count++;
                  ?>
                        <tr>

                        <td style="color: #000; text-align: center;"><?php echo $header_count;?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_purchaseorder'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_customer'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_checkedby'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_deliveryreceipt'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_duedate'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_date'];?></td>

                        <td style="color: #000; text-align: center;">
                          <button onclick="viewSalesOrderHeader('<?php echo $row['pms_id'] ; ?>',
                                                                '<?php echo $row['pms_duedate'] ?>',
                                                                '<?php echo $row['pms_deliveryreceipt'] ?>',
                                                                '<?php echo $row['pms_purchaseorder'] ?>',
                                                                '<?php echo $row['pms_customer'] ?>',
                                                                '<?php echo $row['pms_checkedby'] ?>',
                                                                '<?php echo $row['pms_total'] ?>',
                                                                '<?php echo $row['pms_checkno'] ?>',
                                                                '<?php echo $row['pms_checkdate'] ?>',
                                                                '<?php echo $row['pms_bankname'] ?>',
                                                                '<?php echo $row['pms_bankaccountno'] ?>',
                                                                '<?php echo $row['pms_bankaccountname'] ?>',
                                                                '<?php echo $row['pms_remarks'] ?>');"
                                    href="#salesOrderHeaderModal<?php echo $row['pms_id'];?>"
                                    data-target="#salesOrderHeaderModal"
                                    style="color: #ffffff; background-color: #a53cd8;"
                                    class="btn btn-primary"><i class="icon-eye icon-large"> View</i></button>&nbsp;

                        <?php
                        if ($dp_pms_posted != "1"){
                            echo '<button
                                   onclick="deleteSOM('. $row['pms_id'] . ');"
                                   class="btn"
                                   id="deleteSOMBtn"
                                   href="#deleteBtnSalesOrderHeaderListModal"
                                   data-target="#deleteBtnSalesOrderHeaderListModal"
                                   style="color:#fff;
                                   background-color: #ba1307; color: #ffffff;">
                                   <i class="icon-trash icon-large"></i> Delete</button>' ;
                        }
                        ?>

                        </td>

                        </tr>
                                    <?php } ?>
            </tbody>
        </table>

        <br> <br> <br>
        <center>
        <button
                    id="closemodal"
                    onclick="closeWindow()"
                    class="btn btn-primary"
                    style="color:#fff;"
        > Close
        </button>
        </center>
        <br> <br>
        <!-- onclick="document.getElementById('deleteModal').style.display='none'" -->


        <!-- document.getElementById(id+"Button").onclick = function() { HideError(id); } -->


    </div>
  </div>
</div>

            <!-- footer -->
            <!-- <footer class="footer" style=""> © 2018 All rights reserved. Inventory and Distribution Management System</footer> -->
            <!-- End footer -->

<script src="js/jquery.min.2.1.js"></script>

<script type="text/javascript">

    $('#pms_rm_sku').on('change', function(){
        var x = $('#pms_rm_sku').val() ;
        var y = x.split("~") ;
        var z1 = y[0] ;
        var z2 = y[1] ;
        var z3 = y[2] ;
        // alert(z1);
        // $('#pms_sku_tmp').val(z1) ;
        // $('#pms_price').val(z2) ;
        $("#pms_price").val(z2) ;
        $("#remainingQuantity").html("Remaining Quantity: " + z3) ;
        // $('#pms_unitprice').val(z3) ;
    });

    document.getElementById("saveSalesOrderBtn").style.visibility = "hidden";
    document.getElementById("cancelSalesOrderBtn").style.visibility = "hidden";


function itemProduct() {
    var selectBox = document.getElementById("pms_purchaseorder");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    // $("#pms_item").empty();
    FetchSupplier(selectedValue);
}


function FetchSupplier(name) {

    $(document).ready(function(){	
        $.ajax({
            url: 'http://localhost/PMS/8080/pms_get_purchase_order.php?name=' + name,
            dataType: 'jsonp',
            jsonp: 'pms',
            timeout: 5000,
            success: function(data, status){
                $.each(data, function(i,item){ 
                    if (item.pms_id==undefined){

                    } 
                    else {
                        var po_pms_id = item.pms_id ;
                        var po_pms_checkno = item.pms_checkno ;
                        var po_pms_checkdate = item.pms_checkdate ;
                        var po_pms_bankname = item.pms_bankname ;
                        var po_pms_bankaccountno = item.pms_bankaccountno ;
                        var po_pms_bankaccountname = item.pms_bankaccountname ;
                        var po_pms_remarks = item.pms_remarks ;
                        var po_pms_duedate = item.pms_duedate ;

                        $("#pms_checkno").val(po_pms_checkno);
                        $("#pms_checkdate").val(po_pms_checkdate);
                        $("#pms_bankname").val(po_pms_bankname);
                        $("#pms_bankaccountno").val(po_pms_bankaccountno);
                        $("#pms_bankaccountname").val(po_pms_bankaccountname);
                        $("#pms_remarks").val(po_pms_remarks);
                        $("#pms_duedate").val(po_pms_duedate);
                        
                      }                  
                });
            },
            error: function(){
                alert("Connection Problem!") ;
            } 
        });
    });    
}


    function printSalesOrder(pso_key){
        location.href = 'http://localhost/PMS/8080/pms_sales_order_reports_print2.php?pms_hid=' + pso_key ;
    };

    function postedSalesOrder(p_key)
    {
    document.getElementById('postedSalesOrderModal').style.display='block';
    $("#inputstatus_sales_order").val("psom") ;
    $("#inputkey_posted_sales_order").val(p_key) ;
    };

    function closeWindow()
    {
    document.getElementById("SalesOrderListModal").style.display="none";
    document.getElementById("saveSalesOrderBtn").style.visibility = "visible";
    document.getElementById("cancelSalesOrderBtn").style.visibility = "visible";
    };

    function listPurchaseOrder()
    {
    document.getElementById('SalesOrderListModal').style.display='block';
    $("#SalesOrderListModaltitle").html("SALES ORDER LIST HEADER") ;
    };

    function addSalesOrderHeader()
    {
    document.getElementById('salesOrderHeaderModal').style.display='block';
    $("#salesOrderHeaderModalTitle").html("ADD SALES ORDER HEADER") ;
    $("#inputstatus").val("salesOrderHeaderAdd") ;

    // $("#pms_duedate").val("") ;
    // $("#pms_purchaseorder").val("") ;
    // $("#pms_customer").val("") ;
    // $("#pms_checkno").val("") ;
    // $("#pms_checkdate").val("") ;
    // $("#pms_bankname").val("") ;
    // $("#pms_bankaccountno").val("") ;
    // $("#pms_bankaccountname").val("") ;
    // $("#pms_remarks").val("") ;

    // $('#pms_checkno').prop('disabled', true);
    // $('#pms_checkdate').prop('disabled', true);
    // $('#pms_bankname').prop('disabled', true);
    // $('#pms_bankaccountno').prop('disabled', true);
    // $('#pms_bankaccountname').prop('disabled', true);
    // $('#pms_remarks').prop('disabled', true);
    // $('#pms_duedate').prop('disabled', true);

    };

    function addSalesOrderDetail(a_key)
    {
    document.getElementById('salesOrderDetailModal').style.display='block';
    $("#salesOrderDetailModalTitle").html("ADD SALES ORDER DETAIL") ;
    $("#inputstatus2").val("salesOrderDetailAdd") ;
    $("#inputkey2").val(a_key) ;
    $("#pms_salesorder").val(a_key) ;
    $("#pms_rm_sku").val("") ;
    // $("#pms_qty").val("") ;
    // $("#pms_price").val("") ;
    };

    function editSOH(e_key,e_duedate,e_deliveryreceipt,e_purchaseorder,e_customer,
                     e_checkedby,e_checkno,e_checkdate,e_bankname,e_bankaccountno,e_bankaccountname,e_remarks)
    {

    document.getElementById('salesOrderHeaderModal').style.display='block';
    $("#salesOrderHeaderModalTitle").html("EDIT SALES ORDER HEADER") ;
    $("#inputstatus").val("easoh") ;
    $("#inputkey").val(e_key) ;
    $("#pms_duedate").val(e_duedate) ;
    $("#pms_deliveryreceipt").val(e_deliveryreceipt) ;
    $("#pms_purchaseorder").val(e_purchaseorder) ;
    $("#pms_customer").val(e_customer) ;
    $("#pms_checkedby").val(e_checkedby) ;
    $("#pms_checkno").val(e_checkno) ;
    $("#pms_checkdate").val(e_checkdate) ;
    $("#pms_bankname").val(e_bankname) ;
    $("#pms_bankaccountno").val(e_bankaccountno) ;
    $("#pms_bankaccountname").val(e_bankaccountname) ;
    $("#pms_remarks").val(e_remarks) ;
    };

    function editSOD(ed_key,ed_salesorder,ed_rm_sku,ed_qty,ed_price)
    {
    document.getElementById('salesOrderDetailModal').style.display='block';
    $("#salesOrderDetailModalTitle").html("EDIT SALES ORDER DETAIL") ;
    $("#inputstatus2").val("easod") ;
    $("#inputkey2").val(ed_key) ;
    $("#pms_salesorder").val(ed_salesorder) ;
    $("#pms_rm_sku").val(ed_rm_sku) ;
    $("#pms_qty").val(ed_qty) ;
    $("#pms_price").val(ed_price) ;
    };

    function viewSalesOrderHeader(key,duedate,deliveryreceipt,purchaseorder,customer,
                                  total,checkno,checkdate,bankname,bankaccountno,bankaccountname,remarks)
    {
    // document.getElementById("SalesOrderListModal").style.display="none";
    // document.getElementById('salesOrderHeaderModal').style.display='block';

    // $("#salesOrderHeaderModalTitle").html("EDIT SALES ORDER HEADER") ;
    // $("#inputkey").val(key) ;
    // $("#pms_duedate").val(duedate) ;
    // $("#pms_deliveryreceipt").val(deliveryreceipt) ;
    // $("#pms_purchaseorder").val(purchaseorder) ;
    // $("#pms_customer").val(customer) ;
    // $("#pms_checkedby").val(checkedby) ;
    // $("#pms_total").val(total) ;
    // $("#pms_checkno").val(checkno) ;
    // $("#pms_checkdate").val(checkdate) ;
    // $("#pms_bankname").val(bankname) ;
    // $("#pms_bankaccountno").val(bankaccountno) ;
    // $("#pms_bankaccountname").val(bankaccountname) ;
    // $("#pms_remarks").val(remarks) ;

    document.getElementById('salesOrderHeaderModal').style.display='none';
    document.getElementById("addBtnSalesOrderHeader").style.visibility = "hidden";
    window.location.href = "http://localhost/PMS/8080/pms_sales_order.php?id="+key;
    };

    function deleteSOM(key)
    {
    document.getElementById("SalesOrderListModal").style.display="none";
    document.getElementById('deleteBtnSalesOrderHeaderListModal').style.display='block';
    $("#deletestatus").val("salesOrderListDelete") ;
    $("#deletekey").val(key) ;
    };

    function deleteSODM(key)
    {
    document.getElementById('deleteSalesOrderDetailListModal').style.display='block';
    $("#deletestatus_detail").val("salesOrderDetailListDelete") ;
    $("#deletekey_detail").val(key) ;
    };

</script>

<!-- <script src="js/lib/jquery/jquery.min.js"></script> -->
<script src="js/lib/bootstrap/js/popper.min.js"></script>
<script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/sidebarmenu.js"></script>
<script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="js/custom.min.js"></script>
<script src="js/lib/datatables/datatables.min.js"></script>
<script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script src="js/lib/datatables/datatables-init.js"></script>

</body>

</html>
