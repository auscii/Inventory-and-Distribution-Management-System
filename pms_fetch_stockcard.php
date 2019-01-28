<?php
$connect = new PDO("mysql:host=localhost;dbname=production_management_system", "root", "");

if(isset($_POST["year"]))
{
 $query = "SELECT * FROM pms_stockcard 
 WHERE pms_datetime = '".$_POST["year"]."' 
 ORDER BY pms_id ASC
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output[] = array(
   'month'   => $row["pms_sku"],
   'profit'  => floatval($row["pms_transid"])
  );
 }
 echo json_encode($output);
}

?>
