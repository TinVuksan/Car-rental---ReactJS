<?php
 header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Headers:*");
 header("Access-Control-Allow-Methods: *");
 header("Content-type: text/json");
 header("Content-type: application/json; charset=utf-8");

include "connection.php";
    
    $sQuery = "DELETE FROM vozila WHERE id= '".$_POST['Id']."'";
    $oData = $conn -> prepare($sQuery);
    $oData->execute();



?>