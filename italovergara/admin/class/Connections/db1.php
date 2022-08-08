<?php	 	 

	include_once('adodb5/adodb.inc.php');

	$driver = 'mysqli';
	$host = 'localhost';
	//50.31.174.38
	$user = 'mtsaqcqk_app';
	$pass = '81Avu1Ia7e';


	$basededatos = 'mtsaqcqk_app';
	$db1 = ADONewConnection($driver);

	$db1->Connect($host, $user, $pass, $basededatos);


?>