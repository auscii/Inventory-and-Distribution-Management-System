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



if (isset($_POST["pms_sku_tmp"])) {
  $pms_sku_tmp = $_POST['pms_sku_tmp'];
 } else {
  $pms_sku_tmp = "";
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

if (isset($_POST["inputkey_posted_job_order"])) {
    $key_posted_job_order = $_POST['inputkey_posted_job_order'];
} else {
    $key_posted_job_order = "";
}

if (isset($_POST["inputstatus_job_order"])) {
  $pms_mode_posted_job_order = $_POST['inputstatus_job_order'];
 } else {
  $pms_mode_posted_job_order = "";
}



// pms_joborderheader
// if (isset($_POST["pms_purchaseorder"])) {
//     $pms_purchaseorder = $_POST['pms_purchaseorder'];
// } else {
//     $pms_purchaseorder = "";
// }

if (isset($_POST["pms_customer"])) {
    $pms_customer = $_POST['pms_customer'];
} else {
    $pms_customer = "";
}

if (isset($_POST["pms_deliverydate"])) {
    $pms_deliverydate = $_POST['pms_deliverydate'];
} else {
    $pms_deliverydate = "";
}

// if (isset($_POST["pms_cancellationdate"])) {
//     $pms_cancellationdate = $_POST['pms_cancellationdate'];
// } else {
//     $pms_cancellationdate = "";
// }

if (isset($_POST["pms_remarks"])) {
    $pms_remarks = $_POST['pms_remarks'];
} else {
    $pms_remarks = "";
}

// if (isset($_POST["pms_job_description"])) {
//     $pms_job_description = $_POST['pms_job_description'];
// } else {
//     $pms_job_description = "";
// }



if (isset($_POST["pms_jo_no"])) {
    $pms_jo_no = $_POST['pms_jo_no'];
} else {
    $pms_jo_no = "";
}

if (isset($_POST["pms_joborder_qty"])) {
    $pms_joborder_qty = $_POST['pms_joborder_qty'];
} else {
    $pms_joborder_qty = "";
}



// pms_joborderdetails
if (isset($_POST["pms_joborder"])) {
    $pms_joborder = $_POST['pms_joborder'];
} else {
    $pms_joborder = "";
}

if (isset($_POST["pms_rm_sku"])) {
    $pms_rm_sku = $_POST['pms_rm_sku'];
} else {
    $pms_rm_sku = "";
}

if (isset($_POST["pms_orderqty"])) {
    $pms_orderqty = $_POST['pms_orderqty'];
} else {
    $pms_orderqty = "";
}

if (isset($_POST["pms_unit"])) {
    $pms_unit = $_POST['pms_unit'];
} else {
    $pms_unit = "";
}

if (isset($_POST["pms_description"])) {
    $pms_description = $_POST['pms_description'];
} else {
    $pms_description = "";
}

if (isset($_POST["pms_unitprice"])) {
    $pms_unitprice = $_POST['pms_unitprice'];
} else {
    $pms_unitprice = "";
}

if (isset($_POST["pms_operator_name"])) {
    $pms_operator_name = $_POST['pms_operator_name'];
} else {
    $pms_operator_name = "";
}

if (isset($_POST["pms_joborder_prod_item"])) {
    $pms_joborder_prod_item = $_POST['pms_joborder_prod_item'];
} else {
    $pms_joborder_prod_item = "";
}



if ($pms_mode=="jobOrderHeaderAdd") {
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
    pms_joborderheader
    (
    pms_jo_no,
    pms_operator_name,
    pms_customer,
    pms_deliverydate,
    pms_total,
    pms_remarks,
    pms_joborder_qty,
    pms_joborder_prod_item
    )
    VALUES
    (
    '$pms_jo_no',
    '$pms_operator_name',
    '$pms_customer',
    '$pms_deliverydate',
    '0',
    '$pms_remarks',
    '$pms_joborder_qty',
    '$pms_joborder_prod_item'
    )");
}

if ($pms_mode2=="jobOrderDetailAdd") {
    // echo "oye";
    // exit();
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
    pms_joborderdetails
    (
    pms_joborder,
    pms_rm_sku,
    pms_orderqty,
    pms_unit,
    pms_unitprice
    )
    VALUES
    (
    '$pms_joborder',
    '$pms_rm_sku',
    '$pms_orderqty',
    '$pms_unit',
    '$pms_unitprice'
    )");
  }

if ($pms_mode=="eajoh") {
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
    "UPDATE pms_joborderheader
     SET pms_customer='$pms_customer',
         pms_deliverydate='$pms_deliverydate',
         pms_remarks = '$pms_remarks',
         pms_joborder_qty = '$pms_joborder_qty',
         pms_joborder_prod_item = '$pms_joborder_prod_item'
    WHERE pms_id = $key");
}

if ($pms_mode2=="eajod") {
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
  "UPDATE pms_joborderdetails
    SET pms_joborder='$pms_joborder',
        pms_rm_sku='$pms_rm_sku',
        pms_orderqty='$pms_orderqty',
        pms_unit='$pms_unit',
        pms_unitprice='$pms_unitprice'
    WHERE pms_id = $key2");
}

if ($pms_deletemode=="jobOrderListDelete") {
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
  $con=mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM pms_joborderheader WHERE pms_id = $deletekey");
  $con=mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM pms_joborderdetails WHERE pms_joborder = $deletekey");
}

if ($pms_deletemode_detail=="jobOrderDetailListDelete") {
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
  $con=mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM pms_joborderdetails WHERE pms_id = $deletekey_detail");
}

// pms_joborderheader
$dp_pms_id = "";
$dp_pms_date = "";
// $dp_pms_purchaseorder = "";
$dp_pms_customer = "";
$dp_pms_deliverydate = "";
$dp_pms_total_header = "";
$dp_pms_remarks = "";
$dp_pms_joborder_qty = "";
$dp_pms_operator_name = "";
$dp_pms_jo_no = "";
$dp_pms_joborder_prod_item = "";

$title_pms_id = "";
$title_pms_date = "";
// $title_pms_purchaseorder = "";
$title_pms_customer = "";
$title_pms_deliverydate = "";
$title_pms_total_header = "";
$title_pms_remarks = "";
$title_pms_joborder_qty = "";
$title_pms_operator_name = "";
$title_pms_jo_no = "";
$title_pms_joborder_prod_item = "";

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
    <title>Job Order| Inventory and Distribution Management System</title>
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
                    <h3 class="text-primary">Job Order</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Transaction</a></li>
                        <li class="breadcrumb-item active">Job Order</li>
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
                    onclick="listJobOrder();"
                    class="btn"
                    href="#JobOrderListModal"
                    data-target="#JobOrderListModal"
                    style="color:#FFF; background-color: #a53cd8"
                    >
                    <i class="fa fa-list"></i> JOB ORDER LIST
                    </button> &nbsp;&nbsp;

                    <button
                    onclick="addJobOrderHeader();"
                    class="btn btn-primary"
                    href="#jobOrderHeaderModal"
                    data-target="#jobOrderHeaderModal"
                    id="addBtnJobOrderHeader"
                    style="color:#fff;"
                    >
                    <i class="fa fa-plus"></i> ADD NEW JOB ORDER 
                    <!-- (HEADER) -->
                    </button>

                    <?php
                    $sql = mysqli_query($GLOBALS["___mysqli_ston"], 
                    "SELECT * FROM pms_joborderheader");
                    $count_entry = mysqli_num_rows($sql);
                    echo "<p class='text-primary' style='position:absolute; right:10px; top:30px;'>Total Number of Job Order(s): $count_entry</p>"; 
                    ?>

                  </div>

        <?php
        $sql_query_header =
        "SELECT t1.pms_id AS pms_hid, t1.pms_date, t1.pms_customer, t1.pms_deliverydate,
                t1.pms_total, t1.pms_remarks, t1.pms_joborder_qty, t1.pms_operator_name, t1.pms_jo_no, t1.pms_joborder_prod_item,
                t2.pms_id AS pms_cid, t2.pms_fullname
        FROM pms_joborderheader AS t1
        INNER JOIN pms_customers AS t2
        ON t1.pms_customer = t2.pms_fullname
        WHERE t1.pms_id = '$id'";

        $sql2 = mysqli_query($GLOBALS["___mysqli_ston"], $sql_query_header);
        while ($row_header=mysqli_fetch_array($sql2)) {

            $dp_pms_id = $row_header['pms_hid'];
            $dp_pms_date = $row_header['pms_date'];
            $dp_pms_customer = $row_header['pms_customer'];
            $dp_pms_deliverydate = $row_header['pms_deliverydate'];
            $dp_pms_total_header = $row_header['pms_total'];
            $dp_pms_remarks = $row_header['pms_remarks'];
            $dp_pms_joborder_qty = $row_header['pms_joborder_qty'];
            $dp_pms_jo_no = $row_header['pms_jo_no'];
            $dp_pms_operator_name = $row_header['pms_operator_name'];
            $dp_pms_joborder_prod_item = $row_header['pms_joborder_prod_item'];

            $title_pms_id = "Job Order ID";
            $title_pms_date = "Date/Time Created";
            $title_pms_customer = "Customer";
            $title_pms_deliverydate = "Delivery Date";
            $title_pms_total_header = "Total Quantity";
            $title_pms_remarks = "Remarks";
            $title_pms_joborder_qty = "Job Order Quantity";
            $title_pms_jo_no = "JO #";
            $title_pms_operator_name = "Operator Name";
            $title_pms_joborder_prod_item = "Item / Product Name";



        ?>
        <div class="card-body" style="margin-top: -34px; margin-left: 550px;">
                    <button
                        onclick="editJOH('<?php echo $row_header['pms_hid'] ; ?>',
                                        '<?php echo $row_header['pms_customer'] ?>',
                                        '<?php echo $row_header['pms_deliverydate'] ?>',
                                        '<?php echo $row_header['pms_remarks'] ?>',
                                        '<?php echo $row_header['pms_joborder_qty'] ?>');"
                        class="btn"
                        href="#jobOrderHeaderModal"
                        data-target="#jobOrderHeaderModal"
                        style="color:#fff; background-color: #3bdb39;"
                    >
                    <i class="fa fa-pencil"></i> EDIT JOB ORDER (HEADER)
                    </button>
                    &nbsp; &nbsp;

                    <br> <br>
        </div>
        <form method="">

          <div class="form-group" style="width: 450px;">
            <label class="control-label col-lg-7" style="font-size: 20px; font-weight: bold;"><?php echo $title_pms_jo_no; ?></label>
            <div class="col-lg-9">
                <h4> <?php echo $dp_pms_jo_no; ?> </h4>
            </div>
          </div> <br>

          <div class="form-group" style="position: absolute; width: 350px; margin-top: -20px;">
            <label class="control-label col-lg-9" style="font-size: 20px; font-weight: bold;"><?php echo $title_pms_operator_name; ?></label>
            <div class="col-lg-9">
                <h4> <?php echo $dp_pms_operator_name; ?> </h4>
            </div>
          </div> <br>

          <div class="form-group" style="position: absolute; right: 0px; margin-top: -120px; width: 450px;">
            <label class="control-label col-lg-9" style="font-size: 20px; font-weight: bold;"><?php echo $title_pms_joborder_qty; ?></label>
            <div class="col-lg-9">
                <h4> <?php echo $dp_pms_joborder_qty; ?> </h4>
            </div>
          </div> <br>

          <div class="form-group" style="position: absolute; right: 0px; margin-top: -40px; width: 450px;">
            <label class="control-label col-lg-9" style="font-size: 20px; font-weight: bold;"><?php echo $title_pms_joborder_prod_item; ?></label>
            <div class="col-lg-9">
                <h4> <?php echo $dp_pms_joborder_prod_item; ?> </h4>
            </div>
          </div>
          


        </form><br><br>

        <div class="card-body" >
            <!-- <button
                        onclick="addJobOrderDetail('<?php //echo $row_header['pms_hid'] ; ?>');"
                        class="btn btn-primary"
                        href="#jobOrderDetailModal"
                        data-target="#jobOrderDetailModal"
                        style="color:#fff;"
                        >
                        <i class="fa fa-plus"></i> ADD NEW JOB ORDER (DETAIL)
            </button> &nbsp;&nbsp; -->

            <button
                    onclick="printJobOrder('<?php echo $row_header['pms_hid'] ; ?>');"
                    class="btn btn-primary"
                    style="color:#fff; background: #ba1307;"
                    >
                    <i class="fa fa-print"></i> PRINT JOB ORDER REPORT
           </button>

        </div>

        <?php } ?>

 <!-- 1st Table -->
        <h4 class="card-title">Save as</h4>
            <table id="DataTable1" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">Image</th>
                        <th style="text-align: center;">Raw Material Item</th>
                        <th style="text-align: center;">Order Quantity</th>
                        <th style="text-align: center;">Unit</th>
                        <th style="text-align: center;">Unit Price</th>
                        <th style="text-align: center;">Total</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>

                <tbody>

                  <?php

                    $sql_query_detail =
                   "SELECT t1.pms_id AS pms_hid, t1.pms_date, t1.pms_customer, t1.pms_deliverydate, t1.pms_remarks,
                           t1.pms_jo_no, t1.pms_operator_name, t1.pms_joborder_qty, t1.pms_joborder_prod_item,
                           t2.pms_id AS pms_did, t2.pms_reference_product_itemname, t2.pms_order_quantity, t2.pms_unit, t2.pms_typeunit, 
                           t2.pms_unit_price, t2.pms_image, t2.pms_product_item_name, FORMAT(t2.pms_order_quantity * t2.pms_unit_price, 2) AS pms_total
                    FROM pms_joborderheader AS t1
                    INNER JOIN pms_referenceproducts AS t2
                    ON t2.pms_product_item_name = t1.pms_joborder_prod_item
                    WHERE t1.pms_id = '$id'";
                    
                    $sql_po_d = mysqli_query($GLOBALS["___mysqli_ston"], $sql_query_detail);
                    $detail_count = 0;
                    while ($row=mysqli_fetch_array($sql_po_d)) {
                    // $dp_pms_posted = $row['pms_posted'];
                    $detail_count++;
                  ?>
                        <tr>

                        <td style="color: #000; text-align: center;"><?php echo $detail_count;?></td>

                        <td style="color: #000; text-align: center;">
                        <img style="width:80px;height:60px" src="images/uploadimage/<?php echo $row['pms_image'];?>">
                        </td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_reference_product_itemname'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_order_quantity'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_unit'] . " " . $row['pms_typeunit'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_unit_price'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_total'];?></td>

                        <td style="color: #000; text-align: center;">

                        <button onclick="editJOD('<?php echo $row['pms_did'] ; ?>',
                                                 '<?php echo $row['pms_joborder'] ?>',
                                                 '<?php echo $row['pms_rm_sku'] ?>',
                                                 '<?php echo $row['pms_orderqty'] ?>',
                                                 '<?php echo $row['pms_unit'] ?>',
                                                 '<?php echo $row['pms_unitprice'] ?>');"
                                    href="#jobOrderDetailModal"
                                    data-target="#jobOrderDetailModal"
                                    style="background-color: #3bdb39; color: #ffffff;"
                                    class="btn"><i class="icon-pencil icon-large"> Edit</i></button>
                        &nbsp;
                        <button
                                   onclick="deleteJODM('<?php echo $row['pms_did'] ; ?>');"
                                   class="btn"
                                   href="#deleteJobOrderDetailListModal"
                                   data-target="#deleteJobOrderDetailListModal"
                                   style="color:#fff;
                                   background-color: #ba1307; color: #ffffff;">
                                   <i class="icon-trash icon-large"></i> Delete</button>
                        </td>

                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
                        <br> <br> <br> <br>
                    <form method="">

                        <div class="form-group" style="width: 450px; margin-top: -50px;">
                            <label class="control-label col-lg-9" style="font-size: 20px; font-weight: bold;"><?php echo $title_pms_date; ?></label>
                            <div class="col-lg-9">
                                <h4> <?php echo $dp_pms_date; ?> </h4>
                            </div>
                        </div> <br>

                        <div class="form-group" style="width: 450px; margin-top: -20px;">
                            <label class="control-label col-lg-9" style="font-size: 20px; font-weight: bold;"><?php echo $title_pms_deliverydate; ?></label>
                            <div class="col-lg-9">
                                <h4> <?php echo $dp_pms_deliverydate; ?> </h4>
                            </div>
                        </div> <br>

                        <div class="form-group" style="position: absolute; right: 0px; margin-top: -170px; width: 450px;">
                            <label class="control-label col-lg-9" style="font-size: 20px; font-weight: bold;"><?php echo $title_pms_customer; ?></label>
                            <div class="col-lg-9">
                                <h4> <?php echo $dp_pms_customer; ?> </h4>
                            </div>
                        </div>

                        <div class="form-group" style="position: absolute; right: 0px; margin-top: -100px; width: 450px;">
                            <label class="control-label col-lg-7" style="font-size: 20px; font-weight: bold;"><?php echo $title_pms_remarks; ?></label>
                            <div class="col-lg-9">
                            <h4> <?php echo $dp_pms_remarks; ?> </h4>
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
<div id="jobOrderHeaderModal" class="w3-modal">
    <div class="w3-modal-content" style="width: 650px; height: 530px; margin-top: -40px; margin-left: 420px;">
        <div class="w3-container">
            <br>
            <center>
              <h4 class="modal-title"><span id="jobOrderHeaderModalTitle"></span></h4>
            </center>
        <span onclick="document.getElementById('jobOrderHeaderModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

        <input type="hidden" name="inputstatus" id="inputstatus">
        <input type="hidden" name="inputkey" id="inputkey">


            <div class="modal-body">
            <br><br>

                <!-- <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Purchase Order</label>
                <div class="col-lg-4">
                    <input type="number" class="form-control input-focus" id="pms_purchaseorder" name="pms_purchaseorder" placeholder="Enter Purchase Order" required autofocus>
                </div>
                </div> -->

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                    <label class="control-label col-lg-5" for="price">Job Order ID</label>
                    <div class="col-lg-4">
                    <?php
                    $seed = str_split('123456789');
                    shuffle($seed);
                    $rand = 'JO0';
                    foreach (array_rand($seed, 3) as $k) $rand .= $seed[$k];
                    ?>
                    <input type="text" class="form-control input-focus" id="pms_jo_no" name="pms_jo_no"
                            value="<?php echo $rand; ?>" readonly>
                    </div>
                </div>

                <div class="form-group" style="width: 850px; margin-top: -11px;">
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
                <label class="control-label col-lg-9" >Remarks</label>
                <div class="col-lg-4">
                <textarea class="form-control input-focus" style="height: 90px;" id="pms_remarks" name="pms_remarks" placeholder="Enter Remarks" required></textarea>
                </div>
                </div>

                <div style="margin-left: 300px; margin-top: -290px;">

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Operator Name</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control input-focus" id="pms_operator_name" name="pms_operator_name" value="<?php echo $pms_user; ?>" readonly>
                </div>
                </div>

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Item / Product Name</label>
                <div class="col-lg-4">
                    <select class="form-control input-focus" id='pms_joborder_prod_item' name="pms_joborder_prod_item" onchange="itemProduct();">
                        <option value="" disabled selected>Select Item / Product Name</option>
                        <?php
                            $sql_raw_material = "SELECT DISTINCT pms_suprod_itemname FROM pms_suppliers_product WHERE pms_suprod_finishproduct = 1 AND pms_suprod_status = 0";
                            $sql_rm = mysqli_query($GLOBALS["___mysqli_ston"], $sql_raw_material);
                            while ($row_rm=mysqli_fetch_array($sql_rm)) {
                            $pms_supplier_itemname = $row_rm['pms_suprod_itemname'];
                        ?>
                        <option value="<?php echo $pms_supplier_itemname; ?>"> <?php echo $pms_supplier_itemname; ?> </option>
                        <?php } ?>
                    </select>
                </div>
                </div>

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Job Order Quantity</label>
                <div class="col-lg-4">
                    <input type="number" class="form-control input-focus" id="pms_joborder_qty" name="pms_joborder_qty" placeholder="Enter Job Order Quantity" required autofocus>
                </div>
                </div>

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Delivery Date</label>
                <div class="col-lg-4">
                    <input type="date" class="form-control input-focus" id="pms_deliverydate" name="pms_deliverydate" required autofocus>
                </div>
                </div>

                <!-- <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-9" >Job Description</label>
                <div class="col-lg-4">
                <textarea class="form-control input-focus" style="height: 90px;" id="pms_job_description" name="pms_job_description" placeholder="Enter Job Description" required></textarea>
                </div>
                </div> -->

                <!-- <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Cancellation Date</label>
                <div class="col-lg-4">
                    <input type="date" class="form-control input-focus" id="pms_cancellationdate" name="pms_cancellationdate" required autofocus>
                </div>
                </div> -->

                </div>

                </div>

            <div style="text-align: center; margin-top: 30px;">
                <button type="submit" style="border-radius: 20px;" class="btn btn-lg btn-success">Save</button>&nbsp;&nbsp;
                <button type="button" style="border-radius: 20px;" class="btn btn-lg btn-danger" onclick="document.getElementById('jobOrderHeaderModal').style.display='none'" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
            </div>
        </div>
    </div>
