<?php
date_default_timezone_set('Asia/Manila');
$curr_uri = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
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

if (isset($_POST["inputkey_posted_returns"])) {
    $key_posted_returns = $_POST['inputkey_posted_returns'];
} else {
    $key_posted_returns = "";
}

if (isset($_POST["inputstatus_returns"])) {
  $pms_mode_posted_returns = $_POST['inputstatus_returns'];
 } else {
  $pms_mode_posted_returns = "";
}



// pms_returns_customer_header
if (isset($_POST["pms_customer"])) {
  $pms_customer = $_POST['pms_customer'];
} else {
  $pms_customer = "";
}

if (isset($_POST["pms_jo_no"])) {
  $pms_jo_no = $_POST['pms_jo_no'];
} else {
  $pms_jo_no = "";
}


if (isset($_POST["pms_operator_name"])) {
  $pms_operator_name = $_POST['pms_operator_name'];
} else {
  $pms_operator_name = "";
}

if (isset($_POST["pms_deliverydate"])) {
  $pms_deliverydate = $_POST['pms_deliverydate'];
} else {
  $pms_deliverydate = "";
}

if (isset($_POST["pms_joborder_prod_item"])) {
  $pms_joborder_prod_item = $_POST['pms_joborder_prod_item'];
} else {
  $pms_joborder_prod_item = "";
}

if (isset($_POST["pms_remarks"])) {
  $pms_remarks = $_POST['pms_remarks'];
} else {
  $pms_remarks = "";
}

if(isset($_POST['pms_prod_qty'])){
    $pms_prod_qty = $_POST['pms_prod_qty'];
} else {
    $pms_prod_qty = "not pms_prod_qty";
}

