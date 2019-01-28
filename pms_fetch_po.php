<?php
$connect = new PDO("mysql:host=localhost;dbname=production_management_system", "root", "");

if(isset($_POST["year"]))
{
 $query = "SELECT * FROM pms_purchaseorderheader 
 WHERE pms_date = '".$_POST["year"]."' 
 ORDER BY pms_id ASC
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output[] = array(
   'month'   => $row["pms_supplier"],
   'profit'  => floatval($row["pms_id"])
  );
 }
 echo json_encode($output);
}

?>
