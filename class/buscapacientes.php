<?php
	include('class.consultas.php');
	$filtro    = $_GET["term"];
	$Json      = new Json;
	$pacientes  = $Json->BuscaPacientes($filtro);
	echo  json_encode($pacientes);
?>  