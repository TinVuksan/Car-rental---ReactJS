<?php

 header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Headers:*");
 header("Access-Control-Allow-Methods: *");
 header("Content-type: text/json");
 header("Content-type: application/json; charset=utf-8");
 include "connection.php";
$sQuery ="UPDATE vozila SET  marka_vozila=:marka_vozila, model_vozila=:model_vozila,slika=:slika WHERE id=:idVozila";
		$oStatement = $conn->prepare($sQuery);
		$oData = array
		(
			'idVozila'=>$_POST['idVozila'],
			'marka_vozila'=>$_POST['marka_vozila'],
			'model_vozila'=>$_POST['model_vozila'],
			'slika'=>$_POST['slika'],

		);
		$oStatement->execute($oData);

?>