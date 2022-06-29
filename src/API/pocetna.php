<!DOCTYPE html>
<html lang="hr">
<head>
	<meta charset="utf-8">
	<title>Vozni park VSMTI</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
	<div class="loginbox">
		<form id="formPrijava" action="login.php" method="POST">
			<h1><b>Dobrodošli!</b></h1>
			<?php

			 	if (isset($_GET['error'])) {
				?>
				<p class="error"><?php echo $_GET['error'];?></p>

			<?php } 

			?>
			

			
			<div class="form-group">				
				<div><input id="input" class="form-control" type="text" name="uname" placeholder="Korisnicko ime "></div>				
			</div>
			<div class="form-group">				
				<div><input id="input" class="form-control" type="password" name="pass" placeholder="Lozinka"></div>				
			</div>
			<div class="modal-footer">
				<button id="loginButton" type="submit" class="btn btn-default btn-lg">Prijava</button>
			</div>			
		</form>
	</div>


</body>
</html>