<?php
include("includes/pms_dbcon.php");
$curr_uri = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
session_start();
$curr_uri = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

if (isset($_SESSION['pms_security'])) {
    $secure = $_SESSION['pms_security'];
} else {
    $secure = "";
}
if ($secure!="01787amk038894kk") {
    header('Location: http://localhost/PMS/8080/index.php');
    exit();
}

if (isset($_SESSION['pms_password'])) {
  $pms_password = $_SESSION['pms_password'];
} else {
  $pms_password = "";
}

if (isset($_POST["pms_restoreArchive_password"])) {
  $pms_restoreArchive_password = $_POST['pms_restoreArchive_password'];
} else {
  $pms_restoreArchive_password = "";
}
$pms_restoreArchive_password=md5($pms_restoreArchive_password);


if (isset($_POST["pms_archive_password"])) {
  $pms_archive_password = $_POST['pms_archive_password'];
} else {
  $pms_archive_password = "";
}
$pms_archive_password=md5($pms_archive_password);

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

$pms_image = "";
if (isset($_SESSION['pms_image'])) {
    $pms_image = $_SESSION['pms_image'];
}



$pms_fullname = "";
if (isset($_POST["pms_fullname"])) {
  $pms_fullname = $_POST['pms_fullname'];
}

  $pms_address = "";
if (isset($_POST["pms_address"])) {
  $pms_address = $_POST['pms_address'];
}

if (isset($_POST["pms_phone"])) {
  $pms_phone = $_POST['pms_phone'];
} else {
  $pms_phone = "";
}

if (isset($_POST["pms_email"])) {
  $pms_email = $_POST['pms_email'];
} else {
  $pms_email = "";
}

if (isset($_POST["pms_image"])) {
  $pms_imagee = $_POST['pms_image'];
} else {
  $pms_imagee = "";
}

if (isset($_POST["pms_terms"])) {
  $pms_terms = $_POST['pms_terms'];
} else {
  $pms_terms = "";
}

if (isset($_POST["inputstatus"])) {
  $pms_mode = $_POST['inputstatus'];
 } else {
  $pms_mode = "";
}

