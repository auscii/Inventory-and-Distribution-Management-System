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


if(isset($_GET['supplier'])){
    $supplier = $_GET['supplier'];
} else {
    $supplier = "not supplier";
}


// pms_purchaseorderheader


if (isset($_POST["pms_po_number"])) {
    $pms_po_number = $_POST['pms_po_number'];
   } else {
    $pms_po_number = "";
}

if (isset($_POST["pms_id"])) {
    $po_pms_id = $_POST['pms_id'];
   } else {
    $po_pms_id = "";
}

if (isset($_POST["pms_date"])) {
    $pms_date = $_POST['pms_date'];
   } else {
    $pms_date = "";
}

if (isset($_POST["pms_duedate"])) {
    $pms_duedate = $_POST['pms_duedate'];
   } else {
    $pms_duedate = "";
}

if (isset($_POST["pms_supplier"])) {
    $pms_supplier = $_POST['pms_supplier'];
   } else {
    $pms_supplier = "";
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

// if (isset($_POST["pms_settled"])) {
//     $pms_settled = $_POST['pms_settled'];
//    } else {
//     $pms_settled = "";
// }

// if (isset($_POST["pms_debitmemo"])) {
//     $pms_debitmemo = $_POST['pms_debitmemo'];
//    } else {
//     $pms_debitmemo = "";
// }

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

// if (isset($_POST["pms_reference"])) {
//     $pms_reference = $_POST['pms_reference'];
//    } else {
//     $pms_reference = "";
// }

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


// pms_purchaseorderdetails
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

if (isset($_POST["pms_detail_total"])) {
    $pms_detail_total = $_POST['pms_detail_total'];
} else {
    $pms_detail_total = "";
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

if (isset($_POST["inputkey_posted_purchase_order"])) {
    $key_posted_purchase_order = $_POST['inputkey_posted_purchase_order'];
   } else {
    $key_posted_purchase_order = "";
  }
if (isset($_POST["inputstatus_posted_assemble"])) {
  $pms_mode_posted_purchase_order = $_POST['inputstatus_posted_assemble'];
 } else {
  $pms_mode_posted_purchase_order = "";
}

if ($pms_mode_posted_purchase_order=="ppom") {
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
    "UPDATE pms_purchaseorderheader
    SET pms_posted = 1
    WHERE pms_id = $key_posted_purchase_order");

    $sql_post = "SELECT t1.pms_id AS pms_hid, t1.pms_id, t1.pms_duedate, t1.pms_supplier, t1.pms_total, t1.pms_paid,
                t1.pms_posted, t1.pms_posteddate, t1.pms_checkno, t1.pms_checkdate, t1.pms_bankname,
                t1.pms_bankaccountno, t1.pms_bankaccountname, t1.pms_remarks,
                t2.pms_id AS pms_did, t2.pms_purchaseorder, t2.pms_rm_sku, t2.pms_qty, t2.pms_cost,
                t3.pms_id AS pms_rmid, t3.pms_suprod_itemname, t3.pms_suprod_quantity AS pms_rm_qty
                FROM pms_purchaseorderheader AS t1
                INNER JOIN pms_purchaseorderdetails AS t2
                ON t1.pms_id = t2.pms_purchaseorder
                INNER JOIN pms_suppliers_product AS t3
                ON t2.pms_rm_sku = t3.pms_id
                WHERE t1.pms_id = '$key_posted_purchase_order'";

    $sql = mysqli_query($GLOBALS["___mysqli_ston"], $sql_post);

    while($row=mysqli_fetch_array($sql)) {
        $post_pms_detail_id = $row['pms_did'];
        $post_pms_assemble = $row['pms_purchaseorder'];
        $post_pms_rm_sku = $row['pms_rm_sku'];
        $post_pms_cost = $row['pms_cost'];
        $post_pms_qty = $row['pms_qty'];
        $post_pms_item = $row['pms_suprod_itemname'];
        
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
        '$post_pms_qty',
        0,
        'Purchase Order',
        '$key_posted_purchase_order',
        '$pms_user'
        )");


        $con=mysqli_query($GLOBALS["___mysqli_ston"],
        "UPDATE pms_rawmaterials
        SET pms_qty = pms_qty + '$post_pms_qty'
        WHERE pms_supplier_number = '$post_pms_rm_sku'");


        $con=mysqli_query($GLOBALS["___mysqli_ston"],
        "UPDATE pms_suppliers_product
        SET pms_suprod_quantity = pms_suprod_quantity - '$post_pms_qty'
        WHERE pms_id = '$post_pms_rm_sku'");
    }

}


if ($pms_mode=="purchaseOrderHeaderAdd") {
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
    pms_purchaseorderheader
    (
    pms_duedate,
    pms_supplier,
    pms_total,
    pms_paid,
    pms_posted,
    pms_checkno,
    pms_checkdate,
    pms_bankname,
    pms_bankaccountno,
    pms_bankaccountname,
    pms_remarks,
    pms_po_number
    )
    VALUES
    (
    '$pms_duedate',
    '$pms_supplier',
    '0',
    '$pms_paid',
    '0',
    '$pms_checkno',
    '$pms_checkdate',
    '$pms_bankname',
    '$pms_bankaccountno',
    '$pms_bankaccountname',
    '$pms_remarks',
    '$pms_po_number'
    )");
}

if ($pms_mode2=="purchaseOrderDetailAdd") {
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
    pms_purchaseorderdetails
    (
    pms_purchaseorder,
    pms_rm_sku,
    pms_qty,
    pms_cost
    )
    VALUES
    (
    '$pms_purchaseorder',
    '$pms_rm_sku',
    '$pms_qty',
    '$pms_cost'
    )");
  }

if ($pms_mode=="eaph") {
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
    "UPDATE pms_purchaseorderheader
    SET pms_duedate='$pms_duedate',
        pms_supplier='$pms_supplier',
        pms_total='0',
        pms_paid='$pms_paid',
        pms_posted='0',
        pms_checkno='$pms_checkno',
        pms_checkdate='$pms_checkdate',
        pms_bankname='$pms_bankname',
        pms_bankaccountno='$pms_bankaccountno',
        pms_bankaccountname='$pms_bankaccountname',
        pms_remarks='$pms_remarks'
    WHERE pms_id = $key");
}

if ($pms_mode2=="eapd") {
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
  "UPDATE pms_purchaseorderdetails
    SET pms_purchaseorder='$pms_purchaseorder',
        pms_rm_sku='$pms_rm_sku',
        pms_qty='$pms_qty',
        pms_cost='$pms_cost'
    WHERE pms_id = $key2");
}

if ($pms_deletemode=="purchaseOrderListDelete") {
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
  $con=mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM pms_purchaseorderheader WHERE pms_id = $deletekey");
  $con=mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM pms_purchaseorderdetails WHERE pms_purchaseorder = $deletekey");
}

if ($pms_deletemode_detail=="purchaseOrderDetailListDelete") {
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
  $con=mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM pms_purchaseorderdetails WHERE pms_id = $deletekey_detail");
}

$title_pms_total = "";
$title_pms_paid = "";
// $title_pms_settled = "";
// $title_pms_debitmemo = "";
$title_pms_posted = "";
$title_pms_posteddate = "";
// $title_pms_reference = "";
$title_pms_checkno = "";
$title_pms_checkdate = "";
$title_pms_bankname = "";
$title_pms_bankaccountno = "";
$title_pms_bankaccountname = "";
$title_pms_remarks = "";
$title_pms_po_number = "";

$dp_pms_id = "";
$dp_pms_date = "";
$dp_pms_duedate = "";
$dp_pms_supplier = "";
$dp_pms_total = "";
$dp_pms_paid = "";
// $dp_pms_settled = "";
// $dp_pms_debitmemo = "";
$dp_pms_posted = "";
$dp_pms_posteddate = "";
// $dp_pms_reference = "";
$dp_pms_checkno = "";
$dp_pms_checkdate = "";
$dp_pms_bankname = "";
$dp_pms_bankaccountno = "";
$dp_pms_bankaccountname = "";
$dp_pms_remarks = "";
$dp_pms_po_number = "";

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
    <title>Purchase Order| Inventory and Distribution Management System</title>
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
                    <h3 class="text-primary">Purchase Order</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Purchase Order</li>
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
                    href="#PurchaseOrderListModal"
                    data-target="#PurchaseOrderListModal"
                    style="color:#FFF; background-color: #a53cd8"
                    >
                    <i class="fa fa-list"></i> PURCHASE ORDER LIST
                    </button> &nbsp;

                    <button
                    onclick="addPurchaseOrderHeader();"
                    class="btn btn-primary"
                    href="#purchaseOrderHeaderModal"
                    data-target="#purchaseOrderHeaderModal"
                    id="addBtnPurchaseOrderHeader"
                    style="color:#fff; margin-left: ;"
                    >
                    <i class="fa fa-plus"></i> ADD PURCHASE ORDER (HEADER)
                    </button>
                    
                    <?php
                    $sql = mysqli_query($GLOBALS["___mysqli_ston"], 
                    "SELECT * FROM pms_purchaseorderheader");
                    $count_entry = mysqli_num_rows($sql);
                    echo "<p class='text-primary' style='position:absolute; right:10px; top:70px;'>Total Number of Purchase Order(s): $count_entry</p>"; 
                    ?>

                  </div>

        <?php
        $sql_query_header = "SELECT t1.pms_id AS pms_hid, t1.pms_po_number, t1.pms_date, t1.pms_duedate, t1.pms_supplier, t1.pms_total,
        t1.pms_paid, t1.pms_posted, t1.pms_posteddate, 
        t1.pms_checkno, t1.pms_checkdate, t1.pms_bankname, t1.pms_bankaccountno, t1.pms_bankaccountname,t1.pms_remarks,
        t2.pms_id AS pms_did, t2.pms_fullname, t2.pms_address, t2.pms_phone, t2.pms_email, t2.pms_image, t2.pms_terms, t2.pms_created
        FROM pms_purchaseorderheader AS t1
        INNER JOIN pms_suppliers AS t2
        ON t1.pms_supplier = t2.pms_fullname
        WHERE t1.pms_id = '$id'";

        $sql2 = mysqli_query($GLOBALS["___mysqli_ston"], $sql_query_header);
        while ($row2=mysqli_fetch_array($sql2)) {
            $dp_pms_id = $row2['pms_po_number'];
            $dp_pms_date = $row2['pms_date'];
            $dp_pms_duedate = $row2['pms_duedate'];
            $dp_pms_supplier = $row2['pms_fullname'];
            $dp_pms_total = "0.00";
            $dp_pms_paid = $row2['pms_paid'];
            $dp_pms_po_number = $row2['pms_po_number'];
            // $dp_pms_debitmemo = $row2['pms_debitmemo'];
            $dp_pms_posted = $row2['pms_posted'];
            $dp_pms_posteddate = $row2['pms_posteddate'];
            // $dp_pms_reference = $row2['pms_reference'];
            $dp_pms_checkno = $row2['pms_checkno'];
            $dp_pms_checkdate = $row2['pms_checkdate'];
            $dp_pms_bankname = $row2['pms_bankname'];
            $dp_pms_bankaccountno = $row2['pms_bankaccountno'];
            $dp_pms_bankaccountname = $row2['pms_bankaccountname'];
            $dp_pms_remarks = $row2['pms_remarks'];

            $title_pms_total = "Total Quantity";
            $title_pms_paid = "Paid";
            $title_pms_po_number = "Purchase Order #";
            // $title_pms_debitmemo = "Debit Memo";
            $title_pms_posted = "Posted";
            $title_pms_posteddate = "Posted Date";
            // $title_pms_reference = "Reference";
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
        <div class="card-body" style="margin-top: -34px; margin-left: 510px;">
                    <button
                        onclick="editPOH('<?php echo $row2['pms_hid'] ; ?>',
                                        '<?php echo $row2['pms_duedate'] ?>',
                                        '<?php echo $row2['pms_fullname'] ?>',
                                        '<?php echo $row2['pms_total'] ?>',
                                        '<?php echo $row2['pms_paid'] ?>',
                                        '<?php echo $row2['pms_posted'] ?>',
                                        '<?php echo $row2['pms_checkno'] ?>',
                                        '<?php echo $row2['pms_checkdate'] ?>',
                                        '<?php echo $row2['pms_bankname'] ?>',
                                        '<?php echo $row2['pms_bankaccountno'] ?>',
                                        '<?php echo $row2['pms_bankaccountname'] ?>',
                                        '<?php echo $row2['pms_remarks'] ?>');"
                        class="btn"
                        href="#purchaseOrderHeaderModal"
                        data-target="#purchaseOrderHeaderModal"
                        style="color:#fff; background-color: #3bdb39;"
                    >
                    <i class="fa fa-pencil"></i> EDIT PURCHASE ORDER (HEADER)
                    </button>
                    &nbsp; &nbsp;
                    <?php
                        if ($dp_pms_posted != "Yes"){
                            echo '<button
                                   onclick="postedPurchaseOrder('. $row2['pms_hid'] . ');"
                                   class="btn"
                                   href="#postedAssembleModal"
                                   style="color:#fff; background-color: #ba1307; margin-top: -55px; margin-left: 290px;">
                                   <i class="fa fa-check-square-o"></i> POST PURCHASE ORDER</button>' ;
                        }
                    ?>
                    <br> <br>
        </div>
        <form method="">

          <div class="form-group" style="width: 450px;">
            <label class="control-label col-lg-7" style="font-size: 20px; font-weight: bold;">Purchase Order ID</label>
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
            <label class="control-label col-lg-9" style="font-size: 20px; font-weight: bold;">Supplier</label>
            <div class="col-lg-9">
                <h4> <?php echo $dp_pms_supplier; ?> </h4>
            </div>
          </div>

        </form><br><br>

        <div class="card-body" >
        <!-- onclick="addPurchaseOrderDetail('<?php //echo $row2['pms_hid'] ; ?>');" -->
            <button
                    onclick="addPurchaseOrderDetail('<?php echo $row2['pms_hid'] ; ?>');"
                    class="btn btn-primary"
                    href="#purchaseOrderDetailModal"
                    data-target="#purchaseOrderDetailModal"
                    style="color:#fff;"
                    >
                        <i class="fa fa-plus"></i> ADD NEW PURCHASE ORDER (DETAIL)
            </button> &nbsp;&nbsp;

            <button
                    onclick="printPurchaseOrder('<?php echo $row2['pms_hid'] ; ?>');"
                    class="btn btn-primary"
                    style="color:#fff; background: #ba1307;"
                    >
                    <i class="fa fa-print"></i> PRINT PURCHASE ORDER REPORT
           </button>

        </div>

        <?php } ?>

 <!-- 1st Table -->
        <h4 class="card-title">Save As</h4>
            <table id="DataTable1" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">Product (SKU)</th>
                        <th style="text-align: center;">Quantity</th>
                        <th style="text-align: center;">Cost</th>
                        <th style="text-align: center;">Total</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>

                <tbody>

                  <?php
                    $totaldetail = 0;
                    $sql_query_detail = mysqli_query($GLOBALS["___mysqli_ston"],
                    "SELECT SUM(pms_qty) AS total_qty FROM pms_purchaseorderdetails WHERE pms_purchaseorder = '$id'");
                    while ($rowtotal=mysqli_fetch_array($sql_query_detail)) {
                          $totaldetail = $rowtotal['total_qty'];
                    }

                    $sql_query_detail = "SELECT t1.pms_id AS pms_hid, t1.pms_date, t1.pms_duedate, t1.pms_supplier, t1.pms_total,
                    t1.pms_paid, t1.pms_posted, t1.pms_posteddate,
                    t1.pms_checkno, t1.pms_checkdate, t1.pms_bankname, t1.pms_bankaccountno, t1.pms_bankaccountname, t1.pms_remarks,
                    t2.pms_id AS pms_did, t2.pms_purchaseorder, t2.pms_rm_sku, t2.pms_qty, t2.pms_cost, FORMAT(t2.pms_qty * t2.pms_cost, 2) AS pms_total,
                    t3.pms_id AS pms_rmid, t3.pms_suprod_itemname, t3.pms_suprod_quantity
                    FROM pms_purchaseorderheader AS t1
                    INNER JOIN pms_purchaseorderdetails AS t2
                    ON t1.pms_id = t2.pms_purchaseorder
                    INNER JOIN pms_suppliers_product AS t3
                    ON t2.pms_rm_sku = t3.pms_id
                    WHERE t1.pms_id = '$id'";
                    
                    $sql_po_d = mysqli_query($GLOBALS["___mysqli_ston"], $sql_query_detail);
                    $detail_count = 0;
                    while ($row=mysqli_fetch_array($sql_po_d)) {
                    $dp_pms_posted = $row['pms_posted'];
                    if($dp_pms_posted = "1"){
                        $dp_pms_posted = "Yes";
                    } else {
                        $dp_pms_posted = "No";
                    }
                    $detail_count++;
                  ?>

                        <tr>

                        <td style="color: #000; text-align: center;"><?php echo $detail_count;?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_suprod_itemname'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_qty'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo "₱ " . $row['pms_cost'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo "₱ " . $row['pms_total'];?></td>

                        <td style="color: #000; text-align: center;">

                        <button onclick="editPOD('<?php echo $row['pms_did'] ; ?>',
                                                 '<?php echo $row['pms_purchaseorder'] ?>',
                                                 '<?php echo $row['pms_rm_sku'] ?>',
                                                 '<?php echo $row['pms_qty'] ?>',
                                                 '<?php echo $row['pms_cost'] ?>');"
                                    href="#purchaseOrderDetailModal"
                                    data-target="#purchaseOrderDetailModal"
                                    style="background-color: #3bdb39; color: #ffffff;"
                                    class="btn"><i class="icon-pencil icon-large"> Edit</i></button>

                        &nbsp;

                        <?php
                        if ($dp_pms_posted != "1"){
                            echo '<button
                                   onclick="deletePODM('. $row['pms_did'] . ');"
                                   class="btn"
                                   href="#deletePurchaseOrderDetailListModal"
                                   data-target="#deletePurchaseOrderDetailListModal"
                                   style="color:#fff;
                                   background-color: #ba1307; color: #ffffff;">
                                   <i class="icon-trash icon-large"></i> Delete</button>' ;
                        }
                        ?>
                        <!-- <button onclick="deletePODM('<?php echo $row['pms_did'] ; ?>');"
                                href="#deletePurchaseOrderDetailListModal<?php echo $row['pms_did'];?>"
                                data-target="#deletePurchaseOrderDetailListModal"
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
                        <!-- <?php
                        ?> -->

                        <div class="form-group" style="width: 450px; margin-top: -50px;">
                            <label class="control-label col-lg-7" style="font-size: 20px; font-weight: bold;"><?php echo $title_pms_total; ?></label>
                            <div class="col-lg-9">
                                <?php  ?>
                                <h4> <?php echo $totaldetail; ?> </h4>
                                <!-- <h4> <?php //echo $dp_pms_total; ?> </h4> -->
                            </div>
                        </div> <br>

                        <div class="form-group" style="position: absolute; width: 350px; margin-top: -20px;">
                            <label class="control-label col-lg-7" style="font-size: 20px; font-weight: bold;"><?php echo $title_pms_paid; ?></label>
                            <div class="col-lg-9">
                                <h4> <?php echo $dp_pms_paid; ?> </h4>
                            </div>
                        </div> <br>

                        <div class="form-group" style="position: absolute; width: 350px; margin-top: 30px;">
                            <label class="control-label col-lg-7" style="font-size: 20px; font-weight: bold;"><?php echo $title_pms_po_number; ?></label>
                            <div class="col-lg-9">
                                <h4> <?php echo $dp_pms_po_number; ?> </h4>
                            </div>
                        </div> <br>

                       <!--  <div class="form-group" style="position: absolute; right: 0px; width: 450px; margin-top: -150px;">
                            <label class="control-label col-lg-7" style="font-size: 20px; font-weight: bold;"><?php //echo $title_pms_debitmemo; ?></label>
                            <div class="col-lg-9">
                                <h4> <?php //echo $dp_pms_debitmemo; ?> </h4>
                            </div>
                        </div> -->

                        <div class="form-group" style="position: absolute; right: 0px; margin-top: -80px; width: 450px;">
                            <label class="control-label col-lg-7" style="font-size: 20px; font-weight: bold;"><?php echo $title_pms_posted; ?></label>
                            <div class="col-lg-9">
                                <h4> <?php echo $dp_pms_posted; ?> </h4>
                            </div>
                        </div>

                        <div class="form-group" style="position: absolute; right: 0px; margin-top: -10px; width: 450px;">
                            <label class="control-label col-lg-7" style="font-size: 20px; font-weight: bold;"><?php echo $title_pms_posteddate; ?></label>
                            <div class="col-lg-9">
                                <h4> <?php echo $dp_pms_posteddate; ?> </h4>
                            </div>
                        </div>

                         <!-- <div class="form-group" style="position: absolute; right: 0px; margin-top: 60px; width: 450px;">
                            <label class="control-label col-lg-7" style="font-size: 20px; font-weight: bold;"><?php //echo $title_pms_reference; ?></label>
                            <div class="col-lg-9">
                                <h4> <?php //echo $dp_pms_reference; ?> </h4>
                            </div>
                        </div> -->


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
<div id="purchaseOrderHeaderModal" class="w3-modal">
    <div class="w3-modal-content" style="width: 700px; height: 625px; margin-top: -75px; margin-left: 420px;">
        <div class="w3-container">
            <br>
            <center>
              <h4 class="modal-title"><span id="purchaseOrderHeaderModalTitle"></span></h4>
            </center>
        <span onclick="document.getElementById('purchaseOrderHeaderModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

        <input type="hidden" name="inputstatus" id="inputstatus">
        <input type="hidden" name="inputkey" id="inputkey">


            <div class="modal-body">
            <br>

                <?php
                $seed = str_split('123456789');
                shuffle($seed);
                $rand = 'PO0';
                foreach (array_rand($seed, 3) as $k) $rand .= $seed[$k];
                ?>
                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >PO NUMBER</label>
                <div class="col-lg-4">
                     <input type="text" class="form-control input-focus" name="pms_po_number" id="pms_po_number" value="<?php echo $rand; ?>" readonly> 
                </div>
                </div>

                <div class="form-group" style="width: 850px; margin-top: 11px;">
                <label class="control-label col-lg-5" >Supplier</label>
                <div class="col-lg-4">
                    <select class="form-control input-focus" id="pms_supplier" name="pms_supplier">
                        <option value="" disabled selected>Select Supplier</option>
                        <?php
                            $select_supplier = "";
                            $sql_supplier = "SELECT DISTINCT pms_suprod_suppliername FROM pms_suppliers_product WHERE pms_suprod_finishproduct = 0";
                            $sql_s = mysqli_query($GLOBALS["___mysqli_ston"], $sql_supplier);
                            while ($row_s=mysqli_fetch_array($sql_s)) {
                            $select_supplier = $row_s['pms_suprod_suppliername'];
                        ?>
                        <option value="<?php echo $select_supplier; ?>"><?php echo $select_supplier; ?></option>
                        <?php } ?>
                    </select>
                </div>
                </div>

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Paid</label>
                <div class="col-lg-4">
                    <input type="number" class="form-control input-focus" id="pms_paid" name="pms_paid" placeholder="Enter Paid" required autofocus>
                </div>
                </div>

                
                
                
                   
               

                <!-- <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Debit Memo</label>
                <div class="col-lg-4">
                    <input type="number" class="form-control input-focus" id="pms_debitmemo" name="pms_debitmemo" placeholder="Enter Debit Memo" required autofocus>
                </div>
                </div> <br>

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Reference</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control input-focus" id="pms_reference" name="pms_reference" placeholder="Enter Reference" required autofocus>
                </div>
                </div> -->

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Check Number</label>
                <div class="col-lg-4">
                    <input type="number" class="form-control input-focus" id="pms_checkno" name="pms_checkno" placeholder="Enter Check Number" required autofocus>
                </div>
                </div>

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Remarks</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control input-focus" id="pms_remarks" name="pms_remarks" placeholder="Enter Remarks" required autofocus>
                </div>
                </div>

                <div style="margin-left: 350px; margin-top: -410px;">

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Check Date</label>
                <div class="col-lg-4">
                    <input type="date" class="form-control input-focus" id="pms_checkdate" name="pms_checkdate" required autofocus>
                </div>
                </div>

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Bank Name</label>
                <div class="col-lg-4">
                <select class="form-control input-focus" id="pms_bankname" name="pms_bankname">
                    <option value="" disabled selected>Select Bank Name</option>
                    <option value="BDO Unibank">BDO Unibank</option>
                    <option value="Metropolitan Bank and Trust Company (Metrobank)">Metropolitan Bank and Trust Company (Metrobank)</option>
                    <option value="Bank of the Philippine Islands (BPI)">Bank of the Philippine Islands (BPI)</option>
                    <option value="Land Bank of the Philippines (LBP)">Land Bank of the Philippines (LBP)</option>
                    <option value="Philippine National Bank (PNB)">Philippine National Bank (PNB)</option>
                    <option value="Security Bank Corporation (Security Bank)">Security Bank Corporation (Security Bank)</option>
                    <option value="China Banking Corporation (Chinabank)">China Banking Corporation (Chinabank)</option>
                    <option value="Development Bank of the Philippines (DBP)">Development Bank of the Philippines (DBP)</option>
                    <option value="Union Bank of the Philippines (Unionbank)">Union Bank of the Philippines (Unionbank)</option>
                    <option value="East West Banking Corporation (EastWest Bank)">East West Banking Corporation (EastWest Bank)</option>
                    <option value="Citibank Philippines">Citibank Philippines</option>
                    <option value="PSBank">PSBank</option>
                    <option value="Maybank Philippines, Inc.">Maybank Philippines, Inc.</option>
                </select>
                    <!-- <input type="text" class="form-control input-focus" id="pms_bankname" name="pms_bankname" placeholder="Enter Bank Name" required autofocus> -->
                </div>
                </div>

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Bank Account Number</label>
                <div class="col-lg-4">
                    <input type="number" class="form-control input-focus" id="pms_bankaccountno" name="pms_bankaccountno" placeholder="Enter Bank Account Number" required autofocus>
                </div>
                </div>

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Bank Account Name</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control input-focus" id="pms_bankaccountname" name="pms_bankaccountname" placeholder="Enter Bank Account Name" required autofocus>
                </div>
                </div>

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Due Date</label>
                <div class="col-lg-4">
                    <input type="date" class="form-control input-focus" id="pms_duedate" name="pms_duedate" required autofocus>
                </div>
                </div>

                </div>

            <div style="text-align: center; margin-top: 50px;">
                <button type="submit" style="border-radius: 20px;" class="btn btn-lg btn-success">Save</button>&nbsp;&nbsp;
                <button type="button" style="border-radius: 20px;" class="btn btn-lg btn-danger" onclick="document.getElementById('purchaseOrderHeaderModal').style.display='none'" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
            </div>
        </div>
    </div>
</div>
</form>

<form method="POST">
<div id="purchaseOrderDetailModal" class="w3-modal">
    <div class="w3-modal-content" style="width: 370px; height: 430px; margin-top: 10px; margin-left: 540px;">
        <div class="w3-container"style="">
            <br>
            <center>
              <h4 class="modal-title"><span id="purchaseOrderDetailModalTitle"></span></h4>
            </center>
        <span onclick="document.getElementById('purchaseOrderDetailModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

        <input type="hidden" name="inputstatus2" id="inputstatus2">
        <input type="hidden" name="inputkey2" id="inputkey2">

            <div class="modal-body" >
            <br>

                    <input type="hidden" class="form-control input-focus" id="pms_purchaseorder" name="pms_purchaseorder">
               

                <!-- <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Purchase Order</label>
                <div class="col-lg-4">
                    <input type="number" class="form-control input-focus" id="pms_purchaseorder" name="pms_purchaseorder" placeholder="Enter Purchase Order" required autofocus>
                </div>
                </div>  -->

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Raw Material Product</label>
                <div class="col-lg-4">
                    <select class="form-control input-focus" id="pms_rm_sku" name="pms_rm_sku">
                        <option value="" disabled selected>Select Raw Material Product</option>
                        <?php
                            $sql_raw_material = "SELECT * FROM pms_suppliers_product WHERE pms_suprod_finishproduct = 0 AND pms_suprod_suppliername = '$supplier'";
                            $sql_rm = mysqli_query($GLOBALS["___mysqli_ston"], $sql_raw_material);
                            while ($row_rm=mysqli_fetch_array($sql_rm)) {
                            $pms_raw_material_id = $row_rm['pms_id'];
                            $pms_raw_material_item = $row_rm['pms_suprod_itemname'];
                            $pms_raw_material_cost = $row_rm['pms_suprod_cost'];
                            $pms_raw_material_quantity = $row_rm['pms_suprod_quantity'];

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
                    <input type="number" class="form-control input-focus" id="pms_cost" name="pms_cost" placeholder="0.00" readonly>
                </div>
                </div>


            </div>

            <div style="text-align: center;">
                <button type="submit" style="border-radius: 20px;" class="btn btn-lg btn-success">Save</button>&nbsp;&nbsp;
                <button type="button" style="border-radius: 20px;" class="btn btn-lg btn-danger" onclick="document.getElementById('purchaseOrderDetailModal').style.display='none'" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
            </div>
        </div>
    </div>
</div>
</form>

<form method="POST">
<div id="deletePurchaseOrderDetailListModal" class="w3-modal">
    <div class="w3-modal-content" style="width: 700px; margin-left: 350px; margin-top: 110px;">
        <div class="w3-container">
        <span onclick="document.getElementById('deletePurchaseOrderDetailListModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

        <input type="hidden" name="deletestatus_detail" id="deletestatus_detail">
        <input type="hidden" name="deletekey_detail" id="deletekey_detail">
            <center><br>
            <h2>Do you want to Delete?</h2><br>

            <button type="submit" style="border-radius: 20px;" class="btn btn-success">Yes</button>&nbsp;&nbsp;
            <button type="button" style="border-radius: 20px;" class="btn btn-danger" onclick="document.getElementById('deletePurchaseOrderDetailListModal').style.display='none'">No</button><br><br><br>
            </center>

        </div>
    </div>
</div>
</form>

<form method="POST">
<div id="deleteBtnPurchaseOrderHeaderListModal" class="w3-modal">
    <div class="w3-modal-content" style="width: 700px; margin-left: 350px; margin-top: 110px;">
        <div class="w3-container">
        <span onclick="document.getElementById('deleteBtnPurchaseOrderHeaderListModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

        <input type="hidden" name="deletestatus" id="deletestatus">
        <input type="hidden" name="deletekey" id="deletekey">
            <center><br>
            <h2>Do you want to Delete?</h2><br>

            <button type="submit" style="border-radius: 20px;" class="btn btn-success">Yes</button>&nbsp;&nbsp;
            <button type="button" style="border-radius: 20px;" class="btn btn-danger" onclick="document.getElementById('deleteBtnPurchaseOrderHeaderListModal').style.display='none'">No</button><br><br><br>
            </center>

        </div>
    </div>
</div>
</form>

<form method="POST">
<div id="postedAssembleModal" class="w3-modal">
    <div class="w3-modal-content" style="width: 700px; margin-left: 350px; margin-top: 110px;">
        <div class="w3-container">
        <span onclick="document.getElementById('postedAssembleModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

        <input type="hidden" name="inputstatus_posted_assemble" id="inputstatus_posted_assemble">
        <input type="hidden" name="inputkey_posted_purchase_order" id="inputkey_posted_purchase_order">
            <center><br>
            <h2>Do you want to post this Purchase Order?</h2><br>
            <h2>Note: Once you post this Purchase Order you cannot post it.</h2> <br>
            <button type="submit" id="postedAssembleYes" style="border-radius: 20px;" class="btn btn-success">Yes</button>&nbsp;&nbsp;
            <button type="button" style="border-radius: 20px;" class="btn btn-danger" onclick="document.getElementById('postedAssembleModal').style.display='none'">No</button><br><br><br>
            </center>

        </div>
    </div>
</div>
</form>

<div id="PurchaseOrderListModal" class="w3-modal">
  <div class="w3-modal-content" style="margin-top: -70px; margin-left: 100px; width: 1300px;">
    <div class="w3-container">

      <br>
      <center>
      <h4 class="modal-title"><span id="PurchaseOrderListModaltitle"></span></h4>
      </center>

      <br><br>
      <span onclick="document.getElementById('PurchaseOrderListModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

    <h4 class="card-title">Save As</h4>
      <table id="DataTableAssembleList"
             class="display nowrap table table-hover table-striped table-bordered"
             cellspacing="0" >
                <thead>
                    <tr>
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">Purchase Order ID</th>
                        <th style="text-align: center;">Supplier</th>
                        <th style="text-align: center;">Paid</th>
                        <th style="text-align: center;">Bank Name</th>
                        <th style="text-align: center;">Bank Account No.</th>
                        <th style="text-align: center;">Bank Account Name</th>
                        <th style="text-align: center;">Due Date</th>
                        <th style="text-align: center;">Date/Time Created</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>

                <tbody>

                  <?php
                  $sql_query_header_list = "SELECT t1.pms_id AS pms_hid, t1.pms_po_number, t1.pms_date, t1.pms_duedate, t1.pms_supplier, t1.pms_total,
                  t1.pms_paid, t1.pms_posted, t1.pms_posteddate,
                  t1.pms_checkno, t1.pms_checkdate, t1.pms_bankname, t1.pms_bankaccountno, t1.pms_bankaccountname,t1.pms_remarks,
                  t2.pms_id AS pms_did, t2.pms_fullname, t2.pms_address, t2.pms_phone, t2.pms_email, t2.pms_image, t2.pms_terms, t2.pms_created
                  FROM pms_purchaseorderheader AS t1
                  INNER JOIN pms_suppliers AS t2
                  ON t2.pms_fullname = t1.pms_supplier";

                  $sql = mysqli_query($GLOBALS["___mysqli_ston"], $sql_query_header_list);
                  $header_count = 0;
                  while ($row=mysqli_fetch_array($sql)) {
                  $dp_pms_posted = $row['pms_posted'];
                  $header_count++;
                  ?>
                        <tr>

                        <td style="color: #000; text-align: center;"><?php echo $header_count;?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_po_number'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_fullname'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_paid'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_bankname'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_bankaccountno'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_bankaccountname'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_duedate'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_date'];?></td>

                        <td style="color: #000; text-align: center;">

                       <button onclick="viewPurchaseOrderHeader('<?php echo $row['pms_hid'] ; ?>',
                                                                '<?php echo $row['pms_duedate'] ?>',
                                                                '<?php echo $row['pms_fullname'] ?>',
                                                                '<?php echo $row['pms_total'] ?>',
                                                                '<?php echo $row['pms_paid'] ?>',
                                                                '<?php echo $row['pms_posted'] ?>',
                                                                '<?php echo $row['pms_checkno'] ?>',
                                                                '<?php echo $row['pms_checkdate'] ?>',
                                                                '<?php echo $row['pms_bankname'] ?>',
                                                                '<?php echo $row['pms_bankaccountno'] ?>',
                                                                '<?php echo $row['pms_bankaccountname'] ?>',
                                                                '<?php echo $row['pms_remarks'] ?>');"
                                    href="#purchaseOrderHeaderModal<?php echo $row['pms_hid'];?>"
                                    data-target="#purchaseOrderHeaderModal"
                                    style="color: #ffffff; background-color: #a53cd8;"
                                    class="btn btn-primary"><i class="icon-eye icon-large"> View</i></button>&nbsp;

                        <?php
                        if ($dp_pms_posted != "1"){
                            echo '<button
                                   onclick="deletePOM('. $row['pms_hid'] . ');"
                                   class="btn"
                                   id="deletePOMBtn"
                                   href="#deleteBtnPurchaseOrderHeaderListModal"
                                   data-target="#deleteBtnPurchaseOrderHeaderListModal"
                                   style="color:#fff;
                                   background-color: #ba1307; color: #ffffff;">
                                   <i class="icon-trash icon-large"></i> Delete</button>' ;
                        }
                        ?>
                        <!-- <button onclick="deletePOM('<?php echo $row['pms_hid'] ; ?>');"
                                href="#deleteBtnPurchaseOrderHeaderListModal<?php echo $row['pms_hid'];?>"
                                id="deletePOMBtn"
                                style="background-color: #ba1307; color: #ffffff;"
                                class="btn"><i class="icon-trash icon-large"> Delete</i></button> -->
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
        $('#pms_cost').val(z2) ;
        $("#remainingQuantity").html("Remaining Quantity: " + z3) ;
        // $('#pms_unitprice').val(z3) ;
    });

    document.getElementById("savePurchaseOrderBtn").style.visibility = "hidden";
    document.getElementById("cancelPurchaseOrderBtn").style.visibility = "hidden";

    function printPurchaseOrder(pso_key){
        location.href = 'http://localhost/PMS/8080/pms_purchase_order_reports_print2.php?pms_hid=' + pso_key ;
    };

    function postedPurchaseOrder(p_key){
        document.getElementById('postedAssembleModal').style.display='block';
            $("#inputstatus_posted_assemble").val("ppom") ;
            $("#inputkey_posted_purchase_order").val(p_key) ;
    };

    function closeWindow(){
        document.getElementById("PurchaseOrderListModal").style.display="none";
        document.getElementById("savePurchaseOrderBtn").style.visibility = "visible";
        document.getElementById("cancelPurchaseOrderBtn").style.visibility = "visible";
    };

    function listPurchaseOrder()
    {
      document.getElementById('PurchaseOrderListModal').style.display='block';

          $("#PurchaseOrderListModaltitle").html("PURCHASE ORDER LIST HEADER") ;
        //   $("#inputstatus").val("addsupplier") ;
        //   $("#pms_fullname").val("") ;

    };

    function addPurchaseOrderHeader()
    {
          document.getElementById('purchaseOrderHeaderModal').style.display='block';
          $("#purchaseOrderHeaderModalTitle").html("ADD PURCHASE ORDER HEADER") ;
          $("#inputstatus").val("purchaseOrderHeaderAdd") ;
          $("#pms_duedate").val("") ;
          $("#pms_supplier").val("") ;
          $("#pms_paid").val("") ;
          $("#pms_total").val("") ;
          $("#pms_posted").val("") ;
          $("#pms_checkno").val("") ;
          $("#pms_checkdate").val("") ;
          $("#pms_bankname").val("") ;
          $("#pms_bankaccountno").val("") ;
          $("#pms_bankaccountname").val("") ;
          $("#pms_remarks").val("") ;

    };

    function addPurchaseOrderDetail(a_key)
    {
          document.getElementById('purchaseOrderDetailModal').style.display='block';
          $("#purchaseOrderDetailModalTitle").html("ADD PURCHASE ORDER DETAIL") ;
          $("#inputstatus2").val("purchaseOrderDetailAdd") ;
          $("#inputkey2").val(a_key) ;
          $("#pms_purchaseorder").val(a_key) ;
          $("#pms_rm_sku").val("") ;
          $("#pms_qty").val("") ;
          $("#pms_cost").val("") ;
    };

    function editPOH(e_key,e_duedate,e_supplier,e_total,e_paid,e_posted,e_checkno,
        e_checkdate,e_bankname,e_bankaccountno,e_bankaccountname,e_remarks){

    // document.getElementById("PurchaseOrderListModal").style.display="none";
    document.getElementById('purchaseOrderHeaderModal').style.display='block';

    $("#purchaseOrderHeaderModalTitle").html("EDIT PURCHASE ORDER HEADER") ;
    $("#inputstatus").val("eaph") ;
    $("#inputkey").val(e_key) ;
    $("#pms_duedate").val(e_duedate) ;
    $("#pms_supplier").val(e_supplier) ;
    $("#pms_total").val(e_total) ;
    $("#pms_paid").val(e_paid) ;
    $("#pms_posted").val(e_posted) ;
    $("#pms_checkno").val(e_checkno) ;
    $("#pms_checkdate").val(e_checkdate) ;
    $("#pms_bankname").val(e_bankname) ;
    $("#pms_bankaccountno").val(e_bankaccountno) ;
    $("#pms_bankaccountname").val(e_bankaccountname) ;
    $("#pms_remarks").val(e_remarks) ;
    // $("#pms_posted option[value=" + e_posted + "]").attr('selected', 'selected');

    };
    function editPOD(ed_key,ed_purchaseorder,ed_rm_sku,ed_qty,ed_cost){
    document.getElementById('purchaseOrderDetailModal').style.display='block';

    $("#purchaseOrderDetailModalTitle").html("EDIT PURCHASE ORDER DETAIL") ;
    $("#inputstatus2").val("eapd") ;
    $("#inputkey2").val(ed_key) ;
    $("#pms_purchaseorder").val(ed_purchaseorder) ;
    $("#pms_rm_sku").val(ed_rm_sku) ;
    $("#pms_qty").val(ed_qty) ;
    $("#pms_cost").val(ed_cost) ;
    };

    function viewPurchaseOrderHeader(key,duedate,supplier,total,paid,posted,checkno,
                                    checkdate,bankname,bankaccountno,bankaccountname,remarks)
    {
          document.getElementById("PurchaseOrderListModal").style.display="none";
          document.getElementById('purchaseOrderHeaderModal').style.display='block';

          $("#purchaseOrderHeaderModalTitle").html("EDIT PURCHASE ORDER HEADER") ;
          $("#inputstatus").val("editPurchaseOrderHeader") ;
          $("#inputkey").val(key) ;
          $("#pms_duedate").val(duedate) ;
          $("#pms_supplier").val(supplier) ;
          $("#pms_total").val(total) ;
          $("#pms_paid").val(paid) ;
          $("#pms_checkno").val(checkno) ;
          $("#pms_checkdate").val(checkdate) ;
          $("#pms_bankname").val(bankname) ;
          $("#pms_bankaccountno").val(bankaccountno) ;
          $("#pms_bankaccountname").val(bankaccountname) ;
          $("#pms_remarks").val(remarks) ;

          document.getElementById('purchaseOrderHeaderModal').style.display='none';
          document.getElementById("addBtnPurchaseOrderHeader").style.visibility = "hidden";

          window.location.href = "http://localhost/PMS/8080/pms_purchase_order.php?id="+key+"&supplier="+supplier;
    };

    function deletePOM(key){
          document.getElementById("PurchaseOrderListModal").style.display="none";
          document.getElementById('deleteBtnPurchaseOrderHeaderListModal').style.display='block';
          $("#deletestatus").val("purchaseOrderListDelete") ;
          $("#deletekey").val(key) ;
    };

    function deletePODM(key){
        document.getElementById('deletePurchaseOrderDetailListModal').style.display='block';
        $("#deletestatus_detail").val("purchaseOrderDetailListDelete") ;
        $("#deletekey_detail").val(key) ;
    };

</script>

// <script src="js/lib/jquery/jquery.min.js"></script>
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
