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



if (isset($_POST["pms_supid"])) {
  $pms_supid = $_POST['pms_supid'];
} else {
  $pms_supid = "";
}

if (isset($_POST["pms_sku"])) {
  $pms_sku = $_POST['pms_sku'];
} else {
  $pms_sku = "";
}

if (isset($_POST["pms_item"])) {
  $pms_item = $_POST['pms_item'];
} else {
  $pms_item = "";
}

if (isset($_POST["pms_description"])) {
  $pms_description = $_POST['pms_description'];
} else {
  $pms_description = "";
}

if (isset($_POST["pms_qty"])) {
  $pms_qty = $_POST['pms_qty'];
} else {
  $pms_qty = "";
}

if (isset($_POST["pms_unit"])) {
  $pms_unit = $_POST['pms_unit'];
} else {
  $pms_unit = "";
}

if (isset($_POST["pms_type"])) {
  $pms_type = $_POST['pms_type'];
} else {
  $pms_type = "";
}

if(isset($_POST['pms_image_tmp'])){
  $pms_image_tmp = $_POST['pms_image_tmp'];
} else {
  $pms_image_tmp = "";
}

if (isset($_POST["pms_type_of_units"])) {
  $pms_type_of_units = $_POST['pms_type_of_units'];
} else {
  $pms_type_of_units = "";
}

if (isset($_POST["pms_cost"])) {
  $pms_cost = $_POST['pms_cost'];
} else {
  $pms_cost = "";
}

if (isset($_POST["pms_finishedproduct"])) {
  $pms_finishedproduct = $_POST['pms_finishedproduct'];
} else {
  $pms_finishedproduct = "";
}