</div>
</form>

<form method="POST">
<div id="jobOrderDetailModal" class="w3-modal">
    <div class="w3-modal-content" style="width: 370px; height: 490px; margin-top: -20px; margin-left: 540px;">
        <div class="w3-container"style="">
            <br>
            <center>
              <h4 class="modal-title"><span id="jobOrderDetailModalTitle"></span></h4>
            </center>
        <span onclick="document.getElementById('jobOrderDetailModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

        <input type="hidden" name="inputstatus2" id="inputstatus2">
        <input type="hidden" name="inputkey2" id="inputkey2">

            <div class="modal-body" >
            <br>

                <div class="form-group" style="width: 850px;">
                <div class="col-lg-4">
                    <input type="hidden" class="form-control input-focus" id="pms_joborder" name="pms_joborder">
                </div>
                </div> 

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Raw Material SKU</label>
                <div class="col-lg-4">
                    <select class="form-control input-focus" id="pms_rm_sku" name="pms_rm_sku">
                        <option value="" disabled selected>Select Raw Material SKU</option>
                        <?php
                            $sql_raw_material = "SELECT *  FROM pms_rawmaterials WHERE pms_finishedproduct = 0";
                            $sql_rm = mysqli_query($GLOBALS["___mysqli_ston"], $sql_raw_material);
                            while ($row_rm=mysqli_fetch_array($sql_rm)) {
                            $pms_raw_material_id = $row_rm['pms_id'];
                            $pms_raw_material_sku = $row_rm['pms_sku'];
                            $pms_raw_material_item = $row_rm['pms_item'];
                            $pms_raw_material_qty = $row_rm['pms_qty'];
                            $pms_raw_material_unit = $row_rm['pms_unit'];
                            $pms_raw_material_type_of_units = $row_rm['pms_type_of_units'];
                            $pms_raw_material_cost = $row_rm['pms_cost'];

                            $str = $pms_raw_material_id . "~" .
                                   $pms_raw_material_unit . " " . $pms_raw_material_type_of_units . "~" .
                                   $pms_raw_material_cost;
                        ?>
                        
                        <option value="<?php echo $str; ?>"> <?php echo $pms_raw_material_item; ?> </option>
                        <?php } ?>
                    </select>
                         
                </div>
                </div>

                <!-- <input type="hidden" name="pms_sku_tmp" id="pms_sku_tmp"> -->
                
                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5">Order Quantity </label>
                <div class="col-lg-4">
                    <input type="text" class="form-control input-focus" id="pms_orderqty" name="pms_orderqty"  placeholder="Order Quantity Value" required>
                </div>
                </div>

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Unit</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control input-focus" id="pms_unit" name="pms_unit" placeholder="Unit Value" readonly>
                </div>
                </div>

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Unit Price</label>
                <div class="col-lg-4">
                    <input type="number" class="form-control input-focus" id="pms_unitprice" name="pms_unitprice" placeholder="00.00" readonly>
                </div>
                </div>

            </div>

            <div style="text-align: center;">
                <button type="submit" style="border-radius: 20px;" class="btn btn-lg btn-success">Save</button>&nbsp;&nbsp;
                <button type="button" style="border-radius: 20px;" class="btn btn-lg btn-danger" onclick="document.getElementById('jobOrderDetailModal').style.display='none'" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
            </div>
        </div>
    </div>
