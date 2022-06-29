<?php
class Configuration
{
	public $host="localhost";
	public $dbName="vozni-park";
	public $username="root";
	public $password="";	
}

class Osoba
{
	public $ime="N/A";
	public $prezime="N/A";
	public $datum_rodenja ="N/A";
	public function __construct($ime=null,$prezime=null, $datum_rodenja=null)
	{		
		if($ime) $this->ime=$ime;
		if($prezime) $this->prezime=$prezime;
		if($datum_rodenja) $this->datum_rodenja = $datum_rodenja;
	}
}

class Zaposlenik extends Osoba
{
	public $idzaposlenici= "N/A";
	public $vozilo_zaduzeno = "N/A";

	public function __construct($ime=null,$prezime=null,$datum_rodenja=null, $idzaposlenici=null, $vozilo_zaduzeno=null)
	{
		parent::__construct($ime,$prezime, $datum_rodenja);
		if($idzaposlenici) $this->idzaposlenici=$idzaposlenici;
		if($vozilo_zaduzeno) $this->vozilo_zaduzeno = $vozilo_zaduzeno;
	}
}


class Vozilo
{
	public $idVozila="N/A";
	public $Marka="N/A";
	public $Model="N/A";
	public function __construct($idVozila=NULL,$Marka=NULL,$Model=NULL)
	{
		if($idVozila) $this->idVozila =$idVozila;
		if($Marka) $this->Marka =$Marka;
		if($Model) $this->Model =$Model;
	}
}

class Automobil extends Vozilo
{	
	public $Vrsta_vozila="N/A";
	public $Registracija="N/A";
	public $Istek_registracije="N/A";
	public $Slika = "N/A";

	
	public function __construct(
		$idVozila=NULL,$Marka=NULL,$Model=NULL,$Vrsta_vozila=NULL,$Registracija=NULL,$Istek_registracije=NULL, $Slika=NULL)
	{
		parent::__construct($idVozila,$Marka,$Model);
		if($Vrsta_vozila) $this->Vrsta_vozila=$Vrsta_vozila;
		if($Registracija) $this->Registracija=$Registracija;
		if($Istek_registracije) $this->Istek_registracije=$Istek_registracije;
		if($Slika) $this->Slika=$Slika;
		

	}
}

class Motocikl extends Vozilo
{
	public $Registracija="N/A";
	public $Istek_registracije="N/A";
	public $Vrsta_vozila="N/A";
	public function __construct(
		$idVozila=NULL,$Marka=NULL,$Model=NULL,$Vrsta_vozila=NULL,$Registracija=NULL,$Istek_registracije=NULL)
	{
		parent::__construct($idVozila,$Marka,$Model);
		if($Vrsta_vozila) $this->Vrsta_vozila=$Vrsta_vozila;
		if($Registracija) $this->Registracija=$Registracija;
		if($Istek_registracije) $this->Istek_registracije=$Istek_registracije;
		

	}
}
class Radni_stroj extends Vozilo
{
	public $Registracija="N/A";
	public $Istek_registracije="N/A";
	public $Vrsta_vozila="N/A";

	public function __construct(
		$idVozila=NULL,$Marka=NULL,$Model=NULL,$Vrsta_vozila=NULL,$Registracija=NULL,$Istek_registracije=NULL)
	{
		parent::__construct($idVozila,$Marka,$Model);
		if($Vrsta_vozila) $this->Vrsta_vozila=$Vrsta_vozila;
		if($Registracija) $this->Registracija=$Registracija;
		if($Istek_registracije) $this->Istek_registracije=$Istek_registracije;
		

	}
}
class Kamion extends Vozilo
{
	public $Registracija="N/A";
	public $Istek_registracije="N/A";
	public $Vrsta_vozila="N/A";
	public function __construct(
		$idVozila=NULL,$Marka=NULL,$Model=NULL,$Vrsta_vozila=NULL,$Registracija=NULL,$Istek_registracije=NULL)
	{
		parent::__construct($idVozila,$Marka,$Model);
		if($Vrsta_vozila) $this->Vrsta_vozila=$Vrsta_vozila;
		if($Registracija) $this->Registracija=$Registracija;
		if($Istek_registracije) $this->Istek_registracije=$Istek_registracije;
		

	}
}

class Zaduzivanje
{
	public $idZaduzivanja;
	public $idZaposlenika;
	public $idVozila;
	public $datum;

	public function __construct($idZaduzivanja=null,$idZaposlenika=null,$idVozila=null)
	{
		if ($idZaduzivanja) $this->idZaduzivanja=$idZaduzivanja;
		if ($idZaposlenika) $this->idZaposlenika=$idZaposlenika;
		if ($idVozila) $this->idVozila=$idVozila;

	}
}

?>