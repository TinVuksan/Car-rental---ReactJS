<?php
include 'connection.php';
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:*");
$sActionID="";
if (isset($_POST['action_id']))
{
	$sActionID=$_POST['action_id'];
}
if (isset($_GET['action_id']))
{
	$sActionID=$_GET['action_id'];
}

$sZaposlenikID = "";
if (isset($_POST['idZaposlenika']))
{
	$sZaposlenikID=$_POST['idZaposlenika'];
}

$sIdVozila = "";

if(isset($_POST['idZaduzenogVozila']))
{
	$sIdVozila = $_POST['idZaduzenogVozila'];
}

$sVrativoziloID = "";
if(isset($_POST['idVratiVozilo']))
{
	$sVrativoziloID = $_POST['idVratiVozilo'];
}





switch ($sActionID) {
	case 'azuriraj_vozilo':
		$sQuery ="UPDATE vozila SET Marka=:Marka, Model=:Model, Vrsta_motora=:Vrsta_motora, Snaga=:Snaga WHERE idVozila=:idVozila";
		$oStatement = $conn->prepare($sQuery);
		$oData = array
		(
			'idVozila'=>$_POST['idVozila'],
			'Marka'=>$_POST['Marka'],
			'Model'=>$_POST['Model'],
			'Vrsta_motora'=>$_POST['Vrsta_motora'],
			'Snaga'=>$_POST['Snaga'],

		);
		$oStatement->execute($oData);
		break;

	case 'obrisi_vozilo':
		$sQuery ="DELETE FROM vozila WHERE id=:id";
		$oStatement =$conn->prepare($sQuery);
		$oData = array
		(
			'id'=>$_POST['id']
		);
		$oStatement->execute($oData);
		break;

	case 'dodaj_novo_vozilo':
		$sQuery= "INSERT INTO vozila (idVozila,Marka,Model,Vrsta_motora,Snaga,Registracija,Istek_registracije,Vrsta_vozila,datum) VALUES (:idVozila,:Marka,:Model,:Vrsta_motora,:Snaga,:Registracija,:Istek_registracije,:Vrsta_vozila,:datum)";
		$oStatement = $conn->prepare($sQuery);
		$oData=array
		(
			'idVozila' => $_POST['idVozila'],
			'Marka' => $_POST['Marka'],
			'Model' => $_POST['Model'],
			'Vrsta_motora' => $_POST['Vrsta_motora'],
			'Snaga' => $_POST['Snaga'],
			'Registracija' => $_POST['Registracija'],
			'Istek_registracije' => $_POST['Istek_registracije'],
			'Vrsta_vozila' => $_POST['Vrsta_vozila'],
			'datum' => $_POST['datum'],
		);
		try 
		{
	
			$oStatement=$conn->prepare($sQuery);
			$oStatement->execute($oData);

			echo 1;
			
		} catch (PDOException $error) 
		{
			echo ($error);
			echo 0;
		}
		break;

		case 'registriraj_vozilo':
		$sQuery ="UPDATE vozila SET Registracija=:Registracija, Istek_registracije=:Istek_registracije WHERE idVozila=:idVozila"; 
		$oStatement = $conn->prepare($sQuery);
		$oData = array
		(
			'idVozila' => $_POST['idVozila'],
			'Registracija' => $_POST['Registracija'],
			'Istek_registracije' => $_POST['Istek_registracije'],

		);
		try 
		{
	
			$oStatement=$conn->prepare($sQuery);
			$oStatement->execute($oData);

			echo 1;
			
		} catch (PDOException $error) 
		{
			echo ($error);
			echo 0;
		}
		break;

		case 'vrati_vozilo':

		$sQuery = [
					"INSERT INTO vozila (idVozila,Marka,Model,Vrsta_motora,Snaga,Registracija,Istek_registracije,Vrsta_vozila,datum) 
					VALUES (:idVozila,:Marka,:Model,:Vrsta_motora,:Snaga,:Registracija,:Istek_registracije,:Vrsta_vozila,:datum)",
					"DELETE FROM zaduzena_vozila WHERE idVozila = '".$sVrativoziloID."'",
					"UPDATE zaposlenik SET vozilo_zaduzeno = '' WHERE vozilo_zaduzeno = '".$sVrativoziloID."'"
				  ];
	
		$oData=array
		(
			'idVozila' => $_POST['idVratiVozilo'],
			'Marka' => $_POST['Marka'],
			'Model' => $_POST['Model'],
			'Vrsta_motora' => $_POST['Vrsta_motora'],
			'Snaga' => $_POST['Snaga'],
			'Registracija' => $_POST['Registracija'],
			'Istek_registracije' => $_POST['Istek_registracije'],
			'Vrsta_vozila' => $_POST['Vrsta_vozila'],
			'datum' => $_POST['datum'],
		);
		try 
		{
			foreach($sQuery as $query)
			{
			$oStatement=$conn->prepare($query);
			$oStatement->execute($oData);
			}

			echo 1;

			
		} catch (PDOException $error) 
		{
			echo $error;
			echo 0;
		}
		break;

		case 'zaduzi_vozilo':

		$sQuery = [
					"INSERT INTO zaduzivanje (idZaduzivanja, idZaposlenika, idVozila, datum) VALUES (:idZaduzivanja, :idZaposlenika,:idVozila,:datum)",
					"INSERT INTO zaduzena_vozila SELECT * FROM vozila WHERE vozila.idVozila = '".$sIdVozila."'",
					"DELETE FROM vozila WHERE EXISTS 
					(SELECT * FROM zaduzivanje WHERE zaduzivanje.idVozila = vozila.idVozila)",
					"UPDATE zaposlenik SET vozilo_zaduzeno = '".$sIdVozila."' WHERE zaposlenik.idzaposlenici =  '".$sZaposlenikID."'"
				  ];

	
	
		$oData=array
		(
			'idZaduzivanja'=> $_POST['idZaduzivanja'],
			'idZaposlenika' => $_POST['idZaposlenika'],
			'idVozila' => $_POST['idZaduzenogVozila'],
			'datum' => $_POST['datum'],
		);



		try 
		{
			foreach($sQuery as $query)
			{
			$oStatement=$conn->prepare($query);
			$oStatement->execute($oData);
			}

			echo 1;

			
		} catch (PDOException $error) 
		{
			echo $error;
			echo 0;
		}
		break;

		
	
	default:
		# code...
		break;
}

?>