</div>
</form>

<form method="POST">
<div id="deleteJobOrderDetailListModal" class="w3-modal">
    <div class="w3-modal-content" style="width: 700px; margin-left: 350px; margin-top: 110px;">
        <div class="w3-container">
        <span onclick="document.getElementById('deleteJobOrderDetailListModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

        <input type="hidden" name="deletestatus_detail" id="deletestatus_detail">
        <input type="hidden" name="deletekey_detail" id="deletekey_detail">
            <center><br>
            <h2>Do you want to Delete?</h2><br>

            <button type="submit" style="border-radius: 20px;" class="btn btn-success">Yes</button>&nbsp;&nbsp;
            <button type="button" style="border-radius: 20px;" class="btn btn-danger" onclick="document.getElementById('deleteJobOrderDetailListModal').style.display='none'">No</button><br><br><br>
            </center>

        </div>
    </div>
</div>
</form>

<form method="POST">
<div id="deleteBtnJobOrderHeaderListModal" class="w3-modal">
    <div class="w3-modal-content" style="width: 700px; margin-left: 350px; margin-top: 110px;">
        <div class="w3-container">
        <span onclick="document.getElementById('deleteBtnJobOrderHeaderListModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

        <input type="hidden" name="deletestatus" id="deletestatus">
        <input type="hidden" name="deletekey" id="deletekey">
            <center><br>
            <h2>Do you want to Delete?</h2><br>

            <button type="submit" style="border-radius: 20px;" class="btn btn-success">Yes</button>&nbsp;&nbsp;
            <button type="button" style="border-radius: 20px;" class="btn btn-danger" onclick="document.getElementById('deleteBtnJobOrderHeaderListModal').style.display='none'">No</button><br><br><br>
            </center>

        </div>
    </div>