// pms_returns_customer_details
if (isset($_POST["pms_purchaseorder"])) {
  $pms_purchaseorder = $_POST['pms_purchaseorder'];
} else {
  $pms_purchaseorder = "";
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

if (isset($_POST["pms_cost"])) {
  $pms_cost = $_POST['pms_cost'];
} else {
  $pms_cost = "";
}


if ($pms_mode_posted_returns=="prm") {


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
    "UPDATE pms_returns_customer_header
    SET pms_posted = 1
    WHERE pms_id = $key_posted_returns");

// oyez
    $sql_post =
    "SELECT t1.pms_id AS pms_hid, t1.pms_date, t1.pms_customer, t1.pms_jo_no, t1.pms_operator_name, t1.pms_deliverydate,
            t1.pms_joborder_prod_item, t1.pms_remarks, t1.pms_prod_qty,
            t3.pms_id AS pms_rid, t3.pms_sku, t3.pms_item, t3.pms_description
    FROM pms_returns_customer_header AS t1
    INNER JOIN pms_rawmaterials AS t3
    ON t1.pms_joborder_prod_item = t3.pms_item
    WHERE t1.pms_id = '$key_posted_returns'";

    $sql = mysqli_query($GLOBALS["___mysqli_ston"], $sql_post);

    while ($row=mysqli_fetch_array($sql)) {
        $post_pms_finishedproduct_code = $row['pms_hid'];
        $post_pms_sku = $row['pms_sku'];
        $post_pms_item = $row['pms_joborder_prod_item'];
        $post_pms_qty = $row['pms_prod_qty'];

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
        'Return to Customer',
        '$key_posted_returns',
        '$pms_user'
        )");

        $con=mysqli_query($GLOBALS["___mysqli_ston"],
        "UPDATE pms_rawmaterials
        SET pms_qty = pms_qty - '$post_pms_qty'
        WHERE pms_item = '$post_pms_item'");
    }

}


if ($pms_mode=="returnsHeaderAdd") {
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
    pms_returns_customer_header
    (
    pms_customer,
    pms_jo_no,
    pms_operator_name,
    pms_deliverydate,
    pms_joborder_prod_item,
    pms_remarks,
    pms_prod_qty
    )
    VALUES
    (
    '$pms_customer',
    '$pms_jo_no',
    '$pms_operator_name',
    '$pms_deliverydate',
    '$pms_joborder_prod_item',
    '$pms_remarks',
    '$pms_prod_qty'
    )");
}

if ($pms_mode2=="returnsDetailAdd") {
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
    pms_returns_customer_details
    (
    pms_purchaseorder,
    pms_rm_sku,
    pms_qty,
    pms_cost,
    pms_total
    )
    VALUES
    (
    '$pms_purchaseorder',
    '$pms_rm_sku',
    '$pms_qty',
    '$pms_cost',
    '0'
    )");
  }

if ($pms_mode=="earh") {
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
    "UPDATE pms_returns_customer_header
        SET pms_customer='$pms_customer',
            pms_jo_no='$pms_jo_no',
            pms_operator_name='$pms_operator_name',
            pms_deliverydate='$pms_deliverydate',
            pms_joborder_prod_item='$pms_joborder_prod_item',
            pms_remarks='$pms_remarks',
            pms_prod_qty='$pms_prod_qty'
    WHERE pms_id = $key");
}

if ($pms_mode2=="eard") {
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
  "UPDATE pms_returns_customer_details
    SET pms_purchaseorder='$pms_purchaseorder',
        pms_rm_sku='$pms_rm_sku',
        pms_qty='$pms_qty',
        pms_cost='$pms_cost',
        pms_total='0'
    WHERE pms_id = $key2");
}

if ($pms_deletemode=="returnsHeaderListDelete") {
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
  $con=mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM pms_returns_customer_header WHERE pms_id = $deletekey");
  $con=mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM pms_returns_customer_details WHERE pms_purchaseorder = $deletekey");
}

if ($pms_deletemode_detail=="returnsDetailListDelete") {
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
  $con=mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM pms_returns_customer_details WHERE pms_id = $deletekey_detail");
}


$dp_pms_id = "";
$dp_pms_date = "";
$dp_pms_customer = "";
$dp_pms_jo_no = "";
$dp_pms_operator_name = "";
$dp_pms_deliverydate = "";
$dp_pms_joborder_prod_item = "";
$dp_pms_remarks = "";
$dp_pms_total = "";
$dp_pms_prod_qty = "";

$title_pms_id = "";
$title_pms_date = "";
$title_pms_customer = "";
$title_pms_jo_no = "";
$title_pms_operator_name = "";
$title_pms_deliverydate = "";
$title_pms_joborder_prod_item = "";
$title_pms_remarks = "";
$title_pms_total = "";
$title_pms_prod_qty = "";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/pms_logo/logo-small.png">
    <title>Returns | Inventory and Distribution Management System</title>
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
                        <b><img src="images/pms_logo/logo-small.png" alt="homepage" class="dark-logo" /></b>
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
                    <h3 class="text-primary">Return to Customer(s)</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Transactions</a></li>
                        <li class="breadcrumb-item active">Return to Customer(s)</li>
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
                    onclick="listReturns();"
                    class="btn"
                    href="#ReturnsListModal"
                    data-target="#ReturnsListModal"
                    style="color:#FFF; background-color: #a53cd8"
                    >
                    <i class="fa fa-list"></i> RETURNS LIST
                    </button> &nbsp;&nbsp;

                    <button
                    onclick="addReturnsHeader();"
                    class="btn btn-primary"
                    href="#returnsHeaderModal"
                    data-target="#returnsHeaderModal"
                    id="addBtnReturnsHeader"
                    style="color:#fff;"
                    >
                    <i class="fa fa-plus"></i> ADD NEW RETURNS (HEADER)
                    </button>

                    <?php
                    $sql = mysqli_query($GLOBALS["___mysqli_ston"], 
                    "SELECT * FROM pms_returns_customer_header");
                    $count_entry = mysqli_num_rows($sql);
                    echo "<p class='text-primary' style='position:absolute; right:10px; top:70px;'>Total Number of Return to Supplier(s): $count_entry</p>"; 
                    ?>

                  </div>
        <?php
        $sql_query_header =
        "SELECT t1.pms_id AS pms_hid, t1.pms_date, t1.pms_customer, t1.pms_jo_no, t1.pms_operator_name, t1.pms_deliverydate,
                t1.pms_joborder_prod_item, t1.pms_remarks, t1.pms_posted, t1.pms_prod_qty,
                t2.pms_id AS pms_cid, t2.pms_fullname
        FROM pms_returns_customer_header AS t1
        INNER JOIN pms_customers AS t2
        ON t1.pms_customer = t2.pms_fullname
        WHERE t1.pms_id = '$id'";

        // $sql_query_header = "SELECT * FROM pms_returns_customer_header";

        $sql2 = mysqli_query($GLOBALS["___mysqli_ston"], $sql_query_header);
        while ($row_header=mysqli_fetch_array($sql2)) {

        $dp_pms_id = $row_header['pms_hid'];
        $dp_pms_date = $row_header['pms_date'];
        $dp_pms_customer = $row_header['pms_customer'];
        $dp_pms_jo_no = $row_header['pms_jo_no'];
        $dp_pms_operator_name = $row_header['pms_operator_name'];
        $dp_pms_deliverydate = $row_header['pms_deliverydate'];
        $dp_pms_joborder_prod_item = $row_header['pms_joborder_prod_item'];
        $dp_pms_remarks = $row_header['pms_remarks'];
        $dp_pms_posted = $row_header['pms_posted'];
        $dp_pms_prod_qty = $row_header['pms_prod_qty'];

        $title_pms_total = "Total";
        $title_pms_id = "Returns ID";
        $title_pms_date = "Date/Time Created";
        $title_pms_customer = "Customer";
        $title_pms_jo_no = "Job Order Number";
        $title_pms_operator_name = "Operator Name";
        $title_pms_deliverydate = "Delivery Date";
        $title_pms_joborder_prod_item = "Item / Product Name";
        $title_pms_remarks = "Remarks";
        $title_pms_prod_qty = "Item / Product Quantity";

            if ($dp_pms_posted == "1"){
                $dp_pms_posted = "Yes";
            }
            if ($dp_pms_posted == "0"){
                $dp_pms_posted = "No";
            }
        ?>
        <div class="card-body" style="margin-top: -34px; margin-left: 550px;">
                  <!--   <button
                        onclick="editSOH('<?php echo $row_header['pms_hid'] ; ?>',
                                        '<?php echo $row_header['pms_customer'] ?>',
                                        '<?php echo $row_header['pms_jo_no'] ?>',
                                        '<?php echo $row_header['pms_operator_name'] ?>',
                                        '<?php echo $row_header['pms_deliverydate'] ?>',
                                        '<?php echo $row_header['pms_joborder_prod_item'] ?>',
                                        '<?php echo $row_header['pms_remarks'] ?>');"
                        class="btn"
                        href="#returnsHeaderModal"
                        data-target="#returnsHeaderModal"
                        style="color:#fff; background-color: #3bdb39;"
                    >
                    <i class="fa fa-pencil"></i> EDIT RETURNS (HEADER)
                    </button> -->

            <button
                    onclick="printReturns('<?php echo $row_header['pms_hid'] ; ?>');"
                    class="btn btn-primary"
                    style="color:#fff; background: #ba1307;"
                    >
                    <i class="fa fa-print"></i> PRINT RETURNS REPORT
           </button>

                    &nbsp; &nbsp;
                    <?php
                        if ($dp_pms_posted != "Yes"){
                            echo '<button
                                   onclick="postedReturns('. $row_header['pms_hid'] . ');"
                                   class="btn"
                                   href="#postedReturnsModal"
                                   style="color:#fff;
                                   background-color: #ba1307;">
                                   <i class="fa fa-check-square-o"></i> POST RETURNS</button>' ;
                        }
                    ?>

                    <br> <br>
        </div>
        <form method="">

          <div class="form-group" style="width: 450px;">
            <label class="control-label col-lg-7" style="font-size: 20px; font-weight: bold;"><?php echo $title_pms_id; ?></label>
            <div class="col-lg-9">
                <h4> <?php echo $dp_pms_id; ?> </h4>
            </div>
          </div> <br>
          <div class="form-group" style="position: absolute; width: 350px; margin-top: -20px;">
            <label class="control-label col-lg-9" style="font-size: 20px; font-weight: bold;"><?php echo $title_pms_date; ?></label>
            <div class="col-lg-9">
                <h4> <?php echo $dp_pms_date; ?> </h4>
            </div>
          </div> <br>

          <div class="form-group" style="position: absolute; right: 0px; width: 450px; margin-top: -110px;">
            <label class="control-label col-lg-9" style="font-size: 20px; font-weight: bold;"><?php echo $title_pms_customer; ?></label>
            <div class="col-lg-9">
                <h4> <?php echo $dp_pms_customer; ?> </h4>
            </div>
          </div>

          <div class="form-group" style="position: absolute; right: 0px; margin-top: -40px; width: 450px;">
            <label class="control-label col-lg-9" style="font-size: 20px; font-weight: bold;"><?php echo $title_pms_jo_no; ?></label>
            <div class="col-lg-9">
                <h4> <?php echo $dp_pms_jo_no; ?> </h4>
            </div>
          </div>

         

        </form><br><br>

        <div class="card-body" >
  <!--           <button
                        onclick="addReturnsDetail('<?php echo $row_header['pms_hid'] ; ?>');"
                        class="btn btn-primary"
                        href="#returnsDetailModal"
                        data-target="#returnsDetailModal"
                        style="color:#fff;"
                        >
                        <i class="fa fa-plus"></i> ADD NEW RETURNS (DETAIL)
            </button> &nbsp;&nbsp; -->

      

        </div>

        <?php } ?>


                        <br> <br> <br> <br>
                    <form method="">

                        <div class="form-group" style="position: absolute; width: 350px; margin-top: -75px;">
                            <label class="control-label col-lg-9" style="font-size: 20px; font-weight: bold;"><?php echo $title_pms_operator_name; ?></label>
                            <div class="col-lg-9">
                                <h4> <?php echo $dp_pms_operator_name; ?> </h4>
                            </div>
                        </div>

                        <div class="form-group" style="position: absolute; width: 350px; margin-top: 20px;">
                            <label class="control-label col-lg-7" style="font-size: 20px; font-weight: bold;"><?php echo $title_pms_prod_qty; ?></label>
                            <div class="col-lg-9">
                                <h4> <?php echo $dp_pms_prod_qty; ?> </h4>
                            </div>
                        </div> <br>

                        <div class="form-group" style="position: absolute; right: 0px; width: 450px; margin-top: -40px;">
                            <label class="control-label col-lg-7" style="font-size: 20px; font-weight: bold;"><?php echo $title_pms_joborder_prod_item; ?></label>
                            <div class="col-lg-9">
                                <h4> <?php echo $dp_pms_joborder_prod_item; ?> </h4>
                            </div>
                        </div> <br>

                        <div class="form-group" style="position: absolute; right: 0px; width: 450px; margin-top: -120px;">
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
<div id="returnsHeaderModal" class="w3-modal">
    <div class="w3-modal-content" style="width: 700px; height: 530px; margin-top: -10px; margin-left: 420px;">
        <div class="w3-container">
            <br>
            <center>
              <h4 class="modal-title"><span id="returnsHeaderModalTitle"></span></h4>
            </center>
        <span onclick="document.getElementById('returnsHeaderModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

        <input type="hidden" name="inputstatus" id="inputstatus">
        <input type="hidden" name="inputkey" id="inputkey">


            <div class="modal-body">
            <br>

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Customer</label>
                <div class="col-lg-4">
                    <select class="form-control input-focus" id="pms_customer" name="pms_customer" onchange="customerDetails();">
                        <option value="" disabled selected>Select Customer</option>
                        <?php
                            $select_customer = "";
                            $sql_supplier = "SELECT DISTINCT pms_customer FROM pms_joborderheader";
                            $sql_s = mysqli_query($GLOBALS["___mysqli_ston"], $sql_supplier);
                            while ($row_s=mysqli_fetch_array($sql_s)) {
                            $select_customer = $row_s['pms_customer'];
                        ?>
                        <option value="<?php echo $select_customer; ?>"><?php echo $select_customer; ?></option>
                        <?php } ?>
                    </select>
                </div>
                </div>

                 <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Item / Product Quantity</label>
                <div class="col-lg-4">
                    <input type="number" class="form-control input-focus" id="pms_prod_qty" name="pms_prod_qty" placeholder="Enter Quantity">
                </div>
                </div>

               

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Operator Name</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control input-focus" id="pms_operator_name" name="pms_operator_name" placeholder="------" readonly>
                </div>
                </div>

            
                <div style="margin-left: 350px; margin-top: -250px;">

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Quantity</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control input-focus" id="pms_joborder_prod_item" name="pms_joborder_prod_item" placeholder="------" readonly>
                </div>
                </div>

                 <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Job Order Number</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control input-focus" id="pms_jo_no" name="pms_jo_no" placeholder="------" readonly>
                </div>
                </div>

               
                

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Remarks</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control input-focus" id="pms_remarks" name="pms_remarks" placeholder="------" readonly>
                </div>
                </div>

                 <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Delivery Date</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control input-focus" id="pms_deliverydate" name="pms_deliverydate" placeholder="------" readonly>
                </div>
                </div>

                </div>

            <div style="text-align: center; margin-top: 95px;">
                <button type="submit" style="border-radius: 20px;" class="btn btn-lg btn-success">Save</button>&nbsp;&nbsp;
                <button type="button" style="border-radius: 20px;" class="btn btn-lg btn-danger" onclick="document.getElementById('returnsHeaderModal').style.display='none'" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
            </div>
        </div>
    </div>