if (isset($_POST["pms_supplier_name"])) {
  $pms_supplier_name = $_POST['pms_supplier_name'];
} else {
  $pms_supplier_name = "";
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



if (isset($_POST["pms_rs_prod_item"])) {
  $pms_rs_prod_item = $_POST['pms_rs_prod_item'];
} else {
  $pms_rs_prod_item = "";
}

if (isset($_POST["pms_rs_sup_name"])) {
  $pms_rs_sup_name = $_POST['pms_rs_sup_name'];
} else {
  $pms_rs_sup_name = "";
}

if (isset($_POST["pms_rs_qty"])) {
  $pms_rs_qty = $_POST['pms_rs_qty'];
} else {
  $pms_rs_qty = "";
}

// if (isset($_POST["pms_delivered"])) {
//   $pms_delivered = $_POST['pms_delivered'];
// } else {
//   $pms_delivered = "";
// }






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
   "UPDATE pms_rawmaterials
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




if ($pms_mode=="addrawmaterial") {

  $result = mysqli_query($GLOBALS["___mysqli_ston"], 
  "SELECT * FROM pms_rawmaterials WHERE pms_archive_status = 0 AND pms_finishedproduct = 0 
                                  AND pms_item = '$pms_item'");

          if(mysqli_num_rows($result) == 1) {
            echo '
            <div id="myModal">
                <div class="modal-dialog" style="margin-left: -50px;">
                    <div class="modal-content">
                        <div class="modal-header">
          
          
                        </div>
                            <div class="modal-body">
                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-error"></i> The Product of ' . $pms_item . ' is Already Existed! </h4>
                            </div>
                            <div class="modal-footer">
                                <button onclick="document.getElementById(&#39;myModal&#39;).style.display=&#39;none&#39;" class="btn btn-primary" type="button">Close</button>
                            </div>
                    </div>
                </div>
            </div>
                    ';
          } else {
             
            echo '
            <div id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            </div>
                                <div class="modal-body">
                                <h4 class="modal-title" id="myModalLabel"> <i class="fa fa-check"></i> Successfully Saved!</h4>
                                </div>
                            <div class="modal-footer">
                                <button onclick="document.getElementById(&#39;myModal&#39;).style.display=&#39;none&#39;" class="btn btn-primary" type="button">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
                ';

            move_uploaded_file($_FILES["pms_image"]["tmp_name"],"images/uploadimage/" . $_FILES["pms_image"]["name"]);
            $imageLocation=$_FILES["pms_image"]["name"];
            $con=mysqli_query($GLOBALS["___mysqli_ston"],
              "INSERT INTO
              pms_rawmaterials
              (
              pms_sku,
              pms_item,
              pms_supplier_name,
              pms_description,
              pms_qty,
              pms_unit,
              pms_type_of_units,
              pms_type,
              pms_cost,
              pms_finishedproduct,
              pms_finishedproduct_code,
              pms_image,
              pms_archive_status,
              pms_supplier_number
              )
              VALUES
              (
              '$pms_sku',
              '$pms_item',
              '$pms_supplier_name',
              '$pms_description',
              '$pms_qty',
              '$pms_unit',
              '$pms_type_of_units',
              '$pms_type',
              '$pms_cost',
              0,
              '0',
              '$pms_image_tmp',
              '0',
              '$pms_supid'
              )");

              $con=mysqli_query($GLOBALS["___mysqli_ston"], 
              "UPDATE pms_suppliers_product
              SET pms_suprod_quantity = pms_suprod_quantity - $pms_qty
              WHERE pms_id = '$pms_supid'");

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
              'Added $pms_item (Raw Material)',
              '$pms_usertype'
              )");


            header("Location: pms_raw_material.php");
          }
  



  // exit();

  

  

} else if ($pms_mode=="editrawmaterial") {
  echo '
    <div id="myModal">
        <div class="modal-dialog" style="margin-left: -50px;">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                    <div class="modal-body">
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil"></i> Successfully Edited! </h4>
                    </div>
                    <div class="modal-footer">
                        <button onclick="document.getElementById(&#39;myModal&#39;).style.display=&#39;none&#39;" class="btn btn-primary" type="button">Close</button>
                    </div>
            </div>
        </div>
    </div>
            ';
  $con=mysqli_query($GLOBALS["___mysqli_ston"], 
   "UPDATE pms_rawmaterials
    SET pms_sku='$pms_sku',
        pms_item='$pms_item',
        pms_description='$pms_description',
        pms_qty='$pms_qty',
        pms_unit='$pms_unit',
        pms_type_of_units='$pms_type_of_units',
        pms_type='$pms_type',
        pms_cost='$pms_cost',
        pms_finishedproduct=0,
        pms_supplier_name='$pms_supplier_name'
    WHERE pms_id = $key");
}

if ($pms_archivemode=="archiverawmaterial") {

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
    "UPDATE pms_rawmaterials
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
    <title>Raw Material / Products| Inventory and Distribution Management System</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">

    <link href="css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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
    </script>


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

<body class="fix-header fix-sidebar" onload="animateEffect()">
<!-- <body class="fix-header fix-sidebar" onload='loadCategories()'> -->


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
                  <h3 class="text-primary">Raw Material / Products</h3> </div>
              <div class="col-md-7 align-self-center">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                      <li class="breadcrumb-item active">Raw Material / Products</li>
                  </ol>
              </div>
          </div>
          <!-- End Bread crumb -->
          <!-- Container fluid  -->

<!-- <div id="myDiv" class="animate-right"> -->


          <div class="container-fluid">

              <div class="row">
                  <div class="col-12">
                      <div class="card" >
                          <div class="card-body">

                            <?php 
                            $sql = mysqli_query($GLOBALS["___mysqli_ston"], 
                            "SELECT * FROM pms_rawmaterials WHERE pms_archive_status = 0 AND pms_finishedproduct = 0");
                            ?>

                            <button
                            onclick="addRawMaterials();"
                            class="btn btn-primary"
                            href="#rawMaterialModal"
                            data-target="#rawMaterialModal"
                            style="color:#fff;"
                            >
                            <i class="fa fa-plus"></i> Add New Raw Materials / Products
                            </button>
                            &nbsp;
                            <button
                            onclick="archiveListRawMaterials();"
                            class="btn btn-primary"
                            href="#archiveRawMaterialModal"
                            data-target="#archiveRawMaterialModal"
                            style="color:#fff;"
                            >
                            <i class="fa fa-list"></i> Archives of Raw Materials / Products
                            </button>

                            <?php 
                            $sql = mysqli_query($GLOBALS["___mysqli_ston"], 
                            "SELECT * FROM pms_rawmaterials WHERE pms_archive_status = 0 AND pms_finishedproduct = 0");
                            $count_entry = mysqli_num_rows($sql);
                            echo "<p class='text-primary' style='position:absolute; right:10px; top:30px;'>Total Number of Raw Materials / Products: $count_entry</p>"; 
                            ?>

                          </div>
                          <pre id="contents"></pre>
                  <h4 class="card-title">Save As</h4>

                  

                    <table id="DataTable1" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Image</th>
                                <th style="text-align: center;">SKU</th>
                                <th style="text-align: center;">Item</th>
                                <th style="text-align: center;">Supplier Name</th>
                                <th style="text-align: center;">Quantity</th>
                                <th style="text-align: center;">Unit</th>
                                <th style="text-align: center;">Type</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                          <?php
                          $sql = mysqli_query($GLOBALS["___mysqli_ston"], 
                                 "SELECT * FROM pms_rawmaterials WHERE pms_archive_status = 0 AND pms_finishedproduct = 0");
                                 while ($row=mysqli_fetch_array($sql)) {
                                 $fp_status = $row['pms_finishedproduct'];
                                 $pms_qty = $row['pms_qty'];
                                 if ($fp_status == "1"){
                                     $fp_status = "Finished Product";
                                 } else if ($fp_status == "0"){
                                    $fp_status = "Raw Material";
                                }

                                if($pms_qty <= 0){
                          ?>
                                <tr>

                                <td style="text-align: center; color: #000;">
                               <button onclick="viewRawMaterial('<?php echo $row['pms_id'] ; ?>',
                                                                '<?php echo $row['pms_sku'] ?>',
                                                                '<?php echo $row['pms_item'] ?>',
                                                                '<?php echo $row['pms_description'] ?>',
                                                                '<?php echo $row['pms_qty'] ?>',
                                                                '<?php echo $row['pms_unit'] ?>',
                                                                '<?php echo $row['pms_type_of_units'] ?>',
                                                                '<?php echo $row['pms_type'] ?>',
                                                                '<?php echo $row['pms_cost'] ?>',
                                                                '<?php echo $row['pms_finishedproduct'] ?>',
                                                                '<?php echo $row['pms_image'] ?>',
                                                                '<?php echo $row['pms_supplier_name'] ?>');"
                                            href="#rawMaterialModal<?php echo $row['pms_id'];?>"
                                            style="background: none;"
                                            title="Click here to view">
                                <img style="width:80px;height:60px" src="images/uploadimage/<?php echo $row['pms_image'];?>">
                                </button>
                                </td>

                                <td style="text-align: center; color: #000;"><?php echo $row['pms_sku']; ?></td>

                                <td style="text-align: center; color: #000;"><?php echo $row['pms_item']; ?></td>

                                <td style="text-align: center; color: #000;"><?php echo $row['pms_supplier_name']; ?></td>

                                <td style="text-align: center; color: #000;"><?php echo $row['pms_qty']; ?></td>

                                <td style="text-align: center; color: #000;"><?php echo $row['pms_unit'] . " " . $row['pms_type_of_units']; ?></td>

                                <td style="text-align: center; color: #000;"><?php echo $fp_status; ?></td>

                                <td style="text-align: center; color: #000; width: 200px;">

                                <a href="pms_purchase_order.php"
                                            style="color: #ffffff; margin-top: 10px;"
                                            class="btn btn-danger"><i class="icon-list icon-large"> Purchase Order</i></a>
                                        
                                </td>


                                </tr>
                                <?php } } ?>
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
                <center>
                          <div id="passArchiveModal" class="w3-modal">
                          <div class="w3-modal-content" style="margin-top: 150px; width: 450px;">
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
                         </center>
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

                 <div id="rawMaterialModal" class="w3-modal">
                 <div class="w3-modal-content" style="margin-top: -80px; margin-left: 400px; width: 700px; height: 1250px;">
                     <div class="w3-container">
                       <br>
                       <center>
                       <h4 class="modal-title"><span id="rawMaterialModaltitle"></span></h4>
                       </center>
                       <br><br>
                       <span onclick="document.getElementById('rawMaterialModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

                       <form class="form-horizontal" method="post" enctype='multipart/form-data'>

                             <input type="hidden" name="inputstatus" id="inputstatus">
                             <input type="hidden" name="inputkey" id="inputkey">

                              <center>
                               <img src="images/uploadimage/noimage.png" id="rawmaterialimagesource" width="150px" height="150px" style="border-radius: 25px;">
                              </center><br>

                                   <div class="form-group" style="width: 850px;">
                                     <label class="control-label col-lg-3" for="price">SKU</label>
                                     <div class="col-lg-9">
                                       <?php
                                       $seed = str_split('123456789');
                                       shuffle($seed);
                                       $rand = 'PMS0';
                                       foreach (array_rand($seed, 3) as $k) $rand .= $seed[$k];
                                       // echo $rand;
                                       ?>
                                       <input type="text" class="form-control input-focus" id="pms_sku" name="pms_sku"
                                              value="<?php echo $rand; ?>" readonly>
                                     </div>
                                   </div>

                                 <input type="hidden" name="pms_supid" id="pms_supid">

                                   <div class="form-group" style="width: 850px;">
                                     <label class="control-label col-lg-3" for="price">Item / Product Name</label>
                                     <div class="col-lg-9">
                                       <select class="form-control input-focus" id='pms_item' name="pms_item" onchange="itemProduct();">
                                            <option value="" disabled selected>Select Item / Product Name</option>
                                            <?php
                                                $sql_raw_material = "SELECT DISTINCT pms_suprod_itemname FROM pms_suppliers_product WHERE pms_suprod_finishproduct = 0 AND pms_suprod_status = 0";
                                                                                                         // WHERE pms_delivered = 0
                                                $sql_rm = mysqli_query($GLOBALS["___mysqli_ston"], $sql_raw_material);
                                                while ($row_rm=mysqli_fetch_array($sql_rm)) {
                                                $pms_supplier_itemname = $row_rm['pms_suprod_itemname'];
                                            ?>
                                            <option value="<?php echo $pms_supplier_itemname; ?>"> <?php echo $pms_supplier_itemname; ?> </option>
                                            <?php } ?>
                                        </select>
                                     </div>
                                   </div>

                                   <div class="form-group" style="width: 850px;">
                                     <label class="control-label col-lg-3" for="price">Supplier Name</label>
                                     <div class="col-lg-9">
                                       <input type="text" class="form-control input-focus" id="pms_supplier_name" name="pms_supplier_name" readonly>
                                     </div>
                                   </div> 

                                  
                                  <input type="hidden" class="form-control input-focus" id="pms_image_tmp" name="pms_image_tmp">

                                   <!-- <div class="form-group" style="width: 850px;">
                                     <label class="control-label col-lg-3" for="price"> <span id="rawmaterialImageTitle">Raw Material Image</span></label>

                                     <div class="col-lg-9">
                                       <input type="file" onchange="readURL(this);" class="form-control input-focus" id="pms_image" name="pms_image">
                                     </div>
                                   </div> -->
                                    

                                   <div class="form-group" style="width: 850px;">
                                     <label class="control-label col-lg-3" for="price">Description</label>
                                     <div class="col-lg-9">
                                       <input type="text" class="form-control input-focus" id="pms_description" name="pms_description" readonly>
                                     </div>
                                   </div>

                                   <div class="form-group" style="width: 850px;">
                                     <label class="control-label col-lg-3" for="price">Cost</label>
                                     <div class="col-lg-9">
                                       <input type="number" class="form-control input-focus" id="pms_cost" name="pms_cost" readonly>
                                     </div>
                                   </div>

                                   <div class="form-group" style="width: 850px;">
                                     <label class="control-label col-lg-3" for="price">Unit</label>
                                     <div class="col-lg-9">
                                       <input type="number" class="form-control input-focus" id="pms_unit" name="pms_unit" readonly>
                                       <br>
                                       <input type="text " class="form-control input-focus" id="pms_type_of_units" name="pms_type_of_units" readonly>
                                       <!-- <select class="form-control input-focus" id="pms_type_of_units" name="pms_type_of_units">
                                           <option value="" disabled selected>Select Types of Units</option>
                                           <option value="Gram (g)">Gram (g)</option>
                                           <option value="Miligram (mg)">Miligram (mg)</option>
                                           <option value="Kilogram (kg)">Kilogram (kg)</option>
                                           <option value="Decargram (dkg)">Decargram (dkg)</option>
                                       </select> -->
                                     </div>
                                   </div>
                                   
                                   <div class="form-group" style="width: 850px;">
                                     <label class="control-label col-lg-3" for="price">Quantity </label>
                                     <div class="col-lg-9">
                                       <input type="number" class="form-control input-focus" id="pms_qty" name="pms_qty" placeholder="Enter Quantity" required>
                                       <label style="color: green;"> <span id="remainingQuantity"> </span> </label>
                                     </div>
                                   </div>

                                  <!-- Classification / Type -->
                                   <div class="form-group" style="width: 850px;">
                                     <label class="control-label col-lg-3" for="price">Classification</label>
                                     <div class="col-lg-9">
                                       <select class="form-control input-focus" id="pms_type" name="pms_type">
                                           <option value="" disabled selected>Select Types of Packaging Product</option>
                                           <option value="Plastics Packaging">Plastics Packaging</option>
                                           <option value="Flexible Packaging">Flexible Packaging</option>
                                           <option value="Preservation Packaging">Preservation Packaging</option>
                                       </select>
                                     </div>
                                   </div>

                                   <br><br>

                       <center>
                         <div style="text-align: center;">

                           <button id="saveBtn" type="submit" style="border-radius: 20px;" class="btn btn-lg btn-success"
                           >Save</button>&nbsp;&nbsp;
                           <button id="cancelBtn" type="button" style="border-radius: 20px;" class="btn btn-lg btn-danger" onclick="document.getElementById('rawMaterialModal').style.display='none'" class="btn btn-default" data-dismiss="modal">Cancel</button>

                         </div>
                       </center><br><br>

                      </form>
                     </div>
                   </div>
                 </div>





                 <div id="archiveRawMaterialModal" class="w3-modal">
                 <div class="w3-modal-content" style="margin-top: -70px; margin-left: 100px; width: 1300px;">
                     <div class="w3-container">
                       <br>
                       <center>
                       <h4 class="modal-title"><span id="archiveRawMaterialModaltitle"></span></h4>
                       </center>
                       <br><br>
                       <span onclick="document.getElementById('archiveRawMaterialModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

                     <h4 class="card-title">Save As</h4>
                       <table id="DataTableAssembleList"
                              class="display nowrap table table-hover table-striped table-bordered"
                              cellspacing="0" >
                                 <thead>
                                     <tr>
                                         <th style="text-align: center;">#</th>
                                         <th style="text-align: center;">Image</th>
                                         <th style="text-align: center;">SKU</th>
                                         <th style="text-align: center;">Item/Product Name</th>
                                         <th style="text-align: center;">Description</th>
                                         <th style="text-align: center;">Quantity</th>
                                         <th style="text-align: center;">Unit</th>
                                         <th style="text-align: center;">Classification</th>
                                         <th style="text-align: center;">Cost</th>
                                         <th style="text-align: center;">Action</th>
                                     </tr>
                                 </thead>

                                 <tbody>

                                   <?php
                                   $sql_query_header_list = "SELECT * FROM pms_rawmaterials WHERE pms_archive_status = 1 AND pms_finishedproduct = 0";
                                   $sql = mysqli_query($GLOBALS["___mysqli_ston"], $sql_query_header_list);
                                   $header_count = 0;
                                   while ($row=mysqli_fetch_array($sql)) {
                                   // $pms_posted_dp = $row['pms_posted'];

                                   $header_count++;
                                   ?>
                                         <tr>

                                         <td style="color: #000; text-align: center;"><?php echo $header_count;?></td>

                                         <td style="text-align: center; color: #000;">
                                         
                                          <img style="width:80px;height:60px" src="images/uploadimage/<?php echo $row['pms_image'];?>">
                                         </td>

                                         <td style="text-align: center; color: #000;"><?php echo $row['pms_sku']; ?></td>

                                         <td style="text-align: center; color: #000;"><?php echo $row['pms_item']; ?></td>

                                         <td style="text-align: center; color: #000;"><?php echo $row['pms_description']; ?></td>
 
                                         <td style="text-align: center; color: #000;"><?php echo $row['pms_qty']; ?></td>

                                         <td style="text-align: center; color: #000;"><?php echo $row['pms_unit'] . " " . $row['pms_type_of_units'] ; ?></td>

                                         <td style="text-align: center; color: #000;"><?php echo $row['pms_type']; ?></td>

                                         <td style="text-align: center; color: #000;"><?php echo $row['pms_cost']; ?></td>

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

<script src="js/jquery.min.2.1.js"></script>

<script type="text/javascript">


function itemProduct() {
    var selectBox = document.getElementById("pms_item");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    // $("#pms_item").empty();
    FetchSupplier(selectedValue);
  }

function FetchSupplier(name) {

  
    $(document).ready(function(){	
        $.ajax({
            url: 'http://localhost/PMS/8080/pms_get_supplier.php?name=' + name,
            dataType: 'jsonp',
            jsonp: 'pms',
            timeout: 5000,
            success: function(data, status){
                $.each(data, function(i,item){ 
                    if (item.pms_id==undefined){

                    } 
                    else {
                        var supplier_id = item.pms_id ;
                        var supplier_image = item.pms_suprod_image ;
                        var supplier_item = item.pms_suprod_itemname;
                        var supplier_name = item.pms_suprod_suppliername ;
                        var supplier_description = item.pms_suprod_description;
                        var supplier_unit = item.pms_suprod_unit;
                        var supplier_typeofunit = item.pms_suprod_typeunit;
                        var supplier_cost = item.pms_suprod_cost;
                        var supplier_img_tmp = item.pms_suprod_image
                        var supplier_quantity = item.pms_suprod_quantity

                        

                        if (supplier_image==undefined) {
                            var supplierimage_info = "" ;
                        } else {
                            var supplierimage_info = supplier_image ;
                        }

                        $("#pms_supid").val(supplier_id);
                        $('#rawmaterialimagesource').attr('src', 'images/uploadimage/' + supplier_image);
                        $("#pms_supplier_name").val(supplier_name);
                        $("#pms_description").val(supplier_description);
                        $("#pms_unit").val(supplier_unit);
                        $("#pms_type_of_units").val(supplier_typeofunit);
                        $("#pms_cost").val(supplier_cost);
                        $("#pms_image_tmp").val(supplier_img_tmp);
                        $("#remainingQuantity").html("Remaining Quantity: " + supplier_quantity) ;
                        
                      }                  
                });
            },
            error: function(){
                alert("Connection Problem!") ;
            } 
        });
    });    
}
	
 function archivePass(){
    document.getElementById('archiveModal').style.display='none';
    document.getElementById('passArchiveModal').style.display='block';
 }

 function restoreArchivePass(){
    document.getElementById('restoreArchiveModal').style.display='none';
    document.getElementById('passRestoreArchiveModal').style.display='block';
 }

//  function readURL(input) {
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();

//         reader.onload = function (e) {
//             $('#rawmaterialimagesource')
//                 .attr('src', e.target.result);
//                 // .width(150)
//                 // .height(200);
//         };

//         reader.readAsDataURL(input.files[0]);
//     }
//  }


 function addRawMaterials()
 {
   document.getElementById('rawMaterialModal').style.display='block';

       $("#rawMaterialModaltitle").html("Add Raw Material / Products") ;
       $("#inputstatus").val("addrawmaterial") ;
      //  $("#inputkey").val(key) ;

       $('#pms_item').prop('disabled', false);
       $('#pms_qty').prop('disabled', false);
       $('#pms_type').prop('disabled', false);
       $('#pms_finishedproduct').prop('disabled', false);

       // $("#pms_sku").val("") ;
       $("#pms_item").val("") ;
       $("#pms_description").val("") ;
       $("#pms_qty").val("") ;
       $("#pms_unit").val("") ;
       $("#pms_type_of_units").val("") ;
       $("#pms_type").val("") ;
       $("#pms_cost").val("") ;
       $("#pms_finishedproduct").val("") ;
       $("#pms_finishedproduct_code").val("") ;
       

       $('#saveBtn').css('visibility','visible');
       $('#cancelBtn').css('visibility','visible');
       $('#rawmaterialimagesource').attr('src', 'images/uploadimage/noimage.png');

      //  document.getElementById("pms_image").style.visibility = "visible";
      //  document.getElementById("rawmaterialImageTitle").style.visibility = "visible";
      //  document.getElementById("saveBtn").style.visibility = "visible";
      //  document.getElementById("cancelBtn").style.visibility = "visible";
      //  document.getElementById("rawmaterialimagesource").src = "images/uploadimage/noimage.png";
 };
 
 function editRawMaterial(key,sku,item,suppliername,description,qty,unit,typeunit,type,cost,finishedproduct,image,status)
 {
  // alert(item);
       document.getElementById('rawMaterialModal').style.display='block';
       $("#rawMaterialModaltitle").html("Edit Raw Material / Products") ;
       $("#inputstatus").val("editrawmaterial") ;
       $("#inputkey").val(key) ;

       $('#pms_item').prop('disabled', true);
       $('#pms_qty').prop('disabled', false);
       $('#pms_type').prop('disabled', false);
       $('#pms_finishedproduct').prop('disabled', false);

       $("#pms_sku").val(sku) ;
       $("#pms_item").val(item) ;
       $("#pms_description").val(description) ;
       $("#pms_qty").val(qty) ;
       $("#pms_unit").val(unit) ;
       $("#pms_type_of_units").val(typeunit) ;
       $("#pms_type").val(type) ;
       $("#pms_cost").val(cost) ;
       $("#pms_finishedproduct").val(finishedproduct) ;
       $("#pms_supplier_name").val(suppliername);
       $("#pms_image_tmp").val(image);
       $('#rawmaterialimagesource').attr('src', 'images/uploadimage/' + image);

       $('#saveBtn').css('visibility','visible');
       $('#cancelBtn').css('visibility','visible');
 };


 function archiveRawMaterial(arch_pms_id)
 {
       document.getElementById('archiveModal').style.display='block';
       $("#archivestatus").val("archiverawmaterial") ;
       $("#archivekey").val(arch_pms_id) ;
 };


 function confirmArchiveKey(confirmArchive_key)
 {
       document.getElementById('restoreArchiveModal').style.display='block';
       document.getElementById('archiveRawMaterialModal').style.display='none';
       $("#archiverestorestatus").val("restorearchive") ;
       $("#archiverestorekey").val(confirmArchive_key) ;
 };

 function archiveListRawMaterials(){

   document.getElementById('archiveRawMaterialModal').style.display='block';
   $("#archiveRawMaterialModaltitle").html("ARCHIVES OF RAW MATERIALS / PRODUCTS") ;

 };
 
  function viewRawMaterial(key,sku,item,description,qty,unit,typeunit,type,cost,finishedproduct,image,suppliername)
 {
       document.getElementById('rawMaterialModal').style.display='block';
       $("#rawMaterialModaltitle").html("View Raw Material / Products") ;
       $("#inputkey").val(key) ;

       $("#pms_sku").val(sku) ;
       $("#pms_item").val(item) ;
       $("#pms_description").val(description) ;
       $("#pms_qty").val(qty) ;
       $("#pms_unit").val(unit) ;
       $("#pms_type_of_units").val(typeunit);
       $("#pms_type").val(type) ;
       $("#pms_cost").val(cost) ;
       $("#pms_finishedproduct").val(finishedproduct) ;
       $("#pms_supplier_name").val(suppliername);

       $('#pms_item').prop('disabled', true);
       $('#pms_qty').prop('disabled', true);
       $('#pms_type').prop('disabled', true);
       $('#pms_finishedproduct').prop('disabled', true);

       $('#saveBtn').css('visibility','hidden');
       $('#cancelBtn').css('visibility','hidden');

      //  $("#rawmaterialimagesource").val(image);
      $('#rawmaterialimagesource').attr('src', 'images/uploadimage/' + image);

      //  document.getElementById("pms_image").style.visibility = "hidden";
      //  document.getElementById("rawmaterialImageTitle").style.visibility = "hidden";
      //  document.getElementById("saveBtn").style.visibility = "hidden";
      //  document.getElementById("cancelBtn").style.visibility = "hidden";

      //  if (image=="") {
      //      var i = "images/uploadimage/noimage.png";
      //  }  else {
      //      var i = "images/uploadimage/" + image ;
      //  }

      //  document.getElementById("rawmaterialimagesource").src = i;
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

 <script type="text/javascript">
     $('#DataTable1').removeClass('dt-button buttons-copy buttons-html5')
 </script>

</body>

</html>
