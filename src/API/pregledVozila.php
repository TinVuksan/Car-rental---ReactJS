<!DOCTYPE html>
<html lang="hr">
<head>
	<title>Vozila</title>
	<meta charset="utf-8">	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="fontawesome/css/all.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<link rel="stylesheet" href="css/style.css">

</head>
<body>
	<header>
		<nav class="navbar navbar-default navbar-fixed-top">
		<ul class="nav navbar-stacked">
			<a href="vozila.php" alt="Admin logo"><li><img id="img" src="img/logo.jpg"></li></a>

			<li>
				<div id="pregledvozila">
				<?php
				session_start();
				if(isset($_SESSION["username"]))
				{
					echo '<label style="font-style:italic">Korisnik: ' .$_SESSION["username"]. ' <label>';
				}
				else
				{
					header("location: pocetna.php");
				}
				?>
				</div>
			</li>
			<li>
				<div id="pregledvozila">
					<button onclick="window.location.href='pregledVozila.php'" class="btn btn-info">
						<i class="far fa-list-alt fa-lg"></i>
					</button>
					<label><a id="navLink" href="pregledVozila.php" style="text-decoration:underline;">Pregled vozila</a></label>					
				</div>
			</li>
		
			<li>
				<div id="pregledvozila">
					<button onclick="window.location.href='registracija.php'" class="btn btn-info">
						<i class="far fa-calendar-alt fa-lg"></i>
					</button>
					<label><a id="navLink" href="registracija.php">Registracija vozila</a></label>					
				</div>
			</li>

			<li>
				<div id="pregledvozila">
					<button onclick="window.location.href='zaduzi.php'" class="btn btn-info">
						<i class="far fa-clipboard fa-lg"></i>
					</button>
					<label><a id="navLink" href="zaduzi.php">Zaduži vozilo</a></label>					
				</div>
			</li>

			<li>
				<div id="pregledvozila">
					<button onclick="window.location.href='vrati.php'" class="btn btn-info">
						<i class="fas fa-undo-alt"></i>
					</button>
					<label><a id="navLink" href="vrati.php">Vrati vozilo</a></label>					
				</div>
			</li>

			<li>
				<div id="pregledvozila">
					<button onclick="window.location.href='statistika.php'" class="btn btn-info">
						<i class="fas fa-chart-pie"></i>
					</button>
					<label><a id="navLink" href="statistika.php">Statistika</a></label>					
				</div>
			</li>

			<li>
				<div id="pregledvozila">
					<button class="btn btn-danger" onclick="Odjava()">
						<i class="fas fa-sign-out-alt fa-lg"></i>
					</button>
					<label><a id="navLink" onclick= "Odjava()">Odjava</a></label>					
				</div>
			</li>								
		</ul>
		</nav>		
	</header>

	<div class="container-fluid">
		<table class="table table-hover table-condensed">
			<thead>
				<tr>
					<th>Rbr.</th>
					<th>ID vozila</th>
					<th>Marka</th>
					<th>Model</th>
					<th>Vrsta motora</th>
					<th>Snaga</th>
					<th>Registracija</th>
					<th>Istek registracije</th>
					<th>Vrsta vozila</th>
					<th>Datum</th>
					<th>Azuriraj</th>
					<th>Obriši</th>
				</tr>
			</thead>
			<tbody>				
			</tbody>			
		</table>



		<a href="javascript:GetModal('modals.php?modal_id=dodaj_novo_vozilo');" id="novi_zaposlenik" class="btn btn-info" role="button">DODAJ NOVO VOZILO</a>	
	</div>

	<div class="modal" id="modals" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	
	    </div>
	  </div>
	</div>

<script type="text/javascript" src="js/app.js"></script>
<script type="text/javascript" src="js/azuriranje.js"></script>
<script type="text/javascript" src="js/globals.js"></script>
</body>
</html>