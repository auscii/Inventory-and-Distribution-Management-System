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


if (isset($_POST["pms_fp_sku"])) {
    $pms_fp_sku = $_POST['pms_fp_sku'];
} else {
    $pms_fp_sku = "";
}

if (isset($_POST["pms_datetime"])) {
    $pms_datetime = $_POST['pms_datetime'];
} else {
    $pms_datetime = "";
}


if (isset($_POST["pms_joborder"])) {
    $pms_joborder = $_POST['pms_joborder'];
} else {
    $pms_joborder = "";
}

if (isset($_POST["pms_remarks"])) {
    $pms_remarks = $_POST['pms_remarks'];
} else {
    $pms_remarks = "";
}

if (isset($_POST["pms_assembleby"])) {
    $pms_assembleby = $_POST['pms_assembleby'];
} else {
    $pms_assembleby = "";
}

// if (isset($_POST["pms_checkedby"])) {
//     $pms_checkedby = $_POST['pms_checkedby'];
// } else {
//     $pms_checkedby = "";
// }

if (isset($_POST["pms_supervisor"])) {
    $pms_supervisor = $_POST['pms_supervisor'];
} else {
    $pms_supervisor = "";
}

if (isset($_POST["pms_posted"])) {
    $pms_posted = $_POST['pms_posted'];
} else {
    $pms_posted = "";
}