if (isset($_POST["inputkey"])) {
  $key = $_POST['inputkey'];
 } else {
  $key = "";
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



if (isset($_POST["archivestatus"])) {
  $pms_archivemode = $_POST['archivestatus'];
 } else {
  $pms_archivemode = "";
}

if (isset($_POST["archivekey"])) {
  $archivekey = $_POST['archivekey'];
 } else {
  $archivekey = "";
}



if (isset($_POST["archiverestorestatus"])) {
  $pms_archiverestorestatusmode = $_POST['archiverestorestatus'];
 } else {
  $pms_archiverestorestatusmode = "";
}

if (isset($_POST["archiverestorekey"])) {
  $archiverestorekey = $_POST['archiverestorekey'];
 } else {
  $archiverestorekey = "";
}

if ($pms_archiverestorestatusmode=="restorearchive") {

  if($pms_restoreArchive_password == $pms_password){
    echo '
  <div id="myModal">
      <div class="modal-dialog" style="margin-left: -50px;">
          <div class="modal-content">
              <div class="modal-header">


              </div>
                  <div class="modal-body">
                  <h4 class="modal-title" id="myModalLabel"><i class="fa fa-trash"></i> Successfully Restore! </h4>
                  </div>
                  <div class="modal-footer">
                      <button onclick="document.getElementById(&#39;myModal&#39;).style.display=&#39;none&#39;" class="btn btn-primary" type="button">Close</button>
                  </div>
          </div>
      </div>
  </div>
          ';
    $con=mysqli_query($GLOBALS["___mysqli_ston"], 
   "UPDATE pms_customers
    SET pms_archive_status = 0
    WHERE pms_id = $archiverestorekey");
  }
  else {
    echo '
  <div id="myModal">
      <div class="modal-dialog" style="margin-left: -50px;">
          <div class="modal-content">
              <div class="modal-header">


              </div>
                  <div class="modal-body">
                  <h4 class="modal-title" id="myModalLabel"><i class="fa fa-trash"></i> Invalid Password! </h4>
                  </div>
                  <div class="modal-footer">
                      <button onclick="document.getElementById(&#39;myModal&#39;).style.display=&#39;none&#39;" class="btn btn-primary" type="button">Close</button>
                  </div>
          </div>
      </div>
  </div>
          ';
  }
    
}


if ($pms_archivemode=="archivecustomer") {

    if($pms_archive_password == $pms_password){
  
      echo '
        <div id="myModal">
            <div class="modal-dialog" style="margin-left: -50px;">
                <div class="modal-content">
                    <div class="modal-header">
  
  
                    </div>
                        <div class="modal-body">
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-trash"></i> Successfully Archived! </h4>
                        </div>
                        <div class="modal-footer">
                            <button onclick="document.getElementById(&#39;myModal&#39;).style.display=&#39;none&#39;" class="btn btn-primary" type="button">Close</button>
                        </div>
                </div>
            </div>
        </div>
            ';
      $con=mysqli_query($GLOBALS["___mysqli_ston"], 
      "UPDATE pms_customers
      SET pms_archive_status = 1
      WHERE pms_id = $archivekey");
    }
  
    else {
      echo '
        <div id="myModal">
            <div class="modal-dialog" style="margin-left: -50px;">
                <div class="modal-content">
                    <div class="modal-header">
  
  
                    </div>
                        <div class="modal-body">
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-trash"></i> Invalid Password! </h4>
                        </div>
                        <div class="modal-footer">
                            <button onclick="document.getElementById(&#39;myModal&#39;).style.display=&#39;none&#39;" class="btn btn-primary" type="button">Close</button>
                        </div>
                </div>
            </div>
        </div>
            ';
    }
      
  }



if ($pms_mode=="addcustomer") {
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
            </div>zz
        </div>
    </div>
         ';
  move_uploaded_file($_FILES["pms_image"]["tmp_name"],"images/uploadimage/" . $_FILES["pms_image"]["name"]);
  $imageLocation=$_FILES["pms_image"]["name"];
  $con=mysqli_query($GLOBALS["___mysqli_ston"],
    "INSERT INTO
    pms_customers
    (
    pms_fullname,
    pms_address,
    pms_phone,
    pms_email,
    pms_image,
    pms_terms
    )
    VALUES
    (
    '$pms_fullname',
    '$pms_address',
    '$pms_phone',
    '$pms_email',
    '$imageLocation',
    '$pms_terms'
    )");

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
    'Added $pms_fullname (Customer)',
    '$pms_usertype'
    )");
} else if ($pms_mode=="editcustomer") {
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
    UPDATE pms_customers
    SET pms_fullname='$pms_fullname',
        pms_address='$pms_address',
        pms_phone='$pms_phone',
        pms_email='$pms_email',
        pms_terms='$pms_terms'
    WHERE pms_id = $key");
}

if ($pms_deletemode=="deletecustomer") {
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
  $con=mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM pms_customers WHERE pms_id = $deletekey");
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
    <title>Customer | Inventory and Distribution Management System</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/lib/toastr/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/w3.css">
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
</head><input type="hidden" id="url" value="<?php echo $curr_uri; ?>">


<input type="hidden" id="url" value="<?php echo $curr_uri; ?>">

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

                                    </li>

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
            <?php include ("includes/pms_sidebar_operator.php");?>
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Customer</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Masterfile</a></li>
                        <li class="breadcrumb-item active">Customer</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
<div id="myDiv" class="animate-right">
  <div class="container-fluid">
      <!-- Start Page Content -->
      <div class="row">
          <div class="col-12">
              <div class="card" style="background: #ebefea;">
                  <div class="card-body">

                <button
                onclick="addCustomer();"
                class="btn btn-primary"
                href="#customerModal"
                data-target="#customerModal"
                style="color:#fff;"
                >
                <i class="fa fa-plus"></i> Add New Customer
                </button>

                &nbsp;

                <button
                onclick="archiveListCustomer();"
                class="btn btn-primary"
                href="#archiveCustomerModal"
                data-target="#archiveCustomerModal"
                style="color:#fff;"
                >
                <i class="fa fa-list"></i> Archives of Customer(s)
                </button>

                <?php
                $sql = mysqli_query($GLOBALS["___mysqli_ston"], 
                "SELECT * FROM pms_customers WHERE pms_archive_status = 0");
                $count_entry = mysqli_num_rows($sql);
                echo "<p class='text-primary' style='position:absolute; right:10px; top:30px;'>Total Number of Customer(s): $count_entry</p>"; 
                ?>

                </div>

          <h4 class="card-title">Save as</h4>

            <table id="DataTable1" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="text-align: center;">Image</th>
                        <th style="text-align: center;">Fullname</th>
                        <th style="text-align: center;">Address</th>
                        <th style="text-align: center;">Phone Number</th>
                        <th style="text-align: center;">Email</th>
                        <th style="text-align: center;">Terms</th>
                        <th style="text-align: center;">Date/Time Created</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>

                <tbody>

                  <?php
                  $sql = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pms_customers WHERE pms_archive_status = 0");
                  while ($row=mysqli_fetch_array($sql)) {
                  ?>
                        <tr>

                        <td style="color: #000;"><img style="width:80px;height:60px" src="images/uploadimage/<?php echo $row['pms_image'];?>"></td>

                        <td style="color: #000;"><?php echo $row['pms_fullname']; ?></td>

                        <td style="color: #000;"><?php echo $row['pms_address']; ?></td>

                        <td style="color: #000;"><?php echo $row['pms_phone']; ?></td>

                        <td style="color: #000;"><?php echo $row['pms_email']; ?></td>

                        <td style="color: #000;"><?php echo $row['pms_terms']; ?> days</td>

                        <td style="color: #000;"><?php echo $row['pms_created']; ?></td>

                        <td style="color: #000; width: 200px;">

                        <button onclick="editCustomer('<?php echo $row['pms_id'] ; ?>',
                                                      '<?php echo $row['pms_fullname'] ?>',
                                                      '<?php echo $row['pms_address'] ?>',
                                                      '<?php echo $row['pms_phone'] ?>',
                                                      '<?php echo $row['pms_email'] ?>',
                                                      '<?php echo $row['pms_terms'] ?>',
                                                      '<?php echo $row['pms_image'] ?>');"
                                href="#customerModal<?php echo $row['pms_id'];?>"
                                style="background-color: #3bdb39; color: #ffffff;"
                                class="btn"><i class="icon-pencil icon-large"> Edit</i></button>
                        &nbsp;
                        <button onclick="archiveCustomer('<?php echo $row['pms_id'] ?>');"
                                id="archiveCustomerBtn"
                                style="background-color: #ba1307; color: #ffffff;"
                                class="btn"><i class="fa fa-archive"> Archive</i></button>

                        </td>


                        </tr>
                        <?php } ?>
                </tbody>

            </table>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
                <!-- End Page Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer"> © 2018 All rights reserved. Inventory and Distribution Management System</footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>


                    <form method="post">
                          <div id="passArchiveModal" class="w3-modal">
                          <div class="w3-modal-content" style="margin-top: 150px; margin-left: 420px; width: 450px;">
                               <div class="w3-container">
                                 <span onclick="document.getElementById('passArchiveModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

                                 <input type="hidden" name="archivestatus" id="archivestatus">
                                 <input type="hidden" name="archivekey" id="archivekey">
                                   <center><br>
                                   <h2>Enter Password</h2><br>

                                   <div class="form-group" style="width: 400px;">
                                     <div class="col-lg-9">
                                       <input type="password" class="form-control input-focus" id="pms_archive_password" name="pms_archive_password" placeholder="Enter your Password" required>
                                     </div>
                                   </div>

                                   <button type="submit"
                                           style="border-radius: 20px;"
                                           class="btn btn-success">Submit</button>&nbsp;&nbsp;
                                   <button type="button" style="border-radius: 20px;" class="btn btn-danger" onclick="document.getElementById('passArchiveModal').style.display='none'">Cancel</button><br><br><br>
                                   </center>

                               </div>
                             </div>
                         </div>
                       </form>

              <form method="post">
                          <div id="passRestoreArchiveModal" class="w3-modal">
                          <div class="w3-modal-content" style="margin-top: 150px; margin-left: 420px; width: 450px;">
                               <div class="w3-container">
                                 <span onclick="document.getElementById('passRestoreArchiveModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

                                 <input type="hidden" name="archiverestorestatus" id="archiverestorestatus">
                                 <input type="hidden" name="archiverestorekey" id="archiverestorekey">
                                   <center><br>
                                   <h2>Enter Password</h2><br>

                                   <div class="form-group" style="width: 400px;">
                                     <div class="col-lg-9">
                                       <input type="password" class="form-control input-focus" id="pms_restoreArchive_password" name="pms_restoreArchive_password" placeholder="Enter your Password" required>
                                     </div>
                                   </div>

                                   <button type="submit"
                                           style="border-radius: 20px;"
                                           class="btn btn-success">Submit</button>&nbsp;&nbsp;
                                   <button type="button" style="border-radius: 20px;" class="btn btn-danger" onclick="document.getElementById('passRestoreArchiveModal').style.display='none'">Cancel</button><br><br><br>
                                   </center>

                               </div>
                             </div>
                         </div>
                       </form>

              <form method="post">
                          <div id="restoreArchiveModal" class="w3-modal">
                          <div class="w3-modal-content" style="margin-top: 150px; margin-left: 420px; width: 700px;">
                               <div class="w3-container">
                                 <span onclick="document.getElementById('restoreArchiveModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

                                   <center><br>
                                   <h2>Are you sure you want to Restore?</h2><br>

                                   <button onclick="restoreArchivePass()"
                                           type="button"
                                           style="border-radius: 20px;"
                                           class="btn btn-success">Yes</button>&nbsp;&nbsp;
                                   <button type="button" style="border-radius: 20px;" class="btn btn-danger" onclick="document.getElementById('restoreArchiveModal').style.display='none'">No</button><br><br><br>
                                   </center>

                               </div>
                             </div>
                         </div>
                       </form>


              <form method="post">
                          <div id="archiveModal" class="w3-modal">
                          <div class="w3-modal-content" style="margin-top: 150px; margin-left: 420px; width: 700px;">
                               <div class="w3-container">
                                 <span onclick="document.getElementById('archiveModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

                                   <center><br>
                                   <h2>Are you sure you want to Archive?</h2><br>

                                   <button onclick="archivePass()"
                                           type="button"
                                           style="border-radius: 20px;"
                                           class="btn btn-success">Yes</button>&nbsp;&nbsp;
                                   <button type="button" style="border-radius: 20px;" class="btn btn-danger" onclick="document.getElementById('archiveModal').style.display='none'">No</button><br><br><br>
                                   </center>

                               </div>
                             </div>
                         </div>
                       </form>

     <form method="post" action="#">
                 <div id="deleteModal" class="w3-modal">
                    <div class="w3-modal-content" style="margin-top: 100px; margin-left: 335px; width: 700px;">
                      <div class="w3-container">
                        <span onclick="document.getElementById('deleteModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

                        <input type="hidden" name="deletestatus" id="deletestatus">
                        <input type="hidden" name="deletekey" id="deletekey">
                          <center><br>
                          <h2>Do you want to Delete?</h2><br>

                          <button type="submit" style="border-radius: 20px;" class="btn btn-success">Yes</button>&nbsp;&nbsp;
                          <button type="button" style="border-radius: 20px;" class="btn btn-danger" onclick="document.getElementById('deleteModal').style.display='none'">No</button><br><br><br>
                          </center>

                      </div>
                    </div>
                </div>
              </form>

 <div id="archiveCustomerModal" class="w3-modal">
        <div class="w3-modal-content" style="margin-top: -70px; margin-left: 100px; width: 1300px;">
            <div class="w3-container">
            <br>
            <center>
            <h4 class="modal-title"><span id="archiveCustomerModaltitle"></span></h4>
            </center>
            <br><br>
            <span onclick="document.getElementById('archiveCustomerModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

            <h4 class="card-title">Save As</h4>
            <table id="DataTable1" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">Image</th>
                        <th style="text-align: center;">Fullname</th>
                        <th style="text-align: center;">Address</th>
                        <th style="text-align: center;">Phone Number</th>
                        <th style="text-align: center;">Email</th>
                        <th style="text-align: center;">Terms</th>
                        <th style="text-align: center;">Date/Time Created</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>

                <tbody>

                <?php
                $header_count = 0;
                $sql = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pms_customers WHERE pms_archive_status = 1");
                while ($row=mysqli_fetch_array($sql)) {
                    $header_count++;
                ?>
                                <tr>

                                <td style="color: #000; text-align: center;"><?php echo $header_count;?></td>

                                <td style="text-align: center; color: #000;">
                                
                                <img style="width:80px;height:60px" src="images/uploadimage/<?php echo $row['pms_image'];?>">
                                </td>

                                <td style="color: #000;"><?php echo $row['pms_fullname']; ?></td>

                                <td style="color: #000;"><?php echo $row['pms_address']; ?></td>

                                <td style="color: #000;"><?php echo $row['pms_phone']; ?></td>

                                <td style="color: #000;"><?php echo $row['pms_email']; ?></td>

                                <td style="color: #000;"><?php echo $row['pms_terms']; ?> days</td>

                                <td style="color: #000;"><?php echo $row['pms_created']; ?></td>

                                <td style="color: #000; text-align: center;">

                                <button
                                onclick="confirmArchiveKey('<?php echo $row['pms_id'] ; ?>');"
                                class="btn btn-primary"
                                data-target="#restoreArchiveModal"
                                style=" color: #ffffff;">
                                <i class="icon-trash icon-large"></i> Restore</button>


                                </td>

                                </tr>
                                            <?php } ?>
                    </tbody>
                </table>

                <br> <br> <br>

            </div>
        </div>
        </div>

<div id="customerModal" class="w3-modal">
    <div class="w3-modal-content" style="margin-top: -80px; margin-left: 350px; width: 700px; height: 920px;">
    <div class="w3-container">
        <br>
        <center>
        <h4 class="modal-title"><span id="customerModaltitle"></span></h4>
        </center>
        <br><br>
        <span onclick="document.getElementById('customerModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

        <form class="form-horizontal" method="post" action="#" enctype='multipart/form-data'>

            <input type="hidden" name="inputstatus" id="inputstatus">
            <input type="hidden" name="inputkey" id="inputkey">

            <div class="modal-body">

                <center>
                <img src="" id="customerimagesource" width="150px" height="150px" style="border-radius: 25px;">
            </center><br>

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                    <label class="control-label col-lg-3" for="price"> <span id="customerImageTitle">Customer Image</span></label>

                    <div class="col-lg-9">
                        <input type="file" onchange="readURL(this);" class="form-control input-focus" id="pms_image" name="pms_image">
                    </div>
                    </div>

                    <div class="form-group" style="width: 850px; margin-top: -11px;">
                    <label class="control-label col-lg-3" for="price">Fullname</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control input-focus" id="pms_fullname" name="pms_fullname" placeholder="Enter your Fullname" required autofocus>
                    </div>
                    </div>

                    <div class="form-group" style="width: 850px; margin-top: -11px;">
                    <label class="control-label col-lg-3" for="price">Address</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control input-focus" id="pms_address" name="pms_address" placeholder="Enter your Address" required autofocus>
                    </div>
                    </div>

                    <div class="form-group" style="width: 850px; margin-top: -11px;">
                    <label class="control-label col-lg-3" for="price">Phone Number</label>
                    <div class="col-lg-9">
                        <input type="number" class="form-control input-focus" id="pms_phone" name="pms_phone" placeholder="Enter your Phone Number" required autofocus>
                    </div>
                    </div>

                    <div class="form-group" style="width: 850px; margin-top: -11px;">
                    <label class="control-label col-lg-3" for="price">Email</label>
                    <div class="col-lg-9">
                        <input type="email" class="form-control input-focus" id="pms_email" name="pms_email" placeholder="Enter your Email" required autofocus>
                    </div>
                    </div>

                    <div class="form-group" style="width: 850px; margin-top: -11px;">
                    <label class="control-label col-lg-3" for="price">Terms of Payment</label>
                    <div class="col-lg-9">
                        <select class="form-control input-focus" id="pms_terms" name="pms_terms" required autofocus>
                        <option value="" disabled selected>Enter your Terms of Payment</option>
                        <option value="15">15 days</option>
                        <option value="30">30 days</option>
                        <option value="45">45 days</option>
                        <option value="60">60 days</option>
                        <option value="90">90 days</option>
                        </select>
                    </div>
                    </div><br><br>

                <!-- <button type="button" class="btn btn-success m-b-10 m-l-5" id="toastr-success-top-center">Toast Me!</button> -->

                <div style="text-align: center;">
                  <button type="submit" style="border-radius: 20px;" class="btn btn-lg btn-success">Save</button>&nbsp;&nbsp;
                  <button type="button" style="border-radius: 20px;" class="btn btn-lg btn-danger" onclick="document.getElementById('customerModal').style.display='none'" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div><br><br>

                  </form>

                      </div>
                    </div>
                  </div>

    <script type="text/javascript">

    function archivePass(){
        document.getElementById('archiveModal').style.display='none';
        document.getElementById('passArchiveModal').style.display='block';
    }

    function restoreArchivePass(){
        document.getElementById('restoreArchiveModal').style.display='none';
        document.getElementById('passRestoreArchiveModal').style.display='block';
    }

    function archiveCustomer(arch_pms_id)
    {
        document.getElementById('archiveModal').style.display='block';
        $("#archivestatus").val("archivecustomer") ;
        $("#archivekey").val(arch_pms_id) ;
    };


    function confirmArchiveKey(confirmArchive_key)
    {
        document.getElementById('restoreArchiveModal').style.display='block';
        document.getElementById('archiveCustomerModal').style.display='none';
        $("#archiverestorestatus").val("restorearchive") ;
        $("#archiverestorekey").val(confirmArchive_key) ;
    };

    function archiveListCustomer(){
        document.getElementById('archiveCustomerModal').style.display='block';
        $("#archiveCustomerModaltitle").html("ARCHIVES OF CUSTOMER") ;
    };

    function readURL(input) {
       if (input.files && input.files[0]) {
           var reader = new FileReader();

           reader.onload = function (e) {
               $('#customerimagesource')
                   .attr('src', e.target.result);
                   // .width(150)
                   // .height(200);
           };

           reader.readAsDataURL(input.files[0]);
       }
    }

    function addCustomer()
    {
          document.getElementById('customerModal').style.display='block';
          $("#customerModaltitle").html("Add Customer") ;
          $("#inputstatus").val("addcustomer") ;

          $("#pms_fullname").val("") ;
          $("#pms_address").val("") ;
          $("#pms_phone").val("") ;
          $("#pms_email").val("") ;
          $("#pms_terms").val("") ;

          document.getElementById("pms_image").style.visibility = "visible";
          document.getElementById("customerImageTitle").style.visibility = "visible";
          document.getElementById("customerimagesource").src = "images/uploadimage/noimage.png";
    };

    function editCustomer(key,fullname,address,phone,email,terms,image)
    {
          document.getElementById('customerModal').style.display='block';
          $("#customerModaltitle").html("Edit Customer") ;
          $("#inputstatus").val("editcustomer") ;
          $("#inputkey").val(key) ;

          $("#pms_fullname").val(fullname) ;
          $("#pms_address").val(address) ;
          $("#pms_phone").val(phone) ;
          $("#pms_email").val(email) ;
          $("#pms_terms").val(terms) ;

          document.getElementById("pms_image").style.visibility = "hidden";
          document.getElementById("customerImageTitle").style.visibility = "hidden";

          if (image=="") {
              var i = "images/uploadimage/noimage.png";
          }  else {
              var i = "images/uploadimage/" + image ;
          }

          document.getElementById("customerimagesource").src = i;
    };

    function deleteCustomer(key,fullname)
    {
          document.getElementById('deleteModal').style.display='block';
          $("#deletestatus").val("deletecustomer") ;
          $("#deletekey").val(key) ;
          $("#customername").html(fullname) ;
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

    <script src="js/lib/toastr/toastr.min.js"></script>
    <script src="js/lib/toastr/toastr.init.js"></script>

    <script type="text/javascript">
        $('#DataTable1').removeClass('dt-button buttons-copy buttons-html5')
    </script>
</body>

</html>
