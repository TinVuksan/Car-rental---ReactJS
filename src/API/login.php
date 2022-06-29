<?php


header("Content-type:application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

include "connection.php";

$prijava = false;
$sQuery = "SELECT * FROM users WHERE mail = '".$_POST['mail']."' AND lozinka = '".$_POST['lozinka']."'";

    $oData = $conn ->prepare($sQuery);
	$oData->execute();

	if($oData->rowCount() == 1)
      {
        $row = $oData->fetch(PDO::FETCH_ASSOC);
		$prijava = true;
	  }
	  else {
		$prijava = false;
	  }
    // while($oRow = $oData -> fetch(PDO::FETCH_BOTH))
    // {
    //     $prijava = true;
    // }
     echo json_encode($prijava);




?>