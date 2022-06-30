

<?php
ini_set('memory_limit', '2048M');
header('Content-type: text/json');
header('Content-type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin:*');
include "connection.php";


$oJson=array();



	
	
	
		$sQuery="SELECT * FROM vozila WHERE id = '".$_POST['Id']."'";
		$oRecord=$conn->query($sQuery);
		//var_dump($oRecord->fetch(PDO::FETCH_BOTH));
		while($oRow=$oRecord->fetch(PDO::FETCH_ASSOC))
		{
		
			$oVozilo=new Automobil(
					$oRow['id'],
					$oRow['marka_vozila'],
					$oRow['model_vozila'],
					$oRow['vrsta_vozila'],
					$oRow['registracija'],
					$oRow['istek_registracije'],
					$oRow['slika'],
					
					
					
				);

			array_push($oJson, $oVozilo);
		}
		
	
		echo json_encode($oJson);
	
?>
