<!-- 
    


$username = mysql_real_escape_string($_POST['username']); 
$password = mysql_real_escape_string($_POST['password']);  

 $password =  stripslashes($password);
     $username =  stripslashes($username);






-->


<?php
session_start();
include("includes/pms_dbcon.php");
$curr_uri = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

    $_SESSION['pms_security']="10787amk038894kk";
    $_SESSION['pms_user']="";



    // $username=$_POST['pms_username'];
    // $password=$_POST['pms_password'];
    // $password=md5($password);


    if (isset($_POST['pms_username'])) {
        $username = $_POST['pms_username'];
        // $username = mysqli_real_escape_string($username); 
        $username = stripslashes($username);
    } else {
        $username = "";
    }

    if (isset($_POST['pms_password'])) {
        $password = $_POST['pms_password'];
        $password = md5($password);
        // $password = mysqli_real_escape_string($password); 
        $password = stripslashes($password);
    } else {
        $password = "";
    }





if (isset($_POST['submit-login']))  {
    
    $query = mysqli_query($con,"SELECT * FROM pms_users WHERE pms_username='$username' AND pms_password='$password'");

    $row = mysqli_fetch_array($query);
    if ($row) {
        $_SESSION['welcome'] = 1;
        $_SESSION['pms_user']=$row['pms_fullname'] ;
        $_SESSION['pms_password']=$row['pms_password'] ;
        $_SESSION['pms_id']=$row['pms_id'];
        $_SESSION['pms_image']=$row['pms_image'];
        $_SESSION['pms_usertype']=$row['pms_usertype'];
        $_SESSION['pms_security']="01787amk038894kk";
        // $_SESSION['pms_branch_id']=$row['pms_branch_id'];

        $user_Position = $row['pms_usertype'];

        if($user_Position === "Supervisor"){
            $_SESSION['level'] = $user_Position;
            header("Location: pms_main.php");
        }
        else if($user_Position === "Operator"){
            $_SESSION['level'] = $user_Position;
            header("Location: pms_main_operator.php");
        }
        else if($user_Position === "Warehouse Man"){
            $_SESSION['level'] = $user_Position;
            header("Location: pms_main_warehouseman.php");
        }
    } else {
        $_SESSION['pms_user']="";
        $_SESSION['pms_security']="10787amk038894kk";
              echo '
                <div id="myModal">
                    <div class="modal-dialog" style="margin-left: -130px;">
                        <div class="modal-content">
                            <div class="modal-header">


                            </div>
                                <div class="modal-body">
                                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-times"></i> Invalid Username/Password! </h4>
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
    <link rel="icon" type="image/png" sizes="16x16" href="images/pms_logo/jentec_logo.png">
    <title>Inventory and Distribution Management System</title>

    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/w3.css">
    <link href="css/overlay.css" rel="stylesheet">

    <link href="login/css/fga.css" rel="stylesheet" type="text/css">
    <link href="login/fam.css.css" rel="stylesheet" type="text/css">
    <link href="login/css/style.css" rel="stylesheet" type="text/css">
    <script src="login/js/prefixfree.min.js"></script>

</head>

<body>

  <div style="background-color: rgba(0,0,0,0.2); margin: 0; height: 100vh; overflow: hidden;">

<div class="wrapper">
      <form class="login" method="POST">
        <center>
        <p class="title">Inventory and Distribution Management System</p>
        </center>
            <label style="color: #000;" >Username</label>
            <!-- <input type="text" id="pms_username" name="pms_username" placeholder=" &#61447; Enter your Username" required autofocus/> -->
            <input style="color: #000;" type="text" id="pms_username" name="pms_username" placeholder="Enter your Username" required autofocus/>
            <i class="fa fa-user" style="padding-top: 4px;"></i>

            <label style="color: #000;" >Password</label>
            <!-- <input type="password" id="pms_password" name="pms_password" placeholder=" &#61475; Enter your Password" required autofocus /> -->
            <input style="color: #000;" type="password" id="pms_password" name="pms_password" placeholder="Enter your Password" required autofocus />
            <i class="fa fa-key" style="padding-top: 4px;"></i>

          <button type="submit"name="submit-login" style="background: #5c4ac7;">
              <i class="spinner"></i>
              <span class="state" style="font-size: 19px;"><i class="fa fa-paper-plane"></i> Enter</span>
          </button>
      </form>

      <!-- <footer><a target="blank" href="#">#FOOTER</a></footer> -->
      </p>
    </div>

</div>
    <script src="login/js/jquery.min.js"></script>
    <!-- <script src="login/js/index.js"></script> -->

</body>
</html>
