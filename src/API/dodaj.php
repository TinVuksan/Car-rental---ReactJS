<?php
 header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Headers:*");
 header("Access-Control-Allow-Methods: *");
 header("Content-type: text/json");
 header("Content-type: application/json; charset=utf-8");

 include 'connection.php';

$sQuery= "INSERT INTO vozila (marka_vozila,model_vozila,vrsta_vozila,registracija,istek_registracije,slika) VALUES ('".$_POST['marka_vozila']."','".$_POST['model_vozila']."','".$_POST['vrsta_vozila']."','".$_POST['registracija']."','".$_POST['istek_registracije']."','".$_POST['slika']."')";

// $oData=array
// (
//     'idVozila' => $_POST['id_Vozila'],
//     'Marka_vozila' => $_POST['marka_vozila'],
//     'Model_vozila' => $_POST['model_vozila'],
//     'Vrsta_vozila' => $_POST['vrsta_vozila'],
//     'Registracija' => $_POST['registracija'],
//     'Istek_registracije' => $_POST['istek_registracije'],  
//     'Slika' => $_POST['slika'],
// );
try 
		{
            $oData = $conn ->prepare($sQuery);
			$oData->execute();

			echo 1;
			
		} catch (PDOException $error) 
		{
			echo ($error);
			echo 0;
		}

?>