</div>
</form>


<form method="POST">
<div id="returnsDetailModal" class="w3-modal">
    <div class="w3-modal-content" style="width: 370px; height: 425px; margin-top: 10px; margin-left: 470px;">
        <div class="w3-container"style="">
            <br>
            <center>
              <h4 class="modal-title"><span id="returnsDetailModalTitle"></span></h4>
            </center>
        <span onclick="document.getElementById('returnsDetailModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

        <input type="hidden" name="inputstatus2" id="inputstatus2">
        <input type="hidden" name="inputkey2" id="inputkey2">

            <div class="modal-body" >
            <br>

                <div class="form-group" style="width: 850px;">
                <div class="col-lg-4">
                    <input type="hidden" class="form-control input-focus" id="pms_purchaseorder" name="pms_purchaseorder">
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
                <label class="control-label col-lg-5" >Cost</label>
                <div class="col-lg-4">
                    <input type="number" class="form-control input-focus" id="pms_cost" name="pms_cost" placeholder="Enter Cost" readonly>
                </div>
                </div>

            </div>

            <div style="text-align: center;">
                <button type="submit" style="border-radius: 20px;" class="btn btn-lg btn-success">Save</button>&nbsp;&nbsp;
                <button type="button" style="border-radius: 20px;" class="btn btn-lg btn-danger" onclick="document.getElementById('returnsDetailModal').style.display='none'" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
            </div>
        </div>
    </div>