if (isset($_POST["pms_assemble"])) {
    $pms_assemble = $_POST['pms_assemble'];
} else {
    $pms_assemble = "";
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


if (isset($_POST["inputkey_posted_assemble"])) {
    $key_posted_assemble = $_POST['inputkey_posted_assemble'];
   } else {
    $key_posted_assemble = "";
  }
if (isset($_POST["inputstatus_posted_assemble"])) {
  $pms_mode_posted_assemble = $_POST['inputstatus_posted_assemble'];
 } else {
  $pms_mode_posted_assemble = "";
}


if(isset($_POST['pms_expiration_date'])){
    $pms_expiration_date = $_POST['pms_expiration_date'];
} else {
    $pms_expiration_date = "";
}

if ($pms_mode=="assembleProductHeaderAdd") {
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
    pms_assembleheader
    (
    pms_fp_sku,
    pms_joborder,
    pms_remarks,
    pms_assembleby,
    pms_supervisor,
    pms_posted,
    pms_expiration_date
    )
    VALUES
    (
    '$pms_fp_sku',
    '$pms_joborder',
    '$pms_remarks',
    '$pms_assembleby',
    '$pms_supervisor',
    '0',
    '$pms_expiration_date'
    )");

}

if ($pms_mode2=="assembleProductDetailAdd") {
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
    pms_assembledetails
    (
    pms_assemble,
    pms_rm_sku,
    pms_qty
    )
    VALUES
    (
    '$pms_assemble',
    '$pms_rm_sku',
    '$pms_qty'
    )");

    //xyz

     // $sql_rm = "SELECT * FROM pms_rawmaterials WHERE pms_item";

     // $sql_raw_material = "SELECT pms_item FROM pms_rawmaterials WHERE pms_finishedproduct = 0";
     // $sql_rm = mysqli_query($GLOBALS["___mysqli_ston"], $sql_raw_material);
     // while ($row_rm=mysqli_fetch_array($sql_rm)) {
     // $pms_raw_material_id = $row_rm['pms_id'];
     // $pms_raw_material_item = $row_rm['pms_item'];

             $con=mysqli_query($GLOBALS["___mysqli_ston"],
             "INSERT INTO
             pms_activitylogs
             (
             pms_user,
             pms_date,
             pms_action,
             pms_position
             )
             VALUES
             (
             '$pms_user',
             NOW(),
             'Added $pms_rm_sku (Assemble Product)',
             '$pms_usertype'
             )");
         // }
    //
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
   "UPDATE pms_assembleheader
    SET pms_fp_sku='$pms_fp_sku',
        pms_joborder='$pms_joborder',
        pms_remarks='$pms_remarks',
        pms_assembleby='$pms_assembleby',
        pms_supervisor='$pms_supervisor',
        pms_posted='0',
        pms_expiration_date='$pms_expiration_date'
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
  $con=mysqli_query($GLOBALS["___mysqli_ston"], "
    UPDATE pms_assembledetails
    SET pms_rm_sku='$pms_rm_sku',
        pms_qty='$pms_qty'
    WHERE pms_id = $key2");
}

if ($pms_deletemode=="assembleheaderlistdelete") {
    echo '
    <div id="myModal">
        <div class="modal-dialog" style="margin-left: -50px;">
            <div class="modal-content">
                <div class="modal-header">


                </div>
                    <div class="modal-body">
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-trash"></i> Successfully Deleted! </h4>
                    </div>
                    <div class="modal-footer">
                        <button onclick="document.getElementById(&#39;myModal&#39;).style.display=&#39;none&#39;" class="btn btn-primary" type="button">Close</button>
                    </div>
            </div>
        </div>
    </div>
            ';
  $con=mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM pms_assembleheader WHERE pms_id = $deletekey");
  $con=mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM pms_assembledetails WHERE pms_assemble = $deletekey");
}

if ($pms_deletemode_detail=="assembledetaillistdelete") {
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
  $con=mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM pms_assembledetails WHERE pms_id = $deletekey_detail");
}


if ($pms_mode_posted_assemble=="pam") {
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
  "UPDATE pms_assembleheader
   SET pms_posted = 1
   WHERE pms_id = $key_posted_assemble");

   $sql_post = "SELECT pms_id, pms_fp_sku, pms_datetime, pms_joborder,
                pms_remarks, pms_assembleby,
                pms_supervisor, pms_posted
                FROM pms_assembleheader
                WHERE pms_id = '$key_posted_assemble'";

    $sql = mysqli_query($GLOBALS["___mysqli_ston"], $sql_post);
    while ($row=mysqli_fetch_array($sql)) {
            // pms_header
            $post_pms_header_id = $row['pms_id'];
            $post_pms_fp_sku = $row['pms_fp_sku'];
            $post_pms_joborder = $row['pms_joborder'];
            $post_pms_remarks = $row['pms_remarks'];
            $post_pms_assembleby = $row['pms_assembleby'];
            // $post_pms_checkedby = $row['pms_checkedby'];
            $post_pms_supervisor = $row['pms_supervisor'];
            $post_pms_posted = $row['pms_posted'];

            $con=mysqli_query($GLOBALS["___mysqli_ston"],
            "INSERT INTO
            pms_finishingheader
            (
            pms_fp_sku,
            pms_joborder,
            pms_production_qty,
            pms_remarks,
            pms_supervisor,
            pms_posted,
            pms_checkedby
            )
            VALUES
            (
            '$post_pms_fp_sku',
            '$post_pms_joborder',
            '0',
            '$post_pms_remarks',
            '$post_pms_supervisor',
            '0',
            '$pms_user'
            )");
        }

    $sql_post = "SELECT t1.pms_id AS pms_hid, t1.pms_fp_sku, t1.pms_datetime, t1.pms_joborder,
    t1.pms_remarks, t1.pms_assembleby, t1.pms_checkedby,
    t1.pms_supervisor, t1.pms_posted,
    t2.pms_id AS pms_did, t2.pms_assemble, t2.pms_rm_sku, t2.pms_date, t2.pms_qty,
    t3.pms_sku, t3.pms_item, t3.pms_description
    FROM pms_assembleheader AS t1
    INNER JOIN pms_assembledetails AS t2
    ON t1.pms_id = t2.pms_assemble
    INNER JOIN pms_rawmaterials AS t3
    ON t2.pms_rm_sku = t3.pms_id
    WHERE t1.pms_id = '$key_posted_assemble'";

    $sql = mysqli_query($GLOBALS["___mysqli_ston"], $sql_post);

    while ($row=mysqli_fetch_array($sql)) {
            // pms_detail
            $post_pms_detail_id = $row['pms_did'];
            $post_pms_assemble = $row['pms_assemble'];
            $post_pms_rm_sku = $row['pms_rm_sku'];
            $post_pms_date = $row['pms_date'];
            $post_pms_qty = $row['pms_qty'];

            $post_pms_item = $row['pms_item'];

            $con=mysqli_query($GLOBALS["___mysqli_ston"],
            "INSERT INTO
            pms_finishingdetails
            (
            pms_finishing,
            pms_rm_sku,
            pms_qty
            )
            VALUES
            (
            '$post_pms_assemble',
            '$post_pms_rm_sku',
            '$post_pms_qty'
            )");

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
            'Assemble Product',
            '$key_posted_assemble',
            '$pms_user'
            )");
        }
}



$pms_remarks_dp = "";
$pms_posted_dp = "";
$pms_assembleby_dp = "";
$pms_checkedby_dp = "";
$pms_supervisor_dp = "";
$pms_total_dp = "";
$pms_expiration_date_dp = "";
$title_total_dp = "";
$title_remark_dp = "";
$title_posted_dp = "";
$title_assembleby_dp = "";
$title_checkedby_dp = "";
$title_supervisor_dp = "";
$title_pms_expiration_date_dp = "";


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
    <title>Assemble Product| Inventory and Distribution Management System</title>
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
            <?php include ("includes/pms_sidebar_warehouseman.php");?>
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Assemble Product</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Assemble</li>
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
                    onclick="listassemble();"
                    class="btn"
                    href="#assembleListModal"
                    data-target="#assembleListModal"
                    style="color:#FFF; background-color: #a53cd8"
                    >
                    <i class="fa fa-list"></i> ASSEMBLE LIST
                    </button> &nbsp;&nbsp;

                    <button
                    onclick="addAssembleProductHeader();"
                    class="btn btn-primary"
                    href="#assembleProductHeaderModal"
                    data-target="#assembleProductHeaderModal"
                    id="addBtnAProductHeader"
                    style="color:#fff;"
                    >
                    <i class="fa fa-plus"></i> ADD NEW ASSEMBLE (HEADER)
                    </button>

                  </div>

        <?php
        $sql_query_header = "SELECT t1.pms_id AS pms_hid, t1.pms_fp_sku, t1.pms_datetime, t1.pms_joborder,
        t1.pms_remarks, t1.pms_assembleby, t1.pms_checkedby,
        t1.pms_supervisor, t1.pms_posted, t1.pms_expiration_date,
        t2.pms_id, t2.pms_sku, t2.pms_item, t2.pms_description
        FROM pms_assembleheader AS t1
        INNER JOIN pms_rawmaterials AS t2
        ON t1.pms_fp_sku = t2.pms_id
        WHERE t1.pms_id = '$id'";
        $sql2 = mysqli_query($GLOBALS["___mysqli_ston"], $sql_query_header);
        while ($row2=mysqli_fetch_array($sql2)) {
            $pms_id_dp = $row2['pms_hid'];
            $pms_datetime_dp = $row2['pms_datetime'];
            $pms_joborder_dp = $row2['pms_joborder'];
            $pms_fp_sku_dp = $row2['pms_fp_sku'];
            $pms_remarks_dp = $row2['pms_remarks'];
            $pms_posted_dp = $row2['pms_posted'];
            $pms_assembleby_dp = $row2['pms_assembleby'];
            // $pms_checkedby_dp = $row2['pms_checkedby'];
            $pms_supervisor_dp = $row2['pms_supervisor'];
            $pms_expiration_date_dp = $row2['pms_expiration_date'];
            

            $pms_total_dp = "0.00";
            $title_total_dp = "Total Quantity";
            $title_remark_dp = "Remarks";
            $title_posted_dp = "Posted";
            $title_assembleby_dp = "Assemble by";
            $title_checkedby_dp = "Checked by";
            $title_supervisor_dp = "Supervisor";
            $title_pms_expiration_date_dp = "Expiration Date";

            $pms_item = $row2['pms_item'];

            if ($pms_posted_dp == "1"){
                $pms_posted_dp = "Yes";
            }
            if ($pms_posted_dp == "0"){
                $pms_posted_dp = "No";
            }
        ?>

        <div class="card-body" style="margin-top: -34px; margin-left: 550px;">
                    <button
                        onclick="editAPH('<?php echo $row2['pms_hid'] ; ?>',
                                        '<?php echo $row2['pms_fp_sku'] ?>',
                                        '<?php echo $row2['pms_joborder'] ?>',
                                        '<?php echo $row2['pms_remarks'] ?>',
                                        '<?php echo $row2['pms_assembleby'] ?>',
                                        '<?php echo $row2['pms_supervisor'] ?>');"
                        class="btn"
                        href="#assembleProductHeaderModal"
                        data-target="#assembleProductHeaderModal"
                        style="color:#fff; background-color: #3bdb39;"
                    >
                    <i class="fa fa-pencil"></i> EDIT ASSEMBLE (HEADER)
                    </button>
                    &nbsp; &nbsp;

                    <?php
                        if ($pms_posted_dp != "Yes"){


                            echo '<button
                                   onclick="postedAssemble('. $row2['pms_hid'] . ');"
                                   class="btn"
                                   href="#postedAssembleModal"
                                   style="color:#fff;
                                   background-color: #ba1307;">
                                   <i class="fa fa-check-square-o"></i> POST ASSEMBLE</button>' ;
                        }
                    ?>
                     <br> <br>

                     <script>
                        function tezt(a1,a2,a3,a4,a5,a6,a7){
                            document.getElementById('assembleProductHeaderModal').style.display='block';
                        }
                     </script>
        </div>
        <form method="">

          <div class="form-group" style="width: 450px;">
            <label class="control-label col-lg-7" style="font-size: 20px; font-weight: bold;">Assemble ID</label>
            <div class="col-lg-9">
                <h4> <?php echo $pms_id_dp; ?> </h4>
            </div>
          </div> <br>

          <div class="form-group" style="position: absolute; width: 350px; margin-top: -20px;">
            <label class="control-label col-lg-9" style="font-size: 20px; font-weight: bold;">Assemble Date/Time</label>
            <div class="col-lg-9">
                <h4> <?php echo $pms_datetime_dp; ?> </h4>
            </div>
          </div> <br>

          <div class="form-group" style="position: absolute; right: 0px; width: 450px; margin-top: -110px;">
            <label class="control-label col-lg-7" style="font-size: 20px; font-weight: bold;">Job order</label>
            <div class="col-lg-9">
                <h4> <?php echo $pms_joborder_dp; ?> </h4>
            </div>
          </div>

          <div class="form-group" style="position: absolute; right: 0px; margin-top: -40px; width: 450px;">
            <label class="control-label col-lg-7" style="font-size: 20px; font-weight: bold;">Item/Product Name</label>
            <div class="col-lg-9">
                <h4> <?php echo $pms_item; ?> </h4>
            </div>
          </div>

        </form><br><br>

        <div class="card-body" >
            <button
                        onclick="addAssembleProductDetail('<?php echo $row2['pms_hid'] ; ?>');"
                        class="btn btn-primary"
                        href="#assembleProductDetailModal"
                        data-target="#assembleProductDetailModal"
                        style="color:#fff;"
                        >
                        <i class="fa fa-plus"></i> ADD NEW ASSEMBLE (DETAIL)
            </button> &nbsp;&nbsp;

        </div>

        <?php } ?>

 <!-- 1st Table -->
        <h4 class="card-title">Save As</h4>
            <table id="DataTable1" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">Item (Raw Material)</th>
                        <th style="text-align: center;">Quantity</th>
                        <th style="text-align: center;">Date</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>

                <tbody>

                  <?php
                    $totalquantity = 0;
                    $sql_query_detail_total_quantity = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT SUM(pms_qty) AS total_qty FROM pms_assembledetails WHERE pms_assemble = '$id'");
                    while ($rowquantity=mysqli_fetch_array($sql_query_detail_total_quantity)) {
                          $totalquantity = $rowquantity['total_qty'];
                    }
                    $sql_query_detail = "SELECT t1.pms_id AS pms_hid, t1.pms_fp_sku, t1.pms_datetime, t1.pms_joborder,
                    t1.pms_remarks, t1.pms_assembleby, t1.pms_checkedby,
                    t1.pms_supervisor, t1.pms_posted,
                    t2.pms_id AS pms_did, t2.pms_assemble, t2.pms_rm_sku, t2.pms_date, t2.pms_qty,
                    t3.pms_sku, t3.pms_item, t3.pms_description
                    FROM pms_assembleheader AS t1
                    INNER JOIN pms_assembledetails AS t2
                    ON t1.pms_id = t2.pms_assemble
                    INNER JOIN pms_rawmaterials AS t3
                    ON t2.pms_rm_sku = t3.pms_id
                    WHERE t1.pms_id = '$id'";

                    $sql = mysqli_query($GLOBALS["___mysqli_ston"], $sql_query_detail);
                    $detail_count = 0;
                    while ($row=mysqli_fetch_array($sql)) {
                    $detail_count++;
                  ?>

                        <tr>

                        <td style="color: #000; text-align: center;"><?php echo $detail_count;?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_item'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_qty'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_date'];?></td>

                        <td style="color: #000; text-align: center;">

                        <button onclick="editAPD('<?php echo $row['pms_did'] ; ?>',
                                                 '<?php echo $row['pms_rm_sku'] ?>',
                                                 '<?php echo $row['pms_qty'] ?>');"
                                    href="#assembleProductDetailModal"
                                    id="editAPDbtn"
                                    data-target="#assembleProductDetailModal"
                                    style="background-color: #3bdb39; color: #ffffff;"
                                    class="btn"><i class="icon-pencil icon-large"> Edit</i></button>

                        &nbsp;
                        <?php
                        if ($pms_posted_dp != "Yes"){
                            echo '<button
                                   onclick="deleteADM('. $row['pms_did'] . ');"
                                   class="btn"
                                   href="#deleteAssembleDetailListModal"
                                   data-target="#deleteAssembleDetailListModal"
                                   style="background-color: #ba1307; color: #ffffff;">
                                   <i class="icon-trash icon-large"></i> Delete</button>' ;
                        }
                        ?>
                        </td>

                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

                        <br> <br> <br> <br>
                    <form method="">

                        <div class="form-group" style="width: 450px; margin-top: -50px;">
                            <label class="control-label col-lg-7" style="font-size: 20px; font-weight: bold;"><?php echo $title_total_dp; ?></label>
                            <div class="col-lg-9">
                                <h4> <?php echo $totalquantity; ?> </h4>
                            </div>
                        </div> <br>

                        <div class="form-group" style="width: 450px; margin-top: -20px;">
                            <label class="control-label col-lg-7" style="font-size: 20px; font-weight: bold;"><?php echo $title_pms_expiration_date_dp; ?></label>
                            <div class="col-lg-9">
                                <h4> <?php echo $pms_expiration_date_dp; ?> </h4>
                            </div>
                        </div> <br>


                        <div class="form-group" style="position: absolute; width: 350px; margin-top: -20px;">
                            <label class="control-label col-lg-7" style="font-size: 20px; font-weight: bold;"><?php echo $title_remark_dp; ?></label>
                            <div class="col-lg-9">
                                <h4> <?php echo $pms_remarks_dp; ?> </h4>
                            </div>
                        </div> <br>

                        <div class="form-group" style="position: absolute; width: 350px; margin-top: 30px;">
                            <label class="control-label col-lg-7" style="font-size: 20px; font-weight: bold;"><?php echo $title_posted_dp; ?></label>
                            <div class="col-lg-9">
                                <h4> <?php echo $pms_posted_dp; ?> </h4>
                            </div>
                        </div> <br>

                        <div class="form-group" style="position: absolute; right: 0px; width: 450px; margin-top: -200px;">
                            <label class="control-label col-lg-7" style="font-size: 20px; font-weight: bold;"><?php echo $title_assembleby_dp; ?></label>
                            <div class="col-lg-9">
                                <h4> <?php echo $pms_assembleby_dp; ?> </h4>
                            </div>
                        </div>

                        <!-- <div class="form-group" style="position: absolute; right: 0px; margin-top: -80px; width: 450px;">
                            <label class="control-label col-lg-7" style="font-size: 20px; font-weight: bold;"><?php //echo $title_checkedby_dp; ?></label>
                            <div class="col-lg-9">
                                <h4> <?php //echo $pms_checkedby_dp; ?> </h4>
                            </div>
                        </div> -->

                        <div class="form-group" style="position: absolute; right: 0px; margin-top: -120px; width: 450px;">
                            <label class="control-label col-lg-7" style="font-size: 20px; font-weight: bold;"><?php echo $title_supervisor_dp; ?></label>
                            <div class="col-lg-9">
                                <h4> <?php echo $pms_supervisor_dp; ?> </h4>
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
<div id="assembleProductHeaderModal" class="w3-modal">
    <div class="w3-modal-content" style="width: 700px; height: 500px; margin-top: -40px; margin-left: 306px;">
        <div class="w3-container">
            <br>
            <center>
              <h4 class="modal-title"><span id="assembleProductHeaderModalTitle"></span></h4>
            </center>
        <span onclick="document.getElementById('assembleProductHeaderModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

        <input type="hidden" name="inputstatus" id="inputstatus">
        <input type="hidden" name="inputkey" id="inputkey">


            <div class="modal-body">
            <br>

                <div class="form-group" style="width: 850px;">
                <label class="control-label col-lg-5" >Finished Product SKU</label>
                <div class="col-lg-4">
                <select class="form-control input-focus" id="pms_fp_sku" name="pms_fp_sku">
                        <option value="" disabled selected>Select Finished Product SKU</option>
                        <?php
                            $sql_fp_sku = "SELECT * FROM pms_rawmaterials WHERE pms_finishedproduct = 1";
                            $sql_fp = mysqli_query($GLOBALS["___mysqli_ston"], $sql_fp_sku);
                            while ($row_fp_sku=mysqli_fetch_array($sql_fp)) {
                            $pms_fp_sku_id = $row_fp_sku['pms_id'];
                            $pms_fp_sku_item = $row_fp_sku['pms_item'];
                        ?>
                        <option value="<?php echo $pms_fp_sku_id; ?>"><?php echo $pms_fp_sku_item; ?></option>
                        <?php } ?>
                </select>
                </div>
                </div>

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Job Order</label>
                <div class="col-lg-4">
                <select class="form-control input-focus" id="pms_joborder" name="pms_joborder">
                        <option value="" disabled selected>Select Job Order ID</option>
                        <?php
                            $sql_jo = "SELECT * FROM pms_joborderheader";
                            $sql_j = mysqli_query($GLOBALS["___mysqli_ston"], $sql_jo);
                            while ($row_jo=mysqli_fetch_array($sql_j)) {
                            $pms_jo_no = $row_jo['pms_jo_no'];
                        ?>
                        <option value="<?php echo $pms_jo_no; ?>"><?php echo $pms_jo_no; ?></option>
                        <?php } ?>
                </select>
                    <!-- <input type="number" class="form-control input-focus" id="pms_joborder" name="pms_joborder" placeholder="Enter your Job order" required autofocus>   -->
                </div>
                </div>

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Remarks</label>
                <div class="col-lg-4">
                <textarea class="form-control input-focus" style="height: 90px;" id="pms_remarks" name="pms_remarks" placeholder="Enter Remarks" required></textarea>
                </div>
                </div> 
                
                <br>

                <div style="margin-left: 350px; margin-top: -305px;">

                <div class="form-group" style="width: 850px;">
                <label class="control-label col-lg-5" >Expiration Date</label>
                <div class="col-lg-4">
                    <input type="date" class="form-control input-focus" id="pms_expiration_date" name="pms_expiration_date" required autofocus>
                </div>
                </div>

                  <div class="form-group" style="width: 850px;">
                  <label class="control-label col-lg-5" >Assemble by</label>
                  <div class="col-lg-4">
                      <input type="text" class="form-control input-focus" id="pms_assembleby" name="pms_assembleby" value="<?php echo $pms_user; ?>" readonly>
                  </div>
                </div>

                <!-- <div class="form-group" style="width: 850px;">
                <label class="control-label col-lg-5" >Checked by</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control input-focus" id="pms_checkedby" name="pms_checkedby" placeholder="Checked by:" required autofocus>
                </div>
                </div> -->

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Supervisor</label>
                <div class="col-lg-4">
                    <select class="form-control input-focus" id="pms_supervisor" name="pms_supervisor">
                            <option value="" disabled selected>Select Supervisor</option>
                            <?php
                                $sql_fp_sku = "SELECT * FROM pms_users WHERE pms_usertype = 'Supervisor'";
                                $sql_fp = mysqli_query($GLOBALS["___mysqli_ston"], $sql_fp_sku);
                                while ($row=mysqli_fetch_array($sql_fp)) {
                                // $pms_fp_sku_id = $row['pms_id'];
                                $pms_fullname = $row['pms_fullname'];
                            ?>
                            <option value="<?php echo $pms_fullname; ?>"><?php echo $pms_fullname; ?></option>
                            <?php } ?>
                    </select>
                    <!-- <input type="text" class="form-control input-focus" id="pms_supervisor" name="pms_supervisor" placeholder="Enter Supervisor" required autofocus> -->
                </div>
                </div>

                </div>


            <div style="text-align: center; margin-top: 105px;">
                <button type="submit" style="border-radius: 20px;" class="btn btn-lg btn-success">Save</button>&nbsp;&nbsp;
                <button type="button" style="border-radius: 20px;" class="btn btn-lg btn-danger" onclick="document.getElementById('assembleProductHeaderModal').style.display='none'" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
            </div>
        </div>
    </div>
</div>
</form>


<form method="POST">
<div id="assembleProductDetailModal" class="w3-modal">
    <div class="w3-modal-content" style="width: 370px; height: 355px; margin-top: 40px; margin-left: 470px;">
        <div class="w3-container"style="">
            <br>
            <center>
              <h4 class="modal-title"><span id="assembleProductDetailModalTitle"></span></h4>
            </center>
        <span onclick="document.getElementById('assembleProductDetailModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

        <input type="hidden" name="inputstatus2" id="inputstatus2">
        <input type="hidden" name="inputkey2" id="inputkey2">

            <div class="modal-body" >
            <br>
                <div class="form-group" style="width: 850px;">
                <div class="col-lg-4">
                    <input type="hidden" class="form-control input-focus" id="pms_assemble" name="pms_assemble">
                </div>
                </div>

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Raw Material SKU</label>
                <div class="col-lg-4">
                    <select class="form-control input-focus" id="pms_rm_sku" name="pms_rm_sku">
                        <option value="" disabled selected>Select Raw Material SKU</option>
                        <?php
                            $sql_raw_material = "SELECT * FROM pms_rawmaterials WHERE pms_finishedproduct = 0";
                            $sql_rm = mysqli_query($GLOBALS["___mysqli_ston"], $sql_raw_material);
                            while ($row_rm=mysqli_fetch_array($sql_rm)) {
                            $pms_raw_material_id = $row_rm['pms_id'];
                            $pms_raw_material_item = $row_rm['pms_item'];
                        ?>
                        <option value="<?php echo $pms_raw_material_id; ?>"><?php echo $pms_raw_material_item; ?></option>
                        <?php } ?>
                    </select>

                    <!-- rrr -->
                    <!-- <input type="number" class="form-control input-focus" id="pms_rm_sku" name="pms_rm_sku" placeholder="Enter your Job order" required autofocus>   -->
                </div>
                </div>

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                <label class="control-label col-lg-5" >Quantity</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control input-focus" id="pms_qty" name="pms_qty" placeholder="Enter Quantity" required autofocus>
                </div>
                </div>

            </div>

            <div style="text-align: center;">
                <button type="submit" style="border-radius: 20px;" class="btn btn-lg btn-success">Save</button>&nbsp;&nbsp;
                <button type="button" style="border-radius: 20px;" class="btn btn-lg btn-danger" onclick="document.getElementById('assembleProductDetailModal').style.display='none'" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
            </div>
        </div>
    </div>
</div>
</form>

<form method="POST">
<div id="deleteAssembleDetailListModal" class="w3-modal">
    <div class="w3-modal-content" style="width: 700px; margin-left: 350px; margin-top: 110px;">
        <div class="w3-container">
        <span onclick="document.getElementById('deleteAssembleDetailListModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

        <input type="hidden" name="deletestatus_detail" id="deletestatus_detail">
        <input type="hidden" name="deletekey_detail" id="deletekey_detail">
            <center><br>
            <h2>Do you want to Delete?</h2><br>

            <button type="submit" style="border-radius: 20px;" class="btn btn-success">Yes</button>&nbsp;&nbsp;
            <button type="button" style="border-radius: 20px;" class="btn btn-danger" onclick="document.getElementById('deleteAssembleDetailListModal').style.display='none'">No</button><br><br><br>
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
        <input type="hidden" name="inputkey_posted_assemble" id="inputkey_posted_assemble">
            <center><br>
            <h2>Do you want to post this Assemble Product?</h2><br>
            <h2>Note: Once you post this Product you cannot post it.</h2> <br>
            <button type="submit" id="postedAssembleYes" style="border-radius: 20px;" class="btn btn-success">Yes</button>&nbsp;&nbsp;
            <button type="button" style="border-radius: 20px;" class="btn btn-danger" onclick="document.getElementById('postedAssembleModal').style.display='none'">No</button><br><br><br>
            </center>

        </div>
    </div>
</div>
</form>

<form method="POST">
<div id="deleteAssembleHeaderListModal" class="w3-modal">
    <div class="w3-modal-content" style="width: 700px; margin-left: 350px; margin-top: 110px;">
        <div class="w3-container">
        <span onclick="document.getElementById('deleteAssembleHeaderListModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

        <input type="hidden" name="deletestatus" id="deletestatus">
        <input type="hidden" name="deletekey" id="deletekey">
            <center><br>
            <h2>Do you want to Delete?</h2><br>

            <button type="submit" style="border-radius: 20px;" class="btn btn-success">Yes</button>&nbsp;&nbsp;
            <button type="button" style="border-radius: 20px;" class="btn btn-danger" onclick="document.getElementById('deleteAssembleHeaderListModal').style.display='none'">No</button><br><br><br>
            </center>

        </div>
    </div>
</div>
</form>

<div id="assembleListModal" class="w3-modal">
  <div class="w3-modal-content" style="margin-top: -70px; margin-left: 15px; width: 1300px;">
    <div class="w3-container">

      <br>
      <center>
      <h4 class="modal-title"><span id="assembleListModaltitle"></span></h4>
      </center>

      <br><br>
      <span onclick="document.getElementById('assembleListModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

    <h4 class="card-title">Save As</h4>
      <table id="DataTableAssembleList"
             class="display nowrap table table-hover table-striped table-bordered"
             cellspacing="0" >
                <thead>
                    <tr>
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">Item/Product Name</th>
                        <th style="text-align: center;">Job order ID</th>
                        <th style="text-align: center;">Assemble by</th>
                        <!-- <th style="text-align: center;">Checked by</th> -->
                        <th style="text-align: center;">Supervisor</th>
                        <th style="text-align: center;">Date/Time Created</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>

                <tbody>

                  <?php
                  $sql_query_header_list = "SELECT t1.pms_id AS pms_hid, t1.pms_fp_sku, t1.pms_datetime, t1.pms_joborder,
                  t1.pms_remarks, t1.pms_assembleby, t1.pms_checkedby,
                  t1.pms_supervisor, t1.pms_posted,
                  t2.pms_sku, t2.pms_item, t2.pms_description
                  FROM pms_assembleheader AS t1
                  INNER JOIN pms_rawmaterials AS t2
                  ON t1.pms_fp_sku = t2.pms_id ";
                  $sql = mysqli_query($GLOBALS["___mysqli_ston"], $sql_query_header_list);
                  $header_count = 0;
                  while ($row=mysqli_fetch_array($sql)) {
                  $pms_posted_dp = $row['pms_posted'];
                  $header_count++;
                  ?>
                        <tr>

                        <td style="color: #000; text-align: center;"><?php echo $header_count;?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_item'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_joborder'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_assembleby'];?></td>

                        <!-- <td style="color: #000; text-align: center;"><?php //echo $row['pms_checkedby'];?></td> -->

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_supervisor'];?></td>

                        <td style="color: #000; text-align: center;"><?php echo $row['pms_datetime'];?></td>

                        <td style="color: #000; text-align: center;">

                         <button onclick="viewAssembleProductHeader('<?php echo $row['pms_hid'] ; ?>',
                                                                    '<?php echo $row['pms_fp_sku'] ?>',
                                                                    '<?php echo $row['pms_joborder'] ?>',
                                                                    '<?php echo $row['pms_remarks'] ?>',
                                                                    '<?php echo $row['pms_assembleby'] ?>',
                                                                    '<?php echo $row['pms_supervisor'] ?>',
                                                                    '<?php echo $row['pms_posted'] ?>');"
                                    href="#assembleProductHeaderModal<?php echo $row['pms_hid'];?>"
                                    data-target="#assembleProductHeaderModal"
                                    style="color: #ffffff; background-color: #a53cd8;"
                                    class="btn btn-primary"><i class="icon-eye icon-large"> View</i></button>&nbsp;

                        <?php
                        if ($pms_posted_dp != "1"){
                            echo '<button
                                   onclick="deleteAHM('. $row['pms_hid'] . ');"
                                   class="btn"
                                   href="#deleteAssembleHeaderListModal"
                                   data-target="#deleteAssembleHeaderListModal"
                                   style="background-color: #ba1307; color: #ffffff;">
                                   <i class="icon-trash icon-large"></i> Delete</button>' ;
                        }

                        //eee
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

<script type="text/javascript">

    document.getElementById("saveAssembleBtn").style.visibility = "hidden";
    document.getElementById("cancelAssembleBtn").style.visibility = "hidden";

    function postedAssemble(p_key){
        document.getElementById('postedAssembleModal').style.display='block';
            $("#inputstatus_posted_assemble").val("pam") ;
            $("#inputkey_posted_assemble").val(p_key) ;
    };

    function closeWindow(){
        document.getElementById("assembleListModal").style.display="none";
        document.getElementById("saveAssembleBtn").style.visibility = "visible";
        document.getElementById("cancelAssembleBtn").style.visibility = "visible";
    };

    function listassemble()
    {
      document.getElementById('assembleListModal').style.display='block';
      $("#assembleListModaltitle").html("ASSEMBLE PRODUCT LIST HEADER") ;
    };

    function addAssembleProductHeader()
    {

        //   var buttonPosted = document.getElementById("postedBtnYes");
        //   var buttonPosted = $("#pms_posted");

        //   if(buttonPosted == 1){
        //     document.getElementById("postedAssembleYes").style.display="none";
        //   }
        //   else {
        //     document.getElementById("postedAssembleYes").disabled = false;
        //   }

          document.getElementById('assembleProductHeaderModal').style.display='block';
          $("#assembleProductHeaderModalTitle").html("ADD ASSEMBLE PRODUCT HEADER") ;
          $("#inputstatus").val("assembleProductHeaderAdd") ;
          $("#pms_fp_sku").val("") ;
          $("#pms_joborder").val("") ;
          $("#pms_remarks").val("") ;
        //   $("#pms_assembleby").val("") ;
        //   $("#pms_checkedby").val("") ;
        //   $("#pms_supervisor").val("") ;
          $("#pms_posted").val("") ;
          $("#pms_expiration_date").val("");

    };

    function addAssembleProductDetail(a_key)
    {
          document.getElementById('assembleProductDetailModal').style.display='block';
          $("#assembleProductDetailModalTitle").html("ADD ASSEMBLE PRODUCT DETAIL") ;
          $("#inputstatus2").val("assembleProductDetailAdd") ;
          $("#inputkey2").val(a_key) ;
          $("#pms_assemble").val(a_key) ;
          $("#pms_rm_sku").val("") ;
          $("#pms_qty").val("") ;
    };

    function editAPH(e_key,e_fp_sku,e_joborder,e_remarks,e_assembleby,e_supervisor){

    // document.getElementById("assembleListModal").style.display="none";
    document.getElementById('assembleProductHeaderModal').style.display='block';

    $("#assembleProductHeaderModalTitle").html("EDIT ASSEMBLE PRODUCT HEADER") ;
    $("#inputstatus").val("eaph") ;
    $("#inputkey").val(e_key) ;
    $("#pms_fp_sku").val(e_fp_sku) ;
    $("#pms_joborder").val(e_joborder) ;
    $("#pms_remarks").val(e_remarks) ;
    $("#pms_assembleby").val(e_assembleby) ;
    // $("#pms_checkedby").val(e_checkedby) ;
    $("#pms_supervisor").val(e_supervisor) ;
    // $("#pms_posted option[value=" + e_posted + "]").attr('selected', 'selected');

    };

    function editAPD(ed_key,ed_rm_sku,ed_qty){
    document.getElementById('assembleProductDetailModal').style.display='block';
    $("#assembleProductDetailModalTitle").html("EDIT ASSEMBLE PRODUCT DETAIL") ;
    $("#inputstatus2").val("eapd") ;
    $("#inputkey2").val(ed_key) ;
    $("#pms_rm_sku").val(ed_rm_sku) ;
    $("#pms_qty").val(ed_qty) ;

    };

    function viewAssembleProductHeader(key,fp_sku,joborder,remarks,assembleby,supervisor,posted)
    {
          document.getElementById("assembleListModal").style.display="none";
          document.getElementById('assembleProductHeaderModal').style.display='block';


          $("#assembleProductHeaderModalTitle").html("EDIT ASSEMBLE PRODUCT HEADER") ;
          $("#inputstatus").val("editAssembleProductHeader") ;
          $("#inputkey").val(key) ;
          $("#pms_fp_sku").val(fp_sku) ;
          $("#pms_joborder").val(joborder) ;
          $("#pms_remarks").val(remarks) ;
          $("#pms_assembleby").val(assembleby) ;
        //   $("#pms_checkedby").val(checkedby) ;
          $("#pms_supervisor").val(supervisor) ;
          $("#pms_posted").val(posted) ;

          document.getElementById('assembleProductHeaderModal').style.display='none';
          document.getElementById("addBtnAProductHeader").style.visibility = "hidden";

          window.location.href = "http://localhost/PMS/8080/pms_assemble.php?id="+key;
    };

    function deleteAHM(key){
          document.getElementById("assembleListModal").style.display="none";
          document.getElementById('deleteAssembleHeaderListModal').style.display='block';
          $("#deletestatus").val("assembleheaderlistdelete") ;
          $("#deletekey").val(key) ;
    };

    function deleteADM(key){
        document.getElementById('deleteAssembleDetailListModal').style.display='block';
        $("#deletestatus_detail").val("assembledetaillistdelete") ;
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