</div>
</form>

<div id="JobOrderListModal" class="w3-modal">
  <div class="w3-modal-content" style="margin-top: -40px; margin-left: 100px; width: 1300px;">
    <div class="w3-container">

      <br>
      <center>
      <h4 class="modal-title"><span id="JobOrderListModaltitle"></span></h4>
      </center>

      <br><br>
      <span onclick="document.getElementById('JobOrderListModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

    <h4 class="card-title">Save as</h4>
      <table id="DataTableAssembleList"
             class="display nowrap table table-hover table-striped table-bordered"
             cellspacing="0" >
                <thead>
                    <tr>
                        <th style="text-align: center;">JO #</th>
                        <th style="text-align: center;">Operator Name</th>
                        <th style="text-align: center;">Customer</th>
                        <th style="text-align: center;">Item / Product Name</th>
                        <th style="text-align: center;">Job Order Quantity</th>
                        <th style="text-align: center;">Date/Time Created</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>

                <tbody>

                  <?php

                  $sql_query_header_list = "SELECT * FROM pms_joborderheader";

                  $sql = mysqli_query($GLOBALS["___mysqli_ston"], $sql_query_header_list);
                  $header_count = 0;
                  while ($row=mysqli_fetch_array($sql)) {
                  $header_count++;
                  ?>
                        <tr>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_jo_no'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_operator_name'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_customer'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_joborder_prod_item'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_joborder_qty'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_date'];?></td>

                        <td style="color: #000; text-align: center;">
                          <button onclick="viewJobOrderHeader('<?php echo $row['pms_id'] ; ?>',
                                                                '<?php echo $row['pms_customer'] ?>',
                                                                '<?php echo $row['pms_deliverydate'] ?>');"
                                    href="#jobOrderHeaderModal<?php echo $row['pms_id'];?>"
                                    data-target="#jobOrderHeaderModal"
                                    style="color: #ffffff; background-color: #a53cd8;"
                                    class="btn btn-primary"><i class="icon-eye icon-large"> View</i></button>&nbsp;

                            <button
                                   onclick="deleteJOM('<?php echo $row['pms_id'] ?>');"
                                   class="btn"
                                   id="deleteSOMBtn"
                                   href="#deleteBtnSalesOrderHeaderListModal"
                                   data-target="#deleteBtnSalesOrderHeaderListModal"
                                   style="color:#fff;
                                   background-color: #ba1307; color: #ffffff;">
                                   <i class="icon-trash icon-large"></i> Delete</button>


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
        $('#pms_unit').val(z2) ;
        $('#pms_unitprice').val(z3) ;
        // alert(z3);
    })

    document.getElementById("saveJobOrderBtn").style.visibility = "hidden";
    document.getElementById("cancelJobOrderBtn").style.visibility = "hidden";

    function printJobOrder(pso_key){
        location.href = 'http://localhost/PMS/8080/pms_job_order_reports_print2.php?pms_hid=' + pso_key ;
    };

    function postedJobOrder(p_key){
        document.getElementById('postedJobOrderModal').style.display='block';
            $("#inputstatus_job_order").val("pjom") ;
            $("#inputkey_posted_job_order").val(p_key) ;
    };

    function closeWindow(){
        document.getElementById("JobOrderListModal").style.display="none";
        document.getElementById("saveJobOrderBtn").style.visibility = "visible";
        document.getElementById("cancelJobOrderBtn").style.visibility = "visible";
    };

    function listJobOrder()
    {
      document.getElementById('JobOrderListModal').style.display='block';

          $("#JobOrderListModaltitle").html("JOB ORDER LIST") ;
        //   $("#inputstatus").val("addsupplier") ;
        //   $("#pms_fullname").val("") ;

    };

    function addJobOrderHeader()
    {
          document.getElementById('jobOrderHeaderModal').style.display='block';
          $("#jobOrderHeaderModalTitle").html("ADD NEW JOB ORDER") ;
          $("#inputstatus").val("jobOrderHeaderAdd") ;

        //   $("#pms_purchaseorder").val("") ;
          $("#pms_customer").val("") ;
          $("#pms_deliverydate").val("") ;
          // $("#pms_cancellationdate").val("") ;
          $("#pms_remarks").val("") ;
        //   $("#pms_job_description").val("") ;
    };

    function addJobOrderDetail(a_key)
    {
          document.getElementById('jobOrderDetailModal').style.display='block';
          $("#jobOrderDetailModalTitle").html("ADD JOB ORDER DETAIL") ;
          $("#inputstatus2").val("jobOrderDetailAdd") ;
          $("#inputkey2").val(a_key) ;
          $("#pms_joborder").val(a_key) ;
        //   $("#pms_rm_sku").val("") ;
        //   $("#pms_orderqty").val("") ;
        //   $("#pms_unit").val("") ;
        //   $("#pms_unitprice").val("") ;
    };

    function editJOH(e_key, e_customer, e_deliverydate, e_pms_remarks, e_pms_joborder_qty){

    document.getElementById('jobOrderHeaderModal').style.display='block';
    $("#jobOrderHeaderModalTitle").html("EDIT JOB ORDER HEADER") ;
    $("#inputstatus").val("eajoh") ;
    $("#inputkey").val(e_key) ;
    // $("#pms_purchaseorder").val(e_purchaseorder) ;
    $("#pms_customer").val(e_customer) ;
    $("#pms_deliverydate").val(e_deliverydate) ;
    $("#pms_remarks").val(e_pms_remarks) ;
    // $("#pms_job_description").val(e_pms_job_description) ;
    $("#pms_joborder_qty").val(e_pms_joborder_qty) ;

    };

    function editJOD(ed_key, ed_joborder, ed_rm_sku, ed_orderqty, ed_unit, ed_unitprice){
    document.getElementById('jobOrderDetailModal').style.display='block';

    $("#jobOrderDetailModalTitle").html("EDIT JOB ORDER DETAIL") ;
    $("#inputstatus2").val("eajod") ;
    $("#inputkey2").val(ed_key) ;
    $("#pms_joborder").val(ed_joborder) ;
    $("#pms_rm_sku").val(ed_rm_sku) ;
    $("#pms_orderqty").val(ed_orderqty) ;
    $("#pms_unit").val(ed_unit) ;
    // $("#pms_description").val(ed_description) ;
    $("#pms_unitprice").val(ed_unitprice) ;
    };

    function viewJobOrderHeader(key, customer, deliverydate)
    {
          document.getElementById("JobOrderListModal").style.display="none";
          document.getElementById('jobOrderHeaderModal').style.display='block';

          $("#jobOrderHeaderModalTitle").html("EDIT JOB ORDER HEADER") ;
        //   $("#inputstatus").val("editPurchaseOrderHeader") ;
          $("#inputkey").val(key) ;
        //   $("#pms_purchaseorder").val(purchaseorder) ;
          $("#pms_customer").val(customer) ;
          $("#pms_deliverydate").val(deliverydate) ;
          // $("#pms_cancellationdate").val(cancellationdate) ;


          document.getElementById('jobOrderHeaderModal').style.display='none';
          document.getElementById("addBtnJobOrderHeader").style.visibility = "hidden";

          window.location.href = "http://localhost/PMS/8080/pms_job_order.php?id="+key;
    };

    function deleteJOM(key){
          document.getElementById("JobOrderListModal").style.display="none";
          document.getElementById('deleteBtnJobOrderHeaderListModal').style.display='block';
          $("#deletestatus").val("jobOrderListDelete") ;
          $("#deletekey").val(key) ;
    };

    function deleteJODM(key){
        document.getElementById('deleteJobOrderDetailListModal').style.display='block';
        $("#deletestatus_detail").val("jobOrderDetailListDelete") ;
        $("#deletekey_detail").val(key) ;
    };

</script>

<script src="js/lib/jquery/jquery.min.js"></script>
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
