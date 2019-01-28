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





  if (isset($_POST["pms_ss_prod_item"])) {
    $pms_ss_prod_item = $_POST['pms_ss_prod_item'];
  } else {
    $pms_ss_prod_item = "";
  }

  if (isset($_POST["pms_ss_sup_name"])) {
    $pms_ss_sup_name = $_POST['pms_ss_sup_name'];
  } else {
    $pms_ss_sup_name = "";
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
          <?php include ("includes/pms_sidebar.php");?>
      </div>
      <!-- End Left Sidebar  -->
      <!-- Page wrapper  -->
      <div class="page-wrapper">
          <!-- Bread crumb -->
          <div class="row page-titles">
              <div class="col-md-5 align-self-center">
                  <h3 class="text-primary">Finished Product(s)</h3> </div>
              <div class="col-md-7 align-self-center">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="javascript:void(0)">Product(s)</a></li>
                      <li class="breadcrumb-item active">Finished Product(s)</li>
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
                      <div class="card" >
                          <div class="card-body">
                       
                          <?php 
                            $sql = mysqli_query($GLOBALS["___mysqli_ston"], 
                            "SELECT * FROM pms_rawmaterials WHERE pms_archive_status = 0 AND pms_finishedproduct = 1");
                            $count_entry = mysqli_num_rows($sql);
                            echo "<p class='text-primary' style='position:absolute; right:10px; top:30px;'>Total Number of Finished Product(s): $count_entry</p>"; 
                            ?>

                  <h4 class="card-title">Save As</h4>

                    <table id="DataTable1" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Image</th>
                                <th style="text-align: center;">SKU</th>
                                <th style="text-align: center;">Item</th>
                                <th style="text-align: center;">Description</th>
                                <th style="text-align: center;">Quantity</th>
                                <th style="text-align: center;">Unit</th>
                                <th style="text-align: center;">Cost</th>
                                <th style="text-align: center;">Type</th>
                            </tr>
                        </thead>

                        <tbody>

                          <?php
                          $sql = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pms_rawmaterials WHERE pms_archive_status = 0 AND pms_finishedproduct = 1");
                          while ($row=mysqli_fetch_array($sql)) {
                                 $fp_status = $row['pms_finishedproduct'];
                                 if ($fp_status == "1"){
                                     $fp_status = "Finished Product";
                                 } else if ($fp_status == "0"){
                                    $fp_status = "Raw Material";
                                }
                          ?>
                                <tr>

                                <td style="text-align: center; color: #000;">
                                <button onclick="viewRawMaterial('<?php echo $row['pms_id'] ; ?>',
                                            '<?php echo $row['pms_sku'] ?>',
                                            '<?php echo $row['pms_item'] ?>',
                                            '<?php echo $row['pms_description'] ?>',
                                            '<?php echo $row['pms_qty'] ?>',
                                            '<?php echo $row['pms_unit'] ?>',
                                            '<?php echo $row['pms_type'] ?>',
                                            '<?php echo $row['pms_reorder'] ?>',
                                            '<?php echo $row['pms_cost'] ?>',
                                            '<?php echo $row['pms_wtpc'] ?>',
                                            '<?php echo $row['pms_finishedproduct'] ?>',
                                            '<?php echo $row['pms_image'] ?>');"
                                            href="#rawMaterialModal<?php echo $row['pms_id'];?>"
                                            style="background: none;"
                                            title="Click here to view">
                                <img style="width:80px;height:60px" src="images/uploadimage/<?php echo $row['pms_image'];?>">
                                </button>
                                </td>

                                <td style="text-align: center; color: #000;"><?php echo $row['pms_sku']; ?></td>

                                <td style="text-align: center; color: #000;"><?php echo $row['pms_item']; ?></td>

                                <td style="text-align: center; color: #000;"><?php echo $row['pms_description']; ?></td>

                                <td style="text-align: center; color: #000;"><?php echo $row['pms_qty']; ?></td>

                                <td style="text-align: center; color: #000;"><?php echo $row['pms_unit']; ?></td>

                                <td style="text-align: center; color: #000;"><?php echo "₱ " .$row['pms_cost']; ?></td>

                                 

                                <td style="color: #000;"><?php echo $fp_status; ?></td>
                                

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
                          <div id="deleteModal" class="w3-modal">
                          <div class="w3-modal-content" style="margin-top: 100px; margin-left: 335px; width: 700px;">
                               <div class="w3-container">
                                 <span onclick="document.getElementById('deleteModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

                                 <input type="hidden" name="deletestatus" id="deletestatus">
                                 <input type="hidden" name="deletekey" id="deletekey">
                                   <center><br>
                                   <h2>Do you want to Delete?</h2><br>

                                   <button type="submit"
                                           style="border-radius: 20px;"
                                           class="btn btn-success">Yes</button>&nbsp;&nbsp;
                                  <!-- <button type="submit"
                                          style="border-radius: 20px;"
                                          class="btn btn-success"
                                          onclick="confirmARM('<?php echo $row['pms_id'] ; ?>',
                                                                       '<?php echo $row['pms_sku'] ?>',
                                                                       '<?php echo $row['pms_item'] ?>',
                                                                       '<?php echo $row['pms_description'] ?>',
                                                                       '<?php echo $row['pms_qty'] ?>',
                                                                       '<?php echo $row['pms_unit'] ?>',
                                                                       '<?php echo $row['pms_type'] ?>',
                                                                       '<?php echo $row['pms_reorder'] ?>',
                                                                       '<?php echo $row['pms_cost'] ?>',
                                                                       '<?php echo $row['pms_wtpc'] ?>',
                                                                       '<?php echo $row['pms_finishedproduct'] ?>');">Yes</button>&nbsp;&nbsp; -->
                                   <button type="button" style="border-radius: 20px;" class="btn btn-danger" onclick="document.getElementById('deleteModal').style.display='none'">No</button><br><br><br>
                                   </center>

                               </div>
                             </div>
                         </div>
                       </form>

                 <div id="rawMaterialModal" class="w3-modal">
                 <div class="w3-modal-content" style="margin-top: -80px; margin-left: 350px; width: 700px; height: 1500px;">
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
                               <img src="" id="rawmaterialimagesource" alt="Walang Imahe" width="150px" height="150px" style="border-radius: 25px;">
                              </center><br>

                                   <div class="form-group" style="width: 850px;">
                                     <label class="control-label col-lg-3" for="price"> <span id="rawmaterialImageTitle">Raw Material Image</span></label>

                                     <div class="col-lg-9">
                                       <input type="file" onchange="readURL(this);" class="form-control input-focus" id="pms_image" name="pms_image">
                                     </div>
                                   </div>

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

                                   <div class="form-group" style="width: 850px;">
                                     <label class="control-label col-lg-3" for="price">Item / Product Name</label>
                                     <div class="col-lg-9">
                                       <input type="text" class="form-control input-focus" id="pms_item" name="pms_item" placeholder="Enter Item" required>
                                     </div>
                                   </div>

                                   <div class="form-group" style="width: 850px;">
                                     <label class="control-label col-lg-3" for="price">Description</label>
                                     <div class="col-lg-9">
                                       <input type="text" class="form-control input-focus" id="pms_description" name="pms_description" placeholder="Enter Description" required>
                                     </div>
                                   </div>

                                   <div class="form-group" style="width: 850px;">
                                     <label class="control-label col-lg-3" for="price">Quantity</label>
                                     <div class="col-lg-9">
                                       <input type="number" class="form-control input-focus" id="pms_qty" name="pms_qty" placeholder="Enter Quantity" required>
                                     </div>
                                   </div>

                                   <div class="form-group" style="width: 850px;">
                                     <label class="control-label col-lg-3" for="price">Unit</label>
                                     <div class="col-lg-9">
                                       <input type="number" class="form-control input-focus" id="pms_unit" name="pms_unit" placeholder="Enter Unit" required>
                                       <br>
                                       <select class="form-control input-focus" id="pms_type" name="pms_type">
                                           <option value="" disabled selected>Select Types of Units</option>
                                           <option value="Anti-corrosive Packaging">Metre (m)</option>
                                           <option value="Plastics Packaging">Kilogram (kg)</option>
                                           <option value="Plastics Packaging">second (s)</option>
                                           <option value="Plastics Packaging">ampere (A)</option>
                                           <option value="Plastics Packaging">kelvin (K)</option>
                                           <option value="Plastics Packaging">candela (cd)</option>
                                           <option value="Plastics Packaging">mole (mol)</option>
                                       </select>
                                     </div>
                                   </div>

                                  <!-- Classification / Type -->
                                   <div class="form-group" style="width: 850px;">
                                     <label class="control-label col-lg-3" for="price">Classification</label>
                                     <div class="col-lg-9">
                                       <!-- <input type="text" class="form-control input-focus" id="pms_type" name="pms_type" placeholder="Enter Classification" required> -->
                                       <select class="form-control input-focus" id="pms_type" name="pms_type">
                                           <option value="" disabled selected>Select Types of Packaging Product</option>
                                           <option value="Anti-corrosive Packaging">Anti-corrosive Packaging</option>
                                           <option value="Plastics Packaging">Plastics Packaging</option>
                                           <option value="Flexible Packaging">Flexible Packaging</option>
                                           <option value="Vacuum Packaging">Vacuum Packaging</option>
                                           <option value="Preservation Packaging">Preservation Packaging</option>
                                           <option value="Shock Mount Packaging">Shock Mount Packaging</option>
                                       </select>
                                     </div>
                                   </div>

                                   <div class="form-group" style="width: 850px;">
                                     <label class="control-label col-lg-3" for="price">Reorder</label>
                                     <div class="col-lg-9">
                                       <input type="number" class="form-control input-focus" id="pms_reorder" name="pms_reorder" placeholder="Enter Reorder" required>
                                     </div>
                                   </div>

                                   <div class="form-group" style="width: 850px;">
                                     <label class="control-label col-lg-3" for="price">Cost</label>
                                     <div class="col-lg-9">
                                       <input type="number" class="form-control input-focus" id="pms_cost" name="pms_cost" placeholder="Enter Cost" required>
                                     </div>
                                   </div>

                                   <div class="form-group" style="width: 850px;">
                                     <label class="control-label col-lg-3" for="price">Weight Per Piece</label>
                                     <div class="col-lg-9">
                                       <input type="number" class="form-control input-focus" id="pms_wtpc" name="pms_wtpc" placeholder="Enter WTPC" required>
                                     </div>
                                   </div>

                                   <div class="form-group" style="width: 850px;">
                                     <label class="control-label col-lg-3" for="price">Finished Product</label>
                                     <div class="col-lg-9">
                                         <select class="form-control input-focus" id="pms_finishedproduct" name="pms_finishedproduct">
                                             <option value="" disabled selected>Select Option</option>
                                             <option value="1">Yes</option>
                                             <option value="0">No</option>
                                         </select>
                                       <!-- <input type="text" class="form-control input-focus" id="pms_finishedproduct" name="pms_finishedproduct" placeholder="Enter your Finished Product" required>   -->
                                     </div>
                                   </div><br><br>

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
                 <div class="w3-modal-content" style="margin-top: -70px; margin-left: 15px; width: 1300px;">
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
                                         <th style="text-align: center;">SKU</th>
                                         <th style="text-align: center;">Item/Product Name</th>
                                         <th style="text-align: center;">Description</th>
                                         <th style="text-align: center;">Quantity</th>
                                         <th style="text-align: center;">Unit</th>
                                         <th style="text-align: center;">Reorder</th>
                                         <th style="text-align: center;">Cost</th>
                                         <th style="text-align: center;">WTPC</th>
                                         <th style="text-align: center;">Date/Time Created</th>
                                         <th style="text-align: center;">Action</th>
                                     </tr>
                                 </thead>

                                 <tbody>

                                   <?php
                                   $sql_query_header_list = "SELECT * FROM pms_rawmaterials";
                                   $sql = mysqli_query($GLOBALS["___mysqli_ston"], $sql_query_header_list);
                                   $header_count = 0;
                                   while ($row=mysqli_fetch_array($sql)) {
                                   // $pms_posted_dp = $row['pms_posted'];

                                   $header_count++;
                                   ?>
                                         <tr>

                                         <td style="color: #000; text-align: center;"><?php echo $header_count;?></td>

                                         <td style="color: #000; text-align: center;"><?php echo "aaa";?></td>

                                         <td style="color: #000; text-align: center;">

                                         <button
                                                    onclick="deleteAHM('. $row['pms_id'] . ');"
                                                    class="btn"
                                                    href="#deleteAssembleHeaderListModal"
                                                    data-target="#deleteAssembleHeaderListModal"
                                                    style="background-color: #ba1307; color: #ffffff;">
                                                    <i class="icon-trash icon-large"></i> Delete</button>


                                         </td>

                                         </tr>
                                                     <?php } ?>
                             </tbody>
                         </table>

                         <br> <br> <br>

                     </div>
                   </div>
                 </div>



 <script type="text/javascript">



 function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#rawmaterialimagesource')
                .attr('src', e.target.result);
                // .width(150)
                // .height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
 }

 function launch_toast() {
     var x = document.getElementById("toast")
     x.className = "show";
     setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
 }



 function addRawMaterials()
 {
   document.getElementById('rawMaterialModal').style.display='block';

       $("#rawMaterialModaltitle").html("Add Raw Material / Products") ;
       $("#inputstatus").val("addrawmaterial") ;

       // $("#pms_sku").val("") ;
       $("#pms_item").val("") ;
       $("#pms_description").val("") ;
       $("#pms_qty").val("") ;
       $("#pms_unit").val("") ;
       $("#pms_type").val("") ;
       $("#pms_reorder").val("") ;
       $("#pms_cost").val("") ;
       $("#pms_wtpc").val("") ;
       $("#pms_finishedproduct").val("") ;
       $("#pms_finishedproduct_code").val("") ;
       $("#pms_image").val("") ;

       document.getElementById("pms_image").style.visibility = "visible";
       document.getElementById("rawmaterialImageTitle").style.visibility = "visible";
       document.getElementById("saveBtn").style.visibility = "visible";
       document.getElementById("cancelBtn").style.visibility = "visible";
       document.getElementById("rawmaterialimagesource").src = "images/uploadimage/noimage.png";
 };

