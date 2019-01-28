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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
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
        $sql = "SELECT * FROM pms_rawmaterials";
        $sql2 = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
            while ($row=mysqli_fetch_array($sql2)) {
                $pms_qty = $row['pms_qty'];

                if($pms_qty <= 0){
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
            <p class="toast__type" style="color: #000;">Current list of expired product(s)</p>
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
    // if(notifOutOfStock()){
        ?>
   

        <div class="toast toast--blue" 
            style="background-color: white;
                   margin-left: 600px;
                   margin-top: -88px;">
          <div class="toast__icon">
          <div class="notify" style="margin-top: 27px;"> <span class="heartbit"></span> <span class="point"></span> </div>
          </div>
          <div class="toast__content">
            <p class="toast__type" style="color: #000;">Current list of product(s) need to be replenished</p>
            <p class="toast__message" style="color: #000;"> <a href="pms_raw_material.php">Click here to View</a></p>
          </div>
          <div class="toast__close">
            <svg version="1.1" viewBox="0 0 15.642 15.642"  enable-background="new 0 0 15.642 15.642">
          <path fill-rule="evenodd" d="M8.882,7.821l6.541-6.541c0.293-0.293,0.293-0.768,0-1.061  c-0.293-0.293-0.768-0.293-1.061,0L7.821,6.76L1.28,0.22c-0.293-0.293-0.768-0.293-1.061,0c-0.293,0.293-0.293,0.768,0,1.061  l6.541,6.541L0.22,14.362c-0.293,0.293-0.293,0.768,0,1.061c0.147,0.146,0.338,0.22,0.53,0.22s0.384-0.073,0.53-0.22l6.541-6.541  l6.541,6.541c0.147,0.146,0.338,0.22,0.53,0.22c0.192,0,0.384-0.073,0.53-0.22c0.293-0.293,0.293-0.768,0-1.061L8.882,7.821z"></path>
        </svg>
          </div>
        </div> 
        
        <?php
        //   }
        ?> 

         <div class="toast toast--green" 
            style="background-color: white;
                   margin-left: 30px;
                   margin-top: 20px;">
          <div class="toast__icon">
          <div class="notify" style="margin-top: 27px;"> <span class="heartbit"></span> <span class="point"></span> </div>
          </div>
          <div class="toast__content">
            <p class="toast__type" style="color: #000;">Current list of out-of-stock raw material product(s)</p>
            <p class="toast__message" style="color: #000;"> <a href="pms_raw_material.php">Click here to View</a></p>
          </div>
          <div class="toast__close">
            <svg version="1.1" viewBox="0 0 15.642 15.642"  enable-background="new 0 0 15.642 15.642">
          <path fill-rule="evenodd" d="M8.882,7.821l6.541-6.541c0.293-0.293,0.293-0.768,0-1.061  c-0.293-0.293-0.768-0.293-1.061,0L7.821,6.76L1.28,0.22c-0.293-0.293-0.768-0.293-1.061,0c-0.293,0.293-0.293,0.768,0,1.061  l6.541,6.541L0.22,14.362c-0.293,0.293-0.293,0.768,0,1.061c0.147,0.146,0.338,0.22,0.53,0.22s0.384-0.073,0.53-0.22l6.541-6.541  l6.541,6.541c0.147,0.146,0.338,0.22,0.53,0.22c0.192,0,0.384-0.073,0.53-0.22c0.293-0.293,0.293-0.768,0-1.061L8.882,7.821z"></path>
        </svg>
          </div>
        </div> 



        <div class="toast toast--red" 
            style="background-color: white;
                   margin-left: 600px;
                   margin-top: -108px;">
          <div class="toast__icon">
          <div class="notify" style="margin-top: 27px;"> <span class="heartbit"></span> <span class="point"></span> </div>
          </div>
          <div class="toast__content">
            <p class="toast__type" style="color: #000;">Current list of out-of-stock finished product(s)</p>
            <p class="toast__message" style="color: #000;"> <a href="pms_raw_material.php">Click here to View</a></p>
          </div>
          <div class="toast__close">
            <svg version="1.1" viewBox="0 0 15.642 15.642"  enable-background="new 0 0 15.642 15.642">
          <path fill-rule="evenodd" d="M8.882,7.821l6.541-6.541c0.293-0.293,0.293-0.768,0-1.061  c-0.293-0.293-0.768-0.293-1.061,0L7.821,6.76L1.28,0.22c-0.293-0.293-0.768-0.293-1.061,0c-0.293,0.293-0.293,0.768,0,1.061  l6.541,6.541L0.22,14.362c-0.293,0.293-0.293,0.768,0,1.061c0.147,0.146,0.338,0.22,0.53,0.22s0.384-0.073,0.53-0.22l6.541-6.541  l6.541,6.541c0.147,0.146,0.338,0.22,0.53,0.22c0.192,0,0.384-0.073,0.53-0.22c0.293-0.293,0.293-0.768,0-1.061L8.882,7.821z"></path>
        </svg>
          </div>
        </div> 

    <br><br>



<div id="myDiv" class="animate-right">

            <div class="container-fluid">

                    <style>
                        .jssorl-009-spin img {
                            animation-name: jssorl-009-spin;
                            animation-duration: 1.6s;
                            animation-iteration-count: infinite;
                            animation-timing-function: linear;
                        }

                        @keyframes jssorl-009-spin {
                            from {
                                transform: rotate(0deg);
                            }

                            to {
                                transform: rotate(360deg);
                            }
                        }
                    </style>

<!-- Jentec info -->
<!-- WE will be a world class food logistics company.  Our network of cold chain facilities will be the preferred choice of companies who seek a safe, secure, healthy and efficient mode of storing and distributing their food products.

In doing so, we promise to...

KEEP these values as our guide and anchor...
- a sense of personal dedication and commitment
- a passion for competence and professional growth
- a belief in honesty and integrity
- an ability to fulfill one’s word of honor
- a spirit of fun and teamwork

and finally to....

Commit and live out to...

Our customers - service dependability, reliability and adaptability


Ourselves - a Safe workplace and practice; and believing that people are our most important resource


Localities - a care for the environment, developing communities, promoting livelihood and growth.  -->

                    <div id="slider1_container" style="visibility: hidden; position: relative; margin: 0 auto; width: 1000px; height: 442px; overflow: hidden;">
                        <!-- <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="plugin/slider/svg/loading/static-svg/spin.svg" />
                        </div> -->

                        <div data-u="slides" style="position: absolute; left: 0px; top: 0px; width: 980px; height: 442px;
                        overflow: hidden;">
                        <!-- <img data-u="image" src="../img/gallery/980x380/001.jpg" /> -->
                            <div>
                              <div style="background-color: rgba(0, 0, 0, 0.8); margin-top: 45px; width: 520px; height: 230px;"> <br>
                                <h1 style='padding-left: 10px; color: #FFF; font-weight: lighter; font-family: "Comic Sans MS", cursive, sans-serif;'>  We believe in what people make possible </h1>
                                <h3 style='padding-left: 10px; color: #FFF; font-weight: lighter; font-family: Impact, Charcoal, sans-serif	;'> Our mission is to empower every person and every organization on the planet to achieve more. </h3>
                              </div>
                                <img data-u="image" src="images/slideshow/1.jpeg" />
                            </div>
                            <div>
                              <div style="background-color: rgba(0, 0, 0, 0.8); margin-top: 45px; width: 520px; height: 230px;"> <br>
                                <h1 style='padding-left: 10px; color: #FFF; font-weight: lighter; font-family: "Comic Sans MS", cursive, sans-serif;'>  We believe in what people make possible </h1>
                                <h3 style='padding-left: 10px; color: #FFF; font-weight: lighter; font-family: Impact, Charcoal, sans-serif	;'> Our mission is to empower every person and every organization on the planet to achieve more. </h3>
                              </div>
                                <img data-u="image" src="images/slideshow/2.jpeg" />
                            </div>
                            <div>
                                <img data-u="image" src="plugin/slider/img/gallery/samp_pms-2.jpg" />
                            </div>
                            <div>
                                <img data-u="image" src="images/slideshow/2.jpeg" />
                            </div>
                            <div>
                                <img data-u="image" src="images/slideshow/1.jpeg" />
                            </div>
                            <div>
                                <img data-u="image" src="plugin/slider/img/gallery/samp_pms-2.jpg" />
                            </div>
                            <div>
                                <img data-u="image" src="plugin/slider/img/gallery/samp_pms-7.jpg" />
                            </div>
                            <div>
                                <img data-u="image" src="plugin/slider/img/gallery/samp_pms-8.jpg" />
                            </div>
                        </div>
                        <style>
                            .jssorb031 {position:absolute;}
                            .jssorb031 .i {position:absolute;cursor:pointer;}
                            .jssorb031 .i .b {fill:#000;fill-opacity:0.5;stroke:#fff;stroke-width:1200;stroke-miterlimit:10;stroke-opacity:0.3;}
                            .jssorb031 .i:hover .b {fill:#fff;fill-opacity:.7;stroke:#000;stroke-opacity:.5;}
                            .jssorb031 .iav .b {fill:#fff;stroke:#000;fill-opacity:1;}
                            .jssorb031 .i.idn {opacity:.3;}
                        </style>
                        <div data-u="navigator" class="jssorb031" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                                </svg>
                            </div>
                        </div>
                        <style>
                            .jssora051 {display:block;position:absolute;cursor:pointer;}
                            .jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
                            .jssora051:hover {opacity:.8;}
                            .jssora051.jssora051dn {opacity:.5;}
                            .jssora051.jssora051ds {opacity:.3;pointer-events:none;}
                        </style>
                        <!-- <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                            <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
                            </svg>
                        </div>
                        <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                            <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
                            </svg>
                        </div> -->

                    </div>


                <script src="plugin/slider/js/jquery-1.9.1.min.js"></script>
                <!-- <script src="bootstrap.min.js"></script>
                <script src="docs.min.js"></script> -->
                <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
                <!-- <script src="ie10-viewport-bug-workaround.js"></script> -->

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
                <div class="col-lg-9">
                        <div class="card">
                            <div class="card-title">
                                <h4>Recent Orders </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Product</th>
                                                <th>quantity</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>
                                                    <div class="round-img">
                                                        <a href=""><img src="images/avatar/4.jpg" alt=""></a>
                                                    </div>
                                                </td>
                                                <td>John Abraham</td>
                                                <td><span>iBook</span></td>
                                                <td><span>456 pcs</span></td>
                                                <td><span class="badge badge-success">Done</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="round-img">
                                                        <a href=""><img src="images/avatar/2.jpg" alt=""></a>
                                                    </div>
                                                </td>
                                                <td>John Abraham</td>
                                                <td><span>iPhone</span></td>
                                                <td><span>456 pcs</span></td>
                                                <td><span class="badge badge-success">Done</span></td>
                                            </tr>
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
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="round-img">
                                                        <a href=""><img src="images/avatar/4.jpg" alt=""></a>
                                                    </div>
                                                </td>
                                                <td>John Abraham</td>
                                                <td><span>iBook</span></td>
                                                <td><span>456 pcs</span></td>
                                                <td><span class="badge badge-success">Done</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                


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





    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script> -->
    <script  src="notif/js/index.js"></script>


</body>

</html>
