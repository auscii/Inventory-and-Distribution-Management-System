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




if (isset($_POST["pms_username"])) {
  $pms_username = $_POST['pms_username'];
 } else {
  $pms_username = "";
}

if (isset($_POST["p_username"])) {
  $p_username = $_POST['p_username'];
 } else {
  $p_username = "";
}



if (isset($_POST["pms_password"])) {
  $pms_password = $_POST['pms_password'];
  $pms_password=md5($pms_password);
  $pms_password = trim($pms_password);
 } else {
  $pms_password = "";
}

if (isset($_POST["pms_confirm_password"])) {
    $pms_confirm_password = $_POST['pms_confirm_password'];
    $pms_confirm_password=md5($pms_confirm_password);
    $pms_confirm_password = trim($pms_confirm_password);
   } else {
    $pms_confirm_password = "";
  }

if (isset($_POST["pms_usertype"])) {
  $pms_usertype = $_POST['pms_usertype'];
 } else {
  $pms_usertype = "";
}

if (isset($_POST["pms_fullname"])) {
  $pms_fullname = $_POST['pms_fullname'];
 } else {
  $pms_fullname = "";
}

if (isset($_POST["pms_user_image"])) {
  $pms_user_image = $_POST['pms_user_image'];
 } else {
  $pms_user_image = "";
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

if ($pms_mode=="addusers") {

    // if(strlen($pms_password) < 4){
    //     echo '
    //     <div id="myModal">
    //         <div class="modal-dialog" style="margin-left: -50px;">
    //             <div class="modal-content">
    //                 <div class="modal-header">
    //                 </div>
    //                     <div class="modal-body">
    //                     <h4 class="modal-title" id="myModalLabel"><i class="fa fa-danger"></i> Password must be at least 4 characters!</h4>
    //                     </div>
    //                     <div class="modal-footer">
    //                         <button onclick="document.getElementById(&#39;myModal&#39;).style.display=&#39;none&#39;" class="btn btn-primary" type="button">Close</button>
    //                     </div>
    //             </div>
    //         </div>
    //     </div>
    //      ';
    // }

   if($pms_password != $pms_confirm_password){
        echo '
        <div id="myModal">
            <div class="modal-dialog" style="margin-left: -50px;">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                        <div class="modal-body">
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-danger"></i> Password Mismatched!</h4>
                        </div>
                        <div class="modal-footer">
                            <button onclick="document.getElementById(&#39;myModal&#39;).style.display=&#39;none&#39;" class="btn btn-primary" type="button">Close</button>
                        </div>
                </div>
            </div>
        </div>
         ';
    }

    else {
      echo '
        <div id="myModal">
            <div class="modal-dialog" style="margin-left: -50px;">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                        <div class="modal-body">
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-check"></i> Successfully User Added! </h4>
                        </div>
                        <div class="modal-footer">
                            <button onclick="document.getElementById(&#39;myModal&#39;).style.display=&#39;none&#39;" class="btn btn-primary" type="button">Close</button>
                        </div>
                </div>
            </div>
        </div>
            ';
        move_uploaded_file($_FILES["pms_user_image"]["tmp_name"],"images/uploadimage/" . $_FILES["pms_user_image"]["name"]);
        $imageLocation=$_FILES["pms_user_image"]["name"];
        $con=mysqli_query($GLOBALS["___mysqli_ston"],
            "INSERT INTO
            pms_users
            (
            pms_username,
            pms_password,
            pms_usertype,
            pms_fullname,
            pms_image
            )
            VALUES
            (
            '$p_username',
            '$pms_password',
            '$pms_usertype',
            '$pms_fullname',
            '$imageLocation'
            )");
    }
}
else if ($pms_mode=="editusers") {

    if($pms_password != $pms_confirm_password){
        echo '
        <div id="myModal">
            <div class="modal-dialog" style="margin-left: -50px;">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                        <div class="modal-body">
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-danger"></i> Password Mismatched!</h4>
                        </div>
                        <div class="modal-footer">
                            <button onclick="document.getElementById(&#39;myModal&#39;).style.display=&#39;none&#39;" class="btn btn-primary" type="button">Close</button>
                        </div>
                </div>
            </div>
        </div>
         ';
    }

    else {
        echo '
        <div id="myModal">
            <div class="modal-dialog" style="margin-left: -50px;">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                        <div class="modal-body">
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil"></i> Successfully User Updated! </h4>
                        </div>
                        <div class="modal-footer">
                            <button onclick="document.getElementById(&#39;myModal&#39;).style.display=&#39;none&#39;" class="btn btn-primary" type="button">Close</button>
                        </div>
                </div>
            </div>
        </div>
                ';
    $con=mysqli_query($GLOBALS["___mysqli_ston"],
    "UPDATE pms_users
        SET pms_password='$pms_password',
            pms_usertype='$pms_usertype',
            pms_fullname='$pms_fullname'
        WHERE pms_id = $key");
         }
}

if ($pms_deletemode=="deleteusers") {
    echo '
    <div id="myModal">
        <div class="modal-dialog" style="margin-left: -50px;">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                    <div class="modal-body">
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-trash"></i> Successfully User Deleted! </h4>
                    </div>
                    <div class="modal-footer">
                        <button onclick="document.getElementById(&#39;myModal&#39;).style.display=&#39;none&#39;" class="btn btn-primary" type="button">Close</button>
                    </div>
            </div>
        </div>
    </div>
            ';
  $con=mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM pms_users WHERE pms_id = $deletekey");
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
    <title>Users | Inventory and Distribution Management System</title>
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
                    <h3 class="text-primary">User Accounts</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Users</a></li>
                        <li class="breadcrumb-item active">User Accounts</li>
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
                  <div class="card-body">

                <button
                onclick="addusers();"
                class="btn btn-primary"
                href="#userModal"
                data-target="#userModal"
                style="color:#fff;"
                >
                <i class="fa fa-plus"></i> Add New User
                </button>

                </div>

          <h4 class="card-title">Save As</h4>

            <table id="DataTable1" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="text-align: center;">Image</th>
                        <th style="text-align: center;">Username</th>
                        <th style="text-align: center;">Fullname</th>
                        <th style="text-align: center;">User Type</th>
                        <th style="text-align: center;">Date/Time Registered</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>

                <tbody>

                  <?php
                  $sql = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pms_users");
                  while ($row=mysqli_fetch_array($sql)) {
                  ?>
                        <tr>

                        <td style="color: #000;"><img style="width:80px;height:60px" src="images/uploadimage/<?php echo $row['pms_image'];?>"></td>

                        <td style="color: #000;"><?php echo $row['pms_username']; ?></td>

                        <td style="color: #000;"><?php echo $row['pms_fullname']; ?></td>

                        <td style="color: #000;"><?php echo $row['pms_usertype']; ?></td>

                        <td style="color: #000;"><?php echo $row['pms_datetime_reg']; ?></td>

                        <td style="color: #000; width: 200px;">

                        <button onclick="editusers('<?php echo $row['pms_id'] ; ?>',
                                                      '<?php echo $row['pms_username'] ?>',
                                                      '<?php echo $row['pms_password'] ?>',
                                                      '<?php echo $row['pms_usertype'] ?>',
                                                      '<?php echo $row['pms_fullname'] ?>',
                                                      '<?php echo $row['pms_image'] ?>');"
                                    href="#userModal<?php echo $row['pms_id'];?>"
                                    style="background-color: #3bdb39; color: #ffffff;"
                                    class="btn"><i class="icon-pencil icon-large"> Edit</i></button>
                        &nbsp;
                        <button onclick="deleteusers('<?php echo $row['pms_id'] ; ?>',
                                                     '<?php echo $row['pms_fullname'] ?>');"
                                href="#deleteModal<?php echo $row['pms_id'];?>"
                                style="background-color: #ba1307; color: #ffffff;"
                                class="btn"><i class="icon-trash icon-large"> Delete</i></button>
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
                <!-- End Page Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer"> © 2018 All rights reserved. Inventory and Distribution Management System</footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>


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

<div id="userModal" class="w3-modal">
    <div class="w3-modal-content" style="margin-top: -80px; margin-left: 350px; width: 700px; height: 900px;">
    <div class="w3-container">
        <br>
        <center>
        <h4 class="modal-title"><span id="userModaltitle"></span></h4>
        </center>
        <br><br>
        <span onclick="document.getElementById('userModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

        <form class="form-horizontal" method="post" action="#" enctype='multipart/form-data'>

            <input type="hidden" name="inputstatus" id="inputstatus">
            <input type="hidden" name="inputkey" id="inputkey">

            <div class="modal-body">

                <center>
                <img src="" id="userimagesource" width="150px" height="150px" style="border-radius: 25px;">
            </center><br>

                <div class="form-group" style="width: 850px; margin-top: -11px;">
                    <label class="control-label col-lg-3" for="price"> <span id="userImageTitle">User Image</span></label>

                    <div class="col-lg-9">
                        <input type="file" class="form-control input-focus" id="pms_user_image" name="pms_user_image">
                    </div>
                    </div>

                    <div class="form-group" style="width: 850px; margin-top: -11px;">
                    <label class="control-label col-lg-3" for="price">Username</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control input-focus" id="p_username" name="p_username" placeholder="Enter your Username" required autofocus>
                    </div>
                    </div>

                    <div class="form-group" style="width: 850px; margin-top: -11px;">
                    <label class="control-label col-lg-3" for="price">Password</label>
                    <div class="col-lg-9">
                        <input type="password" class="form-control input-focus" id="pms_password" name="pms_password" placeholder="Enter your Password" required autofocus>
                    </div>
                    </div>

                    <div class="form-group" style="width: 850px; margin-top: -11px;">
                    <label class="control-label col-lg-3" for="price">Confirm Password</label>
                    <div class="col-lg-9">
                        <input type="password" class="form-control input-focus" id="pms_confirm_password" name="pms_confirm_password" placeholder="Confirm your Password" required autofocus>
                    </div>
                    </div>

                    <div class="form-group" style="width: 850px; margin-top: -11px;">
                    <label class="control-label col-lg-3" for="price">Fullname</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control input-focus" id="pms_fullname" name="pms_fullname" placeholder="Enter your Fullname" required autofocus>
                    </div>
                    </div>

                    <div class="form-group" style="width: 850px; margin-top: -11px;">
                    <label class="control-label col-lg-3" for="price">User Type</label>
                    <div class="col-lg-9">
                        <select class="form-control input-focus" id="pms_usertype" name="pms_usertype" required autofocus>
                        <option value="" disabled selected>Enter User Type</option>
                        <option value="Supervisor">Supervisor</option>
                        <option value="Operator">Operator</option>
                        <option value="Warehouse Man">Warehouse Man</option>
                        </select>
                    </div>
                    </div><br><br>

                <div style="text-align: center; margin-top: -20px;">
                  <button type="submit" style="border-radius: 20px;" class="btn btn-lg btn-success">Save</button>&nbsp;&nbsp;
                  <button type="button" style="border-radius: 20px;" class="btn btn-lg btn-danger" onclick="document.getElementById('userModal').style.display='none'" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div><br><br>

                  </form>

                      </div>
                    </div>
                  </div>

    <script type="text/javascript">

    function addusers()
    {
          document.getElementById('userModal').style.display='block';
          document.getElementById("p_username").disabled = false;

          $("#userModaltitle").html("Add User") ;
          $("#inputstatus").val("addusers") ;
          $("#p_username").val("") ;
          $("#pms_password").val("") ;
          $("#pms_confirm_password").val("") ;
          $("#pms_usertype").val("") ;
          $("#pms_fullname").val("") ;
        //   $("#pms_image").val("") ;

          document.getElementById("pms_user_image").style.visibility = "visible";
          document.getElementById("userImageTitle").style.visibility = "visible";
          document.getElementById("userimagesource").src = "images/uploadimage/noimage.png";
    };

    function editusers(key,username,password,usertype,fullname,image)
    {
      // alert("username =" + username + "password =" + password);
      var oye = "haha";
          document.getElementById("p_username").disabled = true;
          document.getElementById('userModal').style.display='block';
          $("#userModaltitle").html("Edit User") ;
          $("#inputstatus").val("editusers") ;
          $("#inputkey").val(key) ;

          $("#p_username").val(username) ;
          $("#pms_password").val(password) ;
          $("#pms_usertype").val(usertype) ;
          $("#pms_fullname").val(fullname) ;
        //   $("#pms_usertype option[value=" + usertype + "]").attr('selected', 'selected');

          document.getElementById("pms_user_image").style.visibility = "hidden";
          document.getElementById("userImageTitle").style.visibility = "hidden";

          if (image=="") {
              var i = "images/uploadimage/noimage.png";
          }  else {
              var i = "images/uploadimage/" + image ;
          }

          document.getElementById("userimagesource").src = i;
    };

    function deleteusers(key,fullname)
    {
          document.getElementById('deleteModal').style.display='block';
          document.getElementById("pms_username").disabled = false;

          $("#deletestatus").val("deleteusers") ;
          $("#deletekey").val(key) ;
          $("#userfullname").html(fullname) ;
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
