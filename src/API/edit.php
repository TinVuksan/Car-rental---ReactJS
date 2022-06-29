<?php

 header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Headers:*");
 header("Access-Control-Allow-Methods: *");
 header("Content-type: text/json");
 header("Content-type: application/json; charset=utf-8");

$sQuery ="UPDATE vozila SET id=:idVozila, marka_vozila=:marka_vozila, model_vozila=:model_vozila, vrsta_vozila=:vrsta_vozila WHERE idVozila=:idVozila";
		$oStatement = $conn->prepare($sQuery);
		$oData = array
		(
			'idVozila'=>$_POST['idVozila'],
			'marka_vozila'=>$_POST['marka_vozila'],
			'model_vozila'=>$_POST['model_vozila'],
			'vrsta_vozila'=>$_POST['vrsta_vozila'],

		);
		$oStatement->execute($oData);

?>