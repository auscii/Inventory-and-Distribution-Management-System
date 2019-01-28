<?php


if (isset($_POST["inputstatuschangepass"])) {
  $pms_mode_changepass = $_POST['inputstatuschangepass'];  
 } else {
  $pms_mode_changepass = "";
} 

if (isset($_POST["inputkeychangepass"])) {
  $key_changepass = $_POST['inputkeychangepass'];  
 } else {
  $key_changepass = "";
}

if (isset($_POST["new_pms_password"])) {
    $new_pms_password = $_POST['new_pms_password'];  
    $new_pms_password=md5($new_pms_password);
    $new_pms_password = trim($new_pms_password);
} else {
    $new_pms_password = "";
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

if (isset($_SESSION['pms_id'])) {
    $pms_id = $_SESSION['pms_id'];
} else {
    $pms_id = "";
}




if ($pms_mode_changepass=="changepassusers") {

    // if($new_pms_password != $pms_confirm_password){
    //     echo '
    //     <div id="myModal">
    //         <div class="modal-dialog" style="margin-left: -50px;">
    //             <div class="modal-content">
    //                 <div class="modal-header">
    //                 </div>
    //                     <div class="modal-body">
    //                     <h4 class="modal-title" id="myModalLabel"><i class="fa fa-danger"></i> Password Mismatched!</h4>
    //                     </div>
    //                     <div class="modal-footer">
    //                         <button onclick="document.getElementById(&#39;myModal&#39;).style.display=&#39;none&#39;" class="btn btn-primary" type="button">Close</button>
    //                     </div>
    //             </div>
    //         </div>
    //     </div>
    //      ';
    // }

    // else {
        echo '
        <div id="myModal">
            <div class="modal-dialog" style="margin-left: -50px;">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                        <div class="modal-body">
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil"></i> User Password Changed! </h4>
                        </div>
                        <div class="modal-footer">
                            <button onclick="document.getElementById(&#39;myModal&#39;).style.display=&#39;none&#39;" class="btn btn-primary" type="button">Close</button>
                        </div>
                </div>
            </div>
        </div>
                ';
    $con=mysqli_query($GLOBALS["___mysqli_ston"], 
    "UPDATE pms_users SET pms_password='$new_pms_password' WHERE pms_id ='$pms_id'");  
        //  }   
} 


?>

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
</head>

<ul class="navbar-nav my-lg-0">
    <li class="nav-item dropdown">                   
        <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="images/uploadimage/<?php echo $pms_image; ?>" alt="user" class="profile-pic" style="height: 35px; width: 35px;" /> 
        <strong style="color: #FFF;"> &nbsp;<?php echo $pms_user ; ?></strong> </a>
      
        <div class="dropdown-menu dropdown-menu-right animated zoomIn">
        
            <ul class="dropdown-user">
            <li><a href="#">
                <i class="ti-user"></i> &nbsp;User Profile</a>
            </li>
            
            <li><a href="#"
                   data-target="#userChangePassModal" 
                   onclick="changepass('<?php echo $pms_id ?>',
                                    '<?php echo $pms_user ?>',
                                    '<?php echo $pms_password ?>');">
                <i class="fa fa-key"></i>&nbsp;Change Password</a>
            </li>

            <li><a href="includes/pms_logout.php">
                <i class="fa fa-power-off"></i> &nbsp;Logout</a>
            </li>
            </ul>
        </div>
        
    </li>
</ul>


<div id="userChangePassModal" class="w3-modal">
    <div class="w3-modal-content" style="margin-top: -30px; margin-left: 410px; width: 500px; height: 510px;">
    <div class="w3-container">
        <br>
        <center>
        <h4 class="modal-title"><span id="userChangePassModaltitle"></span></h4>
        </center>
        <br><br>
        <span onclick="document.getElementById('userChangePassModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>

        <form class="form-horizontal" method="post" action="#" enctype='multipart/form-data'>

            <input type="hidden" name="inputstatuschangepass" id="inputstatuschangepass">
            <input type="hidden" name="inputkeychangepass" id="inputkeychangepass">

            <div class="modal-body">

                    <div class="form-group" style="width: 850px; margin-top: -25px;">
                    <label class="control-label col-lg-3" for="price">Username</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control input-focus" id="pms_username" name="pms_username">  
                    </div>
                    </div>

                    <div class="form-group" style="width: 850px; margin-top: -25px;">
                    <label class="control-label col-lg-3" for="price">Current Password</label>
                    <div class="col-lg-6">
                        <input type="password" class="form-control input-focus" id="pms_password" name="pms_password">  
                    </div>
                    </div>

                    <div class="form-group" style="width: 850px; margin-top: -25px;">
                    <label class="control-label col-lg-3" for="price">New Password</label>
                    <div class="col-lg-6">
                        <input type="password" class="form-control input-focus" id="new_pms_password" name="new_pms_password" placeholder="Enter your Password" required autofocus>  
                    </div>
                    </div>

                    <div class="form-group" style="width: 850px; margin-top: -25px;">
                    <label class="control-label col-lg-3" for="price">Confirm Password</label>
                    <div class="col-lg-6">
                        <input type="password" class="form-control input-focus" id="pms_confirm_password" name="pms_confirm_password" placeholder="Confirm your Password" required autofocus>  
                    </div>
                    </div>
                    
                    <br><br>

                <div style="text-align: center; margin-top: -20px;">
                  <button type="submit" style="border-radius: 20px;" class="btn btn-lg btn-success">Save</button>&nbsp;&nbsp;
                  <button type="button" style="border-radius: 20px;" class="btn btn-lg btn-danger" onclick="document.getElementById('userChangePassModal').style.display='none'" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div><br><br>

                  </form>

                      </div>
                    </div>
                  </div>

<script>
function changepass(key,username,password){

document.getElementById('userChangePassModal').style.display='block';
document.getElementById("pms_username").disabled = true;
document.getElementById("pms_password").disabled = true;

$("#userChangePassModaltitle").html("Change User Password") ;
$("#inputstatuschangepass").val("changepassusers") ;
$("#inputkeychangepass").val(key) ; 
$("#pms_username").val(username) ;
$("#pms_password").val(pms_password) ;
$("#new_pms_password").val("") ;

}

</script>