<?php
require_once("class/class.php"); 
if(isset($_SESSION['acceso'])) { 
if ($_SESSION['acceso'] == "administrador" || $_SESSION['acceso'] == "general") {

$tra = new Login();
$ses = $tra->ExpiraSession();
$exp = $tra->Expiro();

$reg = $tra->SolicitudExamenesPorId();

if(isset($_POST['btn-update']))
{
$reg = $tra->ActualizarSolicitudExamenes();
exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="assets/images/favicon.png" rel="icon" type="image">
<link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
<link href="assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="assets/css/icons.css" rel="stylesheet" type="text/css">
<link href="assets/css/style.css" rel="stylesheet" type="text/css"> 

<!-- script jquery -->
<script src="assets/js/jquery.min.js"></script> 
<script type="text/javascript" src="assets/script/titulos.js"></script>
<script type="text/javascript" src="assets/script/script2.js"></script>
<script type="text/javascript" src="assets/script/validation.min.js"></script>
<script type="text/javascript" src="assets/script/script.js"></script>
<!-- script jquery -->  


<!-- Calendario -->
<link rel="stylesheet" href="assets/calendario/jquery-ui.css" />
<script src="assets/calendario/jquery-ui.js"></script>
<script src="assets/script/jscalendario.js"></script>
<script src="assets/script/autocompleto.js"></script>
<!-- Calendario -->
  

</head>
<body onLoad="muestraReloj()" class="fixed-left">
                    

 <div id="wrapper">
 <div class="topbar">
 <div class="topbar-left">
 <div class="text-center"> 
 <a href="panel" class="logo"><img src="assets/images/logo_white_2.png" height="50"><span class="current-logo"></span></a>
<a href="panel" class="logo-sm"><img src="assets/images/logo_sm.png" height="50"></a>
                    </div>
 </div>
 <div class="navbar navbar-default" role="navigation">
 <div class="container">
 <div class="">
 <div class="pull-left"> 
 <button type="button" class="button-menu-mobile open-left waves-effect waves-light"><i class="ion-navicon"></i> </button> 
 <span class="clearfix"></span></div>
 <form class="navbar-form pull-left" role="search">
 <div class="form-group"> 
 <input class="form-control search-bar" placeholder="Búsqueda..." type="text">
 </div> 
 <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
 </form>
 <ul class="nav navbar-nav navbar-right pull-right">
 

<!--- MEJORAR DE AQUI ---->
                                <!-- Reloj start-->
                                <li id="header_inbox_bar" class="dropdown hidden-xs">
                                    <a data-toggle="dropdown" class="hour" href="#">
                                    <span id="spanreloj"></span>
                                    </a>
                                </li>
                                <!-- Reloj end -->
<!--- MEJORAR DE AQUI ---->
   

<!----- INICIO DE SESSION ----->
<li class="hidden-xs"> 
   <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="fa fa-crosshairs"></i></a>   </li>
   <li class="dropdown"> 
   <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">

<span class="dropdown hidden-xs"><abbr title="<?php echo $_SESSION['x']; ?>"><?php echo $_SESSION['ingreso']; ?></abbr> </span>
  <?php
if($_SESSION["tipo"]=="1"){
  
     if (isset($_SESSION['cedula'])) {
         if (file_exists("fotos/".$_SESSION['cedula'].".jpg")){
             echo "<img src='fotos/".$_SESSION['cedula'].".jpg?' class='img-circle'>"; 
         } else {
             echo "<img src='fotos/avatar.jpg' class='img-circle'>"; 
         } } else {
             echo "<img src='fotos/avatar.jpg' class='img-circle'>"; 
        }

} else {
  
     if (isset($_SESSION['codmedico'])) {
         if (file_exists("fotos/".$_SESSION['codmedico'].".jpg")){
             echo "<img src='fotos/".$_SESSION['codmedico'].".jpg?' class='img-circle'>"; 
         } else {
             echo "<img src='fotos/avatar2.jpg' class='img-circle'>"; 
         } } else {
             echo "<img src='fotos/avatar2.jpg' class='img-circle'>"; 
        }
  }
?> 

</a>
   <ul class="dropdown-menu">
   <li><a href="perfil"><i class="fa fa-user"></i> Mi Perfil</a></li>
   <li><a href="password"><i class="fa fa-edit"></i> Actualizar Password </a></li>
   <li><a href="bloqueo"><i class="fa fa-clock-o"></i> Bloquear Sesión</a></li>
   <li class="divider"></li>
   <li><a href="logout"><i class="fa fa-power-off"></i> Cerrar Sesión</a></li>
   </ul>
   </li>
   </ul>
   </div>
   </div>
   </div>
   </div>
   <div class="left side-menu">
   <div class="sidebar-inner slimscrollleft" style="overflow: hidden; width: auto; height: 566px;">
   
   <div class="user-details">
   <div class="text-center"> <?php
if($_SESSION["tipo"]=="1"){
  
     if (isset($_SESSION['cedula'])) {
         if (file_exists("fotos/".$_SESSION['cedula'].".jpg")){
             echo "<img src='fotos/".$_SESSION['cedula'].".jpg?' class='img-circle'>"; 
         } else {
             echo "<img src='fotos/avatar.jpg' class='img-circle'>"; 
         } } else {
             echo "<img src='fotos/avatar.jpg' class='img-circle'>"; 
        }

} else {
  
     if (isset($_SESSION['codmedico'])) {
         if (file_exists("fotos/".$_SESSION['codmedico'].".jpg")){
             echo "<img src='fotos/".$_SESSION['codmedico'].".jpg?' class='img-circle'>"; 
         } else {
             echo "<img src='fotos/avatar2.jpg' class='img-circle'>"; 
         } } else {
             echo "<img src='fotos/avatar2.jpg' class='img-circle'>"; 
        }
  }
?> </div>
   <div class="user-info">
   <div class="dropdown"> 
   <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['x']; ?></a>
   <ul class="dropdown-menu">
  <li><a href="perfil"><i class="fa fa-user"></i> Mi Perfil</a></li>
   <li><a href="password"><i class="fa fa-edit"></i> Actualizar Password </a></li>
   <li><a href="bloqueo"><i class="fa fa-clock-o"></i> Bloquear Sesión</a></li>
   <li class="divider"></li>
   <li><a href="logout"><i class="fa fa-power-off"></i> Cerrar Sesión</a></li>
   </ul>
   </div>
   <p class="text-muted m-0"><i class="fa fa-dot-circle-o text-success"></i> Online</p>
   </div>
   </div>
  <!----- FIN DE SESSION ----->

  <!----- INICIO DE MENU ----->
  <?php include('menu.php'); ?>
  <!----- FIN DE MENU ----->

<div class="clearfix"></div>
                </div>
       </div>
</div>

<div class="content-page">
<div class="content">
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="page-header-title"><h4 class="pull-left page-title"><i class="fa fa-edit"></i> Gestión de Solicitud Exámenes</h4>
<ol class="breadcrumb pull-right"><li><a href="panel">Inicio</a></li>
<li><a href="examenes">Control</a></li>
<li class="active">Gestión de Solicitud</li>
</ol>

<div class="clearfix"></div>

</div>
</div>
</div>
        
<form class="form" name="updateexamen" id="updateexamen" method="post" data-id="<?php echo $reg[0]["codexamen"] ?>" action="#"> 
      

<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Datos del Paciente</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

                                                  <div id="error">
                                                 <!-- error will be shown here ! -->
                                                  </div> 
             
<input name="codexamen" type="hidden" id="codexamen" value="<?php echo $reg[0]['codexamen']; ?>" />
<input type="hidden" name="codmedico" id="codmedico" value="<?php echo $reg[0]['codmedico']; ?>">
<input type="hidden" name="codpaciente" id="codpaciente" value="<?php echo $reg[0]['codpaciente']; ?>">
<input type="hidden" name="codcita" id="codcita" value="<?php echo $reg[0]['codcita']; ?>">
<input type="hidden" name="codsucursal" id="codsucursal" value="<?php echo $reg[0]['codsucursal']; ?>">
<input type="hidden" name="codsede" id="codsede" value="<?php echo $reg[0]['codsede']; ?>">

        <div class="row"> 
                            <div class="col-md-3"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Nº de Identificación: <span class="symbol required"></span></label>
<br /><abbr title="Nº de Identificación de Paciente"><?php echo $reg[0]['cedpaciente']; ?></abbr>
                          
                                                                </div> 
                                                            </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
   <label class="control-label">Nombres del Paciente: <span class="symbol required"></span></label> 
<br /><abbr title="Nombres del Paciente"><?php echo $reg[0]['pnompaciente']." ".$reg[0]['snompaciente']." ".$reg[0]['papepaciente']." ".$reg[0]['sapepaciente']; ?></abbr>
                                                                </div> 
                                                            </div>
                            <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Fecha de Nacimiento: <span class="symbol required"></span></label> 
<br /><abbr title="Fecha de Nacimiento del Paciente"><?php echo date("d-m-Y",strtotime($reg[0]['fnacpaciente'])); ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Edad: <span class="symbol required"></span></label> 
<br /><abbr title="Edad de Paciente"><?php echo edad($reg[0]['fnacpaciente'])." AÑOS"; ?></abbr>
                                                                </div> 
                                                            </div>   
                    </div>
          

        <div class="row"> 
                            <div class="col-md-2"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Grupo Sanguineo: <span class="symbol required"></span></label>
<br /><abbr title="Grupo Sanguineo de Paciente"><?php echo $reg[0]['gruposapaciente']; ?></abbr>
                          
                                                                </div> 
                                                            </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
   <label class="control-label">Eps: <span class="symbol required"></span></label> 
<br /><abbr title="Eps del Paciente"><?php echo $reg[0]['nomcontabilidad']; ?></abbr>
                                                                </div> 
                                                            </div>
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Nº de Teléfono: <span class="symbol required"></span></label> 
<br /><abbr title="Nº de Teléfono del Paciente"><?php echo $reg[0]['tlfpaciente']; ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Estado Civil: <span class="symbol required"></span></label> 
<br /><abbr title="Estado Civil de Paciente"><?php echo $reg[0]['estadopaciente']; ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Ocupación Laboral: <span class="symbol required"></span></label> 
<br /><abbr title="Ocupación Laboral de Paciente"><?php echo $reg[0]['ocupacionpaciente']; ?></abbr>
                                                                </div> 
                                                            </div>    
                    </div>


                    </div><!-- /.box-body -->
                </div>
                          </div>
                     </div>
              </div>
       </div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Observación de Dx</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">

        <div class="row"> 

          <div class="col-md-12"> 
                <div class="form-group has-feedback"> 
                        <label class="control-label">Búsqueda de Dx:</label> 
<input name="idcie" type="hidden" id="idcie" value="<?php echo $reg[0]['idcie']; ?>"/>
<input type="text" id="examen" name="examen" onKeyUp="this.value=this.value.toUpperCase()" class="form-control" placeholder="Ingrese Nombre de Dx para tu Busqueda" value="<?php echo $reg[0]['codcie'].": ".$reg[0]['nombrecie']; ?>" required="" aria-required="true">
                        <i class="fa fa-search form-control-feedback"></i>   
                                                 </div> 
                                          </div>       
                                    </div>
                                </div><!-- /.box-body -->
                            </div>
                      </div>
                </div>
           </div>
      </div>
</div>



<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Tipos Exámenes para Laboratorio</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  


             <div class="row">

<div class="table-responsive" data-pattern="priority-columns">
                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                            <thead>
                                                <tr>
                          <th><label">HEMATOLOGIA</label></th>
                          <th>&nbsp;</th>
                          <th><label">QUIMICA SANGUINEA</label></th>
                          <th>&nbsp;</th>
                          <th><label>MICROSCOPIA</label></th>
                          <th>&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>CUADRO HEMATICO</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="cuadrohepatico" id="cuadrohepatico" type="checkbox" class="checks" value="X" <?php if($reg[0]['cuadrohepatico'] == "X") { ?> checked="checked" <?php } ?>>
<label for="cuadrohepatico"> </label></div></div></td>
                                                    <td>GLICEMIA</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="glicemia" id="glicemia" type="checkbox" class="checks" value="X" <?php if($reg[0]['glicemia'] == "X") { ?> checked="checked" <?php } ?>>
<label for="glicemia"> </label></div></div></td>
                                                    <td>PARCIAL DE ORINA</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="parcialorina" id="parcialorina" type="checkbox" class="checks" value="X" <?php if($reg[0]['parcialorina'] == "X") { ?> checked="checked" <?php } ?>>
<label for="parcialorina"> </label></div></div></td>
                                              </tr>
                                                <tr>
                                                  <td>HEMATOCRITO</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="hematocrito" id="hematocrito" type="checkbox" class="checks" value="X" <?php if($reg[0]['hematocrito'] == "X") { ?> checked="checked" <?php } ?>>
<label for="hematocrito"> </label></div></div></td>
                                                  <td>COLESTEROL TOTAL</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="colesteroltotal" id="colesteroltotal" type="checkbox" class="checks" value="X" <?php if($reg[0]['colesteroltotal'] == "X") { ?> checked="checked" <?php } ?>>
<label for="colesteroltotal"> </label></div></div></td>
                                                  <td>COPROLOGICO/MATERIA FECAL</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="materiafecal" id="materiafecal" type="checkbox" class="checks" value="X" <?php if($reg[0]['materiafecal'] == "X") { ?> checked="checked" <?php } ?>>
<label for="materiafecal"> </label></div></div></td>
                                                </tr>
                        <tr>
                                                  <td>HEMOGLOBINA</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="hemoglobina" id="hemoglobina" type="checkbox" class="checks" value="X" <?php if($reg[0]['hemoglobina'] == "X") { ?> checked="checked" <?php } ?>>
<label for="hemoglobina"> </label></div></div></td>
                                                  <td>COLESTEROL HDL</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="colesterolhdl" id="colesterolhdl" type="checkbox" class="checks" value="X" <?php if($reg[0]['colesterolhdl'] == "X") { ?> checked="checked" <?php } ?>>
<label for="colesterolhdl"> </label></div></div></td>
                                                  <td>BACILOSCOPIA ESPUTO</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="basiloscopia" id="basiloscopia" type="checkbox" class="checks" value="X" <?php if($reg[0]['basiloscopia'] == "X") { ?> checked="checked" <?php } ?>>
<label for="basiloscopia"> </label></div></div></td>
                                                </tr>
                        <tr>
                                                  <td>VSG</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="vsg" id="vsg" type="checkbox" class="checks" value="X" <?php if($reg[0]['vsg'] == "X") { ?> checked="checked" <?php } ?>>
<label for="vsg"> </label></div></div></td>
                                                  <td>COLESTEROL LDL</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="colesterolldl" id="colesterolldl" type="checkbox" class="checks" value="X" <?php if($reg[0]['colesterolldl'] == "X") { ?> checked="checked" <?php } ?>>
<label for="colesterolldl"> </label></div></div></td>
                                                  <td>KOH</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="koh" id="koh" type="checkbox" class="checks" value="X" <?php if($reg[0]['koh'] == "X") { ?> checked="checked" <?php } ?>>
<label for="koh"> </label></div></div></td>
                                                </tr>
                        <tr>
                                                  <td>ESP</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="esp" id="esp" type="checkbox" class="checks" value="X" <?php if($reg[0]['esp'] == "X") { ?> checked="checked" <?php } ?>>
<label for="esp"> </label></div></div></td>
                                                  <td>TRIGLICERIDOS</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="trigliceridos" id="trigliceridos" type="checkbox" class="checks" value="X" <?php if($reg[0]['trigliceridos'] == "X") { ?> checked="checked" <?php } ?>>
<label for="trigliceridos"> </label></div></div></td>
                                                  <td>FROTIS FLUJO VAGINAL</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="flujovaginal" id="flujovaginal" type="checkbox" class="checks" value="X" <?php if($reg[0]['flujovaginal'] == "X") { ?> checked="checked" <?php } ?>>
<label for="flujovaginal"> </label></div></div></td>
                                                </tr>
                        <tr>
                                                  <td>EXT. GOTA GRUESA</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="gotagruesa" id="gotagruesa" type="checkbox" class="checks" value="X" <?php if($reg[0]['gotagruesa'] == "X") { ?> checked="checked" <?php } ?>>
<label for="gotagruesa"> </label></div></div></td>
                                                  <td>CREATININA</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="creatinina" id="creatinina" type="checkbox" class="checks" value="X" <?php if($reg[0]['creatinina'] == "X") { ?> checked="checked" <?php } ?>>
<label for="creatinina"> </label></div></div></td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                </tr>
                        <tr>
                                                  <td>GRUPO O FACTOR RH</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="factorrh" id="factorrh" type="checkbox" class="checks" value="X" <?php if($reg[0]['factorrh'] == "X") { ?> checked="checked" <?php } ?>>
<label for="factorrh"> </label></div></div></td>
                                                  <td>BUN</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="bun" id="bun" type="checkbox" class="checks" value="X" <?php if($reg[0]['bun'] == "X") { ?> checked="checked" <?php } ?>>
<label for="bun"> </label></div></div></td>
                                                  <td><span class="Estilo1"><strong>INMUNOLOGIA</strong></span></td>
                                                  <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>UREA</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="urea" id="urea" type="checkbox" class="checks" value="X" <?php if($reg[0]['urea'] == "X") { ?> checked="checked" <?php } ?>>
<label for="urea"> </label></div></div></td>
                                                  <td>GRAVINDEX/PRUEBA DE EMBARAZO</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="embarazo" id="embarazo" type="checkbox" class="checks" value="X" <?php if($reg[0]['embarazo'] == "X") { ?> checked="checked" <?php } ?>>
<label for="embarazo"> </label></div></div></td>
                                                </tr>
                        <tr>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>ACIDO URICO</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="acidourico" id="acidourico" type="checkbox" class="checks" value="X" <?php if($reg[0]['acidourico'] == "X") { ?> checked="checked" <?php } ?>>
<label for="acidourico"> </label></div></div></td>
                                                  <td>SEROLOGIA VDRL</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="serologia" id="serologia" type="checkbox" class="checks" value="X" <?php if($reg[0]['serologia'] == "X") { ?> checked="checked" <?php } ?>>
<label for="serologia"> </label></div></div></td>
                                                </tr>
                        <tr>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>GLICEMIA PRE Y POST</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="gliecemiapre" id="gliecemiapre" type="checkbox" class="checks" value="X" <?php if($reg[0]['gliecemiapre'] == "X") { ?> checked="checked" <?php } ?>>
<label for="gliecemiapre"> </label></div></div></td>
                                                  <td><span class="Estilo1"><strong>OTROS</strong></span></td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="otros" id="otros" type="checkbox" class="checks" value="X" <?php if($reg[0]['otros'] == "X") { ?> checked="checked" <?php } ?>>
<label for="otros"> </label></div></div></td>
                                                </tr>
                                            </tbody>
                                        </table>
                    </div>
            </div><br> 
        
             <div class="modal-footer"> 
<button type="submit" name="btn-update" id="btn-update" class="btn btn-primary"><span class="fa fa-edit"></span> Actualizar</button>
<button class="btn btn-danger waves-effect waves-light" type="reset"><span class="fa fa-trash-o"></span> Cancelar</button>  
            </div>

                  </div><!-- /.box-body -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

         </form>
</div>


<footer class="footer"> <i class="fa fa-copyright"></i> <span class="current-year"></span>. </footer>
</div>
</div> 

         <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        
         <!-- Modal-Effect -->
        <script src="assets/plugins/modal-effect/js/classie.js"></script>
        <script src="assets/plugins/modal-effect/js/modalEffects.js"></script>

        <!-- Datatable init js -->
        <script src="assets/pages/datatables.init.js"></script>
        <script src="assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>

<script language='JavaScript'>

var cont=1;

function addRowX3()  //Esta la funcion que agrega las filas :
{
cont++;
//autocompletar

//
var indiceFila=1;
myNewRow = document.getElementById('tabla3').insertRow(-1);
myNewRow.id=indiceFila;
myNewCell=myNewRow.insertCell(-1);
myNewCell.innerHTML='<div class="col-md-13"><div class="form-group has-feedback"><label class="control-label">Nombre de Dx para Fórmula Médica: <span class="symbol required"></span></label><input type="text" id="formula'+cont+'" name="formula[]'+cont+'" onKeyUp="this.value=this.value.toUpperCase(); autocompletar3(this.name);" class="form-control" placeholder="Ingrese Nombre de Dx para tu Búsqueda" title="Ingrese Dx para Fórmula Médica" required="" aria-required="true"><input name="idcieformula[]'+cont+'" type="hidden" class="form-control" id="idcieformula'+cont+'"  onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Código de Dx" required="required"/><textarea name="formulamedica[]'+cont+'" class="form-control" id="formulamedica'+cont+'" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Observación de Fórmula Médica" title="Ingrese Observación de Fórmula Médica" rows="2" required="" aria-required="true"></textarea><i class="fa fa-pencil form-control-feedback"></i></div></div>';
indiceFila++;
}

//////////////Borrar() ///////////
function borrar3() {
var table = document.getElementById('tabla3');
if(table.rows.length > 1)
    {
    table.deleteRow(table.rows.length -1);
cont--;
    }
}

////////////FUNCION ASIGNA VALOR DE CONT PARA EL FOR DE MOSTRAR DATOS MP-MOD-TT////////
function asigna()
{
valor=document.form.var_cont.value=cont;
}
</script>




<script language='JavaScript'>
function addRowX4()  //Esta la funcion que agrega las filas :
{
cont++;
//autocompletar

//
var indiceFila=1;
myNewRow = document.getElementById('tabla4').insertRow(-1);
myNewRow.id=indiceFila;
myNewCell=myNewRow.insertCell(-1);
myNewCell.innerHTML='<div class="col-md-13"><div class="form-group has-feedback"><label class="control-label">Nombre de Dx para Orden Médica: <span class="symbol required"></span></label><input type="text" id="ordenes'+cont+'" name="ordenes[]'+cont+'" onKeyUp="this.value=this.value.toUpperCase(); autocompletar4(this.name);" class="form-control" placeholder="Ingrese Nombre de Dx para tu Búsqueda" title="Ingrese Dx para Orden Médica" required="" aria-required="true"><input name="idcieorden[]'+cont+'" type="hidden" class="form-control" id="idcieorden'+cont+'"  onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Código de Dx" required="required"/><textarea name="ordenmedica[]'+cont+'" class="form-control" id="ordenmedica'+cont+'" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Observación de Orden Médica" title="Ingrese Observación de Orden Médica" rows="2" required="" aria-required="true"></textarea><i class="fa fa-pencil form-control-feedback"></i></div></div>';
indiceFila++;
}

//////////////Borrar() ///////////
function borrar4() {
var table = document.getElementById('tabla4');
if(table.rows.length > 1)
    {
    table.deleteRow(table.rows.length -1);
cont--;
    }
}

////////////FUNCION ASIGNA VALOR DE CONT PARA EL FOR DE MOSTRAR DATOS MP-MOD-TT////////
function asigna()
{
valor=document.form.var_cont.value=cont;
}
</script>

   </body>
   </html>
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