//  function generateRandomString($length = 10) {
//     $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
//     $charactersLength = strlen($characters);
//     $randomString = '';
//     for ($i = 0; $i < $length; $i++) {
//         // $randomString .= $characters[rand(0, $charactersLength - 1)];
//     }
//     return $randomString;
// }

 function editRawMaterial(key,sku,item,description,qty,unit,type,reorder,cost,wtpc,finishedproduct,image)
 {
       document.getElementById('rawMaterialModal').style.display='block';
       $("#rawMaterialModaltitle").html("Edit Raw Material / Products") ;
       $("#inputstatus").val("editrawmaterial") ;
       $("#inputkey").val(key) ;

       $("#pms_sku").val(sku) ;
       $("#pms_item").val(item) ;
       $("#pms_description").val(description) ;
       $("#pms_qty").val(qty) ;
       $("#pms_unit").val(unit) ;
       $("#pms_type").val(type) ;
       $("#pms_reorder").val(reorder) ;
       $("#pms_cost").val(cost) ;
       $("#pms_wtpc").val(wtpc) ;
       $("#pms_finishedproduct").val(finishedproduct) ;

       document.getElementById("pms_image").style.visibility = "hidden";
       document.getElementById("rawmaterialImageTitle").style.visibility = "hidden";
       document.getElementById("saveBtn").style.visibility = "visible";
       document.getElementById("cancelBtn").style.visibility = "visible";

       if (image=="") {
           var i = "images/uploadimage/noimage.png";
       }  else {
           var i = "images/uploadimage/" + image ;
       }

       document.getElementById("rawmaterialimagesource").src = i;
 };

 function deleteRawMaterial(key)
 {
       document.getElementById('deleteModal').style.display='block';

       // var lsNames = localStorage.getItem('uname'),
       //     arr = [];
       // if (!lsNames) { lsName = ''; }
       // arr = lsNames.split(',');
       //
       // arr.push(document.getElementById("uname").value);
       // lsNames = arr.join(',');
       // localStorage.setItem("uname", lsNames);
       // showLS();

       // alert(lsNames);
       $("#deletestatus").val("deleterawmaterial") ;
       $("#deletekey").val(key) ;

 };

 function confirmARM(a_key,a_sku,a_item,a_description,a_qty,a_unit,a_type,
                             a_reorder,a_cost,a_wtpc,a_finishedproduct)
 {
       document.getElementById('deleteModal').style.display='block';

       var lsNames = localStorage.getItem('uname'),
           arr = [];
       if (!lsNames) { lsName = ''; }
       arr = lsNames.split(',');

       arr.push(document.getElementById("uname").value);
       lsNames = arr.join(',');
       localStorage.setItem("uname", lsNames);
       // showLS();

       // alert(lsNames);
       // $("#deletestatus").val("deleterawmaterial") ;
       // $("#deletekey").val(key) ;

 };

 function archiveListRawMaterials(){

   document.getElementById('archiveRawMaterialModal').style.display='block';
   $("#archiveRawMaterialModaltitle").html("ARCHIVES OF RAW MATERIALS / PRODUCTS") ;

   // var ls = localStorage.getItem('uname');
   // document.getElementById('contents').innerHTML = "Your data is stored:\n"+ls.substr(1);

 };

 // function saveData(){
 //   var lsNames = localStorage.getItem('uname'),
 //       arr = [];
 //   if (!lsNames) { lsName = ''; }  // initialize if null
 //   arr = lsNames.split(',');
 //
 //   arr.push(document.getElementById("uname").value);
 //   lsNames = arr.join(',');
 //   localStorage.setItem("uname", lsNames);
 //   showLS();
 // }

 function showLS() {
   var ls = localStorage.getItem('uname');
   document.getElementById('contents').innerHTML = "Your data is stored:\n"+ls.substr(1);
 }

  function viewRawMaterial(key,sku,item,description,qty,unit,type,reorder,cost,wtpc,finishedproduct,image)
 {
       document.getElementById('rawMaterialModal').style.display='block';
       $("#rawMaterialModaltitle").html("View Raw Material / Products") ;
       // $("#inputstatus").val("viewrawmaterial") ;
       $("#inputkey").val(key) ;

       $("#pms_sku").val(sku) ;
       $("#pms_item").val(item) ;
       $("#pms_description").val(description) ;
       $("#pms_qty").val(qty) ;
       $("#pms_unit").val(unit) ;
       $("#pms_type").val(type) ;
       $("#pms_reorder").val(reorder) ;
       $("#pms_cost").val(cost) ;
       $("#pms_wtpc").val(wtpc) ;
       $("#pms_finishedproduct").val(finishedproduct) ;

       document.getElementById("pms_image").style.visibility = "hidden";
       document.getElementById("rawmaterialImageTitle").style.visibility = "hidden";
       document.getElementById("saveBtn").style.visibility = "hidden";
       document.getElementById("cancelBtn").style.visibility = "hidden";

       if (image=="") {
           var i = "images/uploadimage/noimage.png";
       }  else {
           var i = "images/uploadimage/" + image ;
       }

       document.getElementById("rawmaterialimagesource").src = i;
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

 <script type="text/javascript">
     $('#DataTable1').removeClass('dt-button buttons-copy buttons-html5')
 </script>

</body>

</html>
