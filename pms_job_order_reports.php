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

if (isset($_POST["pms_date_to"])) {
    $pms_date_to = $_POST['pms_date_to'];  
} else {
    $pms_date_to = "";
}

if (isset($_POST["pms_date_from"])) {
    $pms_date_from = $_POST['pms_date_from'];  
} else {
    $pms_date_from = "";
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
    <link rel="icon" type="image/png" sizes="16x16" href="images/pms_logo/logo-small.png"">
    <title>Job Order Report | Inventory and Distribution Management System</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/w3.css">
    <link href="css/overlay.css" rel="stylesheet">


    <link href="plugin/daterange/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="plugin/daterange/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="plugin/daterange/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

    <style type="text/css">
    html { overflow-y: hidden; }
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
            <?php include("includes/pms_sidebar.php");?>
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Job Order Report</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Reports</a></li>
                        <li class="breadcrumb-item active">Job Order Report</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
  <div class="container-fluid">
      <!-- Start Page Content -->
      <div class="row">

          <div class="col-12">
              <div class="card" >
                  <div class="card-body" > 

                  </div>

        <div class="card-body" >

        <form method="POST">
   
        <!-- <div class="form-group" style="width: 850px; margin-top: -11px;">
         <h3 class="control-label col-lg-5" >Date from</h3>
            <div class="col-lg-4">
                <input type="date" class="form-control input-focus" id="pms_date_from" name="pms_date_from" required>  
            </div>
        </div>

        <div class="form-group" style="width: 850px; margin-top: -100px; margin-left: 300px; ">
         <h3 class="control-label col-lg-5" >Date to</h3>
            <div class="col-lg-4">
                <input type="date" class="form-control input-focus" id="pms_date_to" name="pms_date_to" required>  
            </div>
        </div> <br> -->

        <div class="form-group">
              <h3 class="control-labe;">Date from</h3>
                <div style="padding-right: 150px;" class="input-group date form_datetime col-md-5" data-link-field="dtp_input1">
                    <input style="margin-left: -12px;" class="form-control"  type="text" value="" id="pms_date_from" name="pms_date_from" required readonly>
                    <span class="input-group-addon" style="padding-right: 25px; padding-top: 10px;"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon" style="padding-right: 25px; padding-top: 10px;"><span class="glyphicon glyphicon-th"></span></span>
                </div>
				<input type="hidden" id="dtp_input1" value="" /><br/>
        </div>

         <div class="form-group" style="position: absolute; right: 0px; padding-right: 200px; margin-top: -70px;">
              <h3 class="control-label;">Date to</h3>
                <div style="padding-right: 150px;" class="input-group date form_datetime col-md-11" data-link-field="dtp_input2">
                    <input style="margin-left: -12px;" class="form-control"  type="text" value="" id="pms_date_to" name="pms_date_to" required readonly>
                    <span class="input-group-addon" style="padding-right: 25px; padding-top: 10px;"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon" style="padding-right: 25px; padding-top: 10px;"><span class="glyphicon glyphicon-th"></span></span>
                </div>
				<input type="hidden" id="dtp_input2" value="" /><br/>
        </div>

  <br> <br>

        <button
        on="tap:drp.setDates(startDate='0000-00-00',endDate='0000-00-00')"
        type="submit"
        class="btn" 
        href="#printReport" 
        onClick="javascript:printReport();" 
        style="color:#fff; 
        background-color: #ba1307; margin-left: 1px;">
        <i class="fa fa-print"></i> PRINT</button>
        <button
        on="tap:drp.clear"
        type="submit"
        class="btn" 
        href="#printReport" 
        onClick="javascript:printReport();" 
        style="color:#fff; 
        background-color: #3d4359; margin-left: 16px;">
        <i class="fa fa-ban"></i> CLEAR</button>

        </form>

        </div>
                      </div>
                  </div>
              </div>
              </div>
          </div>
      </div>
                <!-- End Page Content -->
            </div>
            <!-- End Container fluid  -->
            
        </div>
        <!-- End Page wrapper  -->
    </div>
            <!-- footer -->
            <!-- <footer class="footer" style=""> © 2018 All rights reserved. Inventory and Distribution Management System</footer> -->
            <!-- End footer -->

<script type="text/javascript" src="plugin/daterange/js/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="plugin/daterange/js/bootstrap.min.js"></script>
<script type="text/javascript" src="plugin/daterange/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="plugin/daterange/js/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>

<script type="text/javascript">

function printReport()
{				
    // window.open('http://localhost/PMS/8080/pms_sales_order_reports_print.php', '',
    // "directories=0,titlebar=0,toolbar=0,location=0,status=0,menubar=0,scrollbars=no,resizable=no,width=1024,height=768");	

    var print_datefrom = document.getElementById("pms_date_from").value ;
    var print_dateto = document.getElementById("pms_date_to").value ;

    window.open('http://localhost/PMS/8080/pms_job_order_reports_print.php?pms_date_from=' + print_datefrom + '&pms_date_to=' + print_dateto);	

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