</div>
</form>

<form method="POST">
<div id="deleteReturnsDetailListModal" class="w3-modal">
    <div class="w3-modal-content" style="width: 700px; margin-left: 350px; margin-top: 110px;">
        <div class="w3-container">
        <span onclick="document.getElementById('deleteReturnsDetailListModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

        <input type="hidden" name="deletestatus_detail" id="deletestatus_detail">
        <input type="hidden" name="deletekey_detail" id="deletekey_detail">
            <center><br>
            <h2>Do you want to Delete?</h2><br>

            <button type="submit" style="border-radius: 20px;" class="btn btn-success">Yes</button>&nbsp;&nbsp;
            <button type="button" style="border-radius: 20px;" class="btn btn-danger" onclick="document.getElementById('deleteReturnsDetailListModal').style.display='none'">No</button><br><br><br>
            </center>

        </div>
    </div>
</div>
</form>

<form method="POST">
<div id="deleteBtnReturnsHeaderListModal" class="w3-modal">
    <div class="w3-modal-content" style="width: 700px; margin-left: 350px; margin-top: 110px;">
        <div class="w3-container">
        <span onclick="document.getElementById('deleteBtnReturnsHeaderListModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

        <input type="hidden" name="deletestatus" id="deletestatus">
        <input type="hidden" name="deletekey" id="deletekey">
            <center><br>
            <h2>Do you want to Delete?</h2><br>

            <button type="submit" style="border-radius: 20px;" class="btn btn-success">Yes</button>&nbsp;&nbsp;
            <button type="button" style="border-radius: 20px;" class="btn btn-danger" onclick="document.getElementById('deleteBtnReturnsHeaderListModal').style.display='none'">No</button><br><br><br>
            </center>

        </div>
    </div>
