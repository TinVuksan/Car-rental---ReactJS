<?php
include 'classes.php';

$oConfig=new Configuration();

try
{
	$conn = new PDO("mysql:host=$oConfig->host;dbname=$oConfig->dbName;charset=utf8", $oConfig->username, $oConfig->password);
	// array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); 
	//echo "Connected to $oConfig->dbName at $oConfig->host successfully.";
	//$oConnection = new PDO("mysql:host=$oConfig->host;dbname=$oConfig->dbName", $oConfig->username, $oConfig->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); 
	
}
catch (PDOException $pe)
{
	die("Could not connect to the database $oConfig->dbName :" . $pe->getMessage());
}
?>