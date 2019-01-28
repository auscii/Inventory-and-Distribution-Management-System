<!-- ₱ -->
<?php
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
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/pms_logo/jentec_logo.png">
    <title>Inventory and Distribution Management System</title>

    <link href="css/lib/chartist/chartist.min.css" rel="stylesheet">
	<link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/overlay.css" rel="stylesheet">
    <link href='css/animate_assets.css' rel="stylesheet" type="text/css">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> -->
    <link rel="stylesheet" href="notif/css/style.css">


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


 



    <?php 
    if($_SESSION['welcome'] == 1){ 
        unset($_SESSION['welcome']);
    ?>
        <div id="myModal">
            <div class="modal-dialog" style="margin-left: -50px;">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">
                    <i class="fa fa-tachometer"></i> Inventory and Distribution Management System</h4>
                    </div>
                        <div class="modal-body">
                        Welcome
                       <?php echo "$pms_user ($pms_usertype) !"; ?>
                        </div>
                    <div class="modal-footer">
                        <button onclick="document.getElementById(&#39;myModal&#39;).style.display=&#39;none&#39;" class="btn btn-primary" type="button">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <?php $_SESSION['welcome'] = 0; }?>

<body class="fix-header fix-sidebar" onload="animateEffect()">



    <div class="preloader" id="preloader">
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
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- Messages -->
                        <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th-large"></i></a>
                            <div class="dropdown-menu animated zoomIn">
                                <ul class="mega-dropdown-menu row">
                                    <li class="col-lg-3  m-b-30">
                                        <h4 class="m-b-20">ABOUT US</h4>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- End Messages -->
                    </ul>
                    <?php include("includes/pms_user_menu.php") ?>
                </div>
            </nav>
        </div>


        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <?php include ("includes/pms_sidebar.php");?>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <!-- <h3 class="text-primary">Dashboard</h3> -->
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->