</div>
</form>

<form method="POST">
<div id="postedReturnsModal" class="w3-modal">
    <div class="w3-modal-content" style="width: 700px; margin-left: 350px; margin-top: 110px;">
        <div class="w3-container">
        <span onclick="document.getElementById('postedReturnsModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

        <input type="hidden" name="inputstatus_returns" id="inputstatus_returns">
        <input type="hidden" name="inputkey_posted_returns" id="inputkey_posted_returns">
            <center><br>
            <h2>Do you want to post this Returns?</h2><br>
            <h2>Note: Once you post this Returns you cannot post it.</h2> <br>
            <button type="submit" id="postedAssembleYes" style="border-radius: 20px;" class="btn btn-success">Yes</button>&nbsp;&nbsp;
            <button type="button" style="border-radius: 20px;" class="btn btn-danger" onclick="document.getElementById('postedReturnsModal').style.display='none'">No</button><br><br><br>
            </center>

        </div>
    </div>
</div>
</form>

<div id="ReturnsListModal" class="w3-modal">
  <div class="w3-modal-content" style="margin-top: -70px; margin-left: 100px; width: 1300px;">
    <div class="w3-container">

      <br>
      <center>
      <h4 class="modal-title"><span id="ReturnsListModaltitle"></span></h4>
      </center>

      <br><br>
      <span onclick="document.getElementById('ReturnsListModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

    <h4 class="card-title">Save As</h4>
      <table id="DataTableAssembleList"
             class="display nowrap table table-hover table-striped table-bordered"
             cellspacing="0" >
                <thead>
                    <tr>
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">Customer</th>
                        <th style="text-align: center;">Job Order Number</th>
                        <th style="text-align: center;">Operator Name</th>
                        <th style="text-align: center;">Date/Time Created</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>

                <tbody>

                  <?php
                  $sql_query_header_list = "SELECT * FROM pms_returns_customer_header";

                  $sql = mysqli_query($GLOBALS["___mysqli_ston"], $sql_query_header_list);
                  $header_count = 0;
                  while ($row=mysqli_fetch_array($sql)) {
                  $dp_pms_posted = $row['pms_posted'];
                  $header_count++;
                  ?>
                        <tr>

                        <td style="color: #000; text-align: center;"><?php echo $header_count;?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_customer'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_jo_no'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_operator_name'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_date'];?></td>

                        <td style="color: #000; text-align: center;">
                          <button onclick="viewReturnsHeader('<?php echo $row['pms_id'] ; ?>',
                                                                '<?php echo $row['pms_customer'] ?>',
                                                                '<?php echo $row['pms_jo_no'] ?>',
                                                                '<?php echo $row['pms_operator_name'] ?>',
                                                                '<?php echo $row['pms_deliverydate'] ?>',
                                                                '<?php echo $row['pms_joborder_prod_item'] ?>',
                                                                '<?php echo $row['pms_prod_qty'] ?>',
                                                                '<?php echo $row['pms_remarks'] ?>');"
                                    href="#returnsHeaderModal<?php echo $row['pms_id'];?>"
                                    data-target="#returnsHeaderModal"
                                    style="color: #ffffff; background-color: #a53cd8;"
                                    class="btn btn-primary"><i class="icon-eye icon-large"> View</i></button>&nbsp;

                        <?php
                        if ($dp_pms_posted != "1"){
                            echo '<button
                                   onclick="deleteRM('. $row['pms_id'] . ');"
                                   class="btn"
                                   id="deleteRMBtn"
                                   href="#deleteBtnReturnsHeaderListModal"
                                   data-target="#deleteBtnReturnsHeaderListModal"
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
        $("#pms_cost").val(z2) ;
        $("#remainingQuantity").html("Remaining Quantity: " + z3) ;
        // $('#pms_unitprice').val(z3) ;
    });

    document.getElementById("saveReturnsBtn").style.visibility = "hidden";
    document.getElementById("cancelReturnsBtn").style.visibility = "hidden";



    function customerDetails() {
    var selectBox = document.getElementById("pms_customer");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    // $("#pms_item").empty();
    FetchCustomer(selectedValue);
  }

