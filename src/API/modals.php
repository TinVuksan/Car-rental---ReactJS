<?php
include 'connection.php';
$sModalID ="";
$sVoziloID="";

if (isset($_GET['modal_id']))
{
	$sModalID = $_GET['modal_id'];	
}
/*if (isset($_POST['modal_id']))
{
	$sModalID = $_POST['modal_id'];	
}*/
if (isset($_GET['vozilo_id']))
{
	$sVoziloID = $_GET['vozilo_id'];	
}

switch ($sModalID)
 {
	case 'azuriraj_vozilo':
			//include 'connection.php';
			$sQuery = "SELECT * FROM vozila WHERE idVozila=".$sVoziloID;
			$oRecord=$conn->query($sQuery);
			
			while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
			{
					$idVozila = $oRow['idVozila'];
					$Marka=$oRow['Marka'];
					$Model=$oRow['Model'];
					$Vrsta_motora=$oRow['Vrsta_motora'];
					$Snaga=$oRow['Snaga'];
					$Registracija = $oRow['Registracija'];
					$Istek_registracije = $oRow['Istek_registracije'];
					$Vrsta_vozila=$oRow['Vrsta_vozila'];		
			}
		echo 
			'<div class="modal-header" style="background-color:#2ACAEA">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title" style="color:white; letter-spacing:.15rem;"><b> Azuriranje vozila </b></h4>
	</div>			
	<div class="modal-body">
		<form class="form-horizontal">
		<div class="form-group">
				<div class="col-md-8">
				<label>Naziv vozila</label>
					<input 	id="azuzirajNaziv" data-parsley-required="true" type="text" value="'.$Marka.'" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-8">
				<label>Marka vozila</label>
					<input 	id="azurirajModel" data-parsley-required="true" type="text" value="'.$Model.'" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-8">
				<label>Vrsta motora</label>
					<input 	id="azurirajVrstamotora" data-parsley-required="true" type="text" value="'.$Vrsta_motora.'" class="form-control" >
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-8">
					<label>Snaga vozila</label>
					<input 	id="azurirajSnaga" data-parsley-required="true" type="text" value="'.$Snaga.'" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-8">
					<label>Datum registracije</label>
					<input 	id="azurirajRegistracija" data-parsley-required="true" type="text" value="'.$Registracija.'" class="form-control" disabled>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-8">
					<label>Istek registracije</label>
					<input 	id="azurirajIstekregistracije" data-parsley-required="true" type="text" value="'.$Istek_registracije.'" class="form-control" disabled>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-md-8">
				<label>Vrsta vozila</label>
					<input 	id="azurirajVrstavozila" data-parsley-required="true" type="text" value="'.$Vrsta_vozila.'" class="form-control" disabled>
				</div>
			</div>			
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-success btn-s" onclick="AzurirajVozilo('.$sVoziloID.')">Spremi</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
	</div>';
		break;

	case 'registriraj_vozilo':
			//include 'connection.php';
			$sQuery = "SELECT * FROM vozila WHERE idVozila=".$sVoziloID;
			$oRecord=$conn->query($sQuery);
			
			while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
			{
					$Marka=$oRow['Marka'];
					$Model=$oRow['Model'];
					$Vrsta_motora=$oRow['Vrsta_motora'];
					$Snaga=$oRow['Snaga'];
					$Registracija = $oRow['Registracija'];
					$Istek_registracije = $oRow['Istek_registracije'];
					$Vrsta_vozila=$oRow['Vrsta_vozila'];		
			}
		echo 
			'<div class="modal-header" style="background-color:#2ACAEA">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title" style="color:white; letter-spacing:.15rem;"><b> Registracija vozila</b></h4>
	</div>			
	<div class="modal-body">
		<form class="form-horizontal">
			<div class="form-group">

				<div class="col-md-8">
					<label>ID vozila</label>
					<input 	id="registracijaID" data-parsley-required="true" type="text" value="'.$sVoziloID.'" class="form-control" disabled>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-8">
					<label>Naziv vozila</label>
					<input 	id="registracijaNaziv" data-parsley-required="true" type="text" value="'.$Marka.'" class="form-control" disabled>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-8">
				<label>Marka vozila</label>
					<input 	id="registracijaModel" data-parsley-required="true" type="text" value="'.$Model.'" class="form-control" disabled>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-8">
				<label>Registracija</label>
					<input 	id="registracijaStaro" data-parsley-required="true" type="text" value="'.$Registracija.'" class="form-control" disabled>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-8">
				<label>Vrsta vozila</label>
					<input 	id="registracijaVrsta" data-parsley-required="true" type="text" value="'.$Vrsta_vozila.'" class="form-control" disabled>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-8">
					<label>Novi dan registracije</label>
					<select class="form-control" id="registracijaDan">
					<script>
					for(var i=1; i<=31; i++) {
						var select = document.getElementById("registracijaDan");
						var option = document.createElement("OPTION");
						select.options.add(option);
						option.text = i;
						option.value = i;
					}
					</script>
					</select>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-8">
					<label>Novi mjesec registracije</label>
					<select class="form-control" id="registracijaMjesec">
						<option>01</option>
						<option>02</option>
						<option>03</option>
						<option>04</option>
						<option>05</option>
						<option>06</option>
						<option>07</option>
						<option>08</option>
						<option>09</option>
						<option>10</option>
						<option>11</option>
						<option>12</option>
					</select>
				</div>
			</div>
	
			<div class="form-group">
				<div class="col-md-8">
					<label>Nova godina registracije</label>
					<select class="form-control" id="registracijaGodina">
					<script>
					for(var i=1990; i<=2030; i++) {
						var select = document.getElementById("registracijaGodina");
						var option = document.createElement("OPTION");
						select.options.add(option);
						option.text = i;
						option.value = i;
					}
					</script>
					</select>
				</div>
			</div>
		</div>
	</div>

	<div class="modal-footer">
		<button type="button" class="btn btn-success btn-s" onclick="RegistracijaVozila('.$sVoziloID.')">Spremi</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
	</div>';
		break;

	case 'obrisi_vozilo':
		echo
			'<div class="modal-header" style="background-color:#2ACAEA">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" style="color:white; letter-spacing:.15rem;"><b> Brisanje</b></h4>
			</div>			
		<div class="modal-body">
				<form class="form-horizontal">
				Jeste li sigurni da želite obrisati vozilo?
			</div>		
			<div class="modal-footer">
				<button type="button" class="btn btn-info" onclick="ObrisiVozilo('.$sVoziloID.')">Obriši</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
			</div>';
	break;

	case 'dodaj_novo_vozilo':
		echo 
		'
		<div class="modal-header" style="background-color:#2ACAEA">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" style="color:white; letter-spacing:.15rem;"><b> Novo vozilo</b></h4>
			</div>		
	
	<div class="modal-body">
		<form class="form-horizontal">

			<div class="form-group">
				<div class="col-md-6">
					<label>Marka vozila</label>
					<input 	id="inptMarka" data-parsley-required="true" type="text" placeholder="Unesite marku vozila" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-6">
				<label>Model vozila</label>
					<input 	id="inptModel" data-parsley-required="true" type="text" placeholder="S500,A3,330D..."  class="form-control">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-6">
				<label>Vrsta motora</label>
					<select class="form-control" id="inptVrstamotora">
					<option>Benzin</option>
					<option>Diesel</option>
					<option>Hibrid</option>
					<option>Električni</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-6">
				<label>Snaga vozila</label>
					<input 	id="inptSnaga" data-parsley-required="true" type="text" placeholder="Snaga u KW"  class="form-control">
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-3">
					<label>Dan registracije</label>
					<select class="form-control" id="inptDan">
					<script>
					for(var i=1; i<=31;i++)
					{
						var select = document.getElementById("inptDan");
						var option = document.createElement("OPTION");
						select.options.add(option);
						option.text=i;
						option.value = i;
					}
					</script>
					</select>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-3">
					<label>Mjesec registracije</label>
					<select class="form-control" id="inptMjesec">
						<option>01</option>
						<option>02</option>
						<option>03</option>
						<option>04</option>
						<option>05</option>
						<option>06</option>
						<option>07</option>
						<option>08</option>
						<option>09</option>
						<option>10</option>
						<option>11</option>
						<option>12</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-3">
					<label>Godina registracije</label>
					<select class="form-control" id="inptGodina">
					<script>
					for(var i=1990; i<=2030; i++) {
						var select = document.getElementById("inptGodina");
						var option = document.createElement("OPTION");
						select.options.add(option);
						option.text = i;
						option.value = i;
					}
					</script>
					</select>
				</div>
			</div>
	
			<div class="form-group">
				<div class="col-md-3">
				<label>Vrsta vozila:</label>
					<select class="form-control" id="inptVrstaVozila" onchange="getSelectedValue()">
						<option>Automobil</option>
						<option>Motocikl</option>
						<option>Kamion</option>
						<option>Radni stroj</option>
					</select>
				</div>
			</div>
		
	</form>
		<div class="modal-footer">
		<button type="button" class="btn btn-info" onclick="DodajVozilo()">Spremi</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
	</div>				
	</div>';

	break;	

	

		case 'vrati_vozilo':
			//include 'connection.php';
			$sQuery = "SELECT * FROM zaduzena_vozila WHERE idVozila=".$sVoziloID;
			$oRecord=$conn->query($sQuery);
			
			while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
			{

					$Marka=$oRow['Marka'];
					$Model=$oRow['Model'];
					$Vrsta_motora=$oRow['Vrsta_motora'];
					$Snaga=$oRow['Snaga'];
					$Registracija = $oRow['Registracija'];
					$Istek_registracije = $oRow['Istek_registracije'];
					$Vrsta_vozila=$oRow['Vrsta_vozila'];
					$Datum = $oRow['datum'];		
			}
		echo 
			'<div class="modal-header" style="background-color:#2ACAEA">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title" style="color:white; letter-spacing:.15rem;"><b>Vrati zaduženo vozilo</b></h4>
	</div>			
	<div class="modal-body">
		<form class="form-horizontal">
			<div class="form-group">

				<div class="col-md-8">
					<label>ID vozila</label>
					<input 	id="vratiID" data-parsley-required="true" type="text" value="'.$sVoziloID.'" class="form-control" disabled>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-8">
					<label>Naziv vozila</label>
					<input 	id="vratiNaziv" data-parsley-required="true" type="text" value="'.$Marka.'" class="form-control" disabled>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-8">
				<label>Marka vozila</label>
					<input 	id="vratiModel" data-parsley-required="true" type="text" value="'.$Model.'" class="form-control" disabled>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-8">
				<label>Marka vozila</label>
					<input 	id="vratiMotor" data-parsley-required="true" type="text" value="'.$Vrsta_motora.'" class="form-control" disabled>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-8">
				<label>Marka vozila</label>
					<input 	id="vratiSnaga" data-parsley-required="true" type="text" value="'.$Snaga.'" class="form-control" disabled>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-8">
				<label>Registracija</label>
					<input 	id="vratiRegistracija" data-parsley-required="true" type="text" value="'.$Registracija.'" class="form-control" disabled>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-8">
				<label>Istek registracije</label>
					<input 	id="vratiIstek" data-parsley-required="true" type="text" value="'.$Istek_registracije.'" class="form-control" disabled>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-8">
				<label>Vrsta vozila</label>
					<input 	id="vratiVrsta" data-parsley-required="true" type="text" value="'.$Vrsta_vozila.'" class="form-control" disabled>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-md-8">
				<label>Datum</label>
					<input 	id="vratiDatum" data-parsley-required="true" type="text" value="'.$Datum.'" class="form-control" disabled>
				</div>
			</div>

		</div>
	</div>

	<div class="modal-footer">
		<button type="button" class="btn btn-success btn-s" onclick="VratiVozilo('.$sVoziloID.')">Vrati vozilo</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
	</div>';
		break;
}
?>