<?php
    function checkExpiry($expiration_date,$date_now){
        $expiredDate = date("Y-m-d", strtotime($date_now . " +1 month"));

        if($expiration_date <= $expiredDate){
            return true;
        } else {
            return false;
        }
    }

    function notifExpiration(){
        $current_date = date("Y-m-d");
        $sql = "SELECT t1.pms_id AS pms_hid, t1.pms_fp_sku, t1.pms_datetime, t1.pms_joborder,
        t1.pms_remarks, t1.pms_assembleby, t1.pms_checkedby,
        t1.pms_supervisor, t1.pms_posted, t1.pms_expiration_date,
        t2.pms_id, t2.pms_sku, t2.pms_item, t2.pms_description,
        t3.pms_id AS pms_did, t3.pms_assemble, t3.pms_rm_sku, t3.pms_date, t3.pms_qty
        FROM pms_assembleheader AS t1
        INNER JOIN pms_rawmaterials AS t2
        ON t1.pms_fp_sku = t2.pms_id
        INNER JOIN pms_assembledetails AS t3";
        $sql2 = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
            while ($row=mysqli_fetch_array($sql2)) {
                $pms_expiration_date = $row['pms_expiration_date'];
                $pms_item = $row['pms_item'];

                if (checkExpiry($pms_expiration_date, $current_date)){
                    return true;
                }

            }
            return false;
    }

    function notifOutOfStock(){
        $sql = "SELECT * FROM pms_rawmaterials WHERE pms_finishedproduct = 0";
        $sql2 = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
            while ($row=mysqli_fetch_array($sql2)) {
                $pms_qty = $row['pms_qty'];

                if($pms_qty <= 0){
                    return true;
                }
            }
            return false;
    }

    function notifOutOfStockFP(){
        $sql = "SELECT * FROM pms_rawmaterials WHERE pms_finishedproduct = 1";
        $sql2 = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
            while ($row=mysqli_fetch_array($sql2)) {
                $pms_qty = $row['pms_qty'];

                if($pms_qty <= 0){
                    return true;
                }
            }
            return false;
    }

    function notifReplenished(){
        $sql = "SELECT t1.pms_id AS pms_hid, t1.pms_fp_sku, t1.pms_datetime, t1.pms_joborder,
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
        $sql2 = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
            while ($row=mysqli_fetch_array($sql2)) {
                $pms_finishing_distribute = $row['pms_finishing_distribute'];

                if($pms_finishing_distribute = 1){
                    return true;
                }
            }
            return false;
    }

    

    if(notifExpiration()){
       ?>

       <div class="toast toast--yellow" 
            style="background-color: white;
                   margin-left: 30px;">
          <div class="toast__icon">
          <div class="notify" style="margin-top: 27px;"> <span class="heartbit"></span> <span class="point"></span> </div>
          </div>
          <div class="toast__content">
            <p class="toast__type" style="color: #000;">WARNING: Current list of expired product(s)</p>
            <p class="toast__message" style="color: #000;"> <a href="pms_expired_products.php">Click here to View</a></p>
          </div>
          <div class="toast__close">
            <svg version="1.1" viewBox="0 0 15.642 15.642"  enable-background="new 0 0 15.642 15.642">
          <path fill-rule="evenodd" d="M8.882,7.821l6.541-6.541c0.293-0.293,0.293-0.768,0-1.061  c-0.293-0.293-0.768-0.293-1.061,0L7.821,6.76L1.28,0.22c-0.293-0.293-0.768-0.293-1.061,0c-0.293,0.293-0.293,0.768,0,1.061  l6.541,6.541L0.22,14.362c-0.293,0.293-0.293,0.768,0,1.061c0.147,0.146,0.338,0.22,0.53,0.22s0.384-0.073,0.53-0.22l6.541-6.541  l6.541,6.541c0.147,0.146,0.338,0.22,0.53,0.22c0.192,0,0.384-0.073,0.53-0.22c0.293-0.293,0.293-0.768,0-1.061L8.882,7.821z"></path>
        </svg>
          </div>
        </div>


        <?php
        }
        if(notifReplenished()){
        ?>
   

        <div class="toast toast--blue" 
            style="background-color: white;
                   margin-left: 600px;
                   margin-top: -88px;">
          <div class="toast__icon">
          <div class="notify" style="margin-top: 27px;"> <span class="heartbit"></span> <span class="point"></span> </div>
          </div>
          <div class="toast__content">
            <p class="toast__type" style="color: #000;">WARNING: Current list of finish product(s) distributed</p>
            <p class="toast__message" style="color: #000;"> <a href="print_distribute_finish_product.php">Click here to View</a></p>
          </div>
          <div class="toast__close">
            <svg version="1.1" viewBox="0 0 15.642 15.642"  enable-background="new 0 0 15.642 15.642">
          <path fill-rule="evenodd" d="M8.882,7.821l6.541-6.541c0.293-0.293,0.293-0.768,0-1.061  c-0.293-0.293-0.768-0.293-1.061,0L7.821,6.76L1.28,0.22c-0.293-0.293-0.768-0.293-1.061,0c-0.293,0.293-0.293,0.768,0,1.061  l6.541,6.541L0.22,14.362c-0.293,0.293-0.293,0.768,0,1.061c0.147,0.146,0.338,0.22,0.53,0.22s0.384-0.073,0.53-0.22l6.541-6.541  l6.541,6.541c0.147,0.146,0.338,0.22,0.53,0.22c0.192,0,0.384-0.073,0.53-0.22c0.293-0.293,0.293-0.768,0-1.061L8.882,7.821z"></path>
        </svg>
          </div>
        </div> 
        
        <?php
          }
        ?> 


        <?php
        if(notifOutOfStock()){
        ?>

         <div class="toast toast--green" 
            style="background-color: white;
                   margin-left: 30px;
                   margin-top: 20px;">
          <div class="toast__icon">
          <div class="notify" style="margin-top: 27px;"> <span class="heartbit"></span> <span class="point"></span> </div>
          </div>
          <div class="toast__content">
            <p class="toast__type" style="color: #000;">WARNING: Current list of out-of-stock raw material product(s)</p>
            <p class="toast__message" style="color: #000;"> <a href="pms_raw_material_notif.php">Click here to View</a></p>
          </div>
          <div class="toast__close">
            <svg version="1.1" viewBox="0 0 15.642 15.642"  enable-background="new 0 0 15.642 15.642">
          <path fill-rule="evenodd" d="M8.882,7.821l6.541-6.541c0.293-0.293,0.293-0.768,0-1.061  c-0.293-0.293-0.768-0.293-1.061,0L7.821,6.76L1.28,0.22c-0.293-0.293-0.768-0.293-1.061,0c-0.293,0.293-0.293,0.768,0,1.061  l6.541,6.541L0.22,14.362c-0.293,0.293-0.293,0.768,0,1.061c0.147,0.146,0.338,0.22,0.53,0.22s0.384-0.073,0.53-0.22l6.541-6.541  l6.541,6.541c0.147,0.146,0.338,0.22,0.53,0.22c0.192,0,0.384-0.073,0.53-0.22c0.293-0.293,0.293-0.768,0-1.061L8.882,7.821z"></path>
        </svg>
          </div>
        </div> 

        <?php
           }
        ?>



        <?php
        if(notifOutOfStockFP()){
        ?>

        <div class="toast toast--red" 
            style="background-color: white;
                   margin-left: 600px;
                   margin-top: -110px;">
          <div class="toast__icon">
          <div class="notify" style="margin-top: 27px;"> <span class="heartbit"></span> <span class="point"></span> </div>
          </div>
          <div class="toast__content">
            <p class="toast__type" style="color: #000;">WARNING: Current list of out-of-stock finished product(s)</p>
            <p class="toast__message" style="color: #000;"> <a href="pms_list_finished_product.php">Click here to View</a></p>
          </div>
          <div class="toast__close">
            <svg version="1.1" viewBox="0 0 15.642 15.642"  enable-background="new 0 0 15.642 15.642">
          <path fill-rule="evenodd" d="M8.882,7.821l6.541-6.541c0.293-0.293,0.293-0.768,0-1.061  c-0.293-0.293-0.768-0.293-1.061,0L7.821,6.76L1.28,0.22c-0.293-0.293-0.768-0.293-1.061,0c-0.293,0.293-0.293,0.768,0,1.061  l6.541,6.541L0.22,14.362c-0.293,0.293-0.293,0.768,0,1.061c0.147,0.146,0.338,0.22,0.53,0.22s0.384-0.073,0.53-0.22l6.541-6.541  l6.541,6.541c0.147,0.146,0.338,0.22,0.53,0.22c0.192,0,0.384-0.073,0.53-0.22c0.293-0.293,0.293-0.768,0-1.061L8.882,7.821z"></path>
        </svg>
          </div>
        </div> 

        <?php
           }
        ?>

    <br><br>


 <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><b class="f-s-40 color-primary">₱</b></span>
                                </div>
                                <?php
                                $sql = mysqli_query($GLOBALS["___mysqli_ston"], 
                                "SELECT * FROM pms_salesorderdetails");
                                // $count_entry = mysqli_num_rows($sql);
                                while ($row=mysqli_fetch_array($sql)) {
                                       $sales_cnt = $row['pms_price'];
                                ?>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $sales_cnt; ?></h2>
                                    <p class="m-b-0">Sales</p>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-archive f-s-40 color-success"></i></span>
                                </div>
                                <?php
                                $sql = mysqli_query($GLOBALS["___mysqli_ston"], 
                                "SELECT * FROM pms_rawmaterials WHERE pms_archive_status = 0 AND pms_finishedproduct = 0");
                                $count_entry = mysqli_num_rows($sql);
                                ?>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $count_entry; ?></h2>
                                    <p class="m-b-0">Raw Material(s)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-archive f-s-40 color-warning"></i></span>
                                </div>
                                <?php
                                $sql = mysqli_query($GLOBALS["___mysqli_ston"], 
                                "SELECT * FROM pms_rawmaterials WHERE pms_archive_status = 0 AND pms_finishedproduct = 1");
                                $count_entry = mysqli_num_rows($sql);
                                ?>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $count_entry; ?></h2>
                                    <p class="m-b-0">Finish Product(s)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
                                <?php
                                $sql = mysqli_query($GLOBALS["___mysqli_ston"], 
                                "SELECT * FROM pms_customers WHERE pms_archive_status = 0");
                                $count_entry = mysqli_num_rows($sql);
                                ?>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $count_entry; ?></h2>
                                    <p class="m-b-0">Customer(s)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4 style="text-align: center;">Finishing Product Status</h4>
                                <a href="print_distribute_finish_product.php"
                                    style="color: #ffffff; background: #3a62a3; margin-left: 50px;"
                                    class="btn btn-success"> View More &amp; Print</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="color: #000; text-align: center;">#</th>
                                                <th style="color: #000; text-align: center;">Finished By</th>
                                                <th style="color: #000; text-align: center;">Product Name</th>
                                                <th style="color: #000; text-align: center;">Quantity</th>
                                                <th style="color: #000; text-align: center;">Unit</th>
                                                <th style="color: #000; text-align: center;">Cost</th>
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
                            t3.pms_sku, t3.pms_item, t3.pms_description, t3.pms_unit, t3.pms_type_of_units, t3.pms_cost
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
                            $appr_pms_unit = $rowzz['pms_unit'] . " " . $rowzz['pms_type_of_units'];
                            $appr_pms_cost = "₱ " . $rowzz['pms_cost'];
                            $appr_pms_finishing_distribute = $rowzz['pms_finishing_distribute'];
                        ?>

                                            <tr>
                                                <td style="color: #000; text-align: center;"><?php echo $countnum; ?></td>
                                                <td style="color: #000; text-align: center;"><?php echo $appr_pms_checkedby; ?></td>
                                                <td style="color: #000; text-align: center;"><?php echo $appr_pms_item; ?></td>
                                                <td style="color: #000; text-align: center;"><?php echo $appr_pms_qty; ?></td>
                                                <td style="color: #000; text-align: center;"><?php echo $appr_pms_unit; ?></td>
                                                <td style="color: #000; text-align: center;"><?php echo $appr_pms_cost; ?></td>
                                                <td style="color: #000; text-align: center;">
                                                <?php 
                                                if($appr_pms_finishing_distribute == 1){
                                                ?>
                                                <span class="badge badge-success">Distribute</span>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                      <footer class="footer"> © 2018 All rights reserved. Inventory and Distribution Management System</footer>


                <!-- End PAge Content -->
            </div>



    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>


    <!-- <script src="js/lib/datamap/d3.min.js"></script>
    <script src="js/lib/datamap/topojson.js"></script>
    <script src="js/lib/datamap/datamaps.world.min.js"></script>
    <script src="js/lib/datamap/datamap-init.js"></script> -->

    <script src="js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="js/lib/weather/weather-init.js"></script>
    <script src="js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/lib/owl-carousel/owl.carousel-init.js"></script>


    <!-- <script src="js/lib/chartist/chartist.min.js"></script> -->
    <!-- <script src="js/lib/chartist/chartist-plugin-tooltip.min.js"></script>
    <script src="js/lib/chartist/chartist-init.js"></script> -->
    <script src="js/custom.min.js"></script>





    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script> -->
    <script  src="notif/js/index.js"></script>


</body>

</html>
