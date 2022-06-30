<?php

 header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Headers:*");
 header("Access-Control-Allow-Methods: *");
 header("Content-type: text/json");
 header("Content-type: application/json; charset=utf-8");
include 'connection.php';

$sQuery ="UPDATE vozila SET vozilo_zaduzeno=0  WHERE id=:idVozila";
		$oStatement = $conn->prepare($sQuery);
		$oData = array
		(
			'idVozila'=>$_POST['Id'],

		);
		$oStatement->execute($oData);

?>