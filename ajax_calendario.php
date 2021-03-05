<?php
session_start();
error_reporting(-1);
require_once("class/caledarioconexion.php");
function fecha ($valor)
{
	$timer = explode(" ",$valor);
	$fecha = explode("-",$timer[0]);
	$fechex = $fecha[2]."/".$fecha[1]."/".$fecha[0];
	return $fechex;
}

function buscar_en_array($fecha,$array)
{
	$total_eventos=count($array);
	for($e=0;$e<$total_eventos;$e++)
	{
		if ($array[$e]["fecha"]==$fecha) return true;
	}
}

switch ($_GET["accion"])
{
	case "listar_evento":
	{
$query=$db->query("select * from ".$tabla." where fechacita='".$_GET["fecha"]."' and codmedico='".$_SESSION['codmedico']."' order by codcita asc");
		if ($fila=$query->fetch_array())
		{
	echo "<div id='di'><table id='tech-companies-1' class='table table-small-font table-bordered table-striped'>";
	echo "<thead><tr role='row'>
	<th><div align='center'><strong>Hora</strong></div></td>
	<th><div align='center'><strong>Status</strong></div></td>
	<th><div align='center'><strong>Nombre</strong></div></td>
	<th><div align='center'><strong>Apellido</strong></div></td>
	<th><div align='center'><strong>Observaci&oacute;n</strong></div></td></tr></thead>";
			do
			{
			    	$paciente=$db->query("select * from pacientes where codpaciente='".$fila["codpaciente"]."'");
			    	if ($prow=$paciente->fetch_array())
                		{
                		    
                		
                        	echo "<tbody><tr>
                        	<td><div align='center'><strong>".$fila["horacita"]."</strong></div></td>
                        	<td><div align='center'><strong>".$fila["statuscita"]."</strong></div></td>
                        
                        	<td><div align='center'><strong>".$prow["pnompaciente"]."</strong></div></td>
                        	<td><div align='center'><strong>".$prow["papepaciente"]."</strong></div></td>
                        	<td><div align='center'><strong>".mb_convert_encoding($fila["observacionescita"], "UTF-8")."</strong></div></td>
                        	</tr></tbody>";	
                		}
			}
			
			while($fila=$query->fetch_array());
		}
		
			echo "</table></div>";
		break;	
	}
	
	
	case "generar_calendario":
	{
		$fecha_calendario=array();
		if ($_GET["mes"]=="" || $_GET["anio"]=="") 
		{
			$fecha_calendario[1]=intval(date("m"));
			if ($fecha_calendario[1]<10) $fecha_calendario[1]="0".$fecha_calendario[1];
			$fecha_calendario[0]=date("Y");
		} 
		else 
		{
			$fecha_calendario[1]=intval($_GET["mes"]);
			if ($fecha_calendario[1]<10) $fecha_calendario[1]="0".$fecha_calendario[1];
			else $fecha_calendario[1]=$fecha_calendario[1];
			$fecha_calendario[0]=$_GET["anio"];
		}
		$fecha_calendario[2]="01";
		
		/* obtenemos el dia de la semana del 1 del mes actual */
		$primeromes=date("N",mktime(0,0,0,$fecha_calendario[1],1,$fecha_calendario[0]));
			
		/* comprobamos si el año es bisiesto y creamos array de días */
		if (($fecha_calendario[0] % 4 == 0) && (($fecha_calendario[0] % 100 != 0) || ($fecha_calendario[0] % 400 == 0))) $dias=array("","31","29","31","30","31","30","31","31","30","31","30","31");
		else $dias=array("","31","28","31","30","31","30","31","31","30","31","30","31");
		
		$eventos=array();
		$query=$db->query("select fechacita,count(codcita) as total from ".$tabla." where month(fechacita)='".$fecha_calendario[1]."' and year(fechacita)='".$fecha_calendario[0]."' and codmedico='".$_SESSION['codmedico']."' group by fechacita");
		if ($fila=$query->fetch_array())
		{
			do
			{
				$eventos[$fila["fechacita"]]=$fila["total"];
		
			}
			while($fila=$query->fetch_array());
		}
		
		$meses=array("","ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
		
		/* calculamos los días de la semana anterior al día 1 del mes en curso */
		$diasantes=$primeromes-1;
			
		/* los días totales de la tabla siempre serán máximo 42 (7 días x 6 filas máximo) */
		$diasdespues=42;
			
		/* calculamos las filas de la tabla */
		$tope=$dias[intval($fecha_calendario[1])]+$diasantes;
		if ($tope%7!=0) $totalfilas=intval(($tope/7)+1);
		else $totalfilas=intval(($tope/7));
			
		
		$mesanterior=date("Y-m-d",mktime(0,0,0,$fecha_calendario[1]-1,01,$fecha_calendario[0]));
		$messiguiente=date("Y-m-d",mktime(0,0,0,$fecha_calendario[1]+1,01,$fecha_calendario[0]));
		
		/* empezamos a pintar la tabla */
	echo "<h4 class='portlet-title text-dark text-uppercase'>

<div align='left'>

<a rel='$mesanterior' class='anterior'><div class='btn-group m-b-10'><button type='button' class='btn btn-default waves-effect'><i class='fa fa-chevron-left'></i><span></button></a>
<a class='siguiente' rel='$messiguiente'><button type='button' class='btn btn-default waves-effect'><i class='fa fa-chevron-right'></i></button></a>

<a class='actual' rel='$messiguiente'><button type='button' onclick='generar_calendario()' class='btn btn-default waves-effect'><label><i class='fa fa-calendar'></i></label></button></a>

</div>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>CITAS M&Eacute;DICAS DE ".$meses[intval($fecha_calendario[1])]." ".$fecha_calendario[0]." </strong></h4> ";
		
		if (isset($mostrar)) echo $mostrar;
			
	echo "<table class='calendario cellspacing='0' cellpadding='0'>";
	echo "<tr>
	<th>Lunes</th>
	<th>Martes</th>
	<th>Mi&eacute;rcoles</th>
	<th>Jueves</th>
	<th>Viernes</th>
	<th>S&aacute;bado</th>
	<th>Domingo</th>
	</tr><tr>";
			
			/* inicializamos filas de la tabla */
			$tr=0;
			$dia=1;
			
			function es_finde($fecha)
			{
				$cortamos=explode("-",$fecha);
				$dia=$cortamos[2];
				$mes=$cortamos[1];
				$ano=$cortamos[0];
				$fue=date("w",mktime(0,0,0,$mes,$dia,$ano));
				if (intval($fue)==0 || intval($fue)==6) return true;
				else return false;
			}
			
			for ($i=1;$i<=$diasdespues;$i++)
			{
				if ($tr<$totalfilas)
				{
					if ($i>=$primeromes && $i<=$tope) 
					{
						echo "<td class='";
						/* creamos fecha completa */
						if ($dia<10) $dia_actual="0".$dia; else $dia_actual=$dia;
						$fecha_completa=$fecha_calendario[0]."-".$fecha_calendario[1]."-".$dia_actual;
						
			if (intval($eventos[$fecha_completa])>0) 
						{
							echo "evento";
							$hayevento=$eventos[$fecha_completa];
						}
			else $hayevento=0;
						
			/* si es hoy coloreamos la celda */
			if (date("Y-m-d")==$fecha_completa) echo " hoy";
						
						echo "'>";
						
			if ($hayevento>0) echo "<a href='#' data-evento='#evento".$dia_actual."' class='modall' rel='".$fecha_completa."' title='Existen ".$hayevento."  Citas M&eacute;dicas para esta Fecha'><span class='label label-success'>".$dia."</span></a>";
						
			else echo "$dia";
						
						echo "</td>";
						$dia+=1;
					}
					else echo "<td class='desactivada'></td>";
					if ($i==7 || $i==14 || $i==21 || $i==28 || $i==35 || $i==42) {echo "<tr>";$tr+=1;}
				}
			}
			echo "</table>";
		break;
	}
}
?>