function FetchCustomer(name) {

  // alert(name);

    $(document).ready(function(){   
        $.ajax({
            url: 'http://localhost/PMS/8080/pms_get_customer_jo.php?name=' + name,
            dataType: 'jsonp',
            jsonp: 'pms',
            timeout: 5000,
            success: function(data, status){
                $.each(data, function(i,item){ 
                    if (item.pms_id==undefined){

                    } 
                    else {
                        var customer_id = item.pms_id ;
                        var customer_jo_no = item.pms_jo_no ;
                        var customer_operator_name = item.pms_operator_name ;
                        // var customer_name = item.pms_customer ;
                        var customer_deliverdate = item.pms_deliverydate ;
                        var customer_joborder_prod_item = item.pms_joborder_prod_item ;
                        var customer_remarks = item.pms_remarks;


                        // $("#pms_supid").val(customer_id);
                        $("#pms_jo_no").val(customer_jo_no);
                        $("#pms_operator_name").val(customer_operator_name);
                        $("#pms_deliverydate").val(customer_deliverdate);
                        $("#pms_joborder_prod_item").val(customer_joborder_prod_item);
                        $("#pms_remarks").val(customer_remarks);
                      }                  
                });
            },
            error: function(){
                alert("Connection Problem!") ;
            } 
        });
    });    
}

    function printReturns(pso_key){
        location.href = 'http://localhost/PMS/8080/pms_returns_reports_print2.php?pms_hid=' + pso_key ;
    };

    function postedReturns(p_key)
    {
    document.getElementById('postedReturnsModal').style.display='block';
    $("#inputstatus_returns").val("prm") ;
    $("#inputkey_posted_returns").val(p_key) ;
    };

    function closeWindow()
    {
    document.getElementById("ReturnsListModal").style.display="none";
    document.getElementById("saveReturnsBtn").style.visibility = "visible";
    document.getElementById("cancelReturnsBtn").style.visibility = "visible";
    };

    function listReturns()
    {
    document.getElementById('ReturnsListModal').style.display='block';
    $("#ReturnsListModaltitle").html("RETURNS LIST HEADER") ;
    };

    function addReturnsHeader()
    {
    document.getElementById('returnsHeaderModal').style.display='block';
    $("#returnsHeaderModalTitle").html("ADD RETURNS HEADER") ;
    $("#inputstatus").val("returnsHeaderAdd") ;

    $("#pms_customer").val("") ;
    $("#pms_jo_no").val("") ;
    $("#pms_operator_name").val("") ;
    $("#pms_deliverydate").val("") ;
    $("#pms_joborder_prod_item").val("") ;
    $("#pms_remarks").val("") ;
    $("#pms_prod_qty").val("") ;
    };

    function addReturnsDetail(a_key)
    {
    document.getElementById('returnsDetailModal').style.display='block';
    $("#returnsDetailModalTitle").html("ADD RETURNS DETAIL") ;
    $("#inputstatus2").val("returnsDetailAdd") ;
    $("#inputkey2").val(a_key) ;
    $("#pms_purchaseorder").val(a_key) ;
    $("#pms_rm_sku").val("") ;
    $("#pms_qty").val("") ;
    $("#pms_cost").val("") ;
    };
    

    function editSOH(key,customer,jono,operatorname,deliverydate,proditem,remarks)
    {

    document.getElementById('returnsHeaderModal').style.display='block';
    $("#returnsHeaderModalTitle").html("EDIT RETURNS HEADER") ;
    $("#inputstatus").val("earh") ;
    $("#inputkey").val(key) ;
    $("#pms_customer").val(customer) ;
    $("#pms_jo_no").val(jono) ;
    $("#pms_operator_name").val(operatorname) ;
    $("#pms_deliverydate").val(deliverydate) ;
    $("#pms_joborder_prod_item").val(proditem) ;
    $("#pms_remarks").val(remarks) ;
    };

    function editRD(ed_key,ed_purchaseorder,ed_rm_sku,ed_qty,ed_cost)
    {
    document.getElementById('returnsDetailModal').style.display='block';
    $("#returnsDetailModalTitle").html("EDIT RETURNS DETAIL") ;
    $("#inputstatus2").val("eard") ;
    $("#inputkey2").val(ed_key) ;
    $("#pms_purchaseorder").val(ed_purchaseorder) ;
    $("#pms_rm_sku").val(ed_rm_sku) ;
    $("#pms_qty").val(ed_qty) ;
    $("#pms_cost").val(ed_cost) ;
    };

    function viewReturnsHeader(key,customer,jono,operatorname,deliverydate,proditem,remarks)
    {
    document.getElementById("ReturnsListModal").style.display="none";
    document.getElementById('returnsHeaderModal').style.display='block';

    $("#returnsHeaderModalTitle").html("EDIT RETURNS HEADER") ;
    $("#inputkey").val(key) ;
    $("#pms_customer").val(customer) ;
    $("#pms_jo_no").val(jono) ;
    $("#pms_operator_name").val(operatorname) ;
    $("#pms_deliverydate").val(deliverydate) ;
    $("#pms_joborder_prod_item").val(proditem) ;
    $("#pms_remarks").val(remarks) ;

    document.getElementById('returnsHeaderModal').style.display='none';
    document.getElementById("addBtnReturnsHeader").style.visibility = "hidden";
    window.location.href = "http://localhost/PMS/8080/pms_returns_customer.php?id="+key;
    };

    function deleteRM(key)
    {
    document.getElementById("ReturnsListModal").style.display="none";
    document.getElementById('deleteBtnReturnsHeaderListModal').style.display='block';
    $("#deletestatus").val("returnsHeaderListDelete") ;
    $("#deletekey").val(key) ;
    };

    function deleteRDM(key)
    {
    document.getElementById('deleteReturnsDetailListModal').style.display='block';
    $("#deletestatus_detail").val("returnsDetailListDelete") ;
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
