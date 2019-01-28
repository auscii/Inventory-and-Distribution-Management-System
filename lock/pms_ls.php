<?php 

include("../includes/pms_dbcon.php");
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
    $user_pms_password = $_SESSION['pms_password'];
} else {
    $user_pms_password = "";
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

if (isset($_POST['ls_pass'])) {
    $ls_pass = $_POST['ls_pass'];
    $ls_pass= md5($ls_pass);
} else {
    $ls_pass = "";
}

if (isset($_GET['url'])) {
    $url = $_GET['url'];
} else {
    $url = "not url";
}


if(isset($_POST['ls_submit'])){

    $query = mysqli_query($con,"SELECT * FROM pms_users WHERE '$user_pms_password'='$ls_pass'");
    
    $row = mysqli_fetch_array($query);
    if ($row) {
        $_SESSION['pms_user']=$row['pms_fullname'] ;
        $_SESSION['pms_password']=$row['pms_password'] ;
        $_SESSION['pms_id']=$row['pms_id'];
        $_SESSION['pms_image']=$row['pms_image'];
        $_SESSION['pms_usertype']=$row['pms_usertype'];
        $_SESSION['pms_security']="01787amk038894kk";
        // $_SESSION['pms_branch_id']=$row['pms_branch_id'];

        // $user_Position = $row['pms_usertype'];

        if($pms_usertype === "Supervisor"){
            $_SESSION['pms_usertype'] = $pms_usertype;
            $_SESSION['pms_user'] = $pms_user;
            $_SESSION['pms_image'] = $pms_image;
            $_SESSION['pms_password'] = $user_pms_password;
            header("Location: $url");
            // header("Location: ../pms_main.php");
        }
        else if($pms_usertype === "Operator"){
            $_SESSION['pms_usertype'] = $pms_usertype;
            $_SESSION['pms_user'] = $pms_user;
            $_SESSION['pms_image'] = $pms_image;
            $_SESSION['pms_password'] = $user_pms_password;
            header("Location: $url");
            // header("Location: ../pms_main_operator.php");
            // echo "<script>window.history.go(-1); return false;</script>";
        }
        else if($pms_usertype === "Warehouse Man"){
            $_SESSION['pms_usertype'] = $pms_usertype;
            $_SESSION['pms_user'] = $pms_user;
            $_SESSION['pms_image'] = $pms_image;
            $_SESSION['pms_password'] = $user_pms_password;
            header("Location: $url");
            // header("Location: ../pms_main_warehouseman.php");
        }
    } else {
        // $_SESSION['pms_user']="";
        // $_SESSION['pms_security']="10787amk038894kk";
              echo '
              <center>
              <div class="modal fade" id="global-modal" role="dialog">
                <div class="modal-dialog modal-lg">
                  <!--Modal Content-->
                  <div class="modal-content" style="width: 600px; margin-top: 250px;">
                    <div class="modal-header" style="background: #000; height: 50px;">
                      <button type="button" class="close" style="margin-top: 200px;" data-dismiss="modal" aria-label="Close">
                      </button>
                    </div>
                    <div class="modal-body" style="height: 110px; text-align: center;">
                      <h4 class="modal-title" id="myModalLabel" style="color: #000; margin-top:10px;"><i class="fa fa-times"></i> Invalid Username/Password! </h4> <br>
                      <button data-dismiss="modal" aria-label="Close" class="btn btn-primary" style="position:absolute; right:10px; top:60px;" type="button">Close</button>  
                  </div>
                  </div>
                </div>
              </div>
              </center>
                   ';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory and Distribution Management System</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    
  </head>

  <body onload="getTime()">  
  
  <div style="background-color: rgba(0,0,0,0.2); margin: 0; height: 100vh; overflow: hidden;">
	  	<div class="container" style="">
	  	
	  		<div id="showtime"></div>
	  			<div class="col-lg-4 col-lg-offset-4">
	  				<div class="lock-screen">
		  				<h2><a data-toggle="modal" href="#myModal"><i class="fa fa-lock"></i></a></h2>
		  				<p style="color: #FFF;">UNLOCK</p>
		  				
                          <form method="POST">
                            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade" style="margin-top: 200px;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background: #000;">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Welcome, <?php echo $pms_user; ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <p class="centered"><img class="img-circle"  style="height: 50px; width: 50px;" src="../images/uploadimage/<?php echo $pms_image; ?>"></p>
                                            <input type="password" name="ls_pass" id="ls_pass" placeholder="Enter Password" autocomplete="off" class="form-control placeholder-no-fix">
                    
                                        </div>
                                        <div class="modal-footer centered">
                                            <button data-dismiss="modal" class="btn btn-theme04" type="button">Cancel</button>
                                            <button class="btn btn-theme03" type="submit" name="ls_submit" id="ls_submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </form>
		  				
		  				
	  				</div>
	  			</div><!-- /col-lg-4 -->
	  	
	  	</div><!-- /container -->


    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

        
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/background/light-gradient.png", {speed: 500});
    </script>

    <script>
        function getTime()
        {
            var today=new Date();
            var h=today.getHours();
            var m=today.getMinutes();
            var s=today.getSeconds();

            m=checkTime(m);
            s=checkTime(s);
            document.getElementById('showtime').innerHTML=h+":"+m+":"+s;
            t=setTimeout(function(){getTime()},500);
        }

        function checkTime(i)
        {
            if (i<10)
            {
                i="0" + i;
            }
            return i;
        }
    </script>

<script>

history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
};

document.addEventListener("contextmenu", function(e){
    e.preventDefault();
}, false);

</script>

</div>
  </body>
</html>
