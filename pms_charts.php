<!-- ₱ -->
<?php
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

    if(notifExpiration()){
        echo 
            '<div class="alert alert-primary"style="color: #FFF; background-color: #3b54af;">
            There is an Expired Product <a href="pms_expired_products.php">Click here to View</a>
            </div>';
    }
    ?> 

<div id="myDiv" class="animate-right">

            <div class="container-fluid">

                
                
            </div>

</div>


                <script src="plugin/slider/js/jquery-1.9.1.min.js"></script>
                <script src="bootstrap.min.js"></script>
                <script src="docs.min.js"></script>
                <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
                <script src="ie10-viewport-bug-workaround.js"></script>

                <!-- jssor slider scripts-->
                <script type="text/javascript" src="plugin/slider/js/jssor.slider.min.js"></script>
                <script>

                    jQuery(document).ready(function ($) {
                        var options = {
                            $AutoPlay: 1,
                            $AutoPlaySteps: 1,
                            $Idle: 2000,
                            $PauseOnHover: 1,

                            $ArrowKeyNavigation: 1,
                            $SlideEasing: $Jease$.$OutQuint,
                            $SlideDuration: 800,
                            $MinDragOffsetToSlide: 20,
                            //$SlideWidth: 600,
                            //$SlideHeight: 300,
                            $SlideSpacing: 0,
                            $UISearchMode: 1,
                            $PlayOrientation: 1,
                            $DragOrientation: 1,

                            $ArrowNavigatorOptions: {
                            $Class: $JssorArrowNavigator$,
                            $ChanceToShow: 2,
                            $Steps: 1
                            },

                            $BulletNavigatorOptions: {
                               $Class: $JssorBulletNavigator$,
                               $ChanceToShow: 2,
                               $Steps: 1,
                               $SpacingX: 12,
                               $Orientation: 1
                             }
                        };

                        var jssor_slider1 = new $JssorSlider$("slider1_container", options);

                        function ScaleSlider() {
                            var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                            if (parentWidth) {
                                jssor_slider1.$ScaleWidth(parentWidth - 30);
                            }
                            else
                                window.setTimeout(ScaleSlider, 30);
                        }
                        ScaleSlider();

                        $(window).bind("load", ScaleSlider);
                        $(window).bind("resize", ScaleSlider);
                        $(window).bind("orientationchange", ScaleSlider);
                    });
                </script>

                <!-- ........ -->
                <br> <br> <br>
                <style>
                .parent {
                  position: relative;
                }
                .parent table {
                  width: 100%;
                  border-spacing: 0;
                  border-collapse: collapse;
                }
                .icon {
                  display: block;
                  position: absolute;
                  left: 50%;
                  top: 50%;
                  margin-left: -32px;
                  margin-top: -32px;
                  width: 64px;
                  height: 64px;
                  background: #e5e5e5
                 url(https://cdn4.iconfinder.com/data/icons/nature-and-ecology/128/Nature__Eco_water_reuse-64.png) no-repeat;
                  border-radius: 32px;
                }
                .left,
                .right {
                  /* border: 1px solid #252122; */
                  text-align: center;
                  padding: 15px;
                  width: 50%;
                  vertical-align: middle;
                }
                table span {
                  display: block;
                }
                table td span:first-child {
                  font-size: 48px;
                }
                </style>


                <!-- <div class="parent">
              <table>

                <td class="left">
                  <span>MISSION</span>
                  <span style="padding-top: 20px;">8%7Csgn5pK9B3-dc_mtid_18707vxu38484_pcrid_230401805883_&cid=aos-ph-kwgo-brand--slid-
                  8%7Csgn5pK9B3-dc_mtid_18707vxu38484_pcrid_230401805883_&cid=aos-ph-kwgo-brand--slid-</span>
                </td>

                <td style="border-left: solid 1px #000000;"></td>

                <td class="right" style="text-align: center;">
                  <span>VISION</span>
                  <span style="padding-top: 20px;">8%7Csgn5pK9B3-dc_mtid_18707vxu38484_pcrid_230401805883_&cid=aos-ph-kwgo-brand--slid-
                  8%7Csgn5pK9B3-dc_mtid_18707vxu38484_pcrid_230401805883_&cid=aos-ph-kwgo-brand--slid-</span>
                </td>

              </table>
            </div> -->

            </div>





            </div>
            <!-- <br><br><br><br><br><br><br><br><br><br><br><br> -->
            <!-- <footer class="footer"> © 2018 All rights reserved. Inventory and Distribution Management System</footer> -->
        </div>
        <!-- End Page wrapper  -->
    </div>


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


</body>

</html>
