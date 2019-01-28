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

if (isset($_SESSION['pms_user'])) {
    $pms_user = $_SESSION['pms_user'];
} else {
    $pms_user = "";
}    

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/png" sizes="16x16" href="images/pms_logo/jentec_logo.png">
    <title>Inventory and Distribution Management System</title>

    <link href="../css/lib/chartist/chartist.min.css" rel="stylesheet">
	<link href="../css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="../css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="../css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../css/helper.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>	
<body>
	<div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
<?php
	// $date = date("Y-m-d H:i:s");
	// $id=$_SESSION['id'];
	// $remarks="has logged out the system at ";  
	// mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$id','$remarks','$date')")or die(mysqli_error($con));
	
	session_destroy();
	
 echo '<meta http-equiv="refresh" content="2;url=../index.php">';
 
?>
	
</body>
</html>
