<?php
	include('class.consultas.php');
	$filtro    = $_GET["term"];
	$Json      = new Json;
	$cie10  = $Json->BuscaCie10($filtro);
	echo  json_encode($cie10);
?>  