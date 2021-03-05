<?php
require_once("class/class.php");
    if (isset($_SESSION['acceso'])) {
        if ($_SESSION['acceso'] == "administrador" || $_SESSION["acceso"]=="secretaria" || $_SESSION["acceso"]=="enfermera" || $_SESSION["acceso"]=="auditor" || $_SESSION["acceso"]=="tecnico" || $_SESSION['acceso'] == "general" || $_SESSION["acceso"]=="ginecologo" || $_SESSION["acceso"]=="laboratorio" || $_SESSION["acceso"]=="radiologo" || $_SESSION["acceso"]=="terapeuta" || $_SESSION["acceso"]=="odontologo") {

$con = new Login();
//$con = $con->ConfiguracionPorId();

$tipo = base64_decode($_GET['tipo']);
switch($tipo)
  {

case 'SUCURSALES': 

$hoy = "LISTADO_GENERAL_SUCURSALES";
header("Content-Type: application/vnd.ms-excel"); 
header("Expires: 0"); 
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("content-disposition: attachment;filename=".$hoy.".xls");

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
         <tr>
           <th>Nº</th>
           <th>NIT SUCURSAL</th>
           <th>RAZÓN SOCIAL</th>
           <th>DEPARTAMENTO</th>
           <th>CIUDAD</th>
           <th>DIRECCIÓN</th>
           <th>EMAIL</th>
           <th>Nº DE TELEFONO</th>
           <th>IDENTIFICACIÓN DE DIRECTOR</th>
           <th>NOMBRE DE DIRECTOR</th>
           <th>Nº DE TELEFONO</th>
         </tr>
      <?php 
$tra = new Login();
$reg = $tra->ListarSucursal();

if($reg==""){
echo "";      
} else {
  
$a=1; 
for($i=0;$i<sizeof($reg);$i++){
?>
         <tr align="center" class="even_row">
           <td><?php echo $a++; ?></td>
           <td><?php echo $reg[$i]['nitsucursal']; ?></td>
           <td><?php echo $reg[$i]['nombresucursal']; ?></td>
           <td><?php echo $reg[$i]['nombre']; ?></td>
           <td><?php echo $reg[$i]['ciudadsucursal']; ?></td>
           <td><?php echo $reg[$i]['direccionsucursal']; ?></td>
           <td><?php echo $reg[$i]['emailsucursal']; ?></td>
           <td><?php echo $reg[$i]['telefonosucursal']; ?></td>
           <td><?php echo $reg[$i]['identdirecsucursal']; ?></td>
           <td><?php echo $reg[$i]["nomdirecsucursal"]." ".$reg[$i]["apedirecsucursal"]; ?></td>
           <td><?php echo $reg[$i]['telefdirecsucursal']; ?></td>
         </tr>
        <?php } } ?>
</table>
<?php
break;

case 'SEDES': 

$hoy = "LISTADO_GENERAL_SEDES";
header("Content-Type: application/vnd.ms-excel"); 
header("Expires: 0"); 
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("content-disposition: attachment;filename=".$hoy.".xls");

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
         <tr>
           <th>Nº</th>
           <th>NIT SUCURSAL</th>
           <th>NOMBRE DE SUCURSAL</th>
           <th>NOMBRE DE SEDE</th>
           <th>DEPARTAMENTO</th>
           <th>CIUDAD</th>
           <th>DIRECCIÓN</th>
           <th>EMAIL</th>
           <th>Nº DE TELEFONO</th>
           <th>IDENTIFICACIÓN DE DIRECTOR</th>
           <th>NOMBRE DE DIRECTOR</th>
           <th>Nº DE TELEFONO</th>
         </tr>
      <?php 
$tra = new Login();
$reg = $tra->ListarSedes();

if($reg==""){
echo "";      
} else {
  
$a=1; 
for($i=0;$i<sizeof($reg);$i++){
?>
         <tr align="center" class="even_row">
           <td><?php echo $a++; ?></td>
           <td><?php echo $reg[$i]['nitsucursal']; ?></td>
           <td><?php echo $reg[$i]['nombresucursal']; ?></td>
           <td><?php echo $reg[$i]['nombresede']; ?></td>
           <td><?php echo $reg[$i]['nombre']; ?></td>
           <td><?php echo $reg[$i]['ciudadsede']; ?></td>
           <td><?php echo $reg[$i]['direccionsede']; ?></td>
           <td><?php echo $reg[$i]['emailsede']; ?></td>
           <td><?php echo $reg[$i]['telefonosede']; ?></td>
           <td><?php echo $reg[$i]['identdirecsede']; ?></td>
           <td><?php echo $reg[$i]["nomdirecsede"]." ".$reg[$i]["apedirecsede"]; ?></td>
           <td><?php echo $reg[$i]['telefdirecsede']; ?></td>
         </tr>
        <?php } } ?>
</table>
<?php
break;

case 'EPS': 

$hoy = "LISTADO_GENERAL_EPS";
header("Content-Type: application/vnd.ms-excel"); 
header("Expires: 0"); 
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("content-disposition: attachment;filename=".$hoy.".xls");

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
         <tr>
           <th>Nº</th>
           <th>CÓDIGO</th>
           <th>NOMBRE DE ENTIDAD</th>
           <th>NIT</th>
           <th>TIPO</th>
           <th>DIV</th>
           <th>EXPEDIDA</th>
           <th>NOMBRE DE CONTABILIDAD</th>
         </tr>
      <?php 
$tra = new Login();
$reg = $tra->ListarEps();

if($reg==""){
echo "";      
} else {
  
$a=1; 
for($i=0;$i<sizeof($reg);$i++){
?>
         <tr align="center" class="even_row">
           <td><?php echo $a++; ?></td>
           <td><?php echo $reg[$i]['codigo']; ?></td>
           <td><?php echo $reg[$i]['nomentidad']; ?></td>
           <td><?php echo $reg[$i]['nit']; ?></td>
           <td><?php echo $reg[$i]['tipo']; ?></td>
           <td><?php echo $reg[$i]['dv']; ?></td>
           <td><?php echo $reg[$i]['expedida']; ?></td>
           <td><?php echo $reg[$i]['nomcontabilidad']; ?></td>
         </tr>
        <?php } } ?>
</table>
<?php
break;

case 'USUARIOS': 

$hoy = "LISTADO_GENERAL_USUARIOS";
header("Content-Type: application/vnd.ms-excel"); 
header("Expires: 0"); 
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("content-disposition: attachment;filename=".$hoy.".xls");

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
         <tr>
           <th>Nº</th>
           <th>CÉDULA</th>
           <th>NOMBRES Y APELLIDOS</th>
           <th>SEXO</th>
           <th>CARGO</th>
           <th>EMAIL</th>
           <th>USUARIO</th>
           <th>NIVEL</th>
           <th>STATUS</th>
         </tr>
      <?php 
$tra = new Login();
$reg = $tra->ListarUsuarios();

if($reg==""){
echo "";      
} else {
  
$a=1; 
for($i=0;$i<sizeof($reg);$i++){
?>
         <tr align="center" class="even_row">
           <td><?php echo $a++; ?></td>
           <td><?php echo $reg[$i]['cedula']; ?></td>
           <td><?php echo $reg[$i]['nombres']; ?></td>
           <td><?php echo $reg[$i]['sexo']; ?></td>
           <td><?php echo $reg[$i]['cargo']; ?></td>
           <td><?php echo $reg[$i]['email']; ?></td>
           <td><?php echo $reg[$i]['usuario']; ?></td>
           <td><?php echo $reg[$i]['nivel']; ?></td>
           <td><?php echo $reg[$i]['status']; ?></td>
         </tr>
        <?php } } ?>
</table>
<?php
break;

case 'LOGS': 

$hoy = "LISTADO_GENERAL_LOGS";
header("Content-Type: application/vnd.ms-excel"); 
header("Expires: 0"); 
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("content-disposition: attachment;filename=".$hoy.".xls");

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
         <tr>
           <th>Nº</th>
           <th>IP</th>
           <th>TIEMPO DE ENTRADA</th>
           <th>DETALLES DE ACCESO</th>
           <th>USUARIOS</th>
         </tr>
      <?php 
$tra = new Login();
$reg = $tra->ListarLogs();

if($reg==""){
echo "";      
} else {
  
$a=1; 
for($i=0;$i<sizeof($reg);$i++){
?>
         <tr align="center" class="even_row">
           <td><?php echo $a++; ?></td>
           <td><?php echo $reg[$i]['ip']; ?></td>
           <td><?php echo $reg[$i]['tiempo']; ?></td>
           <td><?php echo $reg[$i]['detalles']; ?></td>
           <td><?php echo $reg[$i]['usuario']; ?></td>
         </tr>
        <?php } } ?>
</table>
<?php
break;

case 'MEDICOS': 

$hoy = "LISTADO_GENERAL_MEDICOS";
header("Content-Type: application/vnd.ms-excel"); 
header("Expires: 0"); 
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("content-disposition: attachment;filename=".$hoy.".xls");

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
         <tr>
           <th>Nº</th>
           <th>TARJETA PROFESIONAL</th>
           <th>TIPO IDENTIFICACIÓN</th>
           <th>Nº DE IDENTIFICACIÓN</th>
           <th>NOMBRES Y APELLIDOS</th>
           <th>SEXO</th>
           <th>FECHA DE NACIMIENTO</th>
           <th>EDAD</th>
           <th>Nº DE TELÉFONO</th>
           <th>CORREO ELECTRONICO</th>
           <th>DIRECCIÓN DOMICILIARIA</th>
           <th>ESPECIALIDAD</th>
           <th>MODULO DE ACCESO</th>
         </tr>
      <?php 
$tra = new Login();
$reg = $tra->ListarMedicos();

if($reg==""){
echo "";      
} else {
  
$a=1; 
for($i=0;$i<sizeof($reg);$i++){
?>
         <tr align="center" class="even_row">
           <td><?php echo $a++; ?></td>
           <td><?php echo $reg[$i]['tpmedico']; ?></td>
           <td><?php echo $reg[$i]['identmedico']; ?></td>
           <td><?php echo $reg[$i]['cedmedico']; ?></td>
           <td><?php echo $reg[$i]["nommedico"]." ".$reg[$i]["apemedico"]; ?></td>
           <td><?php echo $reg[$i]['sexomedico']; ?></td>
           <td><?php echo date("d-m-Y",strtotime($reg[$i]["fnacmedico"])); ?></td>
           <td><?php echo edad($reg[$i]["fnacmedico"]); ?></td>
           <td><?php echo $reg[$i]['tlfmedico']; ?></td>
           <td><?php echo $reg[$i]['correomedico']; ?></td>
           <td><?php echo $reg[$i]['direcmedico']; ?></td>
           <td><?php echo $reg[$i]['especmedico']; ?></td>
           <td><?php echo $reg[$i]['moduloespec']; ?></td>
         </tr>
        <?php } } ?>
</table>
<?php
break;

case 'PACIENTES': 

$hoy = "LISTADO_GENERAL_PACIENTES";
header("Content-Type: application/vnd.ms-excel"); 
header("Expires: 0"); 
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("content-disposition: attachment;filename=".$hoy.".xls");

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
         <tr>
           <th>Nº</th>
           <th>TIPO IDENTIFICACIÓN</th>
           <th>Nº DE IDENTIFICACIÓN</th>
           <th>NOMBRES Y APELLIDOS</th>
           <th>SEXO</th>
           <th>FECHA DE NACIMIENTO</th>
           <th>EDAD</th>
           <th>Nº DE TELÉFONO</th>
           <th>GRUPO SANGUINEO</th>
           <th>EPS</th>
           <th>VINCULACIÓN</th>
           <th>ESTADO CIVIL</th>
           <th>OCUPACIÓN</th>
           <th>ENFOQUE</th>
           <th>DEPARTAMENTO</th>
           <th>MUNICIPIO</th>
           <th>CIUDAD</th>
           <th>DIRECCIÓN DOMICILIARIA</th>
           <th>NOMBRE DE ACOMPAÑANTE</th>
           <th>DIRECCIÓN DE ACOMPAÑANTE</th>
           <th>Nº DE TELÉFONO</th>
           <th>PARENTESCO DE ACOMPAÑANTE</th>
           <th>NOMBRE DE RESPONSABLE</th>
           <th>DIRECCIÓN DE RESPONSABLE</th>
           <th>Nº DE TELÉFONO</th>
           <th>PARENTESCO DE RESPONSABLE</th>
         </tr>
      <?php 
$tra = new Login();
$reg = $tra->ListarPacientes();

if($reg==""){
echo "";      
} else {
  
$a=1; 
for($i=0;$i<sizeof($reg);$i++){
?>
         <tr align="center" class="even_row">
           <td><?php echo $a++; ?></td>
           <td><?php echo $reg[$i]['idenpaciente']; ?></td>
           <td><?php echo $reg[$i]['cedpaciente']; ?></td>
           <td><?php echo $reg[$i]["pnompaciente"]." ".$reg[$i]["snompaciente"]." ".$reg[$i]["papepaciente"]." ".$reg[$i]["sapepaciente"]; ?></td>
           <td><?php echo $reg[$i]['sexopaciente']; ?></td>
           <td><?php echo date("d-m-Y",strtotime($reg[$i]["fnacpaciente"])); ?></td>
           <td><?php echo edad($reg[$i]["fnacpaciente"]); ?></td>
           <td><?php echo $reg[$i]['tlfpaciente']; ?></td>
           <td><?php echo $reg[$i]['gruposapaciente']; ?></td>
           <td><?php echo $reg[$i]['nomentidad']; ?></td>
           <td><?php echo $reg[$i]['vinculacion']; ?></td>
           <td><?php echo $reg[$i]['estadopaciente']; ?></td>
           <td><?php echo $reg[$i]['ocupacionpaciente']; ?></td>
           <td><?php echo $reg[$i]['enfoquepaciente']; ?></td>
           <td><?php echo $reg[$i]['nombre']; ?></td>
           <td><?php echo $reg[$i]['nombre_municipio']; ?></td>
           <td><?php echo $reg[$i]['ciudad']; ?></td>
           <td><?php echo $reg[$i]['direcpaciente']; ?></td>
           <td><?php echo $reg[$i]['nomacompana']; ?></td>
           <td><?php echo $reg[$i]['direcacompana']; ?></td>
           <td><?php echo $reg[$i]['tlfacompana']; ?></td>
           <td><?php echo $reg[$i]['parentescoacompana']; ?></td>
           <td><?php echo $reg[$i]['nomresponsable']; ?></td>
           <td><?php echo $reg[$i]['direcresponsable']; ?></td>
           <td><?php echo $reg[$i]['tlfresponsable']; ?></td>
           <td><?php echo $reg[$i]['parentescoresponsable']; ?></td>
         </tr>
        <?php } } ?>
</table>
<?php
break;

case 'CITASCANCELADA': 

$tra = new Login();
$reg = $tra->BuscarCitasMedicasCanceladas();

$hoy = "CITAS_CANCELADAS_DEL_PACIENTE_".str_replace(" ", "_", $reg[0]['cedpaciente']." ".$reg[0]['pnompaciente']." ".$reg[0]['snompaciente']." ".$reg[0]['papepaciente']." ".$reg[0]['sapepaciente']);

header("Content-Type: application/vnd.ms-excel"); 
header("Expires: 0"); 
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("content-disposition: attachment;filename=".$hoy.".xls");

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
         <tr>
          <th>N°</th>
           <th>NOMBRE DE MEDICO</th>
           <th>MOTIVO DE CITA</th>
           <th>FECHA/HORA</th>
           <th>STATUS</th>
         </tr>
      <?php 
$a=1;
for($i=0;$i<sizeof($reg);$i++){
?>
         <tr align="center" class="even_row">
    <td><?php echo $a++; ?></td>
    <td><?php echo $reg[$i]['especmedico']." : ".$reg[$i]['nommedico']." ".$reg[$i]['apemedico']; ?></td>
    <td><?php echo $reg[$i]['motivocita']; ?></td>
    <td><?php echo date("d-m-Y", strtotime($reg[$i]["fechacita"]))." ".$reg[$i]["horacita"]; ?></td>
    <td><?php echo $reg[$i]["statuscita"]; ?></td>
         </tr>
        <?php } ?>
</table>

<?php
break;
case 'CITASXFECHAS': 

$tra = new Login();
$reg = $tra->BuscarCitasMedicasReportes();

$hoy = "CITAS_MEDICAS_DESDE_".date("d-m-Y", strtotime($_GET["desde"])).'_HASTA_'.date("d-m-Y", strtotime($_GET["hasta"])).'_ESPECIALIDAD_'.$_GET["especialidad"]."_SUCURSAL_".str_replace(" ", "_", $reg[0]["nombresucursal"])."_SEDE_".str_replace(" ", "_", $reg[0]["nombresede"]);

header("Content-Type: application/vnd.ms-excel"); 
header("Expires: 0"); 
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("content-disposition: attachment;filename=".$hoy.".xls");

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
         <tr>
           <th>Nº</th>
           <th>MÉDICOS</th>
           <th>PACIENTES</th>
           <th>MOTIVO DE CITA</th>
           <th>FECHA/HORA DE CITA</th>
           <th>STATUS DE CITA</th>
         </tr>
      <?php 

if($reg==""){
echo "";      
} else {
  
$a=1; 
for($i=0;$i<sizeof($reg);$i++){
?>
         <tr align="center" class="even_row">
           <td><?php echo $a++; ?></td>
           <td><?php echo $reg[$i]['cedmedico'].": ".$reg[$i]['nommedico']." ".$reg[$i]['apemedico']; ?></td>
           <td><?php echo $reg[$i]['cedpaciente'].": ".$reg[$i]['pnompaciente']." ".$reg[$i]['snompaciente']." ".$reg[$i]['papepaciente']." ".$reg[$i]['sapepaciente']; ?></td>
           <td><?php echo $reg[$i]['motivocita']; ?></td>
           <td><?php echo date("d-m-Y", strtotime($reg[$i]["fechacita"]))." ".$reg[$i]["horacita"]; ?></td>
           <td><?php echo $reg[$i]['statuscita']; ?></td>
         </tr>
        <?php } } ?>
</table>
<?php
break;

case 'CITASXMEDICOS': 

$tra = new Login();
$reg = $tra->BuscarCitasPorMedicosReportes();

$hoy = "CITAS_MEDICAS_ESPECIALISTA_".str_replace(" ", "_", $reg[0]['especmedico']." ".$reg[0]['nommedico']." ".$reg[0]['apemedico'])."_SUCURSAL_".str_replace(" ", "_", $reg[0]["nombresucursal"])."_SEDE_".str_replace(" ", "_", $reg[0]["nombresede"]);

header("Content-Type: application/vnd.ms-excel"); 
header("Expires: 0"); 
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("content-disposition: attachment;filename=".$hoy.".xls");

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
         <tr>
           <th>Nº</th>
           <th>PACIENTES</th>
           <th>MOTIVO DE CITA</th>
           <th>FECHA/HORA DE CITA</th>
           <th>STATUS DE CITA</th>
         </tr>
      <?php 

if($reg==""){
echo "";      
} else {
  
$a=1; 
for($i=0;$i<sizeof($reg);$i++){
?>
         <tr align="center" class="even_row">
           <td><?php echo $a++; ?></td>
           <td><?php echo $reg[$i]['cedpaciente'].": ".$reg[$i]['pnompaciente']." ".$reg[$i]['snompaciente']." ".$reg[$i]['papepaciente']." ".$reg[$i]['sapepaciente']; ?></td>
           <td><?php echo $reg[$i]['motivocita']; ?></td>
           <td><?php echo date("d-m-Y", strtotime($reg[$i]["fechacita"]))." ".$reg[$i]["horacita"]; ?></td>
           <td><?php echo $reg[$i]['statuscita']; ?></td>
         </tr>
        <?php } } ?>
</table>
<?php
break;

case 'MATERIASXCURSOS':

$tra = new Login();
$reg = $tra->BuscarMateriasReportes(); 

$hoy = "LISTADO_MATERIAS_NIVEL_".str_replace(" ", "_", $reg[0]["nivel"])."_GRADO_".str_replace(" ", "_", $reg[0]["grado"]);
header("Content-Type: application/vnd.ms-excel"); 
header("Expires: 0"); 
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("content-disposition: attachment;filename=".$hoy.".xls");

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
         <tr>
           <th>Nº</th>
           <th>CÓDIGO</th>
           <th>NOMBRE DE AREA</th>
           <th>NOMBRE DE MATERIA</th>
         </tr>
      <?php 

if($reg==""){
echo "";      
} else {
  
$a=1; 
for($i=0;$i<sizeof($reg);$i++){
?>
         <tr align="center" class="even_row">
           <td><?php echo $a++; ?></td>
           <td><?php echo $reg[$i]['codmateria']; ?></td>
           <td><?php echo $reg[$i]['nomarea']; ?></td>
           <td><?php echo $reg[$i]['nommateria']; ?></td>
         </tr>
        <?php } } ?>
</table>
<?php
break;

}
 
?>
<p align="center"><strong>ELABORADO POR:</strong> <?php echo $_SESSION["nombres"] ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>RECIBIDO POR:</strong>___________________________</p>

<?php } else { ?> 
    <script type='text/javascript' language='javascript'>
      alert('NO TIENES PERMISO PARA ACCEDER A ESTA PAGINA.\nCONSULTA CON EL ADMINISTRADOR PARA QUE TE DE ACCESO')  
    document.location.href='panel'   
        </script> 
<?php } } else { ?>
    <script type='text/javascript' language='javascript'>
      alert('NO TIENES PERMISO PARA ACCEDER AL SISTEMA.\nDEBERA DE INICIAR SESION')  
    document.location.href='logout'  
        </script> 
<?php } ?>  