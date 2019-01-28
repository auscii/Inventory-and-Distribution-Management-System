<?php

$host="localhost";
$username="root";
$password="";
$database="production_management_system";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($host, $username, $password));
@((bool)mysqli_query($GLOBALS["___mysqli_ston"], "USE " . $database)) or die ("Unable to select database");

?>
