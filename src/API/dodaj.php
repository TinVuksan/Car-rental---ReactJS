<?php
 header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Headers:*");
 header("Access-Control-Allow-Methods: *");
 header("Content-type: text/json");
 header("Content-type: application/json; charset=utf-8");

 include 'connection.php';

$sQuery= "INSERT INTO vozila (marka_vozila, model_vozila, vrsta_vozila, registracija, istek_registracije, slika) VALUES (:Marka_vozila, :Model_vozila, :Vrsta_vozila, :Registracija, :Istek_registracije, :Slika)";

 $oData=array
 (
	
	
     'Marka_vozila' => $_POST['marka_vozila'],
     'Model_vozila' => $_POST['model_vozila'],
     'Vrsta_vozila' => $_POST['vrsta_vozila'],
     'Registracija' => $_POST['registracija'],
     'Istek_registracije' => $_POST['istek_registracije'],  
     'Slika' => $_POST['slika'],
 );
try
		{
            $oStatement=$conn->prepare($sQuery);
			$oStatement->execute($oData);

			echo 1;
			
		} catch (PDOException $error) 
		{
			echo ($error->getMessage());
			echo 0;
		}

?>