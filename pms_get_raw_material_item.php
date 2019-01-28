<?php
header('Content-type: application/json');

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

if (isset($_GET["name"])) {
	$name = $_GET['name'];	
} else {
	$name = "";
}	
// AND pms_suprod_status = 0

// echo $name;
// exit();

$sql = mysqli_query($GLOBALS["___mysqli_ston"], 
       "SELECT * FROM pms_rawmaterials WHERE pms_item = '$name'");
$records = array();
while($row = mysqli_fetch_array($sql)) {
    $records[] = $row;
    
    // if($pms_suprod_status = 1){
    //     echo '<script>alert("Item Not Found!")</script>';
    // }

    
}
if ($records==NULL) {
	echo '<script>alert("Item Not Found!")</script>';
}

echo $_GET['pms'] . '(' . json_encode($records) . ');';

?>