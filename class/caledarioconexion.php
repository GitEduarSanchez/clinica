<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
date_default_timezone_set('America/Bogota');
$dbhost="localhost";
$dbname="isasport_clinica";
$dbuser="isasport_isa";
$dbpass="1091658551edwar20";
$tabla="citasmedicas";
$db = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
if ($db->connect_errno) {
	die ("<h1>Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error."</h1>");
}
?>
