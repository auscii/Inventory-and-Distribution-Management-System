<?php
include("includes/pms_dbcon.php");
$curr_uri = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$pmn = "";
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



if (isset($_POST["pms_fullname"])) {
  $pms_fullname = $_POST['pms_fullname'];
 } else {
  $pms_fullname = "";
}

if (isset($_POST["pms_address"])) {
  $pms_address = $_POST['pms_address'];
 } else {
  $pms_address = "";
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

if (isset($_POST["pms_terms"])) {
  $pms_terms = $_POST['pms_terms'];
 } else {
  $pms_terms = "";
}


if (isset($_POST['pms_suprod_letter_id'])) {
  $pms_suprod_letter_id = $_POST['pms_suprod_letter_id'];
} else {
  $pms_suprod_letter_id = "";
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

  



  if (isset($_POST["inputstatusprodsupplier"])) {
    $inputstatusprodsupplier = $_POST['inputstatusprodsupplier'];
   } else {
    $inputstatusprodsupplier = "";
  }
  
  if (isset($_POST["inputkeyprodsupplier"])) {
    $inputkeyprodsupplier = $_POST['inputkeyprodsupplier'];
   } else {
    $inputkeyprodsupplier = "";
  }

  if (isset($_POST["pms_suprod_itemname"])) {
    $pms_suprod_itemname = $_POST['pms_suprod_itemname'];
   } else {
    $pms_suprod_itemname = "";
  }

  if (isset($_POST["pms_suprod_description"])) {
    $pms_suprod_description = $_POST['pms_suprod_description'];
   } else {
    $pms_suprod_description = "";
  }

  if (isset($_POST["pms_suprod_unit"])) {
    $pms_suprod_unit = $_POST['pms_suprod_unit'];
   } else {
    $pms_suprod_unit = "";
  }

  if (isset($_POST["pms_suprod_typeunit"])) {
    $pms_suprod_typeunit = $_POST['pms_suprod_typeunit'];
   } else {
    $pms_suprod_typeunit = "";
  }
  
  
  if (isset($_POST["pms_suprod_cost"])) {
    $pms_suprod_cost = $_POST['pms_suprod_cost'];
   } else {
    $pms_suprod_cost = "";
  }

  if (isset($_POST["pms_suprod_suppliername"])) {
    $pms_suprod_suppliername = $_POST['pms_suprod_suppliername'];
   } else {
    $pms_suprod_suppliername = "";
  }

  if (isset($_POST["pms_suprod_image"])) {
    $pms_suprod_image = $_POST['pms_suprod_image'];
   } else {
    $pms_suprod_image = "";
  }

  if (isset($_POST["pms_suprod_finishproduct"])) {
    $pms_suprod_finishproduct = $_POST['pms_suprod_finishproduct'];
   } else {
    $pms_suprod_finishproduct = "";
  }

  if (isset($_POST["pms_suprod_quantity"])) {
    $pms_suprod_quantity = $_POST['pms_suprod_quantity'];
   } else {
    $pms_suprod_quantity = "";
  }

  if(isset($_GET["sup_id"])){
    $sup_id = $_GET["sup_id"];
  } else {
    $sup_id = "";
  }

  if(isset($_GET["fullname"])){
    $fullname = $_GET["fullname"];
  } else {
    $fullname = "";
  }


  

  if ($inputstatusprodsupplier=="addproductsupplier") {

    $result = mysqli_query($GLOBALS["___mysqli_ston"], 
  "SELECT * FROM pms_suppliers_product WHERE pms_suprod_status = 0 AND pms_suprod_finishproduct = 0 
                                  AND pms_suprod_itemname = '$pms_suprod_itemname'");

    if(mysqli_num_rows($result) == 1) {
    echo '
    <div id="myModal">
        <div class="modal-dialog" style="margin-left: -50px;">
            <div class="modal-content">
                <div class="modal-header">
    
    
                </div>
                    <div class="modal-body">
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-error"></i> The Product of ' . $pms_suprod_itemname . ' is Already Existed! </h4>
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
      move_uploaded_file($_FILES["pms_suprod_image"]["tmp_name"],"images/uploadimage/" . $_FILES["pms_suprod_image"]["name"]);
      $imageLocation=$_FILES["pms_suprod_image"]["name"];
      $con=mysqli_query($GLOBALS["___mysqli_ston"],
        "INSERT INTO
        pms_suppliers_product
        (
        pms_cat_id,
        pms_suprod_image,
        pms_suprod_itemname,
        pms_suprod_description,
        pms_suprod_unit,
        pms_suprod_typeunit,
        pms_suprod_cost,
        pms_suprod_suppliername,
        pms_suprod_finishproduct,
        pms_suprod_quantity,
        pms_suprod_letter_id
        )
        VALUES
        (
        '$sup_id',
        '$imageLocation',
        '$pms_suprod_itemname',
        '$pms_suprod_description',
        '$pms_suprod_unit',
        '$pms_suprod_typeunit',
        '$pms_suprod_cost',
        '$pms_suprod_suppliername',
        '$pms_suprod_finishproduct',
        '$pms_suprod_quantity',
        '$pms_suprod_letter_id'
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
        'Added $pms_suprod_itemname (Supplier Product)',
        '$pms_usertype'
        )");
    }
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
     "UPDATE pms_suppliers_product
      SET pms_suprod_status = 0
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
  
  
  if ($pms_archivemode=="archivesuprod") {
  
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
        "UPDATE pms_suppliers_product
        SET pms_suprod_status = 1
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


if ($inputstatusprodsupplier=="editprodsupplier") {
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
    "UPDATE pms_suppliers_product
    SET pms_suprod_itemname='$pms_suprod_itemname',
        pms_suprod_description='$pms_suprod_description',
        pms_suprod_unit='$pms_suprod_unit',
        pms_suprod_typeunit='$pms_suprod_typeunit',
        pms_suprod_cost='$pms_suprod_cost',
        pms_suprod_finishproduct='$pms_suprod_finishproduct',
        pms_suprod_quantity='$pms_suprod_quantity'
    WHERE pms_id = $inputkeyprodsupplier");
}

// if ($pms_deletemode=="deleteProdSupplier") {
//     echo '
//   <div id="myModal">
//       <div class="modal-dialog" style="margin-left: -50px;">
//           <div class="modal-content">
//               <div class="modal-header">


//               </div>
//                   <div class="modal-body">
//                   <h4 class="modal-title" id="myModalLabel"><i class="fa fa-trash"></i> Successfully Deleted! </h4>
//                   </div>
//                   <div class="modal-footer">
//                       <button onclick="document.getElementById(&#39;myModal&#39;).style.display=&#39;none&#39;" class="btn btn-primary" type="button">Close</button>
//                   </div>
//           </div>
//       </div>
//   </div>
//           ';
//   $con=mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM pms_suppliers_product WHERE pms_id = $deletekey");
// }

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
    <title>Product Supplier | Inventory and Distribution Management System</title>
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
    window.location.href = "lock/pms_ls.php";
}

function resetTimer() {
    clearTimeout(t);
     t = setTimeout(logout, 50000000)
}
</script>
</head><input type="hidden" id="url" value="<?php echo $curr_uri; ?>">


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
                                        <h3 class="m-b-20" class ="align-self-center"> ABOUT US</h3>

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
                  <h3 class="text-primary">Product Supplier <?php echo $fullname; ?></h3> </div>
              <div class="col-md-7 align-self-center">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="pms_supplier.php">Supplier</a></li>
                      <li class="breadcrumb-item active">Product Supplier</li>
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

                <button onclick="addProductSupplier();"
                        id="addSupplierBtn"
                        class="btn btn-primary"
                        style="color: #ffffff;"
                        class="btn"><i class="fa fa-plus"> Add Product of Supplier(s)
                        </i></button>

                &nbsp;

                <button
                onclick="archiveListProdSup();"
                class="btn btn-primary"
                href="#archiveCustomerModal"
                data-target="#archiveCustomerModal"
                style="color:#fff;"
                >
                <i class="fa fa-list"></i> Archives of Product Supplier(s)
                </button>

                <?php 
                $sql = mysqli_query($GLOBALS["___mysqli_ston"], 
                "SELECT * FROM pms_suppliers_product WHERE pms_suprod_suppliername = '$fullname' AND pms_suprod_status = 0");
                $count_entry = mysqli_num_rows($sql);
                echo "<p class='text-primary' style='position:absolute; right:10px; top:30px;'>Total Number of Product(s) of $fullname: $count_entry</p>"; 
                ?>

                </div>

          <h4 class="card-title">Save As</h4>

          <table id="DataTable1" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">Supplier Product ID</th>
                        <th style="text-align: center;">Image</th>
                        <th style="text-align: center;">Supplier Name</th>
                        <th style="text-align: center;">Item Name</th>
                        <th style="text-align: center;">Quantity</th>
                        <th style="text-align: center;">Unit</th>
                        <th style="text-align: center;">Cost</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>

                <tbody>

          <?php
          $header_count = 0; 
          $sql = mysqli_query($GLOBALS["___mysqli_ston"], 
          "SELECT * FROM pms_suppliers_product WHERE pms_suprod_suppliername = '$fullname' AND pms_suprod_status = 0");
          while ($row=mysqli_fetch_array($sql)) {
              $header_count++;
          ?>
                                <tr>

                                <td style="text-align: center; color: #000; text-align: center;"><?php echo $header_count;?></td>

                                <td style="text-align: center; color: #000;"><?php echo $row['pms_suprod_letter_id']; ?></td>

                                <td style="text-align: center; color: #000;">
                                   <button onclick="viewSupProd('<?php echo $row['pms_id'] ; ?>',
                                                                '<?php echo $row['pms_suprod_image'] ; ?>',
                                                                '<?php echo $row['pms_suprod_itemname'] ; ?>',
                                                                '<?php echo $row['pms_suprod_description'] ; ?>',
                                                                '<?php echo $row['pms_suprod_unit'] ; ?>',
                                                                '<?php echo $row['pms_suprod_typeunit'] ; ?>',
                                                                '<?php echo $row['pms_suprod_cost'] ; ?>',  
                                                                '<?php echo $row['pms_suprod_suppliername'] ; ?>',  
                                                                '<?php echo $row['pms_suprod_finishproduct'] ; ?>',  
                                                                '<?php echo $row['pms_suprod_quantity'] ; ?>');"
                                            href="#productSupplierModal<?php echo $row['pms_id'];?>"
                                            style="background: none;"
                                            title="Click here to view">
                                <img style="width:80px;height:60px" src="images/uploadimage/<?php echo $row['pms_suprod_image'];?>">
                                </button>
                                </td>

                                <!-- <td style="text-align: center;"><img style="width:80px;height:60px" src="images/uploadimage/<?php //echo $row['pms_suprod_image'];?>"></td> -->

                                <td style="text-align: center; color: #000;"><?php echo $fullname; ?></td>

                                <td style="text-align: center; color: #000;"><?php echo $row['pms_suprod_itemname']; ?></td>

                                <td style="text-align: center; color: #000;"><?php echo $row['pms_suprod_quantity']; ?></td>

                                <td style="text-align: center; color: #000;"><?php echo $row['pms_suprod_unit'] . " " . $row['pms_suprod_typeunit']; ?></td>

                                <td style="text-align: center; color: #000;"><?php echo $row['pms_suprod_cost']; ?></td>

                                <td style="text-align: center; color: #000; width: 200px;">
                                  <button onclick="editprodsupplier('<?php echo $row['pms_id'] ; ?>',
                                                                '<?php echo $row['pms_suprod_image'] ; ?>',
                                                                '<?php echo $row['pms_suprod_itemname'] ; ?>',
                                                                '<?php echo $row['pms_suprod_description'] ; ?>',
                                                                '<?php echo $row['pms_suprod_unit'] ; ?>',
                                                                '<?php echo $row['pms_suprod_typeunit'] ; ?>',
                                                                '<?php echo $row['pms_suprod_cost'] ; ?>',
                                                                '<?php echo $row['pms_suprod_suppliername'] ; ?>',
                                                                '<?php echo $row['pms_suprod_finishproduct'] ; ?>',  
                                                                '<?php echo $row['pms_suprod_quantity'] ; ?>');"
                                            href="#productSupplierModal<?php echo $row['pms_id'];?>"
                                            style="background-color: #3bdb39; color: #ffffff;"
                                            class="btn"><i class="icon-pencil icon-large"> Edit</i></button>
                                &nbsp;
                                <button onclick="archiveSupProd('<?php echo $row['pms_id'] ?>');"
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
                        <th style="text-align: center;">Supplier Name</th>
                        <th style="text-align: center;">Item Name</th>
                        <th style="text-align: center;">Description</th>
                        <th style="text-align: center;">Unit</th>
                        <th style="text-align: center;">Cost</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>

                <tbody>

          <?php
          $header_count = 0; 
          $sql = mysqli_query($GLOBALS["___mysqli_ston"], 
          "SELECT * FROM pms_suppliers_product WHERE pms_suprod_suppliername = '$fullname' AND pms_suprod_status = 1");
          while ($row=mysqli_fetch_array($sql)) {
              $header_count++;
          ?>
                                <tr>

                                <td style="color: #000; text-align: center;"><?php echo $header_count;?></td>

                                <td style="text-align: center;"><img style="width:80px;height:60px" src="images/uploadimage/<?php echo $row['pms_suprod_image'];?>"></td>

                                <td style="color: #000;"><?php echo $fullname; ?></td>

                                <td style="color: #000;"><?php echo $row['pms_suprod_itemname']; ?></td>

                                <td style="color: #000;"><?php echo $row['pms_suprod_description']; ?></td>

                                <td style="color: #000;"><?php echo $row['pms_suprod_unit'] . " " . $row['pms_suprod_typeunit']; ?></td>

                                <td style="color: #000;"><?php echo $row['pms_suprod_cost']; ?></td>

                                <td style="color: #000; width: 200px;">
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

        

<div id="productSupplierModal" class="w3-modal">
<div class="w3-modal-content" style="margin-top: -80px; margin-left: 350px; width: 700px; height: 1270px;">
    <div class="w3-container">
      <br>
      <center>
      <h4 class="modal-title"><span id="productSupplierModaltitle"></span></h4>
      </center>
      <br><br>
      <span onclick="document.getElementById('productSupplierModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

      <form class="form-horizontal" method="post" enctype='multipart/form-data'>
      
            <input type="hidden" name="inputstatusprodsupplier" id="inputstatusprodsupplier">
            <input type="hidden" name="inputkeyprodsupplier" id="inputkeyprodsupplier">


             <center>
              <img src="images/uploadimage/noimage.png" id="supplierimagesource" alt="Walang Imahe" width="150px" height="150px" style="border-radius: 25px;">
             </center><br>

             <?php
             $seed = str_split('123456789');
             shuffle($seed);
             $rand = 'IDMS';
             foreach (array_rand($seed, 3) as $k) $rand .= $seed[$k];
             ?>

             <input type="hidden" name="pms_suprod_letter_id" id="pms_suprod_letter_id" value="<?php echo $rand; ?>">

        <div class="form-group" style="width: 850px;">
          <label class="control-label col-lg-3" for="price"> <span id="supplierImageTitle">Supplier Image</span></label>
          <div class="col-lg-9">
            <input type="file" onchange="readURL(this);" class="form-control input-focus" id="pms_suprod_image" name="pms_suprod_image" required>
          </div>
        </div>

        <div class="form-group" style="width: 850px;">
          <label class="control-label col-lg-3" for="price">Supplier Name</label>
          <div class="col-lg-9">
            <input type="text" class="form-control input-focus" value="<?php echo $fullname; ?>" id="pms_suprod_suppliername" name="pms_suprod_suppliername" readonly>
          </div>
        </div>

        <div class="form-group" style="width: 850px;">
          <label class="control-label col-lg-3" for="price">Item Name</label>
          <div class="col-lg-9">
            <input type="text" class="form-control input-focus" id="pms_suprod_itemname" name="pms_suprod_itemname" placeholder="Enter your Item Name" required>
          </div>
        </div>

        <div class="form-group" style="width: 850px;">
          <label class="control-label col-lg-3" for="price">Description</label>
          <div class="col-lg-9">
          <textarea class="form-control input-focus" style="height: 90px;" id="pms_suprod_description" name="pms_suprod_description" placeholder="Enter Description" required></textarea>
          </div>
        </div>

        <div class="form-group" style="width: 850px;">
          <label class="control-label col-lg-3" for="price">Quantity</label>
          <div class="col-lg-9">
            <input type="number" class="form-control input-focus" id="pms_suprod_quantity" name="pms_suprod_quantity" placeholder="Enter Quantity" required>
          </div>
        </div>


        <div class="form-group" style="width: 850px;">
          <label class="control-label col-lg-3" for="price">Unit</label>
          <div class="col-lg-9">
            <input type="number" class="form-control input-focus" id="pms_suprod_unit" name="pms_suprod_unit" placeholder="Enter your Unit Value" required>
            <br>
            <select class="form-control input-focus" id="pms_suprod_typeunit" name="pms_suprod_typeunit">
                <option value="" disabled selected>Select Types of Units</option>
                <option value="Gram (g)">Gram (g)</option>
                <option value="Miligram (mg)">Miligram (mg)</option>
                <option value="Kilogram (kg)">Kilogram (kg)</option>
                <option value="Decargram (dkg)">Decargram (dkg)</option>
            </select>
          </div>
        </div>

        <div class="form-group" style="width: 850px;">
          <label class="control-label col-lg-3" for="price">Cost</label>
          <div class="col-lg-9">
            <input type="number" class="form-control input-focus" id="pms_suprod_cost" name="pms_suprod_cost" placeholder="Enter your Cost" required>
          </div>
        </div>

        <div class="form-group" style="width: 850px;">
          <label class="control-label col-lg-3" for="price">Finish Product</label>
          <div class="col-lg-9">
            <select class="form-control input-focus" id="pms_suprod_finishproduct" name="pms_suprod_finishproduct">
                <option value="" disabled selected>Select option</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
          </div>
        </div>

        
        
        <br><br>

              <center>
                <div style="text-align: center;">

                 <!-- <button onclick="launch_toast()" id="saveBtn" type="submit" style="border-radius: 20px;" class="btn btn-lg btn-success"
                  >launch_toast</button> -->

                  <button id="saveBtn" type="submit" style="border-radius: 20px;" class="btn btn-lg btn-success"
                  >Save</button>&nbsp;&nbsp;
                  <button id="cancelBtn" type="button" style="border-radius: 20px;" class="btn btn-lg btn-danger" onclick="document.getElementById('productSupplierModal').style.display='none'" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
              </center><br><br>

             </form>
            </div>
          </div>
        </div>


                  <div id='toast' style='position: relative; z-index: 99; margin-top: -350px;'>
                    <div id='img'>Saved</div>
                    <div id='desc'>Successfully saved!</div>
                  </div>


<script src="js/jquery.min.2.1.js"></script>

    <script type="text/javascript">

    function archivePass(){
        document.getElementById('archiveModal').style.display='none';
        document.getElementById('passArchiveModal').style.display='block';
    }

    function restoreArchivePass(){
        document.getElementById('restoreArchiveModal').style.display='none';
        document.getElementById('passRestoreArchiveModal').style.display='block';
    }

    function archiveSupProd(arch_pms_id)
    {
        document.getElementById('archiveModal').style.display='block';
        $("#archivestatus").val("archivesuprod") ;
        $("#archivekey").val(arch_pms_id) ;
    };


    function confirmArchiveKey(confirmArchive_key)
    {
        document.getElementById('restoreArchiveModal').style.display='block';
        document.getElementById('archiveCustomerModal').style.display='none';
        $("#archiverestorestatus").val("restorearchive") ;
        $("#archiverestorekey").val(confirmArchive_key) ;
    };

    function archiveListProdSup(){
        document.getElementById('archiveCustomerModal').style.display='block';
        $("#archiveCustomerModaltitle").html("ARCHIVES OF CUSTOMER") ;
    };

    function launch_toast() {
        var x = document.getElementById("toast")
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
    }

    function readURL(input) {
       if (input.files && input.files[0]) {
           var reader = new FileReader();

           reader.onload = function (e) {
               $('#supplierimagesource')
                   .attr('src', e.target.result);
                   // .width(150)
                   // .height(200);
           };

           reader.readAsDataURL(input.files[0]);
       }
    }

    function productSupplierList(sup_id){
        document.getElementById('productSupplierListModal').style.display='block';
        // alert(sup_id)
        document.getElementById('tmpid').value = sup_id;
        $("#productSupplierListModaltitle").html("PRODUCT LIST OF SUPPLIER") ;
    };

    function addProductSupplier(){
          document.getElementById('productSupplierModal').style.display='block';

          $("#productSupplierModaltitle").html("Add New Product of Supplier(s)") ;
          $("#inputstatusprodsupplier").val("addproductsupplier") ;

          $('#pms_suprod_itemname').prop('disabled', false);
          $('#pms_suprod_description').prop('disabled', false);
          $('#pms_suprod_unit').prop('disabled', false);
          $('#pms_suprod_typeunit').prop('disabled', false);
          $('#pms_suprod_cost').prop('disabled', false);
          $('#pms_suprod_finishproduct').prop('disabled', false);
          $('#pms_suprod_quantity').prop('disabled', false);
          

          $("#pms_suprod_itemname").val("") ;
          $("#pms_suprod_description").val("") ;
          $("#pms_suprod_unit").val("") ;
          $("#pms_suprod_typeunit").val("") ;
          $("#pms_suprod_cost").val("") ;
          $("#pms_suprod_finishproduct").val("") ;
          $("#pms_suprod_quantity").val("") ;
          
          
          // $("#pms_suprod_suppliername").val() ;

          $('#pms_suprod_image').css('visibility','visible');
          $('#saveBtn').css('visibility','visible');
          $('#cancelBtn').css('visibility','visible');
          
    }

    function editprodsupplier(key,image,item,desc,unit,typeunit,cost,suppliername,finishproduct,quantity)
    {
          document.getElementById('productSupplierModal').style.display='block';
          $("#productSupplierModaltitle").html("Edit Product Supplier") ;
          $("#inputstatusprodsupplier").val("editprodsupplier") ;
          $("#inputkeyprodsupplier").val(key) ;
          
          document.getElementById("pms_suprod_image").removeAttribute("required");

          $('#pms_suprod_itemname').prop('disabled', false);
          $('#pms_suprod_description').prop('disabled', false);
          $('#pms_suprod_unit').prop('disabled', false);
          $('#pms_suprod_typeunit').prop('disabled', false);
          $('#pms_suprod_cost').prop('disabled', false);

          $('#supplierimagesource').attr('src', 'images/uploadimage/' + image);
          $("#pms_suprod_itemname").val(item) ;
          $("#pms_suprod_description").val(desc) ;
          $("#pms_suprod_unit").val(unit) ;
          $("#pms_suprod_typeunit").val(typeunit) ;
          $("#pms_suprod_cost").val(cost) ;
          $("#pms_suprod_suppliername").val(suppliername) ;
          $("#pms_suprod_finishproduct").val(finishproduct) ;
          $("#pms_suprod_quantity").val(quantity) ;

        //   $('#pms_suprod_image').css('visibility','hidden');
          

          document.getElementById("pms_suprod_image").style.visibility = "hidden";
          document.getElementById("supplierImageTitle").style.visibility = "hidden";
          document.getElementById("saveBtn").style.visibility = "visible";
          document.getElementById("cancelBtn").style.visibility = "visible";

          if (image=="") {
              var i = "images/uploadimage/noimage.png";
          }  else {
              var i = "images/uploadimage/" + image ;
          }

          document.getElementById("supplierimagesource").src = i;
    };

    // function deleteSupplier(key)
    // {
    //       document.getElementById('deleteModal').style.display='block';
    //       $("#deletestatus").val("deleteProdSupplier") ;
    //       $("#deletekey").val(key) ;
    // };

     function viewSupProd(key,image,item,description,unit,typeunit,cost,suppliername,finishprod,qty)
    {
          document.getElementById('productSupplierModal').style.display='block';
          $("#productSupplierModaltitle").html("View Supplier Product") ;

          $('#supplierimagesource').attr('src', 'images/uploadimage/' + image);
          $("#pms_suprod_itemname").val(item) ;
          $("#pms_suprod_description").val(description) ;
          $("#pms_suprod_unit").val(unit) ;
          $("#pms_suprod_typeunit").val(typeunit) ;
          $("#pms_suprod_cost").val(cost) ;
          $("#pms_suprod_suppliername").val(suppliername) ;
          $("#pms_suprod_finishproduct").val(finishprod) ;
          $("#pms_suprod_quantity").val(qty) ;

          $('#pms_suprod_itemname').prop('disabled', true);
          $('#pms_suprod_description').prop('disabled', true);
          $('#pms_suprod_unit').prop('disabled', true);
          $('#pms_suprod_typeunit').prop('disabled', true);
          $('#pms_suprod_cost').prop('disabled', true);
          $('#pms_suprod_quantity').prop('disabled', true);
          $('#pms_suprod_finishproduct').prop('disabled', true);
          
          $('#pms_suprod_image').css('visibility','hidden');
          $('#saveBtn').css('visibility','hidden');
          $('#cancelBtn').css('visibility','hidden');
          $('#supplierImageTitle').css('visibility','hidden');

        //   document.getElementById("pms_image").style.visibility = "hidden";
        //   document.getElementById("supplierImageTitle").style.visibility = "hidden";
        //   document.getElementById("saveBtn").style.visibility = "hidden";
        //   document.getElementById("cancelBtn").style.visibility = "hidden";

          if (image=="") {
              var i = "images/uploadimage/noimage.png";
          }  else {
              var i = "images/uploadimage/" + image ;
          }

          document.getElementById("supplierimagesource").src = i;
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
